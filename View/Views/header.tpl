<!doctype html>
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


    <script src="View/Lib/js/jquery-ui.js"></script>
    <script src="View/Lib/js/jquery-3.5.1.min.js"></script>
    <script src="Vendor/php-grid/lib/js/jqgrid/js/i18n/grid.locale-tr.js" type="text/javascript"></script>
    <script src="Vendor/php-grid/lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>
    <script src="Vendor/php-grid/lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
    <script src="Vendor/bootstrap-3.3.7/dist/js/bootstrap.js"></script>
    <script src="Vendor/select-2/dist/js/select2.full.js"></script>
    <script src="Vendor/ckeditor/ckeditor.js"></script>
    <script src="Vendor/metismenu/dist/metisMenu.js"></script>
    <script src="Vendor/tags-input/src/bootstrap-tagsinput.js"></script>
    <script src="View/Lib/js/main.js"></script>
    <script src="Vendor/mark/dist/mark.js"></script>

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
                                            {foreach $kategori as $k}
                                                <li class="mm-active">
                                                    <a>{$k['kategori_adi']}</a>
                                                    <ul class="metismenu list-unstyled">
                                                        {foreach $dokuman as $d}
                                                            {if $k['kategori_adi'] == $d['kategori_adi']}
                                                                <li class="mm-show mm-active">
                                                                    <a href="?rt=User/dokuman-goruntule&dokuman_id={$d['id']}&secilen_kategori_adi={$k['kategori_adi']}">{$d['dokuman_basligi']}</a>
                                                                </li>
                                                            {/if}
                                                        {/foreach}
                                                    </ul>
                                                </li>
                                            {/foreach}
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
                    {if $oturum eq 'acik'}
                        <a href="?rt=oturum_kapat" class="btn btn-default">Oturumu Kapat</a>
                    {/if}
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
                            {foreach $kategori as $k}
                                <li>
                                    <a>{$k['kategori_adi']}</a>
                                    <ul class="metismenu list-unstyled">
                                        {foreach $dokuman as $d}
                                            {if $k['kategori_adi'] == $d['kategori_adi']}
                                                <li {if ($get_dokuman_id == $d['id'])}class="active mm-show mm-active"{/if}>
                                                    <a href="?rt=User/dokuman-goruntule&dokuman_id={$d['id']}&secilen_kategori_adi={$k['kategori_adi']}">{$d['dokuman_basligi']}</a>
                                                </li>
                                            {/if}
                                        {/foreach}
                                    </ul>
                                </li>
                            {/foreach}
                        </ul>
                        <a href="" aria-expanded="false"></a>
                    </li>
                    {if $oturum eq 'acik'}
                        <li class="">
                            <a class="has-arrow" href="#" aria-expanded="false">Admin</a>
                            <ul aria-expanded="true" class="collapse in" style="">
                                <li id="dokuman" {if ($controller eq 'Dokuman')}class="active"{/if}>
                                    <a href="?rt=Dokuman/dokuman-listele">Dökümanlar</a>
                                </li>
                                <li id="kategori" {if ($controller eq 'Kategori')}class="active"{/if}>
                                    <a href="?rt=Kategori">Kategoriler</a>
                                </li>
                            </ul>
                            <a href="" aria-expanded="false"></a>
                        </li>
                    {/if}
                </ul>
            </nav>
        </div>
        <div class="col-lg-10 col-md-12 col-sm-12 sabit"
             style="margin-top: 55px; padding-left: 0px !important;}">
