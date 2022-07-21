<?php
namespace Meals;

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
    public function setPrice($price){
        return $this->price =$price;
    }
}
class PriceEntree extends Entree{
    public function __construct($name, $ingridients){
        parent::__construct($name, $ingridients);
        foreach ($this ->ingridients as $ingridient) {
            if (!$ingridient instanceof \Meals\Ingridient) {
                throw new Exception('Element of $ingridients must be Ingridient objetcs');
            }
        }
    }
    public function getPrice(){
        $price =0;
        foreach ($this->ingridients as $ingridient){
            $price += $ingridient->getPrice();
        }
        return $price;
    }
}
//Тут надо было разместить два файла из предыдущих заданий и завести все классы под один namespace