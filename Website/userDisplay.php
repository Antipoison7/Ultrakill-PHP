<?php
    include_once 'headers.php';
    include_once 'levelMaker.php';
    include_once 'databaseHelper.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>User run</title>

        <link rel='stylesheet' type='text/css' href='./resources/css/common.css' />
    </head>

    <body>

            <?php
                if($_GET["from"] == "Y")
                {
                    standardHeader($_SERVER['HTTP_REFERER'], "Runner Summary");
                }
                else
                {
                    standardHeader("." . $_GET["prev"], "Runner Summary");
                }
                
                $userID = $_GET["userId"];
                static $userDetails = getRunnerDetails($userID);
            ?>
        

                <div class="flexBox" style="justify-content: center;">
                    <div class="playerProfile">
                        <?php
                            echo("<h1 class=\"ultrakillTitleText\">" . $userDetails["Name"] . "</h1>

                            <div class=\"flexBox\" style=\"justify-content: center; gap:10px;\">
                                <img src=\"./resources/images/" . $userDetails["ProfilePicture"] . "\">
                            </div>");
    
                            echo(getProfileLevels($_GET["userId"], $_GET["prev"]));
                        ?>
                        
                            
                    </div>
                </div>
    </body>
</html>