<?php
try {
    if (isset($_POST['kullanıcı_adi']) && isset($_POST['parola'])) {
        $kullanici_adi = $_POST['kullanıcı_adi'];
        $parola = $_POST['parola'];
        $verify = ORM::for_table('user')->where('kullanici_adi', $kullanici_adi)->find_one();
        $verify_parola = $verify['parola'];
        $verify_id =$verify['id'];

        if (crypt($parola, $verify_parola) == $verify_parola) {
            echo "Oturum Açma İşlemi Başarılı!";
            session_start();
            $_SESSION["verify_id"] = $verify_id;
            $_SESSION["kullanıcı_adi"] = $kullanici_adi;
            header('Location:index.php');
        }
        else {
            echo "Kullanıcı adı veya şifre yanlış!";
            header('Refresh: 2; url=?rt=login');
        }

    } else {
        echo 'Kullanıcı adı veya şifre yok!';
        header('Refresh: 2; url=?rt=login');
    }
} catch (Exception $e) {
    echo $e;
}