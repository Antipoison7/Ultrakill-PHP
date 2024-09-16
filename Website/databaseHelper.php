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
            $queryString = "SELECT RowID as RunID, Category, displayname as name, UserID, profilepicture as pfp, min(time) as time, DifficultyName, DifficultyDescription FROM(SELECT runs.RowID, * FROM runs LEFT JOIN Runners ON Runners.userid = runs.runner LEFT JOIN difficulty ON difficulty.DifficultyId = runs.Difficulty WHERE (Category = 'Any% OOB' OR Category = 'Any%') AND levelCode = '" . $levelId . "'

            UNION

            SELECT runs.RowID, * FROM runs LEFT JOIN Runners ON Runners.userid = runs.runner LEFT JOIN difficulty ON difficulty.DifficultyId = runs.Difficulty WHERE (Category = 'P% OOB' OR Category = 'P%') AND levelCode = '" . $levelId . "') GROUP BY name ORDER BY time;";
        }
        else
        {
            $queryString = "SELECT runs.RowID as RunID, runs.Category, Runners.displayname as name, Runners.UserID, Runners.profilepicture as pfp, min(runs.time) as time, Difficulty.DifficultyName, Difficulty.DifficultyDescription FROM runs LEFT JOIN Runners ON Runners.userid = runs.runner LEFT JOIN difficulty ON difficulty.DifficultyId = runs.Difficulty WHERE (Category = 'P% OOB' OR Category = 'P%') AND levelCode = '" . $levelId . "' GROUP BY name ORDER BY time ASC;";
        }

        $results = $db->query($queryString);

        while ($row = $results->fetchArray())
        {
            $returnedString .= "<div class='levelScoreInstance'>";
                $returnedString .= "<a href = \"./userDisplay.php?userId=" . $row["UserID"] . "&prev=/viewTimes.php&from=N\" class='levelUserPfp'><div><img src='./resources/images/" . $row["pfp"] . "'></div></a>";
                $returnedString .= "<a href = \"./userDisplay.php?userId=" . $row["UserID"] . "&prev=/viewTimes.php&from=N\" class='levelUserName'><div><p>" . $row["name"] . "</p></div></a>";
                $returnedString .= "<a href = \"./individualRun.php?runId=" . $row["RunID"] . "&prev=/viewTimes.php\" class='levelUserDiff'><div><p>" . $row["DifficultyName"] . "</p></div></a>";
                if(substr($row["Category"],0,1) == "A")
                {
                    $returnedString .= "<a href = \"./individualRun.php?runId=" . $row["RunID"] . "&prev=/viewTimes.php\" class='levelUserTime'><div><p>" . toDuration($row["time"]) . "</p></div></a>";
                }
                else
                {
                    $returnedString .= "<a href = \"./individualRun.php?runId=" . $row["RunID"] . "&prev=/viewTimes.php\" class='levelUserTime'><div><p><span class=\"pRanked\">" . toDuration($row["time"]) . "</span></p></div></a>";
                }
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

    function getRunnerDetails($runnerID)
    {
        $db = new SQLite3('Ultrakill.db');
        $outputString = "";

        $queryString = "SELECT * 
                        FROM Runners 
                        Where UserID = \"" . $runnerID . "\";";

        $results = $db->query($queryString);
        $row = $results->fetchArray();

        $results->finalize();
        $db->close();

        return $row;
    }

    function getIndividualRun($runID)
    {
        $db = new SQLite3('Ultrakill.db');

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

    function getLevelsCompleted($userID)
    {
        $db = new SQLite3('Ultrakill.db');
        $outputArray = array();

        $queryString = "SELECT runs.LevelCode, Level.LevelName 
                        FROM Runs 
                        LEFT JOIN Level 
                        ON Level.LevelCode = Runs.LevelCode 
                        WHERE Runner = '" . $userID . "' 
                        GROUP BY runs.LevelCode 
                        Order By runs.LevelCode;";
        
        $results = $db->query($queryString);

        while ($row = $results->fetchArray())
        {
            $outputArray[] = $row["LevelCode"];
        }

        return $outputArray;
    }

    function getRunsForLevel($userID, $levelCode)
    {
        $db = new SQLite3('Ultrakill.db');
        $outputArray = array();

        $queryString = "SELECT runs.rowID as runID, Runners.ProfilePicture, Runners.UserID as Name, runs.Time, Difficulty.DifficultyName, Difficulty.DifficultyDescription, runs.category, runs.comment, runs.video, runs.LevelCode, Level.LevelName, runs.Exit
                        FROM runs
                        LEFT JOIN Runners
                        ON runners.UserID = runs.Runner
                        LEFT JOIN Difficulty
                        ON difficulty.DifficultyId = runs.Difficulty
                        LEFT JOIN Level
                        ON level.LevelCode = runs.LevelCode
                        WHERE runs.LevelCode = \"" . $levelCode . "\"
                        AND runs.Runner = \"" . $userID . "\" ORDER BY Time;";
        
        $results = $db->query($queryString);

        while ($row = $results->fetchArray())
        {
            $outputArray[] = $row;
        }

        return $outputArray;
    }

    function levelNameLookup($levelCode)
    {
        $db = new SQLite3('Ultrakill.db');

        $queryString = "SELECT LevelName 
                        FROM Level
                        WHERE levelCode = '" . $levelCode . "';";

        $results = $db->query($queryString);

        $output = $results->fetchArray()[0];
        
        $results->finalize();
        $db->close();

        return $output;

    }

    function addARunner($runner, $display, $steamID, $type)
    {
        $db = new SQLite3('Ultrakill.db');

        $queryString = "";

        switch($type)
        {
            case 1:
                $queryString = "INSERT INTO Runners (UserID, Name, DisplayName, SteamId) VALUES ((SELECT count(Name)+1 AS runnerCount FROM Runners),'" . $runner . "','" . $display . "','" . $steamID . "');";
            break;

            case 2:
                $queryString = "INSERT INTO Runners (UserID, Name, DisplayName, SteamId) VALUES ((SELECT count(Name)+1 AS runnerCount FROM Runners),'" . $runner . "','" . $display . "','N/A');";
            break;
        }

        $db->query($queryString);

        $db->close();
    }

    function getNextRunner()
    {
            $db = new SQLite3('Ultrakill.db');
    
            $queryString = "SELECT MAX(UserID) as maxRunner FROM Runners;";
    
            $results = $db->query($queryString);
            $row = $results->fetchArray();
    
            $outputString = $row;
    
            $results->finalize();
            $db->close();
    
            return $outputString+1;
    }

    function getUnregistered()
    {
        $db = new SQLite3('Ultrakill.db');
    
            $queryString = "SELECT * FROM Runners WHERE UserID NOT IN (SELECT RunnerID FROM Details);";
    
            $results = $db->query($queryString);

            while ($row = $results->fetchArray())
            {
                echo("<option value = \"" . $row["UserID"] . "\">" . $row["Name"] . "</option>");
            }
    
            $results->finalize();
            $db->close();
    }

    function registerRunner($userID, $userName, $PassHash)
    {
        $db = new SQLite3('Ultrakill.db');

        $queryString = "INSERT INTO Details (RunnerID, Username, PassHash) VALUES (" . $userID . ", '" . $userName . "', '" . $PassHash . "');";

        $db->exec($queryString);

        $db->close();
    }

    function isValidLogin($userName, $password)
    {
        $db = new SQLite3('Ultrakill.db');

        $queryString = "SELECT * FROM Details WHERE Username = '" . $userName . "';";

        $results = $db->query($queryString)->fetchArray();

        $db->close();

        return password_verify($password, $results["PassHash"]);
    }

    function dropdownHandler()
    {
        $db = new SQLite3('Ultrakill.db');

        $outputString = "<a href='advTimes.php?level=all'>All</a>";
    
            $queryString = "SELECT levelcode, levelname FROM Level;";
    
            $results = $db->query($queryString);

            while ($row = $results->fetchArray())
            {
                $outputString .= "<a href=\"advTimes.php?level=" . $row["LevelCode"] . "\">" . $row["LevelCode"] . ": " . $row["LevelName"] . "</a>";
            }
    
            $results->finalize();
            $db->close();

            return $outputString;
    }
?>