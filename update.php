<?php

include "./dbconnect.php";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM `pizza` Where `id` = :id");
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $r = $stmt->fetch();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Pizza!</title>
</head>

<body>
    <h1>Maak je eigen pizza</h1>
    <div class="container">
        <div class="form">
            <form action="/update_script.php" method="post">

                <label for="models">Bodemformaat</label>
                <select name="bodemformaat" class="form-select" aria-label="Default select example" style="width: auto;">
                    <option value="<?php echo $r["bodemformaat"] ?>"><?php echo $r["bodemformaat"]?></option>
                    <option value="20 centimeter">20 centimeter</option>
                    <option value="25 centimeter">25 centimeter</option>
                    <option value="30 centimeter">30 centimeter</option>
                    <option value="35 centimeter">35 centimeter</option>
                    <option value="40 centimeter">40 centimeter</option>
                </select>

                <br>

                <label for="models">Saus</label>
                <select name="saus" class="form-select" aria-label="Default select example" style="width: auto;">
                    <option value="<?php echo $r["saus"]?>"><?php echo $r["saus"]?></option>
                    <option value="Tomatensaus">Tomatensaus</option>
                    <option value="Extra tomatensaus">Extra tomatensaus</option>
                    <option value="Spicy tomatensaus">Spicy tomatensaus</option>
                    <option value="BBQ saus">BBQ saus</option>
                    <option value="Creme faiche">Creme faiche</option>
                </select>

                <br>

                <label for="models">Pizzatoppings</label>
                <div class="form-check">
                    <input name="pizzatoppings" class="form-check-input" type="radio" name="flexRadioDefault" value="vegan" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        vegan
                    </label>
                </div>
                <div class="form-check">
                    <input name="pizzatoppings" class="form-check-input" type="radio" name="flexRadioDefault" value="vegetarisch" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        vegetarisch
                    </label>
                </div>
                <div class="form-check">
                    <input name="pizzatoppings" class="form-check-input" type="radio" name="flexRadioDefault" value="vlees" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        vlees
                    </label>
                </div>

                <br>

                <label for="models">Kruiden</label>
                <div class="form-check">
                    <input name="kruiden[]" class="form-check-input" type="checkbox" value="Peterselie" <?=$v['kruiden'] ? "checked" : "" ?> id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Peterselie
                    </label>
                </div>
                <div class="form-check">
                    <input name="kruiden[]" class="form-check-input" type="checkbox" value="Oregano" <?=$v['kruiden'] ? "checked" : "" ?> id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Oregano
                    </label>
                </div>
                <div class="form-check">
                    <input name="kruiden[]" class="form-check-input" type="checkbox" value="Chili flakes" <?=$v['kruiden'] ? "checked" : "" ?> id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Chili flakes
                    </label>
                </div>
                <div class="form-check">
                    <input name="kruiden[]" class="form-check-input" type="checkbox" value="Zwarte pepper" <?=$v['kruiden'] ? "checked" : "" ?> id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Zwarte pepper
                    </label>
                </div>
                <input type="hidden" name="id" value="<?= $_GET["id"]; ?>">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>