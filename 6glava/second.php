<?php
require 'FormHelper.php';
$aper=array('+','-','*','/');

// Если форма передана обработку проверить достоверность данных
function checkform() {
    if ($_SERVER['REQUEST_METHOD'] != 'POST') show_form();
    list($errors, $input) = validate_form();
    if ($errors) show_form($errors);
    process_form($input);
    show_form();
}

function show_form($errors= array()){   //  показ формы
    $defaults= array('num1'=>2, 'ap'=>2, 'num2'=>8);
    $form=new FormHelper($defaults);
    include 'math-form.php';    //  html разметка
}
function validate_form(){   //  проверка качества формы
    $input=array();
    $errors=array();
    $input['ap']=$GLOBALS['aper'][$_POST['ap']]??'';
    if(!in_array($input['ap'], $GLOBALS['aper'])){
        $errors='Please select a valid operation';
    }
    $input['num1']=filter_input(INPUT_POST, 'num1',FILTER_VALIDATE_FLOAT ); //  проверка на дроби
    if(is_null($input['num1']) || ($input['num1']===false)){
        $errors[]='Please check valid first number';
    }
    if(is_null($input['num2']) || ($input['num2']===false)){
        $errors[]='Please check valid second number';
    }
    if(($input['ap'] == '/') && ($input['num2']==0)){   //  деление на ноль
        $errors[]='Please don\'division by zero';
    }
    return array($errors, $input);
}

function process_form($input){
    $actions = array(
        '-' => function ($number1, $number2) {return $number1 - $number2;},
        '+' => function ($number1, $number2) {return $number1 + $number2;},
        '*' => function ($number1, $number2) {return $number1 * $number2;},
        '/' => function ($number1, $number2) {return $number1 / $number2;},
    );
    $result=$actions[$input['ap']]($input['num1'], $input['num2']);
    $message = "{$input['num1']} {$input['ap']} {$input['num2']} =$result";
    print "<h3>$message</h3>";
}
checkform();

