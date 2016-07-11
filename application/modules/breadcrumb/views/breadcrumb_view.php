<div class="my-breadcrumb">
    <?php if(!isset($cat_name_en)):?>

    <? elseif(isset($cat_name_en) AND !isset($good_id)):?>
        <a href="<?=base_url()?>">Главная</a> &gt;
        <a href="<?=base_url()?>goods/<?=$cat_name_en ?>"><?=$info['cat_name_ru']['cat_name']?></a>
    <? elseif(isset($cat_name_en) AND isset($good_id)):?>
        <a href="<?=base_url()?>goods/eyestoppers">Главная</a> &gt;
        <a href="<?=base_url()?>goods/<?=$cat_name_en ?>"><?=$info['cat_name_ru']['cat_name']?></a> &gt;
        <a href="<?=base_url()?>detail/<?=$cat_name_en ?>/<?=$good_id
        ?>"><?=$info['good_name']['short_name']?></a>
    <? endif;?>

</div>