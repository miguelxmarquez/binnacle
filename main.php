<?php
# IMPORT LOGGER CLASS
require_once 'Binnacle.php';

# WELCOME
echo "Bienvenido a Binnacle \n";
echo "Desesa realizar el proceso de registro? Escriba 'SI' para continuar: \n";
$handle = fopen ("php://stdin","r");
$line = fgets($handle);
fclose($handle);

if(trim($line) != 'SI'){
    echo "Ok, Saliendo...!\n";
    exit;
}else{

    echo "\n"; 
    echo "Seleccione el tipo de evento que desea registrar\n";
    echo "\n"; 
    echo "1. Noticia\n";
    echo "2. Advertencia\n";
    echo "3. Error\n";
    $handle = fopen ("php://stdin","r");
    $line = fgets($handle);
    fclose($handle);

    echo "Opción seleccionada: " . $line . "\n";

    if ($line > 0 && $line < 5) {

        switch ($line) {
            case 1:
                Binnacle::register('notice');
                break;
            case 2:
                Binnacle::register('warning');
                break;
            case 3:
                Binnacle::register('error');
                break;
            default:
                break;    
        }

    }else{
        echo "Opción Inválida! \n";
        exit;
    }    
       
}

