<?php 
require "php/db-connection.php";
require "php/result-header.php";

$statement = $connection -> prepare('SELECT * FROM cafe');

$statement -> execute();

while ($row = $statement -> fetch(PDO::FETCH_ASSOC)) {
    $cafes[] = $row;
}

?>


<head>
    
    
    
    <!-- GENERELLE INNSTILLINGER -->
    <title>Caféer</title> 
    <script src="js/cafe-map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDom7SHx9ZtEf7dQKyTbbvGjEjkG-aTc6o&callback=initMap" async defer>
    </script>
    <!-- GENERELLE INNSTILLINGER SLUTT -->
    
    
    
</head>

<body>
    <!-- CONTAINER -->
    <div id="container">
        <img id="background" src="img/background.png">
        
        
        
        <!-- MENYKNAPPER -->
        <img onclick="showDiv()" id="menu-botton" src="img/menu.png">
        <img onclick="showDiv()" id="close-menu-button" src="img/menu2.png">
        <a href="index.php">
            <img id="home-button" src="img/home.png">
        </a>
        <!-- MENYKNAPPER SLUTT -->
        
        
        
        <!-- SIDETITTEL -->
        <div id="page-title">
            <h1>Caféer</h1>
        </div>
        <!-- SIDETITTEL SLUTT -->
        
        
        
        <!-- MENY -->
        <div id="menubar">
            <div id="buttons">
                <a href="hotell.php">
                    <div class="button" id="hotel-button">
                        <img id="hotel-img" src="img/icons/hotel.png">
                        <p>Hoteller</p>
                    </div>
                </a>

                <a href="cafes.php">
                    <div class="button" id="cafe-button">
                        <img src="img/icons/coffee-cup.png">
                        <p>Café</p>
                    </div>
                </a>

                <a href="resturants.php">
                    <div class="button" id="resturant-button">
                        <img src="img/icons/resturants.png">
                        <p>Resturanter</p>
                    </div>
                </a>

                <a href="bar.php">
                    <div class="button" id="beer-button">
                        <img src="img/icons/drink-beer-jar.png">
                        <p>Barer</p>
                    </div>
                </a>

                <a href="events.php">
                    <div class="button" id="ticket-button">
                        <img src="img/icons/tickets.png">
                        <p>Eventer</p>
                    </div>
                </a>

                <a href="aktiviteter.php">
                    <div class="button" id="activity-button">
                        <img src="img/icons/activity.png">
                        <p>Aktiviteter</p>
                    </div>
                </a>
            </div>
        </div>
        <!-- MENY SLUTT -->
        
        
        
        <!-- YTRE DIV -->
        <div id="outer-box">
            
            
            
            <!-- RESULTATLISTE -->
            <div id="left-inner-box">

                <?php foreach($cafes as $cafe) { ?>

                <div class="cards">
                    <a href="<?= $cafe["link-path"] ?>">
                        <img class="card-img" src="<?= $cafe["img_path"] ?>">
                        
                        <h1 class="card-title">
                            <?= $cafe["name"] ?>
                        </h1>
                    </a>

                    <?php if ($cafe["rating"] == 5) { ?>
                    <img class="card-stars" src="img/stars/5-stars.png">

                    <?php } elseif ($cafe["rating"] == 4) { ?>
                    <img class="card-stars" src="img/stars/4-stars.png">

                    <?php } elseif ($cafe["rating"] == 3) { ?>
                    <img class="card-stars" src="img/stars/3-stars.png">

                    <?php } elseif ($cafe["rating"] == 2) { ?>
                    <img class="card-stars" src="img/stars/2-stars.png">

                    <?php } elseif ($cafe["rating"] == 1) { ?>
                    <img class="card-stars" src="img/stars/1-star.png">

                    <?php } ?>

                    <div class="card-description">
                        <p>
                            <?= $cafe["description"] ?>
                        </p>
                    </div>
                </div>

                <?php } ?>
            </div>
            <!-- RESULTATLISTE SLUTT -->
            
            
            
            <!-- KART -->
            <div id="right-inner-box">
                <div id="map"></div>
            </div>
            <!-- KART SLUTT -->
            
        </div>
        <!-- YTRE DIV SLUTT -->
        
    </div>
    <!-- CONTAINER SLUTT-->
    
<?php 
    require "php/footer.php";
?>
