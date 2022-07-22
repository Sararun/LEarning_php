<?php
class FormHelper{
    protected $values=array();
    public function __construct($values=array()){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->$values=$_POST;
        }else{
            $this->values=$values;
        }
    }
    public function input($type, $attributes=array(), $isMultiple=false){
        $attributes['type']=$type;
        if(($type=='radio') || ($type=='checkbox')){
            if($this->isOptionSelected($attributes['name']
            ?? null, $attributes['value'] ?? null)){
                $attributes['checked']=true;
            }
        }
        return $this->tag('input', $attributes, $isMultiple);
    }
}
