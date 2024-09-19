<?php
    include_once 'headers.php';
    include_once 'individualRunMaker.php';
?>

<!DOCTYPE html>
<html>

        <head>
            <title>User Runs</title>

            <link rel='stylesheet' type='text/css' href='./resources/css/common.css' />
        </head>

        <body>
                <?php
                if(isset($_SERVER['HTTP_REFERER'])){
                    standardHeader($_SERVER['HTTP_REFERER'],"Individual Run");
                }
                else
                {
                    standardHeader("./index.php","Individual Run");
                }
                ?>
<div class='flexBox' style = 'justify-content:center;'>
<div class='userRun'>

<?php
    echo(getRunHeading($_GET["runId"]));
?>

<div style='width:48vw; height:27vw;'>
            <?php
                echo(ifHasVideo($_GET["runId"]));
            ?>
</div>

<div>
<h3><img src='./resources/images/Comment.png' class='userRunComment'>Run Description / Comments</h3>
            <?php
                echo(ifHasComment($_GET["runId"]));
            ?>
</div>
<div>
    <?php
        echo("<h3>Category: " . ifCategory($_GET["runId"]) . "</h3>");
    
        echo("<h3>Time: " . getTime($_GET["runId"]) . "</h3>");
        echo("<h3>Difficulty: " . getDifficulty($_GET["runId"]) . "</h3>");
        echo("<h3>Exit: " . getExit($_GET["runId"]) . "</h3>");
?>
</div>
</div>

</body>
</html>