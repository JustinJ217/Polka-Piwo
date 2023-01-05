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
                    <h1>Login</h1>
                    <span class="subheading">Geben Sie Ihre Daten ein. </span>
                </div>
            </div>
        </div>
    </div>
</header>
<?php
include('nav.in.php')
?>
<form action="https://www.youtube.com/watch?v=xvFZjo5PgG0" method="post">
    <table border="0" cellspacing="0" cellpadding="2">
        <tbody>
        <tr>
            <td>Email:</td>
            <td>
                <input type="email" name="Email" id="email"placeholder="max.mustermann@gmx.de" size="45"  required>
            </td>
        </tr>
        <tr>
            <td>Passwort:</td>
            <td>
                <input name="Betreff" size="45" type="password" placeholder="*********" />
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Login" />
                <input type="reset" value="Zurücksetzen" />
            </td>
        </tr>
        </tbody>
    </table>
</form>
<p>Falls Sie noch kein Konto haben, klicken Sie <a href="registertest.php.php">hier</a></p>
<?php
include('footer.in.php')
?>
//test
</body>
</html>