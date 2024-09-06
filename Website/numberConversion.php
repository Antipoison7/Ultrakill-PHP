<?php
    function toDuration($userSeconds)
    {
        $seconds = floatval($userSeconds);
        $durationString = "";

        $Minutes = floor($seconds / 60);
        $Seconds = sprintf('%06.3f',fmod($seconds, 60));

        if(strlen($Minutes) == 1)
        {
            $durationString = "0" . $Minutes;
        }
        else
        {
            $durationString = $Minutes;
        }

        $durationString .= ":" . $Seconds;

        return $durationString;
    }

    function toSeconds($timeCode)
    {
        $generatedTime = 0.0;

        $Minutes = floatval(substr($timeCode, 0, 2));
        $Seconds = floatval(substr($timeCode, 3, 9));

        $generatedTime = ($Minutes * 60) + $Seconds;

        return $generatedTime;
    }
?>