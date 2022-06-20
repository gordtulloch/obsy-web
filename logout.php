<?php
//This page let log in
include('config.php');
include('header.php');
if (isset($_SESSION['username'])) {
    unset($_SESSION['username'], $_SESSION['userid']);
    setcookie('username', '', time() - 100);
    setcookie('password', '', time() - 100);
    setcookie('currsecurity', '', time() - 100);
    setcookie('tzone', '', time() - 100);
    
    ?>

<div class="message">You have successfully been logged out.<br /></div>

<?php
}
include('footer.php');
