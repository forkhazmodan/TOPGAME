
<div class="authorization">
    <ul>
        <?php if($logged_in === 'yes'):?>
            <li><a href="" name ="user_menu"><?=$username?></a></li>
            <li><p> Добро пожаловать , </p>
        <?php else:?>
            <li ><a name = "enter" href="<?=base_url();?>users/login">Вход</a></li>
            <li ><a name = "registration" href="<?=base_url();?>registration">Регистрация</a></li>
        <?php endif?>
    </ul>
</div>

<?php if($logged_in === 'yes'):?>
    <div id ="user_dropbox" class="dropbox">
        <div class="user_options"><a href="">Кабинет</a></div>
        <div class="user_options"><a href="">Корзина</a></div>
        <div class="user_options"><a href="<?=base_url();?>users/logout" name ="logout">Выход</a></div>
    </div>
<?endif;?>