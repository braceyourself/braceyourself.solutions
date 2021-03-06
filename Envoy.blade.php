@servers(['as1'=>'192.168.0.4','web' => 'ethanadmin@104.131.102.188', 'localhost'=>'127.0.0.1'])

<?php
$local_dir = "/mnt/c/Users/ethan/Code/braceyourself.solutions";

$site_name = 'braceyourself.solutions';
$repo = "/var/git/$site_name.git";
$var_www_APP_NAME = "/var/www/$site_name";
$var_www_releases_APP_NAME = "/var/www/releases/$site_name";
$var_www_APP_NAME_app = $var_www_APP_NAME . '/app';
$php_version = 'php7.2';

$release = date('Y-M-d_H:i:s');
?>

@macro('dev', ['on' => 'as1'])
identify
fetch_repo
create_folders
update_permissions
update_symlinks
run_composer
npm
clear_cache
log_release
@endmacro



@macro('deploy', ['on' => 'as1'])
	identify
	fetch_repo
	create_folders
	update_permissions
	update_symlinks
	run_composer
	migrate
	npm
	clear_cache
	log_release
@endmacro


@task('create_folders', ['on' => 'as1'])
	cd {{$var_www_APP_NAME}}/storage/framework
	mkdir -p sessions
	mkdir -p views
	mkdir -p cache

@endtask


@task('push', ['on' => 'localhost'])
git add .
prompt "Enter a commit message" commit_message
git commit -m '$commit_message'
git push
@endtask



@task('commit', ['on' => 'localhost'])
	echo "Committing";



@endtask

@task('rollback', ['on' => 'web'])
	cd {{ $var_www_releases_APP_NAME }}

	#find current release in release log
	CURRENT=$(tail -1 release_log | head -1)

	# find rollback release
	PREV=$(tail -2 release_log | head -1)

	# remove most recent release from end of file
	head -n -1 release_log > temp.txt ; mv temp.txt release_log

	# new current release
	CURRENT="{{ $var_www_releases_APP_NAME }}/$(tail -1 release_log | head -1)"

	# replase link with the new CURRENT release
	ln -nfs $CURRENT "{{ $var_www_APP_NAME }}/app"
	sudo chgrp -hR www-data {{ $var_www_APP_NAME }}/app


	cd {{ $var_www_APP_NAME_app }};
	ln -nfs {{ $var_www_APP_NAME }}/.env "$CURRENT/.env"
	sudo chgrp -h www-data .env;

	{{--rm -r "$CURRENT/storage/logs"--}}
	{{--cd "$CURRENT/storage"--}}
{{----}}
	{{--[ -d {{ $var_www_APP_NAME }} ] || mkdir -p {{ $var_www_APP_NAME }}/logs--}}
	{{--ln -nfs {{ $var_www_APP_NAME }}/logs "$CURRENT/storage/logs"--}}
	{{--sudo chgrp -h www-data logs;--}}

	sudo service php7.2-fpm reload;

@endtask

@task('log_release')
	cd {{ $var_www_releases_APP_NAME }}
	echo {{ $release }} >> release_log
@endtask

@task('identify')
	echo "logged into $(hostname) as $(whoami)"
@endtask

@task('list_releases')
	cat {{ $var_www_releases_APP_NAME }}/log

@endtask

@task('fetch_repo')
	var_www_releases_APP_NAME={{$var_www_releases_APP_NAME}}
	[ -d $var_www_releases_APP_NAME ] || mkdir $var_www_releases_APP_NAME;
	cd $var_www_releases_APP_NAME;
	
	git clone -b master {{ $repo }} "{{ $release }}";
@endtask

@task('run_composer')
	cd {{ $var_www_releases_APP_NAME }}/"{{ $release }}";
	composer install --prefer-dist --no-scripts --no-dev;
	php artisan clear-compiled --env=production;
	composer dump-autoload -o
@endtask


@task('migrate')
	cd {{ $var_www_releases_APP_NAME }}/"{{ $release }}";
	php artisan migrate --force
@endtask


@task('update_permissions')
	cd {{ $var_www_releases_APP_NAME }};
	sudo chmod -R ug+rwx "{{ $release }}";
	sudo chgrp -R www-data "{{ $release }}";
@endtask


@task('npm')
	cd {{ $var_www_releases_APP_NAME }}/{{$release}}
	{{--echo "Using new webpack file"--}}
{{--	cp webpack.mix.js {{$var_www_APP_NAME}}--}}
	npm install
	npm run prod
@endtask


@task('update_symlinks')
	cd {{ $var_www_APP_NAME }};

	#link app directory with release
	ln -nfs {{ $var_www_releases_APP_NAME }}/"{{ $release }}" {{ $var_www_APP_NAME_app }};


	# link .env
	ln -nfs {{ $var_www_APP_NAME }}/.env {{ $var_www_APP_NAME_app }}/.env;


	# link storage
	rm -r {{ $var_www_releases_APP_NAME }}/"{{ $release }}"/storage;
	mkdir -p {{ $var_www_APP_NAME }}/storage
	ln -nfs {{ $var_www_APP_NAME }}/storage {{ $var_www_APP_NAME_app }}/storage;


	# link node_modules
{{--	#rm -r {{ $var_www_releases_APP_NAME }}/"{{ $release }}"/node_modules;--}}
{{--	mkdir -p {{ $var_www_APP_NAME }}/node_modules--}}
{{--	ln -nfs {{ $var_www_APP_NAME }}/node_modules {{ $var_www_APP_NAME_app }}/node_modules;--}}


	# link vendor
	#rm -r {{ $var_www_releases_APP_NAME }}/"{{ $release }}"/vendor;
	mkdir -p {{ $var_www_APP_NAME }}/vendor
	ln -nfs {{ $var_www_APP_NAME }}/vendor {{ $var_www_APP_NAME_app }}/vendor;


	# set permissions
	cd {{ $var_www_APP_NAME_app }};
	sudo chgrp -h www-data .env;
	sudo chgrp -h www-data storage;
	sudo chgrp -hR www-data {{ $var_www_APP_NAME }};
	sudo chmod -R 775 {{ $var_www_APP_NAME }}/storage;


	# make sure public storage is linked
	mkdir -p {{ $var_www_APP_NAME }}/storage/app
    ln -s {{ $var_www_APP_NAME }}storage/app {{ $var_www_releases_APP_NAME }}/{{$release}}/public/storage


	# reload the service
	sudo service {{$php_version}}-fpm reload;


@endtask

@task('clear_cache')
	cd {{ $var_www_releases_APP_NAME }}/"{{ $release }}";
	{{--php artisan passport:keys --force--}}
	php artisan key:generate --force

	php artisan config:clear
	php artisan cache:clear
	php artisan config:cache
	php artisan clear-compiled --env=production;
@endtask
