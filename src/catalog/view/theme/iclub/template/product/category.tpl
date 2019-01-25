<?php echo $header; ?>

<?php

$filters = [];

?>
<section class="page-section category-section">
  <div class="wrapper">

    <div class="breadcrumb-block">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <?php foreach ($breadcrumbs as $breadcrumb) { ?>
          <li class="breadcrumb-item"><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
          <?php } ?>
          <li class="breadcrumb-item active" aria-current="page"><?php echo $heading_title; ?></li>
        </ol>
      </nav>
    </div>

    <h1 class="h1"><?php echo $heading_title; ?></h1>

    <div class="category">

      <div class="row">
        <div class="col col-md-3 col-lg-3">
          <?php if ($column_left) { ?>

          <aside class="accordion filter-block js-filter-block">
            <?php echo($column_left);?>
          </aside>

          <?php } ?>
        </div>
        <div class="col-lg-9">
          <div class="row align-items-center justify-content-between">
            <div class="col col-sm-auto">
              <a href="#" class="btn btn-filter js-btn-filter inline-groups__middle">
                                <span class="btn-filter__icon">
                                    <svg viewBox="0 0 20 22" width="29px" height="22px" class="colored_white">
                                        <use xlink:href="#filter"></use>
                                    </svg>
                                </span>
                <span class="btn-filter__text">Фильтр</span>
              </a>
            </div>
            <div class="col col-sm-auto">
              <div class="price-filter text-right">
                <div class="inline-groups__middle">
                  <span class="price-filter__text">Сортировка:</span>
                  <form>
                    <select id="filter-sort-select" class="price-filter__select js-select">
                      <?php foreach ($sorts as $sorts) { ?>
                      <?php if ($sorts['value'] == $sort) { ?>
                      <option value="<?php echo $sorts['value']; ?>" selected="selected"> <?php echo $sorts['text']; ?></option>
                      <?php } else { ?>
                      <option value="<?php echo $sorts['value']; ?>"><?php echo $sorts['text']; ?></option>
                      <?php } ?>
                      <?php } ?>
                    </select>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="products-category">
            <div class="row no-gutters justify-content-center">
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
                      <a href="<?php echo $product['href']; ?>" class="products__name"><?php echo $product['name']; ?></a>
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
                        <a href="#" class="btn btn-like js-btn-like">
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
            </div>
          </div>

          <div class="text-center">
            <?php if($pagination->total > $pagination->limit) { ?>
            <div data-page="<?php echo $pagination->page; ?>" class="btn btn-load-more inline-groups__middle">
                            <span class="load-more__icon">
                                <svg viewBox="0 0 22 24" width="22px" height="24px" class="colored_main ">
                                    <use xlink:href="#refresh"></use>
                                </svg>
                            </span>

              <span class="load-more__text">Показать еще</span>
              <?php } ?>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

</section>
<?php echo $footer; ?>