<?php
/* Smarty version 3.1.39, created on 2021-12-25 08:02:52
  from 'C:\xampp\htdocs\sourcenew\templates\common\container.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61c682d4521460_83635444',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '53c24e2429b94ece4ba3543505fa01545c1e2481' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sourcenew\\templates\\common\\container.tpl.html',
      1 => 1640222969,
      2 => 'file',
    ),
    '0f8a3374eff7a26b700258e301e47712a4dc8a9f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sourcenew\\templates\\common\\header.tpl.html',
      1 => 1640316210,
      2 => 'file',
    ),
    '3a587ff83590c2075320f7e585e57389f7d775d6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sourcenew\\templates\\common\\body.tpl.html',
      1 => 1640190965,
      2 => 'file',
    ),
    '419e67d25a26e24cdac69b4f38bf55af7aadeaba' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sourcenew\\templates\\common\\sidebar.tpl.html',
      1 => 1640269241,
      2 => 'file',
    ),
    '652c4329ac64c6e002da92776670d858dffcb55b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sourcenew\\templates\\common\\topbar.tpl.html',
      1 => 1640267345,
      2 => 'file',
    ),
    '4d442886ca0a55fea00ddfceb76e51dd1a2fba4f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sourcenew\\templates\\partner\\ledger.tpl.html',
      1 => 1640399570,
      2 => 'file',
    ),
    '813dfb604068e16b1fc5e3fc05d5fb718823e1b3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sourcenew\\templates\\common\\footer.tpl.html',
      1 => 1640052628,
      2 => 'file',
    ),
    '30980b995d7bd88d7470fcfb63bec1fd6935e580' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sourcenew\\templates\\common\\addon.tpl.html',
      1 => 1640225279,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 3600,
),true)) {
function content_61c682d4521460_83635444 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Odiray Industries Pvt. Ltd.-CMS</title>
    <link rel="shortcut icon" href="config/odiray.jpg" type="image/x-icon">

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/admin.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="js/common.js"></script>
    <script type="text/javascript" src="js/jqprint.js"></script>
    <script type="text/javascript" src="js/table2excel.js"></script>
</head><body id="page-top">

            <!-- Page Wrapper -->
<div id="wrapper">

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
<!-- End of Sidebar -->    
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <form class="form-inline">
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
    </form>

    <!-- Topbar Search -->
    <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form> -->

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                            placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 12, 2019</div>
                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-success">
                            <i class="fas fa-donate text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 7, 2019</div>
                        $290.29 has been deposited into your account!
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-warning">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 2, 2019</div>
                        Spending Alert: We've noticed unusually high spending for your account.
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
            </div>
        </li>

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div class="font-weight-bold">
                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                            problem I've been having.</div>
                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                        <div class="status-indicator"></div>
                    </div>
                    <div>
                        <div class="text-truncate">I have the photos that you ordered last month, how
                            would you like them sent to you?</div>
                        <div class="small text-gray-500">Jae Chun · 1d</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                        <div class="status-indicator bg-warning"></div>
                    </div>
                    <div>
                        <div class="text-truncate">Last month's report looks great, I am very happy with
                            the progress so far, keep up the good work!</div>
                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                            alt="...">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div>
                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                            told me that people say this to all dogs, even if they aren't good...</div>
                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">MAA TARINI AGENCY</span>
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                                    Ledger of : <b>MAA TARINI AGENCY</b><br>
<fieldset>
    <form method="post" action="index.php?module=partner&func=ledger">
        <table>
            <tr>
                <td><input type="date" name="start_date" value='2021-04-01' /></td>
                <td><input type="date" name="end_date" value='2021-12-31' /></td>
                <td>
                    <input type="hidden" name="id"  value='1628' />
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
              <tr>
        <td>1</td>
        <td></td>
        <td>                    Opening Balance
                                                                                        </td>
        <td class="right">&nbsp;</td>
        <td class="right">            505.43
                                    </td>
        <td class="right">505.43 CR</td>
    </tr>
        <tr>
        <td>2</td>
        <td>Apr  1, 2021</td>
        <td>                    DISCOUNT ALLOW  39
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            7294.54
                                    </td>
        <td class="right">7799.97 CR</td>
    </tr>
        <tr>
        <td>3</td>
        <td>Apr  3, 2021</td>
        <td>                    OBC- CC ACCOUNT (PNB CC) MALGODOWN MAHATAB ROAD BRANCH 33
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            60000.00
                                    </td>
        <td class="right">67799.97 CR</td>
    </tr>
        <tr>
        <td>4</td>
        <td>Apr  6, 2021</td>
        <td>                    SALES  T/63
                </td>
        <td class="right">            59999.80
                                    </td>
        <td class="right">&nbsp;</td>
        <td class="right">7800.17 CR</td>
    </tr>
        <tr>
        <td>5</td>
        <td>Apr  8, 2021</td>
        <td>                    OBC- CC ACCOUNT (PNB CC) MALGODOWN MAHATAB ROAD BRANCH 19
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            75000.00
                                    </td>
        <td class="right">82800.17 CR</td>
    </tr>
        <tr>
        <td>6</td>
        <td>Apr 12, 2021</td>
        <td>                    SALES  T/185
                </td>
        <td class="right">            67199.68
                                    </td>
        <td class="right">&nbsp;</td>
        <td class="right">15600.49 CR</td>
    </tr>
        <tr>
        <td>7</td>
        <td>Apr 12, 2021</td>
        <td>                    SALES  U2/102
                </td>
        <td class="right">            3374.95
                                    </td>
        <td class="right">&nbsp;</td>
        <td class="right">12225.54 CR</td>
    </tr>
        <tr>
        <td>8</td>
        <td>Apr 19, 2021</td>
        <td>                    OBC- CC ACCOUNT (PNB CC) MALGODOWN MAHATAB ROAD BRANCH 6
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            70800.00
                                    </td>
        <td class="right">83025.54 CR</td>
    </tr>
        <tr>
        <td>9</td>
        <td>Apr 20, 2021</td>
        <td>                    SALES  T/314
                </td>
        <td class="right">            70799.68
                                    </td>
        <td class="right">&nbsp;</td>
        <td class="right">12225.86 CR</td>
    </tr>
        <tr>
        <td>10</td>
        <td>May 11, 2021</td>
        <td>                    OBC- CC ACCOUNT (PNB CC) MALGODOWN MAHATAB ROAD BRANCH 7
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            60000.00
                                    </td>
        <td class="right">72225.86 CR</td>
    </tr>
        <tr>
        <td>11</td>
        <td>May 13, 2021</td>
        <td>                    SALES  T/565
                </td>
        <td class="right">            59999.80
                                    </td>
        <td class="right">&nbsp;</td>
        <td class="right">12226.06 CR</td>
    </tr>
        <tr>
        <td>12</td>
        <td>May 31, 2021</td>
        <td>                    SALES  T/689
                </td>
        <td class="right">            67199.72
                                    </td>
        <td class="right">&nbsp;</td>
        <td class="right">54973.66 DB</td>
    </tr>
        <tr>
        <td>13</td>
        <td>May 31, 2021</td>
        <td>                    OBC- CC ACCOUNT (PNB CC) MALGODOWN MAHATAB ROAD BRANCH 7
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            60000.00
                                    </td>
        <td class="right">5026.34 CR</td>
    </tr>
        <tr>
        <td>14</td>
        <td>Jun  8, 2021</td>
        <td>                    OBC- CC ACCOUNT (PNB CC) MALGODOWN MAHATAB ROAD BRANCH 24
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            64800.00
                                    </td>
        <td class="right">69826.34 CR</td>
    </tr>
        <tr>
        <td>15</td>
        <td>Jun 10, 2021</td>
        <td>                    SALES  T/796
                </td>
        <td class="right">            64799.28
                                    </td>
        <td class="right">&nbsp;</td>
        <td class="right">5027.06 CR</td>
    </tr>
        <tr>
        <td>16</td>
        <td>Jun 11, 2021</td>
        <td>                    OBC- CC ACCOUNT (PNB CC) MALGODOWN MAHATAB ROAD BRANCH 20
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            64800.00
                                    </td>
        <td class="right">69827.06 CR</td>
    </tr>
        <tr>
        <td>17</td>
        <td>Jun 28, 2021</td>
        <td>                    SALES  T/964
                </td>
        <td class="right">            64799.28
                                    </td>
        <td class="right">&nbsp;</td>
        <td class="right">5027.78 CR</td>
    </tr>
        <tr>
        <td>18</td>
        <td>Jul  1, 2021</td>
        <td>                    OBC- CC ACCOUNT (PNB CC) MALGODOWN MAHATAB ROAD BRANCH 9
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            58425.00
                                    </td>
        <td class="right">63452.78 CR</td>
    </tr>
        <tr>
        <td>19</td>
        <td>Jul  1, 2021</td>
        <td>                    DISCOUNT ALLOW  77
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            11178.65
                                    </td>
        <td class="right">74631.43 CR</td>
    </tr>
        <tr>
        <td>20</td>
        <td>Jul  3, 2021</td>
        <td>                    SALES  T/1030
                </td>
        <td class="right">            55200.46
                                    </td>
        <td class="right">&nbsp;</td>
        <td class="right">19430.97 CR</td>
    </tr>
        <tr>
        <td>21</td>
        <td>Jul  3, 2021</td>
        <td>                    SALES  T/1031
                </td>
        <td class="right">            3375.04
                                    </td>
        <td class="right">&nbsp;</td>
        <td class="right">16055.93 CR</td>
    </tr>
        <tr>
        <td>22</td>
        <td>Jul 10, 2021</td>
        <td>                    SALES  T/1121
                </td>
        <td class="right">            64799.28
                                    </td>
        <td class="right">&nbsp;</td>
        <td class="right">48743.35 DB</td>
    </tr>
        <tr>
        <td>23</td>
        <td>Jul 10, 2021</td>
        <td>                    OBC- CC ACCOUNT (PNB CC) MALGODOWN MAHATAB ROAD BRANCH 1
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            10.00
                                    </td>
        <td class="right">48733.35 DB</td>
    </tr>
        <tr>
        <td>24</td>
        <td>Jul 10, 2021</td>
        <td>                    OBC- CC ACCOUNT (PNB CC) MALGODOWN MAHATAB ROAD BRANCH 2
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            61200.00
                                    </td>
        <td class="right">12466.65 CR</td>
    </tr>
        <tr>
        <td>25</td>
        <td>Jul 10, 2021</td>
        <td>                    OBC- CC ACCOUNT (PNB CC) MALGODOWN MAHATAB ROAD BRANCH 6
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            65700.00
                                    </td>
        <td class="right">78166.65 CR</td>
    </tr>
        <tr>
        <td>26</td>
        <td>Jul 26, 2021</td>
        <td>                    SALES  T/1314
                </td>
        <td class="right">            64799.28
                                    </td>
        <td class="right">&nbsp;</td>
        <td class="right">13367.37 CR</td>
    </tr>
        <tr>
        <td>27</td>
        <td>Jul 26, 2021</td>
        <td>                    OBC- CC ACCOUNT (PNB CC) MALGODOWN MAHATAB ROAD BRANCH 13
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            58200.00
                                    </td>
        <td class="right">71567.37 CR</td>
    </tr>
        <tr>
        <td>28</td>
        <td>Jul 27, 2021</td>
        <td>                    SALES  T/1329
                </td>
        <td class="right">            55200.46
                                    </td>
        <td class="right">&nbsp;</td>
        <td class="right">16366.91 CR</td>
    </tr>
        <tr>
        <td>29</td>
        <td>Aug  1, 2021</td>
        <td>                    DISCOUNT ALLOW  23
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            6043.00
                                    </td>
        <td class="right">22409.91 CR</td>
    </tr>
        <tr>
        <td>30</td>
        <td>Aug 18, 2021</td>
        <td>                    OBC- CC ACCOUNT (PNB CC) MALGODOWN MAHATAB ROAD BRANCH 9
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            60000.00
                                    </td>
        <td class="right">82409.91 CR</td>
    </tr>
        <tr>
        <td>31</td>
        <td>Aug 20, 2021</td>
        <td>                    SALES  T/1593
                </td>
        <td class="right">            77999.74
                                    </td>
        <td class="right">&nbsp;</td>
        <td class="right">4410.17 CR</td>
    </tr>
        <tr>
        <td>32</td>
        <td>Aug 20, 2021</td>
        <td>                    SALES  U2/679
                </td>
        <td class="right">            2250.00
                                    </td>
        <td class="right">&nbsp;</td>
        <td class="right">2160.17 CR</td>
    </tr>
        <tr>
        <td>33</td>
        <td>Aug 26, 2021</td>
        <td>                    OBC- CC ACCOUNT (PNB CC) MALGODOWN MAHATAB ROAD BRANCH 274
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            70000.00
                                    </td>
        <td class="right">72160.17 CR</td>
    </tr>
        <tr>
        <td>34</td>
        <td>Aug 31, 2021</td>
        <td>                    SALES  T/1738
                </td>
        <td class="right">            70799.54
                                    </td>
        <td class="right">&nbsp;</td>
        <td class="right">1360.63 CR</td>
    </tr>
        <tr>
        <td>35</td>
        <td>Sep  1, 2021</td>
        <td>                    DISCOUNT ALLOW  1155
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            3685.60
                                    </td>
        <td class="right">5046.23 CR</td>
    </tr>
        <tr>
        <td>36</td>
        <td>Sep  9, 2021</td>
        <td>                    SALES  T/1827
                </td>
        <td class="right">            52799.88
                                    </td>
        <td class="right">&nbsp;</td>
        <td class="right">47753.65 DB</td>
    </tr>
        <tr>
        <td>37</td>
        <td>Sep  9, 2021</td>
        <td>                    SALES  T/1828
                </td>
        <td class="right">            3375.04
                                    </td>
        <td class="right">&nbsp;</td>
        <td class="right">51128.69 DB</td>
    </tr>
        <tr>
        <td>38</td>
        <td>Sep  9, 2021</td>
        <td>                    HDFC-CURRENT A/C JHOLA SAHI, CUTTACK 911
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            55000.00
                                    </td>
        <td class="right">3871.31 CR</td>
    </tr>
        <tr>
        <td>39</td>
        <td>Sep 20, 2021</td>
        <td>                    HDFC-CURRENT A/C JHOLA SAHI, CUTTACK 1223
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            60000.00
                                    </td>
        <td class="right">63871.31 CR</td>
    </tr>
        <tr>
        <td>40</td>
        <td>Sep 22, 2021</td>
        <td>                    SALES  T/1926
                </td>
        <td class="right">            62999.72
                                    </td>
        <td class="right">&nbsp;</td>
        <td class="right">871.59 CR</td>
    </tr>
        <tr>
        <td>41</td>
        <td>Oct  1, 2021</td>
        <td>                    DISCOUNT ALLOW  2014
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            2892.85
                                    </td>
        <td class="right">3764.44 CR</td>
    </tr>
        <tr>
        <td>42</td>
        <td>Oct  4, 2021</td>
        <td>                    OBC- CC ACCOUNT (PNB CC) MALGODOWN MAHATAB ROAD BRANCH 1760
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            60000.00
                                    </td>
        <td class="right">63764.44 CR</td>
    </tr>
        <tr>
        <td>43</td>
        <td>Oct  6, 2021</td>
        <td>                    SALES  T/2089
                </td>
        <td class="right">            59999.45
                                    </td>
        <td class="right">&nbsp;</td>
        <td class="right">3764.99 CR</td>
    </tr>
        <tr>
        <td>44</td>
        <td>Oct  8, 2021</td>
        <td>                    SALES  T/2154
                </td>
        <td class="right">            68399.52
                                    </td>
        <td class="right">&nbsp;</td>
        <td class="right">64634.53 DB</td>
    </tr>
        <tr>
        <td>45</td>
        <td>Oct  8, 2021</td>
        <td>                    OBC- CC ACCOUNT (PNB CC) MALGODOWN MAHATAB ROAD BRANCH 2056
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            66000.00
                                    </td>
        <td class="right">1365.47 CR</td>
    </tr>
        <tr>
        <td>46</td>
        <td>Oct  9, 2021</td>
        <td>                    OBC- CC ACCOUNT (PNB CC) MALGODOWN MAHATAB ROAD BRANCH 2123
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            60000.00
                                    </td>
        <td class="right">61365.47 CR</td>
    </tr>
        <tr>
        <td>47</td>
        <td>Oct 18, 2021</td>
        <td>                    SALES  T/2280
                </td>
        <td class="right">            61199.46
                                    </td>
        <td class="right">&nbsp;</td>
        <td class="right">166.01 CR</td>
    </tr>
        <tr>
        <td>48</td>
        <td>Oct 25, 2021</td>
        <td>                    OBC- CC ACCOUNT (PNB CC) MALGODOWN MAHATAB ROAD BRANCH 2673
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            50900.00
                                    </td>
        <td class="right">51066.01 CR</td>
    </tr>
        <tr>
        <td>49</td>
        <td>Oct 25, 2021</td>
        <td>                    OBC- CC ACCOUNT (PNB CC) MALGODOWN MAHATAB ROAD BRANCH 2674
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            10000.00
                                    </td>
        <td class="right">61066.01 CR</td>
    </tr>
        <tr>
        <td>50</td>
        <td>Oct 27, 2021</td>
        <td>                    SALES  T/2403
                </td>
        <td class="right">            23625.25
                                    </td>
        <td class="right">&nbsp;</td>
        <td class="right">37440.76 CR</td>
    </tr>
        <tr>
        <td>51</td>
        <td>Oct 27, 2021</td>
        <td>                    SALES  T/2404
                </td>
        <td class="right">            31200.12
                                    </td>
        <td class="right">&nbsp;</td>
        <td class="right">6240.64 CR</td>
    </tr>
        <tr>
        <td>52</td>
        <td>Nov  1, 2021</td>
        <td>                    DISCOUNT ALLOW  3081
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            5410.35
                                    </td>
        <td class="right">11650.99 CR</td>
    </tr>
        <tr>
        <td>53</td>
        <td>Nov  8, 2021</td>
        <td>                    OBC- CC ACCOUNT (PNB CC) MALGODOWN MAHATAB ROAD BRANCH 3139
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            55000.00
                                    </td>
        <td class="right">66650.99 CR</td>
    </tr>
        <tr>
        <td>54</td>
        <td>Nov  9, 2021</td>
        <td>                    SALES  T/2489
                </td>
        <td class="right">            61799.50
                                    </td>
        <td class="right">&nbsp;</td>
        <td class="right">4851.49 CR</td>
    </tr>
        <tr>
        <td>55</td>
        <td>Nov 19, 2021</td>
        <td>                    OBC- CC ACCOUNT (PNB CC) MALGODOWN MAHATAB ROAD BRANCH 3476
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            55000.00
                                    </td>
        <td class="right">59851.49 CR</td>
    </tr>
        <tr>
        <td>56</td>
        <td>Nov 22, 2021</td>
        <td>                    SALES  T/2579
                </td>
        <td class="right">            53999.40
                                    </td>
        <td class="right">&nbsp;</td>
        <td class="right">5852.09 CR</td>
    </tr>
        <tr>
        <td>57</td>
        <td>Dec  9, 2021</td>
        <td>                    DISCOUNT ALLOW  3992
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            2613.85
                                    </td>
        <td class="right">8465.94 CR</td>
    </tr>
        <tr>
        <td>58</td>
        <td>Dec 11, 2021</td>
        <td>                    OBC- CC ACCOUNT (PNB CC) MALGODOWN MAHATAB ROAD BRANCH 4033
                </td>
        <td class="right">&nbsp;</td>
        <td class="right">            54000.00
                                    </td>
        <td class="right">62465.94 CR</td>
    </tr>
        <tr>
        <td>59</td>
        <td>Dec 13, 2021</td>
        <td>                    SALES  T/2712
                </td>
        <td class="right">            57599.36
                                    </td>
        <td class="right">&nbsp;</td>
        <td class="right">4866.58 CR</td>
    </tr>
        </tbody>
    <tfoot>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <th>Total</th>
        <th class="right">1389592.69</th>
        <th class="right">1394459.27</th>
        <th class="right">4866.58 CR</td>
    </tr>
    </tfoot>
</table>
                            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        <!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Odiray.in 2021-22</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->        <!-- Scroll to Top Button-->
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
</div>    
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>
</html><?php }
}
