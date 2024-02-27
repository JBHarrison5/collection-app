<?php
$db = new PDO('mysql:host=db;dbname=mcflurryCollection', 'root', 'password');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

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
        echo '<div class="stars">';
            $counter = $information['rating'];
            while ($counter > 0) {
                if ($counter >= 1) {
                    echo '<i class="fa-solid fa-star"></i>';
                }
                else {
                    echo '<i class="fa-regular fa-star-half-stroke"></i>';
                }
                $counter -= 1;
            }
            for ($i=0; $i < floor(5-$information['rating']); $i++) {
                echo '<i class="fa-regular fa-star"></i>';
            }
        echo '</div>';
        echo '<p>' . $information['review'] . '</p>';
        echo '</div>';
    ?>
</main>
</body>
</html>
