<?php
function check_pass($password,$empty): bool
{
    return true;

    $empty=array();
    $i=preg_match_all('/[0-9]/',$password,$empty);      // 4 Zahlen vorhanden ?
    if($i<4)return false;

    $i=preg_match_all('/[a-z]/',$password,$empty);      // 2 kleine Buchstaben vorhanden?
    if($i<2)return false;

    $i=preg_match_all('/[A-Z]/',$password,$empty);      // 2 Grosse Buchstaben vorhanden?
    if($i<2)return false;

    return true;
}
//DB verbindung erstellt
$db = new mysqli('localhost','root','','polkapiwo','3307');

//Prüft die DB verbindung
if($db->connect_error):
    echo $db->connect_error;
endif;


//Persönlich Angaben
$formErrors = [];
$name = '';
$vorname = '';
$email = "";
$alter = "";
$pass = "";
$pass2 = "";

//Wohnort
$land = "";
$plz = "";
$ort = "";
$straße = "";
$hausnummer = "";

if(isset($_POST["abschicken"])):

    //Persönliche Angaben
    $name = $_POST['name'];
    $vorname = $_POST['vorname'];
    $email = $_POST['email'];
    $alter = $_POST['alter'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];

    //Wohnort
    $land = $_POST['land'];
    $plz = $_POST['plz'];
    $ort= $_POST['ort'];
    $straße = $_POST['straße'];
    $hausnummer = $_POST['hausnummer'];

    $search_email = $db->prepare("SELECT kunden_id FROM kunden where email = ?");
    $search_email->bind_param('s',$email);
    $search_email->execute();
    $search_result = $search_email->get_result();

    if($search_result->num_rows != 0){
        $formErrors['email'] = "Die E-Mail Adresse ist im System schon hinterlegt. Bitte benutzen Sie eine andere!";
    }

    if(empty($vorname)){
        $formErrors['vorname'] = "Bitte einen Vornamen eingeben!";

    }
    if(empty($name)){
        $formErrors['name'] = "Bitte einen Namen eingeben!";

    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $formErrors['email'] = "Bitte eine Richtige E-mail eingeben!";
    }
    if($alter < 16) {
        $formErrors['alter'] = "Sie sind zu Jung!";
    }
    if(empty($alter)) {
        $formErrors['alter'] = "Bitte Ihr Alter eintragen!";
    }
    if(empty($pass)) {
        $formErrors['pass'] = "Bitte ein Passwort eintragen!";
    }
    if(empty($pass2)) {
        $formErrors['pass2'] = "Bitte ein Passwort eintragen!";
    }
   /* if(check_pass($pass,"")) {
        $formErrors['pass'] = "Das Passwort muss zwischen 8 und 15 Zeichen lang sein! <br>
                       Darin enthalten müssen mindestens 4 Zahlen, 2 kleine Buchstaben und 2 große Buchstaben  ";
    }*/
    if($pass != $pass2) {
        $formErrors['pass'] = "Die Passwörter stimmen nicht überein!";
        $formErrors['pass2'] = "Die Passwörter stimmen nicht überein!";
    }
    if(empty($land)) {
        $formErrors['land'] = "Bitte Ihr Land eintragen!";
    }
    if(empty($plz)) {
        $formErrors['plz'] = "Bitte Ihre Postleitzahl eintragen!";
    }
    if(empty($ort)) {
        $formErrors['ort'] = "Bitte Ihren Wohnort eintragen!";
    }
    if(empty($straße)) {
        $formErrors['straße'] = "Bitte Ihre Straße eintragen!";
    }
  /*  if(is_numeric($hausnummer) ) {
        $formErrors['hausnummer'] = "Die Hausnummer darf nur aus zahlen bestehen";
    }*/
    if(empty($hausnummer)) {
        $formErrors['hausnummer'] = "Bitte Ihre Hausnummer eintragen";
    }


    if(count($formErrors) === 0){
        //Damit das passwort nicht in der db sichtbar ist
        $pass =md5($pass);

        $insert = $db->prepare("INSERT INTO kunden (`name`, `vorname`, `alter`, `passwort`, `email`) values (?,?,?,?,?)");
        $insert->bind_param('ssiss',$name,$vorname,$alter,$pass,$email);
        $insert->execute();

        //Wie kriege ich den Priamry key vom kunden und packe ihn in den Fremdschlüssel platz kunden_id von der Tabelle wohnort
        //select max kunden_id from kunden
        // in var speichern und einsetzen

        $kunden_id= $db->insert_id;

        $insert2 = $db->prepare("INSERT INTO wohnort (`kunden_id`,`land`, `plz`, `ort`, `straße`, `hausnummer`) values (?,?,?,?,?,?)");
        $insert2->bind_param('issssi',$kunden_id,$land,$plz,$ort,$straße,$hausnummer);
        $insert2->execute();

    }

endif;
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

<header class="masthead" style="background-image: url('src/img/blond.jpeg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Registrierung</h1>
                    <span class="subheading">Geben Sie alle Daten ein.</span>
                </div>
            </div>
        </div>
    </div>
</header>

<?php
include('nav.in.php')
?>

<form action="" method="post" >
    <table border="0" cellspacing="0" cellpadding="2">
        <tbody>
        <h2>Persönliche Angaben</h2>
        <tr>
            <td>Anrede:</td>
            <td>
                <input checked="checked" name="Anrede" type="radio" value="Herr" /> Herr
                <input name="Anrede" type="radio" value="Frau" /> Frau
            </td>
        </tr>
        <tr>
            <td>Vorname:</td>
            <td>
                <input maxlength="50" name="vorname" size="45" type="text" id="name1" placeholder="Max" value="<?=$vorname?>"/>
                <?php
                    if(isset($formErrors['vorname'])){
                        echo '<span style="color:red">'. $formErrors['vorname'].'</span>';
                    }
                ?>

            </td>
        </tr>
        <tr>
            <td>Nachname:</td>
            <td>
                <input name="name" size="45" type="text" id="name2" placeholder="Mustermann" value="<?=$name?>"/>
                <?php
                    if(isset($formErrors['name'])){
                        echo '<span  style="color:red">'. $formErrors['name'].'</span>';
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>
                <input type="email" name="email" id="email"placeholder="max.mustermann@gmx.de" size="45" value="<?=$email?>"/>
                <?php
                    if(isset($formErrors['email'])){
                        echo '<span style="color:red">'. $formErrors['email'].'</span>';
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>Alter:</td>
            <td>
                <input name="alter" size="45" type="number" placeholder="18" value="<?=$alter?>"/>
                <?php
                    if(isset($formErrors['alter'])){
                        echo '<span style="color:red">'. $formErrors['alter'].'</span>';
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>Passwort:</td>
            <td>
                <input name="pass" size="45" type="password" id="pw1" placeholder="*********" />
                <?php
                if(isset($formErrors['pass'])){
                    echo '<span style="color:red">'. $formErrors['pass'].'</span>';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>Passwort wiederholen:</td>
            <td>
                <input name="pass2" size="45" type="password" id="pw2" placeholder="*********" />
                <?php
                if(isset($formErrors['pass2'])){
                    echo '<span style="color:red">'. $formErrors['pass2'].'</span>';
                }
                ?>
            </td>
        </tr>
        <td><h2> Wohnort</h2></td>
        <tr>
            <td>Land:</td>
            <td>
                <input name="land" size="45" type="text" id="land" placeholder="Germanien" value="<?=$land?>"//>
                <?php
                if(isset($formErrors['land'])){
                    echo '<span style="color:red">'. $formErrors['land'].'</span>';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>Postleitzahl:</td>
            <td>
                <input name="plz" size="45" type="number" id="plz" placeholder="44653" value="<?=$plz?>"//>
                <?php
                if(isset($formErrors['plz'])){
                    echo '<span style="color:red">'. $formErrors['plz'].'</span>';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>Ort:</td>
            <td>
                <input name="ort" size="45" type="text" id="ort" placeholder="Herne" value="<?=$ort?>"//>
                <?php
                if(isset($formErrors['ort'])){
                    echo '<span style="color:red">'. $formErrors['ort'].'</span>';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>Straße:</td>
            <td>
                <input name="straße" size="45" type="text" id="straße" placeholder="Promilleweg" value="<?=$straße?>"//>
                <?php
                if(isset($formErrors['straße'])){
                    echo '<span style="color:red">'. $formErrors['straße'].'</span>';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>Hausnummer:</td>
            <td>
                <input name="hausnummer" size="45" type="text" id="hausnummer" placeholder="69" value="<?=$hausnummer?>"//>
                <?php
                if(isset($formErrors['hausnummer'])){
                    echo '<span style="color:red">'. $formErrors['hausnummer'].'</span>';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="abschicken" value="Abschicken" />
                <input type="reset" name="zurücksetzen" value="Zurücksetzen" />
            </td>
        </tr>
        </tbody>
    </table>
</form>



<?php
include('footer.in.php')
?>
</body>
</html>