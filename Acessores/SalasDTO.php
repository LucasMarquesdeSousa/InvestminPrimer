<?php

Class SalasDTO {

    private $id_salas;
    private $nome;
    private $senha;
    private $criador;
    private $participante;
    private $data_atualizacao;

    //ID_SALA
    public function getData_atualizacao() {
        return $this->data_atualizacao;
    }

    public function setData_atualizacao($data_atualizacao): void {
        $this->data_atualizacao = $data_atualizacao;
    }

    public function getIdSalas() {
        return $this->id_salas;
    }

    public function setIdSalas($id_salas) {
        $this->id_salas = $id_salas;
    }

    //NOME
    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    //SENHA
    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    //CRIADOR
    public function getCriador() {
        return $this->criador;
    }

    public function setCriador($criador) {
        $this->criador = $criador;
    }

    //PARTICIPANTE
    public function getParticipante() {
        return $this->participante;
    }

    public function setParticipante($participante) {
        $this->participante = $participante;
    }

}
