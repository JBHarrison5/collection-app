<?php
//extracting info from database
require_once 'functions.php';
databaseSetUp();
session_start();

if (isset($_GET['nextPage'])) {
    $_SESSION['pageNum'] += 1;
}
else {
    $_SESSION['pageNum'] = 1;
}
//check if post is set and is one of the potential categories. Not been messed with
//Convert to lower case and add to query with concatenation
//otherwise select as normal
if (isset($_POST['sort']) && ($_POST['sort'] === 'date' || $_POST['sort'] === 'rating' || $_POST['sort'] === 'country')) {
    $sorter = $_POST['sort'];
    // concatenating the
    $query = $db->prepare("SELECT `id`, `date`, `rating`, `review`, `image`, `flavour`, `location` 
                            FROM `mcflurrys`
                            ORDER BY `" . $sorter . "`;");
}
else {
    $query = $db->prepare('SELECT `id`, `date`, `rating`, `review`, `image`, `flavour`, `location` 
                            FROM `mcflurrys`;');
}

//check if search is set then scan multiple fields in the database to have a look
if (isset($_GET['search'])) {
    $query = $db->prepare("SELECT `id`, `date`, `rating`, `review`, `image`, `flavour`, `location`
                            FROM `mcflurrys`
                            WHERE `date` LIKE CONCAT('%', :search, '%')
                            OR `review` LIKE CONCAT('%', :search , '%')
                            OR `flavour` LIKE CONCAT('%', :search , '%')
                            OR `location` LIKE CONCAT('%', :search , '%')
                            OR `country` LIKE CONCAT('%', :search , '%');");
    $query->bindParam(':search', $_GET['search']);
}
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
    <div class="LHSButtons">
        <form action="index.php" method="POST">
            <select name="sort" id="sort" onchange="this.form.submit();">
                <option value="" disabled selected hidden>McSort</option>
                <option value="date">DATE</option>
                <option value="rating">RATING</option>
                <option value="country">COUNTRY</option>
            </select>
        </form>
        <form action="addEntry.php">
            <input type="submit" value="McAdd">
        </form>
    </div>
    <form action="index.php" method="GET">
        <input type="text" id="search" name="search" placeholder="SEARCH...">
        <input id="submit" type="submit" value="McSearch">
    </form>
</nav>
<main>
    <?php

    //covers the case where search doesn't return anything
    if (count($result) === 0){
        echo "<h3>No Results Found</h3>";
    }
    else {
        $pageNumber = $_SESSION['pageNum'];
        for ($i = ($pageNumber - 1) * 10; $i < $pageNumber * 10; $i++) {
            if ($i > count($result) - 1) {
                break;
            }
            $item = $result[$i];
            //checks images directory to see if the image is there. if it isn't it sets the array to null
            (in_array($item['image'] . '.jpg', scandir('images'))) ?: $item['image'] = null;

            assignNulls($item);
            echo '<div class="mcflurry">';
            echo '<a href="information.php?id=' . $item['id'] . '">';
            echo '<img src="images/' . $item['image'] . '.jpg" alt="no image available";>';
            echo '</a>';
            echo '<h2>' . $item['flavour'] . '</h2>';
            echo '<h4>' . $item['location'] . ' on ' . $item['date'] . '</h4>';
            if ($item['rating'] === 'Unknown Rating') {
                echo '<h3>NO RATING</h3>';
            } else {
                displayStars($item['rating']);
            }
            echo '</div>';
        }
    }
    ?>

</main>
<footer>
    <?PHP
    echo '<button>PAGE ' . $_SESSION['pageNum'] . '</button>'
    ?>
    <form action="index.php">
        <input type="submit" name="nextPage" value="NEXT PAGE >>">
    </form>
</footer>
</body>
</html>
