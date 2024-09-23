<!DOCTYPE html>
<?php
    session_start();
    include_once('./resources/helper/levelMaker.php');
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["password"] = $_POST["password"];
?>
<html lang="en">
        <head>
               <title>Please Dont Break</title>

               <style>
                    body
                    {
                        background-color: black;
                    }

                    p
                    {
                        color: white;
                    }

                    a{
                    font-family:UltrakillFont;
                    font-size: 1.5vw;
                    }

                    a:link {
                    color: white;
                    }

                    a:visited {
                    color: white;
                    }

                    a:hover {
                    color: lime;
                    }

                    a:active {
                    color: red;
                    }
                </style>
        <meta http-equiv='refresh' content='5'; url ='./userManagement.php'/>
        </head>

        
    <body onload='redirectScript()'>

        <p><a href="./userManagement.php">Damn, if you see this and it doesn't load, click this. Do not refresh the page.</a></p>

            <script>
                function redirectScript()
                {
                    sleep(1000);
                    window.location.replace("./userManagement.php");
                }
                function sleep(ms) {
                    return new Promise(resolve => setTimeout(resolve, ms));
                }
            </script>

    </body>
</html>