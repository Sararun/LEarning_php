<?php
function html_url($url,$alt=null,$height=null,$width=null){
    $html='<img src="' . $url . '"/>';
    if(isset($alt)){
        print $html .='alt="' . $alt . '"';
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
html_url($url='D:\xampp\htdocs\Le_arning\LEarning_php\4glava\Hhsx44tJz3s.jpg');