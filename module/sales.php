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
        $sql = $this->create_update("{$this->prefix}partner_sale", $data, "id_partner_sale='{$id}'");
        $this->m->query($sql);
        $_SESSION['msg'] = "Sales Deleted Successfully.";
        $this->redirect("index.php?module=sales&func=listing");
    }
    function listing() {
        $id = $_SESSION['id_user'];
        $sql = "SELECT s.*, p.name FROM {$this->prefix}partner_sale s LEFT JOIN {$this->prefix}partner_party p ON s.id_party=p.id_party WHERE s.id_head='$id' ORDER BY 1";
        $list = $this->m->getall($this->m->query($sql));
        $this->sm->assign("data", $list);
    }
}
?>