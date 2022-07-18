<?php
class order extends common {
    function __construct() {
        $this->checklogin();
        $this->table_prefix();
        parent:: __construct();
    }
    function booking() {
        
    }
    function savebooking() {
        $data = $_REQUEST['c'];
        $sql = $this->create_update("{$this->prefix}partner", $data, "id_partner='{$_REQUEST['id']}'");
        $res = $this->m->query($sql);
        $_SESSION['msg'] = "Record Successfully Updated";
        $this->redirect("index.php?module=partner&func=listing");
    }
}
?>