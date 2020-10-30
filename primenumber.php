<?php

function primeNumber($num){
    if($num == 0){
        echo "Il numero è zero, non puo essere primo <br>";
    } else if($num == 1){
        echo "il numero è 1 quindi è primo<br>";
        } else {
            
            for($i=2; $i<$num; $i++){
                if($num % $i == 0){
                    return "Il numero $num non è un numero primo <br>";
                }
            }
            return "Il numero $num  è un numero primo <br>";
        }

}

print_r(primeNumber(11));

print_r(primeNumber(4));
    

?>