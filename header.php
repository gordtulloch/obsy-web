<?php
include('config.php');
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>OBSY Observatory Management System</title>
    </head>
    <body>

        <main>
            <center>
                <a href="<?php echo $url_home; ?>"><img src="default/images/logo.png" alt="Logo" /></a>
            </center>
            <?php
            if (isset($_SESSION['username'])) {
                ?>

                <header class="p-3 bg-dark text-white">
                    <div class="container">
                        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                                <li class="nav-item"><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
                                <li li class="nav-item dropdown"><a class="nav-link dropdown-toggle px-2 text-white" 
                                                                    data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Observe</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                </li>

                                <li li class="nav-item dropdown"><a class="nav-link dropdown-toggle px-2 text-white" 
                                                                    data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Process</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                </li>
                                <li li class="nav-item dropdown"><a class="nav-link dropdown-toggle px-2 text-white" 
                                                                    data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Analyze</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                </li>
                                <li li class="nav-item dropdown"><a class="nav-link dropdown-toggle px-2 text-white" 
                                                                    data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Configure</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="obsList.php">Observatories</a>
                                        <a class="dropdown-item" href="instList.php">Instruments</a>
                                        <a class="dropdown-item" href="personList.php">Observers</a>
                                </li>
                                <li class="nav-item"><a href="do_logout.php" class="nav-link px-2 text-white">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </header>
            </div>
        <?php } else { ?>
        <header class = "p-3 bg-dark text-white">
            <div class = "container">
                <div class = "d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <ul class = "nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    </ul>
                </div>
            </div>
        </header>
    </div>
    <?php } ?>



