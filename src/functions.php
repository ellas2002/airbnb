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

//stores the reuslt of getNeighborhood function
if (!isset($_SESSION['hoods'])) {
   $_SESSION['hoods'] = getNeighborhood();

    // echo "<pre>";
    // print_r($_SESSION['hoods']);
    // echo "</pre>";
}

//grabs room type from the database using PDO
function getRoomType(){
    $conn = dbConnect();
 
    $stmt = $conn->query("SELECT * FROM roomTypes ORDER BY type ASC");

    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

//stores the reuslt of getRoomType function
if (!isset($_SESSION['room'])) {
    $_SESSION['room'] = getRoomType();
     
     //echo "<pre>";
     //print_r($_SESSION['room']);
     //echo "</pre>";
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