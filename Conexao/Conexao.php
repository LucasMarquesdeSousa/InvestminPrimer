<?php
abstract class Conexao{
    private static $conectado;
    public function Conectando(){
        try {
            if(!isset(self::$conectado)){
                self::$conectado = new PDO("mysql:host=localhost;dbname=hackathon;charset=UTF8", "root", "");
                self::$conectado->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return self::$conectado;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }
}