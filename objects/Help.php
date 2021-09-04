<?php


class Help
{
    public static function convert_to_array($obj){
        $arr = [];
        foreach ($obj as $index => $val) {
            if($index != 'conn')
                $arr[$index] = $val;
        }
        return $arr;
    }

    public static function location($page){
        header('location:'.$page);
    }
    public static function isEmpty($data)
    {
        if (empty($data))
            return true;
        return false;
    }

}