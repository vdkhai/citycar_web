## CitiCar-Web
```bash
# https://www.webcarpenter.com/blog/122-How-to-Setup-Laravel-using-macOS-OSX
# install packages
composer install

php artisan list
# Laravel Framework 8.65.0

# Create db and seed data
php artisan migrate
php artisan db:seed (only run for the first time after migrate)
php artisan migrate:fresh --seed (re-migrate and re-seed)

# Public storage
php artisan storage:link

# Public assets (css, js, images, fonts ...)
npm install (only run for the first time)
npm run dev (run when update assets)

php artisan serve
# Starting Laravel development server: http://127.0.0.1:8000

```
