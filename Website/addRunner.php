<!DOCTYPE html>
<html>
    <head>
        <title>Runner Lookup</title>
        <link rel='stylesheet' type='text/css' href='./resources/css/common.css' />
    </head>

    <body>
        <div class="flexBox" style="justify-content:space-between; margin-bottom:10px;">
            <a href="./runners.html"><button type="button" class="button">Back</button></a>
            <h1 class='ultrakillTitleText'>-- Level Select --</h1>
            <div style="width:15vw;height:4vw;padding: 0vw 2vw;"></div>
        </div>
    
        <form method="post" action="/intermediateUser.html" autocomplete="off">
            <div class='settingChunk'>
                <h3>Runner Name*</h3>
                <input type="text" id="runnerName" name="runnerName" placeholder="FirstName LastName" required>
            </div>
            <div class='settingChunk'>
                <h3>Display Name*</h3>
                <input type="text" id="runnerDisplayName" name="runnerDisplayName" placeholder="Display Name" required>
            </div>
            <div class='settingChunk'>
                <h3><a href='https://www.steamidfinder.com/' target='_blank'>SteamID (64 Decimal)</a></h3>
                <input type="text" id="runnerSteamId" name="runnerSteamId" placeholder="steamID64 (Dec):" pattern="[0-9]{17}">
            </div>
            <div>
                <input type="submit" value="Register User" class="button">
            </div>
        </form>
    </body>
</html>