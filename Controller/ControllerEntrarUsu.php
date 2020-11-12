<?php
//Variaveis 
$email = $_POST["email"];
$senha = md5($_POST["senha"]);
//Pegando os metodos acessores
require_once '../DTO/UsuarioDTO.php';
require_once '../DAO/UsuarioDAO.php';
//Colocando as variaveis dentro dos metodos acessores;
$usuarioDTO = new UsuarioDTO();
$usuarioDTO->setEmail($email);
$usuarioDTO->setSenha($senha);
//banco de dados
$usuarioDAO = new UsuarioDAO();
$logado = $usuarioDAO->Entrar($usuarioDTO);
//Se os dados da sessão estão corretos
if(isset($logado)){
    session_start();
    $_SESSION["nome"] = $logado["nome"];
    $_SESSION["email"] = $logado["email"];
    $_SESSION["senha"] = $logado["senha"];
    
    echo "<script> location.href='../view/' </script>";
}