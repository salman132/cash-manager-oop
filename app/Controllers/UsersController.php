<?php
namespace App\Controllers;
use App\Database\Database;
use App\Database\DbObject;

class UsersController extends DbObject{
    protected static $db_table ="users";


    public static function login($email,$password){
        $password = bcrypt($password);
        $sql = "SELECT * FROM ".self::$db_table ." WHERE ";
        $sql .= "email='{$email}'";

        $sql .= " AND password='{$password}'";
        $sql .= "LIMIT 1";

        $the_result_array = self::find_this_query($sql);

        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }
}

