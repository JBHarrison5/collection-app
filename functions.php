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


