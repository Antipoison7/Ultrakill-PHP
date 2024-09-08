<?php
    include_once('databaseHelper.php');
?>

<html>


<head>
    <title>Submit A Run</title>

    <link rel='stylesheet' type='text/css' href='./resources/css/common.css' />
</head>

<body>


    <div class="flexBox" style="justify-content:space-between; margin-bottom:5px;">
        <a href="./"><button type="button" class="button">Back</button></a>
        <h1 class='ultrakillTitleText'>-- ADD A RUN --</h1>
        <div style="width:15vw;height:4vw;padding: 0vw 2vw;"></div>
    </div>
    <form method="post" action="intermediate.php" autocomplete="off">

        <div class='settingChunk'>
            <h3>Runner Name*</h3>

            <select name="Runner" id="Runners" required>
                <option value="" selected disabled hidden>Runner Name</option>
                <?php
                    echo (getRunnerDropdown());
                ?>
            </select>
        </div>

        <div class='settingChunk'>
            <h3>Category Select*</h3>

            <select name="Category" id="Categories" required>
                <option value="Any%">Any%</option>
                <option value="Any% OOB">Any% OOB</option>
                <option value="P%">P%</option>
                <option value="P% OOB">P% OOB</option>
                <option value="NoMo">NoMo</option>
                <option value="NoMo OOB">NoMo OOB</option>
            </select>
        </div>

        <div class='settingChunk'>
            <h3>Time*</h3>

            <input type="text" id="timesAchieved" name="timeAchieved" placeholder="mm:ss.mmm" pattern="\d+:\d\d.\d\d\d" required>
        </div>

        <div class='settingChunk'>
            <h3>Video Link</h3>

            <input type="url" id="videoLinks" name="videoLink" placeholder="https://youtu.be/" pattern="https://.*">
        </div>

        <div class='settingChunk'>
            <h3>Runner Comments</h3>

            <input type="text" id="runnerComments" name="runnerComment" placeholder="Your comment here">
        </div>

        <div class='settingChunk'>
            <h3>Select Level*</h3>

            <select name="level" id="Levels" required>
                <option value="" selected disabled hidden>Select Level</option>
                <option value="0-1">0-1</option>
                <option value="0-2">0-2</option>
                <option value="0-3">0-3</option>
                <option value="0-4">0-4</option>
                <option value="0-5">0-5 Cerberus</option>
                <option value="1-1">1-1</option>
                <option value="1-2">1-2</option>
                <option value="1-3">1-3</option>
                <option value="1-4">1-4 V2</option>
                <option value="2-1">2-1</option>
                <option value="2-2">2-2</option>
                <option value="2-3">2-3</option>
                <option value="2-4">2-4 Minos</option>
                <option value="3-1">3-1</option>
                <option value="3-2">3-2 Gaberiel</option>
                <option value="p-1">p-1 ???</option>
                <option value="4-1">4-1</option>
                <option value="4-2">4-2</option>
                <option value="4-3">4-3</option>
                <option value="4-4">4-4 V2 Rematch</option>
                <option value="5-1">5-1</option>
                <option value="5-2">5-2</option>
                <option value="5-3">5-3</option>
                <option value="5-4">5-4 Leviathan</option>
                <option value="6-1">6-1</option>
                <option value="6-2">6-2 Gabriel Rematch</option>
                <option value="p-2">p-2 !!!</option>
                <option value="7-1">7-1</option>
                <option value="7-2">7-2</option>
                <option value="7-3">7-3</option>
                <option value="7-4">7-4 Earthmover</option>
            </select>
        </div>

        <div class='settingChunk'>
            <h3>Difficulty*</h3>

            <select name="Difficulty" id="Difficulties" required>
                <option value="" selected disabled hidden>Choose Difficulty</option>
                <option value="1">Harmless</option>
                <option value="2">Lenient</option>
                <option value="3">Standard</option>
                <option value="4">Violent</option>
                <option value="5">Brutal</option>
            </select>
        </div>

        <div class='settingChunk'>
            <h3>Exit*</h3>

            <select name="Exit" id="Exits" required>
                <option value="Normal">Normal</option>
                <option value="Secret">Secret</option>
                <option value="Prime Door">P-Door</option>
            </select>
        </div>

        <div>
            <input type="submit" value="Submit Run" class="button">
        </div>

    </form>

</body>

</html>