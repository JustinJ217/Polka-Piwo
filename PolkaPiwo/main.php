<?php
include_once __DIR__ . '/config.php';
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POLKA PIWO</title>
    <link href="style/style.css" rel="stylesheet" 　type="text/css">
    <link rel="icon" type="image/vnd.microsoft.icon" href="src/favicon.ico">
</head>
<?php
include('header.in.php')
?>

<?php
include('nav.in.php')
?>
<?php
session_start();
if(empty($_SESSION['user'])){
    header('Location: /itc2022/PolkaPiwo/unknown/main.php');
}else{


}
?>
<?php
    echo '<span  style="color:Black">Willkommen '. $_SESSION['name'].'. Ihre Id ist: '. $_SESSION['user'].'</span>';
?>
<p align="center" style="font-size:40px;">
    Polka Piwo ist ein traditionelles Weizenbier, das mit seinem kräftigen und reichhaltigen Geschmack überzeugt.<br>
    Das Bier wird in einer kleinen Brauerei in der Nähe von Warschau hergestellt und ausschließlich aus hochwertigen Zutaten gemischt.<br>
    Polka Piwo ist das perfekte Getränk für jeden Abend und jede Gelegenheit.
</p>
<?php
include('footer.in.php')
?>
</body>
</html>