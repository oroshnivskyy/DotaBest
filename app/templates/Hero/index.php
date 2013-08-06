<section id="gridSystem">
    <div class="row-fluid">
        <div class="row">
            <div class="span6" style="padding-left: 70px; padding-bottom: 20px;">
                <h2 style="font-weight: bold; color: #B94A48; font-size: 18px;"><?php echo $vars['name'] ?></h2>
                <img src="<?php echo $vars['image'] ?>" alt="<?php echo $vars['name'] ?>"/>
            </div><!-- /.span -->
            <div class="span6" style="width: 500px;">
                <p><?php //echo $vars['description'] ?></p>
            </div><!-- /.span -->
        </div>
        <div class="span8">
            <h3>Все батлы героев</h3>
            <p>Полный список все батлов между героями.</p>
            <p>Чтоб перейти на страницу голосования выбери против кого голосовать.</p>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th><?php echo $vars['name'] ?></th>
                        <th>Герои</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach( $battles as $battle):?>
                        <?php if( $vars['id'] == $battle['hero_id_a']):?>
                            <tr>
                                <th><code><a href="/battle/<?php echo $battle['id'];?>"><?php echo $battle['score_a'].' - '.$battle['score_b']?></a>
                                    </code>
                                </th>
                                <td><a href="/battle/<?php echo $battle['id'];?>"><?php echo $battle['name_b']?></a></td>
                            </tr>
                        <?php else: ?>
                            <tr>
                                <th><code><a href="/battle/<?php echo $battle['id'];?>"><?php echo $battle['score_b'].' - '.$battle['score_a']?></a></code></th>
                                <td><a href="/battle/<?php echo $battle['id'];?>"><?php echo $battle['name_a']?></a></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>