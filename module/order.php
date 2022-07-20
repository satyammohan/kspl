<?php
class order extends common {
    function __construct() {
        $this->checklogin();
        $this->table_prefix();
        parent:: __construct();
    }
    function booking() {
        $bar = @$_REQUEST['barcode'];
        if ($bar) {
            $sql = $this->create_select("{$this->prefix}product", "code='$bar'");
            $res =  $this->m->getall($this->m->query($sql));
            $this->sm->assign("product", $res[0]);

            $id_brand = $res[0]['id_brand'];
            $sql = $this->create_select("{$this->prefix}brand", "id_brand='$id_brand'");
            $r =  $this->m->getall($this->m->query($sql));
            $size = $r[0]['size'];
            $s = explode(",", $size);
            
            $this->sm->assign("size", $s);
        }
    }
    function savebooking() {
        $data = $_REQUEST['c'];
        $sql = $this->create_update("{$this->prefix}partner", $data, "id_partner='{$_REQUEST['id']}'");
        $res = $this->m->query($sql);
        $_SESSION['msg'] = "Record Successfully Updated";
        $this->redirect("index.php?module=partner&func=listing");
    }
    function barcode() {
        $f = $_REQUEST['filter'];
        $sql = "SELECT id_product AS id, code AS value FROM {$this->prefix}product WHERE code like '%$f%' ORDER BY code LIMIT 10";
        $head = $this->m->getall($this->m->query($sql));
        ob_clean();
        echo json_encode($head, true);
        exit;
    }
}
?>