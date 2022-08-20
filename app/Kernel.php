<?php


namespace app;


class Kernel
{

    public static function path()
    {
        $get = $_GET;
        return self::getpath($get);

    }

    public static function getpath($get)
    {
        $extension = '.php';
        $categories = $get['modules'];
        $action = $get['action'];
        return 'modules/' . $categories . '/' . $action . $extension;
    }


    public static function redirect()
    {
        if (!empty($_GET)) {
            $path = self::path();
            if (file_exists($path)) {
                include($path);
            } else {
                '';
            }
        } else {
            include('includes/right-items.php');
        }
    }
}