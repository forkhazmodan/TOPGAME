
<div class="product-detail-wrapper">
    <ul class="content-wrapper">
        <div class="inline-block-wrapper">
            <h4 id="name-detail-headline"><?=$cat['cat_name']?></h4>
        </div>
        <?php if($goods):?>
            <?php foreach ($goods as $good):?>
                <?  if ($good['available'] == 'yes'): ?>
                    <li class="product-block">
                        <ul class="product-block-wrapper">
                            <div class="product-block-mask">
                                <li class="product-image">
                                    <div class="sprites">
                                        <?  if (($good['hits'] == 'no') and ($good['new'] == 'yes')): ?>
                                            <div class="sprite-new"></div>
                                        <?  elseif($good['new'] == 'no' and ($good['hits'] == 'yes')): ?>
                                            <div class="sprite-hit"></div>
                                        <?  elseif(($good['new'] == 'yes') and ($good['hits'] == 'yes')):?>
                                            <div class="sprite-hit"></div>
                                            <div class="sprite-new"></div>
                                        <?  endif; ?>
                                    </div>

                                    <a href="<?=base_url()?>goods/<?=$good['cat_name_en']?>/<?=$good['good_id']?>"
                                       style="
                                           background: url(<?=base_url();?><?=$good['img']
                                       .$good['good_id'].'/'.$good['good_id']."_thumb.png";?>) no-repeat center;
                                           background-size: contain;
                                           ">

                                    </a>
                                </li>

                                <li class="product-info available-top">
                                    <div class="product-name font10 ">
                                        <p><?=$good['full_name']?></p>

                                        <ul class="rating clearfix">
                                            <li class="current" style="width: 0%;"><span class="star1"></span></li>
                                            <li><span class="star2"></span></li>
                                            <li><span class="star3"></span></li>
                                            <li><span class="star4"></span></li>
                                            <li><span class="star5"></span></li>
                                        </ul>
                                    <span>
                                        <a href="<?=base_url()
                                        ?>goods/<?=$good['cat_name_en']?>/<?=$good['good_id']?>#fragment-3"><?=$good
                                            ['count']?></a>
                                    </span>
                                    </div>
                                    <div class="product-price available-bot">
                                        <div class="price price-decor"><?=$good['price']?>&nbsp;
                                            UAH</div>
                                        <a id="add_<?=$good['good_id']?>" class="buy"><div></div></a>
                                    </div>
                                </li>
                            </div>
                        </ul>
                    </li>
                <?  else: ?>
                    <li class="product-block">
                        <ul class="product-block-wrapper">
                            <div class="product-block-mask">
                                <li class="product-image">
                                    <div class="sprites">
                                        <?  if (($good['hits'] == 'no') and ($good['new'] == 'yes')): ?>
                                            <div class="sprite-new"></div>
                                        <?  elseif($good['new'] == 'no' and ($good['hits'] == 'yes')): ?>
                                            <div class="sprite-hit"></div>
                                        <?  elseif(($good['new'] == 'yes') and ($good['hits'] == 'yes')):?>
                                            <div class="sprite-hit"></div>
                                            <div class="sprite-new"></div>
                                        <?  endif; ?>
                                    </div>
                                    <a href="<?=base_url();
                                    ?>goods/<?=$good['cat_name_en']?>/<?=$good['good_id']?>" style="
                                        background: url(<?=base_url();?><?=$good['img']
                                    .$good['good_id'].'/'.$good['good_id']."_thumb.png";?>) no-repeat center;
                                        background-size: contain;
                                        "></a>

                                <li class="product-info not-available-top">
                                    <div class="product-name font10 ">
                                        <p><?=$good['full_name']?></p>
                                        <ul class="rating clearfix">
                                            <li class="current" style="width: 0%;"><span class="star1"></span></li>
                                            <li><span class="star2"></span></li>
                                            <li><span class="star3"></span></li>
                                            <li><span class="star4"></span></li>
                                            <li><span class="star5"></span></li>
                                        </ul>
                                    <span><a href="<?=base_url()
                                        ?>goods/<?=$good['cat_name_en']?>/<?=$good['good_id']?>#fragment-3"><?=$good
                                            ['count']?></a></span>
                                    </div>
                                    <div class="product-price not-available-bot">
                                        <div class="price-not-available no-price-decor"><?=$good['price']?>&nbsp;UAH</div>
                                        <p class="no-price">Нет на складе</p>
                                    </div>
                                </li>
                            </div>
                        </ul>
                    </li>
                <? endif; ?>
            <?php endforeach;?>
            <?php echo $this->pagination->create_links();?>

        <?php else:?>
            <p style="
                        text-align: center;
                        margin: 20px auto 0 auto; ">НЕ ЗАВЕЗЛИ ЕЩЕ!</p>
        <?php endif;?>

    </ul>
</div>