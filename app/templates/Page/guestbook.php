
  <div class="row show-grid">
      <h3>Гостевая книга</h3>
      <p>Здесь мы прикрутили комментарии для того что б вы могли написать нам ваше сообщение или обращение, иногда может 
      даше ваше желание что то изменить в сайте.</p>


      <div class="row">
          <?php foreach ($comments as $Comment) { ?>
          <div id="comment<?php echo $Comment->id;?>" style="margin-left: auto; margin-right: auto; text-align: left; width: 50%;">
              <h5>
                  <?php echo  ' (' . date('d.m.Y в H:i', strtotime($Comment->created_at)) . ')'; ?>
              </h5>

              <p>
                  <?php echo htmlspecialchars($Comment->text); ?>
              </p>
          </div>
          <div class="separator" style="border-top: 1px #000 dashed; width: 50%; margin: -10px auto 10px auto;"></div>
          <?php }?>
      </div>
      <div class="separator"></div>
      <center>
          <form action="/guestbook" method="POST" class="well" style="margin: 25px 0 0 0;">
        <span class="<?php echo (isset($has_errors) && ($has_errors == true)) ? '' : 'hidden'; ?>" style="color: red; margin: 0 0 5px 0; float: left;">
            Необходимо заполнить все поля формы
        </span>
              <div class="separator"></div>

              <input type="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" placeholder="Email"></br>
              <textarea name="text" class="span3" placeholder="Текст коментария" style="width: 633px; height: 103px;"><?php echo isset($text) ? $text : ''; ?></textarea>
              <div class="separator"></div>

              <button type="submit" class="btn">Написать</button>
          </form>
      </center>
      <div class="separator"></div>

  </div>