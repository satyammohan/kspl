<?php
class sreport extends common {

    function __construct() {
        $this->checklogin();
        $this->table_prefix();
        parent:: __construct();
    }
    function _default() {
    }
    function register() {
        //od22__partner_stock
        $id = $_SESSION['id_user'];
        $wcond = " AND s.id_head = '$id' ";
        $_REQUEST['option'] = isset($_REQUEST['option']) ? $_REQUEST['option'] : '1';
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");
        switch ($_REQUEST['option']) {
            case 1:
                if (isset($_REQUEST['itemdetails'])) {
                    $sql_detail = "SELECT s.*, p.name FROM `{$this->prefix}partner_stock` s, `{$this->prefix}product` p
                        WHERE s.id_product=p.id_product AND `date` >= '$sdate' AND `date` <= '$edate' {$wcond} ORDER BY date, invno LIMIT 2000";
                    $detail = $this->m->sql_getall($sql_detail, 1, "", "id_partner_sale", "id_partner_stock");
                    $this->sm->assign("detail", $detail);
                }
                $sql = "SELECT s.*, p.name, p.address1 FROM `{$this->prefix}partner_sale` s, `{$this->prefix}partner_party` p 
                WHERE s.id_party=p.id_party AND s.date>='$sdate' AND date<='$edate' {$wcond} ORDER BY date";
                break;
            case 2:
                $sql = "SELECT `date`, SUM(totalamt-discount) AS totalamt, SUM(gst) AS gst, SUM(totalcess) AS totalcess, SUM(`total`) AS `total`, COUNT(IF(cash=2,1,NULL)) AS cashbills, COUNT(IF(cash=1,1,NULL)) AS creditbills , SUM(IF(cash=2,total,0.00)) AS cashtotal, SUM(IF(cash=1,total,0.00)) AS credittotal FROM `{$this->prefix}partner_sale` s WHERE `date` >= '$sdate' AND `date` <= '$edate' {$wcond} GROUP BY `date` ORDER BY `date`";
                break;
            case 3:
                $sql = "SELECT MONTHNAME(`date`) AS month, MONTH(`date`) AS m, YEAR(`date`) AS year, 
                    0 AS igst, SUM(gst/2) AS cgst, SUM(gst/2) AS sgst,
                    SUM(gst) AS gst, SUM(`total`) AS `total`, SUM(`totalamt`-s.discount) AS `totalamt`,
                    SUM(`totalcess`) AS `totalcess`, SUM(`tcsamt`) AS `tcs`, SUM(`round`) AS `other`,
                    count(*) AS billn FROM `{$this->prefix}partner_sale` s LEFT JOIN `{$this->prefix}partner_party` h ON h.id_party=s.id_party
                    WHERE `date` >= '$sdate' AND `date` <= '$edate' {$wcond} GROUP BY MONTH(`date`), YEAR(`date`) ORDER BY 3,2";
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
                $sql = "SELECT sd.*, p.name FROM `{$this->prefix}partner_stock` sd, `{$this->prefix}product` p WHERE `date` >= '$sdate' AND `date` <= '$edate' AND sd.id_product=p.id_product {$wcond} ORDER BY p.name, date";
                break;
            case 2:
                $sql = "SELECT p.name, sd.id_product, SUM(sd.qty) AS qty, SUM(sd.free) AS free, SUM(sd.tax_amount) AS tax_amount, SUM(sd.cessamt) AS cessamt, SUM(sd.net_amount) AS net_amount FROM `{$this->prefix}partner_stock` sd, `{$this->prefix}product` p WHERE `date` >= '$sdate' AND `date` <= '$edate' AND sd.id_product=p.id_product {$wcond} GROUP BY p.id_product ORDER BY p.name, date";
                break;
        }
        $res = $this->m->sql_getall($sql);
        $this->sm->assign("data", $res);
    }
    function hsn() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");
        $_REQUEST['option'] = isset($_REQUEST['option']) ? $_REQUEST['option'] : '1';
        $wcond = " (`date` >= '$sdate' AND `date` <= '$edate') ";
        $sql = $this->hsnquery('partner_stock', $wcond);
        if ($_REQUEST['option']==4 || $_REQUEST['option']==2) {
            $res = $this->executesql($sql);
        } else {
            if ($_REQUEST['option']==3) {
                $res = $this->executesqltaxgroup($sql);
            } else {
                $res = $this->executesqlnogroup($sql);
            }
        }
        $this->sm->assign("data", $res);
    }
    function executesqltaxgroup($sql) {
        $rs = $this->m->query($sql);
        $res = array();
	    while ($r = mysqli_fetch_assoc($rs)) {
            $sgst = $cgst = $igst = 0;
            if ($r['local']) {
                $igst = $r['tax_amount'];
            } else {
                $cgst = $sgst = $r['tax_amount']/2;
            }
            $k = $r['hsncode'].$r['taxname'];
            @$res[$k]['hsncode'] = $r['hsncode'];
            @$res[$k]['taxname'] = $r['taxname'];
            @$res[$k]['name'] = $r['name'];
            @$res[$k]['unit'] = $r['unit'];
            @$res[$k]['qty'] += $r['qty'];
            @$res[$k]['amount'] += $r['amount'];
            @$res[$k]['goods_amount'] += $r['goods_amount'];
            @$res[$k]['cessamt'] += $r['cessamt'];
            @$res[$k]['igst'] += $igst;
            @$res[$k]['sgst'] += $sgst;
            @$res[$k]['cgst'] += $cgst;
        }
        return $res;
    }
    function executesqlnogroup($sql) {
        $res = array();
        $rs = $this->m->query($sql);
	    while ($r = mysqli_fetch_assoc($rs)) {
            $sgst = $cgst = $igst = 0;
            if ($r['local']) {
                $r['igst'] = $r['tax_amount'];
            } else {
                $r['cgst'] = $r['sgst'] = $r['tax_amount']/2;
            }
            @$res[] = $r;
        }
        return $res;
    }
    function hsnquery($file, $wcond, $type=1) {
        $field = "h.local, p.name, p.unit, SUM($type*qty) AS qty, SUM($type*net_amount) AS amount, SUM($type*goods_amount) AS goods_amount, SUM($type*tax_amount) AS tax_amount, SUM($type*cessamt) AS cessamt";
        switch ($_REQUEST['option']) {
        case 1:
            $sql = "SELECT p.hsncode, $field
                FROM `{$this->prefix}product` p, `{$this->prefix}{$file}` s LEFT JOIN `{$this->prefix}head` h ON h.id_head=s.id_head 
                WHERE $wcond AND s.id_product=p.id_product GROUP BY 1, 2, 3 ORDER BY 1, 2 ";
	    break;
        case 2:
            $sql = "SELECT p.hsncode, $field
                FROM `{$this->prefix}product` p, `{$this->prefix}{$file}` s LEFT JOIN `{$this->prefix}head` h ON h.id_head=s.id_head 
                WHERE $wcond AND s.id_product=p.id_product GROUP BY 1, 2 ORDER BY 1, 2 ";
	    break;
        case 3:
            $sql = "SELECT hsncode AS hsncode, $field, t.name AS taxname
                FROM `{$this->prefix}product` p, `{$this->prefix}taxmaster` t, `{$this->prefix}{$file}` s LEFT JOIN `{$this->prefix}head` h ON h.id_head=s.id_head 
                WHERE $wcond AND s.id_product=p.id_product AND s.id_taxmaster=t.id_taxmaster
				GROUP BY 1, 2, s.id_taxmaster ORDER BY 1, 2 ";
	    break;
        case 4:
            $sql = "SELECT LEFT(p.hsncode,4) AS hsncode, $field
                FROM `{$this->prefix}product` p, `{$this->prefix}{$file}` s LEFT JOIN `{$this->prefix}head` h ON h.id_head=s.id_head 
                WHERE $wcond AND s.id_product=p.id_product GROUP BY 1, 2 ORDER BY 1, 2 ";
	    break;
        case 5:
            $sql = "SELECT LEFT(p.hsncode,6) AS hsncode, $field
                FROM `{$this->prefix}product` p, `{$this->prefix}{$file}` s LEFT JOIN `{$this->prefix}head` h ON h.id_head=s.id_head 
                WHERE $wcond AND s.id_product=p.id_product GROUP BY 1, 2 ORDER BY 1, 2 ";
        }
        return $sql;
    }
}
?>