<?php
require_once 'functions.php';
databaseSetUp();

$query = $db->prepare('UPDATE `mcflurrys` 
                       SET `deleteStatus` = 1 
                       WHERE `id` = :id');
$query->bindParam(':id', $_POST['delete']);
$query->execute();

header('location: itemDeleted.php');