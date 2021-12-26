<?php
/* Smarty version 3.1.36, created on 2020-11-19 14:29:18
  from 'C:\xampp\htdocs\SSS\App\View\Views\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5fb6570e3d5033_98801247',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '314d2fada24c1f73a5decae7ba963265ffc8843b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\SSS\\App\\View\\Views\\header.tpl',
      1 => 1605785357,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fb6570e3d5033_98801247 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" media="screen"
          href="Vendor/php-grid/lib/js/themes/start/jquery-ui.custom.css">
    <link rel="stylesheet" type="text/css" media="screen" href="Vendor/php-grid/lib/js/jqgrid/css/ui.jqgrid.css">
    <link rel="stylesheet" href="View/Lib/css/jquery-ui.css">
    <link rel="stylesheet" href="View/Lib/css/style.css">
    <link rel="stylesheet" href="Vendor/metismenu/dist/metisMenu.css">
    <link rel="stylesheet" href="Vendor/tags-input/src/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="Vendor/select-2/dist/css/select2.css">
    <link rel="stylesheet" href="Vendor/bootstrap-3.3.7/dist/css/bootstrap.css">
    <link rel="stylesheet" href="Vendor/bootstrap-3.3.7/dist/css/bootstrap-theme.css">


    <?php echo '<script'; ?>
 src="View/Lib/js/jquery-ui.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="View/Lib/js/jquery-3.5.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="Vendor/php-grid/lib/js/jqgrid/js/i18n/grid.locale-tr.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="Vendor/php-grid/lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="Vendor/php-grid/lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="Vendor/bootstrap-3.3.7/dist/js/bootstrap.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="Vendor/select-2/dist/js/select2.full.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="Vendor/ckeditor/ckeditor.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="Vendor/metismenu/dist/metisMenu.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="Vendor/tags-input/src/bootstrap-tagsinput.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="View/Lib/js/main.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="Vendor/mark/dist/mark.js"><?php echo '</script'; ?>
>

</head>

<body>
<div id="wrapper" style="overflow: hidden">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img alt="Brand" src="View/Image/rota-logo.png">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Anasayfa<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Kategori<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" style="overflow: auto; max-height: 250px !important;">

                            <li>
                                <ul class="metismenu list-unstyled">
                                    <li class=mm-active">
                                        <ul aria-expanded="true" class="collapse in" style="">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kategori']->value, 'k');
$_smarty_tpl->tpl_vars['k']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value) {
$_smarty_tpl->tpl_vars['k']->do_else = false;
?>
                                                <li class="mm-active">
                                                    <a><?php echo $_smarty_tpl->tpl_vars['k']->value['kategori_adi'];?>
</a>
                                                    <ul class="metismenu list-unstyled">
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dokuman']->value, 'd');
$_smarty_tpl->tpl_vars['d']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->do_else = false;
?>
                                                            <?php if ($_smarty_tpl->tpl_vars['k']->value['kategori_adi'] == $_smarty_tpl->tpl_vars['d']->value['kategori_adi']) {?>
                                                                <li class="mm-show mm-active">
                                                                    <a href="?rt=User/dokuman-goruntule&dokuman_id=<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
&secilen_kategori_adi=<?php echo $_smarty_tpl->tpl_vars['k']->value['kategori_adi'];?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['dokuman_basligi'];?>
</a>
                                                                </li>
                                                            <?php }?>
                                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                    </ul>
                                                </li>
                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
                <form method="POST" class="navbar-form navbar-right" action="?rt=User/search">
                    <div class="form-group">
                        <input type="text" class="form-control" name="aranan_deger" placeholder="Aranacak Metin....">
                    </div>
                    <button type="submit" class="btn btn-default">Ara</button>
                    <?php if ($_smarty_tpl->tpl_vars['oturum']->value == 'acik') {?>
                        <a href="?rt=oturum_kapat" class="btn btn-default">Oturumu Kapat</a>
                    <?php }?>
                </form>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 ">
            <nav id="sidebar">
                <ul class="metismenu sidebarMenu list-unstyled">
                    <li class="mm-active">
                        <a class="has-arrow" href="#" aria-expanded="false">Kategori</a>
                        <ul aria-expanded="true" class="collapse in mm-show" style="">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kategori']->value, 'k');
$_smarty_tpl->tpl_vars['k']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value) {
$_smarty_tpl->tpl_vars['k']->do_else = false;
?>
                                <li>
                                    <a><?php echo $_smarty_tpl->tpl_vars['k']->value['kategori_adi'];?>
</a>
                                    <ul class="metismenu list-unstyled">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dokuman']->value, 'd');
$_smarty_tpl->tpl_vars['d']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->do_else = false;
?>
                                            <?php if ($_smarty_tpl->tpl_vars['k']->value['kategori_adi'] == $_smarty_tpl->tpl_vars['d']->value['kategori_adi']) {?>
                                                <li <?php if (($_smarty_tpl->tpl_vars['get_dokuman_id']->value == $_smarty_tpl->tpl_vars['d']->value['id'])) {?>class="active mm-show mm-active"<?php }?>>
                                                    <a href="?rt=User/dokuman-goruntule&dokuman_id=<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
&secilen_kategori_adi=<?php echo $_smarty_tpl->tpl_vars['k']->value['kategori_adi'];?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['dokuman_basligi'];?>
</a>
                                                </li>
                                            <?php }?>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </ul>
                                </li>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </ul>
                        <a href="" aria-expanded="false"></a>
                    </li>
                    <?php if ($_smarty_tpl->tpl_vars['oturum']->value == 'acik') {?>
                        <li class="">
                            <a class="has-arrow" href="#" aria-expanded="false">Admin</a>
                            <ul aria-expanded="true" class="collapse in" style="">
                                <li id="dokuman" <?php if (($_smarty_tpl->tpl_vars['controller']->value == 'Dokuman')) {?>class="active"<?php }?>>
                                    <a href="?rt=Dokuman/dokuman-listele">Dökümanlar</a>
                                </li>
                                <li id="kategori" <?php if (($_smarty_tpl->tpl_vars['controller']->value == 'Kategori')) {?>class="active"<?php }?>>
                                    <a href="?rt=Kategori">Kategoriler</a>
                                </li>
                            </ul>
                            <a href="" aria-expanded="false"></a>
                        </li>
                    <?php }?>
                </ul>
            </nav>
        </div>
        <div class="col-lg-10 col-md-12 col-sm-12 sabit"
             style="margin-top: 55px; padding-left: 0px !important;}">
<?php }
}
