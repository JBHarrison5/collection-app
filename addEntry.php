<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>McFlyWithMe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <a href="index.php" class="logo"><img class="logo" src="images/mcflurryIcon.png" alt="logo"></a>
    <h1>McFlyWithMe</h1>
</header>
<nav class="information">
    <a href="index.php">HOME</a>
</nav>
<main>
    <div class="submissionForm">
        <form action="handleAddition.php">
            <div class="formRow">
                <input type="text" name="date" placeholder="Date of Eating">
                <input type="text" name="flavour" placeholder="Flavour">
            </div>
            <div class="formRow">
                <input type="text" name="country" placeholder="Country">
                <input type="text" name="city" placeholder="City">
            </div>
            <div class="formRow">
                <input class="imageUpload" type="text" name="image" placeholder="Image Upload (.jpg)">
            </div>
            <div class="slider formRow">
                <p>How Many Stars?</p>
                <input type="range" name='rating' id='rating' value="rangeValue" min="0" max="5" step="0.5" oninput="rangeValue.innerText = this.value">
                <p id="rangeValue">2.5</p>
            </div>
            <textarea class="formRow" name="review" rows="6" cols="40" placeholder="YOUR REVIEW...">
            </textarea>
            <div class="formRow">
                <input type="submit">
            </div>
        </form>

    </div>

</main>
</body>
</html>
