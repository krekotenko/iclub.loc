<?php echo $header; ?>

<section class="page-section product-section">

  <div class="wrapper">

    <div class="breadcrumb-block">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <?php //foreach ($breadcrumbs as $breadcrumb) { ?>
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $heading_title; ?></li>
          <?php //} ?>
        </ol>
      </nav>
    </div>

    <h1 class="h1"><?php echo $heading_title; ?></h1>

    <div class="product-block">

      <div class="product-option">
        <div class="row">
          <div class="col-md-12 col-lg-7">
            <div class="product-carousel">
              <div class="flex-block items-center">
                <div class="product-nav">
                  <div class="js-product-nav">
                    <?php foreach ($images as $image) : ?>
                    <div class="product-nav__item">
                      <img src="<?php echo $image['thumb']; ?>" alt="">
                    </div>
                    <?php endforeach; ?>
                  </div>
                </div>
                <div class="product-for">
                  <div class="js-product-for">
                    <?php foreach ($images as $image) : ?>
                    <div class="product-for__item">
                      <img src="<?php echo $image['popup']; ?>" alt="">
                    </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12 col-lg-5">
            <div class="product-elements">
              <?php if($is_special) :?>
                <div class="product-element">
                  <div class="product-box">
                    <div class="product-timer">
                      <svg viewBox="0 0 112 100" width="112px" height="100px" fill="#ff435e" ><use xlink:href="#gift"></use></svg>
                      <div data-date="<?php echo $date_endSpecial;?>" class="js-product-timer product-timer-action"></div>
                      <div class="product-timer__descr"><?php echo $textSpecial;?></div>
                    </div>
                  </div>
                </div>
              <?php endif;?>

              <?php echo $colorsmodule;?>

              <div class="product-element">
                <div class="product-box">
                  <div class="product-add">
                    <div class="<?php echo ($isStock) ? 'product-add__available' : 'product-add__notAvailable'?>"><?php echo $stock;?></div>
                    <div class="products__prices inline-groups__middle">
                      <?php if($special) :?>
                        <div class="products__prices-old product__prices_add inline-groups__bottom"><span><?php echo $price; ?></span> <span>грн</span></div>
                        <div class="products__prices-new product__prices_add inline-groups__bottom"><strong><?php echo $special; ?></strong> <span>грн</span></div>
                      <?php else :?>
                      <div class="products__prices-new product__prices_add inline-groups__bottom"><strong><?php echo $price; ?></strong> <span>грн</span></div>

                      <?php endif; ?>
                      </div>
                    <div class="product-add-group inline-groups__middle">
                      <a href="#" id="button-cart" class="btn btn-buy btn-buy_product" >
                                                <span class="btn-buy__icon">
                                                    <svg viewBox="0 0 100 100" width="20px" height="25px" class="colored_white"><use xlink:href="#buy"></use></svg>
                                                </span>
                        <span class="btn-buy__text">купить</span>
                      </a>
                      <a href="#" class="btn btn-like js-btn-like btn-like_product">
                        <svg viewBox="0 0 110 100" width="27px" fill="#ffffff" stroke="#269fee"><use xlink:href="#like"></use></svg>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <?php if($totalReviews) :?>
              <div class="product-element">
                <div class="product-box">
                  <div class="product-reviews">
                    <div class="product-reviews__title product__title">Средняя оценка пользователя:</div>
                    <div class="product-reviews-group inline-groups__middle">
                      <div class="product-reviews__stars">
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
                          <div class="reviews-stars-outer" style="width:<?php echo ($srReviews*100)/5; ?>%">
                            <div class="reviews-stars__full">
                              <?php for( $i = 0; $i < 5; $i++ ) : ?>
                              <svg fill="#ffd541" viewBox="0 0 16 16" width="16px" height="16px">
                                <use xlink:href="#star-full"></use>
                              </svg>
                              <?php endfor; ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="product-reviews__count"><?php echo $srReviews;?> (<?php echo $totalReviews;?> отзывов)</div>
                    </div>
                    <?php if($product_reviews) :?>
                    <div class="product-reviews-option">
                      <?php foreach($product_reviews as $review) :?>
                      <div class="product-reviews-option-group inline-groups__middle">
                        <div class="product-reviews-option-group__name"><?php echo $review['name']?></div>
                        <div class="product-reviews-option-group__raiting">
                          <div class="product-reviews-option__empty">
                            <?php for( $i = 0; $i <= 4; $i++ ) : ?>
                            <span></span>
                            <?php endfor; ?>
                          </div>
                          <div class="product-reviews-option__full" style="width:<?php echo ((round($review['value'])*100)/5)?>%">
                            <?php for( $i = 0; $i <= 4; $i++ ) : ?>
                            <span></span>
                            <?php endfor; ?>
                          </div>
                        </div>
                        <div class="product-reviews-option-group__count"><?php echo $review['value']?></div>
                      </div>
                      <?php endforeach;?>
                    </div>
                    <?php endif;?>
                  </div>
                </div>
              </div>
              <?php endif;?>
            </div>
          </div>

        </div>
      </div>

      <div class="product-bottom">
        <div class="row">
          <div class="col-md-12 col-lg-7">
            <div class="product-descr product-bottom-element">
              <h4 class="h4 product-descr__title"> Описание <span><?php echo $heading_title; ?></span> </h4>
              <div class="<?php echo (strlen($description) > 200)  ? 'product-descr__height' : '' ?> product-descr__body js-product-descr__body">
                <?php echo $description;?>
              </div>
              <?php if(strlen($description) > 200) :?>
              <a href="#" class="product-descr__read-more js-descr-read-more"> <span>Читать еще</span> <i class="arrow"></i></a>
              <?php endif; ?>
            </div>
            <div class="product-character product-bottom-element">
              <h4 class="h4">Технические характеристики</h4>
              <div class="table-responsive">
                <table class="table product-character-table">
                  <tbody>
                  <?php foreach ($attribute_groups as $attribute_group) { ?>
                    <?php foreach ($attribute_group['attribute'] as $attribute) : ?>
                    <tr>
                      <td><?php echo $attribute_group['name']; ?></td>
                      <td><?php echo $attribute['name']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="col-md-12 col-lg-5">
            <div class="product-comments product-bottom-element">
              <?php if($totalReviews) :?>
              <h4 class="h4 product-comments__title">Отзывы о товаре <?php if($totalReviews > 3) : ?><a id="load-all-reviews" href="#" class="h2-link">Смотреть все отзывы</a><?php endif;?> </h4>
              <?php endif;?>
              <div id="review" data-product-id="<?php echo $product_id?>"></div>
              <div id="review-next"></div>

              <!--Comment form-->
              <div class="product-comments-form">
                <div class="product-comments-form__title">Оставить отзыв</div>
                <div class="product-comments-form-block">
                  <form class="form js-form-product-comment" action="index.php?route=product/product/write&product_id=<?php echo $product_id; ?>" novalidate>
                    <div class="product-comments-form-group">
                      <div class="product-comments-form__subtitle">Оцените товар</div>
                      <div class="product-comments-form__options">
                        <?php if($product_reviews) :?>
                          <?php foreach($product_reviews as $review) :?>
                            <div class="product-reviews-option-group inline-groups__middle js-review-option">
                              <div class="product-reviews-option-group__name"><?php echo $review['name']?></div>
                              <div class="product-reviews-option-group__raiting">
                                <div class="product-reviews-option__empty">
                                  <?php for( $i = 0; $i <= 4; $i++ ) : ?>
                                  <span data-index="<?php echo $i + 1; ?>"></span>
                                  <?php endfor; ?>
                                </div>
                              </div>
                              <div class="product-reviews-option-group__count">5,0</div>
                              <input type="text" hidden name="review[<?php echo $review['id']?>]">
                            </div>
                          <?php endforeach;?>
                        <?php endif;?>
                      </div>
                    </div>
                    <div class="product-comments-form-group">
                      <div class="product-comments-form__subtitle">Средняя оценка:</div>
                      <div class="product-comments-form__stars">
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
                          <div class="reviews-stars-outer js-result-raiting" style="width:0%">
                            <div class="reviews-stars__full">
                              <?php for( $i = 0; $i < 5; $i++ ) : ?>
                              <svg fill="#ffd541" viewBox="0 0 16 16" width="16px" height="16px">
                                <use xlink:href="#star-full"></use>
                              </svg>
                              <?php endfor; ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="product-comments-form-group">
                      <div class="form-group">
                        <label for="name">Введите имя</label>
                        <input for="name" class="form-control" name="name" type="text" required>
                      </div>
                      <div class="form-group">
                        <label for="text">Ваш комментарий</label>
                        <textarea name="text" class="form-control" required></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Отправить</button>
                      <div class="result-message js-result-message"></div>
                    </div>
                  </form>
                </div>
              </div>
              <!--Comment form-->

            </div>


          </div>
        </div>
      </div>
    </div>

    <div class="product-related">

      <h4 class="h4">С этим товаром покупают</h4>

      <div class="js-product-related-carousel products products-related">
        <?php foreach ($products as $key => $product) : ?>
        <div class="products-wrapper js_products__item">
          <div class="products__item">

            <!--Colors-->
            <?php echo $product['colorsmodule'];?>
            <!---->

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
                <a href="<?php echo $product['href']; ?>" class="btn btn-buy js-btn-buy inline-group">
                    <span class="btn-buy__icon">
                        <svg viewBox="0 0 100 100" width="18px" height="22px" class="colored_white"><use xlink:href="#buy"></use></svg>
                    </span>
                  <span class="btn-buy__text">купить</span>
                </a>
                <a href="<?php echo $product['href']; ?>" class="btn btn-like js-btn-like">
                  <svg viewBox="0 0 110 100" width="25px" fill="#ffffff" stroke="#269fee"><use xlink:href="#like"></use></svg>
                </a>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

    </div>


  </div>
  </div>
</section>
<script type="text/javascript"><!--
    document.addEventListener('DOMContentLoaded', function() {
        $('#button-cart').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                url: 'index.php?route=checkout/cart/add',
                type: 'post',
                data: 'product_id='+<?php echo $product_id ?>,
                dataType: 'json',
                success: function(json) {
                    if (json['success']) {
                        $('.cart.modal-content').html(json['contentCart']);
                        $('.counter.counter__cart.colored_white').text(json['cartCount']);
                        $('.price').text(json['total']);
                        $('#cart_modal').modal('show');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        });
    });

    //--></script>
<?php echo $footer; ?>
