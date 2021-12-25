<?php
/* Smarty version 3.1.39, created on 2021-12-24 20:24:19
  from 'C:\xampp\htdocs\sourcenew\templates\party\listing.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61c5df1b6a3958_50056212',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'baf4f29dd5ec5bb7f63f58da822317627fe27394' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sourcenew\\templates\\party\\listing.tpl.html',
      1 => 1640224807,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61c5df1b6a3958_50056212 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '190163175561c5df1b64b200_11182714';
?>
<h3>
    Party Master<hr>
</h3>
<table id="dataTable"  class="table table-striped table-bordered" width="100%">
    <thead>    
        <tr>
            <th>Sl</th><th>Name</th><th>Address</th><th>Mobile</th><th>GSTIN</th><th><a class="btn btn-primary" href="index.php?module=party&func=edit" title="Add GST Tax"><i class="fa fa-plus"></i></a></th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'mod');
$_smarty_tpl->tpl_vars['mod']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['mod']->value) {
$_smarty_tpl->tpl_vars['mod']->do_else = false;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['name'];?>
</td>			
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['address1'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['address2'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['mobile'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['gstin'];?>
</td>
            <td>
                <a class="btn btn-primary" href="index.php?module=party&func=edit&id=<?php echo $_smarty_tpl->tpl_vars['mod']->value['id_party'];?>
" title="Edit GST Tax"><i class="fa fa-edit"></i></a>
                <a class="btn btn-primary" href="index.php?module=party&func=delete&id=<?php echo $_smarty_tpl->tpl_vars['mod']->value['id_party'];?>
" onclick="return confirm('Do you want to delete?');" title="Delete GST Tax"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table><?php }
}
