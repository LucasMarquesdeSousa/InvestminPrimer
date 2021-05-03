<?php
Class JogadasDTO{
    private $id_jogadas;
    private $lugar_jogadas;
    private $data;
    private $id_sala;
    private $quem;
    private $simbolo;

    public function getQuem() {
        return $this->quem;
    }

    public function getSimbolo() {
        return $this->simbolo;
    }

    
    public function setQuem($quem): void {
        $this->quem = $quem;
    }

    public function setSimbolo($simbolo): void {
        $this->simbolo = $simbolo;
    }

        //JOGADAS
    public function getIdJogadas(){
        return $this->id_jogadas;
    }
    public function setIdJogadas($id_jogadas){
        $this->id_jogadas = $id_jogadas;
    }

    //LUGAR JOGADAS
    public function getLugarJogadas(){
        return $this->lugar_jogadas;
    }
    public function setLugarJogadas($lugar_jogadas){
        $this->lugar_jogadas = $lugar_jogadas;
    }

    //DATA
    public function getData(){
        return $this->data;
    }
    public function setData($data){
        $this->data = $data;
    }

    //ID SALA
    public function getIdSala(){
        return $this->id_sala;
    }
    public function setIdsala($id_sala){
        $this->id_sala = $id_sala;
    }
}