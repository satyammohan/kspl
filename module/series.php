<?php
class series extends common {
    function __construct() {
        $this->checklogin();
        $this->table_prefix();
        parent:: __construct();
    }
    function check() {
        $data = $_REQUEST['series'];
        $name = trim($data['name']);
        $sql = $this->create_select("{$this->prefix}series", "name='$name' AND id_series!='{$_REQUEST['id']}'");
        $data = $this->m->fetch_assoc($sql);
        echo json_encode($data ? false : true);
        exit;
    }
    function insert() {
        $data = $_REQUEST['series'];
        $data['id_head'] = $_SESSION['id_user'];
        $data['name'] = strtoupper($data['name']);
        $data['status'] = 0;
        $res = $this->m->query($this->create_insert("{$this->prefix}partner_sale_prefix", $data));
        $_SESSION['msg'] = "Sales Prefix Successfully Inserted";
        $this->redirect("index.php?module=series&func=listing");
    }
    function edit() {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
        $sql = $this->create_select("{$this->prefix}partner_sale_prefix", "id='$id'");
        $data = $this->m->fetch_assoc($sql);
        $this->sm->assign("data", $data);
    }
    function update() {
        $data = $_REQUEST['series'];
        $data['name'] = strtoupper($data['name']);
        $res = $this->m->query($this->create_update("{$this->prefix}partner_sale_prefix", $data, "id='{$_REQUEST['id']}'"));
        $_SESSION['msg'] = "Sales Prefix Successfully Updated";
        $this->redirect("index.php?module=series&func=listing");
    }

    function delete() {
        //$res = $this->m->query($this->create_delete("{$this->prefix}partner_sale_prefix", "id_series='{$_REQUEST['id']}'"));
        $_SESSION['msg'] = "For security reason, delete not possible.";
        $this->redirect("index.php?module=series&func=listing");
    }

    function listing() {
        $hid = $_SESSION['id_user'];
        if (!isset($_REQUEST['status'])) {
            $_REQUEST['status'] = 2;
        }
        $wcond = ($_REQUEST['status'] == 2) ? "" : " AND status = " . $_REQUEST['status'];
        $sql = "SELECT * FROM {$this->prefix}partner_sale_prefix WHERE id_head='$hid' $wcond";
        $list = $this->m->getall($this->m->query($sql));
        $this->sm->assign("series", $list);
    }
}
?>