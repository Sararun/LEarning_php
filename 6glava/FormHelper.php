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
    public function select($options, $attributes=array()){
        $multiple=$attributes['multiple'] ?? false;
        return
            $this->start('select', $attributes, $multiple).
            $this->options($attributes['name'] ?? null, $options).
            $this->end('select');
    }
    public function textarea($attribtes=array()){
        $name=$attribtes['name'] ?? null;
        $value=$this->values[$name]??'';
        return $this->start('textarea', $attribtes).
            htmlentities($value).
            $this->end('textarea');
    }
    public function tag($tag,$attributes = array(), $isMultiple=false){
        return
        "<$tag {$this->attributes($attributes, $isMultiple)}/>";
    }
    public function start($tag, $attributes=array(), $isMultiple=false){
        $valueAttribute = (! (($tag == 'select') || ($tag == 'textarea')));
        $attrs = $this->attributes($attributes, $isMultiple, $valueAttribute);
        return "<$tag $attrs>";
    }
    public function  end($tag){
        return "</$tag>";
    }
    protected function attributes($attributes, $isMultiple, $valueAttribute = true ){
        $tmp=array();
        if($valueAttribute && isset($attributes['name']) && array_key_exists($attributes['name'], $this->values)){
            $attributes['value']=$this->values[$attributes['name']];
        }
        foreach($attributes as $k=>$v){
            if(is_bool($v)){
                if($v) {$tmp[] = $this->encode($k);}
            }
            else{
                $value=$this->encode($v);
                if($isMultiple && ($k == 'name')){
                    $value .= '[]';
                }
                $tmp[]="$k=\"$value\"";
            }
        }
        return implode(' ', $tmp);
    }

}
