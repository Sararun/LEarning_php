<form method="post" action="<?=$form->encode($_SERVER['PHP_SELF'])?>">
    <table>
        <?php if($errors){?>
        <tr>
            <td>Not correct</td>
            <td><ul>
                    <?php foreach ($errors as $error){?>
                    <li><?=$form->encode($error)?></li>
                    <?php }?>
                    </ul></td>
            <?php }?>

        <tr><td>First</td>
            <td><?=$form->input('text', ['name'=> 'num1'])?></td>
        </tr>
        <tr><td>Oper:</td>
            <td><?=$form->select($GLOBALS['ap'], ['name'=>'ap'])?></td>
        </tr>

        <tr><td>Second</td>
            <td><?=$form->input('text', ['name'=> 'num2'])?></td>
        </tr>
        <tr><td colspan="2" align="center">
                <?=$form->input('submit', ['value'=>'Calc'])?>
            </td></tr>
    </table>
</form>




