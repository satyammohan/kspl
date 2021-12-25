<?php
class dashboard extends common {

    function __construct() {
        $this->checklogin();
        $this->table_prefix();
        parent:: __construct();
    }
    function _default() {
        echo 1;
    }
    function show() {
        $id = $_SESSION['id_user'];
        $sql = "SELECT MONTHNAME(date) AS month, YEAR(date) AS year, MONTH(date) as m, SUM(total) AS total FROM {$this->prefix}sale WHERE id_head='$id' GROUP BY 1,2,3 ORDER BY 2,3";
        $purc = $this->m->getall($this->m->query($sql));
        $this->sm->assign("purc", $purc);
    }
}
?>