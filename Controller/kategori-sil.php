<?php
if (_auth()) {
    if (isset($_POST['kategoriler'])) {

        $kategori = ORM::for_table('kategori')
            ->where_equal('kategori_id', $_POST['kategoriler'])
            ->delete_many();
        header('Location:?rt=Kategori');
        echo 'İşlem Başarılı';
    } else {
        echo 'Ekleme İşlemi Gerçekleştirilemedi';
    }
}