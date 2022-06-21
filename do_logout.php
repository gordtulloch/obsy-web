<?php
//This page let log in
include('config.php');

if (isset($_SESSION['username'])) {
    unset($_SESSION['username'], $_SESSION['userid']);
    setcookie('username', '', time() - 100);
    setcookie('password', '', time() - 100);
    setcookie('currsecurity', '', time() - 100);
    setcookie('tzone', '', time() - 100);
    include('header.php');
    ?>

include('header.php');


    <?php
}
include('footer.php');
