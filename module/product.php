<?php
class product extends common {

    function __construct() {
        $this->checklogin();
        $this->table_prefix();
        parent:: __construct();
    }
    function _default() {
    }
    function listing() {
        $this->saveactivity("Product Listing.");
        $id = $_SESSION['id_user'];
        $sql = "SELECT c.name AS cname, t.name AS tname, p.* 
            FROM {$this->prefix}company c, {$this->prefix}product p LEFT JOIN {$this->prefix}taxmaster t ON p.id_taxmaster_sale=t.id_taxmaster
            WHERE c.id_company=p.id_company AND p.showtoparty='YES' ORDER BY c.name, p.name";
        $product = $this->m->getall($this->m->query($sql));
        $this->sm->assign("list", $product);
    }
}
?>