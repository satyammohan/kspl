<?php
/* Smarty version 3.1.39, created on 2021-12-23 07:38:03
  from 'C:\xampp\htdocs\sourcenew\templates\party\edit.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61c3da0330f030_55000560',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11002ced71a24e3f16345711ff7b416277fb099c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sourcenew\\templates\\party\\edit.tpl.html',
      1 => 1640224996,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61c3da0330f030_55000560 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '166733008061c3da032fea26_18672314';
?>
<h3>
    <?php if ($_smarty_tpl->tpl_vars['data']->value['id_party']) {?>Edit<?php } else { ?>Add<?php }?> Party<hr>
</h3>
<form name="tax" id="add_tax" method="post" action="index.php?module=party&func=<?php if ($_smarty_tpl->tpl_vars['data']->value['id_party']) {?>update<?php } else { ?>insert<?php }?>">
    <table>
        <tr>
            <td><b>Name:</b></td>
            <td><input class="form-control"  type="text" name="entry[name]" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
"/></td>
        </tr>
        <tr>
            <td><b>Address:</b></td>
            <td><input class="form-control"  type="text" name="entry[address1]" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['address1'];?>
"/></td>
        </tr>
        <tr>
            <td><b>Address1:</b></td>
            <td><input class="form-control"  type="text" name="entry[address2]" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['address2'];?>
"/></td>
        </tr>
        <tr>
            <td><b>Opening Balance:</b></td>
            <td><input class="form-control"  type="text" name="entry[opening_balance]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['opening_balance'];?>
"/></td>
        </tr>
        <tr>
            <td><b>State Code:</b></td>
            <td><input class="form-control"  type="text" name="entry[statecode]" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['statecode'];?>
"/></td>
        </tr>
        <tr>
            <td><b>State:</b></td>
            <td><input class="form-control"  type="text" name="entry[state]" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['state'];?>
"/></td>
        </tr>
        <tr>
            <td><b>Mobile:</b></td>
            <td><input class="form-control"  type="text" name="entry[mobile]" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['mobile'];?>
"/></td>
        </tr>
        <tr>
            <td><b>Pin:</b></td>
            <td><input class="form-control"  type="text" name="entry[pincode]" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['pincode'];?>
"/></td>
        </tr>
        <tr>
            <td><b>Location:</b></td>
            <td><input class="form-control"  type="text" name="entry[location]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['location'];?>
"/></td>
        </tr>
        <tr>
            <td><b>GSTIN:</b></td>
            <td><input class="form-control"  type="text" name="entry[gstin]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['gstin'];?>
"/></td>
        </tr>
        <tr>
            <td><b>Pan:</b></td>
            <td><input class="form-control"  type="text" name="entry[panno]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['panno'];?>
"/></td>
        </tr>
        <tr>
            <td><b>Adhar:</b></td>
            <td><input class="form-control"  type="text" name="entry[adhar]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['adhar'];?>
"/></td>
        </tr>
        <tr>
            <td colspan="1">
                <input class="form-control"  type="hidden" id="hide" name="id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id_party'];?>
">
                <input class="form-control btn btn-primary"  type="submit" value="Save" />
            </td>
        </tr>
    </table>
</form><?php }
}
