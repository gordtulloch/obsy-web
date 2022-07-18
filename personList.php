<?php

include('config.php');
include('header.php');
$debug = 1;
$query = "select * from person";
$result = mysqli_query($mysqli, $query);

// Dump Observatory List
echo '<div class="container"><table class="table">';
echo "<tr><th>Name</th><th>Country</th><th>TZ</th></tr>";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { 
    echo '<tr><td><a href="">'.$row['lname'].", ".$row['fname']."</a></td><td>".$row['country']."</td><td>".$row['tz']
            ."</td><td></td><td></td><td></td><td><button type='button' class='btn btn-danger btn-sm' >Del</button></td></tr>";
}
echo '<tr><td></td><td></td><td></td><td></td><td></td><td></td><td><a href="addPerson.php"><button type="button" class="btn btn-primary btn-sm">Add</button></A></td></tr>';
echo "</table></div>";

include('footer.php');
