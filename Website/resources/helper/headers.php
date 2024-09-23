<?php
function standardHeader($link, $title)
{
    echo("<div class=\"flexBox\" style=\"justify-content:space-between; margin-bottom:10px;\">");
    echo("<a href=\"" . $link . "\"><button type=\"button\" class=\"button\">Back</button></a>");
    echo("<h1 class=\"ultrakillTitleText\">-- " . $title . " --</h1>");
    echo("<div style=\"width:15vw;height:4vw;padding: 0vw 2vw;\"></div>");
    echo("</div>");
}

function sideButtonHeader($link, $title, $link2)
{
    echo("<div class=\"flexBox\" style=\"justify-content:space-between; margin-bottom:10px;\">");
    echo("<a href=\"" . $link . "\"><button type=\"button\" class=\"button\">Back</button></a>");
    echo("<h1 class=\"ultrakillTitleText\">-- " . $title . " --</h1>");
    echo("<a href=\"" . $link2 . "\"><button type=\"button\" class=\"button\">+ Add Runner</button></a>");
    echo("</div>"); 
}

function sideButtonHeaderB($link, $title, $link2)
{
    echo("<div class=\"flexBox\" style=\"justify-content:space-between; margin-bottom:10px;\">");
    echo("<a href=\"" . $link . "\"><div class=\"button\" style=\"display: flex; align-items: center; justify-content: center; margin-left: 10px;\">Back</div></a>");
    echo("<h1 class=\"ultrakillTitleText\">-- " . $title . " --</h1>");
    echo("<a href=\"" . $link2 . "\"><div class=\"button\" style=\"display: flex; align-items: center; justify-content: center; margin-left: 10px;\">Mod Login</div></a>");
    echo("</div>"); 
}

function fakeStandardHeader($link, $title)
{
    echo("<div class=\"flexBox\" style=\"justify-content:space-between; margin-bottom:10px;\">");
    echo("<a href=\"" . $link . "\"><div class=\"button\" style=\"display: flex; align-items: center; justify-content: center; margin-left: 10px;\">Back</div></a>");
    echo("<h1 class=\"ultrakillTitleText\">-- " . $title . " --</h1>");
    echo("<div style=\"width:15vw;height:4vw;padding: 0vw 2vw;\"></div>");
    echo("</div>");
}

function fakeModDoubleHeader($link, $title)
{
    echo("<div class=\"flexBox\" style=\"justify-content:space-between; margin-bottom:10px;\">");
    echo("<a href=\"" . $link . "\"><div class=\"button\" style=\"display: flex; align-items: center; justify-content: center; margin-left: 10px;\">Back</div></a>");
    echo("<h1 class=\"ultrakillTitleText\">-- " . $title . " --</h1>");
    echo("<button type=\"submit\" class=\"button\">Delete</button>");
    echo("</div>");
}
?>