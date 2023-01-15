<?php
include_once __DIR__ . '/config.php';
?>
<?php
if(!isset($_COOKIE['age_verified'])) {
    ?>

    <script>
        var age = prompt("Bitte geben Sie Ihr Alter ein:");
        if(age < 18) {
            alert("Sie sind leider zu jung, um diese Website zu besuchen.");
            window.location.href = "https://www.youtube.com/watch?v=xvFZjo5PgG0;
        } else {
            var d = new Date();
            d.setTime(d.getTime() + (365*24*60*60*1000));
            var expires = "expires="+ d.toUTCString();
            document.cookie = "age_verified=true;" + expires + ";path=/";
        }
    </script>

    <?php
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POLKA PIWO</title>
    <link href="../style/style.css" rel="stylesheet" 　type="text/css">
    <link rel="icon" type="image/vnd.microsoft.icon" href="../src/favicon.ico">
</head>

<?php
    session_start();
?>

<?php
include('header.in.php')
?>

<?php
include('nav.in.php')
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