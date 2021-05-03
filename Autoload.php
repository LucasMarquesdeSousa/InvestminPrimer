<?php
spl_autoload_register(function($nome_arquivo) {
    //adicione novas pastas que somente tem classe
    //essa função ela inicia quando é digitado o new para criar um objeto
     $pasta = [0 => 'Controllers',1 => 'Core',2 => 'Models',3 => 'Acessores',];
     for ($i = 0; $i < count($pasta); $i++) {
         if(file_exists($pasta[$i].'/'.$nome_arquivo.'.php')){
             require $pasta[$i].'/'.$nome_arquivo.'.php';
             break;
         }
     }
 });