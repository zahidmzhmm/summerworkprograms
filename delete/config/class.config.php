<?php

class db_connect
{

    var $host = 'localhost';  // change Hose Name here (Normally localhost or insert IP )
    //var $db_name='xtendhub_swp';       // change database name here
    var $db_name = 'xtendhub_swp';
    //var $db_user='xtendhub_swp';       // insert database username here
    var $db_user = 'xtendhub_swp';
    //var $db_pass='new';         // change database password here
    var $db_pass = '0R,OVO1^r5i2';
    var $err = '0';


    function db_connect()
    {
        if ($this->connect_db($this->db_user, $this->db_name, $this->db_pass, $this->host)) {
            $this->err = '1';

        }
    }


    private function connect_db($user, $db, $pass, $host)
    {
        $connect_mysql = mysql_connect($host, $user, $pass);
        if ($connect_mysql) {
            if (!mysql_select_db($db, $connect_mysql))
                return false;
        } else
            echo mysql_error . die();

    }
}

$db_link = new db_connect;


?>