<?php

Class UsuarioDTO {

    private $nome;
    private $senha;
    private $online;

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
    
    //ONLINE
    public function getOnline() {
        return $this->online;
    }

    public function setOnline($online): void {
        $this->online = $online;
    }

}
