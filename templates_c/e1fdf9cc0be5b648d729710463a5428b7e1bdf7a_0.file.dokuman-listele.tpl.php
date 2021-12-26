<?php
/* Smarty version 3.1.36, created on 2020-11-19 15:00:36
  from 'C:\xampp\htdocs\SSS\App\View\Views\dokuman-listele.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5fb65e6470b206_54712235',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e1fdf9cc0be5b648d729710463a5428b7e1bdf7a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\SSS\\App\\View\\Views\\dokuman-listele.tpl',
      1 => 1605787234,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5fb65e6470b206_54712235 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div id="page-wrapper" style="right: 0px;bottom: 0px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 well" id="content">
                <div class="row">
                    <div class="col-sm-9 col-md-9">
                        <h1 style="max-width: 300px">Dokuman Listele</h1>
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <a href="?rt=Dokuman/dokuman-ekle" class="btn btn-primary"
                           style="float: right; margin-top: 30px;">Döküman Ekle</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <?php echo $_smarty_tpl->tpl_vars['out']->value;?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
