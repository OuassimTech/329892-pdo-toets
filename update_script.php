<?php
    echo "Updated";
    include "./dbconnect.php";


if (isset($_POST['bodemformaat'])) {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE `pizza` SET `bodemformaat` = :bodemformaat WHERE `pizza`.`id` = :id";

        // Prepare statement
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':id', $_POST['id']);
        $stmt->bindParam(':bodemformaat', $_POST['bodemformaat']);

        // execute the query
        $stmt->execute();
        // echo a message to say the UPDATE succeeded
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

if (isset($_POST['saus'])) {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE `pizza` SET `saus` = :saus WHERE `pizza`.`id` = :id";

        // Prepare statement
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':id', $_POST['id']);
        $stmt->bindParam(':saus', $_POST['saus']);

        // execute the query
        $stmt->execute();
        // echo a message to say the UPDATE succeeded
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

if (isset($_POST['pizzatoppings'])) {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE `pizza` SET `pizzatoppings` = :pizzatoppings WHERE `pizza`.`id` = :id";

        // Prepare statement
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':id', $_POST['id']);
        $stmt->bindParam(':pizzatoppings', $_POST['pizzatoppings']);

        // execute the query
        $stmt->execute();
        // echo a message to say the UPDATE succeeded
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}


if (isset($_POST['kruiden'])) {
    try {
        var_dump($_POST);
        $kruiden = implode(", ", $_POST['kruiden']);
        echo $kruiden;
        // exit();
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE `pizza` SET `kruiden` = :kruiden WHERE `pizza`.`id` = :id";

        // Prepare statement
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':id', $_POST['id']);
        $stmt->bindParam(':kruiden', $kruiden);

        $kruiden = implode(", ", $_POST['kruiden']);
        echo $kruiden;

        // execute the query
        $stmt->execute();
        // echo a message to say the UPDATE succeeded
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

$conn = null;

var_dump($_POST);

header("Refresh:5.5; url=read.php");


?>