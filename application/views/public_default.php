<!DOCTYPE html>
<html>
<head>

    <title> TOPGAME - интернет магазин геймерских товаров </title>
    <meta charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icom" href="<?=base_url();?>images/shortcut-icon.png" />
    <link href="<?=base_url();?>css/bootstrap.min.css" rel="stylesheet">
    <!--<link href="<?=base_url();?>css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>css/style-font.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>css/style.css">

    <link rel="stylesheet" href="<?=base_url();?>owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="<?=base_url();?>owl-carousel/owl.theme.css">

    <script src="<?=base_url();?>js/jquery-2.2.0.js"></script>
    <script src="<?=base_url();?>js/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?=base_url();?>js/xmlhttprequest.js"></script>
    <!--<script src='https://www.google.com/recaptcha/api.js'></script>*}-->

    <script src="<?=base_url();?>js/slides.min.jquery.js"></script>
    <script src="<?=base_url();?>assets/owl-carousel/owl.carousel.js"></script>
    <style >
        #owl-demo .item img{
            margin: 0 auto 0 auto;

            display: block;
            max-width: 1280px;
            height: 248px;
        }

        .owl-theme .owl-controls .owl-buttons div , .owl-theme .owl-controls .owl-pagination{
            position: absolute;
        }

        .owl-theme .owl-controls .owl-pagination
        {
            position:relative;
            bottom: 35px;
            width: 100%;
        }
        .owl-theme .owl-controls .owl-buttons .owl-prev{


            position:relative;
            right: 450px;
            bottom:170px;
        }

        .owl-theme .owl-controls .owl-buttons .owl-next{
            position:relative;
            left: 450px;
            bottom:170px;
        }
    </style>
</head>
<body>
<header>

    <?=Modules::run('users/login_form');?>
    
    <div id="mzz-content-locker" class="mzz-content-locker" ></div>
    <div class="dropbox-cart shadow" ></div>
    
    
    <div id="header">
        <div class="topbar-wrapper">

            <div class="client-bar">
                <div class="contact-address-wrapper">
                    <div class="contact-address-content">
                        <div class="contact">
                            <p>8-093-852-3700</p>
                            <p>8-093-852-3700</p>
						    <span>
							<p>работаем ежедневно</p>
							c 10:00 до 21:00
						    </span>
                        </div>
                        <div id="timer"><p></p></div>
                    </div>
                </div> <!--contact-address-wrapper-->

                <div class="logo">
                    <a href="<?=base_url();?>"></a>
                </div>

                <div class="support-authorization-wrapper">
                    <div class="support">
                        <ul>
                            <li><a href="<?=base_url();?>">Доставка</a></li>
                            <li><a href="<?=base_url();?>">Контакты</a></li>
                            <li><a href="<?=base_url();?>">Гарантия</a></li>
                        </ul>
                    </div>
                    <?=Modules::run('users/users_pannel')?>
                </div>
            </div> <!--client-bar-->

            <div class="nav-bar">
                <ul class="nav-list">
                    <?=Modules::run('navigation/navigation_pannel')?>
                </ul>

                <div class="basket">
                    <a href="#" class="basket_link"><div class="sprite-1"></div>
                        Корзина
                        <div class="sprite-2"></div>
                    </a>
                </div>
                <div id="basket_wrapper"><?=Modules::run('cart/load_cart')?></div>
            </div> 
            <!--/nav-bar-->

        </div>
    </div>
    
    <?if($function == 'eyestoppers_content'):?>
    <?=Modules::run('slider')?>
    <?endif;?>
    
</header>

<div id="body">
    <div class="main-container">

        <?if(!isset($template)):?>
            <div class="header2">

                <div class="search-pannel">
                    <<!--div class="search-form">
                        <form action="" method="get">
                            <div>
                                <input type="search" name="q">
                                <input type="submit" value="">
                            </div>
                        </form>
                    </div>-->
                </div>
                <div class="breadcrumb-filter">
                    <?=Modules::run('breadcrumb/index', $data, $module)?>
                    <!--<div class="filter-wiev">
                        <span>Сортировка:</span>
                        <select>
                            <option selected="selected" value="">По	умолчанию</option>
                            <option value="">Наименование (А -> Я)</option>
                            <option value="">Наименование (Я -> А)</option>
                            <option value="">Цена (по возрастанию)</option>
                            <option value="">Цена (по убыванию)</option>
                            <option value="">Рейтинг (по убыванию)</option>
                            <option value="">Рейтинг (по возрастанию)</option>
                            <option value="">Модель (А -> Я)</option>
                            <option value="https://4frag.ru/igrovye-klaviatury-96/ozone-2200/?sort=p.model&order=DESC">Модель (Я -> А)</option>
                        </select>
                        <div>
                            <span>Вид:</span>
                            <a href="#"><div class="sprite-3"></div></a>
                            <a href="#"><div class="sprite-4"></div></a>
                        </div>
                    </div>-->
                </div>
            </div>
        <?endif;?>


        <div class="main">

            <?if(isset($template) AND $template == 'info'):?>


                <div id="ContentLight">
                    <?=Modules::run($module.'/'.$function, $data = [])?>
                </div>
                
            <?else:?>

                <div class="left_wrapper">
                    <?=Modules::run('categories/include_left_menu') ?>
                </div>
                <div id="content">
                    <?=Modules::run($module.'/'.$function, $data)?>
                </div>

            <?endif;?>
            
        </div>


        <footer class="foot-container">
            <div class="left-foot">
                <p> &#169; Интернет-магазин "TOPGAME"</p>
                <a href="#" alt="#">График работы Call-центра</a><br />
				<span>
					<p>В будние дни с 10 до 21</p>
					<p>Суббота с 11 до 20</p>
					<p>Воскресенье с 11 до 19</p>
				</span>

            </div>
            <div class="mid-foot">
                <p>КАТАЛОГ ТОВАРОВ:</p>
                <a href="#" alt="#">Компьютеры</a><br />
                <a href="#" alt="#">Комплектующие</a><br />
                <a href="#" alt="#">Ноутбуки</a><br />
                <a href="#" alt="#">Клавиатуры</a><br />
                <a href="#" alt="#">Мыши</a><br />
            </div>
            <div class="aftermid-foot">
                <p>ИНФОРМАЦИЯ:</p>
                <a href="#" alt="#">О нас </a><br />
                <a href="#" alt="#">Контакты</a><br />
                <a href="#" alt="#">Доставка</a><br />
                <a href="#" alt="#">Гарантия</a><br />

            </div>
            <div class="right-foot">
                <p>8-093-852-3700</p>
                <p>8-093-852-3700</p>
				<span>
				<p>работаем ежедневно</p>
				c 10:00 до 21:00<br />
				<br />
				<p>м. Левобережная</p>
				<p>ул. Луначарского, 14, Киев</p>
				</span>


            </div>
        </footer>

    </div>
</div>


    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    <!--<script src="<?=base_url();?>js/bootstrap.min.js"></script>-->

<script type="text/javascript" src="<?=base_url();?>js/canvas.js"></script>
<script type="text/javascript" src="<?=base_url();?>js/workscripts.js"></script>
<script type="text/javascript" src="https://www.google.com/recaptcha/api.js"></script>
<script>
    $(document).ready(function() {

        $("#owl-demo").owlCarousel({

            navigation: true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem:true,
            navigationText: [
                "<b class='icon-chevron-left icon-white'><</b>",
                "<b class='icon-chevron-right icon-white'>></b>"
            ],
            autoPlay: 10000,
            // "singleItem:true" is a shortcut for:
            // items : 1,
            // itemsDesktop : false,
            // itemsDesktopSmall : false,
            // itemsTablet: false,
            // itemsMobile : false

        });

    });
</script>

</body>

</html>