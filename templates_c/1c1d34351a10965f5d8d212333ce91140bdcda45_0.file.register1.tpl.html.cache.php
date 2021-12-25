<?php
/* Smarty version 3.1.39, created on 2021-12-25 07:51:50
  from 'C:\xampp\htdocs\sourcenew\templates\preport\register1.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61c6803eb167b2_46193346',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1c1d34351a10965f5d8d212333ce91140bdcda45' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sourcenew\\templates\\preport\\register1.tpl.html',
      1 => 1640394787,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61c6803eb167b2_46193346 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '196152268761c6803eab8cd1_90631875';
?>
<table border="1" id="report">
    <thead>
    <tr>
       	<th>Sl.</th>
       	<th>Invno</th>
       	<th>Date</th>
        <th>Party</th>
       	<th align="right">Goods Value</th>
	    <th align="right">IGST</th><th align="right">CGST</th>
        <th align="right">SGST</th>
       	<th align="right">Total GST</th>
       	<th align="right">Cess</th>
       	<th align="right">TCS</th>
       	<th align="right">Other</th>
        <th>Cash</th>
        <th>Credit</th>
       	<th align="right">Total</th>
    </tr>
    </thead>
    <?php $_prefixVariable1 = 0;
$_smarty_tpl->_assignInScope('x', $_prefixVariable1);
if ($_prefixVariable1) {?>
    <tr>
        <th>&nbsp;</th>
        <th>Product Name</th>
        <th align="right">Qty</th>
        <th align="right">Free</th>
        <th align="right">Rate</th>
        <th align="right">GST %</th>
        <th align="right">Goods Amount</th>
        <th align="right">GST Amount</th>
        <th align="right">CESS Amount</th>
        <th align="right">Net Total</th>
    </tr>
    <?php }?>
    <?php $_smarty_tpl->_assignInScope('vattot', 0);?> <?php $_smarty_tpl->_assignInScope('cess', 0);?> <?php $_smarty_tpl->_assignInScope('cash', 0);?>
    <?php $_smarty_tpl->_assignInScope('total', 0);?> <?php $_smarty_tpl->_assignInScope('credit', 0);?> <?php $_smarty_tpl->_assignInScope('tcs', 0);?>
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
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['invno'];?>
</td>
        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['date'],"%d-%m-%Y");?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['party_name'];?>
</td>
        <td align="right"><?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['totalamt']-$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['discount']));?>
</td>
        <?php if ($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['local'] && $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['local'] == 1) {?>
            <?php $_smarty_tpl->_assignInScope('igst', $_smarty_tpl->tpl_vars['igst']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['vat']);?>
            <td align="right"><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['vat'];?>
</td>
            <td align="right">0.00</td>
            <td align="right">0.00</td>
        <?php } else { ?>
            <?php $_smarty_tpl->_assignInScope('cgst', $_smarty_tpl->tpl_vars['cgst']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['vat']/2);?>
            <?php $_smarty_tpl->_assignInScope('sgst', $_smarty_tpl->tpl_vars['sgst']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['vat']/2);?>
            <td align="right">0.00</td>
            <td align="right"><?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['vat']/2));?>
</td>
            <td align="right"><?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['vat']/2));?>
</td>
        <?php }?>
        <td align="right"><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['vat'];?>
</td>
        <td align="right"><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['totalcess'];?>
</td>
        <td align="right"><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['tcsamt'];?>
</td>
        <td align="right"><?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['add']+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['less']+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['round']+$_smarty_tpl->tpl_vars['dta']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['packing']));?>
</td>
        <td align="right"><?php if ($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['cash'] == 2) {
echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['total'];
} else { ?>0.00<?php }?></td>
        <td align="right"><?php if ($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['cash'] == 1) {
echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['total'];
} else { ?>0.00<?php }?></td>
        <td align="right"><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['total'];?>
</td>
    </tr>
    <?php if ((isset($_REQUEST['itemdetails']))) {?>
    <?php $_smarty_tpl->_assignInScope('det', $_smarty_tpl->tpl_vars['detail']->value[$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['id_sale']]);?>
    <tr>
        <td colspan="100">
            <table width="100%">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['det']->value, 'di', false, 'k');
$_smarty_tpl->tpl_vars['di']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['di']->value) {
$_smarty_tpl->tpl_vars['di']->do_else = false;
?>
                <tr>
                    <td width="50px">&nbsp;</td>
                    <td width="300px"><?php echo $_smarty_tpl->tpl_vars['di']->value['name'];?>
</td>
                    <td align="right"><?php echo $_smarty_tpl->tpl_vars['di']->value['qty'];?>
</td>
                    <td align="right"><?php echo $_smarty_tpl->tpl_vars['di']->value['free'];?>
</td>
                    <td align="right"><?php echo $_smarty_tpl->tpl_vars['di']->value['rate'];?>
</td>
                    <td align="right"><?php echo $_smarty_tpl->tpl_vars['di']->value['goods_amount'];?>
</td>
                    <td align="right"><?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['di']->value['discount_amount1']+$_smarty_tpl->tpl_vars['di']->value['discount_amount2']+$_smarty_tpl->tpl_vars['di']->value['discount_amount3']));?>
</td>
                    <td align="right"><?php echo $_smarty_tpl->tpl_vars['di']->value['tax_per'];?>
</td>
                    <td align="right"><?php echo $_smarty_tpl->tpl_vars['di']->value['tax_amount'];?>
</td>
                    <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['di']->value['cess']);?>
</td>
                    <td align="right"><?php echo $_smarty_tpl->tpl_vars['di']->value['cessamt'];?>
</td>
                    <td align="right"><?php echo $_smarty_tpl->tpl_vars['di']->value['net_amount'];?>
</td>
                </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </table>
        </td>
    </tr>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['cash'] == 2) {?>
    <?php $_smarty_tpl->_assignInScope('cash', $_smarty_tpl->tpl_vars['cash']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['total']);?>
    <?php } else { ?>
    <?php $_smarty_tpl->_assignInScope('credit', $_smarty_tpl->tpl_vars['credit']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['total']);?>
    <?php }?>
    <?php $_smarty_tpl->_assignInScope('amt', $_smarty_tpl->tpl_vars['amt']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['totalamt']-$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['discount']);?>
    <?php $_smarty_tpl->_assignInScope('cess', $_smarty_tpl->tpl_vars['cess']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['totalcess']);?>
    <?php $_smarty_tpl->_assignInScope('tcs', $_smarty_tpl->tpl_vars['tcs']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['tcsamt']);?>
    <?php $_smarty_tpl->_assignInScope('vattot', $_smarty_tpl->tpl_vars['vattot']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['vat']);?>
    <?php $_smarty_tpl->_assignInScope('total', $_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['total']);?>
    <?php $_smarty_tpl->_assignInScope('other', $_smarty_tpl->tpl_vars['other']->value+($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['add']+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['less']+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['round']+$_smarty_tpl->tpl_vars['dta']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['packing']));?>

    <?php
}
}
?>
    <tr>
        <th colspan="4">Total</th>
       	<th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['amt']->value);?>
</th>
        <th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['igst']->value);?>
</th>
        <th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['cgst']->value);?>
</th>
        <th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['sgst']->value);?>
</th>
       	<th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['vattot']->value);?>
</th>
       	<th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['cess']->value);?>
</th>
       	<th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['tcs']->value);?>
</th>
       	<th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['other']->value);?>
</th>
        <th class="ra"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['cash']->value);?>
</th>
        <th class="ra"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['credit']->value);?>
</th>
       	<th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total']->value);?>
</th>
    </tr>
</table><?php }
}
