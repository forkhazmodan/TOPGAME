/**
 * Created by Max on 20.02.2016.
 */
/* */


$(function()
{// AUTORIZATION FORM
    var contLocker = $("body div#mzz-content-locker");
    var logLink = $("body div#header div.client-bar div.authorization ul li a[name ='enter']"); // a[name ='enter']
    var logForm = $("#log-window");
    var error   = $("span.show_error");
    console.log($(logLink));

    if (logForm.find(error).length > 0)
    {//proverka na oshibki v forme
        contLocker.show(); logForm.show();
    }
    else
    {
        contLocker.hide(); logForm.hide();
    }


    $(logLink).on("click", function(event) {
        event.preventDefault();
        logForm.show();
        contLocker.show();
    });
    $(contLocker).on("click", function(){
        logForm.hide();
        contLocker.hide();
    });
});

$(function()
{// USERs DROP MENU
    var link     = $(".authorization ul li a[name='user_menu']");
    var dropMenu = $("#user_dropbox");
    dropMenu.css('display', 'none');

    link.click(function(event){
        event.preventDefault();
        dropMenu.toggle();


    });
});

$(function()
{ // CATEGORY PANEL
    var h4 =  $(".categories h4").not(":has(a)");
    var allBox = $(".categories div.under_cat");
    var openItem = false;
    allBox.css({"display":"none"});
    var cookie = $.cookie("openItem");


    if($.cookie("openItem") && $.cookie("openItem") != 'false' && $.cookie("openItem") !== undefined){
        openItem = parseInt($.cookie("openItem"));
        h4.eq(openItem).nextUntil("h4").css({"display":"block"});
    }


    h4.on("click", function() {
        var thisBox = $(this).nextUntil("h4");
        //Создаем Кукки
        openItem = h4.index(this);
        $.cookie("openItem", openItem, { expires: 7, path: "/" });

        if (thisBox.css("display") == "block"){
            thisBox.slideUp("fast", "swing");
            $.cookie("openItem", false, { expires: 7, path: "/" });

        }else {
            thisBox.slideDown("normal", "swing");
            allBox.not(thisBox).slideUp("normal", "swing");
        }
    });

});


$(function()
{ // DESCRIPTION CHARS etc.


    /*if(location.pathname.substr(1).match(/^goods\/[a-z]+\/[0-9]+/) != null) {

        var comLinks = $(".product-name span a");
        console.log(comLinks);
        if(comLinks.length != 0)
        {

            var goodsCat = comLinks.attr('href').split('/')[4];
            var goodsId  = comLinks.attr('href').split('/')[5];
            comLinks.click(function(){
                $.cookie("openBox", "fragment-3", {expires: 1, path: "/goods/" + goodsCat + "/" + goodsId});
            });
        }
    }*/
    if(location.pathname.match(/^\/goods\/[a-z]+\/[0-9]+/) != null){

        var cookie = $.cookie("openBox");
        if (cookie == "undefined" || cookie == null) cookie = "fragment-1";

        var URLgoodsId  = location.pathname.split('/')[3].split('#')[0],
            URLgoodsCat = location.pathname.split('/')[2],
            tabs     = $("#tabs ul.mytabs li"),
            tabLinks = $("#tabs ul.mytabs li a"),
            boxes    = $("#tabs > div.mytabs-container"),
            openBox  = $("#tabs > div.mytabs-container[name = '" + cookie + "']"),
            openTab  = $("#tabs ul.mytabs li a[href = '#" + cookie + "']"),
            pathname = $(location).attr('href');

        // Настройки для cookies

        boxes.not(openBox).css("display", "none");
        openBox.css("display", "block");
        tabs.not(openTab.parent()).removeClass("current");
        openTab.parent().addClass("current");

        tabLinks.on("click", function (event) {
            event.preventDefault();

            var thisTabId = $(this).attr('href').replace("#", ""), //fragment-n
                thisTab = $(this).parent(),
                thisBox = $("#tabs > div.mytabs-container[name='" + thisTabId + "']");

            thisTab.addClass("current");
            tabs.not(thisTab).removeClass("current");
            thisBox.css("display", "block");
            boxes.not(thisBox).css("display", "none");
            $.cookie("openBox", thisTabId, {expires: 1, path: "/goods/" + URLgoodsCat + "/" + URLgoodsId});
            //console.log(pathname);
        });
    }
});
$(function()
{// SLIDER
    $('#products').slides({
        preload: true,
        preloadImage: 'images/galery/loading.gif',
        effect: 'slide, fade',
        crossfade: true,
        slideSpeed: 200,
        fadeSpeed: 500,
        generateNextPrev: true,
        generatePagination: false
    });
});
$(function()
{// AJAX timer
    setInterval(function()
    {
        var xhr;

        xhr = getXmlHttpRequest();
        var url = window.location.origin + "/ajax/timer";


        xhr.open("POST", url , true); // +Math.random() - костыль
        xhr.setRequestHeader('X-Requested-With', 'XmlHttpRequest');
        xhr.send(null);
        xhr.onreadystatechange = function(){
            if(xhr.readyState === 4){

                //console.log(request.getResponseHeader("My-Time"));
                //document.getElementById("timer").innerHTML = request.getResponseHeader("My-Time");
                var p = $(document.getElementById("timer").firstChild);
                p.text(xhr.getResponseHeader("My-Time"));
                //.text(document.createTextNode("some text"));
                //request.getResponseHeader("My-Time")
            }
        };
    }, 1000)

});



//////////////////////////////////////////////////////////////////////
//----------------------- ANSWER FORM  -----------------------------//
//////////////////////////////////////////////////////////////////////

$(function()
{ // ANSWER FORM
    var new_comm = $('#new_comment');
    var ans      = $('#add_answer');
    var rev      = $('#add_review');
    var cookie   = $.cookie("reply_to");
    var a        = $('li#comment_'+cookie).find(".toggle")[0];
    var captcha  = $('.g-recaptcha');
    ans.hide();
    if(rev.find(".show_error").length > 0)
    {
        $(a).after(ans);
        ans.css('display', 'block');
    }
    $('a.toggle').click(function(event){
        event.preventDefault();
        var next = $(this).next();
        var id   = $(event.target).parent().attr("id").split("_")[1]; // reply to id



        ans.find("input[name='send_to']").attr('value', id);
        $(event.target).after(ans);
        //rev.attr('action', revAction + '#comment_' + id );

        if($('#new_comment .g-recaptcha').length > 0)
        {
            $('#new_comment .g-recaptcha').remove();
        }

        //captcha.appendTo($('#add_answer div.inner-captcha'));
        captcha.show();

        if(next.attr("id") == "add_answer" && ans.is(':visible'))
        {
            ans.slideUp('fast');
        }
        else
        {
            ans.slideDown('fast');
        }
        $.cookie("reply_to", id, {expires: 1, path: "/goods"});
    });

    rev.on('mouseenter', function() {
        if($('#add_review div.inner-captcha .g-recaptcha').length < 1)
        {

            $(' .g-recaptcha').remove();
            captcha.appendTo($('#add_review div.inner-captcha'));
            captcha.slideDown('fast');
        }
    });
    new_comm.on('mouseenter', function() {
        if($('#add_comment div.inner-captcha .g-recaptcha').length < 1)
        {

            $('.g-recaptcha').remove();
            captcha.appendTo($('#add_comment div.inner-captcha'));
            captcha.slideDown('fast');
        }
    });

});

$(function(){
    //////////////////////////////////////////////////////////////////////
    //--------------------------BASKET----------------------------------//
    //////////////////////////////////////////////////////////////////////
    $("#table_dropbox").hide();

    var add_btn       = $("a[id*='add_']");
    var basketLink    = $(".basket_link");
    var test          = $(".test");

    basketLink.click(function(e)
    {
        e = e || event;
        e.preventDefault();


        if($("#table_dropbox").css("display") == "none")
        {
            $.ajax({
                url: window.location.origin + "/cart/load_cart",
                async: true,
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                    "X-Requested-With": "XmlHttpRequest"
                },
                cache: false,
                type: "POST",
                success: function (data) {
                    $("#table_dropbox").replaceWith(data);
                    loader();
                }
            });
        }
        else
        {
            $("#table_dropbox").css("display" , "none");
        }

    });
    add_btn.click(function(e)
    {//
        e = e|| event;
        e.preventDefault();

        var table   = $("#table_dropbox");
        var good_id = $(this).attr("id").replace("add_","");

        $.ajax({
            url: window.location.origin + "/cart/add_one/" + good_id,
            headers: {
                "Content-Type":"application/x-www-form-urlencoded",
                "X-Requested-With":"XmlHttpRequest"
            },
            cache: false,
            type: "POST",
            success: function(data){

                table.replaceWith(data);
                loader();
            }
        });
    });

    if(location.pathname.match(/^\/goods\/[a-z]+\/[0-9]+/) != null){
        $(".buy-detail").click(function(e)
        {
            e = e || event;
            e.preventDefault();
            var id    = $(this).attr("data-id"),
                table = $("#table_dropbox");

            $.ajax({
                url: window.location.origin + "/cart/add_one/" + id,
                headers: {
                    "Content-Type":"application/x-www-form-urlencoded",
                    "X-Requested-With":"XmlHttpRequest"
                },
                cache: false,
                type: "POST",
                success: function(data){

                    table.replaceWith(data);
                    loader();
                }
            });
        });
    }

    function loader()
    {// Setting plus and minus actions.


        /*var plus  = $(".basket-amount-plus");
        var minus = $(".basket-amount-minus");
        var del   = $(".opt_del");
        var inpt  = $("input[name='quantity']");*/

        $("input[value='Продолжить покупки']").click(function(e){
            e = e || event;
            $("#table_dropbox").toggle();
            
        });



        $(".basket-amount-plus").click(function(e){
            e = e || event;
            e.preventDefault();
            var tr      = $(this).parent().parent(),
                good_id = tr.attr("id").replace("basket_",""),
                table   = $("#table_dropbox");
            $.ajax({
                url: window.location.origin + "/cart/add_one/" + good_id,
                headers: {
                    "Content-Type":"application/x-www-form-urlencoded",
                    "X-Requested-With":"XmlHttpRequest"
                },
                cache: false,
                type: "POST",
                success: function(data){

                    table.replaceWith(data);
                    loader();
                }


            });



        });
        $(".basket-amount-minus").click(function(e)
        {
            e = e || event;
            e.preventDefault();
            var table   = $("#table_dropbox");
            var tr      = $(this).parent().parent();
            var good_id = tr.attr("id").replace("basket_","");

            $.ajax({
                url: window.location.origin + "/cart/minus_one/" + good_id,
                headers: {
                    "Content-Type":"application/x-www-form-urlencoded",
                    "X-Requested-With":"XmlHttpRequest"
                },
                type: "POST",
                cache: false,
                success: function(data){

                    table.replaceWith(data);
                    loader();
                }

            });
        });

        $("input[name='quantity']").bind("input", function(e)
        {//

            var tr      = $(this).parent().parent();
            var good_id = tr.attr("id").replace("basket_","");
            var table   = $("#table_dropbox");
            var chr     = this.value;

            e = e|| event;
            if (this.value.match(/[^0-9]/g))
            {
                this.value = this.value.replace(/[^0-9]/g, '');
            }
            if (this.value == "" || this.value == "0")
            {
                this.value = "1";
            }

            $.ajax({
                url: window.location.origin + "/cart/refresh_one/" + good_id + "/" + chr,
                headers: {
                    "Content-Type":"application/x-www-form-urlencoded",
                    "X-Requested-With":"XmlHttpRequest"
                },
                type: "POST",
                cache: false,

                success: function(data){

                    table.replaceWith(data);
                    loader();
                    //console.log(data);

                }

            });
            //loader();
            //console.log(this.value);
        });




        $(".opt_del").click(function()
        {
            var table   = $("#table_dropbox");
            var tr      = $(this).parent();
            var good_id = tr.attr("id").replace("basket_","");



            tr.remove();
            $.ajax({
                url: window.location.origin + "/cart/del_one/" + good_id,
                headers: {
                    "Content-Type":"application/x-www-form-urlencoded",
                    "X-Requested-With":"XmlHttpRequest"
                },
                type: "POST",
                cache: false,
                success: function(data){

                    table.replaceWith(data);
                    loader();
                }

            });
            /*xhr.open("POST", url , true); // +Math.random() - костыль
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.setRequestHeader('X-Requested-With', 'XmlHttpRequest');
            xhr.send(null);
            xhr.onreadystatechange = function(){
                if(xhr.readyState === 4){

                    var responseText = xhr.responseText;
                    //test.text(responseText);
                    //basketWrapper.html(responseText);
                    table.replaceWith(responseText);
                    loader();
                }
            };*/

        });


    }
    loader();
});

function checkForm(e){

    //////////////////////////////////////////////////////////////////////
    //--------------------------COMMENT_FORM----------------------------//
    //////////////////////////////////////////////////////////////////////


    if (grecaptcha.getResponse() == ""){
        alert("Без капчи нельзя");
    }

    /*e = e || event;
    e.preventDefault();

    var cat     = $("input[name = 'category']").val();
    var id      = $("input[name = 'good_id']").val();


    $.ajax({

        url: window.location.origin + "/comments/add_comment/" + cat + "/" + id,
        headers: {
            "Content-Type":"application/x-www-form-urlencoded",
            "X-Requested-With":"XmlHttpRequest"
        },
        type: "POST",
        cache: false,
        success: function(data){

            $('form#new_comment').replaceWith(data);


        }

    });*/








}
