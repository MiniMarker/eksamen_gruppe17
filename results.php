
<?php 
$port = 8889;
$username = "root";
$password = "root";
$name = "eksamen_gruppe17";

$connection = new PDO("mysql:host=localhost;dbname={$name};port={$port}", $username, $password);

$statement = $connection -> prepare('SELECT * FROM resturant');

$statement -> execute();

while ($row = $statement -> fetch(PDO::FETCH_ASSOC)) {
    $resturants[] = $row;
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link href="results.css" type="text/css" rel="stylesheet">
<script src="map-script.js"></script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDom7SHx9ZtEf7dQKyTbbvGjEjkG-aTc6o&callback=initMap">
    </script>

<title>Testforside</title>

</head>
<body>
    <img id="menu-botton" src="img/menu.png">
    <div id="page-title">
        <h1>Resturanter</h1>
    </div>
    <div id="outer-box">
        <div id="left-inner-box">
            
            <?php foreach($resturants as $resturant) { ?>
            <a href="<?= $resturant["link-path"] ?>" >
            <div id="card">
                    <img class="card-img" src="<?= $resturant["img_path"] ?>" >
                
                <h1 class="card-title"><?= $resturant["name"] ?></h1>
                
                <?php if ($resturant["rating"] == 5) { ?>  
                    <img class="stars" src="img/stars/5-stars.png">
                        
                <?php } elseif ($resturant["rating"] == 4) { ?>
                    <img class="stars" src="img/stars/4-stars.png">
                
                <?php } elseif ($resturant["rating"] == 3) { ?>
                    <img class="stars" src="img/stars/3-stars.png">
                
                <?php } elseif ($resturant["rating"] == 2) { ?>
                    <img class="stars" src="img/stars/2-stars.png">
                
                <?php } elseif ($resturant["rating"] == 1) { ?>
                    <img class="stars" src="img/stars/1-star.png">
                
                <?php } ?>
                
                <div class="card-description">
                <p ><?= $resturant["description"] ?> </p>
                </div>
            </div>
            </a>
            
            
            <?php } ?>
        </div>
        
        <div id="right-inner-box">
            <div id="map"></div>
        </div>
    </div>
</body>
</html>