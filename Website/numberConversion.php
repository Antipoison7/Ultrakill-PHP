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
?>