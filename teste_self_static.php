<?php

class Animal {

    public function teste() {
        echo "\$this é instância de " . get_class($this) . "\n<br>";

        // chama Animal::fala(), independentemente do
        // tipo da instância
        echo "self::fala(): ";
        self::fala();

        // chama fala() na classe usada pra instanciar
        // este objeto
        echo "\$this->fala(): ";
        $this->fala();
    }

    public function fala() {
        echo "Oi\n<br>";
    }

}

class Gato extends Animal {

    public function fala() {
        echo "Miau\n<br>";
    }

}

// Nesse caso, self != get_class($this)
// - self == Animal
// - get_class($this) == Gato
$gato = new Gato();
$gato->teste();

echo "\n<br>";

// Nesse caso, self == get_class($this) == Animal
$animal = new Animal();
$animal->teste();
?>