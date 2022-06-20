<?php
include('config.php');
include_once('dbi_connect.php');
$debug = 0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
        <title>Sign Up</title>
    </head>
    <body>
        <div class="header">
            <a href="<?php echo $url_home; ?>"><img src="<?php echo $design; ?>/images/logo.png" alt="Member Area" /></a>
        </div>
        <?php
        if ($debug) {
            echo '"' . $_POST['username'] . '", "' . $_POST['password'] . '", "' . $_POST['passverif'] . '", "' . $_POST['email'] . '", "' . $_POST['tzone'] . '"<br>';
        }

        if (isset($_POST['username'], $_POST['password'], $_POST['passverif'], $_POST['email'], $_POST['tzone']) and $_POST['username'] != '') {
            if ($debug) {
                echo "Passed POST check <br>";
            }
            if ($_POST['password'] == $_POST['passverif']) {
                if ($debug) {
                    echo "Passed password verification check <br>";
                }
                if (strlen($_POST['password']) >= 6) {
                    if ($debug) {
                        echo "Passed password length check <br>";
                    }
                    if (preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i', $_POST['email'])) {
                        if ($debug) {
                            echo "Passed email character check <br>";
                        }
                        //$username = mysql_real_escape_string($_POST['username']);
                        //$password = mysql_real_escape_string(sha1($_POST['password']));
                        //$email = mysql_real_escape_string($_POST['email']);
                        //$tzone = mysql_real_escape_string($_POST['tzone']);
                        $username = $_POST['username'];
                        $password = sha1($_POST['password']);
                        $email = $_POST['email'];
                        $tzone = $_POST['tzone'];
                        if ($debug) {
                            echo $username . " " . $password . " " . $email . " " . $tzone;
                        }
                        $dn = mysqli_num_rows(mysqli_query($mysqli,'select id from users where username="' . $username . '"'));
                        if ($debug) {
                            echo "DN=" . $dn;
                        }
                        if ($dn == 0) {
                            $dn2 = mysqli_num_rows(mysqli_query($mysqli,'select id from users'));
                            $id = $dn2 + 1;
                            $userinsert = 'insert into users(id, username, password, email, signup_date, security_level,tzone) values ('
                                    . $id . ', "' . $username . '", "' . $password . '", "' . $email . '", "' . time() . '",0,"' . $tzone . '")';
                            if ($debug) {
                                echo $userinsert;
                            }
                            if (mysqli_query($mysqli,$userinsert)) {
                                ?>
                                <div class="message">You have successfully been signed up. You can now log in.<br />
                                    <a href="login.php">Log in</a></div>
                                <?php
                            } else {

                                $message = 'An error occurred while signing you up. SQL: ' . $userinsert;
                            }
                        } else {

                            $message = 'Another user already use this username.';
                        }
                    } else {

                        $message = 'The email you typed is not valid.';
                    }
                } else {

                    $message = 'Your password must have a minimum of 6 characters.';
                }
            } else {

                $message = 'The passwords you entered are not identical.';
            }
        } else {
            echo '<div class="message">' . $message . '<br />';
            echo '<a href="signup.php">Sign Up</a></div>';
        }

        $nologin = TRUE;
        include ('footer.php');
        ?>