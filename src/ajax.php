<?php

include 'functions.php';
include '../config/config.php';

$id = $_GET["id"];

$db = dbConnect();
$listingStuff = jsListings($id);

// Check if there is data
if ($listingStuff) {
    echo json_encode($listingStuff);
} else {
    echo json_encode(["error" => "No listing found"]);
}
?>

