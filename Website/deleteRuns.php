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
            

            if((isset($_SESSION["username"]))&&(isset($_SESSION["password"])))
            {
                if(isValidLogin($_SESSION["username"], $_SESSION["password"]))
                {
                    echo("<form method=\"post\" action=\"./intermediateDelete.php\">");
                    fakeModDoubleHeader("./userManagement.php", "REMOVE RUNS");
                    echo("      <div class=\"devRunFlex\">
                                    ".adminGetAllRuns()."
                                </div>
                            </form>
            ");
                }
                else
                {
                    fakeStandardHeader("./login.php", "REMOVE RUNS");
                    echo("<a href = \"./login.php\">INVALID LOGIN, TRY AGAIN</a>");
                }
                }
            else
            {
                fakeStandardHeader("./login.php", "REMOVE RUNS");
                echo("<a href = \"./login.php\">INVALID LOGIN, TRY AGAIN</a>");
            }
            ?>

        
            
                
    </body>

    <script>
        let element = document.getElementsByClassName("devRadioButton");

        for (i of element)
        {
            i.addEventListener("click", highlightSelected);
        }

        function highlightSelected(event)
        {
            let restOf = document.getElementsByClassName("devRunContainer");
            for (i of restOf)
            {
                i.style.border = "3px solid Black";
            }
            console.log(this.nextSibling.nextSibling.childNodes[0].nextElementSibling.style.border = "3px solid White");
        }
    </script>
</html>


<!-- 
if(($_SESSION["username"] == "Antipoison")&&(isValidLogin($_SESSION["username"], $_SESSION["password"]) == true))
                {
                    // echo("admin");
                } -->