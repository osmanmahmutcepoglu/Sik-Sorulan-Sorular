<?php
if (_auth()) {
    if (isset($_POST['dokuman_basligi'])||isset($_POST['kategori_adi'])||isset($_POST['dokuman_etiketi'])||isset($_POST['ckeditor'])) {
        $dokuman = ORM::for_table('dokuman')->create();
        $dokuman->dokuman_basligi = $_POST['dokuman_basligi'];
        $dokuman->kategori_adi = $_POST['kategori_adi'];
        $dokuman->dokuman_etiketi = $_POST['dokuman_etiketi'];
        $dokuman->dokuman_durum = $_POST['dokuman_durum'];
        $dokuman->ckeditor = $_POST['ckeditor'];
        $dokuman->save();
        header('Location:?rt=Dokuman');
    } else {
        echo 'Ekleme İşlemi Gerçekleştirilemedi';
    }
}