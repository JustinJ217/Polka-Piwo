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

$db = new mysqli('localhost','root','','polkapiwo','3306');

if($db->connect_error):
    echo $db->connect_error;
endif;

$formErrors = [];

if(isset($_POST["warenkorb"])) {

    $testst = $_POST['testst'];
    $uid = $_SESSION['user'];

    $insert2 = $db->prepare("INSERT INTO warenkorb(anzahl, kunden_id) values (?,?)");
    $insert2->bind_param('ii', $testst, $uid);
    $insert2->execute();
}

if(isset($_POST["schickRez"])) {
    $rezension = $_POST['rezension'];
    $uid = $_SESSION['user'];
    $bewertung = $_POST['quantity'];

    if(empty($rezension)){
        $formErrors['rezension'] = "Bitte einen Vornamen eingeben!";

    }

    $insert = $db->prepare("INSERT INTO rezension (`artikel_id`, `kunden_id`, `rezension`,`bewertung`) values (3,?,?,?)");
    $insert->bind_param('isi', $uid, $rezension,$bewertung);
    $insert->execute();

}


if (isset($_POST["Delete"])) {
    $del = $db->prepare("DELETE * FROM rezension");
    $del->execute();
}
?>
<?php

if(empty($_SESSION['user'])){
    header('Location: /itc2022/PolkaPiwo/unknown/main.php');
}else{


}
?>
<div style = "position:relative; left:100px; bottom:150px"><img src="../src/img/sonst1.png" width="700" height="800">
    <div style = "position:relative; left:800px; bottom:600px">
        <h1><?php
            $aus = "SELECT * FROM artikel WHERE artikel_id = 3";
            foreach ($db->query($aus) as $row) {
                echo "".$row['name']."<br>";
            }
            ?></h1>
        <h2><?php
            $aus = "SELECT * FROM artikel WHERE artikel_id = 3";
            foreach ($db->query($aus) as $row) {
                echo "Preis: ".$row['preis']."??? ";
            }
            ?></h2>
    </div>
    <div style = "position:relative; left:800px; bottom:600px">
        <h3>Beschreibung:</h3>
        <?php
        $aus = "SELECT * FROM artikel WHERE artikel_id = 3";
        foreach ($db->query($aus) as $row) {
            echo "".$row['beschreibung']."<br>";
        }
        ?>
        <span class="subheading">Stabiler Holzener Griff</span> <br>
        <span class="subheading">??ffner aus Qualitativem Metal</span> <br>
    </div>
</div>
<div style = "position:relative; left:50px; bottom:400px;">
    <h1>REZENSIONEN</h1>
    <form action="" method="post">
        Rezension: <input type="text" name="rezension" id="userID"><br>
        Bewertung: <input type="number" id="quantity" name="quantity" min="1" max="5"><br>
        <input type="submit" name="schickRez"><br>

        <?php
        $aus = "SELECT * FROM rezension INNER JOIN kunden USING(kunden_id) WHERE artikel_id = 3";
        foreach ($db->query($aus) as $row) {
            echo "".$row['name'].": ".$row['rezension']." <br>Rating= ".$row['bewertung']." Sterne<br /> <br />" ;
        }
        ?>
        <?php

        $uid = $_SESSION['user'];
        if($uid==8){
            ?>
            <div style="visibility:visible">
                <input type="submit" name="Delete" ><br>
            </div>
            <?php
        }
        ?>
    </form>
</div>


<?php
include('../footer.in.php')
?>
</body>
</html>