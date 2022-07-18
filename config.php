<?php
define("HOST", "localhost");        // The host you want to connect to.
define("USER", "obsy");             // The database username. 
define("PASSWORD", "obsy");         // The database password. 
define("DATABASE", "obsy");         // The database name.

$debug=0;

$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

if ($debug) {
        echo "Connected to MySQL<br>";
    }

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} 

//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$url_home='index.php';

session_start();
?>


