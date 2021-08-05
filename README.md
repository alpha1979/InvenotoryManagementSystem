## <h1>Inventory Management System</h1>
This project is built on Laravel 8, bootstrap 

## to run the site
<ul>
    <li>
        Clone the product using https://github.com/alpha1979/InvenotoryManagementSystem.git
    </li>
    <li>
        copy the env.example to .env
    </li>
    <li>
        create the database my_project , user :- root password :- none
    </li>
    <li>
    use cli to install composer dependency 
    - composer install
    </li>
    <li>
    cli command to generate key
    - php artisan key:generate
    </li>
     <li>
    you need to migrate the db
    - php artisan migrate
    </li>
     <li>
    
    php artisan db:seed
    </li>
    <li>
      Ready to go :- php artisan serve
    </li>
    
    
    <li>
    
    -  http://localhost:8000
    

    </li>
## Site Navigation

<li>Welcome Page 
    <ul>
        <li>product </li>
        <li>cart </li>
        <li>login </li>
        <li>registration </li>


    <ul>
</li>

<li>Product Page requires user login</li>

<li>cart Page can be accessed without user login however to place order need to be login</li>

