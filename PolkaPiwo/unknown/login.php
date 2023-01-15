<?php
include_once __DIR__ . '/config.php';
?>
<?php
session_start();
//DB verbindung erstellt
$db = new mysqli('localhost','root','','polkapiwo','3306');

//Prüft die DB verbindung
if($db->connect_error):
    echo $db->connect_error;
endif;
$formErrors = [];
if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pass = md5($pass);

    $search_user = $db->prepare("Select kunden_id FROM kunden where email = ? and passwort = ?");
    $search_user->bind_param('ss',$email,$pass);
    $search_user->execute();
    $search_result = $search_user->get_result();

    $search_name = $db->prepare("Select vorname FROM kunden where email = ? and passwort = ?");
    $search_name->bind_param('ss',$email,$pass);
    $search_name->execute();
    $search_res = $search_name->get_result();


    if($search_result->num_rows == 1) {
        $search_objekt = $search_result->fetch_object();
        $_SESSION['user'] = $search_objekt->kunden_id;

        $search_objekt = $search_res->fetch_object();
        $_SESSION['name'] = $search_objekt->vorname;
        header('Location: /itc2022/PolkaPiwo/main.php');
    }else{
        $formErrors['log'] = "Ihre Email oder Passwort stimmen nicht überein!";

    }
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

<header class="masthead" style="background-image: url('../src/img/blond.jpeg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Login</h1>
                    <span class="subheading">Geben Sie, Ihre Daten ein. </span>
                </div>
            </div>
        </div>
    </div>
</header>
<?php
include('nav.in.php')
?>
<?php
/*if(isset($errorMessage)) {
    echo $errorMessage;
}
*/?>
<form action="" method="post">
    <table border="0" cellspacing="0" cellpadding="2">
        <tbody>
        <?php
            if(isset($formErrors['log'])){
                echo '<span  style="color:red">'. $formErrors['log'].'</span>';
            }
        ?>
        <tr>
            <td>Email:</td>
            <td>
                <input type="email" name="email" id="email"placeholder="max.mustermann@gmx.de" size="45" >
            </td>
        </tr>
        <tr>
            <td>Passwort:</td>
            <td>
                <input name="pass" size="45" type="password" placeholder="*********" />
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="login" value="Login" />
                <input type="reset" name="reset" value="Zurücksetzen" />
            </td>
        </tr>
        </tbody>
    </table>
</form>

<p>Falls Sie noch kein Konto haben, klicken Sie <a href="registertest.php">hier</a></p>
<?php
include('footer.in.php')
?>
//test
</body>
</html>