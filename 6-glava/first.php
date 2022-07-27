<?php
function process_form(){
    print '<ul>';
    foreach($_POST as $k=>$v){
        print '<li>' . htmlentities($k) . '='. htmlentities($v) . '</li>';
    }
    print '</ul>';
}
//задание было написать функции которая типо принимает значения и параметры с формы