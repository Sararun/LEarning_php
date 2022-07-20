<?php
class Ingridient{
protected $name;
protected $price;

    public function __construct($name, $price){
        $this->name=$name;
        $this->price=$price;
    }
    public function getNname(){
        return $this->name;
    }
    public function getPrice(){
        return $this->price;
    }
}
//Надо ббыло создать экземпляры класса в которых можно отслеживать название и цену продукта