<?php

include('config.php');
include('header.php');
$debug = 1;
if ($debug) {
    echo "Start<br>";
}

if ($debug) {
    var_dump($_POST);
}
$instName = mysqli_real_escape_string($mysqli, $_POST['instName']);
$instObs = mysqli_real_escape_string($mysqli, $_POST['instObs']);
$instType = mysqli_real_escape_string($mysqli, $_POST['instType']);
$instDesc = mysqli_real_escape_string($mysqli, $_POST['instDesc']);
$instMission = mysqli_real_escape_string($mysqli, $_POST['instMission']);
$setDefault = mysqli_real_escape_string($mysqli, $_POST['setDefault']);

if (isset($_POST['instName'])) {
    if ($req = mysqli_query($mysqli, "select * from instrument where name='" . $instName . "'")) {
        if ($debug) {
            var_dump($req);
        }
        $dn = mysqli_fetch_array($req);
        if ($debug) {
            var_dump($dn);
        } 
    }

    if (mysqli_num_rows($req) > 0) {
        echo "Error: Cannot add duplicate instruments<br>";
        exit;
    } else {
        echo "Adding instrument...<br>";
        $defaultChecked = 0;
        if (isset($setDefault)) { $defaultChecked = 1; }
        $sqlstmt = "INSERT INTO `instrument`(`name`, `observatory`, `type`, `description`, `mission`, `defaultPerson`) VALUES ('" 
                . $instName . "','" . $instObs . "','" . $instType . "','" . $instDesc . "','" . $instMission . "'," . $defaultChecked . ")";
        if ($debug) {
            echo $sqlstmt . "<br>";
        }
        if (mysqli_query($mysqli, $sqlstmt)) {
            echo 'Added instrument Click <a href="instList.php">here</a> to continue.';
        } else {
            echo 'Failed to add instrument. Click <a href="instList.php">here</a> to continue.';
        }
    }
} else {
    echo "No data in form<br>";
}   
include('footer.php');