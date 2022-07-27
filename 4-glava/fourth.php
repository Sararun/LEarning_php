<?php
function color($red, $green, $blue){
    $hex=[dechex($red), dechex($green), dechex($blue)];
    foreach ($hex as $i => $val){
        if(strlen($i)==1){
            $hex[$i] ="0$val";
        }
    }
    return '#' . implode(", $hex");
}
function color2($red,$green,$blue){
    return sprintf('#%02x%02x%02x', $red, $green, $blue);
}
/*Надо было напсиать функцию, которая принмает в себя десятичные аргументы цветов
и вохвращает подходящий цвет для применения на веб-страницах*/