<?php
//This page displays a list of all registered members
include('config.php');
include('header.php');
if (isset($_SESSION['username'])) {
    $dnn = mysql_fetch_array(mysql_query('select username,guild from users where username="' . $_SESSION['username'] . '"'));
    $username = htmlentities($dnn['username'], ENT_QUOTES, 'UTF-8');
    $guild = htmlentities($dnn['guild'], ENT_QUOTES, 'UTF-8');
    ?>
    <center><h2><font color="white"><?php echo ucwords($guild); ?> Roster</font></h2></center>
    <table>
        <tr>
            <th>Username</th>
            <th>Member Since</th>
            <th>Security Level</th>
        </tr>
        <?php
        $req = mysql_query('select id,username, signup_date, security_level from users where guild="' . $guild . '"');
        while ($dnn = mysql_fetch_array($req)) {
            $currname = htmlentities($dnn['username'], ENT_QUOTES, 'UTF-8');
            $id=$dnn['id'];
            
            ?>
            <tr>
                <td><a href="profile.php?id=<?php echo $dnn['id']; ?>"><?php echo htmlentities($dnn['username'], ENT_QUOTES, 'UTF-8'); ?></a></td>
                <td><?php echo date('Y/m/d', $dnn['signup_date']); ?></td>
                <td><div class="dropdown"><?php
                        switch ($dnn['security_level']) {
                            case 0 : echo "Not approved";
                                break;
                            case 1 : echo "Trial Member";
                                break;
                            case 2 : echo "Full Member";
                                break;
                            case 7 : echo "Site Operator";
                                break;
                            case 99: echo "Administrator";
                                break;
                        }
                        ?>
                        <button onclick="myFunction()" class="dropbtn">edit</button>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="changelevel.php?id=<?php echo $id; ?>&level=0">Not approved</a>
                            <a href="changelevel.php?id=<?php echo $id; ?>&level=1">Trial Member</a>
                            <a href="changelevel.php?id=<?php echo $id; ?>&level=2">Full Member</a>
                            <a href="changelevel.php?id=<?php echo $id; ?>&level=3">Tracker</a>
                            <a href="changelevel.php?id=<?php echo $id; ?>&level=4">Officer</a>
                            <a href="changelevel.php?id=<?php echo $id; ?>&level=5">Guild Leader</a>
                            <a href="changelevel.php?id=<?php echo $id; ?>&level=6">Alliance Leader</a>
                            <a href="changelevel.php?id=<?php echo $id; ?>&level=7">Site Operator</a>
                        </div>
                    </div>
                </td>
            </tr>
            <?php
        }
    } else {
        echo '<div class="message">Please log in to access this function<br>';
        echo '<A HREF="login.php">Click here</A></div>';
    }
    ?>
</table>
<?php
$nologin = TRUE;
$nobotbar = TRUE;
include('footer.php');
?>
