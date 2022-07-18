<?php

include('config.php');
$debug = 0;
if ($debug) {
    echo "Start<br>";
    echo "From POST User = " . $_POST['username'] . " password " . sha1($_POST['password']) . "<br>";
}

if (isset($_POST['username'], $_POST['password'])) {
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password = $_POST['password'];
    if ($debug) {
        echo "From assignment User = " . $username . " password " . $password . "<br>";
    }

    $sqlstmt = 'select password,id,tzone,security_level from users where username="' . $username . '"';
    if ($debug) {
        echo "Sql=" . $sqlstmt . "<br>";
    }

    $req = mysqli_query($mysqli, $sqlstmt);

    if ($debug) {
        var_dump($req);
        echo "<br>";
    }

    $dn = mysqli_fetch_array($req);
    if ($debug) {
        echo "From query password = " . $dn['password'] . " compared to password " . sha1($_POST['password']) . "<br>";
    }
    if ($dn['password'] == sha1($password) and mysqli_num_rows($req) > 0) {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['userid'] = $dn['id'];
        $_SESSION['security_level'] = $dn['security_level'];
        $_SESSION['tzone'] = $dn['tzone'];
    }
}
if ($debug) {
    var_dump($_SESSION);
}
header('Location: index.php');
