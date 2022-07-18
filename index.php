<?php
include ('header.php');

$debug=0;
if ($debug) {
        var_dump($_SESSION);
    }
?>
<br>
<div class="jumbotron jumbotron-fluid">
    <div class="container">

        <?php
        if ($_SESSION['username']) {
            echo '<Center><h1>Welcome to OBSY Observatory Management System</h1>';
            echo '<br><h2>Please select an option from the menu above.</h2></center>';
        } else {
            echo '<br><center>Welcome to OBSY Observatory Management System<BR>';
            echo "<br>OBSY is your one stop shop for managing one or more INDI connnected observatories!<br></center>";
            ?>
        </div>
    </div>
    <div class='container'>
        <form action="do_login.php" method="POST">
            <div class="form-group">
                <label for="loginEmail">Email address</label>
                <input type="email" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
            <button type="submit" class="btn btn-secondary">Submit</button>
        </form>

    </div>
    </div>

    <?php
}
include ('footer.php');
?> 
