<?php

require_once 'functions.php';
databaseSetUp();

$query = $db->prepare('SELECT `flavour`, `review`, `rating`, `date`, `image`, `location` FROM `mcflurrys`
                WHERE `id` = :id');
$query->bindParam(':id', $_GET['id']);
$query->execute();
$information = $query->fetch();
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
    <?php
    echo '<div class="mcflurry information">';
        echo '<img src="images/' . $information['image'] . '">';
        echo '<h2>' . $information['flavour'] . '</h2>';
        echo '<h4>' . $information['location'] . ' on ' . $information['date'] . '</h4>';
        displayStars($information['rating']);
        echo '<p>' . $information['review'] . '</p>';
    echo '</div>';
    ?>
</main>
</body>
</html>
