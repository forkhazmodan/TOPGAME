



    <table id="table_dropbox" class="dropbox">
        <?if(!empty($this->session->userdata('cart'))):?>
            <?foreach($basket_options as $opt):?>
            <tr id="basket_<?=$opt['good_id']?>" class="basket_options">
                <td class="opt_del" >
                    <a href ="#" name="opt_del">X</a>
                </td>
                <td class="opt_text">
                    <p>
                        <?=$opt['full_name']?>
                    </p>
                </td>
                <td class="opt_amount">
                    <a class="basket-amount-minus"  href="#">-</a>
                    <input type="text" name ="quantity" value="<?=$opt['count']?>">
                    <a class="basket-amount-plus" href="#">+</a>
                </td>
                <td class="opt_price price-decor ">

                    <span class= "sum-cy ">
                        <span class="sum" ><?=$opt['total_price']?></span>
                        <span class="cy" >UAH</span>
                    </span>
                </td>
            </tr>
            <?endforeach;?>
        <?endif;?>


        <tr class="total">
            <td class="total-return" colspan="2" rowspan="2">
                <input type="button" class="button" value="Продолжить покупки">
            </td>
            <td colspan="1">
                <p>Всего:</p>
            </td>
            <td class="total-price price-decor" colspan="1">
                <span class= "sum-cy ">
                    <span class="sum" ><?=$amount_price?></span>
                    <span class="cy" >UAH</span>
                </span>
            </td>
        </tr>
        <tr class="basket-buttons">
            <td colspan="2">
                <input type="button" class="button" value="Оформить заказ">
            </td>
        </tr>


    </table>

