<!DOCTYPE html>
<?php
    include_once('databaseHelper.php');
    include_once('levelMaker.php');
?>
<?php
    $RunnerID = $_POST["userIDSelect"];
    $Username = $_POST["username"];
    $PassHash = password_hash($_POST["password"], PASSWORD_DEFAULT);

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
        <meta http-equiv='refresh' content='5'; url ='./login.php'/>
        </head>

    <body onload='redirectScript()'>

        <p><a href="./login.php">Damn, if you see this and it doesn't load, click this. Do not refresh the page.</a></p>
        <?php
            registerRunner($RunnerID, $Username, $PassHash);

        ?>
            <script>
                function redirectScript()
                {
                    sleep(1000);
                    window.location.replace("./login.php");
                }
                function sleep(ms) {
                    return new Promise(resolve => setTimeout(resolve, ms));
                }
            </script>

    </body>
</html>