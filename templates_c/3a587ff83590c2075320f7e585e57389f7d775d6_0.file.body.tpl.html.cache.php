<?php
/* Smarty version 3.1.39, created on 2021-12-25 08:02:52
  from 'C:\xampp\htdocs\sourcenew\templates\common\body.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61c682d411b7a4_92354132',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a587ff83590c2075320f7e585e57389f7d775d6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sourcenew\\templates\\common\\body.tpl.html',
      1 => 1640190965,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/sidebar.tpl.html' => 1,
    'file:common/topbar.tpl.html' => 1,
    'file:common/table.tpl.html' => 1,
    'file:common/footer.tpl.html' => 1,
  ),
),false)) {
function content_61c682d411b7a4_92354132 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '169677647261c682d4114c99_51042199';
?>
<!-- Page Wrapper -->
<div id="wrapper">

    <?php $_smarty_tpl->_subTemplateRender("file:common/sidebar.tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <?php $_smarty_tpl->_subTemplateRender("file:common/topbar.tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <?php if ($_smarty_tpl->tpl_vars['page']->value != '') {?>
                    <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['page']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                <?php } else { ?>
                    <?php $_smarty_tpl->_subTemplateRender("file:common/table.tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <?php }?>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        <?php $_smarty_tpl->_subTemplateRender("file:common/footer.tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper --><?php }
}
