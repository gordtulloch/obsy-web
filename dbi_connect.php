<?php
/**
 * These are the database login details
 */  
define("HOST", "localhost");               // The host you want to connect to.
define("USER", "obsy");                                              // The database username. 
define("PASSWORD", "obsy");         // The database password. 
define("DATABASE", "obsy");                 // The database name.

$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>

