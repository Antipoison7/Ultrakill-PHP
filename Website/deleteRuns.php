<?php
    session_start();
    include_once 'headers.php';
    include_once 'adminHelper.php';
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
            standardHeader("./userManagement.php", "REMOVE RUNS");

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

        <input type="radio" name="deleteRadio" id="levelOne" value="1">
        <label for="levelOne">
            <div style="width: 300px; height:300px; background-color:salmon;">Text</div>
        </label>
    </body>
</html>


<!-- 
if(($_SESSION["username"] == "Antipoison")&&(isValidLogin($_SESSION["username"], $_SESSION["password"]) == true))
                {
                    // echo("admin");
                } -->