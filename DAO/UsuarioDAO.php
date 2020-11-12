<?php
require_once '../Conexao/Conexao.php';
class UsuarioDAO {
    private $pdo;
    public function __construct() {
        $this->pdo = Conexao::Conectando();
    }
    
    public function CadUsuario(UsuarioDTO $usuarioDTO){
        try {
            $sql = "INSERT INTO usuario(nome, email, senha, perfil) VALUES(?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getNome());
            $stmt->bindValue(2, $usuarioDTO->getEmail());
            $stmt->bindValue(3, $usuarioDTO->getSenha());
            $stmt->bindValue(4, $usuarioDTO->getPerfil());
            return $stmt->execute();
        } catch (PDOException $ex) {
            
        }
    }
    public function Entrar(UsuarioDTO $usuarioDTO){
        try {
            $sql =  " SELECT * FROM usuario WHERE email=? and senha=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getEmail());
            $stmt->bindValue(2, $usuarioDTO->getSenha());
            $stmt->execute();
            $logado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $logado;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }
    public function ValidarSessao(UsuarioDTO $usuarioDTO){
        try {
            $sql = 'SELECT * FROM usuario WHERE email=? and senha=? and nome=?' ;
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getEmail());
            $stmt->bindValue(2, $usuarioDTO->getSenha());
            $stmt->bindValue(3, $usuarioDTO->getNome());
            return $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }
}