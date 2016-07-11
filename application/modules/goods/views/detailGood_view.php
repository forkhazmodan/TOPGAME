<div class="product-detail-wrapper">



    <div class="inline-block-wrapper">
        <h4 id="name-detail-headline"><?=$good_detail['short_name']?></h4>
    </div>
    <div class="galery">
        <div id="container">
            <div id="products_example">
                <div id="products">
                    <div class="slides_container">

                        <?php foreach($good_detail['img_slide'] as $img):?>
                            <a href="" target="_blank" style ="
                                    background: url(<?=base_url();?><?=$good_detail['img']?><?=$good_detail['good_id']?>/<?=$img?>)no-repeat center;
                                    background-size: contain;
                                    "></a>
                        <?php endforeach;?>

                    </div>
                    <ul class="pagination">

                        <?php foreach($good_detail['img_slide'] as $img):?>
                            <li><a href="#" style ="
                                        background: url(<?=base_url();
                                ?><?=$good_detail['img']?><?=$good_detail['good_id']?>/<?=$img?>) no-repeat center;
                                        background-size: contain;
                                        "></a></li>
                        <?php endforeach;?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="description">
        <h5><?=$good_detail['full_name']?></h5>
        <p><span>ПРОИЗВОДИТЕЛЬ:&nbsp;</span><?=$good_detail['developer']?></p>
        <p><span>МОДЕЛЬ:&nbsp;</span><?=$good_detail['model']?></p>
        <p><span>НАЛИЧИЕ:&nbsp;</span>

            <?php
            if 	   ($good_detail['available'] == 'yes'): echo"Есть в наличии";
            elseif ($good_detail['available'] == 'no'): echo "Нет в наличии";
            elseif ($good_detail['available'] == 'soon'): echo "Скоро";
            endif;?>

        </p>
    </div>
    <div class="product-detail-price available-bot">
        <div class="product-price ">
            <div class="price-detail"><?=$good_detail['price']?>&nbsp;&nbsp;UAH</div>
            <a href="#" class="buy-detail" data-id = "<?=$data['id']?>" data-cat = "<?=$data['category']?>" >
            <? if ($good_detail['available'] == 'yes'):?>
                <p style=" float: left;	 display: block; width: 70% ; margin: 18px 0 20px 5%;">
                    Добавить в корзину
                </p><div></div></a>
            <? else:?>
                <p style="display: inline-block; width: 200px; margin-top: 18px; text-align:center;">
                    Добавить в список желаний
                </p></a>
            <? endif;?>
        </div>
    </div>
    <div class="detail-info" id="tabs">
        <a class="anchor" name="mark_2"></a>
        <ul class="mytabs" >
            <li><a href="#fragment-1">Описание</a></li>
            <li class="current"><a href="#fragment-2">Характеристики</a></li>
            <li><a href="#fragment-3">Отзывы</a></li>
        </ul>

        <div class="mytabs-container" name="fragment-1">
            <?=$description?>
        </div>
        <div class="mytabs-container" name="fragment-2">

            <?php foreach ($good_chars as $char): ?>
                <div class="table-characteristics ">
                    <dl><?=$char['char_name_ru']?></dl>
                    <dd><p><?=$char['char_value']?></p></dd>
                </div>
            <?php endforeach;?>

        </div>
        <div class="mytabs-container" name="fragment-3">
            <div class="reviews_container font14 ff-BenderRegular">

                <div class="comments">
                    <h4>Отзывы покупателей</h4>
                    <?=Modules::run('comments/include_comments', $data['category'], $data['id'])?>
                </div>

                <div id="add_comment" class="comment_form">

                    <?=Modules::run('comments/include_forms', $data['category'], $data['id'])
                    /*=$this->load->view('answer_form_view', $data)*/?>
                </div>
            </div>
        </div>
    </div>
</div>