<?php
/* Smarty version 3.1.39, created on 2021-12-25 08:02:52
  from 'C:\xampp\htdocs\sourcenew\templates\common\container.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61c682d4049fb0_09958277',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '53c24e2429b94ece4ba3543505fa01545c1e2481' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sourcenew\\templates\\common\\container.tpl.html',
      1 => 1640222969,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/header.tpl.html' => 1,
    'file:common/body.tpl.html' => 1,
    'file:common/addon.tpl.html' => 1,
  ),
),false)) {
function content_61c682d4049fb0_09958277 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '99903485861c682d4005c21_36291228';
$_smarty_tpl->_subTemplateRender("file:common/header.tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<body id="page-top">

    <?php if ((isset($_SESSION['id_user'])) && (isset($_SESSION['id_info']))) {?>
        <?php $_smarty_tpl->_subTemplateRender("file:common/body.tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php $_smarty_tpl->_subTemplateRender("file:common/addon.tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php } else { ?>
        <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['page']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    <?php }?>

    <!-- Custom scripts for all pages-->
    <?php echo '<script'; ?>
 src="js/sb-admin-2.js"><?php echo '</script'; ?>
>

    <!-- Page level custom scripts -->
    <?php echo '<script'; ?>
 src="js/demo/datatables-demo.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
