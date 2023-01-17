
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POLKA PIWO</title>
    <link href="../style/style.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/vnd.microsoft.icon" href="../src/favicon.ico">
</head>
<body>
<header class="masthead" style="background-image: url('../src/img/blond.jpeg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
            </div>
        </div>
    </div>
</header>
<?php
include('../nav.in.php')
?>
<?php

$db = new mysqli('localhost','root','','polkapiwo','3307');

if($db->connect_error):
    echo $db->connect_error;
endif;

if(isset($_POST["schickRez"])) {

    $rezension = $_POST['rezension'];

    $insert = $db->prepare("INSERT INTO rezension (`artikel_id`, `kunden_id`, `rezension`) values (2,1,?)");
    $insert->bind_param('s',$rezension);
    $insert->execute();
}
?>
<?php

if(empty($_SESSION['user'])){
    header('Location: /itc2022/PolkaPiwo/unknown/main.php');
}else{


}
?>
<div style = "position:relative; left:100px; bottom:150px"><img src="../src/img/Merchbg.png" width="700" height="800">
    <div style = "position:relative; left:800px; bottom:600px">
        <h1>Preis: 5€</h1>
    </div>
    <div style = "position:relative; left:800px; bottom:600px">
        <h3>Beschreibung:</h3>
        <span class="subheading">Ein erfrischender Kasten Bier gefüllt mit 24 gekühlten Flaschen!</span> <br>
        <span class="subheading">Alkoholgehalt: 9,6 % vol.</span> <br>
        <span class="subheading">Inhalt pro Flasche: 0,5l</span> <br>
        <span class="subheading">Zutaten: Wasser, Gerstenmalz, Hopfen, Hopfenextrakt</span> <br>
    </div>
</div>
<div style = "position:relative; left:50px; bottom:400px;">
    <h1>REZENSIONEN</h1>
    <form action="" method="post">
        Rezension:<br> <input type="text" name="rezension" id="userID"><br>
        <input type="submit" name="schickRez"><br>
    </form>
    <?php
    $aus = "SELECT * FROM rezension INNER JOIN kunden USING(kunden_id) WHERE artikel_id = 2";
    foreach ($db->query($aus) as $row) {
        echo "".$row['name'].": ".$row['rezension']."<br /> <br />" ;
    }
    ?>
</div>



<?php
include('../footer.in.php')
?>
</body>
</html>