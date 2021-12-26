<?php
try {
    $kategori = ORM::for_table('kategori')->find_many();
} catch (Exception $e) {
    echo 'Bir Sorun İle Karşılaşıldı.';
    echo $e;
}
$smarty->assign('kategori', $kategori);
$smarty->assign('controller', $route[0]);

$method = $route[1];
switch ($method) {



    case 'dokuman-goruntule':
        require_once 'user-dokuman-goruntule.php';
        break;

        case 'search':
        require_once 'search.php';
        break;



    default:
        require_once 'Index.php';
        break;
}