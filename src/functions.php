<?php
    include 'config/config.php';
?>

<?php

//grabs neighborhoods from the database using PDO
function getNeighborhood(){
    $conn = dbConnect();
 
    $stmt = $conn->query("SELECT * FROM neighborhoods ORDER BY neighborhood ASC");

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



//grabs room type from the database using PDO
function getRoomType(){
    $conn = dbConnect();
 
    $stmt = $conn->query("SELECT type FROM roomTypes ORDER BY type ASC");

    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}


//grabs array of names based on search results
function getListings(){
    $conn = dbConnect();
 
    $stmt = $conn->query("SELECT * FROM listings LIMIT 10");

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);

    // catch(Exce $e){
    //     echo $e
    // }
}

function getHost(){
    $conn = dbConnect();
 
    $stmt = $conn->query("SELECT * FROM hosts LIMIT 10");

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

// var_dump(getListings());



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