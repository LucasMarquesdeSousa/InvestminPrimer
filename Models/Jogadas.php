<?php
require_once 'Conexao.php';
class Jogadas
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }
    public function CadastrarJogadas(JogadasDTO $jogadasDTO)
    {
        try {
            $sql = "INSERT INTO jogadas(lugar_jogada, id_sala, data_jogada, simbolo, quem) VALUES(?, ?, ?, ?, ?)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $jogadasDTO->getLugarJogadas());
            $stmt->bindValue(2, $jogadasDTO->getIdSala());
            $stmt->bindValue(3, $jogadasDTO->getData());
            $stmt->bindValue(4, $jogadasDTO->getSimbolo());
            $stmt->bindValue(5, $jogadasDTO->getQuem());
            return $stmt->execute();
        } catch (PDOException $th) {
            echo $th->getMessage();
            die();
        }
    }
    public function VerificaJogadas(JogadasDTO $jogadasDTO){
        try {
            $sql = "SELECT * FROM jogadas WHERE id_sala=?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $jogadasDTO->getIdSala());
            $stmt->execute();
            $verfica = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $verfica;
        } catch (PDOException $th) {
            echo $th->getMessage();
            die();
        }
    }
    public function VerificaJogadasJSON(JogadasDTO $jogadasDTO){
        try {
            $sql = "SELECT * FROM jogadas AS jo INNER JOIN sala AS sa ON jo.data_jogada >= sa.data_atualizacao WHERE jo.id_sala=?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $jogadasDTO->getIdSala());
            $stmt->execute();
            $verfica = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $verfica;
        } catch (PDOException $th) {
            echo $th->getMessage();
            die();
        }
    }
    public function VerificarJogadaByCriador(JogadasDTO $jogadasDTO){
        try {
            $sql = "SELECT * FROM jogadas WHERE id_sala=?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $jogadasDTO->getIdSala());
            $stmt->execute();
            $verfica = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $verfica;
        } catch (PDOException $th) {
            echo $th->getMessage();
            die();
        }
    }
    public function getPessoaSalaByNome($pessoa, $sala){
        try {
            $sql = "SELECT * FROM jogadas  WHERE id_sala=? AND quem=?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $sala);
            $stmt->bindValue(2, $pessoa);
            $stmt->execute();
            $verfica = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $verfica;
        } catch (PDOException $th) {
            echo $th->getMessage();
            die();
        }
    }
}