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
$perFirst = mysqli_real_escape_string($mysqli, $_POST['perFirst']);
$perLast = mysqli_real_escape_string($mysqli, $_POST['perLast']);
$perCountry = mysqli_real_escape_string($mysqli, $_POST['perCountry']);
$perTZ = mysqli_real_escape_string($mysqli, $_POST['perTZ']);

if (isset($_POST['perFirst'])) {
    if ($req = mysqli_query($mysqli, "select * from person where fname='" . $perFirst . "' AND lname = '". $perLast . "'")) {
        if ($debug) {
            var_dump($req);
        }
        $dn = mysqli_fetch_array($req);
        if ($debug) {
            var_dump($dn);
        } 
    }

    if (mysqli_num_rows($req) > 0) {
        echo "Error: Cannot add duplicate observers<br>";
        exit;
    } else {
        echo "Adding observer...<br>";
        $defaultChecked = 0;
        if (isset($setDefault)) { $defaultChecked = 1; }
        $sqlstmt = "INSERT INTO `person`(`fname`, `lname`, `country`, `tz`, `defaultPerson`) VALUES ('" 
                . $perFirst . "','" . $perLast . "','" . $perCountry . "','" . $perTZ . "'," . $defaultChecked . ")";
        if ($debug) {
            echo $sqlstmt . "<br>";
        }
        if (mysqli_query($mysqli, $sqlstmt)) {
            echo 'Added observer Click <a href="personList.php">here</a> to continue.';
        } else {
            echo 'Failed to add observer. Click <a href="personList.php">here</a> to continue.';
        }
    }
} else {
    echo "No data in form<br>";
}   
include('footer.php');