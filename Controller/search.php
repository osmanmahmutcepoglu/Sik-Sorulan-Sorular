<?php
try {
    $aranan_deger = $_POST['aranan_deger'];

    $arama_sonuc = ORM::for_table('dokuman')->where_raw('dokuman_basligi like ? OR dokuman_etiketi like ? OR ckeditor like ?', array("%".$aranan_deger."%","%".$aranan_deger."%","%".$aranan_deger."%"))->find_many();

    $smarty->assign('aranan_deger', $aranan_deger);
    $smarty->assign('arama_sonuc', $arama_sonuc);

    $smarty->display('search_result.tpl');

} catch (Exception $e) {
    echo $e;
}
