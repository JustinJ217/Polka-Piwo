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
                    <h1>Shop</h1>
                    <span class="subheading">Der Shop der all Ihre Wünsche erfüllt.</span>
                </div>
            </div>
        </div>
    </div>
</header>
<?php
include('nav.in.php')
?>
<div>
    <a style = "position:relative; left:400px;" class="navbar-brand" href="produkte/bier.php"><img src="src/img/kasten.png" width="140" height="160">
    <h3>Bier Kasten</h3>
    <a style = "position:relative; left:800px; bottom:200px" class="navbar-brand" href="produkte/merch.php"><img src="src/img/Merch.png" width="140" height="160">
    <h3>Merchandise</h3>
    <a style = "position:relative; left:1200px; bottom:400px" class="navbar-brand" href="produkte/extras.php"><img src="src/img/sonst.png" width="140" height="160">
    <h3>Flaschenöffner</h3>
</div>

<?php
include('footer.in.php')
?>
<body>
</body>
</html>