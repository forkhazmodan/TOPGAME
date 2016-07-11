<!DOCTYPE html>
<html>
<head>
    <!--HEAD-->
    <title> TOPGAME - интернет магазин геймерских товаров </title>
    <meta charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icom" href="<?=base_url();?>images/shortcut-icon.png" />
    <link href="<?=base_url();?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>css/style-font.css">


    <script src="<?=base_url();?>js/jquery-2.2.0.js"></script>
    <script src="<?=base_url();?>js/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?=base_url();?>js/xmlhttprequest.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>


    <script src="<?=base_url();?>js/slides.min.jquery.js"></script>


    <script src="<?=base_url();?>js/workscripts.js"></script>

</head>
<body>
    <header>
        {AUTH}
        <div id="mzz-content-locker" class="mzz-content-locker" ></div>
        {HEADER}
    </header>

    <div id="body">
        <div class="main-container">

            <div class="main">
                <div id="ContentLight">

                        {CONTENT}
                </div>
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

    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>