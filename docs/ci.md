# CI/CD

Below is a code used for CI/CD throughout our development. Though it will no longer be used when it's public.

You may use it on your own private repo as you wish.

```
# .github\workflows\main.yml

on:
  pull_request:
    branches:
      - 'master'
      - 'staging'

name: CI
jobs:
  build-app:
    runs-on: ubuntu-latest
    container:
      image: kirschbaumdevelopment/laravel-test-runner:7.3

    services:
      mysql:
        image: mysql:5.7
        env:
          MYSQL_ALLOW_EMPTY_PASSWORD: yes
          MYSQL_DATABASE: test
        ports:
          - 33306:3306
        options: --health-cmd="mysqladmin ping" --health-interval=10s --health-timeout=5s --health-retries=3

    steps:
      - uses: actions/checkout@v1

      - name: Install composer dependencies
        run: |
          composer install

      - name: Install NPM dependencies & build
        run: |
          npm i
          npm run prod

      - name: Prepare Laravel Application
        run: |
          cp .env.ci .env
          php artisan key:generate
          php artisan migrate:fresh

      - name: Test Laravel Application
        env:
          ALGOLIA_APP_ID: ${{ secrets.ALGOLIA_APP_ID }}
          ALGOLIA_SECRET: ${{ secrets.ALGOLIA_SECRET }}
        run: |
          php artisan env:set ALGOLIA_APP_ID "$ALGOLIA_APP_ID" --quiet
          php artisan env:set ALGOLIA_SECRET "$ALGOLIA_SECRET" --quiet
          php artisan scout:sync
          php artisan test

```

```
# .env.ci

APP_NAME=Laravel
APP_ENV=staging
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=test
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

FILESYSTEM_DRIVER=public
ALLOW_REGISTER=false
ALGOLIA_APP_ID=
ALGOLIA_SECRET=
```