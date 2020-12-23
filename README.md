[![GitHub contributors](https://img.shields.io/github/contributors/Naereen/StrapDown.js.svg)](https://gitHub.com/reverk/jigy/graphs/contributors/)
[![GitHub pull-requests](https://img.shields.io/github/issues-pr/Naereen/StrapDown.js.svg)](https://gitHub.com/reverk/jigy/pull/)
[![GitHub license](https://img.shields.io/github/license/Naereen/StrapDown.js.svg)](https://github.com/reverk/jigy/blob/master/LICENSE)


# JTMK i-Gallery (JiGy) 📑

A blog build with Laravel, featuring a filtered search

Build as part of our final year project

## Table of Contents
- [JTMK i-Gallery (JiGy) 📑](#jtmk-i-gallery-jigy-)
  * [Installation](#installation)
    + [Required tools 🛠](#required-tools-)
    + [Instructions 📜](#instructions-)
      - [Quick Start Guide](#quick-start-guide)
      - [Detailed installation](#detailed-installation)
  * [Hot Reloading](#hot-reloading)
  * [CI/CD](#ci/cd)
  * [FAQ](#faq)
  * [Collaborators 👨🏻‍💻](#collaborators-)
  * [License](#license)

## Installation
### **Required tools 🛠**
- [Composer](https://getcomposer.org/) with [Laravel](https://laravel.com/)
- [NPM](https://www.npmjs.com/get-npm)
- [XAMPP](https://www.apachefriends.org/index.html) - for MySQL database, any other databases supported by laravel works too.
- [Git](https://git-scm.com/)
- IDE or Code Editor -- we recommend [PhpStorm](https://www.jetbrains.com/phpstorm/)
- Search: [Algolia account](https://www.algolia.com/)
- Email testing _(optional)_: [Mailtrap account](https://mailtrap.io/)


### **Instructions 📜**
#### Quick Start Guide
See [here](https://github.com/reverk/jigy/blob/master/docs/QSG.md).
#### Detailed installation
1. Clone the code with Git by typing:
```
git clone https://github.com/reverk/jigy.git
```
2. Go into the directory:
```
cd jigy
```
3. Install composer dependencies:
```
composer install
```
4. Install NPM dependencies & run
```
# Bash/Powershell
npm i; npm run dev
```
5. Make a copy of `.env.example` and rename it to `.env` and change to the following snippet:
```
# Bash/Powershell
cp .env.example .env
```
```
# .env
...

APP_URL=<YOUR_URL>

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
> 📝: By default, XAMPP's default username & password is `root` and `(empty/no password)`

> 📝: APP_URL is `http://localhost:8000` by default, but if you want hot reloading, use `http://localhost:3000`

6. Generate key by:
```
php artisan key:generate
```
7. Create a symbolic link (used for images): 
```
php artisan storage:link
```
8. Migrate database:
```
php artisan migrate
```
> Please confirm that your XAMPP's Apache & MySQL is started before migrating
9. (Optional) To populate fake data:
```
php artisan db:seed
```
10. Index Algolia search & their configs:
```
php artisan scout:sync
```
11. Serve/Host JiGy:
```
php artisan serve
```
12. Go to a web browser and go to:
```
localhost:8000 // Or localhost:3000 if you have hot/live reloading.
```

## Hot Reloading
- Sometimes, you may need to enable hot reloading to make things easier. To enable hot/live reloading:
```
php artisan serve
```
Then open another terminal and type:
```
npm run watch
```
> ℹ You'll need to leave 2 terminals to run simultaneously   

## CI/CD
See [here](https://github.com/reverk/jigy/blob/master/docs/ci.md).

## FAQ
**Q: Where can I find and apply Mailtrap details?**

A: Assuming you've registered your account, you can find it on `Inboxs > <Your project name> > SMTP Settings tab`. 
Then at `Intergrations` section, select `Laravel`. 
It'll provide you the appropriate credentials to fill it into `.env`.

**Q: Where can I find Algolia App ID and Algolia Secret Key?**

A: Again, assuming you've registered your account, go to `Dashboard > API Keys > Your API Keys tab`.

Then, copy `Application ID` and `Admin API Key` to `ALGOLIA_APP_ID=<PASTE HERE>` and `ALGOLIA_SECRET=<PASTE HERE>` in `.env` respectively.

## Collaborators 👨🏻‍💻
- [@lyaena](https://github.com/lyaena)
- [@KungCC1109](https://github.com/KungCC1109)
- [@reverk](https://github.com/reverk)
- [@anissyuhada](https://github.com/anissyuhada)

## License
MIT

