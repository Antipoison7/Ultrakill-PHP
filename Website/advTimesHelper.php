<?php
include_once 'databaseHelper.php';
include_once 'numberConversion.php';

function GetAllRuns($selectedCategory, $level, $type)
{
    $generatedString = "";
    $counter = 1;

    $aRun = getComplexRuns($selectedCategory,$level);
    if($type == "any")
    {
        $generatedString .= "<div class='runTableContainer'>";
        $generatedString .= "
            <div style='grid-template-columns: 4% 5% 25% 16% 13% 5% 7% 7% 10%;'>
                <div>Rank</div>
                <div>Pfp</div>
                <div>Player</div>
                <div>Time</div>
                <div>Difficulty</div>
                <div>OOB?</div>
                <div>Comment</div>
                <div>Video</div>
                <div class='runTableContainerLevel'>Level</div>
            </div>";

    foreach($aRun as $userRun)
    {
            $generatedString .= "<a href='./individualRun.php?runId=" . $userRun["rowid"] . "&prev=All'>";
            $generatedString .= "<div class='runTableContainerInstance' style='grid-template-columns: 4% 5% 25% 16% 13% 5% 7% 7% 10%;'>";
                $generatedString .= "<div class='runTableContainerLevel'>" . $counter . "</div>";
                $generatedString .= "<div><img src='./resources/images/" . $userRun["ProfilePicture"] . "'></div>";
                $generatedString .= "<div>" . $userRun["name"] . "</div>";
                $generatedString .= "<div>" . toDuration($userRun["Time"]) . "</div>";
                $generatedString .= "<div>" . $userRun["DifficultyName"] . "</div>";
                $generatedString .= "<div>";
                    if(($userRun["Category"] == "Any% OOB")||($userRun["Category"] == "P% OOB")||($userRun["Category"] == "NoMo OOB"))
                    {
                        $generatedString .= "<img src='./resources/images/OutOfBounds.png' alt='Out Of Bounds'>";
                    }
                $generatedString .= "</div>";
                $generatedString .= "<div>";
                    if($userRun["Comment"] != null)
                    {
                        $generatedString .= "<img src='./resources/images/Comment.png' alt='Contains Comment'>";
                    }
                $generatedString .= "</div>";
                $generatedString .= "<div>";
                    if($userRun["Video"] != null)
                    {
                        $generatedString .= "<img src='./resources/images/Video.png' alt='Contains Video'>";
                    }
                $generatedString .= "</div>";
                $generatedString .= "<div class='runTableContainerLevel'>" . $userRun["LevelCode"] . "</div>";
            $generatedString .= "</div>";
        $generatedString .= "</a>";
        $counter += 1;
    }
}

else if($type == "level")
{
    $generatedString .= "<div class='runTableContainer'>
        <div style='grid-template-columns: 4% 5% 25% 16% 13% 8% 8% 8%;'>
            <div>Rank</div>
            <div>Pfp</div>
            <div>Player</div>
            <div>Time</div>
            <div>Difficulty</div>
            <div>OOB?</div>
            <div>Comment</div>
            <div>Video</div>
        </div>";

    foreach($aRun as $userRun)
    {
        $generatedString .= "<a href='./individualRun.php?runId=" . $userRun["rowid"] . "&prev=" . $level . "'>";
            $generatedString .= "<div class='runTableContainerInstance' style='grid-template-columns: 4% 5% 25% 16% 13% 8% 8% 8%;'>";
                $generatedString .= "<div class='runTableContainerLevel'>" . $counter . "</div>";
                $generatedString .= "<div><img src='./resources/images/" . $userRun["ProfilePicture"] . "'></div>";
                $generatedString .= "<div>" . $userRun["name"] . "</div>";
                $generatedString .= "<div>" . toDuration($userRun["Time"]) . "</div>";
                $generatedString .= "<div>" . $userRun["DifficultyName"] . "</div>";
                $generatedString .= "<div>";
                    if(($userRun["Category"] == "Any% OOB")||($userRun["Category"] == "P% OOB")||($userRun["Category"] == "NoMo OOB"))
                    {
                        $generatedString .= "<img src='./resources/images/OutOfBounds.png' alt='Out Of Bounds'>";
                    }
                $generatedString .= "</div>";
                $generatedString .= "<div>";
                    if($userRun["Comment"] != null)
                    {
                        $generatedString .= "<img src='./resources/images/Comment.png' alt='Contains Comment'>";
                    }
                $generatedString .= "</div>";
                $generatedString .= "<div>";
                    if($userRun["Video"] != null)
                    {
                        $generatedString .= "<img src='./resources/images/Video.png' alt='Contains Video'>";
                    }
                $generatedString .= "</div>";
                $generatedString .= "</div>";
            $generatedString .= "</a>";
        $counter += 1;
    }
}

else if($type =="allAny")
    {
        $aRun = getAllComplexRuns($level);
        $generatedString .= "<div class='runTableContainer'>
            <div style='grid-template-columns: 4% 5% 22% 13% 13% 5% 7% 7% 10% 5%;'>
                <div>Rank</div>
                <div>Pfp</div>
                <div>Player</div>
                <div>Time</div>
                <div>Difficulty</div>
                <div>OOB?</div>
                <div>Comment</div>
                <div>Video</div>
                <div>Category</div>
                <div class='runTableContainerLevel'>Level</div>
            </div>";

    foreach($aRun as $userRun)
    {
            $generatedString .= "<a href='./individualRun.php?runId=" . $userRun["rowid"] . "&prev=All'>";
            $generatedString .= "<div class='runTableContainerInstance' style='grid-template-columns: 4% 5% 22% 13% 13% 5% 7% 7% 10% 5%;'>";
                $generatedString .= "<div class='runTableContainerLevel'>" . $counter . "</div>";
                $generatedString .= "<div><img src='./resources/images/" . $userRun["ProfilePicture"] . "'></div>";
                $generatedString .= "<div>" . $userRun["name"] . "</div>";
                $generatedString .= "<div>" . toDuration($userRun["Time"]) . "</div>";
                $generatedString .= "<div>" . $userRun["DifficultyName"] . "</div>";
                $generatedString .= "<div>";
                    if(($userRun["Category"] == "Any% OOB")||($userRun["Category"] == "P% OOB")||($userRun["Category"] == "NoMo OOB"))
                    {
                        $generatedString .= "<img src='./resources/images/OutOfBounds.png' alt='Out Of Bounds'>";
                    }
                $generatedString .= "</div>";
                $generatedString .= "<div>";
                    if($userRun["Comment"] != null)
                    {
                        $generatedString .= "<img src='./resources/images/Comment.png' alt='Contains Comment'>";
                    }
                $generatedString .= "</div>";
                $generatedString .= "<div>";
                    if($userRun["Video"] != null)
                    {
                        $generatedString .= "<img src='./resources/images/Video.png' alt='Contains Video'>";
                    }
                $generatedString .= "</div>";
                if(substr($userRun["Category"], 0, 1) == "A")
                {
                    $generatedString .= "<div class='runTableContainerLevel'>Any%</div>";
                }
                else if(substr($userRun["Category"], 0, 1) == "P")
                {
                    $generatedString .= "<div class='runTableContainerLevel' style='color:gold;'>P%</div>";
                }
                else if(substr($userRun["Category"], 0, 1) == "N")
                {
                    $generatedString .= "<div class='runTableContainerLevel' style='color:lime'>NoMo</div>";
                }
                $generatedString .= "<div class='runTableContainerLevel'>" . $userRun["LevelCode"] . "</div>";
            $generatedString .= "</div>";
        $generatedString .= "</a>";
        $counter += 1;
    }
}

else if($type == "allLevel")
    {
        $aRun = getAllComplexRuns($level);
        $generatedString .= "<div class='runTableContainer'>
            <div style='grid-template-columns: 4% 6% 25% 17% 13% 5% 8% 8% 6%;'>
                <div>Rank</div>
                <div>Pfp</div>
                <div>Player</div>
                <div>Time</div>
                <div>Difficulty</div>
                <div>OOB?</div>
                <div>Comment</div>
                <div>Video</div>
                <div>Category</div>
            </div>";

    foreach($aRun as $userRun)
    {
            $generatedString .= "<a href='./individualRun.php?runId=" . $userRun["rowid"] . "&prev=All'>";
            $generatedString .= "<div class='runTableContainerInstance' style='grid-template-columns: 4% 6% 25% 17% 13% 5% 8% 8% 6%;'>";
                $generatedString .= "<div class='runTableContainerLevel'>" . $counter . "</div>";
                $generatedString .= "<div><img src='./resources/images/" . $userRun["ProfilePicture"] . "'></div>";
                $generatedString .= "<div>" . $userRun["name"] . "</div>";
                $generatedString .= "<div>" . toDuration($userRun["Time"]) . "</div>";
                $generatedString .= "<div>" . $userRun["DifficultyName"] . "</div>";
                $generatedString .= "<div>";
                    if(($userRun["Category"] == "Any% OOB")||($userRun["Category"] == "P% OOB")||($userRun["Category"] == "NoMo OOB"))
                    {
                        $generatedString .= "<img src='./resources/images/OutOfBounds.png' alt='Out Of Bounds'>";
                    }
                $generatedString .= "</div>";
                $generatedString .= "<div>";
                    if($userRun["Comment"] != null)
                    {
                        $generatedString .= "<img src='./resources/images/Comment.png' alt='Contains Comment'>";
                    }
                $generatedString .= "</div>";
                $generatedString .= "<div>";
                    if($userRun["Video"] != null)
                    {
                        $generatedString .= "<img src='./resources/images/Video.png' alt='Contains Video'>";
                    }
                $generatedString .= "</div>";
                if(substr($userRun["Category"], 0, 1) == "A")
                {
                    $generatedString .= "<div class='runTableContainerLevel'>Any%</div>";
                }
                else if(substr($userRun["Category"], 0, 1) == "P")
                {
                    $generatedString .= "<div class='runTableContainerLevel' style='color:gold;'>P%</div>";
                }
                else if(substr($userRun["Category"], 0, 1) == "N")
                {
                    $generatedString .= "<div class='runTableContainerLevel' style='color:lime'>NoMo</div>";
                }
            $generatedString .= "</div>";
        $generatedString .= "</a>";
        $counter += 1;
    }
}

    return $generatedString;
}

function getComplexRuns($identification, $levelID)
{
    $db = new SQLite3('Ultrakill.db');

        $outputArray = array();
    
            $queryString = "";

            if($levelID == "all")
        {
            if($identification == "Any")
            {
                $queryString = "SELECT runs.rowid, runners.displayName as name, runners.ProfilePicture, min(runs.Time) as Time, difficulty.DifficultyName, difficulty.DifficultyDescription, runs.category, runs.comment, runs.video, runs.LevelCode
                                        FROM runs
                                        LEFT JOIN runners
                                        ON runs.Runner = runners.UserID
                                        LEFT JOIN difficulty
                                        ON runs.difficulty = difficulty.DifficultyId
                                        WHERE category = 'Any%' 
                                        OR category = 'Any% OOB'
                                        GROUP BY runners.Name,runs.LevelCode
                                        ORDER BY Time;";
            }
            else if($identification == "P")
            {
                $queryString = "SELECT runs.rowid, runners.displayName as name, runners.ProfilePicture, min(runs.Time) as Time, difficulty.DifficultyName, difficulty.DifficultyDescription, runs.category, runs.comment, runs.video, runs.LevelCode
                                        FROM runs
                                        LEFT JOIN runners
                                        ON runs.Runner = runners.UserID
                                        LEFT JOIN difficulty
                                        ON runs.difficulty = difficulty.DifficultyId
                                        WHERE category = 'P%' 
                                        OR category = 'P% OOB'
                                        GROUP BY runners.Name,runs.LevelCode
                                        ORDER BY Time;";
            }
            else if($identification == "NoMo")
            {
                $queryString = "SELECT runs.rowid, runners.displayName as name, runners.ProfilePicture, min(runs.Time) as Time, difficulty.DifficultyName, difficulty.DifficultyDescription, runs.category, runs.comment, runs.video, runs.LevelCode
                                        FROM runs
                                        LEFT JOIN runners
                                        ON runs.Runner = runners.UserID
                                        LEFT JOIN difficulty
                                        ON runs.difficulty = difficulty.DifficultyId
                                        WHERE category = 'NoMo' 
                                        OR category = 'NoMo OOB'
                                        GROUP BY runners.Name,runs.LevelCode
                                        ORDER BY Time;";
            }
        }
        else
        {
            if($identification == "Any")
            {
                $queryString = "SELECT runs.rowid, runners.displayName as name, runners.ProfilePicture, min(runs.Time) as Time, difficulty.DifficultyName, difficulty.DifficultyDescription, runs.category, runs.comment, runs.video, runs.LevelCode
                                        FROM runs
                                        LEFT JOIN runners
                                        ON runs.Runner = runners.UserID
                                        LEFT JOIN difficulty
                                        ON runs.difficulty = difficulty.DifficultyId
                                        WHERE (category = 'Any%' 
                                        OR category = 'Any% OOB')
                                        AND LevelCode = '" . $levelID . "'
                                        GROUP BY runners.Name,runs.LevelCode
                                        ORDER BY Time;";
            }
            else if($identification == "P")
            {
                $queryString = "SELECT runs.rowid, runners.displayName as name, runners.ProfilePicture, min(runs.Time) as Time, difficulty.DifficultyName, difficulty.DifficultyDescription, runs.category, runs.comment, runs.video, runs.LevelCode
                                        FROM runs
                                        LEFT JOIN runners
                                        ON runs.Runner = runners.UserID
                                        LEFT JOIN difficulty
                                        ON runs.difficulty = difficulty.DifficultyId
                                        WHERE (category = 'P%' 
                                        OR category = 'P% OOB')
                                        AND LevelCode = '" . $levelID . "'
                                        GROUP BY runners.Name,runs.LevelCode
                                        ORDER BY Time;";
            }
            else if($identification == "NoMo")
            {
                $queryString = "SELECT runs.rowid, runners.displayName as name, runners.ProfilePicture, min(runs.Time) as Time, difficulty.DifficultyName, difficulty.DifficultyDescription, runs.category, runs.comment, runs.video, runs.LevelCode
                                        FROM runs
                                        LEFT JOIN runners
                                        ON runs.Runner = runners.UserID
                                        LEFT JOIN difficulty
                                        ON runs.difficulty = difficulty.DifficultyId
                                        WHERE (category = 'NoMo' 
                                        OR category = 'NoMo OOB')
                                        AND LevelCode = '" . $levelID . "'
                                        GROUP BY runners.Name,runs.LevelCode
                                        ORDER BY Time;";
            }
        }
    
            $results = $db->query($queryString);

            while ($row = $results->fetchArray())
            {
                $outputArray[] = $row;
            }
    
            $results->finalize();
            $db->close();

            return $outputArray;
}

function getAllComplexRuns($levelID)
{
    $db = new SQLite3('Ultrakill.db');

        $outputArray = array();
    
            $queryString = "";

            if($levelID == "all")
            {
                $queryString = "SELECT runs.rowid, runners.displayName as name, runners.ProfilePicture, min(runs.Time) as Time, difficulty.DifficultyName, difficulty.DifficultyDescription, runs.category, runs.comment, runs.video, runs.LevelCode
                FROM runs
                LEFT JOIN runners
                ON runs.Runner = runners.UserID
                LEFT JOIN difficulty
                ON runs.difficulty = difficulty.DifficultyId
                GROUP BY runners.Name,runs.LevelCode,runs.category
                ORDER BY Time;";
            }
            else
            {
                $queryString = "SELECT runs.rowid, runners.displayName as name, runners.ProfilePicture, min(runs.Time) as Time, difficulty.DifficultyName, difficulty.DifficultyDescription, runs.category, runs.comment, runs.video, runs.LevelCode FROM runs LEFT JOIN runners ON runs.Runner = runners.UserID LEFT JOIN difficulty ON runs.difficulty = difficulty.DifficultyId WHERE LevelCode = '" . $levelID . "' GROUP BY runners.Name,runs.LevelCode,runs.category ORDER BY Time;";
            }
    
            $results = $db->query($queryString);

            while ($row = $results->fetchArray())
            {
                $outputArray[] = $row;
            }
    
            $results->finalize();
            $db->close();

            return $outputArray;
}
?>