<?php
class voucher extends common {
    function __construct() {
        $this->checklogin();
        $this->table_prefix();
        parent:: __construct();
    }

    function edit() {
        $id = isset( $_REQUEST[ 'id' ] ) ? $_REQUEST[ 'id' ] : '0';
        $this->get_permission( 'voucher', ( $id == 0 ) ? 'INSERT' : 'UPDATE' );
        if ( $id ) {
            $sql = "SELECT * FROM {$this->prefix}voucher WHERE id_voucher='$id'";
            $data = $this->m->fetch_assoc( $sql );
            $this->sm->assign( 'data', $data );
            $sql = "SELECT CONCAT(name, ' ', address1, ' ',address2) AS name, id_head AS id FROM {$this->prefix}head WHERE id_head=" . $data[ 'id_head_debit' ] . ' OR id_head=' . $data[ 'id_head_credit' ];
            $head = $this->m->sql_getall( $sql, 2, 'name', 'id' );
            $this->sm->assign( 'head', $head );
        } else {
            if ( isset( $_REQUEST[ 'date' ] ) ) {
                $data[ 'date' ] = $this->format_date( $_REQUEST[ 'date' ] );
                $this->sm->assign( 'data', $data );
            } else {
                $sql = "SELECT MAX(date) AS date, MAX(CAST(no as decimal(11))) AS no FROM {$this->prefix}voucher";
                $last = $this->m->fetch_assoc( $sql );
                $this->sm->assign( 'data', $last );
            }
        }
    }

    function insert() {
        $this->get_permission( 'voucher', 'INSERT' );
        $data = $_REQUEST[ 'voucher' ];
        if ( $data[ 'id_head_debit' ] == '' ) {
            $_SESSION[ 'msg' ] = 'Please enter Debit account Detail.';
            $this->redirect( $_SERVER[ 'HTTP_REFERER' ] );
            exit;
        }
        if ( $data[ 'id_head_credit' ] == '' ) {
            $_SESSION[ 'msg' ] = 'Please enter Credit account Detail.';
            $this->redirect( $_SERVER[ 'HTTP_REFERER' ] );
            exit;
        }
        $data[ 'memo' ] = str_replace( "'", '', $data[ 'memo' ] );
        $data[ 'id_create' ] = $_SESSION[ 'id_user' ];
        $data[ 'no' ] = $_REQUEST[ 'vno' ];
        $data[ 'ip' ] = $_SERVER[ 'REMOTE_ADDR' ];
        $sql = $this->create_insert( "{$this->prefix}voucher", $data );
        $res = $this->m->query( $sql );
        $data[ 'id_voucher' ] = $this->m->getinsertID( $res );
        $this->redirect( "index.php?module=voucher&func=edit" );
   }

    function update() {
        $this->get_permission( 'voucher', 'UPDATE' );
        $data = $_REQUEST[ 'voucher' ];
        if ( $data[ 'id_head_debit' ] == '' ) {
            $_SESSION[ 'msg' ] = 'Please enter Debit account Detail.';
            $this->redirect( $_SERVER[ 'HTTP_REFERER' ] );
            exit;
        }
        if ( $data[ 'id_head_credit' ] == '' ) {
            $_SESSION[ 'msg' ] = 'Please enter Credit account Detail.';
            $this->redirect( $_SERVER[ 'HTTP_REFERER' ] );
            exit;
        }
        $data[ 'id_create' ] = $_SESSION[ 'id_user' ];
        $data[ 'memo' ] = str_replace( "'", '', $data[ 'memo' ] );
        $data[ 'no' ] = $_REQUEST[ 'vno' ];
        $this->m->query( $this->create_update( "{$this->prefix}voucher", $data, "id_voucher='{$_REQUEST['id']}'" ) );
        $this->redirect( 'index.php?module=voucher&func=listing' );
    }

    function delete() {
        $this->get_permission( 'voucher', 'DELETE' );
        $this->m->query( $this->create_delete( "{$this->prefix}voucher", "id_voucher='{$_REQUEST['id']}'" ) );
        $this->redirect( 'index.php?module=voucher&func=listing' );
    }

    function listing() {
        $this->get_permission( 'voucher', 'REPORT' );
        $sdate = $this->format_date( isset( $_REQUEST[ 'start_date' ] ) ? $_REQUEST[ 'start_date' ] : date( 'd/m/Y' ) );
        $edate = $this->format_date( isset( $_REQUEST[ 'end_date' ] ) ? $_REQUEST[ 'end_date' ] : date( 'd/m/Y' ) );

        $wcond = '';
        if ( isset( $_REQUEST[ 'id_head' ] ) && $_REQUEST[ 'id_head' ] != '' ) {
            $head = $_REQUEST[ 'id_head' ];
            $wcond .= " AND ( v.id_head_debit = $head  OR v.id_head_credit = $head ) ";
        }
        if ( isset( $_REQUEST[ 'start_amount' ] ) && $_REQUEST[ 'start_amount' ] && isset( $_REQUEST[ 'end_amount' ] ) && $_REQUEST[ 'end_amount' ] ) {
            $wcond .= " AND ( v.total >= {$_REQUEST['start_amount']}  AND v.total <= {$_REQUEST['end_amount']} ) ";
        }
        $sql = "SELECT v.*, CAST(v.no AS UNSIGNED) AS noint, vd.id_voucher AS details 
                FROM {$this->prefix}voucher v LEFT JOIN {$this->prefix}voucher_details vd ON v.id_voucher=vd.id_voucher
                WHERE (v.date >= '$sdate' AND v.date <= '$edate') $wcond GROUP BY v.id_voucher ORDER BY v.date DESC, noint DESC ";
        $voucher = $this->m->sql_getall( $sql );
        $head = $this->m->query( "SELECT concat(name,' ',address1) AS name, id_head AS id FROM {$this->prefix}head ORDER BY name" );
        $this->sm->assign( 'head', $this->m->getall( $head, 2, 'name', 'id' ) );
        $this->sm->assign( 'voucher', $voucher );
    }

    function deletebill() {
        $this->get_permission( 'voucher', 'DELETE' );
        $this->updatependingone( $_REQUEST[ 'id' ] );
        $this->m->query( $this->create_delete( "{$this->prefix}voucher_details", "id_voucher='{$_REQUEST['id']}'" ) );
        $this->redirect( 'index.php?module=voucher&func=listing' );
    }

    function deletevdbill() {
        $this->get_permission( 'voucher', 'DELETE' );
        $id = $_REQUEST[ 'id' ];
        $sql = "DELETE FROM {$this->prefix}voucher_details WHERE id_voucher_details='$id'";
        $this->m->query( $sql );
        echo $id.' Deleted.';
        exit;
    }

    function updatevdbill() {
        $this->get_permission( 'voucher', 'DELETE' );
        $id = $_REQUEST[ 'id' ];
        $sql = "SELECT SUM(amt) AS payments FROM {$this->prefix}voucher_details WHERE id_sale='$id'";
        $total = $this->m->sql_getall( $sql );
        $upd = $total[ 0 ][ 'payments' ] ? $total[ 0 ][ 'payments' ] : 0;
        $sql = "UPDATE {$this->prefix}sale SET pending=total-$upd WHERE id_sale='$id' LIMIT 1";
        $this->m->query( $sql );
        echo $id.' Updated.';
        exit;
    }

    function updatependingone( $id ) {
        $sql = "SELECT id_sale, SUM(amt) AS total FROM {$this->prefix}voucher_details WHERE id_voucher='$id' GROUP BY id_sale";
        $res = $this->m->query( $sql );
        while ( $row = mysql_fetch_assoc( $res ) ) {
            $sql1 = "UPDATE {$this->prefix}sale SET pending=pending+" . $row[ 'total' ] . ' WHERE id_sale=' . $row[ 'id_sale' ];
            $this->m->query( $sql1 );
        }
    }

    function getparty() {
        $filt = isset( $_REQUEST[ 'filter' ] ) ? $_REQUEST[ 'filter' ] : '';
        //$sql = "SELECT CONCAT(h.name, ' ', h.address1, ' ',h.address2) as `value`, h.id_head AS col0 FROM {$this->prefix}head h WHERE name LIKE '%{$filt}%' ORDER BY value LIMIT 20";
        //$sql = "SELECT h.name as `value`, h.id_head AS col0, h.address1 AS col1, h.address2 AS col2, 'value,col1,col2' AS filter FROM {$this->prefix}head h WHERE name LIKE '%{$filt}%' ORDER BY value LIMIT 20";
        $sql = "SELECT h.name as `value`, h.id_head AS col0, h.address1 AS col1, g.name AS col2, 'value,col1,col2' AS filter 
                FROM {$this->prefix}head h LEFT JOIN {$this->prefix}group g ON h.id_group=g.id_group
                WHERE h.name LIKE '%{$filt}%' ORDER BY value LIMIT 20";

        $data = $this->m->sql_getall( $sql );
        echo json_encode( $data );
        exit;
    }

    function check() {
        $no = trim( $_REQUEST[ 'no' ] );
        $sdate = $_SESSION[ 'sdate' ];
        $edate = $_SESSION[ 'edate' ];
        $sql = $this->create_select( "{$this->prefix}voucher", "no='$no' AND `date`>='$sdate' AND `date`<='$edate'" );
        $num = $this->m->num_rows( $this->m->query( $sql ) );
        ob_clean();
        echo $num;
        exit;
    }

    function checkold() {
        $fld = trim( $_REQUEST[ 'field' ] );
        $value = trim( $_REQUEST[ 'fvalue' ] );
        $actype = trim( $_REQUEST[ 'actype' ] );
        $res = $this->m->query( $this->create_select( "{$this->prefix}voucher", "$fld='{$value}' AND type='$actype' ORDER BY id_voucher DESC" ) );
        $data = $this->m->fetch_array( $res );
        if ( $this->m->num_rows( $res ) > 0 ) {
            echo $data[ 'no' ];
        } else {
            echo 0;
        }
        exit;
    }

    function receipt() {
        $this->get_permission( 'voucher', 'INSERT' );
        $id = isset( $_REQUEST[ 'id' ] ) ? $_REQUEST[ 'id' ] : '0';
        $sql = "SELECT * FROM {$this->prefix}voucher WHERE no='$id'";
        if ( $id ) {
            $res = $this->m->sql_getall( $sql );
            $data[ 'no' ] = $res[ 0 ][ 'no' ];
            $data[ 'date' ] = $res[ 0 ][ 'date' ];
            $data[ 'id_head_debit' ] = $res[ 0 ][ 'id_head_debit' ];
            $data[ 'id_head_credit' ] = $res[ 0 ][ 'id_head_credit' ];
            $data[ 'memo' ] = $res[ 0 ][ 'memo' ];
            $data[ 'total' ] = 0;
            foreach ( $res as $k => $v ) {
                $data[ 'total' ] += $v[ 'total' ];
            }
            $this->sm->assign( 'data', $data );
            $this->sm->assign( 'bill', $res );
            $sql = "SELECT CONCAT(name, ' ', address1, ' ',address2) AS name, id_head AS id FROM {$this->prefix}head WHERE id_head=" . $data[ 'id_head_debit' ] . ' OR id_head=' . $data[ 'id_head_credit' ];
            $head = $this->m->sql_getall( $sql, 2, 'name', 'id' );
            $this->sm->assign( 'head', $head );
        } else {
            $res = $this->m->fetch_assoc( $sql );
            $this->pr( $res );
            $this->sm->assign( 'data', $res );
        }
        $sql = "SELECT MAX(no) AS mr FROM {$this->prefix}voucher";
        $nextno = $this->m->fetch_assoc( $sql );
        $this->sm->assign( 'nextno', $nextno[ 'mr' ] );
        $this->sm->assign( 'page', 'voucher/journal.tpl.html' );
    }

    function prvoucher( $id ) {
        $this->get_permission( 'voucher', 'REPORT' );
        $sql = 'SELECT v.voucher_no AS mrno, v.credit AS id_credit, v.trans_date AS transdate,v.remark AS remark,';
        $sql .= 'SUM(v.amount) AS amount, h.name AS Party, h.address1 AS add1, h.address2 AS add2 ';
        $sql .= " FROM {$this->prefix}voucher v, {$this->prefix}head h WHERE v.credit=h.id AND v.voucher_no='$id' AND account_type=1 GROUP BY mrno ";
        $res = $this->m->fetch_assoc( $sql );
        $res[ 'w' ] = $this->convert_number( round( $res[ 'amount' ] ) );
        $this->sm->assign( 'data', $res );
        $this->sm->assign( 'page', 'voucher/mrprint.tpl.html' );
    }

    function insertmr() {
        $this->get_permission( 'voucher', 'INSERT' );
        $data = $_REQUEST[ 'voucher' ];
        $transdate = $this->format_date( $data[ 'date' ] );
        $ip = $_SERVER[ 'REMOTE_ADDR' ];
        for ( $i = 0; $i < count( $_REQUEST[ 'bamt' ] );
        $i++ ) {
            if ( isset( $_REQUEST[ 'billno' ][ $i ] ) ) {
                $bill = $_REQUEST[ 'billno' ][ $i ];
            } else {
                $bill = ' ';
            }
            $data1 = array( 'ip' => "{$ip}", 'id_create' => "{$_SESSION['id_user']}", 'create_date' => 'NOW()',
            'cbill' => "{$bill}", 'type' => '1', 'no' => "{$_REQUEST['vno']}", 'date' => "{$transdate}",
            'id_head_credit' => "{$data['id_head_credit']}", 'id_head_debit' => "{$data['id_head_debit']}",
            'total' => "{$_REQUEST['bamt'][$i]}", 'memo' => "{$data['memo']}" );
            if ( $bill != ' ' ) {
                $sql = "UPDATE {$this->prefix}sale SET pending=pending-{$_REQUEST['bamt'][$i]}  WHERE invno='{$_REQUEST['billno'][$i]}' AND id_head='{$data['id_head_credit']}'";
                $this->m->query( $sql );
            }
            //echo $this->create_insert( "{$this->prefix}voucher", $data1 ).'<br>';
            $res = $this->m->query( $this->create_insert( "{$this->prefix}voucher", $data1 ) );
        }
        $referrer = $_SERVER[ 'HTTP_REFERER' ];
        if ( isset( $_REQUEST[ 'ce' ] ) ) {
            $this->prvoucher( $_REQUEST[ 'vno' ] );
        } else {
            $this->redirect( $referrer );
        }
    }

    function bank() {
        $id = isset( $_REQUEST[ 'id' ] ) ? $_REQUEST[ 'id' ] : '0';
        $this->get_permission( 'voucher', 'INSERT' );
        $sql = "SELECT v.*,v.voucher_no AS bno, h.name AS hname, h.address1 AS add1, h.address2 AS add2 FROM {$this->prefix}voucher v, {$this->prefix}head h";
        $sql .= " WHERE v.debit=h.id AND v.id='$id'";
        $res = $this->m->fetch_assoc( $sql );
        $this->sm->assign( 'data', $res );
        $sql = "SELECT MAX(voucher_no) AS bankno FROM {$this->prefix}voucher WHERE account_type=3";
        $nextno = $this->m->fetch_assoc( $sql );
        $this->sm->assign( 'nextno', $nextno[ 'bankno' ] );
        $this->sm->assign( 'page', 'voucher/bank.tpl.html' );
    }

    function payment() {
        $id = isset( $_REQUEST[ 'id' ] ) ? $_REQUEST[ 'id' ] : '0';
        $sql = "SELECT v.*, v.voucher_no AS vno, h.name AS hname, h.address1 AS add1, h.address2 AS add2 FROM {$this->prefix}voucher v, {$this->prefix}head h";
        $sql .= " WHERE v.debit=h.id AND v.id='$id'";
        $res = $this->m->fetch_assoc( $sql );
        $this->sm->assign( 'data', $res );
        $sql = "SELECT MAX(voucher_no) AS vno FROM {$this->prefix}voucher WHERE account_type=2";
        $nextno = $this->m->fetch_assoc( $sql );
        $this->sm->assign( 'nextno', $nextno[ 'vno' ] );
        $this->sm->assign( 'page', 'voucher/payment.tpl.html' );
    }


    function billdetail() {
        $id = isset( $_REQUEST[ 'id' ] ) ? $_REQUEST[ 'id' ] : '0';
        $sql = "SELECT s.id_sale, s.invno, s.date, r.name AS salesman, s.total, s.pending, c.name AS cname
                FROM {$this->prefix}sale s  LEFT JOIN {$this->prefix}company c ON s.id_company=c.id_company, {$this->prefix}represent r
                WHERE  s.id_represent=r.id_represent AND s.id_head='$id' AND s.pending!=0 ORDER BY s.date DESC, s.invno";
        $data = $this->m->sql_getall( $sql );
        echo json_encode( $data );
        exit;
    }

    function updateall() {
        $sql = "UPDATE {$this->prefix}sale SET pending=total";
        $this->m->query( $sql );
        $sql = "SELECT id_sale, id_head_credit, SUM(amt) AS total FROM {$this->prefix}voucher_details GROUP BY 1,2";
        $res = $this->m->query( $sql );
        while ( $r = mysql_fetch_assoc( $res ) ) {
            $sql1 = "UPDATE {$this->prefix}sale SET pending=pending-" . $r[ 'total' ] . " WHERE id_sale='{$r['id_sale']}' AND id_head='{$r['id_head_credit']}'";
            //echo $sql1.'<br>';
            $this->m->query( $sql1 );
        }
        $_SESSION[ 'msg' ] = 'Billwise outstanding is updated.';
        $this->redirect( 'index.php' );
    }

    function oldupdateall() {
        $sql = "UPDATE {$this->prefix}sale SET pending=total";
        $this->m->query( $sql );
        $sql = "SELECT id_sale, SUM(amt) AS total FROM {$this->prefix}voucher_details GROUP BY id_sale";
        $res = $this->m->query( $sql );
        while ( $row = mysql_fetch_assoc( $res ) ) {
            $sql1 = "UPDATE {$this->prefix}sale SET pending=pending-" . $row[ 'total' ] . ' WHERE id_sale=' . $row[ 'id_sale' ];
            $this->m->query( $sql1 );
        }
        $_SESSION[ 'msg' ] = 'Billwise outstanding is updated.';
        $this->redirect( 'index.php' );
    }

    function voucherserial() {
        $this->addfield( 'original_no', $this->prefix . 'voucher', 'ADD COLUMN `original_no` VARCHAR (11)' );
        $sql = "SELECT id_voucher, date, no FROM {$this->prefix}voucher ORDER BY `date`";
        $data = $this->m->sql_getall( $sql );
        $start = 0;
        $date = $data[ 0 ][ 'date' ];
        foreach ( $data as $k => $v ) {
            if ( $date == $v[ 'date' ] ) {
                ++$start;
            } else {
                $date = $v[ 'date' ];
                $start = 1;
            }
            $sql = "UPDATE {$this->prefix}voucher SET no='{$start}', original_no=IF(original_no, original_no, " . $v[ 'no' ] . ') WHERE id_voucher=' . $v[ 'id_voucher' ];
            $this->m->query( $sql );
        }
        $_SESSION[ 'msg' ] = 'Voucher number is serialized Datewise.';
        $this->redirect( 'index.php?module=voucher&func=listing' );
    }

    function printvou( $id = '' ) {
        $this->get_permission( 'voucher', 'REPORT' );
        $id = ( $id != '' ) ? $id : $_REQUEST[ 'id' ];
        $sql = "SELECT v.*, CAST(v.no AS UNSIGNED) AS noint, h.name, h.address1, h.address2, h.gstin,  
            s.name AS sname, s.address1 AS saddress1, s.address2 AS saddress2, s.gstin AS sgstin
            FROM {$this->prefix}voucher v, {$this->prefix}head h, {$this->prefix}head s
            WHERE id_voucher='$id' AND v.id_head_debit=h.id_head AND v.id_head_credit=s.id_head ";
        $voucher = $this->m->sql_getall( $sql );
        $voucher[ 0 ][ 'w' ] = $this->convert_number( round( $voucher[ 0 ][ 'total' ] ) );
        $this->sm->assign( 'data', $voucher );
    }

}

?>
