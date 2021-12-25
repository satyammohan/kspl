<?php
/* Smarty version 3.1.39, created on 2021-12-25 06:33:21
  from 'C:\xampp\htdocs\sourcenew\templates\preport\item.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61c66dd9887097_39092646',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0afaa2b51918f068f2dfa90d86714ff0cc3e58ed' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sourcenew\\templates\\preport\\item.tpl.html',
      1 => 1640360174,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:preport/item".((string)$_REQUEST[\'option\']).".tpl.html' => 1,
  ),
),false)) {
function content_61c66dd9887097_39092646 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '34647232261c66dd95edaf2_02155758';
?>
<h3>
    Itemwise Purchase<hr>
</h3>
<fieldset>
    <form method="post">
        <table>
            <tr>
                <td>Start</td>
                <td><input type="date" name="start_date" size="9" placeholder="dd-mm-yyyy" value='<?php echo $_REQUEST['start_date'];?>
' /></td>
                <td>End</td>
                <td><input type="date" name="end_date" size="9"  placeholder="dd-mm-yyyy" value='<?php echo $_REQUEST['end_date'];?>
' /></td>
                <td colspan="5">
                    <input type="radio" name="option" value="1" <?php if ((isset($_REQUEST['option'])) && $_REQUEST['option'] == "1") {?>checked="checked"<?php } else {
if (!(isset($_REQUEST['option']))) {?>checked="checked"<?php }
}?> />Detail
                    <input type="radio" name="option" value="2" <?php if ((isset($_REQUEST['option'])) && $_REQUEST['option'] == "2") {?>checked="checked"<?php }?>/>Summary
                </td>
                <td colspan="4" align="center">
                    <input type="submit" value="Go" />
                    <input type="button" class="print" value="Print" />
                    <input type="hidden" id="excelfile" value="ItemPurc" />
                    <input type="button" class="excel" value="Download" title="Download as Excel" />
                </td>
            </tr>
        </table>
    </form>
</fieldset>
<div class="print_content">
    <?php echo $_SESSION['cname'];?>
 <?php echo $_SESSION['fyear'];?>
<br>
    Itemwise Purchase Period
    <?php echo smarty_modifier_date_format($_REQUEST['start_date'],"%d/%m/%Y");?>
 - <?php echo smarty_modifier_date_format($_REQUEST['end_date'],"%d/%m/%Y");?>

    <?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
        <?php $_smarty_tpl->_subTemplateRender("file:preport/item".((string)$_REQUEST['option']).".tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    <?php } else { ?>
        <br /><b>No Record Found!</b>
    <?php }?>
</div>
<?php }
}
