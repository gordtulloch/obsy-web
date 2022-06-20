<?php
include_once('config.php');
include_once 'dbi_connect.php';
include_once 'functions.php';
$debug = 0;

if (!isset($_SESSION['username'])){
    header("location:login.php");
}
$curruser=$_SESSION['username'];

if ($debug) {
    echo "<p>Curruser=$curruser</p>";
    echo "<p>Function=" . $_POST['function'] . "</p>";
}

// Go find guild for user
$guildquery = sprintf("SELECT guild FROM users where username='%s'", $curruser);
if ($debug) {
    echo "<p>query = $guildquery</p>";
}
if (!$guildresult = mysqli_query($mysqli, $guildquery)) {
    $errormsg = sprintf("<p>Query failed: %s</p>", $mysqli->error);
    echo $errormsg;
    exit;
}
$guildrow = $guildresult->fetch_row();
$userguild = $guildrow[0];
if ($debug) {
    echo "<p>Users guild is $userguild</p>";
}

switch ($_POST['function']) {
    case "":
        include 'header.php';


        mysqli_free_result($guildresult);
        // Load the guild MOTD message
        $query = sprintf("SELECT message,username FROM motd WHERE function='%s'", $userguild);
        if ($result = $mysqli->query($query)) {
            $row = $result->fetch_row();
            $message = $row[0];
            $musername = $row[1];
        } else {
            echo "Error querying existing global message";
        }
        mysqli_free_result($result);
        ?>
        <div class="box"><h2><Center>Set <?php echo ucwords($userguild); ?> Message of the Day</Center></h2>
            <center>Enter the message to set below<br><br>

                <form action="gmotd.php" method="POST">
                    <textarea cols="80" rows="15" name="message" id="message"><?php echo $message; ?></textarea><br><br>Previously set by <?php echo $musername; ?><br><br>
                    <input type="submit" name="function" value="Save"/><input type="submit" name="function" value="Cancel"/>
                </form></div>

        <?php
        break;
    case "Save": 
        $message = $_POST['message'];
        $query = sprintf("UPDATE motd set message='%s',username='%s' WHERE function='%s'", $message, $curruser, $userguild);
        if ($debug) {
            echo "<p>Savequery is $query</p>";
        }
        if (!$mysqli->query($query)) {
            echo "Error:" . $mysqli->error . "<br>";
            echo '<A HREF="index.php"><p>Press any key to return to menu</p></a>';
        }
        header("location:index.php");
        break;
    case "Cancel": header("location:index.php");
        break;
} // switch

include ('footer.php');
?>