<?php

include('config.php');
include('header.php');
$debug = 1;
$query = "select * from instrument";
$result = mysqli_query($mysqli, $query);

// Dump Instrument List
echo '<div class="container"><table class="table">';
echo "<tr><th>Name</th><th>Observatory</th><th>Description</th><th>Type</th><th>Mission</th></tr>";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { 
    echo '<tr><td><a href="">'.$row['name']."</a></td><td>".$row['observatory']."</td><td>".$row['description']."</td><td>".$row['type']."</td><td>".$row['mission']."</td><td>"
            ."</td><td><button type='button' class='btn btn-danger btn-sm' >Del</button></td></tr>";
}
echo '<tr><td></td><td></td><td></td><td></td><td></td><td></td><td><a href="addInst.php"><button type="button" class="btn btn-primary btn-sm">Add</button></A></td></tr>';
echo "</table></div>";

include('footer.php');
