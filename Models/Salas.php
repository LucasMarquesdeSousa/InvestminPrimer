<?php

require_once 'Conexao.php';

Class Salas {

    private $conexao;

    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }

    public function CadastrarSalas(SalasDTO $salasDTO) {
        try {
            $sql = 'INSERT INTO sala(id_salas, nome, criador, data_atualizacao) VALUES(?,?,?,?)';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $salasDTO->getIdSalas());
            $stmt->bindValue(2, $salasDTO->getNome());
            $stmt->bindValue(3, $salasDTO->getCriador());
            $stmt->bindValue(4, $salasDTO->getData_atualizacao());
            return $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public function getSalaByCriador(SalasDTO $salasDTO) {
        try {
            $sql = 'SELECT * FROM sala where criador=? or participante=?';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $salasDTO->getCriador());
            $stmt->bindValue(2, $salasDTO->getParticipante());
            $stmt->execute();
            $salas = $stmt->fetch(PDO::FETCH_ASSOC);
            return $salas;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public function getAllRoom(SalasDTO $salasDTO) {
        try {
            $sql = 'SELECT * FROM sala ';
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            $salas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $salas;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public function MaisPartipante($participante, $nome) {
        try {
            $sql = 'UPDATE sala SET participante=? WHERE id_salas=?';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $participante);
            $stmt->bindValue(2, $nome);
            return $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }
    
    public function AtualizaData(SalasDTO $salaDTO) {
        try {
            $sql = 'UPDATE sala SET data_atualizacao=? WHERE id_salas=?';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $salaDTO->getData_atualizacao());
            $stmt->bindValue(2, $salaDTO->getIdSalas());
            return $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

}
