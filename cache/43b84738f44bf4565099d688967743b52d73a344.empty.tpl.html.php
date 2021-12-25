<?php
/* Smarty version 3.1.39, created on 2021-12-23 07:29:55
  from 'C:\xampp\htdocs\sourcenew\templates\common\empty.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61c3d81b6eaab8_59044942',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc86bdab7b0e571d2f108f6201cd39fa816b6d4d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sourcenew\\templates\\common\\empty.tpl.html',
      1 => 1631239521,
      2 => 'file',
    ),
    '11002ced71a24e3f16345711ff7b416277fb099c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sourcenew\\templates\\party\\edit.tpl.html',
      1 => 1640223663,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 3600,
),true)) {
function content_61c3d81b6eaab8_59044942 (Smarty_Internal_Template $_smarty_tpl) {
?><h3>
    Edit Party<hr>
</h3>
<form name="tax" id="add_tax" method="post" action="index.php?module=party&func=update">
    <table >
        <tr>
            <td><b>Name:</b></td>
            <td><input type="text" name="entry[name]" required value="MAA TARINI MINERAL WATER"/></td>
        </tr>
        <tr>
            <td><b>Address:</b></td>
            <td><input type="text" name="entry[address1]" required value="BALICHANDRAPUR"/></td>
        </tr>
        <tr>
            <td><b>Address1:</b></td>
            <td><input type="text" name="entry[address2]" required value="."/></td>
        </tr>
        <tr>
            <td><b>Opening Balance:</b></td>
            <td><input type="text" name="entry[opening_balance]" value="0.00"/></td>
        </tr>
        <tr>
            <td><b>State Code:</b></td>
            <td><input type="text" name="entry[statecode]" required value="21"/></td>
        </tr>
        <tr>
            <td><b>State:</b></td>
            <td><input type="text" name="entry[state]" required value="Odisha"/></td>
        </tr>
        <tr>
            <td><b>Mobile:</b></td>
            <td><input type="text" name="entry[mobile]" required value="9938646470"/></td>
        </tr>
        <tr>
            <td><b>Pin:</b></td>
            <td><input type="text" name="entry[pincode]" required value="."/></td>
        </tr>
        <tr>
            <td><b>Location:</b></td>
            <td><input type="text" name="entry[location]" value=""/></td>
        </tr>
        <tr>
            <td><b>GSTIN:</b></td>
            <td><input type="text" name="entry[gstin]" value="21CPWPS3952N3ZY"/></td>
        </tr>
        <tr>
            <td><b>Pan:</b></td>
            <td><input type="text" name="entry[panno]" value=""/></td>
        </tr>
        <tr>
            <td><b>Adhar:</b></td>
            <td><input type="text" name="entry[adhar]" value=""/></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="hidden" id="hide" name="id" value="1">
                <input type="submit" value="Save" />
            </td>
        </tr>
    </table>
</form><?php }
}
