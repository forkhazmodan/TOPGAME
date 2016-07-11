



<form id="new_comment" method="post" action="<?=base_url();?>goods/<?=$data['category'];
?>/<?=$data['id']."#new_comment_anchor"?>">

     
    
    <a class="anchor" name ="new_comment_anchor"></a>
    <label class="label_title" for="best">Достоинства  <?=form_error('best');?></label>
    <input name="best" maxlength="255"class="AddNewComment_input" value = "<?=set_value('best');?>">

    <label class="label_title" for="worth">Недостатки <?=form_error('worth');?></label>
    <input name="worth" maxlength="255"  class="AddNewComment_input" value="<?=set_value('worth');?>">

    <label class="label_title" for="comm">Комментарий:* <?=form_error('comment');?></label>
        <textarea name="comment" minlength="10" maxlength="6000" required class="AddNewComment_TextArea"><?=set_value
            ('comment');
            ?></textarea>


    <label class="label_title" for="name">Ваше имя:* <?=form_error('name');?></label>
    <input name="name" maxlength="32" minlength="3"  required class="AddNewComment_input" aria-describedby="name-format"
           value="<?=set_value
    ('name');?>" >


    <label class="label_title" for="mail">Эл. Почта:* <?=form_error('mail');?></label>
    <input name="mail"  required type="email" class="AddNewComment_input" value="<?=set_value('mail');?>" >


    <div class="inner-captcha"><div class="g-recaptcha" data-sitekey="<?=$privatekey?>"></div></div>
    
    <input name="send_to" type="hidden" value="0">
    <input name="good_id" type="hidden"  value="<?=$data['id'];?>">
    <input name="category"  type="hidden"  value="<?=$data['category'];?>">
    <input name ="add_comment" type="submit" onclick = "checkForm(event)"  data-title="Оставить отзыв" value="Оставить
    отзыв">
</form>


<!--onclick = "checkForm(event)"-->

