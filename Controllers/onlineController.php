<?php

Class onlineController extends Controller{
    public function __construct()
    {
        
        session_start(); 
        //iniciando a sessão
        if (isset($_SESSION['nome']) && !empty($_SESSION['nome'])) {
            $nome = $_SESSION['nome'];
            //metodos acessores
            $usuarioDTO = new UsuarioDTO();
            $usuarioDTO->setNome($nome);
            //procurar no banco de dados
           
            $usuario = new Usuario();
            $valida_sessao = $usuario->setLogin($usuarioDTO);
            if (!$valida_sessao) {
                //se não encontrar no BD envia o usuário para a página inicial do sistema
                header('Location: '.URL);
            }else{
                
                //variáveis
                $criador = $valida_sessao['nome'];
                //metodos acessores
                $salaDTO = new SalasDTO();
                $salaDTO->setCriador($criador);
                $salaDTO->setParticipante($criador);
                //banco de dados
                $sala = new Salas();
                $verifica_sala = $sala->getSalaByCriador($salaDTO);
              
                if($verifica_sala){
                    header('Location: '.URL.'/Jogar/');
                }
            }
        }else{
             header('Location: '.URL);
        }
    }
    public function index(){
     
        //chamar uma view
        $this->CarregarTemplats('online');
    }
    public function criarsala(){
        //validação de formulário
        /**
         * VALIDAÇÃO DO NOME
         */
        $validacao = true;
        $form = false;
        if(isset($_POST['nome']) && !empty($_POST['nome'])){
            $nome = htmlspecialchars($_POST['nome']);
            $validacao = true;
            $form = true;
        }
        if($validacao && $form){
            //variáveis
            $nome = $_POST['nome'];
            $senha = $_POST['senha'];
            $id_salas = rand(000000000000000000, 999999999999999999);
            $criador = $_SESSION['nome'];
            $data_atualizacao = date('y-m-d h:m:s');
            //metodos acessores
            $salasDTO = new SalasDTO();
            $salasDTO->setNome($nome);
            $salasDTO->setSenha($senha);
            $salasDTO->setIdSalas($id_salas);
            $salasDTO->setCriador($criador);
            $salasDTO->setData_atualizacao($data_atualizacao);
            //salvar no banco de dados
            
            $salasDAO = new Salas();
            $criaSalas = $salasDAO->CadastrarSalas($salasDTO);
            if($criaSalas){
                header('location: '.URL.'/Jogar');
            }else{
                echo 'Não foi possivel criar esta sala';
            }
        }
        //chamar uma view
        $this->CarregarTemplats('NewRoom');
    }
    public function getSala(){
        //chamar um model
        $criador = $_SESSION['nome'];//variável
        $salasDTO = new SalasDTO(); //metodos acessores
        $salasDTO->setCriador($criador);
        $salas = new Salas();
        $dados = $salas->getAllRoom($salasDTO);
        //chamar uma view
        $this->CarregarTemplats('escolhersala',[], $dados);
    }
    public function entrasala($sala){
        session_start();
        $participante = $_SESSION['nome'];
        $colocarMaisParticipante = new Salas();
        if($colocarMaisParticipante->MaisPartipante($participante, $sala)){
            header('Location: '.URL.'/Jogar');
        }
    }
    public function sair(){
        session_start();
        session_unset();
        session_destroy();
        header('Location: '.URL);
    }
}