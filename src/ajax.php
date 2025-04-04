<?php
include 'src/ajax.php';
include 'src/functions.php';
    
$db = dbConnect();
$hoodId = $_GET["hood"];
$roomId = $_GET["room"];
$guestId = $_GET["guestNum"];

include 'src/functions.php';

$db = dbConnect();
$listingInfo = getListings($hoodId, $guestId, $roomId);

$neighborhoodId = getUserNeighborhood($hoodId);

$hostInfo = getHost();

$roomInfo = getUserRoom($roomId);


// Check if the listing ID is set
if (isset($_GET['listing_id'])) {
  $listingId = $_GET['listing_id'];

  $data = $stmt = $conn($listingId);
  $stmt->execute();

  //  Return a JSON response
  $response = array('message' => 'Listing ID received: ' . $listingId);
  echo json_encode($response);
} else {
  // Handle the case where the listing ID is not set
  $response = array('error' => 'Listing ID not provided');
  echo json_encode($response);
}
?>