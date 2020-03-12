<?php $url=getAddress();

if (strpos($url, "code") == false){
    echo '<h5 style="margin-left: 3.4rem">This registration link is not valid<br/>';
    echo '<span style="font-weight: 400; font-style: italic; color: #504d4d;">Dieser Registrierungslink ist ungültig</span></h5>';
    die();
}

$id = substr($url, strpos($url, "code") + strlen("code"), 6);

    class TableRows extends RecursiveIteratorIterator {
        function __construct($it) {
            parent::__construct($it, self::LEAVES_ONLY);
        }
    } 
    $servername = "localhost";
    $username = "dbo819600357";
    $password = "rln9H78B?RtHdUqVHjwS1";
    $dbname = "db819600357"; 
/* 	$username = "root";
    $password = "root";
    $dbname = "sharedhistory"; */

    //Check if code exists in the db

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT EXISTS(SELECT * FROM InvitationsB WHERE code='$id')");
        
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
            if ($v == 0) {
                echo '<h5 style="margin-left: 3.4rem">This registration link is not valid<br/>';
                echo '<span style="font-weight: 400; font-style: italic;color: #504d4d;">Dieser Registrierungslink ist ungültig</span></h5>';
                die();
            }
        }
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;

    //If it exists then update has_been_sent
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT has_been_sent FROM InvitationsB WHERE code='$id' ");
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
            if ($v == 1) {
                echo '<h5 style="margin-left: 3.4rem">This registration link is not valid<br/>';
                echo '<span style="font-weight: 400; font-style: italic;">Dieser Registrierungslink ist ungültig</span></h5>';
                die();
            }
        }
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null; 
    ?>