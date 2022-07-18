<?php

include('config.php');
include('header.php');
$debug = 0;
if ($debug) {
    echo "Start<br>";
}

if ($debug) {
    var_dump($_POST);
}
$obsName = mysqli_real_escape_string($mysqli, $_POST['obsName']);
$obsLocation = mysqli_real_escape_string($mysqli, $_POST['obsLocation']);
$obsCountry = mysqli_real_escape_string($mysqli, $_POST['obsCountry']);
$obsTZ = mysqli_real_escape_string($mysqli, $_POST['obsTZ']);
$obsContact = mysqli_real_escape_string($mysqli, $_POST['obsContact']);
$obsEmail = mysqli_real_escape_string($mysqli, $_POST['obsEmail']);
$obslatitude = mysqli_real_escape_string($mysqli, $_POST['obsLat']);
$obsLongitude = mysqli_real_escape_string($mysqli, $_POST['obsLong']);
$obsDefault = mysqli_real_escape_string($mysqli, $_POST['setDefault']);

if (isset($_POST['obsName'])) {
    if ($req = mysqli_query($mysqli, "select * from observatory where name='" . $obsName . "'")) {
        if ($debug) {
            var_dump($req);
        }
        $dn = mysqli_fetch_array($req);
        if ($debug) {
            var_dump($dn);
        } 
    }

    if (mysqli_num_rows($req) > 0) {
        echo "Error: Cannot add duplicate observatories<br>";
        exit;
    } else {
        echo "Adding observatory...<br>";
        $sqlstmt = "INSERT INTO `observatory`(`name`, `location`, `country`, `tz`, `contact`, `email`, `latitude`, `longitude`, `defaultObs`) "
                . "VALUES ('" . $obsName . "','" . $obsLocation . "','" . $obsCountry . "','" . $obsTZ . "','" . $obsContact . "','" . $obsEmail
                . "','" . $obslatitude . "','" . $obsLongitude . "','" . $obsDefault . "')";
        if ($debug) {
            echo $sqlstmt . "<br>";
        }
        if (mysqli_query($mysqli, $sqlstmt)) {
            echo 'Added observatory. Click <a href="obsList.php">here</a> to continue.';
        } else {
            echo 'Failed to add observatory. Click <a href="obsList.php">here</a> to continue.';
        }
    }
} else {
    echo "No data in form<br>";
}   
include('footer.php');