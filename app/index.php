<?php
require_once realpath("../vendor/autoload.php");

use App\Database\Database;

$dt = new Database();
print_r($dt);

