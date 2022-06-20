<?php
include('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
            <script src="https://s3.amazonaws.com/menumaker/menumaker.min.js" type="text/javascript"></script>
            <script src="script.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
                <!-- Latest compiled and minified CSS -->
                <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
                    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css">
                        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
                        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
                        <title>OBSY Observatory Management System</title>
                        </head>
                        <body>
                            <center>
                                <a href="<?php echo $url_home; ?>"><img src="<?php echo $design; ?>/images/logo.png" alt="Logo" /></a>
                            </center>
                            <?php
                            if (isset($_SESSION['username'])) {
                                ?>
                                <div id="cssmenu">
                                    <ul>
                                        <li><a href="index.php"><i class="fa fa-fw fa-home"></i> Home</a></li>
                                        <li><a href="#"><i class="fa fa-fw fa-shield"></i> Observing</a>
                                            <ul>
                                                <li><a href="schedule.php"><i class="fa fa-fw fa-cog"></i> Schedule</a></li>
                                                <li><a href="targeting.php"><i class="fa fa-fw fa-newspaper-o"></i> Targeting</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><i class="fa fa-fw fa-bullseye"></i> Processing</a>
                                            <ul>
                                                <li><a href="obsByDate.php"><i class="fa fa-fw fa-bars"></i> Observations by Date</a></li>
                                                <li><a href="obsByTarget.php"><i class="fa fa-fw fa-crosshairs"></i> Observations by Target</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><i class="fa fa-fw fa-users"></i> Configuration</a>
                                            <ul>
                                                <li><a href="confObs.php"><i class="fa fa-fw fa-bullhorn"></i> Observatories</a></li>
                                                <li><a href="confInstr.php"><i class="fa fa-fw fa-binoculars"></i> Instruments</a></li>
                                                <li><a href="confPeople.php"><i class="fa fa-fw fa-binoculars"></i> Observers</a></li>
                                                <li><a href="confPeople.php"><i class="fa fa-fw fa-binoculars"></i> Targets</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><i class="fa fa-fw fa-fort-awesome"></i> Resources</a>
                                            <ul>
                                                <!-- <li><a href="forum.php" target="_blank"><i class="fa fa-fw fa-shopping-bag"></i> OBSY Forum</a></li> -->
                                                <li><a href="https://www.telescopius.com" target="_blank"><i class="fa fa-fw fa-shopping-bag"></i> Telescopius</a></li>
                                                <li><a href="https://www.astrospheric.com" target="_blank"><i class="fa fa-fw fa-magic"></i> Astrospheric</a></li>
                                                <li><a href="https://www.cleardarksky.com" target="_blank"><i class="fa fa-fw fa-diamond"></i> Clear Dark Sky</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><i class="fa fa-fw fa-phone"></i> Contact</a>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-fw fa-envelope-o"></i> Contact Us</a></li>
                                                <li><a href="#"><i class="fa fa-fw fa-facebook-official"></i> Facebook</a></li>
                                                <li><a href="#"><i class="fa fa-fw fa-twitter"></i> Twitter</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="logout.php"><i class="fa fa-fw fa-phone"></i> Logout</a>

                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                            <div class="content">


