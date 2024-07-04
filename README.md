# Website Posts

## Requirements
* Laravel 10
* Mysql

### Install
cp .env.example .env  
config .env for database and mail
config .env for chunk sizes
```composer install```  
```php artisan migrate```  
```php artisan db:seed```   [Optional]
```php artisan queue:work // Or each queue config you set``` 

### Sending emails
```php artisan app:send-emails```  

### API Doc:
pm_collection.json is a postman collection file. You could import and set baseUrl in collection and use.
