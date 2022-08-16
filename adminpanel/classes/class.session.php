<?php

class session
{

    public static function setSession($userinfo)
    {

        foreach ($userinfo as $key => $value) {

            $_SESSION[$key] = $value;

        }
    }


    public static function checkSession()
    {
        if (empty($_SESSION))
            self::ret('405.php');
    }


    public static function clearSession($data)
    {

        foreach ($data as $item) {
            if (isset($_SESSION[$item]))
                unset($_SESSION[$item]);
        }

    }

    public static function ret($_file)
    {
        echo "<script language='javascript'>
							window.location.href='$_file'
							</script>";
    }

}

?>