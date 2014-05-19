<!DOCTYPE html>
<?$pageUri = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
$pageTitle = isset($metaTags['title'])?$metaTags['title']:'';?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="en" name="language">
    <title><?php if( isset($metaTags['title']) ): echo $metaTags['title'];?><?php else: ?>Dota2Best.com<?php endif; ?></title>
    <meta name="description" content="<?php if( isset($metaTags['description']) ) echo $metaTags['description'];?>" />
    <meta name="google-site-verification" content="lTnxSVH-sQ7qqTnRi_ep3xPXSiy4qfwxQkibtbfnuyM" />
    <meta name='yandex-verification' content='5a5f15ed5d73d5ab' />
    
<!--    <script src="/bootstrap/js/bootstrap.min.js" type="text/javascript">-->
    <link href="/web/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
    <link href="/web/bootstrap/css/bootstrap-responsive.min.css" type="text/css" rel="stylesheet"/>
    <link href="/web/bootstrap/css/docs.css" type="text/css" rel="stylesheet"/>
    
    <link rel="shortcut icon" href="/favicon.ico">
    
    <style>
        body {
            padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
        }
    </style>

    <link rel="stylesheet" href="/web/style/style.css" type="text/css" media="screen" />
<!--    <script type="text/javascript" src="/js/cufon-yui.js" ></script>-->
<!--    -->
    <link rel="image_src" href="/images/img1.jpg" />
    <script src="/web/js/jquery-1.5.2.min.js" type="text/javascript"></script>
<!--    <script src="/js/script.js" type="text/javascript"></script>-->
    
    <!-- Put this script tag to the <head> of your page -->
    <script type="text/javascript" src="http://userapi.com/js/api/openapi.js?50"></script>

    <script type="text/javascript">
      VK.init({apiId: 3049177, onlyWidgets: true});
    </script>
    
</head>
<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="/" style="color: #b94a48; font-weight: bold;">DotA2Best.Com</a>
            <div class="nav-collapse">
                <ul class="nav">
                    <li  <?php if(!isset($metaTags['active_tab'])): ?>class="active"<?php endif; ?>><a href="/">Главная</a></li>
                    <li <?php if(isset($metaTags['active_tab'])&&$metaTags['active_tab']=='doter_list'): ?>class="active"<?php endif; ?>><a href="/best">Лучшие в Dota</a></li>
                    <li <?php if(isset($metaTags['active_tab'])&&$metaTags['active_tab']=='hero_list'): ?>class="active"<?php endif; ?>><a href="/heroes">Список героев</a></li>
                    <li <?php if(isset($metaTags['active_tab'])&&$metaTags['active_tab']=='guest_book'): ?>class="active"<?php endif; ?>><a href="/guestbook">Гостевая книга</a></li>
                </ul>
                <ul class="nav">
                    <? if (!DEBUG): ?>
                        <li style="padding-top: 10px; padding-left: 5px;">
                            <script type="text/javascript" src="//yandex.st/share/share.js"
                                    charset="utf-8"></script>
                            <div class="yashare-auto-init" data-yashareL10n="ru"
                                 data-yashareQuickServices="yaru,vkontakte,facebook,odnoklassniki,moimir,gplus" data-yashareTheme="counter"
                                ></div>
                        </li>
                    <? endif;?>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>
<div class="container">
            <?php require $path ?>
    <footer class="footer">
        <p class="pull-right"><a href="#">На Верх</a></p>
        <p>Рейтинг Героев проставлен абсолютно только на ваше усмотрение и оно никак не зависит от нас.</p>
        <p>Не забывайте что свою оценку желательно прокомментировать что б было всем понятно какое ваше отношение к тому или иному герою Доты 2 .</p>
        <p>Фанс сайт любителей Доты 2 а в частности их главных героев. © <a href="http://dota2best.com">dota2best.com</a>.</p>
        <div>
            <!-- Yandex.Metrika informer -->
            <a href="http://metrika.yandex.ru/stat/?id=16075396&amp;from=informer"
               target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/16075396/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
                                                style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:16075396,type:0,lang:'ru'});return false}catch(e){}"/></a>
            <!-- /Yandex.Metrika informer -->

            <!-- Yandex.Metrika counter -->
            <script type="text/javascript">
            (function (d, w, c) {
                (w[c] = w[c] || []).push(function() {
                    try {
                        w.yaCounter16075396 = new Ya.Metrika({id:16075396, enableAll: true, webvisor:true});
                    } catch(e) {}
                });
    
                var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
                s.type = "text/javascript";
                s.async = true;
                s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";
    
                if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f);
                } else { f(); }
            })(document, window, "yandex_metrika_callbacks");
            </script>
            <noscript><div><img src="//mc.yandex.ru/watch/16075396" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
            <!-- /Yandex.Metrika counter -->
        </div>
        <div>
            <!--LiveInternet counter--><script type="text/javascript"><!--
                document.write("<a href='http://www.liveinternet.ru/click' "+
                    "target=_blank><img src='//counter.yadro.ru/hit?t14.6;r"+
                    escape(document.referrer)+((typeof(screen)=="undefined")?"":
                    ";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
                        screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
                    ";"+Math.random()+
                    "' alt='' title='LiveInternet: number of pageviews for 24 hours,"+
                    " of visitors for 24 hours and for today is shown' "+
                    "border='0' width='88' height='31'><\/a>")
                //--></script><!--/LiveInternet-->

        </div>
    </footer>
    </div>
<div style="bottom: 0px; position: fixed;">
<?php Debug::showSystemUsage() ?>
</div>
</body>
</html>
