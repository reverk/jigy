# Quick Start Guide
1. Clone & cd to file:
```
git clone https://github.com/reverk/jigy.git & cd jigy
```

2. Configure .env by copying .env.example:
```
APP_URL=https://localhost:3000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<YOUR_DATABASE_NAME>
DB_USERNAME=<YOUR_DATABASE_USERNAME>
DB_PASSWORD=<YOUR_DATABSE_PASSWORD>

FILESYSTEM_DRIVER=public
```

3. Run this line of code (Windows only):
```
composer install & npm i & npm run dev & php artisan key:generate & php artisan storage:link & php artisan migrate --seed & php artisan serve
```
> This will:
> - Install composer & npm dependencies
> - Build npm files
> - Generate key
> - Create a storage link
> - Seeds database with fake data
> - Starts serve (go to localhost:3000).

