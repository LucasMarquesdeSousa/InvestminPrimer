<?php
require_once 'Conexao.php';
Class Usuario{
    private $conexao ;
    public function __construct()
    {
       $this->conexao = Conexao::getConexao();
    }
    public function CadastrarUsuario(UsuarioDTO $usuarioDTO){
        try {
            $sql = "INSERT INTO usuario(nome, senha, online) VALUES(?, ?, 'ofline')";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getNome());
            $stmt->bindValue(2, $usuarioDTO->getSenha());
            return $stmt->execute();
        } catch (PDOException $th) {}
    }
    public function entrar(UsuarioDTO $usuarioDTO){
        try {
            $sql = 'SELECT * FROM usuario WHERE nome=? and senha=?';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getNome());
            $stmt->bindValue(2, $usuarioDTO->getSenha());
            $stmt->execute();
            $login = $stmt->fetch(PDO::FETCH_ASSOC);
            return $login;
        } catch (PDOException $th) {
            echo $th->getMessage();
            die();
        }
    }
    public function setLogin(UsuarioDTO $usuarioDTO){
        try {
            $sql = 'SELECT * FROM usuario WHERE nome=?';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getNome());
            $stmt->execute();
            $login = $stmt->fetch(PDO::FETCH_ASSOC);
            return $login;
        } catch (PDOException $th) {
            echo $th->getMessage();
            die();
        }
    }
    public function setOnline(UsuarioDTO $usuarioDTO){
        try {
            $sql = 'UPDATE usuario SET online=? WHERE nome=?';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getOnline());
            $stmt->bindValue(2, $usuarioDTO->getNome());
            $stmt->execute();
        } catch (PDOException $ex) {
            
        }
    }
}