<?php
//This page displays the list of the forum's categories
include('config.php');
require_once('simplecalendar/SimpleCalendar.php');
$calendar = new donatj\SimpleCalendar();
$calendar->setStartOfWeek('Sunday');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
        <title>Calendar of Events</title>
    </head>
    <body>
    	<div class="header">
        	<a href="<?php echo $url_home; ?>"><img src="<?php echo $design; ?>/images/logo.png" alt="Home" /></a>
	    </div>
        <div class="content">

<div class="box">
	<div class="box_left">
            <h2>Calendar of Events</h2>
    </div>
	
	<div class="clean"></div>
</div>
            <div class="box"><center><IMG SRC="images/firstpage/logo.gif"><br>
                            <H1><?php echo date("F Y"); ?></h1></center>
<?php
$thisyear=date("Y");
$thismonth=date("n");
$sqlquery= 'select * from calendar where MONTH(datestart)='.$thismonth.' AND YEAR(datestart)='.$thisyear;
if ($result=mysql_query($sqlquery)) {
while ($dnn = mysql_fetch_array($result)){
    $eventname = htmlentities($dnn['eventname'], ENT_QUOTES, 'UTF-8');
    $datestart = $dnn['datestart'];
    $dateend = $dnn['dateend'];
    $calendar->addDailyHtml($eventname, $datestart, $dateend);
    }
    $calendar->show(true);
} else {
echo '<div class="message">ERROR Loading Calendar Entries!</div>';
}

?>
</div>
	<div class="foot"><a href="index.php">Return to Main Site</div>
	</body>
</html>