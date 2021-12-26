<?php
/* Smarty version 3.1.36, created on 2020-11-19 15:32:14
  from 'C:\xampp\htdocs\SSS\App\View\Views\dokuman-ekle.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5fb665ce7568e3_35685658',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be3f01cd8662123e2883026d00b7d0bb691441e7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\SSS\\App\\View\\Views\\dokuman-ekle.tpl',
      1 => 1605789127,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5fb665ce7568e3_35685658 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div id="page-wrapper" style="right: 0px;bottom: 0px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 well" id="content">
                <h1>Döküman Ekle</h1>
                <form action="?rt=Dokuman/dokuman-ekle" method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <label for="dokuman-basligi">Döküman Başlığı</label></div>
                            <div>
                                <input class="form-control" type="text" id="dokuman-basligi" name="dokuman_basligi">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <labeL for="kategori-adi">Döküman Kategorisi</labeL>
                            </div>
                            <div>
                                <select class="kategori-ekle form-control" name="kategori_adi">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kategori']->value, 'v', false, 'k');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['kategori_adi'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['kategori_adi'];?>
</option>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <label for="dokuman_etiketi">Döküman Etiketi</label>
                            </div>
                            <div>
                                <input type="text" class="form-control" name="dokuman_etiketi" id="dokuman_etiketi"  value="" data-role="tagsinput"/>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <label for="dokuman-durum">Döküman Durumu</label>
                            </div>
                            <div>
                                <select class="dokuman-durum form-control" name="dokuman_durum">
                                    <option value="aktif">Aktif</option>
                                    <option value="pasif">Pasif</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top:50px;">
                        <div class="col-lg-12">
                            <label for="ckeditor1" style="font-size: 25px;">Döküman İçeriği</label>
                        </div>
                        <div class="col-lg-12">
                            <textarea class="ckeditor" name="ckeditor" id="ckeditor1"></textarea>
                        </div>
                    </div>

                <div class="row" style="float: right; margin-right: 50px; margin-top: 10px;">
                    <button type="submit" formmethod="post" class="btn btn-primary">Kaydet</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
