<?php
    function getLevelDetails($levelId)
    {
        $db = new SQLite3('./Website/database/Ultrakill.db');

        $results = $db->query('SELECT * FROM Level where LevelCode = "' . $levelId . '";');

        $output = $results->fetchArray();
        
        $results->finalize();
        $db->close();

        return $output;

    }

    function getBasicRuns($levelId, $category)
    {
        $db = new SQLite3('./Website/database/Ultrakill.db');

        $queryString = "";

        $returnedString = "";

        if($category == "A")
        {
            $queryString = "SELECT runs.Category, Runners.displayname as name, Runners.profilepicture, min(runs.time) as time, Difficulty.DifficultyName, Difficulty.DifficultyDescription FROM runs LEFT JOIN Runners ON Runners.userid = runs.runner LEFT JOIN difficulty ON difficulty.DifficultyId = runs.Difficulty WHERE (Category = 'Any% OOB' OR Category = 'Any%') AND levelCode = '" . $levelId . "' GROUP BY name ORDER BY time ASC;";
        }
        else
        {
            $queryString = "SELECT runs.Category, Runners.displayname as name, Runners.profilepicture, min(runs.time) as time, Difficulty.DifficultyName, Difficulty.DifficultyDescription FROM runs LEFT JOIN Runners ON Runners.userid = runs.runner LEFT JOIN difficulty ON difficulty.DifficultyId = runs.Difficulty WHERE (Category = 'P% OOB' OR Category = 'P%') AND levelCode = '" . $levelId . "' GROUP BY name ORDER BY time ASC;";
        }

        $results = $db->query($queryString);



        $results->finalize();
        $db->close();

        return $returnedString;
    }
?>