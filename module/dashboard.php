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
        $this->saveactivity("Dashboard.");
        $id = $_SESSION['id_user'];
        $sdate = $_SESSION['start_date'];
        $edate = $_SESSION['end_date'];
        $sql = "SELECT MONTHNAME(date) AS month, YEAR(date) AS year, MONTH(date) as m, SUM(total) AS total FROM {$this->prefix}sale WHERE id_head='$id' AND date BETWEEN '$sdate' AND '$edate' GROUP BY 1,2 ORDER BY 2,3";
        $this->sm->assign("purc", $this->m->getall($this->m->query($sql)));

        $sql = "SELECT MONTHNAME(date) AS month, YEAR(date) AS year, MONTH(date) as m, SUM(total) AS total FROM {$this->prefix}partner_sale WHERE id_head='$id' AND date BETWEEN '$sdate' AND '$edate' GROUP BY 1,2 ORDER BY 2,3";
        $sale = $this->m->getall($this->m->query($sql));
        $this->sm->assign("sale", $sale);

        $sql = "SELECT month, year, m, SUM(purcqty) AS purcqty, SUM(saleqty) AS saleqty FROM (SELECT MONTHNAME(date) AS month, YEAR(date) AS year, MONTH(date) as m, SUM(qty+free) AS purcqty, 0 AS saleqty FROM {$this->prefix}saledetail WHERE id_head='$id' AND date BETWEEN '$sdate' AND '$edate' GROUP BY 1,2 
        UNION ALL 
        SELECT MONTHNAME(date) AS month, YEAR(date) AS year, MONTH(date) as m, 0 AS purcqty, SUM(qty) AS saleqty FROM {$this->prefix}partner_stock WHERE id_head='$id' AND date BETWEEN '$sdate' AND '$edate' GROUP BY 1,2) a GROUP BY 1,2 ORDER BY 2,3";
        $p = $this->m->getall($this->m->query($sql));
        $this->sm->assign("qty", $p);
    }
}
?>