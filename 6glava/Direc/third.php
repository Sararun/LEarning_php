<?php
require 'FormHelper.php';
$states = [ 'AL', 'АК', 'AZ', 'AR', 'СА', 'СО', 'СТ', 'DC',
    'DE', 'FL', 'GA', 'HI', 'ID', 'IL', 'IN', 'IА',
    'KS', 'KY', 'LA', 'ME', 'MD', 'MA', 'MI', 'MN',
    'MS', 'MO', 'MT', 'NE', 'NV', 'NH', 'NJ', 'NM',
    'NY', 'NC', 'ND', 'OH', 'OK', 'OR', 'PA', 'RI',
    'SC', 'SD', 'TN', 'TX', 'UT', 'VT', 'VA', 'WA',
    'WV', 'WI', 'WY' ];

//Проверка обработка формы, это делается один раз, поэтому функция не нужна
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    list($errors, $input)=validate_form();
    if($errors){
        show_form($errors);
    }else{
        process_form($errors);
    }
}else{
    show_form();
}
function show_form($errors=array()){    //Будет передавать данные в html
    $form=new FormHelper();
    include 'shippinf-form.php';
}
function validate_form(){   //Правильность вводимой информации
    $input = array();
    $errors = array();
    foreach (['from', 'to'] as $addr) {
        foreach (['Name' => 'name', 'Addres 1' => 'address1',
                     'City' => 'city', 'State' => 'state'] as $label => $field) {
            $input[$addr . '_' . $field] = $_POST[$addr . '_' . $field] ?? '';
            if (strlen($input[$addr . '_' . $field]) == 0) {
                $errors[] = "Please enter value";
            }
        }
        $input[$addr . '_state'] = $GLOBALS['state'][$input[$addr . '_state']] ?? '';
        if (!in_array($input[$addr . '_state'], $GLOBALS['states'])) {
            $errors[] = "Please select correct value";
        }
        $input[$addr . '_zip'] = filter_input(INPUT_POST, $addr . '_zip',
            FILTER_VALIDATE_INT, ['options' => ['min_range' => 10000, 'max_range' => 99999]]);

        if (is_null($input[$addr . '_zip']) || ($input[$addr . '_zip'] === false)) {
            $errors[] = "Please enter a valid $addr ZIP";
        }
        $input[$addr . '_address2'] = $_POST[$addr . '_address2'] ?? '';
    }
    foreach (['height', 'width', 'depth', 'weight'] as $field) {
        $input[$field] = filter_input(INPUT_POST, $field,
            FILTER_VALIDATE_FLOAT);
        if (!($input[$field] && ($input[$field] > 0))) {
            $errors[] = "Please enter a valid $field";
        }
    }
    if ($input['weight'] > 150) {
        $errors[] = "The package must weight no more 150";
    }
    foreach (['height', 'width', 'depth'] as $dim) {
        if ($input[$dim] > 36) {
            $errors[] = "The package $dim must be no more than 36";
        }
    }
    return array($errors, $input);
}
function process_form($input){
    $tpl=<<<HTML
    <p>Your package is {height}" x {width}" x {depth}" and weights {weight}</p>
    <p>IT is coming from:</p>
    <pre>
    {form_name}
    {from_address}
    {from_city}, {from_state}, {from_zip} 
    </pre>
    <p>It is going to</p>
    <pre>
    {to_name}
    {toaddress}
    {to_city}, {to_state}, {to_zip}
    </pre>
    HTML;
    foreach(['form','to'] as $addr){
        $input[$addr.'_address']=$input[$addr.'_address1'];
        if(strlen($input[$addr.'_address2'])){
            $input[$addr.'_address'] .= "\n" . $input[$addr.'address2'];
        }
    }
    $html = $tpl;
    foreach ($input as $k => $v) {
        $html=str_replace('{'.$k.'}', $v, $html);
    }
    print $html;
}
?>