<?php
/* Smarty version 3.1.36, created on 2020-11-05 12:36:48
  from 'C:\xampp\htdocs\SSS\App\View\Views\search_result.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5fa3c7b0b41ed8_47856953',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c75b1ebeede97cb2de66678619e1116372d0ee80' => 
    array (
      0 => 'C:\\xampp\\htdocs\\SSS\\App\\View\\Views\\search_result.tpl',
      1 => 1604569004,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5fa3c7b0b41ed8_47856953 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
    <div class="row">
        <ul style="list-style: none;">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['arama_sonuc']->value, 's', false, 'sonuc');
$_smarty_tpl->tpl_vars['s']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['sonuc']->value => $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->do_else = false;
?>
                <a href="?rt=User/dokuman-goruntule&dokuman_id=<?php echo $_smarty_tpl->tpl_vars['s']->value['id'];?>
&secilen_kategori_adi=<?php echo $_smarty_tpl->tpl_vars['s']->value['kategori_adi'];?>
&aranan_deger=<?php echo $_smarty_tpl->tpl_vars['aranan_deger']->value;?>
">
                    <li>
                        <div class="col-lg-12 col-md-12 col-sm-12" style="border: 1px solid lightgrey; margin-bottom: 10px">
                            <h1><?php echo $_smarty_tpl->tpl_vars['s']->value['dokuman_basligi'];?>
</h1>
                            <h3><?php echo $_smarty_tpl->tpl_vars['s']->value['kategori_adi'];?>
</h3>
                            <i><?php echo $_smarty_tpl->tpl_vars['s']->value['dokuman_etiketi'];?>
</i>
                            <strong><?php echo $_smarty_tpl->tpl_vars['s']->value['dokuman_tarihi'];?>
</strong>
                        </div>
                    </li>
                </a>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
