<?php
/* Smarty version 3.1.39, created on 2021-12-25 07:51:50
  from 'C:\xampp\htdocs\sourcenew\templates\preport\register.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61c6803e9fa194_67212502',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba722cfe730357a8fcd3be3e421f3ca5bfb7b32b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sourcenew\\templates\\preport\\register.tpl.html',
      1 => 1640316535,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:preport/register".((string)$_REQUEST[\'option\']).".tpl.html' => 1,
  ),
),false)) {
function content_61c6803e9fa194_67212502 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '34231354961c6803e9d8ad7_78313509';
?>
<h3>
    Purchase Register<hr>
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
                    <input type="radio" name="option" value="3" <?php if ((isset($_REQUEST['option'])) && $_REQUEST['option'] == "3") {?>checked="checked"<?php }?> />Monthly
                    <input type="checkbox" name="itemdetails" <?php if ((isset($_REQUEST['itemdetails']))) {?>checked="checked"<?php }?>>Item Details
                </td>
                <td colspan="4" align="center">
                    <input type="submit" value="Go" />
                    <input type="button" class="print" value="Print" />
                    <input type="hidden" id="excelfile" value="PurcRegister" />
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
    Purchase Register Period
    <?php echo smarty_modifier_date_format($_REQUEST['start_date'],"%d/%m/%Y");?>
 - <?php echo smarty_modifier_date_format($_REQUEST['end_date'],"%d/%m/%Y");?>

    <?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
        <?php $_smarty_tpl->_subTemplateRender("file:preport/register".((string)$_REQUEST['option']).".tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    <?php } else { ?>
        <br /><b>No Record Found!</b>
    <?php }?>
</div>
<?php }
}
