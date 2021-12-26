<?php
if (_auth()) {
    $opt["ondblClickRow"] = "function(id) {window.open('?rt=Dokuman/dokuman-duzenle&id='+id+'','_self','width=screen.availWidth,height=screen.availHeight')}";

    $g->set_options($opt);
    $default_filter = "";
    $g->select_command = "SELECT * from dokuman ";
    $g->table = "dokuman";

    $col = array();
    $col["title"] = "Döküman ID";
    $col["name"] = "id";
    $col["hidden"] = false;
    $col["export"] = true;
    $col["width"] = '70';
    $col["search"] = true;
    $cols[] = $col;


    $col = array();
    $col["title"] = "Döküman Başlığı";
    $col["name"] = "dokuman_basligi";
    $col["width"] = '120';
    $col["editable"] = true;
    $col["edittype"] = "text";
    $cols[] = $col;

    $col = array();
    $col["title"] = "Kategori Adı";
    $col["name"] = "kategori_adi";
    $col["width"] = '120';
    $cols[] = $col;

    $col = array();
    $col["title"] = "Döküman Etiketi";
    $col["name"] = "dokuman_etiketi";
    $col["width"] = '120';
    $cols[] = $col;

    $col = array();
    $col["title"] = "Döküman Tarihi";
    $col["name"] = "dokuman_tarihi";
    $col["width"] = '120';
    $cols[] = $col;

    $col = array();
    $col["title"] = "Döküman Durumu";
    $col["name"] = "dokuman_durum";
    $col["width"] = '120';
    $cols[] = $col;

    $g->set_columns($cols);
    $out = $g->render("list1");
    $smarty->assign('out', $out);
    $smarty->display('dokuman-listele.tpl');
}