<?php
//This page display the profile of an user
include('config.php');
include('header.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $dn = mysql_query('select username, email, avatar, signup_date from users where id="' . $id . '"');
    if (mysql_num_rows($dn) > 0) {
        $dnn = mysql_fetch_array($dn);

        if ($_SESSION['userid'] == $id) {
            ?>
            <br /><div class="center">
                <a href="edit_profile.php" class="button">Edit my profile</a>
                <a href="batphonewizard.php" class="button">Batphone wizard</a>
                <a href="addroster.php" class="button">Add Alt</a>
                <a href="edit_theme.php" class="button">Change theme</a></div>
            <?php
        }
        ?>
        <table style="width:500px;">
            <tr>
                <td><?php
        if ($dnn['avatar'] != '') {
            echo '<img src="' . htmlentities($dnn['avatar'], ENT_QUOTES, 'UTF-8') . '" alt="Avatar" style="max-width:100px;max-height:100px;" />';
        } else {
            echo 'This user has no avatar.';
        }
        ?></td>
                <td class="center"><h1><?php echo htmlentities($dnn['username'], ENT_QUOTES, 'UTF-8'); ?></h1>
                    This user joined the website on <?php echo date('Y/m/d', $dnn['signup_date']); ?></td>
            </tr>
        </table>

                    <?php
                    if (isset($_SESSION['username']) and $_SESSION['username'] != $dnn['username']) {
                        ?>
            <br /><a href="new_pm.php?recip=<?php echo urlencode($dnn['username']); ?>" class="big">Send a PM to "<?php echo htmlentities($dnn['username'], ENT_QUOTES, 'UTF-8'); ?>"</a>
            <?php
        }
    } else {
        echo 'This user doesn\'t exist.';
    }
} else {
    echo 'The ID of this user is not defined.';
}
?>
<br>
<?php
include ('footer.php');
?>
