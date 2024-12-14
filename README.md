### 1st time setup

1. Run `composer install`
2. Duplicate .env.example and rename to .env
3. Setup .env file. Please set this variable
    - Database
        - DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD
4. Run `php artisan key:generate`
5. Run `php artisan storage:link`
6. Run `php artisan migrate`
7. Run `php artisan db:seed` #will seed admin authentication
