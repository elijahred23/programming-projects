<?php

function isPrime($number){
    $isPrime = true;
    for($i = 2; $i < $number; $i++){
        if($number % $i == 0){
            $isPrime = false;
            break;
        }
    }
    return $isPrime;
}

for ($i = 1; $i <= 100; $i++){
    if(isPrime($i)){
        echo $i . " is prime" . PHP_EOL;
    } else {
        echo $i . " is not prime" . PHP_EOL;
    }
}

