<?php
class homeController extends Controller
{

    public function __construct()
    {
        session_start();
        $this->validaSessao();
    }
    private function validaSessao()
    {
       
        if (isset($_SESSION['nome']) && !empty($_SESSION['nome'])) {
            $nome = $_SESSION['nome'];
            //metodos acessores
            $usuarioDTO = new UsuarioDTO();
            $usuarioDTO->setNome($nome);
            //procurar no banco de dados
            $usuario = new Usuario();
            if ($usuario->setLogin($usuarioDTO)) {
                //se não encontrar no BD envia o usuário para a página inicial do sistema
                header('Location: '.URL.'/online');
            }
        }
        
    }
    public function index()
    {
      
        //validação de cadastro
        $validacao = true;
        $form = false;
        /**
         * VALIDAR NOME
         */
        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
            $form = true;
            $not_user_name = [
                0 => ' ',
            ];
            for ($i = 0; $i < count($not_user_name); $i++) {
                if (strstr($_POST['nome'], $not_user_name[$i])) {
                    $validacao = false;
                    break;
                }
            }
        }

        /**
         * VALIDAÇÃO SENHA
         */
        if (isset($_POST['senha']) && !empty($_POST['senha'])) {
            $form = true;
            $criterio_senha = [
                0 => ' ',
            ];
            for ($i = 0; $i < count($criterio_senha); $i++) {
                if (strstr($_POST['senha'], $criterio_senha[$i])) {
                    $validacao = false;
                    break;
                }
            }
        }
        
        if ($validacao && $form) {
            $nome = $_POST['nome'];
            $senha = $_POST['senha'];

            //metodos acessores
            $usuarioDTO = new UsuarioDTO();
            $usuarioDTO->setNome($nome);
            $usuarioDTO->setSenha($senha);
            //enviar para o banco de dados
            $cadastrar = new Usuario();
            $envio = $cadastrar->CadastrarUsuario($usuarioDTO);
            if ($envio) {
                echo 'Usuário cadastrado com sucesso';
            } else {
                echo 'Não foi possivel cadastrar';
            }
        }
        //mostrar a view de cadastrar
        $this->CarregarTemplats('home');
    }

    public function login()
    {
        //Validação do formulário
        /**
         * VALIDAÇÃO DE NOME
         */
        $form = false;
        $valida_login = true;
        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
            $form = true;
            $erro_nome = [
                0 => ' ',
            ];
            for ($i = 0; $i < count($erro_nome); $i++) {
                if (strstr($_POST['nome'], $erro_nome[$i])) {
                    $valida_login = false;
                    echo 'Erro ao validar nome';
                    break;
                }
            }
        }
        /**
         * VALIDAÇÃO DE SENHA
         */
        if (isset($_POST['senha']) && !empty($_POST['senha']) && strlen($_POST['senha']) >= 6) {
            $erro_senha = [
                0 => ' ',
            ];
            $form = true;
            for ($i = 0; $i < count($erro_senha); $i++) {
                if (strstr($_POST['senha'], $erro_senha[$i])) {
                    echo 'Erro ao validar senha';
                    $valida_login = false;
                    break;
                }
            }
        }
        //salvar no banco de dados
        if ($valida_login && $form) {
            //variáveis para envio
            $nome = $_POST['nome'];
            $senha = $_POST['senha'];
            //metodos acessores
            $usuarioDTO = new UsuarioDTO();
            $usuarioDTO->setNome($nome);
            $usuarioDTO->setSenha($senha);
            //banco de dados
            $usuarioDAO = new Usuario();
            $envio = $usuarioDAO->entrar($usuarioDTO);
            if ($envio) {
                //liga sessão
                session_start();
                //criando as sessões para a entrada no sistema
                $_SESSION['nome'] = $envio['nome'];
                $usuarioDTO->setOnline('online');
                $usuarioDAO->setOnline($usuarioDTO);
                header('Location: '.URL.'/usuario/');
            } else {
                echo 'Falha ao fazer o login!';
            }
        }
        //view
        $this->CarregarTemplats('login');
    }
}
