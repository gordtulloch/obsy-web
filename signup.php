<?php
//This page let users sign up
include('config.php');
include('header.php');
?>

<div class="content">
    <form action="do_signup.php" method="post">
        Please fill this form to sign up:<br />
        <div class="center">
            <label for="Charactername">User Name</label><input type="text" name="username"><br />
            <label for="password">Password&nbsp <span class="small">(6 characters min.)</span></label><input type="password" name="password" /><br />
            <label for="passverif">Password&nbsp<span class="small">(verification)</span></label><input type="password" name="passverif" /><br />
            <label for="email">Email</label><input type="text" name="email"><br />
            <label for="tzone">Timezone<select name="tzone">
                    <option value="Pacific/Midway">(GMT-11:00) MSamoa</option>
                    <option value="Etc/GMT+10">(GMT-10:00) Hawaii</option>
                    <option value="Pacific/Marquesas">(GMT-09:30) Marquesas</option>
                    <option value="Pacific/Gambier">(GMT-09:00) Gambier</option>
                    <option value="America/Anchorage">(GMT-09:00) Alaska</option>
                    <option value="America/Ensenada">(GMT-08:00) Tijuana</option>
                    <option value="Etc/GMT+8">(GMT-08:00) Pitcairn Is.</option>
                    <option value="America/Los_Angeles">(GMT-08:00) Pacific Time</option>
                    <option value="America/Denver">(GMT-07:00) Mountain Time</option>
                    <option value="America/Chihuahua">(GMT-07:00) Chihuahua</option>
                    <option value="America/Dawson_Creek">(GMT-07:00) Arizona</option>
                    <option value="America/Belize">(GMT-06:00) Saskatchewan</option>
                    <option value="America/Cancun">(GMT-06:00) Guadalajara</option>
                    <option value="Chile/EasterIsland">(GMT-06:00) Easter Island</option>
                    <option value="America/Chicago">(GMT-06:00) Central Time </option>
                    <option value="America/New_York">(GMT-05:00) Eastern Time</option>
                    <option value="America/Havana">(GMT-05:00) Cuba</option>
                    <option value="America/Bogota">(GMT-05:00) Bogota</option>
                    <option value="America/Caracas">(GMT-04:30) Caracas</option>
                    <option value="America/Santiago">(GMT-04:00) Santiago</option>
                    <option value="America/La_Paz">(GMT-04:00) La Paz</option>
                    <option value="Atlantic/Stanley">(GMT-04:00) Fauklands</option>
                    <option value="America/Campo_Grande">(GMT-04:00) Brazil</option>
                    <option value="America/Glace_Bay">(GMT-04:00) Atlantic Time</option>
                    <option value="America/St_Johns">(GMT-03:30) Newfoundland</option>
                    <option value="America/Araguaina">(GMT-03:00) UTC-3</option>
                    <option value="America/Montevideo">(GMT-03:00) Montevideo</option>
                    <option value="America/Miquelon">(GMT-03:00) Miquelon</option>
                    <option value="America/Godthab">(GMT-03:00) Greenland</option>
                    <option value="America/Argentina/Buenos_Aires">(GMT-03:00) Buenos Aires</option>
                    <option value="America/Sao_Paulo">(GMT-03:00) Brasilia</option>
                    <option value="America/Noronha">(GMT-02:00) Mid-Atlantic</option>
                    <option value="Atlantic/Cape_Verde">(GMT-01:00) Cape Verde Is.</option>
                    <option value="Atlantic/Azores">(GMT-01:00) Azores</option>
                    <option value="Europe/Belfast">(GMT) GMT : Belfast</option>
                    <option value="Europe/Dublin">(GMT) GMT : Dublin</option>
                    <option value="Europe/Lisbon">(GMT) GMT : Lisbon</option>
                    <option value="Europe/London">(GMT) GMT : London</option>
                    <option value="Africa/Abidjan">(GMT) Monrovia, Reykjavik</option>
                    <option value="Europe/Amsterdam">(GMT+01:00) Amsterdam</option>
                    <option value="Europe/Belgrade">(GMT+01:00) Belgrade</option>
                    <option value="Europe/Brussels">(GMT+01:00) Brussels</option>
                    <option value="Africa/Algiers">(GMT+01:00) W Cen Africa</option>
                    <option value="Africa/Windhoek">(GMT+01:00) Windhoek</option>
                    <option value="Asia/Beirut">(GMT+02:00) Beirut</option>
                    <option value="Africa/Cairo">(GMT+02:00) Cairo</option>
                    <option value="Asia/Gaza">(GMT+02:00) Gaza</option>
                    <option value="Africa/Blantyre">(GMT+02:00) Pretoria</option>
                    <option value="Asia/Jerusalem">(GMT+02:00) Jerusalem</option>
                    <option value="Europe/Minsk">(GMT+02:00) Minsk</option>
                    <option value="Asia/Damascus">(GMT+02:00) Syria</option>
                    <option value="Europe/Moscow">(GMT+03:00) Moscow</option>
                    <option value="Africa/Addis_Ababa">(GMT+03:00) Nairobi</option>
                    <option value="Asia/Tehran">(GMT+03:30) Tehran</option>
                    <option value="Asia/Dubai">(GMT+04:00) Abu Dhabi</option>
                    <option value="Asia/Yerevan">(GMT+04:00) Yerevan</option>
                    <option value="Asia/Kabul">(GMT+04:30) Kabul</option>
                    <option value="Asia/Tashkent">(GMT+05:00) Tashkent</option>
                    <option value="Asia/Kolkata">(GMT+05:30) Mumbai</option>
                    <option value="Asia/Katmandu">(GMT+05:45) Kathmandu</option>
                    <option value="Asia/Dhaka">(GMT+06:00) Astana</option>
                    <option value="Asia/Novosibirsk">(GMT+06:00) Novosibirsk</option>
                    <option value="Asia/Rangoon">(GMT+06:30) Rangoon</option>
                    <option value="Asia/Bangkok">(GMT+07:00) Bangkok</option>
                    <option value="Asia/Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
                    <option value="Asia/Hong_Kong">(GMT+08:00) Beijing</option>
                    <option value="Asia/Irkutsk">(GMT+08:00) Irkutsk</option>
                    <option value="Australia/Perth">(GMT+08:00) Perth</option>
                    <option value="Australia/Eucla">(GMT+08:45) Eucla</option>
                    <option value="Asia/Tokyo">(GMT+09:00) Tokyo</option>
                    <option value="Asia/Seoul">(GMT+09:00) Seoul</option>
                    <option value="Asia/Yakutsk">(GMT+09:00) Yakutsk</option>
                    <option value="Australia/Adelaide">(GMT+09:30) Adelaide</option>
                    <option value="Australia/Darwin">(GMT+09:30) Darwin</option>
                    <option value="Australia/Brisbane">(GMT+10:00) Brisbane</option>
                    <option value="Australia/Hobart">(GMT+10:00) Hobart</option>
                    <option value="Asia/Vladivostok">(GMT+10:00) Vladivostok</option>
                    <option value="Australia/Lord_Howe">(GMT+10:30) Lord Howe Is.</option>
                    <option value="Etc/GMT-11">(GMT+11:00) Solomon Is.</option>
                    <option value="Asia/Magadan">(GMT+11:00) Magadan</option>
                    <option value="Pacific/Norfolk">(GMT+11:30) Norfolk Island</option>
                    <option value="Asia/Anadyr">(GMT+12:00) Anadyr</option>
                    <option value="Pacific/Auckland">(GMT+12:00) Auckland</option>
                    <option value="Etc/GMT-12">(GMT+12:00) Fiji</option>
                    <option value="Pacific/Chatham">(GMT+12:45) Chatham Is.</option>
                    <option value="Pacific/Tongatapu">(GMT+13:00) Nuku'alofa</option>
                    <option value="Pacific/Kiritimati">(GMT+14:00) Kiritimati</option>
                </select><br />
                <br><input type="submit" value="Sign Up" />
        </div>
    </form>
</div>
<?php
$nologin = TRUE;
include ('footer.php');
?> 