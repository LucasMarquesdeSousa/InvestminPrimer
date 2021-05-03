<?php

require_once 'Conexao.php';

class JogadasSolo {

    private $conexao;

    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }

    public function setJogada(JogadasSoloDTO $jogadasSolo) {
        try {
            $sql = "INSERT INTO jogadasolo(lugar_jogada, data, simbolo, autor, id_sala) VALUES(?,?,?,?,?)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $jogadasSolo->getLugar_jogada());
            $stmt->bindValue(2, $jogadasSolo->getData());
            $stmt->bindValue(3, $jogadasSolo->getSimbolo());
            $stmt->bindValue(4, $jogadasSolo->getAuto());
            $stmt->bindValue(5, $jogadasSolo->getId_sala());
            return $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public function getJogadas(JogadasSoloDTO $jogadasSolo) {
        try {
            $sql = "SELECT * FROM jogadasolo WHERE autor=?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $jogadasSolo->getAuto());
            $stmt->execute();
            $getAutor = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $getAutor;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public function createRoom(JogadasSoloDTO $jogadasSolo) {
        try {
            $sql = "INSERT INTO salaSolo(id_sala, autor) VALUES(?,?)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $jogadasSolo->getId_sala());
            $stmt->bindValue(2, $jogadasSolo->getAuto());
            return $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public function getSalaByAutor(JogadasSoloDTO $jogadasSolo) {
        try {
            $sql = "SELECT * FROM salaSolo WHERE autor=?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $jogadasSolo->getAuto());
            $stmt->execute();
            $getAutor = $stmt->fetch(PDO::FETCH_ASSOC);
            return $getAutor;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

}
