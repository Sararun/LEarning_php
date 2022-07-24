<form method="post" action=
"<?=$form->encode($_SERVER['PHP_SELF']) ?>">
    <table>
        <?php if(isset($errors)) { ?>
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
            <td><?=$form->select($GLOBALS['aper'], ['name'=>'ap'])?></td>
        </tr>

        <tr><td>Second</td>
            <td><?=$form->input('text', ['name'=> 'num2'])?></td>
        </tr>
        <tr><td colspan="2" align="center">
                <?=$form->input('submit', ['value'=>'Calculate'])?>
            </td></tr>
    </table>
</form>




