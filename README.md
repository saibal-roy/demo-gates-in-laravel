## About Laravel

```
laravel new gates-in-laravel
cd gates-in-laravel
cp .env.example .env
php artisan key:generate
composer require laravel/ui --dev
php artisan ui bootstrap --auth
npm install
npm run prod
touch database/database.sqlite
php artisan migrate --seed
```

## In .env

```
DB_CONNECTION=sqlite
```

## Artisan commands used

```
php artisan make:migration add_user_type_to_users_table --table=users
php artisan make:seeder UsersTableSeeder
php artisan make:provider BladeServiceProvider
```

## Notes
 - Dynamic page title for content pages
 - Gates demo with middleware for user_type like admin
 - Custom directive @admin @endadmin with custom BladeServiceProvider


## Quick Tips
If using VS Code then try using sqlite extension for vs code.

```
https://marketplace.visualstudio.com/items?itemName=alexcvzz.vscode-sqlite
```
