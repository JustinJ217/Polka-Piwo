<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POLKA PIWO</title>
    <link href="../style/style.css" rel="stylesheet" 　type="text/css">
    <link rel="icon" type="image/vnd.microsoft.icon" href="../src/favicon.ico">
</head>
<script>
    function pass(){
        const pw1 = document.getElementById("pw1").value;
        const pw2 = document.getElementById("pw2").value;
        const vname = document.getElementById("name1").value;
        const nname = document.getElementById("name2").value;

        if(vname ==""){
            document.getElementById("msgvn").innerHTML="Vornamen eingeben!";
            return false;
        }
        if(nname ==""){
            document.getElementById("msgnn").innerHTML="Nachnamen eingeben!";
            return false;
        }
        if(pw1 ==""){
            document.getElementById("msg1").innerHTML="Passwort eingeben!";
            return false;
        }
        if(pw2 ==""){
            document.getElementById("msg2").innerHTML="Passwort eingeben!";
            return false;
        }
        if(pw1.length<8){
            document.getElementById("msg1").innerHTML="Das Passwort muss mindestens 8 Zeichen haben!";
            return false;
        }
        if(pw1.length>15){
            document.getElementById("msg1").innerHTML="Das Passwort kann nur maximal 15 Zeichen lang sein.";
            return false;
        }
        if(pw1 != pw2){
            document.getElementById("msg2").innerHTML="Die Passwörter stimmen nicht überein!"
            return false;
        }else{
            return true;
        }
    }
</script>
<header class="masthead" style="background-image: url('../src/img/blond.jpeg')">
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
<form  onsubmit ="return pass()">
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
                <input maxlength="50" name="vorname" size="45" type="text" id="name1" placeholder="Max" />
                <span id = "msgvn" style="color:red"> </span>
            </td>
        </tr>
        <tr>
            <td>Nachname:</td>
            <td>
                <input name="nachname" size="45" type="text" id="name2" placeholder="Mustermann" />
                <span id = "msgnn" style="color:red"> </span>
            </td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>
                <input type="email" name="email" id="email"placeholder="max.mustermann@gmx.de" size="45" >
            </td>
        </tr>
        <tr>
            <td>Alter:</td>
            <td>
                <input name="alter" size="45" type="number" placeholder="18" />
            </td>
        </tr>
        <tr>
            <td>Passwort:</td>
            <td>
                <input name="pass" size="45" type="password" id="pw1" placeholder="*********" />
                <span id = "msg1" style="color:red"> </span>
            </td>
        </tr>
        <tr>
            <td>Passwort wiederholen:</td>
            <td>
                <input name="pass2" size="45" type="password" id="pw2" placeholder="*********" />
                <span id = "msg2" style="color:red"> </span>
            </td>
        </tr>
        <td><h2> Wohnort</h2></td>
        <tr>
            <td>Land:</td>
            <td>
                <input name="land" size="45" type="text" id="land" placeholder="Germanien" />

            </td>
        </tr>
        <tr>
            <td>Postleitzahl:</td>
            <td>
                <input name="plz" size="45" type="number" id="plz" placeholder="44653" />
            </td>
        </tr>
        <tr>
            <td>Ort:</td>
            <td>
                <input name="ort" size="45" type="text" id="ort" placeholder="Herne" />
            </td>
        </tr>
        <tr>
            <td>Straße:</td>
            <td>
                <input name="straße" size="45" type="text" id="straße" placeholder="Promilleweg" />
            </td>
        </tr>
        <tr>
            <td>Hausnummer:</td>
            <td>
                <input name="hausnummer" size="45" type="text" id="hausnummer" placeholder="69" />
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