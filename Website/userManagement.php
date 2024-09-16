<?php
    session_start();
    include_once 'headers.php';
    include_once 'databaseHelper.php';
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["password"] = $_POST["password"];
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
            if(isValidLogin($_SESSION["username"], $_SESSION["password"]))
            {
                echo("welcome");
            }
            else
            {
                echo("<a href = \"./login.php\">INVALID LOGIN, TRY AGAIN</a>");
            }
        ?>
    </body>
</html>