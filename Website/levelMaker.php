<?php
    include_once('databaseHelper.php');
?>

<?php
    function basicGetLevel($levelCode)
    {
        $generatedString = "";

        $levelDetails = getLevelDetails($levelCode);


        $generatedString .= "<div class=\"levelSelect\">
                                    <div class=\"levelSelectThumbnail\">";
        $generatedString .= "<h2>" . $levelDetails["LevelCode"] . ": " .  $levelDetails["LevelName"] . "</h2>";
        $generatedString .= "<img src='./resources/images/Thumbnails/" . $levelDetails["LevelCode"] . ".webp'>";
        $generatedString .= "</div>
                                    <div>
                                        <div class=\"flexBox\" style=\"margin-bottom:5px; justify-content: space-around;\">
                             <button class=\"levelButtonSelected\" onclick=\"toAny('" . $levelDetails["LevelCode"] . "')\"" . "id=\"aSelect" . $levelDetails["LevelCode"] . "\">ANY%</button> ";
        $generatedString .= "<button class=\"levelButton\" onclick=\"toP('" . $levelDetails["LevelCode"] . "')\" id=\"pSelect" . $levelDetails["LevelCode"] . "\">P%</button>
                        </div>
                        <div class=\"levelContainer\" id=\"" . $levelDetails["LevelCode"] . "Any\" style=\"display:block;\">";
                                
                                
        $levelARun = getBasicRuns($levelCode, "A");
        $generatedString .= $levelARun;

        


        $generatedString .= "</div> <div class=\"levelContainer\" id='" . $levelCode . "P' style='display:none;'>";
                        
        $levelPRun = getBasicRuns($levelCode, "P");
        $generatedString .= $levelPRun;

        $generatedString .= "
                        </div>
                    </div>
                </div>
                ";


        echo($generatedString);
    }

    function runnersDisplayGrid($runnerID)
    {
        $generatedString = "";

        $runnerDetails = getRunnerDetails($runnerID);

        $generatedString .= "<a href=\"./userDisplay.php?userId=" . $runnerID .  "&prev=/runners.php&from=N\">
            <div style=\"width:20vw\" class=\"playerBox\">
                <h2>" . $runnerDetails["Name"] . "</h2>
                <img src=\"./resources/images/" . $runnerDetails["ProfilePicture"] . "\" width=\"40%\">
                <h3>Boss Times</h3>
                <div class=\"playersLayoutFlex\">
                    <div>".
                        getDisplayGridLevel("1-4", $runnerID) .
                        getDisplayGridLevel("2-4", $runnerID) .
                        getDisplayGridLevel("3-2", $runnerID) .
                        getDisplayGridLevel("4-4", $runnerID) .
                    "</div>
                    <div>" .
                        getDisplayGridLevel("5-4", $runnerID) .
                        getDisplayGridLevel("6-2", $runnerID) .
                        getDisplayGridLevel("7-4", $runnerID) .
                        getDisplayGridLevel("p-1", $runnerID) .
                    "</div>
                </div>
            </div>
        </a>";

        return $generatedString;
    }

    function getProfileLevels($userID, $prev)
    {
        $generatedString = "";
        $levelsCompleted = getLevelsCompleted($userID);

        foreach($levelsCompleted as $levelID)
        {
            $selectedRun = getRunsForLevel($userID, $levelID);

            $generatedString .= "<div style='margin-bottom: 30px;'>

            <h1 class='ultrakillTitleText' style='color: red;'>-- " . $levelID . " : " . levelNameLookup($levelID) . " --</h1>

            <div style='display: grid; grid-template-columns: 20% 10% 10% 10% 10% 20% 20%; align-items: center; justify-content: space-between; margin: 0px 70px;'>
            <p style='font-size:0.8vw; color: darkred;'>Time</p>
            <p style='font-size:0.8vw; color: darkred;'>Category</p>
            <p style='font-size:0.8vw; color: darkred;'>OOB</p>
            <p style='font-size:0.8vw; color: darkred;'>Comment</p>
            <p style='font-size:0.8vw; color: darkred;'>Video</p>
            <p style='font-size:0.8vw; color: darkred;'>Difficulty</p>
            <p style='font-size:0.8vw; color: darkred;'>Exit</p>
            </div>

            <div class='profileTableContainer'>";
            foreach($selectedRun as $level)
            {
                if($from = "userDisplay")
                {
                    $generatedString .= "<a href='./individualRun.php?runId=" . $level["runID"] . "' class='nostyle'>";
                }
                

                $generatedString .="
                <div class='profileLevelGrid'>
                <p>" . toDuration($level["Time"]) . "</p>";
                if(substr($level["Category"], 0, 1) == "A")
                {
                    $generatedString .= "<p>Any%</p>";
                }
                else if(substr($level["Category"], 0, 1) == "P")
                {
                    $generatedString .= "<p style='color:gold;'>P%</p>";
                }
                else if(substr($level["Category"], 0, 1) == "N")
                {
                    $generatedString .= "<p style='color:lime;'>NoMo</p>";
                }

                if(($level["Category"] == "Any% OOB")||($level["Category"] == "P% OOB")||($level["Category"] == "NoMo OOB"))
                {
                    $generatedString .= "<img src='./resources/images/OutOfBounds.png' alt='Out Of Bounds'>";
                }
                else
                {
                    $generatedString .= "<div style='width: 2vw; height: 2vw;'></div>";
                }

                if($level["Comment"] != null)
                {
                    $generatedString .= "<img src='./resources/images/Comment.png' alt='Contains Comment'>";
                }
                else
                {
                    $generatedString .= "<div style='width: 2vw; height: 2vw;'></div>";
                }
                
                if($level["Video"] != null)
                {
                    $generatedString .= "<img src='./resources/images/Video.png' alt='Contains Video'>";
                }
                else
                {
                    $generatedString .= "<div style='width: 2vw; height: 2vw;'></div>";
                }
                
                $generatedString .= "<p>" . $level["DifficultyName"] . "</p>
                <p>" . $level["Exit"] . "</p>
                </div>
                </a>";

            }

            $generatedString .= "</div>
            </div>";
        }

        return $generatedString;
    }
?>