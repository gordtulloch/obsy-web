<?php

include('config.php');
include('header.php');
$debug = 1;
$query = "select * from observatory";
$result = mysqli_query($mysqli, $query);

// Dump Observatory List
echo '<div class="container"><table class="table">';
echo "<tr><th>Name</th><th>Location</th><th>Country</th><th>TZ</th><th>Latitude</th><th>Longitude</th></tr>";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { 
    echo '<tr><td><a href="">'.$row['name']."</a></td><td>".$row['location']."</td><td>".$row['country']."</td><td>".$row['tz']."</td><td>".$row['latitude']."</td><td>".$row['longitude']."</td><td><img src='x.jpg'></td></tr>";
}
echo '<tr><td></td><td></td><td></td><td></td><td></td><td><button type="button" class="btn btn-primary">Add</button></td></tr>';
echo "</table></div>";

include('footer.php');
