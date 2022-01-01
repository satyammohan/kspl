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

    }
    function outstanding() {
        
    }
}
?>