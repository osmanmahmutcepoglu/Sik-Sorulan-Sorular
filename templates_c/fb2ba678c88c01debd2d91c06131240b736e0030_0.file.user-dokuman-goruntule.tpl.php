<?php
/* Smarty version 3.1.36, created on 2020-11-05 12:37:42
  from 'C:\xampp\htdocs\SSS\App\View\Views\user-dokuman-goruntule.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5fa3c7e63b5b17_35742910',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fb2ba678c88c01debd2d91c06131240b736e0030' => 
    array (
      0 => 'C:\\xampp\\htdocs\\SSS\\App\\View\\Views\\user-dokuman-goruntule.tpl',
      1 => 1604569059,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5fa3c7e63b5b17_35742910 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="container">
    <div class="row" id="icerik">
        <div class="col-lg-12 col-md-12 col-sm-12 ">
            <h1><?php echo $_smarty_tpl->tpl_vars['d']->value['dokuman_basligi'];?>
</h1>
            <h3><?php echo $_smarty_tpl->tpl_vars['d']->value['kategori_adi'];?>
</h3>
            <i><?php echo $_smarty_tpl->tpl_vars['d']->value['dokuman_etiketi'];?>
</i>
            <strong><?php echo $_smarty_tpl->tpl_vars['d']->value['dokuman_tarihi'];?>
</strong>
            <p><?php echo $_smarty_tpl->tpl_vars['d']->value['ckeditor'];?>
</p>
        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
>
$(document).ready(function (){
    var myParam = location.search.split('aranan_deger=')[1]
    var  context = document.querySelector("#icerik");
    var  instance = new Mark(context);
    instance.mark(myParam);
});
<?php echo '</script'; ?>
><?php }
}
