<?php
session_start();
session_destroy();
echo "Logout erfolgreich";
header('Location: /itc2022/PolkaPiwo/unknown/main.php');
?>