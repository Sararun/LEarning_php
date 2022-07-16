<?php
$america=['Нью-Йорк', 'NY'=>8175133, 'Лос-Анджелес', 'CA'=>3792621,
    'Чикаго', 'IL'=>2695598, 'Хьюстон','TX'=>2100263,
    'Филадельфия','PA'=>1526006, 'Феникс','AZ'=>1445632,
    'Сан-Антонио','TX'=>1327407, 'Сан-Диего','TX'=>1307402,
    'Даллас', 'TX'=>1197816, 'Сан-Хосе', 'CA'=>945942];
$total='0';
$state_totals=array();
print "<table>\n";
foreach($america as $cityinfo){
    $total+=$cityinfo[2];
    if(!array_key_exists($cityinfo[1], $state_totals)){
        $state_totals[$cityinfo[1]]=0;
    }
    $state_totals[$cityinfo[1]]+=$cityinfo[2];
    print"<tr><td>$cityinfo[0],$cityinfo[1]</td><td>
$cityinfo[2]</td></tr>\n";
}
print"<tr><td>Total</td><td>$total</td></tr>\n";
foreach($state_totals as $state=>$population){
    print"<tr><td>$state</td><td>$population</td></tr>\n";
}
print"</table>";
//Надо было создать массив с текстовыми индексами, вывести его в виде таблицы и посчитать сумму занчений