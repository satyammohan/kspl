<?php
/* Smarty version 3.1.39, created on 2021-12-24 20:24:14
  from 'C:\xampp\htdocs\sourcenew\templates\product\listing.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61c5df163fc8c5_30461894',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '77e87ca8acafc8c258e7fbec107d2840d64ce1ae' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sourcenew\\templates\\product\\listing.tpl.html',
      1 => 1640311437,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61c5df163fc8c5_30461894 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '173398609761c5df16394db5_20386765';
?>
<h3>
    Product Master<hr>
</h3>
<table id="dataTable"  class="table table-striped table-bordered" width="100%">
    <thead>
        <tr><th>Sl</th><th>Company</th><th>Name</th><th>HSN Code</th><th>MRP</th><th>GST %</th><th>Cess %</th></th></tr>
    </thead>
    <tbody>
        <?php $_smarty_tpl->_assignInScope('sl', 1);?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'mod');
$_smarty_tpl->tpl_vars['mod']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['mod']->value) {
$_smarty_tpl->tpl_vars['mod']->do_else = false;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['sl']->value++;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['cname'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['hsncode'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['mrp'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['tname'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['cess'];?>
%</td>
        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table><?php }
}
