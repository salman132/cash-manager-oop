<?php


function bcrypt($password){
    $salt = 'AH@x4663!93';
    return $salt.md5($password);
}
