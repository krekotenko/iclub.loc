<?php if ($products) { ?>
<?php foreach ($products as $key => $product) : ?>
<div class="col-auto col-lg-4">
    <div class="products-wrapper">
        <div class="products__item products__zoom">


            <?php echo $product['colorsmodule'];?>

            <div class="products__body">
                <a href="<?php echo $product['href']; ?>" class="products__img">
                    <img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>">
                </a>
                <a href="#single-prouct" class="products__name"><?php echo $product['name']; ?></a>
                <div class="products__prices inline-groups__middle">

                    <?php if($product['special']) : ?>
                    <div class="products__prices-old inline-groups__bottom"><span><?php echo $product['price']; ?></span> <span>грн</span></div>
                    <div class="products__prices-new inline-groups__bottom"><strong><?php echo $product['special']; ?></strong> <span>грн</span></div>
                    <?php else :?>
                    <div class="products__prices-new inline-groups__bottom"><strong><?php echo $product['price']; ?></strong> <span>грн</span></div>
                    <?php endif; ?>

                </div>
                <?php if($product['totalReviews']) :?>
                <a href="<?php echo $product['href']; ?>#review" class="products__reviews">
                    <div class="products__stars">
                        <div class="reviews-stars-outer">
                            <div class="reviews-stars__empty">
                                <?php for( $i = 0; $i <= 5; $i++ ) : ?>
                                <svg viewBox="0 0 16 16" width="16px" height="16px">
                                    <use xlink:href="#star-empty"></use>
                                </svg>
                                <?php endfor; ?>
                            </div>
                        </div>
                        <div class="reviews-stars-outer" style="width:<?php echo ($product['srReviews']*100)/5; ?>%">
                            <div class="reviews-stars__full">
                                <?php for( $i = 0; $i <= 5; $i++ ) : ?>
                                <svg fill="#ffd541" viewBox="0 0 16 16" width="16px" height="16px">
                                    <use xlink:href="#star-full"></use>
                                </svg>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                    <div class="products__comments"><?php echo $product['totalReviews']; ?> отзывов</div>
                </a>
                <?php else :?>
                <a href="<?php echo $product['href']; ?>#review" class="products__reviews"><div class="products__comments">Оставить отзыв</div></a>
                <?php endif;?>
                <div class="products__buttons">
                    <a href="<?php echo $product['href']; ?>" class="btn btn-buy inline-group">
                        <span class="btn-buy__icon">
                            <svg viewBox="0 0 100 100" width="18px" height="22px" class="colored_white"><use xlink:href="#buy"></use></svg>
                        </span>
                        <span class="btn-buy__text">купить</span>
                    </a>
                    <a href="<?php echo $product['href']; ?>" class="btn btn-like js-btn-like">
                        <svg viewBox="0 0 110 100" width="25px" fill="#ffffff" stroke="#269fee"><use xlink:href="#like"></use></svg>
                    </a>
                </div>
                <div class="products__descr">

                    <?php foreach ($product['attribute_groups'] as $attribute_group) { ?>
                    <?php foreach ($attribute_group['attribute'] as $attribute) : ?>
                    <?php echo trim($attribute_group['name'],':'); ?>/<?php echo $attribute['name']; ?><br/>
                    <?php endforeach; ?>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>

</div>
<?php endforeach; ?>
<?php } ?>