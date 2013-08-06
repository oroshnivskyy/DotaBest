
<div class="row-fluid">
    <?php /*?>
<script type="text/javascript">
        from_page = {pageuri : '<?=$pageUri?>'}
    </script>
    <h1>Кастомные социальные кнопки</h1>
    <div class="left">
        <p>Недавно участвовал в разработке одного проекта — фото конкурса. По задумке, рейтинг фото альбомов должен формироваться из суммы всех публикаций в социальных сетях: Facebook, Вконтакте, Twitter. Т.е. общий рейтинг фотоальбома расчитывается:</p>
        <p><blockqoute>Рейтинг фотоальбома = кол-во «Share» в Facebook + кол-во «Сохранить» в Вконтакте + кол-во «Retweet» в Twitter</blockqoute></p>
        <p>На макетах, вид кнопок несколько отличался от предоставляемых социальными сетями плагинов, формируемых функциями api. В частности вид счетчиков:</p>
        <p><img alt="image" src="images/img1.jpg"/></p>
        <p>Помимо несоответствий с дизайном, каждый плагин формирует излишний хтмл код, а хотелось бы лаконичный.</p>
        <p>Детальнее ознакомившись с api каждой сети, окончательно убедились в отсутствии расширенных возможностей для кастомизации кнопок и этот факт понять можно, все стремятся к единоборазности своих кнопок. Решили отказаться от использования готовых плагинов и сделать свои кнопки.</p>
        <p>Итак:</p>
        <ul>
            <li>количество лайков будем получать от REST сервисов каждой социалки</li>
            <li>кнопки рисуем свои и обрабатываем событие click</li>
        </ul>
        <p><a href="http://habrahabr.ru/blogs/social_networks/116584/">Читать далее</a></p>
    </div>
    <div class="right">
        <div id="social_block">
            <div id="vk_sharer">
                <span>0</span>
                <a id="vk_btn" href="http://vkontakte.ru/share.php?url=<?=urlencode($pageUri)?>" target="_blank" title="Сохранить Вконтакте">Сохранить</a>
            </div>
            <div id="fb_sharer">
                <span>0</span>
                <a id="fb_btn" href="http://www.facebook.com/sharer.php?u=<?=urlencode($pageUri)?>&t=<?=urlencode($pageTitle)?>&src=sp" target="_blank" title="Мне нравится">Нравится</a>
            </div>
            <div id="tw_sharer">
                <span>0</span>
                <a id="tw_btn" href="http://twitter.com/share?url=<?=urlencode($pageUri)?>&text=<?=urlencode($pageTitle)?>" target="_blank" title="Retweet">Retweet</a>
            </div>
            <hr/>
            <div id="total_count">0</div>
        </div>
    </div>

<?php */?>
</div>
<section id="gridSystem">
    <center><h2>ВСЕ ГЕРОИ ДОТЫ 2 ГОЛОСОВАНИЕ ОНЛАЙН !!!"</h2></center>
    <center>Добавлена возможность повторного голосования. Раз в сутки!</center>
    <center>Добавлено голосование за <a href="/best">лучшего игрока Dota!</a></center>
    <center>Постоянно добавляется новый функционал!</center>
    <?php // BEST HERO ?>
    <?php if($bestBattle['score_a']!=$bestBattle['score_b']): ?>
    <div class="row show-grid">
        <div class="span12">
            <p>
                <a style="font-weight: bold; color: #B94A48; font-size: 22px;" href="/hero/<?php echo $bestHero['hero_id']; ?>">
                    <?php echo $bestHero['hero_name']; ?>
                </a>
            </p>
            <img src="<?php echo $bestHero['hero_image'] ?>" alt="<?php echo $bestHero['hero_name'] ?>"/>
            <p style="color: #0480be; font-weight: bold; font-size: 14px;">Набрал всего голосов - <?php echo $bestHeroScore;?></p>
        </div>
    </div>
<?php endif; ?>
    <?php // BEST PAIR ?>
    <div class="row show-grid">
        <div class="span6">
            <p>
                <a style="font-weight: bold; color: #77403F; font-size: 18px;" href="/hero/<?php echo $bestBattle['hero_id_a']; ?>">
                    <?php echo $bestBattle['name_a']; ?>
                </a>
            </p>
            <img src="<?php echo $bestBattle['image_a'] ?>" alt="<?php echo $bestBattle['name_a'] ?>"/>
            <p style="color: #0480be; font-weight: bold; font-size: 14px;">Проголосовали - <?php echo $bestBattle['score_a']; ?> раз</p>
            <a href="/fight/<?php echo $bestBattle['battle_id']?>/0" class="btn btn-danger">Голосовать</a>
        </div>
        <div class="span6">
            <p>
                <a style="font-weight: bold; color: #77403F; font-size: 18px;" href="/hero/<?php echo $bestBattle['hero_id_b']; ?>">
                    <?php echo $bestBattle['name_b']; ?>
                </a>
            </p>
            <img src="<?php echo $bestBattle['image_b'] ?>" alt="<?php echo $bestBattle['name_b'] ?>"/>
            <p style="color: #0480be; font-weight: bold; font-size: 14px;">Проголосовали - <?php echo $bestBattle['score_b']; ?> раз</p>
            <a href="/fight/<?php echo $bestBattle['battle_id']?>/1" class="btn btn-danger">Голосовать</a>
        </div>
    </div>

    <?php // BEST PREVIOUS MATCHES ?>
    <div class="row show-grid">
        <div class="span3">
            <p>
                <a style="font-weight: bold; color: #77403F; font-size: 18px;" href="/hero/<?php echo $bestBattles2lvl[0]['hero_id_a']; ?>">
                    <?php echo $bestBattles2lvl[0]['name_a']; ?>
                </a>
            </p>
            <img src="<?php echo $bestBattles2lvl[0]['image_a'] ?>" alt="<?php echo $bestBattles2lvl[0]['name_a'] ?>"/>
            <p style="color: #0480be; font-weight: bold; font-size: 14px;">Проголосовали - <?php echo $bestBattles2lvl[0]['score_a']; ?> раз</p>
            <a href="/fight/<?php echo $bestBattles2lvl[0]['battle_id']?>/0" class="btn btn-danger">Голосовать</a>
        </div>
        <div class="span3">
            <p>
                <a style="font-weight: bold; color: #77403F; font-size: 18px;" href="/hero/<?php echo $bestBattles2lvl[0]['hero_id_b']; ?>">
                    <?php echo $bestBattles2lvl[0]['name_b']; ?>
                </a>
            </p>
            <img src="<?php echo $bestBattles2lvl[0]['image_b'] ?>" alt="<?php echo $bestBattles2lvl[0]['name_b'] ?>"/>
            <p style="color: #0480be; font-weight: bold; font-size: 14px;">Проголосовали - <?php echo $bestBattles2lvl[0]['score_b']; ?> раз</p>
            <a href="/fight/<?php echo $bestBattles2lvl[0]['battle_id']?>/1" class="btn btn-danger">Голосовать</a>
        </div>
        <div class="span3">
            <p>
                <a style="font-weight: bold; color: #77403F; font-size: 18px;" href="/hero/<?php echo $bestBattles2lvl[1]['hero_id_a']; ?>">
                    <?php echo $bestBattles2lvl[1]['name_a']; ?>
                </a>
            </p>
            <img src="<?php echo $bestBattles2lvl[1]['image_a'] ?>" alt="<?php echo $bestBattles2lvl[1]['name_a'] ?>"/>
            <p style="color: #0480be; font-weight: bold; font-size: 14px;">Проголосовали - <?php echo $bestBattles2lvl[1]['score_a']; ?> раз</p>
            <a href="/fight/<?php echo $bestBattles2lvl[1]['battle_id']?>/0" class="btn btn-danger">Голосовать</a>
        </div>
        <div class="span3">
            <p>
                <a style="font-weight: bold; color: #77403F; font-size: 18px;" href="/hero/<?php echo $bestBattles2lvl[1]['hero_id_b']; ?>">
                    <?php echo $bestBattles2lvl[1]['name_b']; ?>
                </a>
            </p>
            <img src="<?php echo $bestBattles2lvl[1]['image_b'] ?>" alt="<?php echo $bestBattles2lvl[1]['name_b'] ?>"/>
            <p style="color: #0480be; font-weight: bold; font-size: 14px;">Проголосовали - <?php echo $bestBattles2lvl[1]['score_b']; ?> раз</p>
            <a href="/fight/<?php echo $bestBattles2lvl[1]['battle_id']?>/b" class="btn btn-danger">Голосовать</a>
        </div>
    </div>

    <div class="row show-grid">
        <?php for( $i = 0; $i < count( $bestBattles3lvl ); $i++ ): ?>
        <div class="span2" style="width: 120px;">
            <p>
                <a style="font-weight: bold; color: #77403F; font-size: 18px;"
                   href="/hero/<?php echo $bestBattles3lvl[$i]['hero_id_a']; ?>">
                    <?php echo $bestBattles3lvl[$i]['name_a']; ?>
                </a>
            </p>
            <img src="<?php echo $bestBattles3lvl[$i]['image_a'] ?>"
                 alt="<?php echo $bestBattles3lvl[$i]['name_a'] ?>"/>
            <p style="color: #0480be; font-weight: bold; font-size: 14px;">
                Проголосовали - <?php echo $bestBattles3lvl[$i]['score_a']; ?> раз
            </p>
            <a href="/fight/<?php echo $bestBattles3lvl[$i]['battle_id']?>/0" class="btn btn-danger">Голосовать</a>
        </div>
        <div class="span2" style="width: 120px;">
            <p>
                <a style="font-weight: bold; color: #77403F; font-size: 18px;"
                   href="/hero/<?php echo $bestBattles3lvl[$i]['hero_id_b']; ?>">
                    <?php echo $bestBattles3lvl[$i]['name_b']; ?>
                </a>
            </p>
            <img src="<?php echo $bestBattles3lvl[$i]['image_b'] ?>"
                 alt="<?php echo $bestBattles3lvl[$i]['name_b'] ?>"/>
            <p style="color: #0480be; font-weight: bold; font-size: 14px;">
                Проголосовали - <?php echo $bestBattles3lvl[$i]['score_b']; ?> раз
            </p>
            <a href="/fight/<?php echo $bestBattles3lvl[$i]['battle_id']?>/1" class="btn btn-danger">Голосовать</a>
        </div>
        <?php endfor; ?>
    </div>

</section>