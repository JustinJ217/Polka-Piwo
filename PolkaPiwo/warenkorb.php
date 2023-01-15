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
    echo '<span  style="color:Black">'. $_SESSION['name'].' dein Warenkorb beseteht aus AnzahlDerArtikel.</span>';
?>

<button onclick="window.location.href = 'https://www.paypal.me/JustinJanikPaintball';">Kaufen</button>

<?php
include('footer.in.php')
?>
</body>
</html>