<?php
include('config.php');
include ('header.php');
include_once 'dbi_connect.php';

$debug = 1;
?>

<div class="box_splash">
    
    <?php
    if ($_SESSION['username']) {
        echo '<br><H1><font color="black">Welcome to OBSY Observatory Management System</H1>';
        echo '<br><font color="black"><Center>Please select an option from the menu above.</center><BR>';
        } else {
        echo '<br><H1><font color="black">Welcome to OBSY Observatory Management System</H1><BR>';
        echo "<br><center><h3>OBSY is your one stop shop for managing one or more INDI connnected observatories!<br>";
        echo "<br><i>Features include:</i><br><br>";
        echo 'to come';
        echo "<br>Sign up for access or login to your guild below.</center></h3><br><br><br>";
            }
    ?>
</div>
</div><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include ('footer.php');
?> 
