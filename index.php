<?php
//extracting info from database

require_once 'functions.php';
databaseSetUp();

//check if post is set and is one of the potential categories. Not been messed with
//Convert to lower case and add to query with concatenation
//otherwise select as normal
if (isset($_POST['sort']) && ($_POST['sort'] === 'DATE' || $_POST['sort'] === 'RATING' || $_POST['sort'] === 'COUNTRY')) {
    $sorter = strtolower($_POST['sort']);
    // concatenating the
    $query = $db->prepare("SELECT `id`, `date`, `rating`, `review`, `image`, `flavour`, `location` 
                            FROM `mcflurrys`
                            ORDER BY `" . $sorter . "`;");
    $query->execute();
}
else {
    $query = $db->prepare('SELECT `id`, `date`, `rating`, `review`, `image`, `flavour`, `location` 
                            FROM `mcflurrys`;');
    $query->execute();
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
    <div class="orderSelector">
        <h4>ORDER BY:     </h4>
        <form method="post" action="index.php">
            <input type="submit" name="sort" value="DATE">
        </form>
        <form method="post" action="index.php">
            <input type="submit" name="sort" value="RATING">
        </form>
        <form method="post" action="index.php">
            <input type="submit" name="sort" value="COUNTRY">
        </form>
    </div>
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
