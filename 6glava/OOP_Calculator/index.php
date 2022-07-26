<?php
require 'FormHelper.php';
$aper=array('+','-','*','/');
// Если форма передана обработку проверить достоверность данных

    if($_SERVER['REQUEST_METHOD']=='POST'){
        list($errors, $input)=validateForm();
        if($errors){
            showForm($errors);
        }else{
            processForm($input);
            showForm();
        }
    }else{
        showForm();
    }


function showForm($errors= array()){   //  показ формы
    $defaults= array('num1'=>2, 'ap'=>2, 'num2'=>8);
    $form=new FormHelper($defaults);
    include 'math-form.php';    //  html разметка
}
function validateForm(){   //  проверка качества формы
    $input=array();
    $errors=array();
    $input['ap']=$GLOBALS['aper'][$_POST['ap']]??'';
    if(!in_array($input['ap'], $GLOBALS['aper'])){
        $errors='Please select a valid operation';
    }
    $input['num1']=filter_input(INPUT_POST, 'num1',FILTER_VALIDATE_FLOAT ); //  ключи должны быть числовыми
    if(is_null($input['num1']) || ($input['num1']===false)){
        $errors[]='Please check valid first number';
    }
    $input['num2']=filter_input(INPUT_POST, 'num2',FILTER_VALIDATE_FLOAT);
    if(is_null($input['num2']) || ($input['num2']===false)){
        $errors[]='Please check valid second number';
    }
    if(($input['ap'] == '/') && ($input['num2']==0)){   //  деление на ноль
        $errors[]='Please don\'division by zero';
    }
    return array($errors, $input);
}

function processForm($input){
   $result=0;
   if($input['ap']=='+'){
       $result= $input['num1'] + $input['num2'];
   }elseif ($input['ap']=='-'){
       $result= $input['num1'] - $input['num2'];
   }elseif($input['ap']=='*'){
       $result= $input['num1'] * $input['num2'];
   }elseif($input['ap']=='/'){
       $result= $input['num1'] / $input['num2'];
   }
   $message = "{$input['num1']} {$input['ap']}  {$input['num2']}=$result";
   print "<h3>    $message  </h3>";
}


