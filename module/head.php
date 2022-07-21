<?php
class head extends common {
    function __construct() {
        $this->checklogin();
        $this->table_prefix();
        parent:: __construct();
    }
    function insert() {
        $this->get_permission("head", "INSERT");
        $data = $_REQUEST['head'];
        $data['status'] = 0;
        $data['id_create'] = $_SESSION['id_user'];
        $data['id_modify'] = $_SESSION['id_user'];
        $data['create_date'] = date("Y-m-d h:i:s");
        $data['ip'] = $_SERVER['REMOTE_ADDR'];
        $data['name'] = addslashes($data['name']);
        $sql = $this->create_insert("{$this->prefix}head", $data);
        $res = $this->m->query($sql);
        $_SESSION['msg'] = "Record Successfully Inserted";
        $this->redirect("index.php?module=head&func=listing");
    }
    function edit() {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
        if ($id == "0")
            $this->get_permission("head", "INSERT");
        else
            $this->get_permission("head", "UPDATE");
        $data = $this->m->fetch_assoc($this->create_select("{$this->prefix}head", "id_head='{$id}'"));
        $this->sm->assign("data", $data);
        $this->sm->assign("page", "head/add.tpl.html");
    }
    function update() {
        $this->get_permission("head", "UPDATE");
        $data = $_REQUEST['head'];
        $data['name'] =  addslashes($data['name']);
        $sql = $this->create_update("{$this->prefix}head", $data, "id_head='{$_REQUEST['id']}'");
        $res = $this->m->query($sql);
        $_SESSION['msg'] = "Record Successfully Updated";
        $this->redirect("index.php?module=head&func=listing");
    }
    function delete() {
        $this->get_permission("head", "DELETE");
        $sql = $this->create_delete("{$this->prefix}head", "id_head='{$_REQUEST['id']}'");
        $this->m->query($sql);
        $_SESSION['msg'] = "Record Successfully Deleted";
        $this->redirect("index.php?module=head&func=listing");
    }
    function listing() {
        $this->get_permission("head", "REPORT");
        $sql = "SELECT h.*  FROM {$this->prefix}head h ORDER BY name";
        $profile = $this->m->getall($this->m->query($sql));
        $this->sm->assign("head", $profile);
    }
    function getparty() {
        $f = $_REQUEST['filter'];
        $sql = "SELECT id_head AS id, concat(name, ', ', town) AS value, zone, town  FROM {$this->prefix}head WHERE NAME like '$f%' ORDER BY name LIMIT 10";
        $head = $this->m->getall($this->m->query($sql));
        ob_clean();
        echo json_encode($head, true);
        exit;
    }
}
?>