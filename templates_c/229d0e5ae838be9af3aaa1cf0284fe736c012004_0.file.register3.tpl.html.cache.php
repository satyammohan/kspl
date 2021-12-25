<?php
/* Smarty version 3.1.39, created on 2021-12-24 20:24:54
  from 'C:\xampp\htdocs\sourcenew\templates\preport\register3.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61c5df3e014fe6_99747414',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '229d0e5ae838be9af3aaa1cf0284fe736c012004' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sourcenew\\templates\\preport\\register3.tpl.html',
      1 => 1640312136,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61c5df3e014fe6_99747414 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '4617178661c5df3defcfe6_56942757';
?>
<table border="1" id="report">
    <tr>
        <th>Sl.</th><th>Month</th><th>Year</th><th>No of Bills</th><th align="right">Taxable Amount</th>
        <th align="right">IGST</th><th align="right">CGST</th><th align="right">SGST</th><th align="right">Total GST</th>
       	<th align="right">Cess</th><th align="right">TCS</th><th align="right">Other</th><th align="right">Total</th>
    </tr>
    <?php $_smarty_tpl->_assignInScope('igst', 0);?> <?php $_smarty_tpl->_assignInScope('cgst', 0);?> <?php $_smarty_tpl->_assignInScope('sgst', 0);?> <?php $_smarty_tpl->_assignInScope('tcess', 0);?> <?php $_smarty_tpl->_assignInScope('total', 0);?> <?php $_smarty_tpl->_assignInScope('taxable', 0);?> <?php $_smarty_tpl->_assignInScope('other', 0);?> <?php $_smarty_tpl->_assignInScope('gst', 0);?> <?php $_smarty_tpl->_assignInScope('tcs', 0);?>
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
            <td><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['month'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['year'];?>
</td>
            <td align="right"><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['billn'];?>
</td>
            <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['totalamt']);?>
</td>
            <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['igst']);?>
</td>
            <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['cgst']);?>
</td>
            <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['sgst']);?>
</td>
            <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['vat']);?>
</td>
            <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['totalcess']);?>
</td>
            <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['tcs']);?>
</td>
            <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['other']);?>
</td>
            <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['total']);?>
</td>
            <?php $_smarty_tpl->_assignInScope('taxable', $_smarty_tpl->tpl_vars['taxable']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['totalamt']);?>
            <?php $_smarty_tpl->_assignInScope('gst', $_smarty_tpl->tpl_vars['gst']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['vat']);?>
            <?php $_smarty_tpl->_assignInScope('igst', $_smarty_tpl->tpl_vars['igst']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['igst']);?>
            <?php $_smarty_tpl->_assignInScope('cgst', $_smarty_tpl->tpl_vars['cgst']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['cgst']);?>
            <?php $_smarty_tpl->_assignInScope('sgst', $_smarty_tpl->tpl_vars['sgst']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['sgst']);?>
            <?php $_smarty_tpl->_assignInScope('other', $_smarty_tpl->tpl_vars['other']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['other']);?>
            <?php $_smarty_tpl->_assignInScope('vattot', $_smarty_tpl->tpl_vars['vattot']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['vat']);?>
            <?php $_smarty_tpl->_assignInScope('tcess', $_smarty_tpl->tpl_vars['tcess']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['totalcess']);?>
            <?php $_smarty_tpl->_assignInScope('tcs', $_smarty_tpl->tpl_vars['tcs']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['tcs']);?>
            <?php $_smarty_tpl->_assignInScope('total', $_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['total']);?>
        </tr>
    <?php
}
}
?>
    <tr>
        <th colspan="4">Total</th>
        <th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['taxable']->value);?>
</th>
        <th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['igst']->value);?>
</th>
        <th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['cgst']->value);?>
</th>
        <th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['sgst']->value);?>
</th>
        <th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['gst']->value);?>
</th>
        <th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['tcess']->value);?>
</th>
        <th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['tcs']->value);?>
</th>
        <th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['other']->value);?>
</th>
        <th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total']->value);?>
</th>
    </tr>
</table>

<?php }
}
