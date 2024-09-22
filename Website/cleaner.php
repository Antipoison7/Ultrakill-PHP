<?php
    function sanitize($textIn){
        $textIn = str_replace("'", "''" , $textIn);
        $textIn = str_replace('"', '""', $textIn);
        return($textIn);
    }

    function sanitizeHTML($textIn)
    {
        $textIn = str_replace("<", "&lt;", $textIn);
        $textIn = str_replace(">", "&gt;", $textIn);
        return($textIn);
    }
?>