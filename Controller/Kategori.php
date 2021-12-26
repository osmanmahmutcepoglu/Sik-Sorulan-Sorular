<?php
if (_auth()) {
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

        case 'kategori-ekle':
            if (isset($_POST['kategori_adi']))
            {
                require_once 'kategori-ekle.php';
            } else {
                $smarty->display('kategori.tpl');
            }
            break;

        case 'kategori-sil':
            require_once 'kategori-sil.php';
            break;

        default:
            $smarty->display('kategori.tpl');
            break;
    }
}

