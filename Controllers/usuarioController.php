<?php
class usuarioController extends Controller{
    public function __construct()
    {
        $this->validaSessao();
    }
    private function validaSessao(){
        //iniciando a sessão
        session_start();
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
            }
        }
    }
    public function index(){
        //view
        $this->CarregarTemplats('Game');
    }
}