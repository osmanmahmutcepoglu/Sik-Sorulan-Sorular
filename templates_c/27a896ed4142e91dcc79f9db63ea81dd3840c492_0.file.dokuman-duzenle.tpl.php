<?php
/* Smarty version 3.1.36, created on 2020-11-19 13:02:05
  from 'C:\xampp\htdocs\SSS\App\View\Views\dokuman-duzenle.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5fb6429dad2d40_26628054',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '27a896ed4142e91dcc79f9db63ea81dd3840c492' => 
    array (
      0 => 'C:\\xampp\\htdocs\\SSS\\App\\View\\Views\\dokuman-duzenle.tpl',
      1 => 1605780120,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5fb6429dad2d40_26628054 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div id="page-wrapper" style="right: 0px;bottom: 0px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 well" id="content">
                <h1>Döküman Düzenle</h1>
                <form action="?rt=Dokuman/dokuman-duzenle" method="POST">

                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <label for="dokuman-basligi">Döküman ID</label></div>
                            <div>
                                <input class="form-control" type="text" name="id"
                                       value="<?php echo $_smarty_tpl->tpl_vars['dokuman']->value['id'];?>
" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <labeL for="kategori-adi">Döküman Tarihi</labeL>
                            </div>
                            <div>
                                <input class="form-control" type="text" name="dokuman_tarihi"
                                       value="<?php echo $_smarty_tpl->tpl_vars['dokuman']->value['dokuman_tarihi'];?>
" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <label for="dokuman-basligi">Döküman Başlığı</label></div>
                            <div>
                                <input class="form-control" type="text" id="dokuman-basligi" name="dokuman_basligi"
                                       value="<?php echo $_smarty_tpl->tpl_vars['dokuman']->value['dokuman_basligi'];?>
">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <labeL for="kategori-adi">Döküman Kategorisi</labeL>
                            </div>
                            <div>
                                <select class="kategori-ekle form-control" id="kategori_adi" name="kategori_adi">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kategori']->value, 'v', false, 'k');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['kategori_adi'];?>
"
                                                <?php if (($_smarty_tpl->tpl_vars['dokuman']->value['kategori_adi'] == $_smarty_tpl->tpl_vars['v']->value['kategori_adi'])) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['kategori_adi'];?>
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
                                <input type="text" class="form-control" name="dokuman_etiketi" id="dokuman_etiketi"
                                       value="<?php echo $_smarty_tpl->tpl_vars['dokuman']->value['dokuman_etiketi'];?>
" data-role="tagsinput"/>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <label for="dokuman-durum">Döküman Durumu</label>
                            </div>
                            <div>
                                <select class="dokuman-durum form-control" name="dokuman_durum">
                                    <option value="aktif" <?php if (($_smarty_tpl->tpl_vars['dokuman']->value['dokuman_durum'] == 'aktif')) {?>selected<?php }?>>
                                        Aktif
                                    </option>
                                    <option value="pasif" <?php if (($_smarty_tpl->tpl_vars['dokuman']->value['dokuman_durum'] == 'pasif')) {?>selected<?php }?>>
                                        Pasif
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top:50px;">
                        <div class="col-lg-12">
                            <label for="ckeditor1" style="font-size: 25px;">Döküman İçeriği</label>
                        </div>
                        <div class="col-lg-12">
                            <textarea class="ckeditor" name="ckeditor" id="ckeditor1"><?php echo $_smarty_tpl->tpl_vars['dokuman']->value['ckeditor'];?>
</textarea>
                        </div>
                    </div>

                    <div class="row" style="float: right; margin-right: 50px; margin-top: 10px;">
                        <button type="submit" formmethod="post" class="btn btn-primary">Güncelle</button>
                        <a href="?rt=Dokuman/dokuman-sil&silinecek_id=<?php echo $_smarty_tpl->tpl_vars['dokuman']->value['id'];?>
" formmethod="get" class="btn btn-danger">Sil</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
