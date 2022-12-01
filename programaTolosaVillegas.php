<?php
include_once("wordix.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ... COMPLETAR ... */
/*Villegas Reibold, Martin Esteban - FAI-3236 - TUDW - Martin-VillegasReibold */
/*Tolosa, julian - FAI-3182 - TUDW - Cocacota */



/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "NARIZ", "ZORRO", "TIGRE", "SUECO", "GAFAS"
    ];

    return ($coleccionPalabras);
}

/**
 * Agrega una palabra para jugar wordix
 * @param array $coleccionPalabrass
 * @param string $palabra
 * @return array
 */
function agregerPalabra ($coleccionPalabrass, $palabra) {

    array_push ($coleccionPalabrass, $palabra);
 
     return ($coleccionPalabrass);
 
 }

/**
 * Contiene partidas de Wordix de ejemplo.
 * @return array
 */
 function cargarPartidas (){
/*
    $coleccionPartidas = [ 
    ["palabraWordix"=> "QUESO" , "jugador" => "majo", "intentos"=> 0, "puntaje" => 0], 
    ["palabraWordix"=> "CASAS" , "jugador" => "rudolf", "intentos"=> 3, "puntaje" => 14], 
    ["palabraWordix"=> "QUESO" , "jugador" => "pink2000", "intentos"=> 6, "puntaje" => 10], 
    ["palabraWordix"=> "TINTO" , "jugador" => "martin", "intentos"=> 3, "puntaje" => 14], 
    ["palabraWordix"=> "VERDE" , "jugador" => "martin", "intentos"=> 6, "puntaje" => 0], 
    ["palabraWordix"=> "PIANO" , "jugador" => "juan", "intentos"=> 1, "puntaje" => 15],
    ["palabraWordix"=> "TIGRE" , "jugador" => "sonia", "intentos"=> 4, "puntaje" => 13], 
    ["palabraWordix"=> "YUYOS" , "jugador" => "gaston", "intentos"=> 2, "puntaje" => 16], 
    ["palabraWordix"=> "NARIZ" , "jugador" => "folk11", "intentos"=> 6, "puntaje" => 12],
    ["palabraWordix"=> "YUYOS" , "jugador" => "sonia", "intentos"=> 1, "puntaje" => 17]
    ];
    return ($coleccionPartidas);
    */
    $coleccion = [];
    $pa1 = ["palabraWordix" => "SUECO", "jugador" => "kleiton", "intentos" => 0, "puntaje" => 0];
    $pa2 = ["palabraWordix" => "YUYOS", "jugador" => "briba", "intentos" => 0, "puntaje" => 0];
    $pa3 = ["palabraWordix" => "HUEVO", "jugador" => "zrack", "intentos" => 3, "puntaje" => 9];
    $pa4 = ["palabraWordix" => "TINTO", "jugador" => "cabrito", "intentos" => 4, "puntaje" => 8];
    $pa5 = ["palabraWordix" => "RASGO", "jugador" => "briba", "intentos" => 0, "puntaje" => 0];
    $pa6 = ["palabraWordix" => "VERDE", "jugador" => "cabrito", "intentos" => 5, "puntaje" => 7];
    $pa7 = ["palabraWordix" => "CASAS", "jugador" => "kleiton", "intentos" => 5, "puntaje" => 7];
    $pa8 = ["palabraWordix" => "GOTAS", "jugador" => "kleiton", "intentos" => 0, "puntaje" => 0];
    $pa9 = ["palabraWordix" => "ZORRO", "jugador" => "zrack", "intentos" => 4, "puntaje" => 8];
    $pa10 = ["palabraWordix" => "GOTAS", "jugador" => "cabrito", "intentos" => 0, "puntaje" => 0];
    $pa11 = ["palabraWordix" => "FUEGO", "jugador" => "cabrito", "intentos" => 2, "puntaje" => 10];
    $pa12 = ["palabraWordix" => "TINTO", "jugador" => "briba", "intentos" => 0, "puntaje" => 0];
    
    array_push($coleccion, $pa1, $pa2, $pa3, $pa4, $pa5, $pa6, $pa7, $pa8, $pa9, $pa10, $pa11, $pa12);
    return $coleccion;
}

/**
 * Ordena las partidas jugadas alfabeticamente por nombre del jugador y por la palabra Wordix.
 * @param int $a
 * @param int $b
 * @return int
 */
function compJugadorPalabra ($a, $b) {
    if (($a["jugador"] == $b["jugador"]) ){
        if(($a["palabraWordix"] < $b["palabraWordix"])){
            $orden = -1;
        }else{
            $orden = 1;}
    }elseif(($a["jugador"] < $b["jugador"])){
        $orden = -1;
    }else{
        $orden = 1;}
return $orden;
}

/**
 * Muestra las partidas jugadas en orden alfabetico por jugador y palabra Wordix
 * @param array $coPart
 */
function mostrarOrden($coPart){
    
    uasort($coPart, "compJugadorPalabra");
    print_r($coPart);

}

/**
 * Muestra el menu de opciones.
 * @return int
 */
function seleccionarOrden (){

    echo "
        1) Jugar al Wordix con una palabra elegida\n
        2) Jugar al Wordix con una palabra aleatoria\n
        3) Mostrar una partida\n
        4) Mostrar la primer partida ganadora\n
        5) Mostrar resumen de Jugador\n
        6) Mostrar listado de partidas ordenadas por jugador y por palabra\n
        7) Agregar una palabra de 5 letras a Wordix\n
        8) Salir\n";
        echo "ingrese un numero entre el 1 y el 8: ";
    return solicitarNumeroEntre(1,8);

}

/**
 * muestra los datos de la partida:
 * @param int $indice
 * @param array $coleccionPartidas
 */
function mostrarPartida($indice, $coleccionPartidas){
    echo "partida Wordix ".$indice.": palabra ".$coleccionPartidas[$indice]["palabraWordix"]."\n";
    echo "jugador: ".$coleccionPartidas[$indice]["jugador"]."\n";
    echo "puntaje: ".$coleccionPartidas[$indice]["puntaje"]." puntos \n";
    if($coleccionPartidas[$indice]["intentos"]==0){
        echo "Intento: no adivino la palabra \n";
    }else{
        echo "Intento: adivino la palabra en ".$coleccionPartidas[$indice]["intentos"]." intentos \n";
    }
}

/**
 * solicita al usuario el nombre del jugador y devuelve el nombre en minusculas.
 * @return string
 */
function solicitarJugador () {
    echo "Ingrese el nombre del Usuario: ";
    $nombre = trim(fgets(STDIN));
do {
    if (ctype_alpha($nombre[0])){
        return strtolower($nombre); //recordar intentar usar return al final de la funcion.
        $bandera = false;

    } else {
        echo "Ingrese un nombre que comience con una letra: ";
        $nombre = trim(fgets(STDIN));
        $bandera = true;
    }

} while ($bandera);
    
}


/**
 * Comprueba si la palabra ya ha sido jugada por el mismo jugador.
 * @param int $nom
 * @param string $palabra
 * @param array $coleccionPartidas
 * @return boolean
 */
function palabraJugada($nom, $palabra, $coleccionPartidas){

    $i = 0;
    $bandera = false;
    do {
        if ($nom==$coleccionPartidas[$i]["jugador"]){
            if($coleccionPartidas[$i]["palabraWordix"]==$palabra){
                $bandera = true;
            }
        }
        $i++;
    } while (!$bandera && $i < count($coleccionPartidas));

    return($bandera);
}

/**
 * Busca la primer partida ganada del jugador
 * @param array $coleccionPartidas
 * @param string $nom
 * @return int
 */
function primerPartida ($coleccionPartidas, $nom){

    $jugadorEstado= 0;
        $i=0;
       $bandera=true;
        $bandera2=false;


    while($bandera&&$i<count($coleccionPartidas)){
        $jugadorEstado= -2;
        if($coleccionPartidas[$i]["jugador"]==$nom||$bandera2){
            $jugadorEstado= -1;
            $bandera2=true;
            if($coleccionPartidas[$i]["puntaje"]!=0&&$coleccionPartidas[$i]["jugador"]==$nom){
                $bandera=false;
                $jugadorEstado= $i;
            }
        }
        $i++;
    }
    return $jugadorEstado;
    
}

/**
 * retorna un array con el resumen del jugador.
 * @param array $coleccionPartidas
 * @param string $nom
 * @return array
 */
function resumenJugador($coleccionPartidas, $nom){

    $cantPar=0;
    $cantV=0;
    $cantPun=0;
    $cant1=0;
    $cant2=0;
    $cant3=0;
    $cant4=0;
    $cant5=0;
    $cant6=0;

    foreach($coleccionPartidas as $nroPartida=>$elemento){
        if($coleccionPartidas[$nroPartida]["jugador"]==$nom){
            $cantPar++;
            if($coleccionPartidas[$nroPartida]["puntaje"]!=0){
                $cantV++;
                $cantPun=$cantPun + $coleccionPartidas[$nroPartida]["puntaje"];
            }
            switch($coleccionPartidas[$nroPartida]["intentos"]){
                case 1:
                    $cant1++;
                    break;
                case 2:
                    $cant2++;
                    break;
                case 3:
                    $cant3++;
                    break;
                case 4:
                    $cant4++;
                    break;
                case 5:
                    $cant5++;
                    break;
                case 6:
                    if ($coleccionPartidas[$nroPartida]["puntaje"]!=0){

                        $cant6++;
                    }
                    break;
            }
        }
    }

    $resumenJugador = [
        "jugador" => $nom, 
        "partidas" => $cantPar, 
        "puntaje" => $cantPun, 
        "victorias" => $cantV, 
        "intento1" => $cant1,
        "intento2" => $cant2,
        "intento3" => $cant3,
        "intento4" => $cant4,
        "intento5" => $cant5,
        "intento6" => $cant6,
    ];

    return $resumenJugador;

}

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/


$coleccionPartidas = cargarPartidas();
$coleccionPalabras = cargarColeccionPalabras();

do {
    $opcion = seleccionarOrden();
    
    switch ($opcion) {
        case 1:
            $nom= solicitarJugador();
            echo "ingrese un numero entre el 0 y el " . count($coleccionPalabras)-1 . ": ";
            $num=solicitarNumeroEntre(0,count($coleccionPalabras)-1); // se le agrega el -1 para coincidir con el numero de elementos  del array.

            while(palabrajugada($nom, $coleccionPalabras[$num], $coleccionPartidas)){

            echo "ingrese un numero entre el 0 y el " . count($coleccionPalabras)-1 . " porque la palabra ya fue jugada por este jugador: ";
            $num=solicitarNumeroEntre(0,count($coleccionPalabras)-1);

            }
            
            $coleccionPartidas[count($coleccionPartidas)]= jugarWordix($coleccionPalabras[$num],$nom);
            break;
        case 2:
            $nom=solicitarJugador();
            $num=random_int(0,count($coleccionPalabras));

            while(palabrajugada($nom, $coleccionPalabras[$num], $coleccionPartidas)){

                $num=random_int(0,count($coleccionPalabras));
    
                }

            $coleccionPartidas[count($coleccionPartidas)]= jugarWordix($coleccionPalabras[$num],$nom);
            break;
        case 3:

            echo "ingrese el numero de la partida: ";

            $nro=solicitarNumeroEntre(0, count($coleccionPartidas) - 1); // se le agrega -1 para coincidir con el numero del array

            mostrarPartida($nro, $coleccionPartidas);
            break;
        case 4:
            
            $nom=solicitarJugador();

            $pPart = primerPartida($coleccionPartidas, $nom);

            switch($pPart){
                case -2:
                    echo "Jugador no existe.";
                    break;
                case -1:
                    echo "Jugador no gano.";
                    break;
                default:
                    mostrarPartida($pPart, $coleccionPartidas);
                    break;
            }

            break;
        case 5:

            $nom=solicitarJugador();

            $resJug = resumenJugador($coleccionPartidas, $nom);

            foreach($coleccionPartidas as $p => $elem){

            if($nom != $coleccionPartidas[$p]["jugador"]){
                $confim = false;
            } else {
                $confim = true;
                break;
            }
            }

            if ($confim){
                echo "jugador: ". $resJug["jugador"]."\n";
                echo "Partidas: " . $resJug["partidas"]." \n";
                echo "Puntaje total: " . $resJug["puntaje"] . "\n";
                echo "Victorias: ". $resJug["victorias"] ."\n";
                echo "Porcentaje de victorias : " . ($resJug["victorias"]/$resJug["partidas"])*100 . "% \n";
                echo "intento 1: ". $resJug["intento1"]. "\n";
                echo "intento 2: ". $resJug["intento2"] ."\n";
                echo "intento 3: ". $resJug["intento3"]. "\n";
                echo "intento 4: ". $resJug["intento4"]."\n";
                echo "intento 5: ". $resJug["intento5"]. "\n";
                echo "intento 6: ". $resJug["intento6"]. "\n";

            } else {
                echo "El jugador no tiene un resumen. \n";
            }
                break;
        case 6:

                mostrarOrden($coleccionPartidas);
                
                break;

        case 7:
                echo " ";
                $palabras = leerPalabra5Letras();
                $coleccionPalabras=agregerPalabra($coleccionPalabras, $palabras);
                break;

    }
} while ($opcion != 8);

