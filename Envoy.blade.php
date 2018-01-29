@servers(['web' => 'braceyourself.solutions'])

<?php
	$site_name = 'braceyourself.solutions';
	$repo = "/var/git/$site_name.git";
	$app_dir = "/var/www/$site_name";
	$release_dir = "/var/www/releases/$site_name";
	$release = date("Y-M-d_H:i.s");
	$release_str = ''.$release;
	$release_link = $app_dir.'/app';
?>

@macro('deploy', ['on' => 'web'])
	identify
	fetch_repo
	run_composer
	update_permissions
	update_symlinks
	log_release
@endmacro


@task('rollback', ['on' => 'web'])
	cd {{ $release_dir }}

	#find current release in release log
	CURRENT=$(tail -1 release_log | head -1)

	# find rollback release
	PREV=$(tail -2 release_log | head -1)

	# remove most recent release from end of file
	head -n -1 release_log > temp.txt ; mv temp.txt release_log

	# new current release
	CURRENT="{{ $release_dir }}/$(tail -1 release_log | head -1)"

	# replase link with the new CURRENT release
	ln -nfs $CURRENT "{{ $app_dir }}/app"
	chgrp -hR www-data {{ $app_dir }}/app


	cd {{ $release_link }};
	ln -nfs {{ $app_dir }}/.env "$CURRENT/.env"
	chgrp -h www-data .env;

	rm -r "$CURRENT/storage/logs"
	cd "$CURRENT/storage"

	[ -d {{ $app_dir }} ] || mkdir -p {{ $app_dir }}/logs
	ln -nfs {{ $app_dir }}/logs "$CURRENT/storage/logs"
	chgrp -h www-data logs;

	sudo service php7.1-fpm reload;

@endtask

@task('log_release')
	cd {{ $release_dir }}
	echo {{ $release_str }} >> release_log
@endtask

@task('identify')
	echo "logged into $(hostname) as $(whoami)"
@endtask

@task('list_releases')
	cat {{ $release_dir }}/log

@endtask
@task('fetch_repo')
	[ -d {{ $release_dir }} ] || mkdir {{ $release_dir }};
	cd {{ $release_dir }};
	git clone -b master {{ $repo }} {{ $release }};
@endtask

@task('run_composer')
	cd {{ $release_dir }}/{{ $release }};
	composer install --prefer-dist --no-scripts --no-dev;
	php artisan clear-compiled --env=production;
	php artisan optimize --env=production;
@endtask

@task('update_permissions')
	cd {{ $release_dir }};
	sudo chmod -R ug+rwx {{ $release }};
	sudo chgrp -R www-data {{ $release }};
@endtask

@task('update_symlinks')
	ln -nfs {{ $release_dir }}/{{ $release }} {{ $release_link }};
	sudo chgrp -hR www-data {{ $app_dir }};

	cd {{ $release_link }};
	ln -nfs {{ $app_dir }}/.env {{ $release_link }}/.env;
	sudo chgrp -h www-data .env;

	rm -r {{ $release_dir }}/{{ $release }}/storage/logs;
	cd {{ $release_dir }}/{{ $release }}/storage;

	mkdir -p {{ $app_dir }}/logs
	ln -nfs {{ $app_dir }}/logs {{ $release_link }}/storage/logs;
	sudo chgrp -h www-data logs;

	sudo service php7.1-fpm reload;
@endtask

