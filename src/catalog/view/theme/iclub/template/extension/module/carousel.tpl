<section class="brands-section">
  <div class="wrapper">
    <div class="brands-carousel">
      <div class="js-brands-carousel">
        <?php foreach ($banners as $banner) { ?>
            <div class="brands-item">
              <img src="<?php echo $banner['image']; ?>" alt="">
            </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript"><!--
$('#carousel<?php echo $module; ?>').owlCarousel({
	items: 6,
	autoPlay: 3000,
	navigation: true,
	navigationText: ['<i class="fa fa-chevron-left fa-5x"></i>', '<i class="fa fa-chevron-right fa-5x"></i>'],
	pagination: true
});
--></script>