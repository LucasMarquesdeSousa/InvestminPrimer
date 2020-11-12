<?php
//variável
$nome = isset($_POST["nome"]) ? htmlspecialchars($_POST["nome"]) : '';
$email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : '';
$senha = isset($_POST["senha"]) == isset($_POST["conf_senha"]) ? md5($_POST["senha"]) : '';
$perfil = 2;
//metodos acessores
require_once '../DTO/UsuarioDTO.php';
$usuarioDTO = new UsuarioDTO();
$usuarioDTO->setEmail($email);
$usuarioDTO->setNome($nome);
$usuarioDTO->setSenha($senha);
$usuarioDTO->setPerfil($perfil);
//banco de dados
require_once '../DAO/UsuarioDAO.php';
$usuarioDAO = new UsuarioDAO();
$cad_usuario = $usuarioDAO->CadUsuario($usuarioDTO);
//se o cadastro foi feito com sucesso o cadastro
if($cad_usuario){
    header("location: ../view/Entrar.php");
    exit();
}
header("location: ../view/CadastrarUsuario.php");