<!DOCTYPE html>
<?php
    include_once('databaseHelper.php');
    include_once('levelMaker.php');
    include_once('cleaner.php');
?>
<?php
    $Runner = sanitize($_POST["runnerName"]);
    $Display = sanitize($_POST["runnerDisplayName"]);
    $SteamID = sanitize($_POST["runnerSteamId"]);
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
                
        <meta http-equiv='refresh' content='5'; url ='index.php'/>
        </head>

        
    <body>
        <a href="index.php"><p>Thanks for registering. To set a profile picture or request other changes, message Connor on discord @antipoison or email at orders.connor@gmail.com</p></a>
        <a href="index.php"><p>Click the text to go back to the home page</p></a>
        <?php
            // echo(var_dump($_POST));

            if($SteamID != "")
            {
                addARunner($Runner, $Display, $SteamID, 1);
            }
            else
            { 
                addARunner($Runner, $Display, $SteamID, 2);
            }
        ?>

    </body>
</html>