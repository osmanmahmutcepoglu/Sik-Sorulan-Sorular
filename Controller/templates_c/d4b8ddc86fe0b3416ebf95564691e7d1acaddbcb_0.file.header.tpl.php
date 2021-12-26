<?php
/* Smarty version 3.1.36, created on 2020-11-03 18:29:22
  from 'C:\xampp\htdocs\SSS\App\View\Views\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5fa177529168d1_76785516',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4b8ddc86fe0b3416ebf95564691e7d1acaddbcb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\SSS\\App\\View\\Views\\header.tpl',
      1 => 1604414762,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fa177529168d1_76785516 (Smarty_Internal_Template $_smarty_tpl) {
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
                    <img alt="Brand" src="">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="#">Anasayfa<span class="sr-only">(current)</span></a>
                    </li>
                    <li>
                        <a href="#">Sayfa 2<span class="sr-only"></span></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Açılır Menü <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Aranacak Metin....">
                    </div>
                    <button type="submit" class="btn btn-default">Ara</button>
                </form>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div class="row">
        <div class="col-lg-2 hidden-md hidden-sm ">
            <nav id="sidebar">
                <div class="sidebar-header">
                    <select name="slug" class="form-control" id="docsSelect">
                        <option selected="">--Başlık Seçin--</option>
                        <option value="baslik1">Başlık 1</option>

                        <option value="baslik2">Başlık 2</option>

                        <option value="baslik3">Başlık 3</option>

                    </select>
                    <div class="form-group has-search">
                        <span class="ti-search form-control-feedback"></span>
                        <form action="" method="get" name="myform"
                              enctype="multipart/form-data" accept-charset="utf-8">
                            <input type="text" class="form-control" placeholder="Aranacak Metin...." name="q">
                        </form>
                    </div>
                    <!-- /.Actual search box -->
                </div>


                <ul class="metismenu sidebarMenu list-unstyled">
                    <li class="">
                        <a class="has-arrow" href="#" aria-expanded="false">Kategori</a>
                        <ul aria-expanded="true" class="collapse in" style="">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kategori']->value, 'v', false, 'k');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
                                <li class="">
                                    <a href="#"><?php echo $_smarty_tpl->tpl_vars['v']->value['kategori_adi'];?>
</a>
                                    <ul class="metismenu sidebarMenu list-unstyled">
                                        <li class="">
                                            <a class="" href="#" aria-expanded="false">OSMAN 1</a>

                                        </li>
                                    </ul>
                                </li>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </ul>
                        <a href="" aria-expanded="false"></a>
                    </li>
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
                </ul>
            </nav>
        </div>
        <div class="col-lg-10 col-md-12 col-sm-12" style="margin-top: 55px; padding-left: 0px !important;">
<?php }
}
