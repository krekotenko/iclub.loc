
<?php 

$products = [
    [
        'img' => '../images/product/product-2.png',
        'title' => 'Xiaomi Mi A2 Lite 3/32Gb (Black) Официальная международная версия',
        'price_old' => '',
        'price' => '4 999',
        'raiting' => 80,
        'reviews' => '8 отзывов',
        'descr' => 'Экран (5.84", IPS, 2280x1080)/ Qualcomm Snapdragon 625 (2.0 ГГц)/ двойная основная камера: 12 Мп + 5 Мп, фронтальная камера: 5 Мп/ RAM 3 ГБ/ 32 ГБ встроенной памяти',
        'similar' => [
            '#262727',
            '#ebbf81',
            '#e584f3',          
            '#f38484',
            '#d4d7d7'
        ]
    ],
    [
        'img' => '../images/product/product-2.png',
        'title' => 'Xiaomi Mi A2 Lite 3/32Gb (Black) Официальная международная версия',
        'price_old' => '',
        'price' => '4 999',
        'raiting' => 80,
        'reviews' => '8 отзывов',
        'descr' => 'Экран (5.84", IPS, 2280x1080)/ Qualcomm Snapdragon 625 (2.0 ГГц)/ двойная основная камера: 12 Мп + 5 Мп, фронтальная камера: 5 Мп/ RAM 3 ГБ/ 32 ГБ встроенной памяти',
        'similar' => [
            '#262727',
            '#ebbf81',
            '#e584f3',          
            '#f38484',
            '#d4d7d7'
        ]
    ],
    [
        'img' => '../images/product/product-2.png',
        'title' => 'Xiaomi Mi A2 Lite 3/32Gb (Black) Официальная международная версия',
        'price_old' => '',
        'price' => '4 999',
        'raiting' => 80,
        'reviews' => '8 отзывов',
        'descr' => 'Экран (5.84", IPS, 2280x1080)/ Qualcomm Snapdragon 625 (2.0 ГГц)/ двойная основная камера: 12 Мп + 5 Мп, фронтальная камера: 5 Мп/ RAM 3 ГБ/ 32 ГБ встроенной памяти',
        'similar' => [
            '#262727',
            '#ebbf81',
            '#e584f3',          
            '#f38484',
            '#d4d7d7'
        ]
    ],    
    

];

?>


<?php foreach ($products as $key => $product) : ?>
<div class="col-auto col-lg-4">
    <div class="products-wrapper">
        <div class="products__item products__item-favorite js-products-item" data-price="<?php echo $product['price']; ?>">

            <div class="products__item-delete js-product-favorite-delete">           
                <svg width="16px" height="16px" class="colored_dark">
                    <use xlink:href="#close"></use>
                </svg>          
            </div>

            <div class="products__body">
                <a href="#single-prouct" class="products__img">
                    <img src="<?php echo $product['img']; ?>" alt="">
                </a>
                <a href="#single-prouct" class="products__name"><?php echo $product['title']; ?></a>
                <div class="products__prices inline-groups__middle">
                    <?php if($product['price_old'] != '') : ?>
                    <div class="products__prices-old inline-groups__bottom"><span><?php echo $product['price_old']; ?></span> <span>грн</span></div>
                    <?php endif; ?>
                    <div class="products__prices-new inline-groups__bottom"><strong><?php echo $product['price']; ?></strong> <span>грн</span></div>
                </div>                               
                <a href="#" class="products__reviews">
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
                        <div class="reviews-stars-outer" style="width:<?php echo $product['raiting']; ?>%">
                            <div class="reviews-stars__full">
                                <?php for( $i = 0; $i <= 5; $i++ ) : ?>
                                <svg fill="#ffd541" viewBox="0 0 16 16" width="16px" height="16px">
                                    <use xlink:href="#star-full"></use>
                                </svg>
                                <?php endfor; ?>                                                
                            </div>
                        </div>                                            
                    </div>
                    <div class="products__comments"><?php echo $product['reviews']; ?></div>
                </a>                          
                <div class="products__buttons">
                    <a href="#single-product" class="btn btn-buy inline-group">
                        <span class="btn-buy__icon">                                            
                            <svg viewBox="0 0 100 100" width="18px" height="22px" class="colored_white"><use xlink:href="#buy"></use></svg>
                        </span>
                        <span class="btn-buy__text">купить</span>
                    </a>
                    <a href="#" class="btn btn-like js-btn-like">
                        <svg viewBox="0 0 110 100" width="25px" fill="#ffffff" stroke="#269fee"><use xlink:href="#like"></use></svg>
                    </a>
                </div>
                <div class="products__descr"><?php echo $product['descr']; ?></div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
