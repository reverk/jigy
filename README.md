[![CodeFactor](https://www.codefactor.io/repository/github/reverk/jigy/badge?s=847bf4cb63b064746b985ebb0f3685144aa1d43c)](https://www.codefactor.io/repository/github/reverk/jigy)
[![GitHub contributors](https://img.shields.io/github/contributors/Naereen/StrapDown.js.svg)](https://gitHub.com/reverk/jigy/graphs/contributors/)
[![GitHub pull-requests](https://img.shields.io/github/issues-pr/Naereen/StrapDown.js.svg)](https://gitHub.com/reverk/jigy/pull/)
[![GitHub license](https://img.shields.io/github/license/Naereen/StrapDown.js.svg)](https://github.com/reverk/jigy/blob/master/LICENSE)


# JTMK i-Gallery (JiGy) 📑

A blog build with Laravel, featuring a filtered search

## Features to work on ✨
- ⚒ Build a blog that's able to do CRUD operations
- ❌ Able to manage users from the backend
- ❌ Filtered search

## Installation
### **Required tools 🛠**
- [Composer](https://getcomposer.org/) with [Laravel](https://laravel.com/)
- [NPM](https://www.npmjs.com/get-npm)
- [XAMPP](https://www.apachefriends.org/index.html) - for MySQL database
- [Git](https://git-scm.com/)
- IDE or Code Editor -- we recommend [PhpStorm](https://www.jetbrains.com/phpstorm/)

### **Instructions 📜**
1. Clone the code with Git by typing `git clone https://github.com/reverk/jigy.git` in your terminal or download zip, then extract the file.
2. Go into the directory `C:\Users\<your_PC_name>\jigy` by typing `cd jigy`
3. Type `composer install` to install PHP dependencies.
4. Once finished, type `npm i` to install NPM dependencies.
5. Make a copy of `.env.example` and rename it to `.env` and change to the following snippet:
```
...

APP_URL=http://localhost:<PORT> 

...

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<YOUR_DATABASE_NAME>
DB_USERNAME=<YOUR_DATABASE_USERNAME>
DB_PASSWORD=<YOUR_DATABSE_PASSWORD>

...
```
> 📝: If images is not displaying, rename this to the port you're using. Otherwise, leave it as it is.
> Ex. `php artisan serve` uses `localhost:8000` or `npm run watch` uses `localhost:3000`

> 📝: By default, XAMPP's default username & password is `root` and `(empty/no password)`

6. After that, run `php artisan key:generate`
7. Run `php artisan migrate` to migrate all tables into your database. 
> Please confirm that your XAMPP's Apache & MySQL is started before migrating
8. (Optional) Run `php artisan db:seed` to populate data.
9. Then run `php artisan serve`
10. And finally, go to `localhost:8000`

## Development (frontend)
- For convenience, run `php artisan serve`, then `npm run watch` to enable hot/live reloading.
> ℹ You'll need to leave 2 terminals to run simultaneously   

## Collaborators 👨🏻‍💻
- Our Supervisor
- @KungCC
- @reverk
- @Anis

## License
MIT
