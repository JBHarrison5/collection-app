<?php
$db = new PDO('mysql:host=db;dbname=mcflurryCollection', 'root', 'password');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT * FROM `mcflurrys`;');
$query->execute();
$result = $query->fetchAll();

foreach ($result as $mcflurry) {
    echo '<h3>Date: ' . $mcflurry['date'] . '</h3><br>';
    echo '<h3>Rating: ' . $mcflurry['rating'] . '</h3><br>';
    echo '<p>Review: ' . $mcflurry['review'] . '</p><br>';
    echo '<h3>Image: ' . $mcflurry['image'] . '</img><br>';
    echo '<h3>Location: ' . $mcflurry['location'] . '</h3><br>';
}