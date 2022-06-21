<?php
include ('header.php');

if (isset($_SESSION['username'])) {
    ?>
<br>
<div class='container'><h2>Add Observatory</h2><br>
    
        <form action="do_addObs.php" method="POST"> 
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="obsName">Observatory Name</label>
                    <input type="text" class="form-control" name="obsName" id="obsName" placeholder="My Observatory Name">
                </div>
                <div class="form-group col-md-6">
                    <label for="obsLocation">Location (City,Prov/State)</label>
                    <input type="text" class="form-control" name="obsLocation" id="obsLocation" placeholder="Winnipeg, Manitoba">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="obsCountry">Country</label>
                    <input type="text" class="form-control" name="obsCountry" id="obsCountry" placeholder="Canada">
                </div>
                <div class="form-group col-md-6">
                    <label for="obsTZ">Time Zone</label>
                    <input type="text" class="form-control" name="obsTZ" id="obsTZ" placeholder="CST6CDT">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="obsContact">Main Contact Name</label>
                    <input type="text" class="form-control" name="obsContact" id="obsContact" placeholder="John Smith">
                </div>
                <div class="form-group col-md-6">
                    <label for="obsEmail">Main Contact Email</label>
                    <input type="email" class="form-control" name="obsEmail" id="obsEmail" placeholder="jsmith121@gmail.com">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="obsLat">Latitude (positive North)</label>
                    <input type="text" class="form-control" name="obsLat" id="obsLat" placeholder="49.8951">
                </div>
                <div class="form-group col-md-6">
                    <label for="obsLong">Longitude (Positive East)</label>
                    <input type="text" class="form-control" name="obsLong" id="obsLong" placeholder="-97.1384">
                </div>
            </div>
            
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="setDefault" id="setDefault">
                    <label class="form-check-label" for="gridCheck">
                        Set as Default for this account
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-secondary">Save</button>
        </form><br>
    </div>
    <?php
} else {
    header('Location:' . $url_home);
}
include ('footer.php');
?>