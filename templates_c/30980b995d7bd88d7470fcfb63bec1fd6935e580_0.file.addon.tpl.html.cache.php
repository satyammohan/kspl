<?php
/* Smarty version 3.1.39, created on 2021-12-25 08:02:52
  from 'C:\xampp\htdocs\sourcenew\templates\common\addon.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61c682d44db8c7_97881044',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30980b995d7bd88d7470fcfb63bec1fd6935e580' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sourcenew\\templates\\common\\addon.tpl.html',
      1 => 1640225279,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61c682d44db8c7_97881044 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '33353016561c682d44da2a6_60498809';
?>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="index.php?module=user&func=logout">Logout</a>
            </div>
        </div>
    </div>
</div><?php }
}
