<?php
    // include_once './Website/resources/helper/./resources/helper/databaseHelper.php';
    include_once('./Website/resources/helper/./resources/helper/levelMaker.php');
    // include './Website/resources/helper/./resources/helper/numberConversion.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Test Document</title>
    </head>

    <body>
        <p>This is test text</p>
        <?php
        // echo "<p>This is a php test text</p>";
        // $db = new SQLite3('./Website/database/Ultrakill.db');

        // $results = $db->query('SELECT * FROM runs;');
        // while ($row = $results->fetchArray())
        // {
        //     // print_r($row);
        //     echo($row["Runner"]);
        //     echo("<br>");
        // }

        // $results->finalize();
        // $db->close();

        // $title = getLevelDetails("1-1");
        // echo($title["LevelCode"]);
        // echo("<br>");
        // echo($title["LevelName"]);

        basicGetLevel("1-1");

        // echo(fmod(110.1, 60));

        // echo(toDuration("110.1"));

        ?>
    </body>
</html>