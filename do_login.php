<?php
include('config.php');
$debug = 0;
if ($debug) {
        echo "Start<br>";
    }

    if ($debug) {
        echo "Username query<br>";
    }
    if ($debug) {
        echo "From POST User = " . $_POST['username'] . " password " . sha1($_POST['password']) . "<br>";
    }

    if (isset($_POST['username'], $_POST['password'])) {
        if ($debug) {
        echo "Isset worked<br>";
        }   
        $username = mysqli_real_escape_string($mysqli,$_POST['username']);
        $password = $_POST['password'];
        if ($req = mysqli_query($mysqli, 'select password,id,tzone,security_level from users where username="' . $username . '"')) {
            $dn = mysqli_fetch_array($req);
            if ($debug) {
                var_dump($dn);
            }
            if ($debug) {
                echo "From query password = " . $dn['password'] . " compared to password " . sha1($_POST['password']) . "<br>";
            }
            if ($dn['password'] == sha1($password) and mysqli_num_rows($req) > 0) {
                $form = false;
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['userid'] = $dn['id'];
                $_SESSION['security_level'] = $dn['security_level'];
                $_SESSION['tzone'] = $dn['tzone'];
                header('Location:'.$url_home);
                } 
        } else {
            echo "SQL Error: Unable to query user database";
            die;
        }
    } else {
        if ($debug) { echo "Not isset"; }
        header('Location:'.$url_home);
    }

