<?php
if (_auth()) {

    if (isset($_POST['kategori_adi'])) {
        $kategori = ORM::for_table('kategori')->create();
        $kategori->kategori_adi = $_POST['kategori_adi'];
        $kategori->save();
        header('Location:?rt=Kategori');
    } else {
        echo 'Ekleme İşlemi Gerçekleştirilemedi';
    }
}