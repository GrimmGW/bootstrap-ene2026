<?php 

    //Variables
    $my_string = 'Hola mundo';
    $my_int = 8;
    $my_bool = true;

    echo "$my_string" . " $my_int" . "\n";

    //Constantes
    const MY_CONSTANT = "Esto es una constante." . "\n";

    //Listas (Arrays)
    $my_array = ['Entrada 1', 'Entrada 2', 'Entrada 3'];
    print_r($my_array[1] . "\n");

    //Flujos (bucles)
    for($index = 0; $index < 10; $index++){
        print_r("Esto es el bucle for con el valor: " . "$index" . "\n");
    }

    foreach($my_array as $my_item){
        print_r($my_item . "\n");
    }

    $new_index = 0;
    while ($new_index <= sizeof($my_array) -1){
        print_r($my_array[$new_index] . "\n");
        $new_index++;
    }

    //Condicionales
    if ($my_int == 10){
        print_r("Si, my_int vale 10.");
    } elseif ($my_int < 10){
        print_r("my_int vale menos que 10.");
    } else {
        print_r("No, my_int no vale 10.");
    }
?>