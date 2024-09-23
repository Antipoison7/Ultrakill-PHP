<?php
    include_once './resources/helper/headers.php';
    include_once './resources/helper/databaseHelper.php';
    include_once './resources/helper/advTimesHelper.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Advanced Times</title>

        <link rel='stylesheet' type='text/css' href='./resources/css/common.css' />
    </head>

    <?php
        standardHeader("./index.php", "Advanced Times")
    ?>
    <div class='runSelectContainer'>

                    <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn">

        <?php
            if($_GET["level"] == "all")
            {
                echo("SELECT A LEVEL");
            }
            else
            {
                echo( $_GET["level"] . ": " . levelNameLookup($_GET["level"]));
            }
    
        ?>
                        </button>
                        <div id="myDropdown" class="dropdown-content">

        <?php
            echo(dropdownHandler());
        ?>

                        </div>
                    </div> 
        <div class='flexBox'style='margin-bottom:5px; margin-top: 5px; justify-content: space-around;'>
        <button class='categoryButtonSelected' id='allButton' onclick='toAll()'>All</button>
        <button class='categoryButton' id='anyButton' onclick='toAny()'>Any %</button>
        <button class='categoryButton' id='pButton' onclick='toP()'>P %</button>
        <button class='categoryButton' id='noMoButton' onclick='toNoMo()'>NoMo</button>
        </div>
        </div>

        
        <?php
        
        if($_GET["level"] == "all")
        {
            
            echo(
                "<span id='AnyPercent' style='display:none;'>".
                    GetAllRuns("Any","all","any").
                    "</div>".
                "</span>".
                
                "<span id='PPercent' style='display:none;'>".GetAllRuns("P","all","any").
                    "</div>".
                "</span>".
                
                "<span id='NoMo' style='display:none;'>".GetAllRuns("NoMo","all","any").
                    "</div>".
                "</span>".
                    
                "<span id='All'>".GetAllRuns("NoMo","all","allAny").
                    "</div>".
                "</span>"
            );
                
        }
        else
        {
            echo(
                "<span id='AnyPercent' style='display:none;'>".
                    GetAllRuns("Any",$_GET["level"],"level").
                    "</div>".
                "</span>".
                    
                "<span id='PPercent' style='display:none'>".
                    GetAllRuns("P",$_GET["level"],"level").
                    "</div>".
                "</span>".
                        
                "<span id='NoMo' style='display:none'>".
                    GetAllRuns("NoMo",$_GET["level"],"level").
                    "</div>".
                "</span>".
                            
                "<span id='All'>".
                    GetAllRuns("NoMo",$_GET["level"],"allLevel").
                    "</div>".
                "</span>"
            );
                        }
        ?>
                        
                    </body>
        
                <script>
                /* When the user clicks on the button,
                    toggle between hiding and showing the dropdown content */
                    function myFunction() 
                    {
                    document.getElementById("myDropdown").classList.toggle("show");
                    }

                    // Close the dropdown menu if the user clicks outside of it
                    window.onclick = function(event) 
                    {
                        if (!event.target.matches('.dropbtn')) 
                        {
                            var dropdowns = document.getElementsByClassName("dropdown-content");
                            var i;
                            for (i = 0; i < dropdowns.length; i++) 
                            {
                                var openDropdown = dropdowns[i];
                                if (openDropdown.classList.contains('show')) 
                                {
                                    openDropdown.classList.remove('show');
                                }
                            }
                        }
                    } 

                    function toAny(){
                        document.getElementById("anyButton").className = "categoryButtonSelected";
                        document.getElementById("pButton").className = "categoryButton";
                        document.getElementById("noMoButton").className = "categoryButton";
                        document.getElementById("allButton").className = "categoryButton";
                        document.getElementById("AnyPercent").style.display = "inline";
                        document.getElementById("PPercent").style.display = "none";
                        document.getElementById("NoMo").style.display = "none";
                        document.getElementById("All").style.display = "none";
                    }

                    function toP(){
                        document.getElementById("anyButton").className = "categoryButton";
                        document.getElementById("pButton").className = "categoryButtonSelected";
                        document.getElementById("noMoButton").className = "categoryButton";
                        document.getElementById("allButton").className = "categoryButton";
                        document.getElementById("AnyPercent").style.display = "none";
                        document.getElementById("PPercent").style.display = "inline";
                        document.getElementById("NoMo").style.display = "none";
                        document.getElementById("All").style.display = "none";
                    }

                    function toNoMo(){
                        document.getElementById("anyButton").className = "categoryButton";
                        document.getElementById("pButton").className = "categoryButton";
                        document.getElementById("noMoButton").className = "categoryButtonSelected";
                        document.getElementById("allButton").className = "categoryButton";
                        document.getElementById("AnyPercent").style.display = "none";
                        document.getElementById("PPercent").style.display = "none";
                        document.getElementById("NoMo").style.display = "inline";
                        document.getElementById("All").style.display = "none";
                    }

                    function toAll(){
                        document.getElementById("anyButton").className = "categoryButton";
                        document.getElementById("pButton").className = "categoryButton";
                        document.getElementById("noMoButton").className = "categoryButton";
                        document.getElementById("allButton").className = "categoryButtonSelected";
                        document.getElementById("AnyPercent").style.display = "none";
                        document.getElementById("PPercent").style.display = "none";
                        document.getElementById("NoMo").style.display = "none";
                        document.getElementById("All").style.display = "inline";
                    }
                </script>
</html>