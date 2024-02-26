<?php
echo ' this is information.php';
$db = new PDO('mysql:host=db;dbname=mcflurryCollection', 'root', 'password');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT `flavour`, `review`, `rating`, `date`, `image` FROM `mcflurrys`
                WHERE `id` = :id');
$query->bindParam(':id', $_GET['id']);
$query->execute();
$information = $query->fetch();
