<?php
session_start();

if (!$_SESSION['user_id']) {
    header('Location: index.php');
}

require './header.php';
?>


<?php
require './footer.php';
?>