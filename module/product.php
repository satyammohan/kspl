<?php
class product extends common {
    function __construct() {
        $this->checklogin();
        $this->table_prefix();
        parent:: __construct();
    }
    function insert() {
        $this->get_permission("product", "INSERT");
        $data = $_REQUEST['product'];
        $data['status'] = 0;
        $data['id_create'] = $_SESSION['id_user'];
        $data['id_modify'] = $_SESSION['id_user'];
        $data['create_date'] = date("Y-m-d h:i:s");
        $data['ip'] = $_SERVER['REMOTE_ADDR'];
        $data['name'] = addslashes($data['name']);
        $sql = $this->create_insert("{$this->prefix}product", $data);
        $res = $this->m->query($sql);
        $_SESSION['msg'] = "Record Successfully Inserted";
        $this->redirect("index.php?module=product&func=listing");
    }
    function edit() {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
        if ($id == "0")
            $this->get_permission("product", "INSERT");
        else
            $this->get_permission("product", "UPDATE");
        $data = $this->m->fetch_assoc($this->create_select("{$this->prefix}product", "id_product='{$id}'"));
        $this->sm->assign("data", $data);
        $this->sm->assign("page", "product/add.tpl.html");
    }
    function update() {
        $this->get_permission("product", "UPDATE");
        $data = $_REQUEST['product'];
        $data['name'] =  addslashes($data['name']);
        $sql = $this->create_update("{$this->prefix}product", $data, "id_product='{$_REQUEST['id']}'");
        $res = $this->m->query($sql);
        $_SESSION['msg'] = "Record Successfully Updated";
        $this->redirect("index.php?module=product&func=listing");
    }
    function delete() {
        $this->get_permission("product", "DELETE");
        $sql = $this->create_delete("{$this->prefix}product", "id_product='{$_REQUEST['id']}'");
        //$this->m->query($sql);
        $_SESSION['msg'] = "Record Successfully Deleted";
        $this->redirect("index.php?module=product&func=listing");
    }
    function listing() {
        $this->get_permission("product", "REPORT");
        $sql = "SELECT * FROM {$this->prefix}product ORDER BY name";
        $profile = $this->m->getall($this->m->query($sql));
        $this->sm->assign("product", $profile);
    }
}
?>