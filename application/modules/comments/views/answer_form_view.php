
    <form id="add_review" method="post" action="<?=base_url();?>goods/<?=$data['category'];
    ?>/<?=$data['id'];
    ?>">
        <label class="label_title" for="ans_name"> Ваше имя:* <?=form_error('ans_name');?></label>
        <input name="ans_name" required maxlength="32" minlength="3" value="<?=set_value('ans_name');?>"
               class="AddNewComment_input">


        <label class="label_title" for="ans_comment"> Комментарий:* <?=form_error('ans_comment');?></label>
            <textarea name="ans_comment" required minlength="10" maxlength="6000" id="TextComment"
                      class="AddNewComment_TextArea"><?=set_value('ans_comment');?>
            </textarea>


        <label class="label_title" for="ans_mail"> Эл. Почта:* <?=form_error('ans_mail');?></label>
        <input name="ans_mail" type = "email" required value = "<?=set_value('ans_mail');?>" 
               class="AddNewComment_input">


        <div class="inner-captcha">

            
        </div>
        
        <input type="hidden" name="send_to"  value="">
        <input type="hidden" name="good_id"  value="<?=$data['id'];?>">
        <input name ="add_reply" type="submit" onclick = "checkForm(event)" data-title="Ответить" value="Ответить">
    </form>
