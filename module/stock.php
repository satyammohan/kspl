<?php
class stock extends common {

    function __construct() {
        $this->checklogin();
        $this->table_prefix();
        parent:: __construct();
    }
    function _default() {
    }

    function statement() {
        $id = $_SESSION['id_user'];
        $this->saveactivity("Stock Statement.");
        $wcond = " AND s.id_head = '$id' ";
        $_REQUEST['option'] = isset($_REQUEST['option']) ? $_REQUEST['option'] : '1';
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");

        $sql = "SELECT a.id_product, SUM(a.qty) AS qty FROM (SELECT id_product, SUM(qty+free) AS qty FROM {$this->prefix}saledetail WHERE id_head='{$id}' AND date<'$sdate' GROUP BY 1 UNION ALL
                SELECT id_product, SUM(-qty-free) AS qty FROM {$this->prefix}partner_stock WHERE id_head='{$id}' AND date<'$sdate' GROUP BY 1) a GROUP BY 1";
        $open = $this->m->getall($this->m->query($sql), 2, "qty", "id_product");
        $sql = "SELECT id_product, SUM(qty+free) AS qty FROM {$this->prefix}saledetail WHERE id_head='{$id}' AND date>='$sdate' AND date<='$edate' GROUP BY 1";
        $purc = $this->m->getall($this->m->query($sql), 2, "qty", "id_product");
        $sql = "SELECT id_product, SUM(qty+free) AS qty FROM {$this->prefix}partner_stock WHERE id_head='{$id}' AND date>='$sdate' AND date<='$edate' GROUP BY 1";
        $sale = $this->m->getall($this->m->query($sql), 2, "qty", "id_product");
        $sql = "SELECT p.*, c.name AS cname FROM {$this->prefix}product p, {$this->prefix}company c WHERE p.id_company=c.id_company ORDER BY c.name, p.name";
        $items = $this->m->sql_getall($sql);
        foreach ($items as $ck => $cv) {
            $k = $cv['id_product'];
            $items[$ck]['o'] = @$open[$k] ? $open[$k] : 0;
            $items[$ck]['s'] = @$sale[$k] ? $sale[$k] : 0;
            $items[$ck]['p'] = @$purc[$k] ? $purc[$k] : 0;
            $items[$ck]['c'] = $items[$ck]['o'] + $items[$ck]['p'] - $items[$ck]['s'];
            if (@$open[$k]==0 && @$sale[$k]==0 && @$purc[$k]==0) {
                unset($items[$ck]);
            }
        }
        $this->sm->assign("list", $items);
    }

    function register() {
        $id = $_SESSION['id_user'];
        $this->saveactivity("Stock Register.");
        $wcond = " AND s.id_head = '$id' ";
        $_REQUEST['option'] = isset($_REQUEST['option']) ? $_REQUEST['option'] : '1';
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");

        $sql = "SELECT a.id_product, SUM(a.qty) AS qty FROM (SELECT id_product, SUM(qty+free) AS qty FROM {$this->prefix}saledetail WHERE id_head='{$id}' AND date<'$sdate' GROUP BY 1 UNION ALL
                SELECT id_product, SUM(-qty-free) AS qty FROM {$this->prefix}partner_stock WHERE id_head='{$id}' AND date<'$sdate' GROUP BY 1) a GROUP BY 1";
        $open = $this->m->getall($this->m->query($sql), 2, "qty", "id_product");
        
        $sql = "SELECT date, id_product, 'Purchase' AS particulars, 'Purchase' AS type, invno AS refno, qty+free AS purc, 0 AS sale FROM {$this->prefix}saledetail WHERE id_head='{$id}' AND date>='$sdate' AND date<='$edate' UNION ALL SELECT date, id_product, concat('Sales ', IF(bill_no IS NULL, '', bill_no)) AS particulars, 'Sales' AS type, invno AS refno, 0 AS purc, qty+free AS sale FROM {$this->prefix}partner_stock WHERE id_head='{$id}' AND date>='$sdate' AND date<='$edate' ORDER BY 1";
        $trans = array();
        $rs = $this->m->query($sql);
        while ($row = $this->m->movenexta($rs)) {
            $id = $row['id_product'];
            $trans[$id][] = $row;
        }
        $this->sm->assign("trans", $trans);
        
        $sql = "SELECT p.*, c.name AS cname FROM {$this->prefix}product p, {$this->prefix}company c WHERE p.id_company=c.id_company ORDER BY c.name, p.name";
        $items = $this->m->getall($this->m->query($sql));
        foreach ($items as $ck => $cv) {
            $k = $cv['id_product'];
            $items[$ck]['open'] = @$open[$k] ? $open[$k] : 0;
        }
        $this->sm->assign("list", $items);
    }
}
?>