# Website Posts

## Requirements
* Laravel 10
* Mysql

### Install
cp .env.example .env  
config .env for database and mail
```composer install```  
```php artisan migrate```  
```php artisan db:seed```   [Optional]
```php artisan queue:work // Or each queue config you set``` 
