<?php

  echo "Hello, I'm PHP!";
  error_log("Log errors here");
  $conn = new mysqli($_ENV["MYSQL_HOSTNAME"], $_ENV["MYSQL_USERNAME"], $_ENV["MYSQL_PASSWORD"], $_ENV["MYSQL_DATABASE"]);  

?>
