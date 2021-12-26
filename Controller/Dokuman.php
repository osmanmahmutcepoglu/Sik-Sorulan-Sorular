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

        case 'dokuman-ekle':
            if (isset($_POST['dokuman_basligi']) || isset($_POST['kategori_adi']) || isset($_POST['dokuman_etiketi']) || isset($_POST['ckeditor'])) {

                require_once 'dokuman-ekle.php';
            } else {
                $smarty->display('dokuman-ekle.tpl');
            }
            break;

        case 'dokuman-listele':
            require_once 'dokuman-listele.php';
            break;

        case 'dokuman-duzenle':
            require_once 'dokuman-duzenle.php';
            break;
        case 'dokuman-sil':
            require_once 'dokuman-sil.php';
            break;

        default:
            require_once 'dokuman-listele.php';
            break;
    }
}