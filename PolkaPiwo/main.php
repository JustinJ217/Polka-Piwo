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
session_start();
    if(isset($_SESSION['user'])){
        require_once('ui.php');
    }
?>

<?php
include('header.in.php')
?>

<?php
include('nav.in.php')
?>
//test
<?php
include('footer.in.php')
?>
</body>
</html>