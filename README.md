# SustainEnergy
Private version
<br>
## Installation & usage
- After cloning the repo you have to update the vendor folder. You can update the vendor folder using this command.

```php
composer update
```

- After the updation you have to create the ```.env``` file. I suggest copying it from another project, or you can create a new one using this command.

```php
cp .env.example .env
```

- Now you have to generate the product key.

```php
php artisan key:generate
```

- Now migrate the tables to the database.

```php
php artisan migrate
```

- Now link the storage.

```php
php artisan storage:link
```

- We are done here. Now you have to just serve your project.

```php
php artisan serve
```

Open a new terminal & run the bellow command as well.

```php
npm install && npm run dev
```
The Project URLS
<br><br>
- User Main Page:<br>
http://127.0.0.1:8000/
<br><br>
- User Login Page:<br>
http://127.0.0.1:8000/login
<br><br>
- User Register Page:<br>
http://127.0.0.1:8000/register
<br><br>
- Admin Main Page:<br>
http://127.0.0.1:8000/admin/
<br><br>
- Admin Login Page:<br>
http://127.0.0.1:8000/admin/login
<br><br>
- Admin Register Page:<br>
http://127.0.0.1:8000/admin/register
<br><br>
The 'Admin' views uses bootstrap@5.3.2
