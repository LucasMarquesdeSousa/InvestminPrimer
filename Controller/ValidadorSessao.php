<?php
//pegar os metodos acessores e o banco de dados
require_once '../DAO/UsuarioDAO.php';
require_once '../DTO/UsuarioDTO.php';
//Iniciar uma sessão
session_start();
//Validar as sessões
if (empty($_SESSION["email"])) {
    return true;
} else if (empty($_SESSION["idade"])) {
    return true;
} else if (empty($_SESSION["nome"])) {
    return true;
} else if (empty($_SESSION["senha"])) {
    return true;
} else if (empty($_SESSION["telefone"])) {
    return true;
}
//variáveis que recebe a sessão
$email = $_SESSION["email"];
$nome = $_SESSION["nome"];
$senha = $_SESSION["senha"];
//colcoando as variaveis dentro dos metodos acessores
$usuarioDTO = new UsuarioDTO();
$usuarioDTO->setEmail($email);
$usuarioDTO->setNome($nome);
$usuarioDTO->setSenha($senha);
//banco de dados
$usuarioDAO = new UsuarioDAO();
$validade = $usuarioDAO->ValidarSessao($usuarioDTO);
//Dados validados e agora vai redirencionar o usuário para a pagina certa
if ($validade) {
    header("location: ../view/PaginaInicial.php");
} else if (empty($validade)) {
    header("location: ../view/Login.php");
}