<?php
namespace Classes;
class Config
{
    private static $config = [];

    public static function get($config)
    {
        $arr = explode('.',$config);
        $key = $arr[0];
        $value = $arr[1];

        if(self::$config == null){
           self::$config =  require_once CONFIG_FILE;
        }

        return self::$config[$key][$value];
    }
}