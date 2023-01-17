<?php
include_once __DIR__ . '/config.php';
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warenkorb</title>
    <link href="style/style.css" rel="stylesheet" 　type="text/css">
    <link rel="icon" type="image/vnd.microsoft.icon" href="src/favicon.ico">
</head>
<header class="masthead" style="background-image: url('src/img/blond.jpeg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1 text-align="center">Warenkorb</h1>
                    <span text-align="center" class="subheading"></span>
                </div>
            </div>
        </div>
    </div>
</header>

<?php
include('nav.in.php')
?>

<?php
    echo '<span  style="color:Black">'. $_SESSION['name'].' dein Warenkorb beseteht aus:</span>';
?>

<?php
//DB verbindung erstellt
$db = new mysqli('localhost','root','','polkapiwo','3307');

//Prüft die DB verbindung
if($db->connect_error):
    echo $db->connect_error;
endif;

$bier = "";
$merch = "";
$extra = "";

if(isset($_POST["kaufen"])):


    $bier = $_POST['bier'];
    $merch = $_POST['merch'];
    $extra = $_POST['extra'];

    $warenkorb_id = 0;

    if(empty($bier)){
    }else{
        $insert = $db->prepare("INSERT INTO warenkorb (`anzahl`, `kunden_id`,artikel_id) values (?,?,1)");
        $insert->bind_param('ii',$bier,$_SESSION['user']);
        $insert->execute();
        $warenkorb_id= $db->insert_id;
    }


    if(empty($merch)){
    }else{
        if($warenkorb_id == 0 ){
            $insert2 = $db->prepare("INSERT INTO warenkorb (`anzahl`, `kunden_id`,artikel_id) values (?,?,2)");
            $insert2->bind_param('ii',$bier,$_SESSION['user']);
            $insert2->execute();
        }
        $insert2 = $db->prepare("INSERT INTO warenkorb (`warenkorb_id`,`anzahl`, `kunden_id`,artikel_id) values ($warenkorb_id,?,?,2)");
        $insert2->bind_param('ii',$merch,$_SESSION['user']);
        $insert2->execute();
        $warenkorb_id= $db->insert_id;
    }

    if(empty($extra)){
    }else{
        if($warenkorb_id == 0 ){
            $insert3 = $db->prepare("INSERT INTO warenkorb (`anzahl`, `kunden_id`,artikel_id) values (?,?,3)");
            $insert3->bind_param('ii',$bier,$_SESSION['user']);
            $insert3->execute();
        }
        $insert3 = $db->prepare("INSERT INTO warenkorb (`warenkorb_id`,`anzahl`, `kunden_id`,artikel_id) values ($warenkorb_id,?,?,3)");
        $insert3->bind_param('ii',$extra,$_SESSION['user']);
        $insert3->execute();
        $warenkorb_id= $db->insert_id;
    }


    $insert = $db->prepare("INSERT INTO bestellung (`warenkorb_id`) values (?)");
    $insert->bind_param('i',$warenkorb_id);
    $insert->execute();

endif;
?>
<form action="" method="post" >
    <table border="0" cellspacing="0" cellpadding="2">
        <tbody>
        <h2>Ihr Warenkorb</h2>
        <tr>
            <td>Bier Kasten:</td>
            <td>
                <div style = "position:relative; left:100px; bottom:150px"><img src="../PolkaPiwo/src/img/kasten.png" width="700" height="800">
                Anzahl: <input type="number" id="bier" name="bier" min="1" max="99" value="<?=$bier?>"><br>
            </td>
        </tr>
        <tr>
            <td>Merch:</td>
            <td>
                <div style = "position:relative; left:100px; bottom:150px"><img src="../PolkaPiwo/src/img/Merchbg.png" width="700" height="800">
                Anzahl: <input type="number" id="merch" name="merch" min="1" max="99" value="<?=$merch?>"><br>
            </td>
        </tr>
        <tr>
            <td>Flaschenöffner:</td>
            <td>
                <div style = "position:relative; left:100px; bottom:150px"><img src="../PolkaPiwo/src/img/sonst1.png" width="700" height="800">
                Anzahl: <input type="number" id="extra" name="extra" min="1" max="99" value="<?=$extra?>"><br>
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="kaufen" value="kaufen" />
        </tr>
        </tbody>
    </table>
</form>
<button onclick="window.location.href = 'https://www.paypal.me/JustinJanikPaintball';">Spenden</button>
<?php
include('footer.in.php')
?>
</body>
</html>