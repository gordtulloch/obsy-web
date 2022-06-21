<?php
include ('header.php');

if (isset($_SESSION['username'])) {
    ?>
<br>
<div class='container'><h2>Add Observer</h2><br>
        <form action="do_addPerson.php" method="post"> 
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="perFirst">First Name</label>
                    <input type="text" class="form-control" id="perFirst" placeholder="John">
                </div>
                <div class="form-group col-md-6">
                    <label for="perLast">Last Name</label>
                    <input type="text" class="form-control" id="perLast" placeholder="Smith">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="perCountry">Country</label>
                    <input type="text" class="form-control" id="perCountry" placeholder="Canada">
                </div>
                <div class="form-group col-md-6">
                    <label for="perTZ">Time Zone</label>
                    <input type="text" class="form-control" id="perTZ" placeholder="CST6CDT">
                </div>
            </div>
            <div class="form-row">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="setDefault">
                    <label class="form-check-label" for="gridCheck">
                        Set as Default for this account
                    </label>
                </div>
            </div><br>
            <button type="submit" class="btn btn-secondary">Save</button>
        </form><br>
    </div>
    <?php
} else {
    header('Location:' . $url_home);
}
include ('footer.php');
?>