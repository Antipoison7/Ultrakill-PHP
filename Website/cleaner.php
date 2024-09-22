<?php
    function sanitize($textIn){
        $textIn = str_replace("'", "''" , $textIn);
        $textIn = str_replace('"', '""', $textIn);
        return($textIn);
    }
?>