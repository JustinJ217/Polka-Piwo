<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt</title>
    <link rel="stylesheet" type="text/css" href="style/style.css" media="screen" />

</head>
<body>
<header class="masthead" style="background-image: url('src/img/blond.jpeg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Kontakt formular</h1>
                    <span class="subheading">Schicken Sie uns ihr anliegen.</span>
                </div>
            </div>
        </div>
    </div>
</header>
<?php
include('nav.in.php')
?>
<main>
    <form action="https://www.youtube.com/watch?v=xvFZjo5PgG0" method="post">
        <table border="0" cellspacing="0" cellpadding="2">
            <tbody>
            <tr>
                <td>Thema der Mail:</td>
                <td>
                    <select name="Thema">
                        <option value="Allgemein">Allgemein</option>
                        <option value="Geschmack">Geschmack</option>
                        <option value="Lieferung">Lieferung</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Bewerbung">Bewerbung</option>
                        <option value="Service">Service</option>
                        <option value="Sonstiges">Sonstiges</option>
                    </select>
                </td>
            </tr>
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
                    <input maxlength="50" name="Vorname" size="45" type="text" placeholder="Max" />
                </td>
            </tr>
            <tr>
                <td>Nachname:</td>
                <td>
                    <input name="Nachname" size="45" type="text" placeholder="Mustermann" />
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>
                    <input type="email" name="Email" id="email"placeholder="max.mustermann@gmx.de" size="45"  required>
                </td>
            </tr>
            <tr>
                <td>Betreff:</td>
                <td>
                    <input name="Betreff" size="45" type="text" placeholder="Online Marketing" />
                </td>
            </tr>
            <tr>
                <td>Mitteilung:</td>
                <td><textarea cols="30" rows="5" name="Mitteilung" placeholder="Bitte schreiben Sie ihre Mittelung hier herein."></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Abschsicken" />
                    <input type="reset" value="Zurücksetzen" />
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</main>
<?php
include('footer.in.php')
?>
</body>
</html>