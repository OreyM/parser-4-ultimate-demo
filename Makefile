fresh:
	php artisan db:wipe --database mysql
	php artisan migrate:fresh --seed
