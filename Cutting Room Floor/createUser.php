<?php
    include_once 'headers.php';
    include_once 'databaseHelper.php';
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Create Account</title>

        <link rel='stylesheet' type='text/css' href='./resources/css/common.css' />
    </head>

    <body>
        <?php
            standardHeader("./login.php", "Register User");
        ?>

        <form method="post" action="./intermediateRegister.php">
            <div class="settingChunk">
                <label for="userIDSelect">Your name not here? Create runner in the <a href="./runners.php">runners tab</a></label>
                <select id="userIDSelect" name="userIDSelect">
                    <?php
                        getUnregistered();
                    ?>
                </select>
            </div>

            <div class="settingChunk">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="settingChunk">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="button">Register</button>
        </form>
    </body>
</html>