@servers(['web' => 'ethanadmin@104.131.102.188', 'localhost'=>'127.0.0.1'])

<?php
	$local_dir = "/mnt/c/Users/ethan/Code/braceyourself.solutions";
	$last_commit_msg = shell_exec("cd $local_dir && git log -1 --pretty=%B");
	$last_commit_msg = str_replace(' ', '_', $last_commit_msg);

	$site_name = 'braceyourself.solutions';
	$repo = "/var/git/$site_name.git";
	$var_www_APP_NAME = "/var/www/$site_name";
	$var_www_releases_APP_NAME = "/var/www/releases/$site_name";
	$var_www_APP_NAME_app = $var_www_APP_NAME.'/app';

	$release = date('Y-M-d_H:i:s')."-$last_commit_msg";
?>


@macro('deploy', ['on' => 'web'])
	identify
	fetch_repo
	run_composer
	update_permissions
	update_symlinks
	npm
	clear_cache
	log_release
@endmacro


@task('checks')

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



@task('update_permissions')
	cd {{ $var_www_releases_APP_NAME }};
	sudo chmod -R ug+rwx "{{ $release }}";
	sudo chgrp -R www-data "{{ $release }}";
@endtask


@task('npm')
	cd {{ $var_www_releases_APP_NAME }}/{{$release}}
	npm install
	npm run dev
@endtask


@task('update_symlinks')
	cd {{ $var_www_APP_NAME }};

	ln -nfs {{ $var_www_releases_APP_NAME }}/"{{ $release }}" {{ $var_www_APP_NAME_app }};


	ln -nfs {{ $var_www_APP_NAME }}/.env {{ $var_www_APP_NAME_app }}/.env;


	rm -r {{ $var_www_releases_APP_NAME }}/"{{ $release }}"/storage;
	mkdir -p {{ $var_www_APP_NAME }}/storage
	ln -nfs {{ $var_www_APP_NAME }}/storage {{ $var_www_APP_NAME_app }}/storage;


	cd {{ $var_www_APP_NAME_app }};
	sudo chgrp -h www-data .env;
	sudo chgrp -h www-data storage;

	sudo chgrp -hR www-data {{ $var_www_APP_NAME }};
	sudo chmod -R 775 {{ $var_www_APP_NAME }}/storage;


	sudo service php7.2-fpm reload;

@endtask

@task('clear_cache')
	cd {{ $var_www_releases_APP_NAME }}/"{{ $release }}";
	php artisan passport:keys --force
	php artisan key:generate --force

	php artisan config:clear
	php artisan cache:clear
	php artisan config:cache
	php artisan clear-compiled --env=production;
@endtask
