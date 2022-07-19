<?php
function html_url($url,$alt=null,$height=null,$width=null){
    if(isset($GLOBALS['image_path'])){
        $url=$GLOBALS['image_path'] . $url;
    }
    $html='<img src="' . $url . '"';
    if(isset($alt)){
        $html .='alt="' . $alt . '"';
    }
    if(isset($height)){
        $html .='height="' . $height . '"';
    }
    if(isset($width)){
        $html .='width="' . $width . '"';
    }
    $html .='/>';
    return $html;
}
//Надо было видоизменить функцию, чтобы в url передовался только имя файла