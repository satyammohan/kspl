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
        $this->m->query($sql);
        $_SESSION['msg'] = "Sales Added Successfully.";
        $this->redirect("index.php?module=sales&func=listing");
    }
    function update() {
        $data = $_REQUEST['entry'];
        $data['id_head'] = $_SESSION['id_user'];
        $data['opening_balance'] = $data['opening_balance'] ? $data['opening_balance'] : 0;
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
        $sql = $this->create_update("{$this->prefix}partner_sale", $data, "id_partner_sale='{$id}' AND id_head='$hid'");
        $this->m->query($sql);
        $_SESSION['msg'] = "Sales Updated Successfully.";
        $this->redirect("index.php?module=sales&func=listing");
    }
    function edit() {
        $hid = $_SESSION['id_user'];
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
    function print() {
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
}
?>