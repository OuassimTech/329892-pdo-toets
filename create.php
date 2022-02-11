<?php
include("./dbconnect.php");

echo "created";

// var_dump($_POST);
$bodemformaat = $_POST["bodemformaat"];
$saus = $_POST["saus"];
$pizzatoppings = $_POST["pizzatoppings"];
$kruiden = $_POST["kruiden"];
$kruiden = implode(", ", $_POST['kruiden']);


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //   // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO `pizza` (`bodemformaat`, `saus`, `pizzatoppings`, `kruiden`)
                            VALUES (:bodemformaat, :saus, :pizzatoppings, :kruiden)");
    $stmt->bindParam(':bodemformaat', $bodemformaat);
    $stmt->bindParam(':saus', $saus);
    $stmt->bindParam(':pizzatoppings', $pizzatoppings);
    $stmt->bindParam(':kruiden', $kruiden);
    $stmt->execute();
} 
catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

header("Refresh:3; url=read.php");
