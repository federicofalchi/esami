<?php

// Esercizio Magazzino Larizza



function nomeFile($name){
    $fopen = fopen($name, 'r');
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

   

    return $finalOutput;
}

print_r (nomeFile('magazzino.txt'));

// (2) definisca una	funzione	che	riceve	in	ingresso	il	nome	del	file	contenente	l’elenco	dei	lotti	di	
//prodotti	(ricevuto	da	linea	di	comando)	e	li	carichi in	un	array	di	strutture	dati	lotto,	
//allocato	dinamicamente; 
$finalOutput= array();

$fopen = fopen('magazzino.txt', 'r');
while (!feof($fopen)) {
    $line=fgets($fopen);
    $line=trim($line);
    $lines[]=$line;

}
fclose($fopen);
foreach ($lines as $string)
{
    $string = preg_replace('!\s+!', ' ', $string);
    $row = explode(" ", $string);
    array_push($finalOutput,$row);
}


//(3) definisca e	testi	(invocandola	nel	main)	una	funzione	che,	dato	il	numero	di	un	lotto,	ne	
//restituisca lo	scaffale	in	cui	è	stato	immagazzinato;

function findLotto($finalOutput,$num){
    echo $finalOutput[1][0];
    for($i=0; $i< count($finalOutput);$i++){
        if($finalOutput[$i][0] == $num){
            return $finalOutput[$i][4];
        } else {
            return -1;
        }
    }
}

print_r(findLotto($finalOutput, 0001));

//(4) definisca e	testi	(invocandola	nel	main)	una	funzione	che	riceve	in	ingresso	il	codice	di	un	
//prodotto	e	restituisca il	numero	di	confezioni	disponibili	(sommando	quelle	di	tutti	i	lotti	
//presenti);

function findProdotto($finalOutput,$cod){
    $sum = 0;
    for($i=0; $i< count($finalOutput);$i++){
        if($finalOutput[$i][0] == $cod){
            $sum+=$finalOutput[i][3];
        }
        }
        return $sum;
    }


    print_r(findProdotto($finalOutput,'BT98R46J'));



//(5) crei	un	array	che	contiene	i	codici	dei	prodotti	in	magazzino	(si	ricorda	che	nel	file	dati	i	
//codici	possono	essere	duplicati,	mentre	nell’array	ogni	codice	deve	comparire	una	sola	
//volta)	e	lo	stampi	in	un	file	di	nome	prodotti.txt;

function stampaCodiceProdotti($finalOutput){
   $prodotti=array($finalOutput[0][0]);

    for($i=0; $i<count($finalOutput);$i++){
        for($j=0; $j<count($prodotti); $j++){
            if($prodotti[$j]==$finalOutput[$i][0]){

            } else {
                array_push($prodotti, $finalOutput[$i][0]);
            }
        }
    }

    $filename = 'prodotti.txt';
    $handler = fopen($filename, 'w+');

    if (false === $handler) {
        printf('Impossibile aprire il file %s', $filename);
    exit;
    }

    for ($i = 1; $i =count($prodotti) ; $i++) {
        fwrite($handler, $prodotti[$i]); // Scrive la stringa nel file 100 volte
    }

    fclose($handler);

}

stampaCodiceProdotti($finalOutput);

//(6) stampi	in	un	file	di	nome	ordini.txt l’elenco	dei	prodotti	che	sono	sotto	scorta	minima.	
//Si	suggerisce	di	utilizzare	l’array	creato al	punto	(5)	e	la	funzione	definita	al	punto	(4).


?>