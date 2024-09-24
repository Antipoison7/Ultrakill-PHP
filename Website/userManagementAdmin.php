<?php
    session_start();
    include_once './resources/helper/headers.php';
    include_once './resources/helper/adminHelper.php';
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Login</title>

        <style>
            a
            {
                color: white;
            }
            
            a:hover
            {
                color:lime;
            }
        </style>

        <link rel='stylesheet' type='text/css' href='./resources/css/common.css' />
    </head>

    <body>
        <?php
            standardHeader("./index.php", "MODERATOR PORTAL");

            if((isset($_SESSION["username"]))&&(isset($_SESSION["password"])))
            {
                if(($_SESSION["username"] == "Antipoison")&&(isValidLogin($_SESSION["username"], $_SESSION["password"]) == true))
                {
                    echo("<div class=\"manageDiv\">
                <a href = \"./editRunsAdmin.php\">
                    <div class=\"manageButton\">
                        <p>Edit Run Details</p>
                    </div>
                </a>

                <a href = \"./deleteRunsAdmin.php\">
                    <div class=\"manageButton\">
                        <p>Remove Runs</p>
                    </div>
                </a>

                <a href=\"./addTimes.php\">
                    <div class=\"manageButton\">
                        <p>Add Runs</p>
                    </div>
                </a>

                <a href=\"./deleteUserAdmin.php\">
                    <div class=\"manageButton\">
                        <p>Delete Users</p>
                    </div>
                </a>
            </div>");
                }
                else
                {
                    echo("<a href = \"./login.php\">INVALID LOGIN, TRY AGAIN</a>");
                }
            }
            else
            {
                echo("<a href = \"./login.php\">INVALID LOGIN, TRY AGAIN</a>");
            }
            
        ?>        
    </body>
</html>


<!-- 
if(($_SESSION["username"] == "Antipoison")&&(isValidLogin($_SESSION["username"], $_SESSION["password"]) == true))
                {
                    // echo("admin");
                } -->