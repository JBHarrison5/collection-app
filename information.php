<?php
echo ' this is information.php';
$db = new PDO('mysql:host=db;dbname=mcflurryCollection', 'root', 'password');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT `date`, `rating`, `review`, `image`, `flavour`, `location` FROM `mcflurrys`
                WHERE `id` = :mcflurryID;');
$query->bindParam('mcflurryID', $_GET['id']);
$mcflurryDetails = $query->fetchAll();
var_dump($mcflurryDetails);
