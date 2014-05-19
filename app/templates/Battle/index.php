<div class="row-fluid show-grid">
    <div class="span12">
        <p><strong><?php echo $vars['title'] ?></strong></p>
        <div class="row-fluid show-grid">
            <div class="span6" style="padding-top: 15px;">
                <p>
                    <a href="/hero/<?php echo $vars['hero_id_a'] ?>" style="font-weight: bold; color: #B94A48; font-size: 18px;"><?php echo $vars['name_a'] ?></a>
                </p>
                    <img src="<?php echo $vars['image_a'] ?>" alt="<?php echo $vars['name_a'] ?>"/>

                <p>
                <?php if (!$is_voted): ?>
                <a href="/fight/<?php echo $vars['id']?>/0" class="btn btn-danger">Голосовать</a>
                <?php else: ?>
                    Сегодня вы уже проголосовали в
                    этом сравнении</br>
                <a class="btn" href="/battle/<?php echo $battle1Id ?>">Переити в другой бой с етим героем</a>
                <?php endif;?>
                </p>
                <p style="color: #0480be; font-weight: bold; font-size: 14px;">Проголосовали - <?php echo $vars['score_a'] ?> раз</p>
            </div>
            <div class="span6" style="padding-top: 15px;">
                <p>
                    <a href="/hero/<?php echo $vars['hero_id_b'] ?>" style="font-weight: bold; color: #B94A48; font-size: 18px;"><?php echo $vars['name_b'] ?></a>
                </p>

                    <img src="<?php echo $vars['image_b'] ?>" alt="<?php echo $vars['name_b'] ?>"/>
                <p>
                <?php if (!$is_voted): ?>
                <a href="/fight/<?php echo $vars['id']?>/1" class="btn btn-danger">Голосовать</a>
                <?php else: ?>
                    Сегодня вы уже проголосовали в
                    этом сравнении</br>
                <a class="btn" href="/battle/<?php echo $battle2Id ?>"">Переити в другой бой с етим героем</a>
                <?php endif;?>
                </p>
                <p style="color: #0480be; font-weight: bold; font-size: 14px;">Проголосовали - <?php echo $vars['score_b'] ?> раз</p>
            </div>
        </div>
        <br/>
        <div class="row-fluid show-grid">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- dota_best_comment -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:580px;height:400px"
                 data-ad-client="ca-pub-3861532892125732"
                 data-ad-slot="9021787296"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
        <br/>
        <div class="row-fluid show-grid" >
        <?php echo $comments ?>
            </div>
        </br>
        <center>
            <!-- Put this div tag to the place, where the Comments block will be -->
            <div id="vk_comments"></div>
            <script type="text/javascript">
                VK.Widgets.Comments("vk_comments", {limit: 20, width: "600", attach: "*"});
            </script>
        </center>
        <div class="fb-comments" data-href="<?php echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];?>" data-num-posts="10" data-width="600"></div>
    </div>
</div>