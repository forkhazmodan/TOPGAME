
<div class="inline-block-wrapper">
    <h4 id="name-detail-headline">РЕГИСТРАЦИЯ</h4>
</div>

<h3 class="block-page-login-name">Регистрация нового пользователя:</h3>
<form id="new_user" method="post" action="<?=base_url();?>registration">

    <table class="zakaz-data" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td colspan="3" class="zakaz-txt" style="text-align: center;"><?=$errors;?></td>
        </tr>
        <tr>
            <td class="zakaz-txt" >Имя <?=form_error('name');?></td>
            <td class="zakaz-inpt">
                <label class="label_title" for="name">
                    <input type="text" name="name" value="<?=set_value('name');?>"/>
                </label>
            </td>
            <td class="zakaz-prim">Пример: Иванов Сергей Александрович</td>
        </tr>
        <tr>
            <td class="zakaz-txt">Почтовый адрес <? if(isset($error_mail)) echo $error_mail;?><?=form_error
                ('mail');
                ?></td>
            <td class="zakaz-inpt">
                <label class="label_title" for="mail">
                    <input type="text" name="mail" value="<?=set_value('mail');?>" />
                </label>
            </td>
            <td class="zakaz-prim">Пример: test@mail.ru</td>
        </tr>

        <tr>
            <td class="zakaz-txt">Пароль <?=form_error('password');?> </td>
            <td class="zakaz-inpt">
                <label class="label_title" for="password">
                    <input type="password" name="password" value="<?=set_value('password');?>"/>
                </label>
            </td>
            <td class="zakaz-prim"></td>
        </tr>
        <tr>
            <td class="zakaz-txt">Повторите пароль <?=form_error('password2');?></td>
            <td class="zakaz-inpt">
                <label class="label_title" for="password2">
                    <input type="password" name="password2" value="<?=set_value('password2');?>"/>
                </label>
            </td>
            <td class="zakaz-prim"></td>
        </tr>
    </table>
    <input name="registration_submit"  type="submit" class="link-button" />
</form>
