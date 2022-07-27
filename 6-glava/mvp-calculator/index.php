<?php
require 'FormHelper.php';
$operand=array('+','-','*','/');
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
    $defaults= array('num1'=>2, 'secArgument'=>2, 'num2'=>8);
    $form=new FormHelper($defaults);
    include 'math-form.php';    //  html разметка
}
function validateForm(){   //  проверка качества формы
    $input=array();
    $errors=array();
    $input['secArgument']=$GLOBALS['operand'][$_POST['secArgument']]??'';
    if(!in_array($input['secArgument'], $GLOBALS['operand'])){
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
    if(($input['secArgument'] == '/') && ($input['num2']==0)){   //  деление на ноль
        $errors[]='Please don\'t division by zero';
    }
    return array($errors, $input);
}

function processForm($input){
   $secArgs=['+'=>function($num1,$num2){return $num1 +$num2; },
             '-'=>function($num1,$num2){return $num1 -$num2; },
             '*'=>function($num1,$num2){return $num1 *$num2; },
             '/'=>function($num1,$num2){return $num1 /$num2; }];

   $message = "{$input['num1']} {$input['secArgument']}  {$input['num2']}=
   {$secArgs[$input['secArgument']]($input['num1'], $input['num2'])}";
   print "<h3>    $message  </h3>";
}


