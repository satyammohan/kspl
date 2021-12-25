<?php
/* Smarty version 3.1.39, created on 2021-12-23 06:56:02
  from 'C:\xampp\htdocs\sourcenew\templates\user\activate.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61c3d02aebc898_58659487',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '632da2c0ac6f0b518523fdf2878a581a54da641b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sourcenew\\templates\\user\\activate.tpl.html',
      1 => 1640191398,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61c3d02aebc898_58659487 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '67319982761c3d02aea3d62_34068345';
echo '<script'; ?>
 src="js/ddslick.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">
    var ddData = Array();
    var ddYear = Array();
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['info']->value, 'mod', false, NULL, 'f', array (
  'index' => true,
));
$_smarty_tpl->tpl_vars['mod']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['mod']->value) {
$_smarty_tpl->tpl_vars['mod']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_f']->value['index']++;
?>
    ddData['<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_f']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_f']->value['index'] : null);?>
'] = { text: "<?php echo $_smarty_tpl->tpl_vars['mod']->value['name'];?>
", value: '<?php echo $_smarty_tpl->tpl_vars['mod']->value['name'];?>
', selected: false, description: "&nbsp;" };
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    
    $(document).ready(function() {
        $(".classname").focus();
        var fdata=Array();
        $('#dds').ddslick({
            data:ddData,
            width:400,
            <?php if ((isset($_SESSION['sid']))) {?>
                'defaultSelectedIndex' : '<?php echo $_SESSION['sid'];?>
',
            <?php }?>
            onSelected: function(selectedData) {
                var cur_comp = selectedData['selectedData'].text;
                $('#cname').val(cur_comp);
                $('#sindex').val(selectedData['selectedIndex']);
                $.getJSON("index.php?module=info&func=ddslick",{ name:cur_comp },function(fdata) {
                    $('#year_select').ddslick("destroy");
                    $('#year_select').ddslick({
                        data:fdata,
                        width:280,
                        <?php if ((isset($_SESSION['yselect']))) {?>
                            'defaultSelectedIndex' : '<?php echo $_SESSION['yselect'];?>
',
                        <?php }?>
                        onSelected:function(Data){
                            $('#cid').val((Data['selectedData'].value));
                            $('#yindex').val((Data['selectedIndex']));
                        }
                    })
                })
            }   
        });
    });
<?php echo '</script'; ?>
>
<center>
    <br><br><br><br>
    <h3>Welcome, <?php echo $_SESSION['user'];?>
</h3>
    <br><br><h2>:: Select Company and Financial Year ::</h2><br><br><br>
    <form action="index.php?module=info&func=prefix" method="post">
        <table>
            <tr>
                <td><div id="dds"></div></td>
                <td><div id="year_select"></div></td>
                <td>
                    <input type="hidden" name="cname" id="cname" />
                    <input type="hidden" name="index" id="sindex" />
                    <input type="hidden" name="yindex" id="yindex" />
                    <input type="hidden" name="id" id="cid" />
                    <input type="submit" name="submit" value="Go" class="btn btn-primary" />
                </td>
            </tr>
        </table>
    </form>
</center>

<style>
    .dd-select {
        border: none;
    }
    .dd-selected {
        height:40px !important;
        border: 1px solid #09192A;
        border-radius: 25px;
    }
</style><?php }
}
