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


    <script src="<?=base_url();?>js/jquery-2.2.0.js"></script>
    <script src="<?=base_url();?>js/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?=base_url();?>js/xmlhttprequest.js"></script>
    <!--<script src='https://www.google.com/recaptcha/api.js'></script>*}-->

    <script src="<?=base_url();?>js/slides.min.jquery.js"></script>
    <script src="<?=base_url();?>js/slides.min.jquery.js"></script>




    <!-- Important Owl stylesheet -->
    <link rel="stylesheet" href="<?=base_url();?>owl-carousel/owl.carousel.css">

    <!-- Default Theme -->
    <link rel="stylesheet" href="<?=base_url();?>owl-carousel/owl.theme.css">

    <!--  jQuery 1.7+  -->
    <script src="<?=base_url();?>jquery-1.9.1.min.js"></script>

    <!-- Include js plugin -->
    <script src="<?=base_url();?>assets/owl-carousel/owl.carousel.js"></script>
    <style >
        #owl-demo .item img{
            display: block;
            width: 100%;
            height: 250px;
        }
    </style>


</head>

<body>


<div id="owl-demo" class="owl-carousel owl-theme">

    <div class="item"><img src="<?=base_url();?>images/slider/1.png" alt="The Last of us"></div>
    <div class="item"><img src="<?=base_url();?>images/slider/2.png" alt="GTA V"></div>


</div>



<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
<!--<script src="<?=base_url();?>js/bootstrap.min.js"></script>-->

<script type="text/javascript" src="<?=base_url();?>js/canvas.js"></script>
<script type="text/javascript" src="<?=base_url();?>js/workscripts.js"></script>
<script type="text/javascript" src="https://www.google.com/recaptcha/api.js"></script>
<script>

    $(document).ready(function() {

        $("#owl-demo").owlCarousel({

            navigation : true, // Show next and prev buttons
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem:true,
            itemsScaleUp:true,

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