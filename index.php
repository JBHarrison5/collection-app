<?php
$db = new PDO('mysql:host=db;dbname=mcflurryCollection', 'root', 'password');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT `date`, `rating`, `review`, `image`, `location`, `flavour` FROM `mcflurrys`;');
$query->execute();
$result = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>McFlyWithMe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <a href="index.php" class="logo"><img class="logo" src="images/mcflurryIcon.png" alt="logo"></a>
    <h1>McFlyWithMe</h1>
</header>
<nav>
    <select name="sort" id="sort">
        <option value="date">SORT BY DATE</option>
        <option value="rating">SORT BY RATING</option>
        <option value="country">SORT BY COUNTRY</option>
    </select>
    <form method="get">
        <input type="text" placeholder="SEARCH...">
        <input type="submit" value="SEARCH">
    </form>
</nav>
<main>
    <?php
    foreach ($result as $item) {
        echo '<div class="mcflurry">';
            echo '<img src="images/' . $item['image'] . '">';
            echo '<h3>' . $item['flavour'] . '</h3>';
            echo '<h3>' . $item['location'] . ' on ' . $item['date'] . '</h3>';
            echo '<h3>' . $item['rating'] . '</h3>';
        echo '</div>';
    }
    ?>
</main>
</body>
</html>
