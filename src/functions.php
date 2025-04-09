
<?php
$hoodId = $_GET["hood"]?? null;;
$roomId = $_GET["room"]?? null;;
$guestId = $_GET["guestNum"]?? null;;


//grabs neighborhoods from the database using PDO
function getNeighborhood(){
    $conn = dbConnect();
 
    $stmt = $conn->query("SELECT * FROM neighborhoods ORDER BY neighborhood ASC");

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



//grabs room type from the database using PDO
function getRoomType(){
    $conn = dbConnect();
    
    //$stmt = $conn->query("SELECT * FROM roomTypes ORDER BY type ASC");
    $stmt = $conn->query("SELECT * FROM roomTypes");

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



//grabs array of names based on search results
function getListings($conn, $hoodId, $guestId, $roomId){
    $conn = dbConnect();
 
    $stmt = $conn->prepare("SELECT listings.*
                        FROM listings 
                        JOIN neighborhoods on listings.neighborhoodId=neighborhoods.id 
                        WHERE listings.roomTypeId = ?
                        AND listings.accommodates >= ?
                        AND listings.neighborhoodId = ?
                        LIMIT 20");

    $stmt->execute([$roomId, $guestId, $hoodId]);
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


// function that grabs listings.id from results.php and populates the modal based on the id
//many JOIN ON for grabing hosts and amennities so I dont have to create more functions for ajax (im lazy)
function jsListings($id){
    $conn = dbConnect();
 
    $stmt = $conn->prepare("SELECT * 
                            FROM listings 
                            JOIN hosts ON listings.hostId = hosts.id
                            JOIN listingAmenities ON listings.id=listingAmenities.listingID
                            JOIN amenities ON amenities.id=listingAmenities.amenityID
                            WHERE listings.id = ?;");
                                    

    $stmt->execute([$id]);
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//var_dump(getListings($hoodId, $guestId, $roomId));

//before i really grasped JOIN not changing though
function getUserRoom($roomId){
    $conn = dbConnect();
 
    $stmt = $conn->prepare("SELECT type FROM roomTypes
                        WHERE roomTypes.id = ?
                        LIMIT 20");

    $stmt->execute([$roomId]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

//var_dump(getUserRoom($roomId));

//before i really grasped JOIN not changing though
function getUserNeighborhood($hoodId){
    $conn = dbConnect();
 
    $stmt = $conn->prepare("SELECT neighborhood FROM neighborhoods
                        WHERE neighborhoods.id = ?
                        LIMIT 20");

    $stmt->execute([$hoodId]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}


//before i really grasped JOIN not changing though
function getHost(){
    $conn = dbConnect();
 
    $stmt = $conn->query("SELECT * FROM hosts LIMIT 10");

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}


function dbConnect(){
    /* defined in config/config.php */
    /*** connection credentials *******/
    $servername = SERVER;
    $username = USERNAME;
    $password = PASSWORD;
    $database = DATABASE;
    $dbport = PORT;
    /****** connect to database **************/

    try {
        $db = new PDO("mysql:host=$servername;dbname=$database;charset=utf8mb4;port=$dbport", $username, $password);
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
    return $db;
}


?>