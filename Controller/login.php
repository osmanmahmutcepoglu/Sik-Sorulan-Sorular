<?php
if (isset($_SESSION['verify_id']) && isset($_SESSION['verify_id'])) {
    header('Location:index.php');
} else {
    $smarty->display('login.tpl');
}
