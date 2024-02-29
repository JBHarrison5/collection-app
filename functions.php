<?php

function displayStars($rating)
{
    echo '<div class="stars">';
    $counter = $rating;
    while ($counter > 0) {
        if ($counter >= 1) {
            echo '<i class="fa-solid fa-star"></i>';
        } else {
            echo '<i class="fa-regular fa-star-half-stroke"></i>';
        }
        $counter -= 1;
    }
    for ($i = 0; $i < floor(5 - $rating); $i++) {
        echo '<i class="fa-regular fa-star"></i>';
    }
    echo '</div>';
}

function databaseSetUp() {
    global $db;
    $db = new PDO('mysql:host=db;dbname=mcflurryCollection', 'root', 'password');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}

function assignNulls(&$item)
{
    foreach ($item as $k => $v) {
        if (!$v) {
            $item[$k] = "Unknown " . ucfirst($k);
        }
    }
}

function displayInfo($info)
{
    echo '<div class="mcflurry information">';
    echo '<img src="images/' . $info['image'] . '.jpg">';
    echo '<h2>' . $info['flavour'] . '</h2>';
    echo '<h4>' . $info['location'] . ' on ' . $info['date'] . '</h4>';
    if ($info['rating'] === 'Unknown Rating') {
        echo '<h3>NO RATING</h3>';
    }
    else {
        displayStars($info['rating']);
    }
}
