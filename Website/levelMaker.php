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

        $generatedString .= "<a href=\"./userDisplay.html?user=" . $runnerID .  "\">
            <div style=\"width:20vw\" class=\"playerBox\">
                <h2>" . getRunnerName($runnerID) . "</h2>
                <img src=\"./resources/images/" . getRunnerPfp($runnerID) . "\" width=\"40%\">
                <h3>Boss Times</h3>
                <div class=\"flexBox\">
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
?>