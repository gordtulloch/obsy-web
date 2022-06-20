
                            <?php 
                            if (isset($_SESSION['username'])) {
                                $nb_new_pm = mysqli_fetch_array(mysqli_query($mysqli,'select count(*) as nb_new_pm from pm where ((user1="' . $_SESSION['userid'] . '" and user1read="no") or (user2="' . $_SESSION['userid'] . '" and user2read="no")) and id2="1"'));
                                $nb_new_pm = $nb_new_pm['nb_new_pm'];
                                ?>
                                <div class="box">
                                    <!-- <div class="box_left"><a href="list_pm.php">Your messages (<?php echo $nb_new_pm; ?>)</a></div> -->
                                    
                                    <div class="box_right">
                                        Logged in as: <a href="profile.php?id=<?php echo $_SESSION['userid']; ?>"><?php echo htmlentities($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?></a></div>
                                    <div class="clean"></div>
                                </div>
                                <?php
                            }
                             ?>

    <?php
    /*
if (!isset($_SESSION['username']) && !$nologin) {
    ?>
    <div class="box_login">
        <form action="login.php" method="post">
            <label for="username">Username</label><input type="text" name="username" id="username" /><br />
            <label for="password">Password</label><input type="password" name="password" id="password" /><br />
            <br>
            <div class="center">
                <input type="submit" value="Login" /> <input type="button" onclick="javascript:document.location = 'signup.php';" value="Sign Up" />
            </div>
        </form>
    </div>
    <?php
} */
?>

</div>
<div class="foot">obsyweb 0.0.1 by <A href="mailto:gord.tulloch@gmail.com">Gord Tulloch </a><a href="https://github.com/gordtulloch/obsy-web">Obsy-web on Github</A></font></div>
</body>
</html>