<?php
    include_once 'headers.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Runner Lookup</title>
        <link rel='stylesheet' type='text/css' href='./resources/css/common.css' />
    </head>

    <body>
        
        <?php
            standardHeader("./runners.php", "Add A Runner");
        ?>
    
        <form method="post" action="./intermediateUser.php" autocomplete="off">
            <div class='settingChunk'>
                <label for="runnerName">Runner Name*</label>
                <input type="text" id="runnerName" name="runnerName" placeholder="FirstName LastName" required>
            </div>
            <div class='settingChunk'>
                <label for="runnerDisplayName">Display Name*</label>
                <input type="text" id="runnerDisplayName" name="runnerDisplayName" placeholder="Display Name" required>
            </div>
            <div class='settingChunk'>
                <label for="runnerSteamId"><a href='https://www.steamidfinder.com/' target='_blank'>SteamID (64 Decimal)</a></label>
                <input type="text" id="runnerSteamId" name="runnerSteamId" placeholder="steamID64 (Dec):" pattern="[0-9]{17}">
            </div>
            <div>
                <input type="submit" value="Register User" class="button">
            </div>
        </form>
    </body>
</html>