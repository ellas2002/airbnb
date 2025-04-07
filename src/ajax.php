<?php

$id = $_GET["id"];

include 'functions.php';
include '../config/config.php';


$db = dbConnect();
$listingStuff = jsListings($id);
echo json_encode($listingStuff);

?>

