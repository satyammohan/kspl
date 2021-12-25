<?php
/* Smarty version 3.1.39, created on 2021-12-25 08:02:52
  from 'C:\xampp\htdocs\sourcenew\templates\partner\ledger.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61c682d42cea89_70568173',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4d442886ca0a55fea00ddfceb76e51dd1a2fba4f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sourcenew\\templates\\partner\\ledger.tpl.html',
      1 => 1640399570,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61c682d42cea89_70568173 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '37087969561c682d425af98_97225065';
?>
Ledger of : <b><?php echo $_smarty_tpl->tpl_vars['party']->value[0]['name'];?>
</b><br>
<fieldset>
    <form method="post" action="index.php?module=partner&func=ledger">
        <table>
            <tr>
                <td><input type="date" name="start_date" value='<?php echo $_REQUEST['start_date'];?>
' /></td>
                <td><input type="date" name="end_date" value='<?php echo $_REQUEST['end_date'];?>
' /></td>
                <td>
                    <input type="hidden" name="id"  value='<?php echo $_REQUEST['id'];?>
' />
                    <input type="submit" value="Go" />
                    <input type="hidden" id="excelfile" value="Ledger" />
                    <input type="button" class="pdf" value="PDF" title="Download as PDF" />
                </td>
            </tr>
        </table>
    </form>
</fieldset>
<table border="1" id="report">
    <thead>
    <tr>
       	<th data-priority="3">Sl.No.</th>
       	<th>Date</th>
        <th data-priority="2">Party</th>
        <th class="right">Debit</th>
        <th class="right">Credit</th>
       	<th class="right" data-priority="1">Balance</th>
    </tr>
    </thead>
    <tbody>
    <?php $_smarty_tpl->_assignInScope('debit', 0);?> <?php $_smarty_tpl->_assignInScope('total', 0);?> <?php $_smarty_tpl->_assignInScope('credit', 0);?>
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
        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['date'],$_smarty_tpl->tpl_vars['smarty_date']->value);?>
</td>
        <td><?php if ($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['dhead'] == $_REQUEST['id']) {
$_smarty_tpl->_assignInScope('partyname', $_smarty_tpl->tpl_vars['head']->value[$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['chead']]);
} else {
$_smarty_tpl->_assignInScope('partyname', $_smarty_tpl->tpl_vars['head']->value[$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['dhead']]);
}?>
        <?php if ($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['date']) {?>
            <?php echo $_smarty_tpl->tpl_vars['partyname']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['refno'];?>

        <?php } else { ?>
            Opening Balance
            <?php if ($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['total'] < 0) {?>
                <?php $_tmp_array = isset($_smarty_tpl->tpl_vars['data']) ? $_smarty_tpl->tpl_vars['data']->value : array();
if (!(is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess)) {
settype($_tmp_array, 'array');
}
$_tmp_array[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['dhead'] = 0;
$_smarty_tpl->_assignInScope('data', $_tmp_array);?>
                <?php $_tmp_array = isset($_smarty_tpl->tpl_vars['data']) ? $_smarty_tpl->tpl_vars['data']->value : array();
if (!(is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess)) {
settype($_tmp_array, 'array');
}
$_tmp_array[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['chead'] = $_REQUEST['id'];
$_smarty_tpl->_assignInScope('data', $_tmp_array);?>
                <?php $_tmp_array = isset($_smarty_tpl->tpl_vars['data']) ? $_smarty_tpl->tpl_vars['data']->value : array();
if (!(is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess)) {
settype($_tmp_array, 'array');
}
$_tmp_array[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['total'] = -$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['total'];
$_smarty_tpl->_assignInScope('data', $_tmp_array);?>
            <?php }?>
        <?php }?>
        </td>
        <td class="right"><?php if ($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['dhead'] == $_REQUEST['id']) {?>
            <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['total']);?>

            <?php $_smarty_tpl->_assignInScope('debit', $_smarty_tpl->tpl_vars['debit']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['total']);?>
            <?php $_smarty_tpl->_assignInScope('total', $_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['total']);?>
            <?php } else { ?>&nbsp;<?php }?></td>
        <td class="right"><?php if ($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['chead'] == $_REQUEST['id']) {?>
            <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['total']);?>

            <?php $_smarty_tpl->_assignInScope('credit', $_smarty_tpl->tpl_vars['credit']->value+$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['total']);?>
            <?php $_smarty_tpl->_assignInScope('total', $_smarty_tpl->tpl_vars['total']->value-$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)]['total']);?>
            <?php } else { ?>&nbsp;<?php }?></td>
        <td class="right"><?php echo sprintf("%.2f",abs($_smarty_tpl->tpl_vars['total']->value));?>
 <?php if ($_smarty_tpl->tpl_vars['total']->value < 0) {?>CR<?php } else { ?>DB<?php }?></td>
    </tr>
    <?php
}
}
?>
    </tbody>
    <tfoot>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <th>Total</th>
        <th class="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['debit']->value);?>
</th>
        <th class="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['credit']->value);?>
</th>
        <th class="right"><?php echo sprintf("%.2f",abs($_smarty_tpl->tpl_vars['total']->value));?>
 <?php if ($_smarty_tpl->tpl_vars['total']->value < 0) {?>CR<?php } else { ?>DB<?php }?></td>
    </tr>
    </tfoot>
</table>
<?php }
}
