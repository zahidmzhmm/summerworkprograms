<?php


namespace app;


class Sql
{
    public static $conn;

    public function __construct()
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!$conn) {
            exit("Database connection error");
        }
        $this::$conn;
    }

    public static function num_rows($result)
    {
        return mysqli_num_rows($result);
    }

    public static function Select_single($select_query)
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $data = mysqli_query($conn, $select_query);
        if (self::num_rows($data) > 0) {
            $data_field = mysqli_fetch_assoc($data);
            return $data_field;
        } else return '';

    }

    public static function insert($sql)
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        return mysqli_query($conn, $sql);
    }

    public static function update($sql)
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        return mysqli_query($conn, $sql);
    }

    public static function Select_all($select_query)
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $data = mysqli_query($conn, $select_query);
        if (self::num_rows($data) > 0) {
            $data_field = mysqli_fetch_all($data, MYSQLI_ASSOC);
            return $data_field;
        } else return '';

    }

    function update_query($query)
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!mysqli_query($conn, $query))
            return false;
        else return true;
    }


    function Query_Select($select_query)
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $i = 0;
        $result = array();
        $data = mysqli_query($conn, $select_query);//or die("QUERY ERROR1=>".mysql_error());
        if (self::num_rows($data) > 0) {
            while ($row = mysqli_fetch_assoc($data)) {
                $result[$i] = $row;
                $i++;
            }
            return $result;
        } else return '';

    }

    function Query_Insert($qry)
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $result_insert = mysqli_query($conn, $qry);//or die("QUERY ERROR4=>".mysql_error());
        return $result_insert;
    }

}