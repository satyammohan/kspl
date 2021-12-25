<?php
/* Smarty version 3.1.39, created on 2021-12-25 06:33:21
  from 'C:\xampp\htdocs\sourcenew\templates\preport\item1.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61c66dd9df3754_78439467',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b4a5f4d4ce2fc6dba0c0266dbe473d0f55991c1e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sourcenew\\templates\\preport\\item1.tpl.html',
      1 => 1640360067,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61c66dd9df3754_78439467 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '155687055161c66dd9a96165_36890365';
?>
<table border="1" id="report">
    <thead>
    <tr>
       	<th>Sl.</th><th>Product Name</th><th>Invno</th><th>Date</th><th align="right">Qty</th><th align="right">Free</th><th align="right">Rate</th><th align="right">Total GST</th><th align="right">Cess</th><th align="right">Total</th>
    </tr>
    </thead>
    <?php $_smarty_tpl->_assignInScope('qty', 0);
$_smarty_tpl->_assignInScope('free', 0);
$_smarty_tpl->_assignInScope('amt', 0);
$_smarty_tpl->_assignInScope('cess', 0);
$_smarty_tpl->_assignInScope('gst', 0);?>
    <?php
$__section_x_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['data']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_x_0_total = $__section_x_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_x'] = new Smarty_Variable(array());
if ($__section_x_0_total !== 0) {
for ($__section_x_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] = 0; $__section_x_0_iteration <= $__section_x_0_total; $__section_x_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']++){
$_smarty_tpl->tpl_vars['__smarty_section_x']->value['index_next'] = $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] + 1;
?>
        <tr>
            <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index_next']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index_next'] : null);?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['invno'];?>
</td>
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['date'],"%d-%m-%Y");?>
</td>
            <td align="right"><?php echo sprintf("%.0f",$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['qty']);?>
</td>
            <td align="right"><?php if ($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['free'] > 0) {
echo sprintf("%.0f",$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['free']);
}?></td>
            <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['rate']);?>
</td>
            <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['tax_amount']);?>
</td>
            <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['cessamt']);?>
</td>
            <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['net_amount']);?>
</td>
        </tr>
        <?php $_smarty_tpl->_assignInScope('qty', $_smarty_tpl->tpl_vars['qty']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['qty']);?>
        <?php $_smarty_tpl->_assignInScope('free', $_smarty_tpl->tpl_vars['free']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['free']);?>
        <?php $_smarty_tpl->_assignInScope('amt', $_smarty_tpl->tpl_vars['amt']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['net_amount']);?>
        <?php $_smarty_tpl->_assignInScope('cess', $_smarty_tpl->tpl_vars['cess']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['cessamt']);?>
        <?php $_smarty_tpl->_assignInScope('gst', $_smarty_tpl->tpl_vars['gst']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['tax_amount']);?>
    <?php
}
}
?>
    <tr>
        <th colspan="4">Total</th>
       	<th align="right"><?php echo sprintf("%.0f",$_smarty_tpl->tpl_vars['qty']->value);?>
</th>
        <th align="right"><?php echo sprintf("%.0f",$_smarty_tpl->tpl_vars['free']->value);?>
</th>
        <th align="right">&nbsp;</th>
       	<th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['gst']->value);?>
</th>
       	<th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['cess']->value);?>
</th>
       	<th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['amt']->value);?>
</th>
    </tr>
</table><?php }
}
