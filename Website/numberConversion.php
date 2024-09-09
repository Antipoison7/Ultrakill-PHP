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

        $esploded = explode(":", $timeCode);

        $Minutes = floatval($esploded[0]);
        $Seconds = floatval($esploded[1]);

        $generatedTime = ($Minutes * 60) + $Seconds;

        return $generatedTime;
    }

    function toDurationSpecial($userSeconds)
    {
        $seconds = floatval($userSeconds);
        $durationString = "";

        $Minutes = floor($seconds / 60);
        $Seconds = sprintf('%06.3f',fmod($seconds, 60));

        if($userSeconds = 0)
        {
            $durationString = "Not Complete";
        }
        else
        {
            if(strlen($Minutes) == 1)
            {
                $durationString = "0" . $Minutes;
            }
            else
            {
                $durationString = $Minutes;
            }

            $durationString .= ":" . $Seconds;
        }

        return $durationString;
    }

    function getYoutubeID($linkString)
    {
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $linkString, $match);
    $youtube_id = $match[1];

    return $youtube_id;
    }

    function toYoutubeEmbed($youtubeID)
    {
        $convString = getYoutubeID($youtubeID);
        $yts = "<iframe height = '100%' width = '100%' src='https://www.youtube.com/embed/" . $convString . "' title='YouTube video player' frameborder='0' referrerpolicy='strict-origin-when-cross-origin' allowfullscreen></iframe>";

        return $yts;
    }
?>