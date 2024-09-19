<?php
    include_once 'headers.php';
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Login</title>

        <link rel='stylesheet' type='text/css' href='./resources/css/common.css' />
    </head>

    <body>
        <?php
            standardHeader("./index.php", "MODERATOR LOGIN");
        ?>

        <form method="post" action="./loginVerify.php">
            <div class="settingChunk">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="settingChunk">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="flexBox">
                <button type="submit" class="button">Login</button>
                <!-- <a href="./createUser.php"><div class="button" style="display: flex; align-items: center; justify-content: center; margin-left: 10px;">Register</div></a> -->
            </div>
        </form>
    </body>
</html>