<?php
try {
    if (isset($_GET['dokuman_id'])) {
        $d = ORM::for_table('dokuman')->find_one($_GET['dokuman_id']);

        $smarty->assign('get_dokuman_id', $_GET['dokuman_id']);
        $smarty->assign('get_kategori_adi', $_GET['secilen_kategori_adi']);


        $smarty->assign('d', $d);

        $smarty->display('user-dokuman-goruntule.tpl');

    }
}
catch (Exception $e){
    echo $e;
}