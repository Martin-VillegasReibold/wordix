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
 function cargarPartidas (){

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
 * solicita al usuario el nombre del jugador y devuelve el nombre en minusculas.
 * @return String
 */
function solicitarJugador () {
    echo "Ingrese el nombre del Usuario: ";
    $nombre = trim(fgets(STDIN));
do {
    if (ctype_alpha($nombre[0])){
        return strtolower($nombre);
        $bandera = false;

    } else {
        echo "Ingrese un nombre que comience con una letra: ";
        $nombre = trim(fgets(STDIN));
        $bandera = true;
    }

} while ($bandera);
    
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
            $num=solicitarNumeroEntre(0,count($coleccionPalabras)-1);
            foreach($coleccionPartidas as $p=>$elemento){
               
                    if ($nom==$coleccionPartidas[$p]["jugador"]){
                        if($coleccionPartidas[$p]["palabraWordix"]==$coleccionPalabras[$num]){
                            echo "error, palabra ya jugada \n" ;
                            echo "ingrese un numero entre el 0 y el " . count($coleccionPalabras)-1 . ": ";
                            $num=solicitarNumeroEntre(0,count($coleccionPalabras)-1);
                        }
                    }
                
            
            }
            $coleccionPartidas[count($coleccionPartidas)]= jugarWordix($coleccionPalabras[$num],$nom);
            break;
        case 2:
            $nom=solicitarJugador();
            $num=random_int(0,count($coleccionPalabras));
            foreach($coleccionPartidas as $p=>$elemento){
                
                    if ($nom==$coleccionPartidas[$p]["jugador"]){
                        if($coleccionPartidas[$p]["palabraWordix"]==$coleccionPalabras[$num]){
                            $num=random_int(0,count($coleccionPalabras));
                        }
                    }
                
            
            }
            $coleccionPartidas[count($coleccionPartidas)]= jugarWordix($coleccionPalabras[$num],$nom);
            break;
        case 3:
            do{
            echo "ingrese el numero de la partida: ";
            $nro=trim(fgets(STDIN));
            }while($nro<1 || $nro>count($coleccionPartidas));
            echo "partida Wordix ".$nro.": palabra ".$coleccionPartidas[$nro -1]["palabraWordix"]."\n";
            echo "jugador: ".$coleccionPartidas[$nro -1]["jugador"]."\n";
            echo "puntaje: ".$coleccionPartidas[$nro -1]["puntaje"]." puntos \n";
            if($coleccionPartidas[$nro -1]["intentos"]==0){
                echo "Intento: no adivino la palabra \n";
            }else{
                echo "Intento: adivino la palabra en ".$coleccionPartidas[$nro -1]["intentos"]." intentos \n";
            }
            
            break;
        case 4:
            $jugadorEstado=" ";
            $yaGano=false;
            $i=0;
            $bandera=true;
            $bandera2=false;
            
            $nom=solicitarJugador();
            while($bandera&&$i<count($coleccionPartidas)){
                $jugadorEstado="no existe \n";
                if($coleccionPartidas[$i]["jugador"]==$nom||$bandera2){
                    $jugadorEstado="no gano \n";
                    $bandera2=true;
                    if($coleccionPartidas[$i]["puntaje"]!=0&&$coleccionPartidas[$i]["jugador"]==$nom){
                        $bandera=false;
                        $jugadorEstado="gano en el intento ". $coleccionPartidas[$i]["intentos"]. " con ". $coleccionPartidas[$i]["puntaje"]." puntos\n";
                    }
                }
                $i++;
            }
            echo $jugadorEstado;
            break;
        case 5:
                $cantPar=0;
                $cantV=0;
                $cantPun=0;
                $cant1=0;
                $cant2=0;
                $cant3=0;
                $cant4=0;
                $cant5=0;
                $cant6=0;
                
                
                $nom=solicitarJugador();
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
                }if($cantPar!=0){
                echo "jugador: ". $nom."\n Partidas: " . $cantPar." \n puntaje total: " . $cantPun . "\n Victorias: ". $cantV ."\n Porcentaje de victorias : " . ($cantV/$cantPar)*100 .
                "% \n intento 1: ". $cant1. "\n intento 2: ". $cant2 ."\n intento 3: ". $cant3. "\n intento 4: ". $cant4."\n intento 5: ". $cant5. "\n intento 6: ". $cant6 ;
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

