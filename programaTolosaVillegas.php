<?php
include_once("wordix.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ... COMPLETAR ... */



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
        "NARIZ", "OPACO", "TIGRE", "DARDO", "GAFAS"
    ];

    return ($coleccionPalabras);
}

/**
 * Agrega una palabra para jugar wordix
 * @param array $coleccionPalabrass
 * @param String $palabra
 * @return array
 */
function agregerPalabra ($coleccionPalabrass, $palabra) {

    array_push ($coleccionPalabrass, $palabra);
 
     return ($coleccionPalabrass);
 
 }



/**
 * Contiene partidas de Wordix de ejemplo.
 * completar...
 * @return array
 */
 function cargarPartidas ($numPartEjem){

    $coleccionPartidas = [ 
    ["palabraWordix "=> "QUESO" , "jugador" => "majo", "intentos"=> 0, "puntaje" => 0], 
    ["palabraWordix "=> "CASAS" , "jugador" => "rudolf", "intentos"=> 3, "puntaje" => 14], 
    ["palabraWordix "=> "QUESO" , "jugador" => "pink2000", "intentos"=> 6, "puntaje" => 10], 
    ["palabraWordix "=> "TINTO" , "jugador" => "martin", "intentos"=> 3, "puntaje" => 14], 
    ["palabraWordix "=> "VERDE" , "jugador" => "martin", "intentos"=> 6, "puntaje" => 0], 
    ["palabraWordix "=> "PIANO" , "jugador" => "juan", "intentos"=> 1, "puntaje" => 15],
    ["palabraWordix "=> "TIGRE" , "jugador" => "sonia", "intentos"=> 4, "puntaje" => 13], 
    ["palabraWordix "=> "YUYOS" , "jugador" => "gaston", "intentos"=> 2, "puntaje" => 16], 
    ["palabraWordix "=> "NARIZ" , "jugador" => "folk11", "intentos"=> 6, "puntaje" => 12],
    ["palabraWordix "=> "YUYOS" , "jugador" => "sonia", "intentos"=> 1, "puntaje" => 17]
    ];

    return ($coleccionPartidas[$numPartEjem]);
}


function compJugador ($a, $b) {
    if (($a["jugador"] == $b["jugador"]) ){
        $orden = 0;
    }elseif(($a["jugador"] < $b["jugador"])){
        $orden = -1;
    }else{
        $orden = 1;}
return $orden;
}

function compPalabra ($a, $b) {
    if (($a["palabraWordix"] == $b["palabraWordix"]) ){
        $orden = 0;
    }elseif(($a["palabraWordix"] < $b["palabraWordix"])){
        $orden = -1;
    }else{
        $orden = 1;}
return $orden;
}

/* ... COMPLETAR ... */



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

//$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);




do {
    echo "1) Jugar al Wordix con una palabra elegida\n
        2) Jugar al Wordix con una palabra aleatoria\n
        3) Mostrar una partida\n
        4) Mostrar la primer partida ganadora\n
        5) Mostrar resumen de Jugador\n
        6) Mostrar listado de partidas ordenadas por jugador y por palabra\n
        7) Agregar una palabra de 5 letras a Wordix\n
        8) Salir\n";
    $opcion = solicitarNumeroEntre(1,8);

    
    switch ($opcion) {
        case 1:
            echo "ingrese el nombre de usuario";
            $nom=trim(fgets(STDIN));
            echo "ingrese el numero de la palabra que quiera jugar";
            $num=trim(fgets(STDIN));
            foreach($coleccionPartida as $p){
                foreach($coleccionPartida[$p] as $nombre){
                    if ($nom==$nombre){
                        if($coleccionPartida[$p]["palabraWordix"]==$coleccionPalabras[$num]){
                            echo "error, palabra ya jugada \n ingrese el numero de la palabra que quiera jugar";
                            $num=trim(fgets(STDIN));
                        }
                    }
                }
            
            }
            $coleccionPartida[count($coleccionPartida)]= jugarWordix($coleccionPalabras[$num],$nom);
            break;
        case 2:
            echo "ingrese el nombre de usuario";
            $nom=trim(fgets(STDIN));
            $num=random_int(0,count($coleccionPalabras));
            foreach($coleccionPartida as $p){
                foreach($coleccionPartida[$p] as $nombre){
                    if ($nom==$nombre){
                        if($coleccionPartida[$p]["palabraWordix"]==$coleccionPalabras[$num]){
                            $num=random_int(0,count($coleccionPalabras));
                        }
                    }
                }
            
            }
            $coleccionPartida[count($coleccionPartida)]= jugarWordix($coleccionPalabras[$num],$nom);
            break;
        case 3:
            do{
            echo "ingrese el numero de la partida";
            $nro=trim(fgets(STDIN));
            }while($nro<1 || $nro>count($coleccionPartida));
            echo "partida Wordix ".$nro.":palabra ".$coleccionPartida[$nro -1]["palabraWordix"]."\n
            jugador: ".$coleccionPartida[$nro -1]["jugador"]."\n
            puntaje: ".$coleccionPartida[$nro -1]["puntaje"]." puntos \n";
            if($coleccionPartida[$nro -1]["intentos"]==0){
                echo "intentos: no adivino la palabra";
            }else{
                echo "adivino la palabra en ".$coleccionPartida[$nro -1]["intentos"]."intentos";
            }
            
            break;
        case 4:
            $jugadorEstado=" ";
            $yaGano=false;
            echo "ingrese el nombre del jugador";
            $nom=trim(fgets(STDIN));
            foreach($coleccionPartida as $nroPartida){
                if($coleccionPartida[$nroPartida]["jugador"]!=$nom){
                    $jugadorEstado="no existe";
                }else{
                    if ($coleccionPartida[$nroPartida]["intentos"] == 0 && !$yaGano){
                        $jugadorEstado="el jugador ". $nom."no gano ninguna partida";
                    }else{
                        $jugadorEstado="el jugador adivino la palabra en ". $coleccionPartida[$nroPartida]["intentos"]."intentos";
                        $yaGano=true;
                    }
                }
            }
            echo $jugadorEstado;
            break;
            case 5:
                $cantPar=0;
                $cantV=0;
                $cantPun=0;
                echo "ingrese el nombre del jugador";
                $nom=trim(fgets(STDIN));
                foreach($coleccionPartida as $nroPartida){
                    if($coleccionPartida[$nroPartida]["jugador"]==$nom){
                        $cantPar++;
                        if($coleccionPartida[$nroPartida]["intentos"]!=0){
                            $cantV++;
                            $cantPun=$cantpun + $coleccionPartida[$nroPartida]["puntaje"];
                        }
                    }//intentos del 1 al 6
                }if($cantPar!=0){
                echo "jugador: ". $nom."\n Partidas : " . $cantPar." \n puntaje total" . $cantPun . "\n Porsentaje de victorias : " . ($cantV/$cantPar)*100 ."\n adivinadas ";//faltan las adivinadas
                }
            case 6:

                uasort($coleccionPartida, "compJugador");
                uasort($coleccionPartida, "compPalabra");
                print_r($coleccionPartida);

            case 7:
                echo " ";
                $palabras = leerPalabra5Letras();
                agregerPalabra(CargarColeccionPalabras(), $palabras);

    }
} while ($opcion != 8);

