<!DOCTYPE html>
<?php
    include_once('databaseHelper.php');
    include_once('levelMaker.php');
?>
<?php
    $Runner = $_POST["Runner"];
    $Category = $_POST["Category"];
    $Time = $_POST["timeAchieved"];
    $Video = $_POST["videoLink"];
    $Comment = $_POST["runnerComment"];
    $level = $_POST["level"];
    $Difficulty = $_POST["Difficulty"];
    $Exit = $_POST["Exit"];
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

        
    <body onload='redirectScript()'>

        <p><a href="index.php">Damn, if you see this and it doesn't load, click this. Do not refresh the page.</a></p>
        <?php
            echo(var_dump($_POST));

            if(strlen($Video) != 0) //Has a video
            {
                if(strlen($Comment) != 0) //Has comment
                {
                    addARun($Runner, $Category, toSeconds($Time), $Video, $Comment, $level, $Difficulty, $Exit, 1);
                }
                else //Has no Comment
                {
                    addARun($Runner, $Category, toSeconds($Time), $Video, $Comment, $level, $Difficulty, $Exit, 2);
                }
            }
            else //Does not have a video
            {
                if(strlen($Comment) != 0) //Has comment
                {
                    addARun($Runner, $Category, toSeconds($Time), $Video, $Comment, $level, $Difficulty, $Exit, 3);
                }
                else //Has no Comment
                {
                    addARun($Runner, $Category, toSeconds($Time), $Video, $Comment, $level, $Difficulty, $Exit, 4);
                }
            }
        ?>
            <script>
                function redirectScript()
                {
                    sleep(1000);
                    window.location.replace("index.php");
                }
                function sleep(ms) {
                    return new Promise(resolve => setTimeout(resolve, ms));
                }
            </script>

    </body>
</html>