<?php
    include_once './resources/helper/headers.php';
    include_once './resources/helper/databaseHelper.php';
    include_once './resources/helper/levelMaker.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Runner Lookup</title>

        <link rel='stylesheet' type='text/css' href='./resources/css/common.css' />
    </head>
    <body>
        <?php
            sideButtonHeader("./index.php", "Runners", "./addRunner.php");
        ?>

        <div class="playersLayout">
        <?php
            $runnerCount = getNumberOfRunners();
            $runnerIDs = getRunnerIDs();
            for($i = 0; $i < $runnerCount; $i++)
            {
                echo(runnersDisplayGrid($runnerIDs[$i]));
            }
        ?>
        </div>
    </body>
</html>
<!-- TODO: Add Custom Header Method -->