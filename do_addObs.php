<?php
include('config.php');
$debug = 1;
if ($debug) {
    echo "Start<br>";
}

if ($debug) {
    echo $_POST[0];
}

if (isset($_POST['name'])) {
    if ($debug) {
        echo "Isset worked<br>";
    }
    $obsName = mysqli_real_escape_string($mysqli, $_POST['name']);
    $obsLocation = mysqli_real_escape_string($mysqli, $_POST['location']);
    $obsCountry = mysqli_real_escape_string($mysqli, $_POST['country']);
    $obsTZ = mysqli_real_escape_string($mysqli, $_POST['tz']);
    $obsContact = mysqli_real_escape_string($mysqli, $_POST['contact']);
    $obsEmail = mysqli_real_escape_string($mysqli, $_POST['email']);
    $obslatitude = mysqli_real_escape_string($mysqli, $_POST['latitude']);
    $obsLongitude = mysqli_real_escape_string($mysqli, $_POST['longitude']);
    $obsDefault = mysqli_real_escape_string($mysqli, $_POST['setDefault']);

    if ($req = mysqli_query($mysqli, 'select * from observatory where name="' . $obsName . '"')) {
        $dn = mysqli_fetch_array($req);
        if ($debug) {
            var_dump($dn);
        }

        if (mysqli_num_rows($req) > 0) {
            echo "Error: Cannot add duplicate observatories";
            exit;
        }
    } else {
        echo "Adding observatory...";
        $sqlstmt = "INSERT INTO `observatory`(`name`, `location`, `country`, `tz`, `contact`, `email`, `latitude`, `longitude`, `defaultObs`) "
                . "VALUES ('" . $obsName . "','" . $obsLocation . "','".$obsCountry."','".$obsTZ."','".$obsContact."','".$obsEmail
                ."','".$obslatitude."','".$obsLongitude."',".$obsDefault;
        if ($debug) {
            echo $sqlstmt."<br>";
        }
        if (mysqli_query($mysqli, $sqlstmt)) {
            echo 'Added observatory. Click <a href="obsList.php">here</a> to continue.';
        } else {
            echo 'Failed to add observatory. Click <a href="obsList.php">here</a> to continue.';
        }
    }
}