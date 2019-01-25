<section class="home-banner">
  <div classa="home-carousel">
    <div class="js-home-carousel">

      <?php foreach ($banners as $banner) { ?>
      <div class="home-carousel-item" style="background-image: url(<?php echo $banner['image']; ?>)">
        <div class="wrapper">
          <div class="home-carousel__content">
            <h3><?php echo $banner['title']; ?></h3>
            <p><?php echo $banner['text']; ?></p>
            <?php if ($banner['link']) { ?>
            <a href="<?php echo $banner['link']; ?>" class="btn"><?php echo $banner['button']; ?></a>
            <?php } ?>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
