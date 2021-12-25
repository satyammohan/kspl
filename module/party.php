<?php
class party extends common {
    function __construct() {
        $this->checklogin();
        $this->table_prefix();
        parent:: __construct();
    }
    function insert() {
        $data = $_REQUEST['entry'];
        $data['id_head'] = $_SESSION['id_user'];
        $data['status'] = 0;
        $data['ip'] = $_SERVER['REMOTE_ADDR'];
        $data['opening_balance'] = $data['opening_balance'] ? $data['opening_balance'] : 0;
        $data['id_create'] = $_SESSION['id_user'];
        $data['id_modify'] = $_SESSION['id_user'];
        $data['create_date'] = date("Y-m-d h:i:s");
        $sql = $this->create_insert("{$this->prefix}partner_party", $data);
        $this->m->query($sql);
        $_SESSION['msg'] = "Party Added Successfully.";
        $this->redirect("index.php?module=party&func=listing");
    }
    function update() {
        $data = $_REQUEST['entry'];
        $data['id_head'] = $_SESSION['id_user'];
        $data['opening_balance'] = $data['opening_balance'] ? $data['opening_balance'] : 0;
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
        $sql = $this->create_update("{$this->prefix}partner_party", $data, "id_party='{$id}'");
        $this->m->query($sql);
        $_SESSION['msg'] = "Party Updated Successfully.";
        $this->redirect("index.php?module=rooms&func=listing");
    }
    function edit() {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
        $sql = $this->create_select("{$this->prefix}partner_party", "id_party='{$id}'");
        $data = $this->m->fetch_assoc($sql);
        $this->sm->assign("data", $data);
    }
    function delete() {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
        $data['status'] = 1;
        $sql = $this->create_update("{$this->prefix}partner_party", $data, "id_party='{$id}'");
        $this->m->query($sql);
        $_SESSION['msg'] = "Party Deleted Successfully.";
        $this->redirect("index.php?module=party&func=listing");
    }
    function listing() {
        $id = $_SESSION['id_user'];
        $sql = "SELECT * FROM {$this->prefix}partner_party WHERE id_head='$id' AND status=0 ORDER BY name";
        $list = $this->m->getall($this->m->query($sql));
        $this->sm->assign("list", $list);
    }
}
?>