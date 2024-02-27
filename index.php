<?php
//extracting info from database

require_once 'functions.php';
$db = new PDO('mysql:host=db;dbname=mcflurryCollection', 'root', 'password');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT `date`, `rating`, `review`, `image`, `location`, `flavour`, `id` FROM `mcflurrys`;');
$query->execute();
$result = $query->fetchAll();
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
<nav class="index">
    <select name="sort" id="sort">
        <option value="date">SORT BY DATE</option>
        <option value="rating">SORT BY RATING</option>
        <option value="country">SORT BY COUNTRY</option>
    </select>
    <form>
        <input type="text" placeholder="SEARCH...">
        <input type="submit" value="SEARCH">
    </form>
</nav>
<main>
    <?php
    foreach ($result as $item) {
        echo '<div class="mcflurry">';
            echo '<a href="information.php?id=' . $item['id'] . '">';
            echo '<img src="images/' . $item['image'] . '">';
            echo '</a>';
            echo '<h2>' . $item['flavour'] . '</h2>';
            echo '<h4>' . $item['location'] . ' on ' . $item['date'] . '</h4>';
            displayStars($item['rating']);
        echo '</div>';
    }
    ?>

</main>
<footer>
    <button>NEXT PAGE >></button>
</footer>
</body>
</html>
