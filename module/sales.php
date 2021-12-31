<?php
class sales extends common {

    function __construct() {
        $this->checklogin();
        $this->table_prefix();
        parent:: __construct();
    }
    function _default() {
    }
    function insert() {
        $data = $_REQUEST['entry'];
        $data['id_head'] = $_SESSION['id_user'];
        $data['ip'] = $_SERVER['REMOTE_ADDR'];
        $data['id_create'] = $_SESSION['id_user'];
        $data['id_modify'] = $_SESSION['id_user'];
        $data['create_date'] = date("Y-m-d h:i:s");
        $sql = $this->create_insert("{$this->prefix}partner_sale", $data);
        ob_clean();
        $this->pr($_REQUEST);
        exit;
        //$this->m->query($sql);
        //$_SESSION['msg'] = "Sales Added Successfully.";
        //$this->redirect("index.php?module=sales&func=listing");
    }
    function update() {
        $data = $_REQUEST['entry'];
        $data['id_head'] = $_SESSION['id_user'];
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
        $sql = $this->create_update("{$this->prefix}partner_sale", $data, "id_partner_sale='{$id}' AND id_head='$hid'");
        $this->pr($_REQUEST);
        // $this->m->query($sql);
        // $_SESSION['msg'] = "Sales Updated Successfully.";
        // $this->redirect("index.php?module=sales&func=listing");
    }
    function edit() {
        $hid = $_SESSION['id_user'];
        $sql = "SELECT id_taxmaster, name FROM {$this->prefix}taxmaster ORDER BY tax_per";
        $this->sm->assign("tax", $this->m->sql_getall($sql, 2, "name", "id_taxmaster"));
        $sql = "SELECT id_taxmaster, tax_per FROM {$this->prefix}taxmaster ORDER BY tax_per";
        $this->sm->assign("taxrates", json_encode($this->m->sql_getall($sql, 2, "tax_per", "id_taxmaster")));

        $sql = "SELECT id, name FROM {$this->prefix}partner_sale_prefix WHERE id_head='$hid' ORDER BY name";
        $this->sm->assign("series", $this->m->sql_getall($sql, 2, "name", "id"));
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
        $sql = $this->create_select("{$this->prefix}partner_sale", "id_partner_sale='$id' AND id_head='$hid'");
        $data = $this->m->fetch_assoc($sql);
        $this->sm->assign("data", $data);
    }
    function delete() {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
        if ($id) {
            $sql = "DELETE FROM {$this->prefix}partner_sale WHERE id_partner_sale='{$id}'";
            $this->m->query($sql);
            $sql = "DELETE FROM {$this->prefix}partner_stock WHERE id_partner_sale='{$id}'";
            $this->m->query($sql);
            $_SESSION['msg'] = "Sales Deleted Successfully.";
        } else {
            $_SESSION['msg'] = "Sales bill not found. Deleted not possible.";
        }
        $this->redirect("index.php?module=sales&func=listing");
    }
    function listing() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");
        $id = $_SESSION['id_user'];
        $sql = "SELECT s.*, p.name FROM {$this->prefix}partner_sale s LEFT JOIN {$this->prefix}partner_party p ON s.id_party=p.id_party 
                WHERE s.id_head='$id' AND date>='$sdate' AND date<='$edate' ORDER BY date, invno";
        $list = $this->m->getall($this->m->query($sql));
        $this->sm->assign("data", $list);
    }
    function printbill() {
        $id = $_REQUEST['id'];
        $sql = "SELECT s.*, h.* FROM {$this->prefix}partner_sale s
                LEFT JOIN {$this->prefix}partner_party h ON s.id_party=h.id_party
                WHERE s.id_partner_sale IN ($id) GROUP BY s.id_partner_sale ";
        $res1 = $this->m->sql_getall($sql);
        foreach ($res1 as $key => $val) {
            $res1[$key]['w'] = $this->convert_number(round($val['total']));
        }
        $this->sm->assign("sale", $res1);
        $sql = "SELECT s.*, p.name AS item, p.hsncode, p.case, p.pack, p.unit FROM {$this->prefix}saledetail s, {$this->prefix}product p WHERE s.id_product=p.id_product AND s.id_sale IN ($id)";
        $res = $this->m->sql_getall($sql, 1, "", "id_sale", "id_saledetail");
        $this->sm->assign("saledetail", $res);
        $sql = "SELECT id_taxmaster AS id, name FROM {$this->prefix}taxmaster";
        $this->sm->assign("tax", $this->m->sql_getall($sql, 2, "name", "id"));
    }
    function getsuffix() {
        $sdate = $_SESSION['start_date'];
        $edate = $_SESSION['end_date'];
        $series = @$_REQUEST['series'];
        if ($series) {
            $pos = strlen($series) + 1;
            $sql = "SELECT MAX(CAST(substring(invno, {$pos}) as decimal(11))) AS maxid FROM {$this->prefix}partner_sale WHERE invno LIKE '$series%' AND date>='$sdate' AND date<='$edate'";
            $pstr = $series;
        } else {
            $sql = "SELECT MAX(CAST(SUBSTRING(invno, 2) AS UNSIGNED)) AS maxid FROM {$this->prefix}partner_sale WHERE date>='$sdate' AND date<='$edate'";
            $pstr = "T";
        }
        $data = $this->m->fetch_assoc($sql);
        echo $pstr . ($data['maxid'] + 1);
        exit;
    }
    function check() {
        $invno = trim($_REQUEST['invno']);
        $sdate = $_SESSION['start_date'];
        $edate = $_SESSION['end_date'];
        $sql = $this->create_select("{$this->prefix}partner_sale", "invno='$invno' AND `date`>='$sdate' AND `date`<='$edate'");
        $num = $this->m->num_rows($this->m->query($sql));
        echo ($invno=="") ? 1 : $num;
        exit;
    }
    function checkbillno() {
        ob_clean();
        $hid = $_SESSION['id_user'];
        $invno = $_REQUEST['invno'];
        $sdate = $_SESSION['sdate'];
        $edate = $_SESSION['edate'];
        $sql = "SELECT COUNT(*) AS cnt FROM {$this->prefix}partner_sale WHERE invno='$invno' AND id_head='$hid' AND date>='$sdate' AND date<='$edate'";
        $data = $this->m->fetch_assoc($sql);
        if ($data['cnt']>0) {
            $this->getsuffix();
        } else {
            echo "";
        }
        exit;
    }
    function showparty() {
        $hid = $_SESSION['id_user'];
        $filt = isset($_REQUEST['filter']) ? $_REQUEST['filter'] : "";
        $sql = "SELECT name as `value`, id_party AS col0, address1 AS col1, address2 AS col2, gstin AS col3
            FROM {$this->prefix}partner_party WHERE name LIKE '%{$filt}%' AND status=0 AND id_head='$hid' ORDER BY name"; 
        $data = $this->m->sql_getall($sql);
        echo json_encode($data);
        exit;
    }
    function showproduct() {
        $hid = $_SESSION['id_user'];
        $filt = isset($_REQUEST['filter']) ? $_REQUEST['filter'] : "";
        $sql = "SELECT p.name as `value`, p.id_product AS col0, p.distributor_price AS col1, t.tax_per AS col2, p.id_taxmaster_sale AS col3, p.cess AS col4
            FROM {$this->prefix}product p, {$this->prefix}taxmaster t, {$this->prefix}saledetail s 
            WHERE p.name LIKE '%$filt%' AND p.id_taxmaster_sale=t.id_taxmaster AND p.id_product=s.id_product AND s.id_head=$hid AND p.showtoparty='YES'
        GROUP BY p.id_product ORDER BY p.name";
        $data = $this->m->sql_getall($sql);
        echo json_encode($data);
        exit;
    }
}
?>