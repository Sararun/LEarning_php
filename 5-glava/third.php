<?php
class PriceEntree extends Entree{
     public function __construct($name, $ingridients){
         parent::__construct($name, $ingridients);
         foreach ($this ->ingridients as $ingridient) {
             if (!$ingridient instanceof Ingridient) {
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
//Тут надо было наследовать ингриденты от класса Entree и вычислить сумму цен ингридиентов