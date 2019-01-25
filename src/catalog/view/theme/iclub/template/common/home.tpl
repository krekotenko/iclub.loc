<?php echo $header; ?>
<?php echo $content_top; ?>
  <section class="advantages">
    <div class="wrapper-medium">
      <div class="row">
        <?php foreach ($advantages as $key => $advantage) : ?>
        <div class="col-6 col-sm-3">
          <div class="advantages-item icon-group__middle">
            <span class="advantages__icon"><?php echo $advantage['icon']; ?></span>
            <span class="advantages__text"><?php echo $advantage['title']; ?></span>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
<section class="show-room-section">
  <div class="wrapper">
    <div class="show-room-block">
      <div class="show-room-group">
        <div class="show-room__content">
          <h3 class="show-room__title">Приглашаем&nbsp;посетить наши&nbsp;шоу-румы</h3>
          <a href="/" class="btn btn-show-room">Перейти</a>
        </div>
        <div class="show-room__team">
          <img src="/catalog/view/theme/iclub/images/home/team-crop.png" alt="">
        </div>

        <div class="show-room__team-full">
          <img src="/catalog/view/theme/iclub/images/home/team-full.jpg" alt="">
        </div>
      </div>
    </div>
  </div>
</section>
<?php echo $content_bottom; ?>
<?php echo $column_right; ?>
<?php echo $footer; ?>