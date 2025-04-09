<?php

    include 'functions.php';
    include '../config/config.php';

    $id = $_GET["id"];
    //echo $id;

    $db = dbConnect();
    $listingStuff = jsListings($id);


    echo json_encode($listingStuff);

?>

