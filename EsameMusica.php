<?php
    echo "Benvenuto nell'esame <br>";

    // lettura da file


    $lines = array();
    $fopen = fopen('musica.txt', 'r');
    while (!feof($fopen)) {
        $line=fgets($fopen);
        $line=trim($line);
        $lines[]=$line;

    }
    fclose($fopen);
    $finalOutput = array();
    foreach ($lines as $string)
    {
        $string = preg_replace('!\s+!', ' ', $string);
        $row = explode(" ", $string);
        array_push($finalOutput,$row);
    }
    echo "<pre>";
    print_r($finalOutput);
    echo "</pre>";

    echo "<br>";

    echo $finalOutput[0][1];
    echo "<br>";

    // stampare brano di durata massima
    $brano = $finalOutput[0];

    for($i=1; $i<count($finalOutput)-1; $i++){
        if($brano[3]<= $finalOutput[$i][3]){
            $brano = $finalOutput[$i];
        }

    }

    echo "<br>";

   // print_r($brano);

    // numero massimo di brani consecutivi calcolabili in 7 minuti

    $tempo = 7;

    for($i=2; $i<$finalOutput; $i++ ){}

    //artisti presenti più di una volta

    $doppioni = array();

    for($i=0; $i<count($finalOutput)-2; $i++){
       $singerTest = $finalOutput[$i][2];
       $find=false;
       $num=0;

       // ci sono doppioni

       for($j=$i+1; $j<count($finalOutput)-1;$j++){

           if($singerTest == $finalOutput[$j][2]){
               $find = true;
            for($k =0 ; $k< count($doppioni); $k++ ){
                if($finalOutput[$i][2]==$doppioni[$k]){
                    $num++;
                }
            }

            if($find && $num==0){
                array_push($doppioni,$finalOutput[$i][2]); 
            }
            $find = false;
          
           }
       }
    }

    

    echo "<br>";

    print_r($doppioni);

    
    echo "<br>";


    

    //numero massimo di brani non consecutivi

    //
?>


