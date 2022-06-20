<?php

// Function within_hours returns 1 if now() (converted to ET) is in the provided window or 0 if not
function within_hours($hours)
  {
  $debug=0;
  if ($debug) { echo "<p>In function</p>"; }
  // Parse the input
  $start_window = substr($hours,0,5); 
    if ($debug) { echo "<p>Start = |$start_window|</p>"; }
  $end_window=substr($hours,6,11);    
    if ($debug) { echo "<p>End   = |$end_window|</p>"; }

  // Convert evertyhing to integer time  
  $now = date('G:i',time() - 3600); // Convert CT to ET
  if ($debug) { echo "<p>Now   = $now</p>"; }

  $nowdate   = DateTime::createFromFormat('G:i', $now);
  if ($debug) { echo "<p>nowdate   = "; echo $nowdate->format('Y-m-d G:i'); echo "</p>";}
  $startdate = DateTime::createFromFormat('G:i', $start_window);
  if ($debug) { echo "<p>startdate = "; echo $startdate->format('Y-m-d G:i'); echo "</p>";}
  $enddate   = DateTime::createFromFormat('G:i', $end_window);
  if ($debug) { echo "<p>startdate = "; echo $enddate->format('Y-m-d G:i'); echo "</p>";}

  // If the startdate is > than the enddate it's the day before!

  if ($startdate > $enddate) {
    $startdate->sub(new DateInterval('P1D'));
    }

  // Compare the dates and return the right value
  if (($nowdate >= $startdate) && ($nowdate <= $enddate)) {
    if ($debug) { echo "<p>$hours IS in current window</p>"; } 
    return 1;
    } else {
    if ($debug) { echo "<p>$hours IS NOT in current window</p>"; } 
    return 0;
    }
  }

function findguild($mysqli,$user)
{
$debug=0;
// Go find guild for user
$guildquery = sprintf("SELECT guild FROM members where username='%s'",$user);
if ($debug) {echo "<p>query = $guildquery</p>";}
if (!$guildresult = mysqli_query($mysqli,$guildquery)) {
   	$errormsg 	= sprintf("<p>Query failed: %s</p>",$mysqli->error);
   	echo $errormsg;
   	return "";
   	}
   	
$guildrow 	= $guildresult->fetch_row();
$userguild	= $guildrow[0]; if ($debug) {echo "<p>Users guild is $userguild</p>";}
return $userguild;

mysqli_free_result($guildresult);
}
?>
