<?php
$america=['Нью-Йорк'=>8175133, 'Лос-Анджелес'=>3792621,
    'Чикаго'=>2695598, 'Хьюстон'=>2100263,
    'Филадельфия'=>1526006, 'Феникс'=>1445632,
    'Сан-Антонио'=>1327407, 'Сан-Диего'=>1307402,
    'Даллас'=>1197816, 'Сан-Хосе'=>945942];
print "<table>\n";
foreach($america as $key=>$value){
    print "<tr><td>$key</td><td>$value</td></tr>\n";
}
print'</table>';
echo "sum(america)=".array_sum($america);
//Надо было создать массив с текстовыми индексами, вывести его в виде таблицы и посчитать сумму занчений