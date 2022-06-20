<?php
function nicetime($date,$zone)
{
    if(empty($date)) {
        return "No date provided";
    }
    date_default_timezone_set($zone);
    
    $periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths         = array("60","60","24","7","4.35","12","10");
    
    $now             = time();
    $unix_date       = strtotime($date);
    
    // check validity of date
    if(empty($unix_date)) {    
        return "Bad date";
    }

    // is it future date or past date
    if($now > $unix_date) {    
        $difference     = $now - $unix_date;
        $tense         = "ago";
        
    } else {
        $difference     = $unix_date - $now;
        $tense         = "from now";
    }
    
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
    
    $difference = round($difference);
    
    if($difference != 1) {
        $periods[$j].= "s";
    }
    
    return "$difference $periods[$j] {$tense}";
}

function windowtime($date,$variance,$zone)
{
    if(empty($date)) {
        return "No date provided";
    }
    date_default_timezone_set($zone);
    
    $now             = time();
    $unix_date       = strtotime($date);
    
       // check validity of date
    if(empty($unix_date)) {    
        return "Bad date";
    }

    $difference     = ($variance*2) + (($unix_date - $now) / 3600);
   
    $hours = round($difference);
    $mins  = abs(round(($difference-round($difference)) * 60));
    
    return "<font face=\"verdana\" size=\"4\" color=\"red\">$hours h $mins m left</font>";
}

function is_in_window($startdatestr, $enddatestr,$zone)
{
    date_default_timezone_set($zone);
    $now             = time();
    $start_date      = strtotime($startdatestr);
    $end_date        = strtotime($enddatestr);
    
    if(($now > $start_date) && ($now <= $end_date)) { 
      return("<font face=\"verdana\" size=\"4\" color=\"red\">IN WINDOW</font>");
      }
    else {
      return("-");
      }
    
    }
    
function standardize_time($indate, $intzone) {
    date_default_timezone_set('America/New_York');
    $date = new DateTime($indate, new DateTimeZone(trim($intzone)));
    $date->setTimezone(new DateTimeZone('America/New_York'));
    return($date->format('Y-m-d H:i'));
}
function destandardize_time($indate, $intzone) {
    date_default_timezone_set($intzone);
    $date = new DateTime($indate, new DateTimeZone('America/New_York'));
    $date->setTimezone(new DateTimeZone($intzone));
    
    return($date->format('Y-m-d H:i'));
    
}
?>
