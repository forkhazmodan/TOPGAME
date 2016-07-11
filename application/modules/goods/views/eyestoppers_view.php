<ul id="new">
    <li class="inline-block-wrapper">
        <h4 id="new-headline">НОВЫЕ ПОСТУПЛЕНИЯ</h4>
    </li>
    <?php
    foreach ($eyestoppers as $eye): //проход в цикле по таблице goods
        if (($eye['available'] == 'yes') and ($eye['new'] == 'yes')): //вывод всех товаров, чтоесть в наличии + тех, что являются НОВИНКАМИ?>

            <li class="product-block">
                <ul class="product-block-wrapper">
                    <div class="product-block-mask">
                        <li class="product-image">
                            <div class="sprites">
                                <? if (($eye['hits'] == 'no') and ($eye['new'] == 'yes')): ?>
                                    <div class="sprite-new"></div>
                                <?  elseif(($eye['new'] == 'yes') and ($eye['hits'] == 'no')): ?>
                                    <div class="sprite-hit"></div>
                                <?  elseif(($eye['new'] == 'yes') and ($eye['hits'] == 'yes')):?>
                                    <div class="sprite-new"></div>
                                    <div class="sprite-hit"></div>
                                <?  endif; ?>
                            </div>

                            <a href="<?=base_url();
                            ?>goods/<?=$eye['cat_name_en']?>/<?=$eye['good_id']?>" style="
                                    background: url(<?=base_url();?><?=$eye['img']
                            .$eye['good_id'].'/'.$eye['good_id']."_thumb.png";?>) no-repeat
                                    center;
                                    background-size: contain;
                                    ">
                            </a>
                        </li>
                        <li class="product-info available-top">
                            <div class="product-name font10 ">
                                <p><?=$eye['full_name']?></p>

                                <ul class="rating clearfix">
                                    <li class="current" style="width: 0%;"><span class="star1"></span></li>
                                    <li><span class="star2"></span></li>
                                    <li><span class="star3"></span></li>
                                    <li><span class="star4"></span></li>
                                    <li><span class="star5"></span></li>
                                </ul>
                                <span>
                                    <a href="<?=base_url();
                                    ?>goods/<?=$eye['cat_name_en']?>/<?=$eye['good_id']?>#fragment-3"><?=$eye['count']?></a>
                                </span>
                            </div>
                            <div class="product-price available-bot">
                                <div class="price price-decor"><?=$eye['price']?>&nbsp;UAH</div>
                                <a id="add_<?=$eye['good_id']?>" class="buy"><div></div></a>
                            </div>
                        </li>
                    </div>
                </ul>
            </li>
        <? elseif(($eye['available'] == 'no') and ($eye['new'] == 'yes')):?>
            <li class="product-block">
                <ul class="product-block-wrapper">
                    <div class="product-block-mask">
                        <li class="product-image">
                            <div class="sprites">
                                <?if
                                    (($eye['hits'] == 'no') and ($eye['new'] == 'yes')):?>
                                    <div class="sprite-new"></div>
                                <?elseif(($eye['new'] == 'no') and ($eye['hits'] == 'yes')):?>
                                    <div class="sprite-hit"></div>
                                <?elseif(($eye['new'] == 'yes') and ($eye['hits'] == 'yes')):?>
                                    <div class="sprite-new"></div>
                                    <div class="sprite-hit"></div>
                                <?endif;?>
                            </div>
                            <a href="<?=base_url();?>goods/<?=$eye['cat_name_en']?>/<?=$eye['good_id']?>" style="
                                    background: url(<?=base_url();?><?=$eye['img']
                            .$eye['good_id'].'/'.$eye['good_id']."_thumb.png";?>) no-repeat
                                    center;
                                    background-size: contain;
                                    "></a>
                        <li class="product-info not-available-top">
                            <div class="product-name font10 ">
                                <p><?=$eye['full_name']?></p>
                                <ul class="rating clearfix">
                                    <li class="current" style="width: 0%;"><span class="star1"></span></li>
                                    <li><span class="star2"></span></li>
                                    <li><span class="star3"></span></li>
                                    <li><span class="star4"></span></li>
                                    <li><span class="star5"></span></li>
                                </ul>
                                <span>
                                    <a href="<?=base_url();
                                    ?>goods/<?=$eye['cat_name_en']?>/<?=$eye['good_id']?>#fragment-3"><?=$eye['count
                                    ']?></a>
                                </span>
                            </div>
                            <div class="product-price not-available-bot">
                                <div class="price-not-available font12 ff-BenderBold"><?=$eye['price']?>&nbsp;UAH</div>
                                <p class="not-available-bot">Нет на складе</p>
                            </div>
                        </li>
                    </div>
                </ul>
            </li>
        <? endif; ?>
    <?php endforeach;?>
</ul>
    <!-----ХИТЫ----->
    <ul id="hits">
        <li class="inline-block-wrapper">
            <h4 id="hits-headline" class="headline">ХИТЫ ПРОДАЖ</h4>
        </li>
        <?php foreach ($eyestoppers as $eye): /* проход в цикле по таблице goods */?>
            <?  if (($eye['available'] == 'yes') and ($eye['hits'] == 'yes')):
                /* вывод всех товаров,что ЕСТЬ В НАЛИЧИИ + тех, что являются ХИТАМИ */ ?>
                <li class="product-block">
                    <ul class="product-block-wrapper">
                        <div class="product-block-mask">
                            <li class="product-image">
                                <div class="sprites">
                                    <?  if (($eye['hits'] == 'no') and ($eye['new'] == 'yes')): ?>
                                        <div class="sprite-new"></div>
                                    <?  elseif($eye['new'] == 'no' and ($eye['hits'] == 'yes')): ?>
                                        <div class="sprite-hit"></div>
                                    <?  elseif(($eye['new'] == 'yes') and ($eye['hits'] == 'yes')):?>
                                        <div class="sprite-hit"></div>
                                        <div class="sprite-new"></div>
                                    <?  endif; ?>
                                </div>
                                <a href="<?=base_url();?>goods/<?=$eye['cat_name_en']?>/<?=$eye['good_id']?>" style="
                                        background: url(<?=base_url();?><?=$eye['img']
                                .$eye['good_id'].'/'.$eye['good_id']."_thumb.png";?>) no-repeat center;
                                        background-size: contain;
                                        ">
                                </a>
                            </li>
                            <li class="product-info available-top">
                                <div class="product-name font10 ">
                                    <p><?=$eye['full_name']?></p>
                                    <ul class="rating clearfix">
                                        <li class="current" style="width: 0%;"><span class="star1"></span></li>
                                        <li><span class="star2"></span></li>
                                        <li><span class="star3"></span></li>
                                        <li><span class="star4"></span></li>
                                        <li><span class="star5"></span></li>
                                    </ul>
                                    <span>
                                        <a href="<?=base_url();
                                        ?>goods/<?=$eye['cat_name_en']?>/<?=$eye['good_id']?>/#fragment-3"><?=$eye
                                            ['count']?></a>
                                    </span>
                                </div>
                                <div class="product-price available-bot">
                                    <div class="price price-decor"><?=$eye['price']?>&nbsp;UAH</div>
                                    <a id="add_<?=$eye['good_id']?>" class="buy"><div></div></a>
                                </div>
                            </li>
                        </div>
                    </ul>
                </li>
            <?  elseif(($eye['available'] == 'no') and ($eye['hits'] == 'yes')): //вывод всех товаров,
                //которых НЕТ В НАЛИЧИИ + тех, что являются ХИТАМИ */ ?>
                <li class="product-block">
                    <ul class="product-block-wrapper">
                        <div class="product-block-mask">
                            <li class="product-image">
                                <div class="sprites">
                                    <?  if (($eye['hits'] == 'no') and ($eye['new'] == 'yes')): ?>
                                        <div class="sprite-new"></div>
                                    <?  elseif($eye['new'] == 'no' and ($eye['hits'] == 'yes')): ?>
                                        <div class="sprite-hit"></div>
                                    <?  elseif(($eye['new'] == 'yes') and ($eye['hits'] == 'yes')):?>
                                        <div class="sprite-hit"></div>
                                        <div class="sprite-new"></div>
                                    <?  endif; ?>
                                </div>
                                <a href="<?=base_url();?>goods/<?=$eye['cat_name_en']?>/<?=$eye['good_id']?>"
                                   style="
                                           background: url(<?=base_url();?><?=$eye['img']
                                   .$eye['good_id'].'/'.$eye['good_id']."_thumb.png";?>) no-repeat center;
                                           background-size: contain;
                                           "></a>
                            <li class="product-info not-available-top">
                                <div class="product-name font10 ">
                                    <p><?=$eye['full_name']?></p>
                                    <ul class="rating clearfix">
                                        <li class="current" style="width: 0%;"><span class="star1"></span></li>
                                        <li><span class="star2"></span></li>
                                        <li><span class="star3"></span></li>
                                        <li><span class="star4"></span></li>
                                        <li><span class="star5"></span></li>
                                    </ul>
                                    <span>
                                        <a href="<?=base_url();
                                        ?>goods/<?=$eye['cat_name_en']?>/<?=$eye['good_id']?>/#fragment-3"><?=$eye
                                            ['count']?></a>
                                    </span>
                                </div>
                                <div class="product-price not-available-bot">
                                    <div class="price-not-available font12 ff-BenderBold"><?=$eye['price']?>&nbsp;UAH</div>
                                    <p class="not-available-bot">Нет на складе</p>
                                </div>
                            </li>
                        </div>
                    </ul>
                </li>
            <? endif; ?>
        <?php endforeach;?>
    </ul>