<?php
function standardHeader($link, $title)
{
    echo("<div class=\"flexBox\" style=\"justify-content:space-between; margin-bottom:10px;\">");
    echo("<a href=\"" . $link . "\"><button type=\"button\" class=\"button\">Back</button></a>");
    echo("<h1 class=\"ultrakillTitleText\">-- " . $title . " --</h1>");
    echo("<div style=\"width:15vw;height:4vw;padding: 0vw 2vw;\"></div>");
    echo("</div>");
}
?>