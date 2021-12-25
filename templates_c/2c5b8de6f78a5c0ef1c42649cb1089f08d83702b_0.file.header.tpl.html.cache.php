<?php
/* Smarty version 3.1.39, created on 2021-12-21 07:22:16
  from 'C:\xampp\htdocs\hotel\templates\common\header.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61c1335046be66_43862908',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c5b8de6f78a5c0ef1c42649cb1089f08d83702b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hotel\\templates\\common\\header.tpl.html',
      1 => 1630891650,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61c1335046be66_43862908 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '28099205861c133504667a7_37970122';
?>
<div class="header">
  <nav class="navbar fixed-top" style="padding: 0">
    <div class="container-fluid mt-2 mb-2">
      <div class="col-lg-12 text-white">
        <div class="float-left" >
          <b>Welcome Admin</b>
        </div>
        <div class="float-right">
            <a href="#" class="text-white">
              <span data-target=".bs-logout-modal-sm" data-toggle="modal"><i class="fa fa-power-off"></i></span>
            </a>  
        </div>
        <div class="text-center">
            <?php echo $_SESSION['cname'];?>
&nbsp;
            <?php echo smarty_modifier_date_format($_SESSION['sdate'],$_smarty_tpl->tpl_vars['smarty_date']->value);?>
-<?php echo smarty_modifier_date_format($_SESSION['edate'],$_smarty_tpl->tpl_vars['smarty_date']->value);?>

        </div>
      </div>
    </div>
  </nav>
</div>
<?php }
}
