<?php
//This page let log in
include('config.php');
$debug = 0;

if (isset($_SESSION['username'])) {
    if ($debug) {
        echo "Username set from cookie<br>";
    }
    unset($_SESSION['username'], $_SESSION['userid']);
    setcookie('username', '', time() - 100);
    setcookie('password', '', time() - 100);
    setcookie('currsecurity', '', time() - 100);
    setcookie('tzone', '', time() - 100);

} else {
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
                ?>

                <div class="message">You have successfully been logged in!<br />
                    <a href="<?php echo $url_home; ?>">Go to Main Page</a></div>
                <?php
            } else {
                $form = true;
                $message = 'The username or password you entered not recognized.';
            }
        } else {
            echo "SQL Error: Unable to query user database";
            die;
        }
    } else {
        if ($debug) { echo "Not isset"; }
        $form = true;
    }
    if ($form) {
        ?>

        <?php
        if (isset($message)) {
            echo '<div class="message">' . $message . '</div>';
        }
        ?>
        <div class="content">
        <?php
        $nb_new_pm = mysqli_fetch_array(mysqli_query($mysqli, 'select count(*) as nb_new_pm from pm where ((user1="' . $_SESSION['userid'] . '" and user1read="no") or (user2="' . $_SESSION['userid'] . '" and user2read="no")) and id2="1"'));
        $nb_new_pm = $nb_new_pm['nb_new_pm'];
        ?>

            <form action="login.php" method="post">
                Please, type your IDs to log:<br />
                <div class="login">
                    <label for="username">Username</label><input type="text" name="username" id="username" value="<?php echo htmlentities($ousername, ENT_QUOTES, 'UTF-8'); ?>" /><br />
                    <label for="password">Password</label><input type="password" name="password" id="password" /><br />
                    <input type="submit" value="Login" />
                </div>
            </form>
        </div>
        <?php
    }
}
$nologin = TRUE;
$nobotbar = TRUE;
?>