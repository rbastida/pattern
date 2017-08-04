<?php

abstract class Ligavel {
    public $ligado = false;
}

class Motor extends Ligavel {
    
    public function ligar() {
        $this->ligado = true;
    }   
}

class Carro extends Ligavel {
    
    function ligar(Motor $motor) {
        
        $this->ligado = true;
        
        $motor = new Motor();
        $motor->ligar();
    }       
}

$carro = new Carro();
$carro->ligar();