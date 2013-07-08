<?php
/**
 * Created by JetBrains PhpStorm.
 * User: oleg
 * Date: 7/25/12
 * Time: 9:36 PM
 *
 */
?>
<section id="gridSystem">
<div class="row-fluid">
    <div class="span8" style="width: 1000px">
        <center>
            <h3>Топовые игроки</h3>
            <p>Список найболее опытных игроков в Dota.</p>
            <p>Если вы считаете что вы достойны быть в этом списке оставте пожалуйсто заявку в <a href="/guestbook">Гостевой книге</a></p>
        </center>
        <table class="table table-bordered table-striped">
            <thead>
            <th>
                <td>

                </td>
                <td>
                    Очки
                </td>
                <td>
                    Коментарии
                </td>
            </th>
            </thead>
            <tbody>
            <?php $count=count($doters); ?>
            <?php for( $i=0;$i<$count;$i++):?>
            <tr>
                <td>
                    <a href="/player/<?php echo $doters[$i]['id'];?>" style="font-weight: bold; color: #B94A48; font-size: 18px;">
                        <?php echo $doters[$i]['name']?>
                    </a>
                    (<?php echo $doters[$i]['team_name'] ?>)
                    <a href="/player/<?php echo $doters[$i]['id'];?>" style="font-weight: bold; font-size: 15px;">
                        Смотреть коментарии
                    </a>
                </td>
                <td>
                    <a href="/player/vote/<?php echo $doters[$i]['id']?>" class="btn btn-danger">Голосовать</a>
                </td>
                <td>
                    <?php echo $doters[$i]['score'] ?>
                </td>
                <td>
                    <?php echo $doters[$i]['comments_count'] ?>
                </td>
            </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>
</div>
</section>