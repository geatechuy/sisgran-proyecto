<?php

// Función para incluir archivos en el código HTML
function incluirArchivo($archivo, $css, $titulo, $index){
    // $archivo = nombre del archivo a incluir
    // $css = nombre del archivo CSS a incluir
    // $titulo = título de la página
    // $index = indica si se incluye desde el archivo index.php
    if($index){
        include "includes/$archivo.php";
    }else{
        include "../includes/$archivo.php";
    }
}