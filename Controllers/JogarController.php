<?php

class JogarController extends Controller {

    public function __construct() {
        //iniciar a sessão
        session_start();
        //pegar o array sessão e atributo-lo ao nome
        $nome = $_SESSION['nome'];
        //metodos acessores
        $usuarioDTO = new UsuarioDTO();
        $usuarioDTO->setNome($nome);
        //banco de dados
        $verusuario = new Usuario();
        $dadosUsuario = $verusuario->setLogin($usuarioDTO);
        if (!$dadosUsuario) {
            header('Location: /novo/');
        }
        //metodos acessores
        $salaDTO = new SalasDTO();
        $salaDTO->setCriador($nome);
        $salaDTO->setParticipante($nome);
        //banco de dados
        $salaDAO = new Salas();
        if (!$salaDAO->getSalaByCriador($salaDTO)):
            header('Location: /novo/online');
        endif;
    }

    public function index() {
        //criando campo
        //chamar uma view
        $this->CarregarTemplats('Campo');
    }

    public function logica($tecla) {

        $botoes = array(
            'a1' => 'a',
            'a2' => 'b',
            'a3' => 'c',
            'b1' => 'd',
            'b2' => 'e',
            'b3' => 'f',
            'c1' => 'g',
            'c2' => 'h',
            'c3' => 'i',
        );
        if (array_key_exists($tecla, $botoes)) {
            //ajustando timezone
            date_default_timezone_set('America/Sao_Paulo');
            //variáveis
            $lugar_jogadas = $tecla;
            $quem = $_SESSION['nome'];
            $data = date('d/m/y H:m:s');
            $pecas = [
                'X' => 'O',
                'O' => 'X',
            ];
            //metodos acessores da sala
            $salasDTO = new SalasDTO();
            $salasDTO->setCriador($quem);
            $salasDTO->setParticipante($quem);
            //pegar o id da sala
            $getIdSala = new Salas();
            $a = $getIdSala->getSalaByCriador($salasDTO);
            $id_sala = $a['id_salas'];
            //metodos acessores de jogada
            $cad_jogadaDTO = new JogadasDTO();
            $cad_jogadaDTO->setIdsala($id_sala);
            //pegar o simbolo da jogada anterior
            $cad_jogada = new Jogadas();
            $b = $cad_jogada->VerificaJogadas($cad_jogadaDTO);
            if ($this->getVencedor($cad_jogada, $a, $id_sala)) {
                die();
            }
            if ($b):
                /**
                 * VALIDAR AS TECLAS APERTADAS PELO JOGADOR
                 * VER SE É A VEZ DELE MESMO
                 * TROCAR AS PEÇAS DA JOGADA ATUAL
                 */
                for ($i = 0; $i < count($b); $i++):
                    if ($i == 0):
                        $val = count($b) - 1;
                        if ($b[$val]['quem'] == $quem):
                            echo 'Jogada do outro jogador';
                            die();
                        endif;
                        if (array_key_exists($b[$val]['simbolo'], $pecas)):
                            $simbolo = $pecas[$b[$val]['simbolo']];
                        endif;
                    endif;
                    if ($b[$i]['lugar_jogada'] == $tecla):
                        die();
                    endif;
                endfor;
            else:
                $simbolo = 'X';
            endif;
            $data_atualizacao = $data;
            //metodos acessores de jogada
            $cad_jogadaDTO->setData($data);
            $cad_jogadaDTO->setLugarJogadas($lugar_jogadas);
            $cad_jogadaDTO->setQuem($quem);
            $cad_jogadaDTO->setSimbolo($simbolo);
            $salasDTO->setData_atualizacao($data_atualizacao);
            $salasDTO->setIdSalas($id_sala);
            //banco de dodos de jogada
            $cad_jogada->CadastrarJogadas($cad_jogadaDTO);
            $getIdSala->AtualizaData($salasDTO);
        }
    }

    public function getJogadas() {
        //variáveis
        $criador = $_SESSION['nome'];
        $participante = $_SESSION['nome'];
        //metodos acessores de sala
        $salasDTO = new SalasDTO();
        $salasDTO->setCriador($criador);
        $salasDTO->setParticipante($participante);

        //banco de dados de sala
        $sala = new Salas();

        //metodos acessores de jogada
        $jogadasDTO = new JogadasDTO();
        $sala_usuario = $sala->getSalaByCriador($salasDTO);
        $jogadasDTO->setIdsala($sala_usuario['id_salas']);
        //banco de dados de jogadas
        $jogadas = new Jogadas();
        $mygames = $jogadas->VerificaJogadas($jogadasDTO); //pegando as jogadas do banco de dados
        $id_sala = $sala_usuario['id_salas'];
        if ($mygames) {
            echo json_encode($mygames);
            die();
        }
        
    }

    public function BuscaJogadas() {
        //variáveis
        $criador = $_SESSION['nome'];
        $participante = $_SESSION['nome'];
        //metodos acessores de sala
        $salasDTO = new SalasDTO();
        $salasDTO->setCriador($criador);
        $salasDTO->setParticipante($participante);

        //banco de dados de sala
        $sala = new Salas();

        //metodos acessores de jogada
        $jogadasDTO = new JogadasDTO();
        $sala_usuario = $sala->getSalaByCriador($salasDTO);
        $id_sala = $sala_usuario['id_salas'];
        $jogadasDTO->setIdsala($id_sala);

        //banco de dados de jogadas
        $a = $sala->getSalaByCriador($salasDTO);
        $jogadas = new Jogadas();
        $mygames = $jogadas->VerificaJogadasJSON($jogadasDTO); //pegando as jogadas do banco de dados

        if ($mygames && !$this->getVencedor($jogadas, $a, $id_sala)) {
            echo json_encode($mygames);
            die();
        }
        $men = array(
            array(
                'vencedor'=>'O vencedo', 
                'nome_vencedor'=>'lucas', 
                'tem'=>true
                )
            );
        echo json_encode($men);
    }

    private function getVencedor($jogadas, $a, $id_sala) {
        
        /**
         * VERIFICA SE TEM GANHADOR
         */
        $pessoa_sala = [0 => $a['criador'],1 => $a['participante']];
        $possibilidade_ganhar = [0 => ['a1' => '', 'b2' => '', 'c3' => ''], /*ok*/1 => ['a1' => '', 'b1' => '', 'c1' => ''], /*ok*/2 => ['a1' => '', 'a2' => '', 'a3' => ''], /*ok*/3 => ['a2' => '', 'b2' => '', 'c2' => ''], /*ok*/4 => ['a3' => '', 'b3' => '', 'c3' => ''],/*ok*/5 => ['b1' => '', 'b2' => '', 'b3' => ''], /*ok*/6 => ['c1' => '', 'c2' => '', 'c3' => ''], /*ok*/7 => ['a3' => '', 'b2' => '', 'c1' => '']/*ok*/];
        
        for($h = 0; $h < count($pessoa_sala); $h++):
            $igual = 0;
            $pessoa = $pessoa_sala[$h];
            $c = $jogadas->getPessoaSalaByNome($pessoa, $id_sala);
            for ($i = 0; $i < count($possibilidade_ganhar); $i++):
                $igual = 0;
                $possivel = $possibilidade_ganhar[$i];
                for ($j = 0; $j < count($c); $j++):
                    if (array_key_exists($c[$j]['lugar_jogada'], $possivel)):
                        $igual++;
                    endif;
                    if ($igual == 3):
                        return true;
                        die();
                    endif;
                endfor;
            endfor;
        endfor;
        return false;
    }
}
