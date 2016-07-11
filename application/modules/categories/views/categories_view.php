<div  class="menu_categories_left">
    <h3 class="ff-BicubikRegular">Категории</h3>

    <div id="accordion" class="categories">
        <? foreach ($categories as $key => $item): ?>
            <? if(isset($item['sub'])): //Если это родительская категория ?>
                <h4><?=$item['cat_name']?></h4>
                <div class="under_cat" >

                    <? foreach($item['sub'] as $key => $sub):?>

                        <a href="<?=base_url()?>goods/<?=$sub['cat_name_en']?>"><?=$sub['cat_name']?></a>

                    <? endforeach; ?>

                </div>
            <? elseif (!isset($item['sub'])):?>
                <h4><a href="<?=base_url()?>goods/<?=$item['cat_name_en']?>"><?=$item['cat_name']?></a></h4>
            <? endif;?>
        <? endforeach;?>
    </div>
</div>