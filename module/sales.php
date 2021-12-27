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
        $data['id_partner'] = $_SESSION['id_user'];
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
        $data['id_partner'] = $_SESSION['id_user'];
        $data['opening_balance'] = $data['opening_balance'] ? $data['opening_balance'] : 0;
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
        $sql = $this->create_update("{$this->prefix}partner_sale", $data, "id_party='{$id}'");
        $this->m->query($sql);
        $_SESSION['msg'] = "Sales Updated Successfully.";
        $this->redirect("index.php?module=sales&func=listing");
    }
    function edit() {
        $id = $_SESSION['id_user'];
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
        $sql = $this->create_select("{$this->prefix}partner_sale", "id_party='$id' AND id_partner='$id'");
        $data = $this->m->fetch_assoc($sql);
        $this->sm->assign("data", $data);
    }
    function delete() {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
        $sql = $this->create_update("{$this->prefix}partner_sale", $data, "id_party='{$id}'");
        $this->m->query($sql);
        $_SESSION['msg'] = "Sales Deleted Successfully.";
        $this->redirect("index.php?module=sales&func=listing");
    }
    function listing() {
        $id = $_SESSION['id_user'];
        $sql = "SELECT * FROM {$this->prefix}partner_sale WHERE id_partner='$id' ORDER BY 1";
        $list = $this->m->getall($this->m->query($sql));
        //$this->pr($list);
        $this->sm->assign("data", $list);
    }
}
?>