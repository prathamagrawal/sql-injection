<!DOCTYPE html>
<html>

<head>
    <title>XSS 5</title>
    <link rel="shortcut icon" href="../Resources/hmbct.png" />
    <link rel="stylesheet" href="../Resources/button.css">
</head>

<body>

    <!-- <div style="background-color:#ffffff;color: #037BFE;border-radius: 30px;box-shadow: 0 0 1px 1px gray;padding: 10px;">
        <button type="button" name="homeButton" onclick="location.href='../homepage.html';" class="button" style="margin-top: 30px;margin-bottom: 30px;">Home Page</button>
        <button type="button" name="mainButton" onclick="location.href='xssmainpage.html';" class="button" style="margin-top: 30px;margin-bottom: 30px;">Main Page</button>
    </div> -->

    <div align="center">
        <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="form">
            <p>Your name:<input type="text" name="username"></p>
            <button type="submit" name="submit" value="Submit" class="button" style="margin-top: 30px;margin-bottom: 30px;">Submit</button>
        </form>
    </div>

    <?php
    if (isset($_GET["username"])) {
        $user = str_replace("<", "", $_GET["username"]);
        echo "Your name is " . "$user";
    }
    ?>

</body>

</html>