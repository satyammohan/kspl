<?php
class preport extends common {

    function __construct() {
        $this->checklogin();
        $this->table_prefix();
        parent:: __construct();
    }
    function _default() {
    }
    function register() {
        $id = $_SESSION['id_user'];
        $wcond = " AND s.id_head = '$id' ";
        $_REQUEST['option'] = isset($_REQUEST['option']) ? $_REQUEST['option'] : '1';
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");
        switch ($_REQUEST['option']) {
            case 2:
                $sql = "SELECT `date`, SUM(totalamt-discount) AS totalamt, SUM(vat) AS vat, SUM(totalcess) AS totalcess, SUM(`total`) AS `total`, COUNT(IF(cash=2,1,NULL)) AS cashbills, COUNT(IF(cash=1,1,NULL)) AS creditbills , SUM(IF(cash=2,total,0.00)) AS cashtotal, SUM(IF(cash=1,total,0.00)) AS credittotal FROM `{$this->prefix}sale` s WHERE `date` >= '$sdate' AND `date` <= '$edate' {$wcond} GROUP BY `date` ORDER BY `date`";
                break;
            case 3:
                $sql = "SELECT MONTHNAME(`date`) AS month, MONTH(`date`) AS m, YEAR(`date`) AS year, 
                    SUM(IF(!h.local, 0, 1)*vat) AS igst, SUM(IF(!h.local, 1, 0)*(vat/2)) AS cgst, SUM(IF(!h.local, 1, 0)*(vat/2)) AS sgst,
                    SUM(vat) AS vat, SUM(`total`) AS `total`, SUM(`totalamt`-s.discount) AS `totalamt`,
                    SUM(`totalcess`) AS `totalcess`, SUM(`tcsamt`) AS `tcs`, SUM(`add`+`less`+`round`+`packing`) AS `other`,
                    count(*) AS billn FROM `{$this->prefix}sale` s LEFT JOIN `{$this->prefix}head` h ON h.id_head=s.id_head
                    WHERE `date` >= '$sdate' AND `date` <= '$edate' {$wcond} GROUP BY MONTH(`date`), YEAR(`date`) ORDER BY 3,2";
                break;
            case 1:
                if (isset($_REQUEST['itemdetails'])) {
                    $sql_detail = "SELECT s.*, p.name FROM `{$this->prefix}saledetail` s, `{$this->prefix}product` p
                        WHERE s.id_product=p.id_product AND `date` >= '$sdate' AND `date` <= '$edate' {$wcond} ORDER BY date, invno LIMIT 2000";
                    $detail = $this->m->sql_getall($sql_detail, 1, "", "id_sale", "id_saledetail");
                    $this->sm->assign("detail", $detail);
                }
                $sql = "SELECT s.*, CAST(SUBSTRING(invno, POSITION('/' IN invno)+1) AS signed) AS myno, SUBSTRING(invno, 1, POSITION('/' IN invno)-1) AS pref, h.gstin, h.local FROM `{$this->prefix}sale` s LEFT JOIN `{$this->prefix}head` h ON s.id_head=h.id_head  WHERE `date` >= '$sdate' AND `date` <= '$edate' {$wcond} ORDER BY `date`, pref, myno, invno";
                break;
        }
        $res = $this->m->sql_getall($sql);
        $this->sm->assign("data", $res);
    }
    function item() {
        $id = $_SESSION['id_user'];
        $wcond = " AND sd.id_head = '$id' ";
        $_REQUEST['option'] = isset($_REQUEST['option']) ? $_REQUEST['option'] : '1';
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");
        switch ($_REQUEST['option']) {
            case 1:
                $sql = "SELECT sd.invno, sd.date, sd.id_product, sd.qty, sd.free, sd.rate, sd.net_amount, sd.tax_amount, sd.cessamt, p.name FROM `{$this->prefix}saledetail` sd, `{$this->prefix}product` p WHERE `date` >= '$sdate' AND `date` <= '$edate' AND sd.id_product=p.id_product {$wcond} ORDER BY p.name, date, invno";
                break;
            case 2:
                $sql = "SELECT p.name, sd.id_product, SUM(sd.qty) AS qty, SUM(sd.free) AS free, SUM(sd.net_amount) AS net_amount, SUM(sd.tax_amount) AS tax_amount, SUM(sd.cessamt) AS cessamt FROM `{$this->prefix}saledetail` sd, `{$this->prefix}product` p WHERE `date` >= '$sdate' AND `date` <= '$edate' AND sd.id_product=p.id_product {$wcond} GROUP BY p.id_product ORDER BY p.name, date, invno";
                break;
        }
        $res = $this->m->sql_getall($sql);
        $this->sm->assign("data", $res);
    }
}
?>