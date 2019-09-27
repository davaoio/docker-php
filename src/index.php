<?php

function error_handler($error_number, $error_msg)
{
    error_response($error_msg);
}

function error_response($message)
{
    echo '<h2><strong>Oops, something went wrong!</strong><br></h2>';
    echo '<strong>Error:</strong> ' . $message;
}

function do_query($connection, $query)
{
    return mysqli_query($connection, $query);
}

set_error_handler("error_handler");

try {
    $conn = new mysqli($_ENV["MYSQL_HOSTNAME"], $_ENV["MYSQL_USERNAME"], $_ENV["MYSQL_PASSWORD"], $_ENV["MYSQL_DATABASE"]);

    if ($conn->connect_error) {
        error_response($conn->connect_error);
    }

    // Check if user table exists, if not create.
    if (do_query($conn, "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'php-connect' AND TABLE_NAME = 'users'")->num_rows === 0) {
        if (!do_query($conn, "CREATE TABLE `users` ( `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL, `name` VARCHAR(255) NOT NULL, `ip_address` VARCHAR(255) NOT NULL);")) {
            error_response("Can't create users table.");
        }
    }

    $ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
    // Insert row
    do_query($conn, "INSERT INTO `users` (name, ip_address) VALUES ('steve', '$ip')");

    $users = do_query($conn, "SELECT * FROM users");

    if ($users->num_rows > 0) {
        foreach ($users as $user)
        {
            echo "<strong>ID:</strong> " . $user['id'] . "<br>";
            echo "<strong>Name:</strong> " . $user['name'] . "<br>";
            echo "<strong>IP:</strong> " . $user['ip_address'] . "<br><br>";
        }
    }
} catch (Exception $e) {
    error_response($e->getMessage());
}