<?php
    session_start();
    include_once './resources/helper/headers.php';
    include_once './resources/helper/adminHelper.php';
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Edit Runs</title>

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
            standardHeader("./userManagement.php", "EDIT RUNS");

            if((isset($_SESSION["username"]))&&(isset($_SESSION["password"])))
            {
                if(isValidLogin($_SESSION["username"], $_SESSION["password"]))
                {
                    echo("<p>Dev Stuff</p>");
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