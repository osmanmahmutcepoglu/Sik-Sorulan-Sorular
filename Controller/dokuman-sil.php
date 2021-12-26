<?php
if (_auth()) {
    try {
        if (isset($_GET['silinecek_id'])) {

            $dokuman = ORM::for_table('dokuman')
                ->where_equal('id', $_GET['silinecek_id'])
                ->delete_many();
            header('Location:?rt=Dokuman');
            echo 'İşlem Başarılı';
        } else {
            echo 'Ekleme İşlemi Gerçekleştirilemedi';
        }
    } catch (Exception $e) {
        echo $e;
    }
}