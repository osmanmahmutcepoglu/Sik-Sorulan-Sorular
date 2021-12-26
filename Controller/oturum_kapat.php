<?php
session_destroy();
echo 'Oturum Kapatılıyor...';

header('Refresh:2; url=index.php');