//
// основной объект
//
var main = {
    total: { // объект со значениями счетчиков для каждой сети
        fb_cnt:null,
        vk_cnt:null,
        tw_cnt:null
    },
    init: function(){
        pageuri = from_page.pageuri; // из объекта со страницы
    },
    // вывод обшего рейтинга
    total_count: function(container, total){
        $(container).text(total);
    },
    // отображение блока с социальными кнопками
    display_block: function(container){
        $(container).show();
    }
}
//
// социальные кнопки и счетчики
//
var social = {
    // получаем счетчик facebook
    fb_count: function(container){
        $.getJSON('http://api.facebook.com/restserver.php?method=links.getStats&callback=?&urls=' + escape(pageuri) + '&format=json', function(data) {
            // вставляем в DOM
            $('span', container).text(data[0].share_count);
            main.total.fb_cnt = parseInt(data[0].share_count);
        });
    },
    // получаем счетчик vkontakte
    vk_count: function(container){
        VK = {};
        VK.Share = {};
        VK.Share.count = function(index, count){
            // вставляем в DOM
            $('span', container).text(count);
            main.total.vk_cnt = parseInt(count);
        };
        $.getJSON('http://vkontakte.ru/share.php?act=count&index=1&url=' + pageuri + '&format=json&callback=?');
    },
    // получаем счетчик twitter
    tw_count: function(container){
        $.getJSON('http://urls.api.twitter.com/1/urls/count.json?url=' + pageuri + '&callback=?', function(data) {
            // вставляем в DOM
            $('span', container).text(data.count);
            main.total.tw_cnt = parseInt(data.count);
        });
    },
    // по клику по кнопке
    click_button: function(container){
         var click = false;
           $(container).click(function(){
               // проверяем был ли уже клик по кнопке
               if(!click){
                   var social_box = $(this).parent('div');
                   // увеличиваем значение счетчика социалки на 1
                   var count = parseInt($('span', social_box).text());
                   if(!isNaN(count)){
                       count = count + 1;
                       $('span', social_box).text(count);
                   }
                   // увеличиваем общий рейтинг на 1
                   var total_cnt = parseInt($('#total_count').text());
                   if(!isNaN(total_cnt)){
                       total_cnt = total_cnt + 1;
                       $('#total_count').text(total_cnt);
                   }
                   click = true;
               }
               // открываем окно
               window.open($(this).attr("href"),'displayWindow', 'width=700,height=400,left=200,top=100,location=no, directories=no,status=no,toolbar=no,menubar=no');
                return false;
           });
    }
}

//
// после загрузки страницы начинаем все выводить и запускать
//
$(function(){
    var total_rating = 0; // общий рейтинг
    var i = 0;
    main.init();
    // функции открытия нового окна по клику по кнопке
    social.click_button("#fb_btn");
    social.click_button("#vk_btn");
    social.click_button("#tw_btn");
    // получаем счетчики для каждой сети
    social.fb_count("#fb_sharer");
    social.vk_count("#vk_sharer");
    social.tw_count("#tw_sharer");
    // проверяем получены ли счетчики и отображаем блок с кнопками
    interval = setInterval(function() {
            i++;
            // как только объект main.total содержит значения
            if((main.total.fb_cnt !== null && main.total.vk_cnt !== null && main.total.tw_cnt !== null)){
                // расчитываем общий рейтинг и добавляем его в DOM
                total_rating = main.total.fb_cnt + main.total.vk_cnt + main.total.tw_cnt;
                main.total_count('#total_count', total_rating);
                // отображаем блок с социальными кнопками
                main.display_block('#social_block');
                // очищаем интервал
                clearInterval(interval);
            } else if(i > 30){
                // очищаем интервал после 50 повторов
                clearInterval(interval);
            }
        }, 100);
});