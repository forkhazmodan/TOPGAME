


<div id="log-window" >
    <ul>
        <li class="inline-block-wrapper">
            <h4 id="name-detail-headline">Вход в аккаунт</h4>
        </li>
        <div class="login-patron">
            <h3 class="block-page-login-name">Постоянный клиент</h3>
            <div class="content-block-text">

                <?if(isset($errors['auth'])) echo $errors['auth']?>

                <form class="single-style-form-patron" action="<?=base_url().substr($_SERVER["REQUEST_URI"], 1);

                ?>" method="POST">
                    <label for="auth_login">
                        <span class="name-field">E-Mail: <?=form_error
                            ('auth_login');?></span><br />
                        <input class="required" required type="text" value="<?=set_value('auth_login');?>"
                               name="auth_login">
                    </label>
                    <label for="auth_pass">
                        <span class="name-field">Пароль: <?=form_error
                            ('auth_pass');?></span><br />
                        <input class="required" required type="password" value="<?=set_value('auth_pass');?>"
                               name="auth_pass">
                    </label>
                        <input class="link-button" type="submit" value="Вход" name="enter">
                        <a class="forgot-password" rel="nofollow" href="<?=base_url()."login/forgor_pass"?>">Забыл 
                        пароль?</a>
                </form>

            </div>
        </div>
        <div class="login-new-user">
            <h3 class="block-page-login-name">Новый покупатель</h3>
            <div class="content-block-text">
                <p>Создав аккаунт, Вы сможете производить покупки быстрее и быть в курсе о статусе заказа, а также отслеживать заказы, сделанных Вами ранее.</p>
                <a class="link-button" title="Зарегистрироваться" href="<?=base_url();?>registration" style="font-size: 18px">Зарегистрироваться</a>
            </div>
        </div>
    </ul>
</div>