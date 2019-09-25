<?php

  error_log("This is where errors show up");
  $conn = new mysqli($_ENV["MYSQL_HOSTNAME"], $_ENV["MYSQL_USERNAME"], $_ENV["MYSQL_PASSWORD"], $_ENV["MYSQL_DATABASE"]);  
  $databases = mysqli_query($conn, "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA");
  foreach ($databases as $db) {
      echo "Database Exists: {$db['SCHEMA_NAME']} \n";
  }

?>