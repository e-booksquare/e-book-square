<?php 

namespace App\Functions;


 class Helpers{
    public function dd($value){
        echo "<pre>";
        var_dump($value);
        echo "</pre>";
        echo "até aqui";
        die;
    }
}