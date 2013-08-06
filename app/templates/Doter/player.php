<?php
/**
 * Created by JetBrains PhpStorm.
 * User: oleg
 * Date: 7/25/12
 * Time: 10:30 PM
 *
 */
?>
<section id="gridSystem">
    <div class="row-fluid">
        <div class="row">
            <div class="span6" style="padding-left: 70px; padding-bottom: 20px;">
                <h2 style="font-weight: bold; color: #B94A48; font-size: 18px;"><?php echo $doter['name'] ?></h2>
                    <h3><?php echo $doter['team_name'] ?></h3>
            </div><!-- /.span -->
            <div class="span6" style="width: 500px;">
                <h1>
                Голосов : <?php echo $doter['score'] ?>
                    </h1><?php if($has_voted ):?>
                Спасибо за ваш голос
                <?php else: ?>
                <a href="/player/vote/<?php echo $doter['id']?>" class="btn btn-danger">Голосовать</a>
                        <?php endif; ?>
            </div><!-- /.span -->
        </div>
        <div class="span8">
            <div class="row-fluid show-grid" >
                <?php echo $comments ?>
            </div>
        </div>
    </div>
</section>