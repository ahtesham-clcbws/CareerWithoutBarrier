cd public
ln -s ../storage/app/public storage

## email issue resolution maybe
php artisan queue:restart
php artisan clear-compiled
php artisan cache:clear
php artisan config:clear


MyT&N@2024#!
