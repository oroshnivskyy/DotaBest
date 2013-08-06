<table>
    <?php $i = 0;?>
    <?php foreach( $vars as $item ): ?>
        <tr style="<?php if($i==0):?>background-color: #f4f4f4;<?php endif;?> height:25px;" width="550px;">
            <td width="10%"><?php echo $item['id']?> - </td>
            <td width=""><?php echo $item['name'];?></td>
            <td width="30"> <a href="/admin/hero/edit/<?php echo $item['id']?>">Редактировать </a></td>
        </tr>
        <?php if($i==1) $i = -1;?>
        <?php $i++; ?>
    <?php endforeach; ?>
</table>