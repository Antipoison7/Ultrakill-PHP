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

        // while ($row = $levelPRun->fetchArray())
        // {
        //     $generatedString .= "<div class='levelScoreInstance'>";
        //         $generatedString .= "<div class='levelUserPfp'><img src='" . $row["profilePicture"] . "'></div>";
        //         $generatedString .= "<div class='levelUserName'><p>" . $row["name"] . "</p></div>";
        //         $generatedString .= "<div class='levelUserDiff'><p>" . $row["DifficultyName"] . "</p></div>";
        //         $generatedString .= "<div class='levelUserTime'><p>" . $row["time"] . "</p></div>";
        //     $generatedString .= "</div>";
        // }

        $generatedString .= "
                        </div>
                    </div>
                </div>
                ";


        echo($generatedString);
    }
?>