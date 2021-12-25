<?php
/* Smarty version 3.1.39, created on 2021-12-25 08:02:52
  from 'C:\xampp\htdocs\sourcenew\templates\common\sidebar.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61c682d41a1645_43315857',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '419e67d25a26e24cdac69b4f38bf55af7aadeaba' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sourcenew\\templates\\common\\sidebar.tpl.html',
      1 => 1640269241,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61c682d41a1645_43315857 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '173679679861c682d419fdb6_46509838';
?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i><img height="30" src="config/odiray.jpg"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ODIRAY</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.php?module=dashboard&func=show">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Management
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Master</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="index.php?module=party&func=listing">Party</a>
                <a class="collapse-item" href="index.php?module=product&func=listing">Item Listing</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Entry</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="index.php?module=sales&func=listing">Sales</a>
                <a class="collapse-item" href="index.php?module=order&func=listing">Sales Order</a>
                <!-- <a class="collapse-item" href="index.php?module=accounts&func=listing">Accounts</a> -->
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Reports
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#SalesReport"
            aria-expanded="true" aria-controls="SalesReport">
            <i class="fas fa-list"></i>
            <span>Sales</span>
        </a>
        <div id="SalesReport" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="index.php?module=sreport&func=register">Register</a>
                <a class="collapse-item" href="index.php?module=sreport&func=GST">GST</a>
                <a class="collapse-item" href="index.php?module=sreport&func=hsn">HSN Report</a>
                <a class="collapse-item" href="index.php?module=sreport&func=item">Item</a>
                <hr class="sidebar-divider d-none d-md-block">
                <a class="collapse-item" href="index.php?module=order&func=register">Sales Order</a>
                <a class="collapse-item" href="index.php?module=order&func=pending">Pending Order</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#PurcReport" aria-expanded="true"
            aria-controls="PurcReport">
            <i class="fas fa-list"></i>
            <span>Purchase</span>
        </a>
        <div id="PurcReport" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="index.php?module=preport&func=register">Register</a>
                <a class="collapse-item" href="index.php?module=preport&func=item">Item</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#StockReport"
            aria-expanded="true" aria-controls="StockReport">
            <i class="fas fa-list"></i>
            <span>Stock</span>
        </a>
        <div id="StockReport" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="index.php?module=stock&func=statement">Stock Statement</a>
                <a class="collapse-item" href="index.php?module=stock&func=register">Stock Register</a>
            </div>
        </div>
    </li>

    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#AccountsReport"
            aria-expanded="true" aria-controls="AccountsReport">
            <i class="fas fa-list"></i>
            <span>Accounts</span>
        </a>
        <div id="AccountsReport" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="index.php?module=accounts&func=ledger">Ledger</a>
                <a class="collapse-item" href="index.php?module=accounts&func=outstanding">Outstanding</a>
            </div>
        </div>
    </li> -->
    <!-- Divider -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt text-gray-400"></i>
            <span>Logout</span></a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar --><?php }
}
