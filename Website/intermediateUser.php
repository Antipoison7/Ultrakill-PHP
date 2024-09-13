<!DOCTYPE html>
<?php
    include_once('databaseHelper.php');
    include_once('levelMaker.php');
?>
<?php
    $Runner = $_POST["runnerName"];
    $Display = $_POST["runnerDisplayName"];
    $SteamID = $_POST["runnerSteamId"];
?>

<html lang="en">
        <head>
               <title>Please Dont Break</title>

               <style>
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
            echo(var_dump($_POST));

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