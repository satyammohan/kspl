<?php
/* Smarty version 3.1.39, created on 2021-12-24 08:06:20
  from 'C:\xampp\htdocs\sourcenew\templates\preport\register2.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61c53224c1a037_61879236',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73a5d595deca8e5ce69fd62c9051ddee5b188e58' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sourcenew\\templates\\preport\\register2.tpl.html',
      1 => 1640313369,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61c53224c1a037_61879236 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '206306603961c53224be7993_50917749';
?>
<table border="1" id="report">
    <thead>
    <tr>
       	<th>Sl.No.</th>
       	<th>Date</th>
       	<th align="right">Goods Value</th>
       	<th align="right">GST</th>
       	<th align="right">Cess</th>
       	<th>Cash</th>
        <th>No of Cash bills</th>
        <th>Credit</th>
        <th>No of Credit bills</th>
       	<th align="right">Total</th>
    </tr>
    </thead>
    <?php $_smarty_tpl->_assignInScope('vattot', 0);?> <?php $_smarty_tpl->_assignInScope('cash', 0);?> <?php $_smarty_tpl->_assignInScope('cashtot', 0);?>
    <?php $_smarty_tpl->_assignInScope('total', 0);?> <?php $_smarty_tpl->_assignInScope('credit', 0);?> <?php $_smarty_tpl->_assignInScope('credittot', 0);?>
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
        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['date'],"%d-%m-%Y");?>
</td>
        <td align="right"><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['totalamt'];?>
</td>
        <td align="right"><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['vat'];?>
</td>
        <td align="right"><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['totalcess'];?>
</td>
        <td align="right"><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['cashtotal'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['cashbills'];?>
</td>
        <td align="right"><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['credittotal'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['creditbills'];?>
</td>
        <td align="right"><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['total'];?>
</td>
    </tr>
    <?php $_smarty_tpl->_assignInScope('cess', $_smarty_tpl->tpl_vars['cess']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['totalcess']);?>
    <?php $_smarty_tpl->_assignInScope('amt', $_smarty_tpl->tpl_vars['amt']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['totalamt']);?>
    <?php $_smarty_tpl->_assignInScope('cash', $_smarty_tpl->tpl_vars['cash']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['cashtotal']);?>
    <?php $_smarty_tpl->_assignInScope('credit', $_smarty_tpl->tpl_vars['credit']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['credittotal']);?>
    <?php $_smarty_tpl->_assignInScope('vattot', $_smarty_tpl->tpl_vars['vattot']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['vat']);?>
    <?php $_smarty_tpl->_assignInScope('total', $_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['total']);?>
    <?php $_smarty_tpl->_assignInScope('cashtot', $_smarty_tpl->tpl_vars['cashtot']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['cashbills']);?>
    <?php $_smarty_tpl->_assignInScope('credittot', $_smarty_tpl->tpl_vars['credittot']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['creditbills']);?>
    <?php
}
}
?>
    <tr>
       	<th></th>
        <th>Total</th>
        <th align="right"><?php echo $_smarty_tpl->tpl_vars['amt']->value;?>
</th>
       	<th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['vattot']->value);?>
</th>
       	<th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['cess']->value);?>
</th>
       	<th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['cash']->value);?>
</th>
        <th> <?php echo $_smarty_tpl->tpl_vars['cashtot']->value;?>
</th>
        <th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['credit']->value);?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['credittot']->value;?>
</th>
       	<th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total']->value);?>
</th>
    </tr>
</table>
<?php }
}
