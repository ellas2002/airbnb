<?php
$hoodId = $_GET["hood"];
$roomId = $_GET["room"];
$guestId = $_GET["guestNum"];

include 'src/functions.php';


$db = dbConnect();
$listingInfo = getListings($db, $hoodId, $guestId, $roomId);

echo json_encode($listingInfo);
?>

