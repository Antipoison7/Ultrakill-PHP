<?php
    include_once('numberConversion.php');
?>

<?php
    function getLevelDetails($levelId)
    {
        $db = new SQLite3('Ultrakill.db');

        $results = $db->query('SELECT * FROM Level where LevelCode = "' . $levelId . '";');

        $output = $results->fetchArray();
        
        $results->finalize();
        $db->close();

        return $output;

    }

    function getBasicRuns($levelId, $category)
    {
        $db = new SQLite3('Ultrakill.db');

        $queryString = "";

        $returnedString = "";

        if($category == "A")
        {
            $queryString = "SELECT runs.RowID as RunID, runs.Category, Runners.displayname as name, Runners.UserID, Runners.profilepicture as pfp, min(runs.time) as time, Difficulty.DifficultyName, Difficulty.DifficultyDescription FROM runs LEFT JOIN Runners ON Runners.userid = runs.runner LEFT JOIN difficulty ON difficulty.DifficultyId = runs.Difficulty WHERE (Category = 'Any% OOB' OR Category = 'Any%') AND levelCode = '" . $levelId . "' GROUP BY name ORDER BY time ASC;";
        }
        else
        {
            $queryString = "SELECT runs.RowID as RunID, runs.Category, Runners.displayname as name, Runners.UserID, Runners.profilepicture as pfp, min(runs.time) as time, Difficulty.DifficultyName, Difficulty.DifficultyDescription FROM runs LEFT JOIN Runners ON Runners.userid = runs.runner LEFT JOIN difficulty ON difficulty.DifficultyId = runs.Difficulty WHERE (Category = 'P% OOB' OR Category = 'P%') AND levelCode = '" . $levelId . "' GROUP BY name ORDER BY time ASC;";
        }

        $results = $db->query($queryString);

        while ($row = $results->fetchArray())
        {
            $returnedString .= "<div class='levelScoreInstance'>";
                $returnedString .= "<div class='levelUserPfp'><img src='./resources/images/" . $row["pfp"] . "'></div>";
                $returnedString .= "<div class='levelUserName'><p>" . $row["name"] . "</p></div>";
                $returnedString .= "<a href = \"./individualRun.php?runId=" . $row["RunID"] . "&prev=/viewTimes.php\" class='levelUserDiff'><div><p>" . $row["DifficultyName"] . "</p></div></a>";
                $returnedString .= "<a href = \"./individualRun.php?runId=" . $row["RunID"] . "&prev=/viewTimes.php\" class='levelUserTime'><div><p>" . toDuration($row["time"]) . "</p></div></a>";
            $returnedString .= "</div>";
        }



        $results->finalize();
        $db->close();

        return $returnedString;
    }

    function getRunnerDropdown()
    {
        $db = new SQLite3('Ultrakill.db');

        $queryString = "SELECT * FROM Runners;";

        $returnedString = "";

        $results = $db->query($queryString);

        while ($row = $results->fetchArray())
        {
            $returnedString .= "<option value = \"" . $row["UserID"] . "\">" . $row["DisplayName"] . "</option>";
        }



        $results->finalize();
        $db->close();

        return $returnedString;
    }

    function addARun($runner, $category, $time, $video, $comment, $Level, $difficulty, $exit, $type)
    {
        $db = new SQLite3('Ultrakill.db');

        $queryString = "";

        switch($type)
        {
            case 1:
                $queryString = "INSERT INTO Runs (Runner, Category, Time, Comment, Video, LevelCode, Difficulty, Exit) VALUES ('". $runner ."','". $category ."','" . $time . "','" . $comment . "','" . $video. "','" . $Level . "','" . $difficulty . "','" . $exit . "');";
            break;

            case 2:
                $queryString = "INSERT INTO Runs (Runner, Category, Time, Video, LevelCode, Difficulty, Exit) VALUES ('". $runner ."','". $category ."','" . $time . "','" . $video. "','" . $Level . "','" . $difficulty . "','" . $exit . "');";
            break;

            case 3:
                $queryString = "INSERT INTO Runs (Runner, Category, Time, Comment ,LevelCode, Difficulty, Exit) VALUES ('". $runner ."','". $category ."','" . $time . "','" . $comment . "','" . $Level . "','" . $difficulty . "','" . $exit . "');";
            break;

            case 4:
                $queryString = "INSERT INTO Runs (Runner, Category, Time, LevelCode, Difficulty, Exit) VALUES ('". $runner ."','". $category ."','" . $time . "','" . $Level . "','" . $difficulty . "','" . $exit . "');";
            break;
        }

        $db->query($queryString);

        $db->close();
    }

    function getNumberOfRunners()
    {
        $db = new SQLite3('Ultrakill.db');

        $queryString = "SELECT count(Name) AS runnerCount FROM Runners;";

        $results = $db->query($queryString);

        $output = $results->fetchArray()[0];
        
        $results->finalize();
        $db->close();

        return $output;

    }

    function getDisplayGridLevel($levelCode, $runnerID)
    {
        $db = new SQLite3('Ultrakill.db');
        $outputString = "";

        $queryString = "SELECT runs.rowId as RunId ,Runner, min(time) as minTime, LevelCode
                        FROM runs
                        WHERE Exit = \"Normal\"
                        AND runner = \"" . $runnerID . "\"
                        AND LevelCode = \"" . $levelCode . "\"
                        GROUP BY runner, levelcode

                        UNION

                        SELECT  0 as RunId , \"" . $runnerID . "\" as Runner, 0 as minTime, LevelCode
                        FROM level
                        WHERE LevelCode
                        NOT IN (Select LevelCode FROM runs WHERE Exit = \"Normal\" AND runner = \"" . $runnerID . "\")
                        AND runner = \"" . $runnerID . "\"
                        AND LevelCode = \"" . $levelCode . "\"
                        ORDER BY LevelCode;";

        $results = $db->query($queryString);
        $row = $results->fetchArray();

        $outputString = "<p>" . $levelCode . ": " . toDurationSpecial($row["minTime"]) . "</p>";

        $results->finalize();
        $db->close();

        return $outputString;

    }

    function getRunnerPfp($runnerID)
    {
        $db = new SQLite3('Ultrakill.db');
        $outputString = "";

        $queryString = "SELECT ProfilePicture 
                        FROM Runners 
                        Where UserID = \"" . $runnerID . "\";";

        $results = $db->query($queryString);
        $row = $results->fetchArray();

        $outputString = $row["ProfilePicture"];

        $results->finalize();
        $db->close();

        return $outputString;
    }

    function getRunnerName($runnerID)
    {
        $db = new SQLite3('Ultrakill.db');
        $outputString = "";

        $queryString = "SELECT Name
                        FROM Runners 
                        Where UserID = \"" . $runnerID . "\";";

        $results = $db->query($queryString);
        $row = $results->fetchArray();

        $outputString = $row["Name"];

        $results->finalize();
        $db->close();

        return $outputString;
    }

    function getIndividualRun($runID)
    {
        $db = new SQLite3('Ultrakill.db');
        $outputArray = "";

        $queryString = "SELECT Runs.rowId as runID,runners.ProfilePicture, Runs.Category, Runners.displayname as name, Runs.time, Runs.video, Runs.comment, Runs.levelCode, level.LevelName, Difficulty.DifficultyName, Difficulty.DifficultyDescription, Runs.exit 
                        FROM Runs 
                        LEFT JOIN Runners 
                        ON Runners.userid = Runs.runner 
                        LEFT JOIN Level 
                        ON Level.LevelCode = Runs.LevelCode
                        LEFT JOIN difficulty 
                        ON difficulty.DifficultyId = Runs.Difficulty
                        LEFT JOIN category
                        ON category.CategoryName = Runs.Category
                        WHERE runs.rowid='" . $runID . "';";

        $results = $db->query($queryString);
        $row = $results->fetchArray();

        $outputString = $row;

        $results->finalize();
        $db->close();

        return $outputString;
    }
?>