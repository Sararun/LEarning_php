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
    public function changePrice(){
        $price=0;
        foreach ($this->ingridients as $ingridient){
            $price += $ingridient->changePrice();
        }
        return $price;
    }
}
//Надо было видозменить предыдущую программу, чтобы у неё можно было менять цену