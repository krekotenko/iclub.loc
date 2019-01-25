<?php if ($reviews) { ?>
<?php foreach ($reviews as $review) { ?>


<div class="product-comments-element">
  <div class="inline-groups__middle product-comments-head">
    <div class="product-comments__name"><?php echo $review['author']; ?></div>
    <div class="products__stars">
      <div class="reviews-stars-outer">
        <div class="reviews-stars__empty">
          <?php for( $i = 0; $i < 5; $i++ ) : ?>
          <svg viewBox="0 0 16 16" width="16px" height="16px">
            <use xlink:href="#star-empty"></use>
          </svg>
          <?php endfor; ?>
        </div>
      </div>
      <div class="reviews-stars-outer" style="width:<?php echo ($review['srReviews']*100)/5; ?>%">
        <div class="reviews-stars__full">
          <?php for( $i = 0; $i < 5; $i++ ) : ?>
          <svg fill="#ffd541" viewBox="0 0 16 16" width="16px" height="16px">
            <use xlink:href="#star-full"></use>
          </svg>
          <?php endfor; ?>
        </div>
      </div>
    </div>
    <div class="product-comments__date"><?php echo $review['date_added']; ?></div>
  </div>
  <div class="product-comments-body">
    <div class="product-comments-body__item product-comments-body__text">
      <?php echo $review['text']; ?>
    </div>
    <div class="product-comments-body__item product-reviews-option">

      <?php if($review['paramReview']) :?>
        <?php foreach($review['paramReview'] as $item) :?>
          <?php if(!$item['value']) continue; ?>
          <div class="product-reviews-option-group inline-groups__middle">
            <div class="product-reviews-option-group__name"><?php echo $item['name'];?></div>
            <div class="product-reviews-option-group__raiting">
              <div class="product-reviews-option__empty">
                <?php for( $i = 0; $i <= 4; $i++ ) : ?>
                <span></span>
                <?php endfor; ?>
              </div>
              <div class="product-reviews-option__full" style="width:<?php echo ($item['value']*100)/5; ?>%">
                <?php for( $i = 0; $i <= 4; $i++ ) : ?>
                <span></span>
                <?php endfor; ?>
              </div>
            </div>
            <div class="product-reviews-option-group__count"><?php echo $item['value'];?></div>
          </div>
        <?php endforeach;?>
      <?php endif;?>
    </div>
  </div>
</div>

<?php } ?>
<?php } ?>
