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

    }
    function pledger() {

    }
    function outstanding() {
        
    }
}
?>