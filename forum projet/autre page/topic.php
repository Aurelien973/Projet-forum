<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="image/background.jpg">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="banner">
        <div class="ttm">
            <h1>Talk So Much <img src="image/talk.png" ></h1>
         <?php
            include("menu.php");
            ?>
        </div>
        <div class="todo">
            <h2>TOPIC<img src="image/topic-icon 2.png"></h2>
            <div class="ligne">
                <input type="text" id="input-box" placeholder="ADD YOUR TOPIC">
                <button type="button">Add</button>
            </div>

        </div>
    </div>
</body>
</html>