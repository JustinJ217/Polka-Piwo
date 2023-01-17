<?php
/*session_start();
error_reporting(-1);
ini_set('display_errors','On');

$db = new mysqli('localhost','root','','polkapiwo','3307');

//Prüft die DB verbindung
if($db->connect_error):
    echo $db->connect_error;
endif;

$userId = $_SESSION['user'];
$artikel_id = $_SESSION['artikel'];
$korbZahl = 0;


$sql = "SELECT artikel_id, name, preis FROM artikel";
$result = getDB()->query($sql);

$sql ="SELECT COUNT(artikel_id) FROM warenkorb WHERE kunden_id =" .$userId;
$korbResult = getDb()->query($sql);

$korbZahl = $korbResult->fetchColumn();
$url = $_SERVER['REQUEST_URI'];
$indexPosition = strpos($url, 'config.php');
$route = substr($url,$indexPosition);
$route = str_replace('config.php', '',$route);

if(strpos($route,'/warenkorb/add/') !== false) {
    $routeTeile = explode("/",$route);
    $productId = (int)$routeTeile[3];
    $sql = "INSERT INTO warenkorb SET anzahl=1, kunden_id = :$userId, artikel_id = :$artikel_id";

    $statement = getDB()->prepare($sql);
    $statement->execute([
        ':userId'=>$userId,
        ':productId'=> $productId
    ]);
    header("Location: /shop/index.php");
    exit();
}
$sql = "INSERT INTO artikel_to_warenkorb SET anzahl=1, kunden_id = :$userId, artikel_id = :$artikel_id";
require __DIR__.'/templates/main.php';*/

$PAGE_ROOT = 'http://localhost/itc2022/PolkaPiwo/';


?>

