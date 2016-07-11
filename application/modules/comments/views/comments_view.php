
<ul id="comments" class = "comments-container">

<? tree_show($tree_array);?>

<?=$links?>
</ul>

<? function tree_show($tree_array){?>
    <? if(!empty($tree_array)):?>
        <? foreach ($tree_array as $tree):?>

            <li id="comment_<?=$tree['comment_id']?>"   class="comment-i">
                <a class="anchor" name ="comment_<?=$tree['comment_id']?>"></a>
                <a name="comment_<?=$tree['comment_id']?>"></a>
                <div class="author_name font14 ff-BenderBold"><?=$tree['name']?></div>
                <div class="author_date font10 ff-BenderRegular"><?=$tree['date']?>'</div>
                <p class="comment font10 ff-BenderRegular"><?=$tree['comment']?></p>
                <? if($tree['best'] and $tree['best']) :?>
                    <p>Достоинства:<?=$tree['best']?></p>
                    <p>Недостатки:<?=$tree['worth']?></p>
                <?endif;?>
                <a class = "toggle" href="<?=base_url()?>comments/<?=$tree['good_id']?>/<?=$tree['comment_id']?>">Ответить</a>

                <hr>
            <? if(!empty($tree['children'])):?>
                <ul class = "reviews">
                <? tree_show($tree['children'])?>
                </ul>
            <? endif;?>
            </li>

        <? endforeach;?>
    <? endif;?>
<? }?>


