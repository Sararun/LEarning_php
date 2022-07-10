<?php
//
////Второе и третье упражнеие из учебника php7
//$mnoj=2;
//$ham=4.95;
//$milk=1.95;
//$cola=0.85;
//$ham2=$ham*$mnoj;
//$summa=$ham2 + $cola + $milk;
//$nds=7.5/100*($summa);
//$chai=16/100*($summa+$nds);
//?>
<!--<ul>-->
<!--    <li> hamburgers --><?php //echo $mnoj ,"\n", $ham2?><!--</li>-->
<!--    <li> milkshake --><?php //echo $milk?><!--</li>-->
<!--    <li> cola --><?php //echo $cola  ?><!--</li>-->
<!--    <li> summa --><?php //echo $summa?><!--</li>-->
<!--    <li> summa with nds --><?php //print $summa + $nds?><!--</li>-->
<!--    <li> summa with nds plus chai --><?php //print $summa + $nds + $chai?><!--</li>-->
<!--</ul>-->
<?php
//четвёртое упражнение
print<<<_HTML_
<form method="post" action="fourth_php_7.php">
    <input type="text" name="first_name"><br>
    <input type="text" name="last_name"><br>
    <button type="submit">A</button>
</form>
_HTML_;
?>