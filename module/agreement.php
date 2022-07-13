<?php
class agreement extends common {
    function __construct() {
        $this->checklogin();
        $this->table_prefix();
        parent:: __construct();
    }
    function insert() {
        $data = $_REQUEST['agreement'];
        $data['id_modify'] = $data['id_create'] = $_SESSION['id_user'];
        $data['ip'] = $_SERVER['REMOTE_ADDR'];
        $data['status'] = 1;
        $data['modify_date'] = date('Y-m-d');
        $sql = $this->create_insert("{$this->prefix}agreement", $data);
        $this->m->query($sql);
        $_SESSION['msg'] = "Record Successfully Inserted";
        $this->redirect("index.php?module=agreement&func=listing");
    }
    function update() {
        $data = $_REQUEST['agreement'];
        $data['id_modify'] = $_SESSION['id_user'];
        $data['modify_date'] = date('Y-m-d');
        $sql = $this->create_update("{$this->prefix}agreement", $data, "id_agreement='{$_REQUEST['id']}'");
        $this->m->query($sql);
        $_SESSION['msg'] = "Record Successfully Updated";
        $this->redirect("index.php?module=agreement&func=listing");
    }
    function edit() {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
        $sql = $this->create_select("{$this->prefix}agreement", "id_agreement='{$id}'");
        $data = $this->m->fetch_assoc($sql);
        $this->sm->assign("data", $data);
    }
    function delete() {
        $_SESSION['msg'] = "For Security Reasons this optio n is Disabled";
        $this->redirect("index.php?module=agreement&func=listing");
    }
    function listing() {
        $sql = "SELECT * FROM {$this->prefix}agreement";
        $profile = $this->m->getall($this->m->query($sql));
        $this->sm->assign("agreement", $profile);
    }
}
?>