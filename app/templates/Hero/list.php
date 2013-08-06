<?php
/**
 * Created by JetBrains PhpStorm.
 * User: oleg
 * Date: 7/24/12
 * Time: 12:38 PM
 *
 */

?>
<section id="gridSystem">
    <div class="row-fluid">
        <div class="span8" style="width: 1000px">
            <center>
                <h3>Все Герои</h3>
                <p>Полный список всех героев.</p>

            </center>
            <table class="table table-bordered table-striped">
                <tbody>
                <?php $count=count($heroes); ?>
                <?php for( $i=0;$i<$count;$i++):?>
                    <tr>
                        <th>
                                <a href="/hero/<?php echo $heroes[$i]['id'];?>" style="font-weight: bold; color: #B94A48; font-size: 18px;">
                                    <?php echo $heroes[$i]['name']?>
                                    </br>
                                    <img src="<?php echo $heroes[$i]['image']?>" style="width: 145px;" alt="<?php echo $heroes[$i]['name']?>">
                                </a>
                        </th>
                        <?php $i++; ?>
                        <?php if(isset($heroes[$i])): ?>
                        <th>

                            <a href="/hero/<?php echo $heroes[$i]['id'];?>" style="font-weight: bold; color: #B94A48; font-size: 18px;">
                                <?php echo $heroes[$i]['name']?>
                                </br>
                                <img src="<?php echo $heroes[$i]['image']?>" style="width: 145px;" alt="<?php echo $heroes[$i]['name']?>">
                            </a>
                        </th>
                        <?php endif; ?>

                        <?php $i++; ?>
                        <?php if(isset($heroes[$i])): ?>
                        <th>

                            <a href="/hero/<?php echo $heroes[$i]['id'];?>" style="font-weight: bold; color: #B94A48; font-size: 18px;">
                                <?php echo $heroes[$i]['name']?>
                                </br>
                                <img src="<?php echo $heroes[$i]['image']?>" style="width: 145px;" alt="<?php echo $heroes[$i]['name']?>">
                            </a>
                        </th>
                        <?php endif; ?>
                        <?php $i++; ?>
                        <?php if(isset($heroes[$i])): ?>
                        <th>

                            <a href="/hero/<?php echo $heroes[$i]['id'];?>" style="font-weight: bold; color: #B94A48; font-size: 18px;">
                                <?php echo $heroes[$i]['name']?>
                                </br>
                                <img src="<?php echo $heroes[$i]['image']?>" style="width: 145px;" alt="<?php echo $heroes[$i]['name']?>">
                            </a>
                        </th>
                        <?php endif; ?>
                        <?php $i++; ?>
                        <?php if(isset($heroes[$i])): ?>
                        <th>

                            <a href="/hero/<?php echo $heroes[$i]['id'];?>" style="font-weight: bold; color: #B94A48; font-size: 18px;">
                                <?php echo $heroes[$i]['name']?>
                                </br>
                                <img src="<?php echo $heroes[$i]['image']?>" style="width: 145px;" alt="<?php echo $heroes[$i]['name']?>">
                            </a>
                        </th>
                        <?php endif; ?>
                    </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>