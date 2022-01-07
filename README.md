# profile-search

## Overview

I used Laravel to develop a simple search site.

## Description

You can search and view the profile of the talent.  
Administrator users can register and edit talents.

I also added an inquiry function.  
Administrator users can check the contents of inquiries in a list.

## Demo

<!-- ## VS. -->

## Requirement

-   "laravel/framework": "^8.40"

## Usage

login page  
[http://127.0.0.1:8000/login](http://127.0.0.1:8000/login)

Test user

-   Admininisrator 　　admin@ne.jp / admin123
-   User A 　　　　　 user@ne.jp / user1234
-   User B 　　　　　 user2@ne.jp / user2345

## Install

1. Get source code

    ```
    git clone git@github.com:t-aono/profile-search.git
    ```

2. Copy .env.example to create .env.

    ```
    cp .env-example .env
    ```

3. Create database/database.sqlite and prepare the database.

    ```
    touch database/database.sqlite
    ```

4. Add package.

    ```
    composer install
    ```

5. Link to storage

    ```
    php artisan storage:link
    ```

6. Start local development environment.

    ```
    php artisan key:generate
    php artisan migrate
    php artisan db:seed
    php artisan serve
    ```

<!-- ## Contribution -->

<!-- ## Licence -->

## Author

[t-aono](https://github.com/t-aono)

<!-- README.md Sample -->
<!-- https://deeeet.com/writing/2014/07/31/readme/ -->
