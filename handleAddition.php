<?php
require_once 'functions.php';
databaseSetUp();
//validates Date
$datePattern  = '/[1-9][0-9][0-9]{2}-([0][1-9]|[1][0-2])-([1-2][0-9]|[0][1-9]|[3][0-1])/';
preg_match($datePattern, $_GET['date']) ? $date=$_GET['date'] : $date = null;
$flavour = $_GET['flavour'];
$city = $_GET['city'];
$country = $_GET['country'];
$rating = $_GET['rating'];
$review = $_GET['review'];

//validate .jpg file and strip.jpg
$jpgPattern = '/^.+\.([jJ][pP][gG])$/';
preg_match($jpgPattern, $_GET['image']) ? $image=pathinfo($_GET['image'], PATHINFO_FILENAME) : $image=null;

$query = $db->prepare('INSERT INTO `mcflurrys` (`date`, `rating`, `review`, `image`, `flavour`, `location`, `country`)
                        VALUES (:date, :rating, :review, :image, :flavour, :location, :country);');
$query->execute(['date'=>$date, 'rating'=>$rating, 'review'=>$review, 'image'=>$image, 'flavour'=>$flavour, 'location'=>$city, 'country'=>$country]);

header('location: thanksForSubmission.php');