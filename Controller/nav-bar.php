<?php

$kategori = ORM::for_table('kategori')->find_many();
$dokuman = ORM::for_table('dokuman')->find_many();

$smarty->assign('kategori', $kategori);
$smarty->assign('dokuman', $dokuman);