<?php
    include_once 'headers.php';
    include_once 'levelMaker.php';
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Runs</title>

        <link rel='stylesheet' type='text/css' href='./resources/css/common.css' />
    </head>

    <body>
        <?php
            standardHeader("./index.php", "Level Select");
        ?>

        <h2 class='layerHeading'>OVERTURE: THE MOUTH OF HELL</h2>
        <div class='levelRows' style='grid-template-columns: auto auto auto auto auto'>
            <?php
                basicGetLevel("0-1");
                basicGetLevel("0-2");
                basicGetLevel("0-3");
                basicGetLevel("0-4");
                basicGetLevel("0-5");
            ?>
        </div>

        <h2 class='layerHeading'>LAYER 1: LIMBO</h2>
        <div class='levelRows' style='grid-template-columns: auto auto auto auto'>
            <?php
                basicGetLevel("1-1");
                basicGetLevel("1-2");
                basicGetLevel("1-3");
                basicGetLevel("1-4");
            ?>
        </div>

        <h2 class='layerHeading'>LAYER 2: LUST</h2>
        <div class='levelRows' style='grid-template-columns: auto auto auto auto'>
            <?php
                basicGetLevel("2-1");
                basicGetLevel("2-2");
                basicGetLevel("2-3");
                basicGetLevel("2-4");
            ?>
        </div>

        <h2 class='layerHeading'>LAYER 3: GLUTTONY</h2>
        <div class='levelRows' style='grid-template-columns: auto auto'>
            <?php
                basicGetLevel("3-1");
                basicGetLevel("3-2");

            ?>
        </div>

        <h2 class='layerHeading'>LAYER 4: GREED</h2>
        <div class='levelRows' style='grid-template-columns: auto auto auto auto'>
            <?php
                basicGetLevel("4-1");
                basicGetLevel("4-2");
                basicGetLevel("4-3");
                basicGetLevel("4-4");
            ?>
        </div>

        <h2 class='layerHeading'>LAYER 5: WRATH</h2>
        <div class='levelRows' style='grid-template-columns: auto auto auto auto'>
            <?php
                basicGetLevel("5-1");
                basicGetLevel("5-2");
                basicGetLevel("5-3");
                basicGetLevel("5-4");
            ?>
        </div>

        <h2 class='layerHeading'>LAYER 6: HERESY</h2>
        <div class='levelRows' style='grid-template-columns: auto auto'>
            <?php
                basicGetLevel("6-1");
                basicGetLevel("6-2");
            ?>
        </div>

        <h2 class='layerHeading'>LAYER 7: VIOLENCE</h2>
        <div class='levelRows' style='grid-template-columns: auto auto auto auto'>
            <?php
                basicGetLevel("7-1");
                basicGetLevel("7-2");
                basicGetLevel("7-3");
                basicGetLevel("7-4");
            ?>
        </div>

        <h2 class='layerHeading'>PRIME SANCTUMS</h2>
        <div class='levelRows' style='grid-template-columns: auto auto'>
            <?php
                basicGetLevel("p-1");
                basicGetLevel("p-2");
            ?>
        </div>

    </body>

    <script>
        function toAny(idCode){
            document.getElementById(idCode + "Any").style.display = "block";
            document.getElementById(idCode + "P").style.display = "none";
            document.getElementById("aSelect" + idCode).className = "levelButtonSelected";
            document.getElementById("pSelect" + idCode).className = "levelButton";
        }
        function toP(idCode){
            document.getElementById(idCode + "Any").style.display = "none";
            document.getElementById(idCode + "P").style.display = "block";
            document.getElementById("aSelect" + idCode).className = "levelButton";
            document.getElementById("pSelect" + idCode).className = "levelButtonSelected";
        }
    </script>
</html>