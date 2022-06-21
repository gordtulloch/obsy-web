<?php
include ('header.php');

if (isset($_SESSION['username'])) {
    ?>
    <br>
    <div class='container'><h2>Add Instrument</h2><br>
        <form action="do_addObs.php" method="post"> 
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="obsName">Instrument Name</label>
                    <input type="text" class="form-control" id="instName" placeholder="My Telescope Name">
                </div>
                <div class="form-group col-md-6">
                    <label for="obsLocation">Observatory (to be list)</label>
                    <input type="text" class="form-control" id="instObs" placeholder="SPAO Winnipeg">
                </div>
            </div>
            <div class="form-row">
                <label for="obsType">Type (to be list)</label>
                <input type="text" class="form-control" id="instType" placeholder="Telescope">
            </div>
            <div class="form-row">
                <label for="obsTZ">Description</label>
                <input type="textarea" class="form-control" rows="3" id="instDesc" placeholder="Skywatcher 250P on NEQ6, ASI183MM Pro (main) ASI224MC (guide) on 50mm">
            </div>
            <div class="form-row">
                <label for="obsContact">Mission</label>
                <input type="text" class="form-control" id="obsMission" placeholder="Science Imaging">
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