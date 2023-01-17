<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt</title>
    <link rel="stylesheet" type="text/css" href="style/style.css" media="screen" />
    <link rel="icon" type="image/vnd.microsoft.icon" href="src/favicon.ico">
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
<?php
 $to = '';
 $subject = '';
 $message = '';
 $name = '';
 $email = '';

if(isset($_POST['Senden'])) {



    $to = "PolkaPiwo@gmx.net"; // Empfänger
    $subject = $_POST['betreff']; // Betreff
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $headers = "From: " . $email;
    mail($to, $subject, $message, $headers);
    echo "Ihre Nachricht wurde erfolgreich versendet!";
}
?>

<main>
    <form action method="post">
        <table border="0" cellspacing="0" cellpadding="2">
            <tbody>
            <tr>
                <td>Name:</td>
                <td>
                    <input type="text" name="name" id="name"placeholder="Max Mustermann" size="45" value="<?=$name?>" required>
                    <?php
                    if(isset($formErrors['name'])){
                        echo '<span style="color:red">'. $formErrors['name'].'</span>';
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>
                    <input type="email" name="email" id="email"placeholder="max.mustermann@gmx.de" size="45"  value="<?=$email?>" required>
                    <?php
                    if(isset($formErrors['email'])){
                        echo '<span style="color:red">'. $formErrors['email'].'</span>';
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Betreff:</td>
                <td>
                    <input name="betreff" size="45" type="text" placeholder="Online Marketing" value="<?=$subject?>" >
                    <?php
                    if(isset($formErrors['betreff'])){
                        echo '<span style="color:red">'. $formErrors['betreff'].'</span>';
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Mitteilung:</td>
                <td><textarea cols="30" rows="5" name="message" value="<?=$message?>" placeholder="Bitte schreiben Sie ihre Mittelung hier herein."></textarea></td>
                <?php
                if(isset($formErrors['message'])){
                    echo '<span style="color:red">'. $formErrors['message'].'</span>';
                }
                ?>

            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="Senden" value="Senden" />
                    <input type="reset" name="Zurücksetzen" value="Zurücksetzen" />
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