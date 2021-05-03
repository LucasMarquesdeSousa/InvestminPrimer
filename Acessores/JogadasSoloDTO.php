<?php
class JogadasSoloDTO {
    private $lugar_jogada;
    private $data;
    private $simbolo;
    private $auto;
    private $id_sala;
    
    public function getId_sala() {
        return $this->id_sala;
    }

    public function setId_sala($id_sala): void {
        $this->id_sala = $id_sala;
    }

    

    public function getLugar_jogada() {
        return $this->lugar_jogada;
    }

    public function getData() {
        return $this->data;
    }

    public function getSimbolo() {
        return $this->simbolo;
    }

    public function getAuto() {
        return $this->auto;
    }

    public function setLugar_jogada($lugar_jogada): void {
        $this->lugar_jogada = $lugar_jogada;
    }

    public function setData($data): void {
        $this->data = $data;
    }

    public function setSimbolo($simbolo): void {
        $this->simbolo = $simbolo;
    }

    public function setAuto($auto): void {
        $this->auto = $auto;
    }


}
