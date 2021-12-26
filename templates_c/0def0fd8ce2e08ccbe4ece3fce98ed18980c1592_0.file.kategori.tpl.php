<?php
/* Smarty version 3.1.36, created on 2020-11-18 17:07:26
  from 'C:\xampp\htdocs\SSS\App\View\Views\kategori.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5fb52a9e1875e5_33380435',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0def0fd8ce2e08ccbe4ece3fce98ed18980c1592' => 
    array (
      0 => 'C:\\xampp\\htdocs\\SSS\\App\\View\\Views\\kategori.tpl',
      1 => 1605708443,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5fb52a9e1875e5_33380435 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div id="page-wrapper" style="right: 0px;bottom: 0px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 well" id="content">
                <h1>Kategori</h1>
                <div class="row">
                    <form action="?rt=Kategori/kategori-ekle" method="POST">
                    <div class="col-lg-2">
                        <label for="kategori-adi">Kategori Adı</label>
                    </div>
                    <div class="col-lg-3">
                        <input class="form-control" type="text" id="kategori-adi" name="kategori_adi">
                    </div>
                    <div class="col-lg-1">
                        <button type="submit" formmethod="post" class="btn btn-primary">Kaydet</button>
                    </div>
                    </form>
                </div>
                <hr/>
                <div class="row">
                    <form action="?rt=Kategori/kategori-sil" method="POST">
                        <div class="col-lg-2">
                            <label for="kategoriler">Kategoriler</label>
                        </div>
                        <div class="col-lg-3">
                            <select class="kategoriler" id="secilen_kategori" name="kategoriler">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kategori']->value, 'v', false, 'k');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['kategori_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['kategori_adi'];?>
</option>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                        </div>
                        <div class="col-lg-1">
                            <button type="submit" id="kategori_sil_btn" formmethod="post" class="btn btn-primary">Sil</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
