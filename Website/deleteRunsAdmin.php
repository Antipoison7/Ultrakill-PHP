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
                    echo("<form method=\"post\" action=\"./intermediateDeleteAdmin.php\">");
                    fakeModDoubleHeader("./userManagementAdmin.php", "REMOVE RUNS");
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
                i.style.boxShadow = "0px 0px 0px 3px #000000";
            }
            console.log(this.nextSibling.nextSibling.childNodes[0].nextElementSibling.style.boxShadow = "0px 0px 13px 2px #00E06C");
        }
    </script>
</html>


<!-- 
if(($_SESSION["username"] == "Antipoison")&&(isValidLogin($_SESSION["username"], $_SESSION["password"]) == true))
                {
                    // echo("admin");
                } -->