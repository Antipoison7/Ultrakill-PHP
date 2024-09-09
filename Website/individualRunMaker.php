<?php
    include_once 'databaseHelper.php';
    include_once 'numberConversion.php';

    function getRunHeading($runID)
    {
        $runVals = getIndividualRun($runID);
        $output = "<h2><b>" . $runVals["LevelCode"] . ": " . $runVals["LevelName"] . "</b> in <b>" . toDuration($runVals["Time"]) . "</b> by <b>" . $runVals["name"] . "</b></h2>";
        return $output;
    }

    function ifHasVideo($runID)
    {
        $runVals = getIndividualRun($runID);
        $output = "";

        if($runVals["Video"] != null){
            $output = toYoutubeEmbed($runVals["Video"]);
       }
        else{
            $output = "<img width = '100%' height = '100%' src='./resources./images/NoVideo.png' alt='No Video Loaded'>";
        }
        return $output;
    }

    function ifHasComment($runID)
    {
        $runVals = getIndividualRun($runID);
        $output = "";

        if($runVals["Comment"]!= null)
            {
                $output = "<p>" . $runVals["Comment"] . "</p>";
            }
            else
            {
                $output = "<p>No Comment :(</p>";
            }
        
        return $output;
    }

    function ifCategory($runID)
    {
        $runVals = getIndividualRun($runID);
        $output = "";

        if(($runVals["Category"] == "Any%")||($runVals["Category"] == "Any% OOB"))
            {
                $output = "<span class='aRanked'>" . $runVals["Category"] . "</span>";
            }
            else if(($runVals["Category"] == "P%")||($runVals["Category"] == "P% OOB"))
            {
                $output = "<span class='pRanked'>" . $runVals["Category"] . "</span>";
            }
            else if(($runVals["Category"] == "NoMo")||($runVals["Category"] == "NoMo OOB"))
            {
                $output = "<span class='NmRanked'>" . $runVals["Category"] . "</span>";
            }

        return $output;
    }

    function getTime($runID)
    {
        $runVals = getIndividualRun($runID);
        $output = toDuration($runVals["Time"]);
        return $output;
    }

    function getDifficulty($runID)
    {
        $runVals = getIndividualRun($runID);
        $output = $runVals["DifficultyName"];
        return $output;
    }

    function getExit($runID)
    {
        $runVals = getIndividualRun($runID);
        $output = $runVals["Exit"];
        return $output;
    }
?>