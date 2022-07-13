<form method="post" action="fourth_php_7.php">
    <input type="text" name="first_name"><br>
    <input type="text" name="last_name"><br>
    <button type="submit">A</button>
</form>
<?php
if($_POST['first_name']){
    print $_POST['first_name'];
    print "\n";
    echo strlen($_POST['first_name']);
}
if($_POST['last_name']) {
    print $_POST['last_name'];
    print "\n";
    echo strlen($_POST['last_name']);
}
?>
<!--вывести имя и фамилию из input и посчитать длинны выводимых строк-->

