<?php
    function sanitize($textIn){
        $textIn = str_replace("'", "''" , $textIn);
        $textIn = str_replace('"', '""', $textIn);
        return($textIn);
    }

    function sanitizeHTML($textIn)
    {
        $textIn = str_replace("&", "&amp;", $textIn);
        $textIn = str_replace("<", "&lt;", $textIn);
        $textIn = str_replace(">", "&gt;", $textIn);
        $textIn = str_replace("'", "&#039;", $textIn);
        $textIn = str_replace('"', "&quot;", $textIn);
        return($textIn);
    }
?>