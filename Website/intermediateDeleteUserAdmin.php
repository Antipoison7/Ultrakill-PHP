<!DOCTYPE html>
<?php
    include_once('./resources/helper/adminHelper.php');
    include_once('./resources/helper/levelMaker.php');
    include_once('./resources/helper/cleaner.php');
    
    $Run = sanitize($_POST["deleteRadio"]);
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
        <meta http-equiv='refresh' content='5'; url ='userManagementAdmin.php'/>
        </head>

        
    <body onload='redirectScript()'>

        <p><a href="userManagementAdmin.php">Damn, if you see this and it doesn't load, click this. Do not refresh the page.</a></p>
        <?php
        if(isset($Run))
        {
            adminDeleteRunner($Run);
        }
        ?>
            <script>

                function redirectScript()
                {
                    sleep(1000);
                    window.location.replace("userManagementAdmin.php");
                }
                function sleep(ms) {
                    return new Promise(resolve => setTimeout(resolve, ms));
                }
            </script>

    </body>
</html>