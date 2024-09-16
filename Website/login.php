<?php
    include_once'headers.php';
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Login</title>

        <link rel='stylesheet' type='text/css' href='./resources/css/common.css' />
    </head>

    <body>
        <?php
            standardHeader("./index", "User Login");
        ?>

        <form method="post" action="./userManagement.php">
            <div class="settingChunk">
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <button type="submit">Login</button>
            </div>
        </form>
    </body>
</html>