# Post App

A simple PHP application to manage posts. This application allows users to add, edit, delete, and view posts.

## Setup

1. Clone the repository to your local machine.
2. Create a MySQL database named `postapp`.
3. Update the database configuration in `config/config.php` with your database credentials.
4. Import the database schema and sample data (if any) into your MySQL database.

## Database Configuration

Update the `config/config.php` file with your database credentials:

```php
<?php

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'your_password');
define('DB_NAME', 'postapp');

?>
