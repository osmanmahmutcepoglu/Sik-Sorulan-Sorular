<?php
/* Smarty version 3.1.36, created on 2020-11-19 10:36:23
  from 'C:\xampp\htdocs\SSS\App\View\Views\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5fb620773b0ae6_06196449',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ceff41ba55b1cd34a98c97e42b7d2b9a0adb2bc0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\SSS\\App\\View\\Views\\login.tpl',
      1 => 1605771377,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fb620773b0ae6_06196449 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Oturum Aç</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <style>
        .login-form {
            width: 340px;
            margin: 50px auto;
            font-size: 15px;
        }

        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .login-form h2 {
            margin: 0 0 15px;
        }

        .form-control, .btn {
            min-height: 38px;
            border-radius: 2px;
        }

        .btn {
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="login-form">
    <form action="?rt=login-post" method="post">
        <h2 class="text-center">Oturum Aç</h2>
        <div class="form-group">
            <input type="text" class="form-control" name="kullanıcı_adi" placeholder="Kullanıcı Adı" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="parola" class="form-control" placeholder="Parola" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Oturum Aç</button>
        </div>
    </form>
</div>
</body>
</html><?php }
}
