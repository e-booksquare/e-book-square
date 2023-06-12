<?php
require __DIR__."/vendor/autoload.php";

use App\Functions\Helpers as Helpers;

$number = [1, 2, 3, 4];
(new Helpers)->dd($number);

