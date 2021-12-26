<?php
if (_auth()) {
    if (isset($_POST['id'])) {
        try {
            $dokuman_id = $_POST['id'];
            $dokuman = ORM::for_table('dokuman')->where('id', $dokuman_id)->find_one();
            $dokuman->dokuman_basligi = $_POST['dokuman_basligi'];
            $dokuman->kategori_adi = $_POST['kategori_adi'];
            $dokuman->dokuman_etiketi = $_POST['dokuman_etiketi'];
            $dokuman->dokuman_tarihi = $_POST['dokuman_tarihi'];
            $dokuman->dokuman_durum = $_POST['dokuman_durum'];
            $dokuman->ckeditor = $_POST['ckeditor'];
            $dokuman->save();
            header('Location: ?rt=Dokuman/dokuman-listele');
        } catch (Exception $e) {
            echo $e;
        }

    }

    if (isset($_GET['id'])) {
        $dokuman = ORM::for_table('dokuman')->where('id', $_GET['id'])->find_one();

        $smarty->assign('dokuman', $dokuman);

        $smarty->display('dokuman-duzenle.tpl');
    }

}