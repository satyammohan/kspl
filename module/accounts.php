<?php
class accounts extends common {
    function __construct() {
        $this->checklogin();
        $this->table_prefix();
        parent:: __construct();
    }
    function _default() {
    }
    function listing() {
        $hid = $_SESSION['id_user'];
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");
        $wcond = " id_head='$hid' ";
        if (isset($_REQUEST['id_party']) && $_REQUEST['id_party'] != "") {
            $head = $_REQUEST['id_party'];
            $wcond .= " AND ( id_party_debit = $head  OR id_party_credit = $head ) ";
        }
        $sql = "SELECT * FROM {$this->prefix}partner_voucher WHERE (date >= '$sdate' AND date <= '$edate') AND $wcond ORDER BY date DESC ";
        $voucher = $this->m->sql_getall($sql);
        $this->sm->assign("voucher", $voucher);
        $sql="SELECT concat(name,' ',address1) AS name, id_party AS id FROM {$this->prefix}partner_party WHERE $wcond ORDER BY name";
        $head = $this->m->getall($this->m->query($sql), 2, "name", "id");
        $this->sm->assign("head", $head);
    }
    function edit() {
        $hid = $_SESSION['id_user'];
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
        if ($id) {
            $sql = "SELECT * FROM {$this->prefix}partner_voucher WHERE id_voucher='$id' AND id_head='$hid'";
            $data = $this->m->fetch_assoc($sql);
            $this->sm->assign("data", $data);
            $sql = "SELECT CONCAT(name, ' ', address1, ' ',address2) AS name, id_party AS id FROM {$this->prefix}partner_party WHERE id_party=" . $data['id_party_debit'] . " OR id_party=" . $data['id_party_credit'];
            $head = $this->m->sql_getall($sql, 2, "name", "id");
            $this->sm->assign("head", $head);
        }
        $sql = "SELECT MAX(CAST(no as decimal(11))) AS lastno FROM {$this->prefix}partner_voucher WHERE id_head='$hid'";
        $nextno = $this->m->fetch_assoc($sql);
        $this->sm->assign("nextno", $nextno['lastno']);
    }
    function delete() {
        $hid = $_SESSION['id_user'];
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
        $sql = "DELETE FROM {$this->prefix}partner_voucher WHERE id_head='$hid' AND id_voucher='$id'";
        $this->m->query($sql);
        $_SESSION['msg'] = "Voucher Deleted Successfully.";
        $this->redirect("index.php?module=accounts&func=listing");
    }
    function check() {
        $no = trim($_REQUEST['no']);
        $id_voucher = $_REQUEST['id_voucher'] ? $_REQUEST['id_voucher'] : 0;
        $sdate = $_SESSION['start_date'];
        $edate = $_SESSION['end_date'];
        $sql = $this->create_select("{$this->prefix}partner_voucher", "id_voucher!='$id_voucher' AND no='$no' AND date>='$sdate' AND date<='$edate'");
        $num = $this->m->num_rows($this->m->query($sql));
        ob_clean();
        echo $num;
        exit;
    }
    function showparty() {
        $hid = $_SESSION['id_user'];
        $filt = isset($_REQUEST['filter']) ? $_REQUEST['filter'] : "";
        $sql = "SELECT name as `value`, id_party AS col0
            FROM {$this->prefix}partner_party WHERE name LIKE '%{$filt}%' AND status=0 AND id_head='$hid' ORDER BY name"; 
        $data = $this->m->sql_getall($sql);
        echo json_encode($data);
        exit;
    }
    function insert() {
        $data = $_REQUEST['voucher'];
        $data['id_head'] = $_SESSION['id_user'];
        $data['ip'] = $_SERVER['REMOTE_ADDR'];
        $data['id_create'] = $_SESSION['id_user'];
        $data['id_modify'] = $_SESSION['id_user'];
        $data['create_date'] = date("Y-m-d h:i:s");
        $sql = $this->create_insert("{$this->prefix}partner_voucher", $data);
        $this->m->query($sql);
        $_SESSION['msg'] = "Voucher Added Successfully.";
        $this->redirect("index.php?module=accounts&func=listing");
    }
    function update() {
        $data = $_REQUEST['voucher'];
        $data['modify_date'] = date("Y-m-d h:i:s");
        $hid = $data['id_head'] = $_SESSION['id_user'];
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
        $sql = $this->create_update("{$this->prefix}partner_voucher", $data, "id_voucher='{$id}' AND id_head='$hid'");
        $this->m->query($sql);
        $_SESSION['msg'] = "Voucher Updated Successfully.";
        $this->redirect("index.php?module=accounts&func=listing");
    }
    function pledger() {
        $hid = $_SESSION['id_user'];
        $id_party = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");
        $sql = "SELECT id_party, name FROM {$this->prefix}partner_party WHERE id_head='$hid' ORDER BY name"; 
        $party = $this->m->getall($this->m->query($sql), 2, "name", "id_party");
        $this->sm->assign("party", $party);

        $sql = "SELECT SUM(total) AS total FROM (SELECT IF(otype=1,1,-1)*opening_balance AS total FROM {$this->prefix}partner_party WHERE id_party='$id_party' UNION ALL
            SELECT SUM(IF(id_party_debit='$id_party',-1,1)*total) AS total FROM {$this->prefix}partner_voucher WHERE date < '$sdate' AND id_head='$hid' AND (id_party_debit='$id_party' OR id_party_credit='$id_party') UNION ALL
            SELECT SUM(-total) AS total FROM {$this->prefix}partner_sale WHERE date<'$sdate' AND id_head='$hid' AND id_party='$id_party') a";
        $open = $this->m->sql_getall($sql);

        $sql = "SELECT 'V' as type, date, no AS refno, id_party_debit AS dhead, id_party_credit AS chead, total, ref1, memo FROM {$this->prefix}partner_voucher 
                WHERE (date >= '$sdate' AND date <= '$edate') AND id_head='$hid' AND (id_party_debit='$id_party' OR id_party_credit='$id_party') UNION ALL
            SELECT 'S' as type, date, bill_no AS refno, id_party AS dhead, 1 AS chead, total, invno AS ref1, memo  FROM {$this->prefix}partner_sale
                WHERE (date >= '$sdate' AND date <= '$edate') AND id_head='$hid' AND id_party='$id_party'";
        $voucher = $this->m->sql_getall($sql);
        array_unshift($voucher, ["type" => "O", "total" => $open[0]['total']]);
        $this->sm->assign("data", $voucher);
    }
    function outstanding() {
        $hid = $_SESSION['id_user'];
        $id_party = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");
        $sql = "SELECT id_party, name FROM {$this->prefix}partner_party WHERE id_head='$hid' ORDER BY name"; 
        $party = $this->m->getall($this->m->query($sql), 2, "name", "id_party");
        $this->sm->assign("party", $party);

        $sql = "SELECT SUM(total) AS total FROM (SELECT IF(otype=1,1,-1)*opening_balance AS total FROM {$this->prefix}partner_party WHERE id_head='$hid' UNION ALL
            SELECT SUM(IF(id_party_debit='$id_party',-1,1)*total) AS total FROM {$this->prefix}partner_voucher WHERE date < '$sdate' AND id_head='$hid' AND (id_party_debit='$id_party' OR id_party_credit='$id_party') UNION ALL
            SELECT SUM(-total) AS total FROM {$this->prefix}partner_sale WHERE date<'$sdate' AND id_head='$hid' AND id_party='$id_party') a";
        $open = $this->m->sql_getall($sql);

        $sql = "SELECT h.id_head, p.total FROM `{$this->prefix}head` h, (SELECT id_head, SUM(t.total1) AS total FROM (
              SELECT dhead AS id_head, SUM(-total) AS total1 FROM `{$this->prefix}ledger` WHERE date<='$edate' AND !(type='S' OR type='H') GROUP BY 1
              UNION ALL
              SELECT chead AS id_head, SUM(total) AS total1 FROM `{$this->prefix}ledger` WHERE date<='$edate' AND !(type='S' OR type='H') GROUP BY 1) t
              GROUP BY 1) p WHERE h.id_head=p.id_head AND h.debtor AND p.total<>0
              GROUP BY h.id_head  ORDER BY h.id_head ";
        $res = $this->m->sql_getall($sql, 2, "total", "id_head");
	
	
    	$sql = "SELECT s.invno, s.bill_no, s.date, s.id_head, s.id_party, s.total, s.total AS balance, h.name, h.address1
	 	        FROM `{$this->prefix}sale` s, `{$this->prefix}head` h
	    	WHERE $wcond s.id_head=h.id_head AND h.id_area=a.id_area AND s.cash=1 ORDER BY h.name, s.date, s.invno";

        $rs = $this->m->query($sql);
        $dt = date('m/d/Y', time());
        $min_date = $max_date = 0;;
        if (isset($_REQUEST['days']) && $_REQUEST['days'] > 0) {
            if ($_REQUEST['daystype']=="2") {
                $min_date = $_REQUEST['days']; 
                $max_date = 999999999;
            } else {
                $min_date = -999999999;
                $max_date = $_REQUEST['days'];
            }

        }
        $os = $result = array();
	while ($row = mysql_fetch_assoc($rs)) {
            $hid = $row['id_head'];
            $res[$hid] = isset($res[$hid]) ? $res[$hid] : 0;
            $row['balance'] = max(0, $row['balance'] - $res[$hid]);
            $res[$hid] = max(0, $res[$hid] - $row['total']);
            $diff = strtotime($dt) - strtotime($row['date']);
            $days = (int) ($diff / 60 / 60 / 24) + 1;
            $row['days'] = $days;
	    if ($row['balance'] != 0) {
               if (($days>=$min_date && $days<=$max_date) || $min_date==0)
                    $result[] = $row;
            }
        }
        if ($_REQUEST['option']==2) {
            foreach ($result as $k => $v) {
                $hid = $v['id_head'];
                $os[$hid]['aname'] =  isset($os[$hid]['aname']) ? $os[$hid]['aname'] : $v['aname'];
                $os[$hid]['cname'] =  isset($os[$hid]['cname']) ? $os[$hid]['cname'] : $v['cname'];
                $os[$hid]['name'] =  isset($os[$hid]['name']) ? $os[$hid]['name'] : $v['name'];
                $os[$hid]['address1'] =  isset($os[$hid]['address1']) ? $os[$hid]['address1'] : $v['address1'];
                $os[$hid]['totalos'] =  (isset($os[$hid]['totalos']) ? $os[$hid]['totalos'] : 0) + $v['balance'];
            }
            $this->sm->assign("data", $os);
        } else {
            $sql = "DROP TABLE if exists os;CREATE TABLE os (id_represent INT, id_company INT, id_area INT, invno VARCHAR(20), `data` date, id_head INT, total decimal(16,2));";
            //echo $sql;
            foreach ($result as $k => $v) {
                $hid = $v['id_head'];
                $os[$hid] = isset($os[$hid]) ? $os[$hid] : 0;
                $os[$hid] +=  $v['balance'];
                $sql = "INSERT INTO os VALUES ({$v['id_represent']}, {$v['id_company']}, {$v['id_area']}, '{$v['invno']}', '{$v['date']}', {$v['id_head']}, {$v['total']});"; 
                //echo $sql."<br>";
            }
            $this->sm->assign("os", $os);
            $this->sm->assign("data", $result);
        }



$sql = "SELECT SUM(total) AS total FROM (SELECT IF(otype=1,1,-1)*opening_balance AS total FROM {$this->prefix}partner_party WHERE id_party='$id_party' UNION ALL
            SELECT SUM(IF(id_party_debit='$id_party',-1,1)*total) AS total FROM {$this->prefix}partner_voucher WHERE date < '$sdate' AND id_head='$hid' AND (id_party_debit='$id_party' OR id_party_credit='$id_party') UNION ALL
            SELECT SUM(-total) AS total FROM {$this->prefix}partner_sale WHERE date<'$sdate' AND id_head='$hid' AND id_party='$id_party') a";
        $open = $this->m->sql_getall($sql);

        $sql = "SELECT 'V' as type, date, no AS refno, id_party_debit AS dhead, id_party_credit AS chead, total, ref1, memo FROM {$this->prefix}partner_voucher 
                WHERE (date >= '$sdate' AND date <= '$edate') AND id_head='$hid' AND (id_party_debit='$id_party' OR id_party_credit='$id_party') UNION ALL
            SELECT 'S' as type, date, bill_no AS refno, id_party AS dhead, 1 AS chead, total, invno AS ref1, memo  FROM {$this->prefix}partner_sale
                WHERE (date >= '$sdate' AND date <= '$edate') AND id_head='$hid' AND id_party='$id_party'";
        $voucher = $this->m->sql_getall($sql);
        array_unshift($voucher, ["type" => "O", "total" => $open[0]['total']]);
        $this->sm->assign("data", $voucher);
    }
}
?>