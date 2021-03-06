# Quick Start Guide

This guide assumes you have:
- Installed [NPM](https://www.npmjs.com/get-npm), [Composer](https://getcomposer.org/), [Laravel](https://laravel.com/), [XAMPP](https://www.apachefriends.org/index.html) (or any supported database) and [Git](https://git-scm.com/).
- A code editor/IDE
- Search: [Algolia account](https://www.algolia.com/)
- Email testing _(optional)_: [Mailtrap account](https://mailtrap.io/)

1. Clone & cd to file:
```
# Bash/Powershell
git clone https://github.com/reverk/jigy.git; cd jigy
```

2. Configure `.env` by copying `.env.example`:
```
# Bash/Powershell
cp .env.example .env
```
```
# .env
...

APP_URL=http://localhost:3000

...

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<YOUR_DATABASE_NAME>
DB_USERNAME=<YOUR_DATABASE_USERNAME>
DB_PASSWORD=<YOUR_DATABSE_PASSWORD>

...

# If you want to test if emails work, follow this config
# Alternatively, you can copy & paste the config provided in mailtrap
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=<MAIL_USERNAME>
MAIL_PASSWORD=<MAIL_PASSWORD>
MAIL_ENCRYPTION=<MAIL_ENCRYPTION>
MAIL_FROM_ADDRESS=staging@jigy.com
MAIL_FROM_NAME="${APP_NAME}"

...

FILESYSTEM_DRIVER=public

# For search function
ALGOLIA_APP_ID=<YOUR_APP_ID>
ALGOLIA_SECRET=<YOUR_ADMIN_API_KEY>

...
```

3. Run this line of code:
```
# Bash / Powershell
composer install; npm i; npm run dev; php artisan key:generate; php artisan storage:link; php artisan migrate --seed; php artisan scout:sync; php artisan serve
```
> This will:
> - Install composer & npm dependencies
> - Build npm files
> - Generate key
> - Create a storage link
> - Seeds database with fake data
> - Index Algolia search & configs
> - Starts serve (go to localhost:8000).

4. Go to localhost:8000

> If you need to open JiGy again locally in the future, you may run `php artisan serve`.
