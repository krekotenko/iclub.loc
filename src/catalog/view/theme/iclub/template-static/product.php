<?php
    require('parts/header.php');


    $products = [
        '../images/product-single/img-1.png',
        '../images/product-single/img-1.png', 
        '../images/product-single/img-1.png', 
        '../images/product-single/img-1.png', 
        '../images/product-single/img-1.png', 
        '../images/product-single/img-1.png', 
        '../images/product-single/img-1.png', 
    ];

    $colors = [
        [
            'color' => '#252626',
            'active' => true
        ], 
        [
            'color' => '#f3c584',
            'active' => false
        ],
        [
            'color' => '#f38484',
            'active' => false
        ],
        [
            'color' => '#d4d7d7',
            'active' => false
        ],
        [
            'color' => '#252626',
            'active' => false
        ], 
        [
            'color' => '#f3c584',
            'active' => false
        ],
        [
            'color' => '#f38484',
            'active' => false
        ],
        [
            'color' => '#d4d7d7',
            'active' => false
        ],
        [
            'color' => '#252626',
            'active' => false
        ], 
        [
            'color' => '#f3c584',
            'active' => false
        ],
        [
            'color' => '#f38484',
            'active' => false
        ],
        [
            'color' => '#d4d7d7',
            'active' => false
        ],
        [
            'color' => '#252626',
            'active' => false
        ], 

    ];

    











    $characters = [
        [
            'name' => 'Стандарт связи:',
            'descr' => '3G (WCDMA/UMTS), 2G (EDGE), 4G (LTE)'
        ],
        [
            'name' => 'Диагональ экрана:',
            'descr' => '5.8'
        ],
        [
            'name' => 'Разрешение дисплея:',
            'descr' => '2436х1125'
        ],
        [
            'name' => 'Тип матрицы:',
            'descr' => 'OLED (Super Retina HD)'
        ],
        [
            'name' => 'Количество точек касания:',
            'descr' => '10'
        ],
        [
            'name' => 'Материал экрана:',
            'descr' => 'Стекло'
        ],
        [
            'name' => 'Количество СИМ-карт:',
            'descr' => '1'
        ],
        [
            'name' => 'Размеры СИМ-карты:',
            'descr' => 'Nano-SIM'
        ],
        [
            'name' => 'Оперативная память:',
            'descr' => '3 ГБ'
        ],
        [
            'name' => 'Встроенная память:',
            'descr' => '64 ГБ'
        ],
    ];

    


    
?>


<section class="page-section product-section">

    <div class="wrapper">

        <div class="breadcrumb-block">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Apple</a></li>
                    <li class="breadcrumb-item active" aria-current="page">iPhone X 64Gb Space Gray (MQAC2)</li>
                </ol>
            </nav>
        </div>

        <h1 class="h1">Apple iPhone X 64Gb Space Gray</h1>

        <div class="product-block">

            <div class="product-option">
                <div class="row">
                    <div class="col-md-12 col-lg-7">               
                        <div class="product-carousel">
                            <div class="flex-block items-center">                                
                                <div class="product-nav">
                                    <div class="js-product-nav">
                                        <?php foreach ($products as $product) : ?>
                                        <div class="product-nav__item">
                                            <img src="<?php echo $product; ?>" alt="">
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="product-for">
                                    <div class="js-product-for">
                                        <?php foreach ($products as $product) : ?>
                                        <div class="product-for__item">
                                            <img src="<?php echo $product; ?>" alt="">
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>                       
                    </div>

                    <div class="col-md-12 col-lg-5">
                        <div class="product-elements">
                            <div class="product-element">
                                <div class="product-box">
                                    <div class="product-timer">
                                        <svg viewBox="0 0 112 100" width="112px" height="100px" fill="#ff435e" ><use xlink:href="#gift"></use></svg>
                                        <div class="js-product-timer product-timer-action"></div>
                                        <div class="product-timer__descr">Суперцена на Apple iPhone X 64Gb Space Gray и оплата частями* на 10 месяцев!</div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-element">
                                <div class="product-box">
                                    <div class="product-colors">
                                        <div class="product-colors__title product__title">Выберите цвет:</div>
                                        <div class="product-colors-list">
                                            <ul>
                                                <?php foreach ($colors as $color) : ?>
                                                <li>
                                                <a 
                                                    href="#"
                                                    class="product-colors__item <?php echo $color['active'] ? 'active' : ''; ?>" 
                                                    style="background-color: <?php echo $color['color']; ?>"
                                                ></a>
                                                </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="product-element">
                                <div class="product-box">
                                    <div class="product-add">
                                        <div class="product-add__available">Есть в наличии</div>
                                        <div class="products__prices inline-groups__middle">
                                            <div class="products__prices-old product__prices_add inline-groups__bottom"><span>37 500</span> <span>грн</span></div>
                                            <div class="products__prices-new product__prices_add inline-groups__bottom"><strong>32 499</strong> <span>грн</span></div>
                                        </div>
                                        <div class="product-add-group inline-groups__middle">
                                            <a href="#" class="btn btn-buy btn-buy_product">
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
                                                    <div class="reviews-stars-outer" style="width:80%">
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
                                            <div class="product-reviews__count">4,5 (5 отзывов)</div>
                                        </div>
                                        <div class="product-reviews-option">
                                            <div class="product-reviews-option-group inline-groups__middle">
                                                <div class="product-reviews-option-group__name">Экран</div>
                                                <div class="product-reviews-option-group__raiting">
                                                    <div class="product-reviews-option__empty">
                                                    <?php for( $i = 0; $i <= 4; $i++ ) : ?>
                                                        <span></span>
                                                    <?php endfor; ?>
                                                    </div>
                                                    <div class="product-reviews-option__full" style="width:100%">
                                                    <?php for( $i = 0; $i <= 4; $i++ ) : ?>
                                                        <span></span>
                                                    <?php endfor; ?>                
                                                    </div>
                                                </div>
                                                <div class="product-reviews-option-group__count">5,0</div>
                                            </div>
                                            <div class="product-reviews-option-group inline-groups__middle">
                                                <div class="product-reviews-option-group__name">Скорость работы</div>
                                                <div class="product-reviews-option-group__raiting">
                                                    <div class="product-reviews-option__empty">
                                                    <?php for( $i = 0; $i <= 4; $i++ ) : ?>
                                                        <span></span>
                                                    <?php endfor; ?>
                                                    </div>
                                                    <div class="product-reviews-option__full" style="width:100%">
                                                    <?php for( $i = 0; $i <= 4; $i++ ) : ?>
                                                        <span></span>
                                                    <?php endfor; ?>                
                                                    </div>
                                                </div>
                                                <div class="product-reviews-option-group__count">5,0</div>
                                            </div>
                                            <div class="product-reviews-option-group inline-groups__middle">
                                                <div class="product-reviews-option-group__name">Камера</div>
                                                <div class="product-reviews-option-group__raiting">
                                                    <div class="product-reviews-option__empty">
                                                    <?php for( $i = 0; $i <= 4; $i++ ) : ?>
                                                        <span></span>
                                                    <?php endfor; ?>
                                                    </div>
                                                    <div class="product-reviews-option__full" style="width:80%">
                                                    <?php for( $i = 0; $i <= 4; $i++ ) : ?>
                                                        <span></span>
                                                    <?php endfor; ?>                
                                                    </div>
                                                </div>
                                                <div class="product-reviews-option-group__count">4,0</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>                      
                    </div>

                </div>
            </div>

            <div class="product-bottom">
                <div class="row">
                    <div class="col-md-12 col-lg-7">
                        <div class="product-descr product-bottom-element">
                            <h4 class="h4 product-descr__title"> Описание <span>Apple iPhone X 64Gb</span> </h4>
                            <div class="product-descr__body js-product-descr__body">
                                Всю переднюю поверхность iPhone X занимает дисплей Super Retina HD с диагональю 5,8 дюйма и поддержкой технологий HDR и True Tone. Передняя и задняя панели выполнены из самого прочного стекла, когда-либо созданного для iPhone, а рамка — из хирургической нержавеющей стали. iPhone X заряжается без проводов. Защищён от воды и пыли. И оснащён двойной камерой 12 Мп с двойной оптической стабилизацией.
                                Всю переднюю поверхность iPhone X занимает дисплей Super Retina HD с диагональю 5,8 дюйма и поддержкой технологий HDR и True Tone. Передняя и задняя панели выполнены из самого прочного стекла, когда-либо созданного для iPhone, а рамка — из хирургической нержавеющей стали. iPhone X заряжается без проводов. Защищён от воды и пыли. И оснащён двойной камерой 12 Мп с двойной оптической стабилизацией.
                            </div>
                            <a href="#" class="product-descr__read-more js-descr-read-more"> <span>Читать еще</span> <i class="arrow"></i></a>
                        </div>
                        <div class="product-character product-bottom-element">
                            <h4 class="h4">Технические характеристики</h4>
                            <div class="table-responsive">
                                <table class="table product-character-table">
                                    <tbody>
                                        <?php foreach ($characters as $character) : ?>
                                        <tr>
                                            <td><?php echo $character['name']; ?></td>
                                            <td><?php echo $character['descr']; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>                            
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-5">
                        <div class="product-comments product-bottom-element">                        
                            <h4 class="h4 product-comments__title">Отзывы о товаре <a href="#" class="h2-link">Смотреть все отзывы</a> </h4>
                            <div class="product-comments-element">
                                <div class="inline-groups__middle product-comments-head">                                
                                    <div class="product-comments__name">Андрей</div>
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
                                        <div class="reviews-stars-outer" style="width:80%">
                                            <div class="reviews-stars__full">
                                                <?php for( $i = 0; $i < 5; $i++ ) : ?>
                                                <svg fill="#ffd541" viewBox="0 0 16 16" width="16px" height="16px">
                                                    <use xlink:href="#star-full"></use>
                                                </svg>
                                                <?php endfor; ?>                                                
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="product-comments__date">02 ноября 2018</div>                                
                                </div>
                                <div class="product-comments-body">
                                    <div class="product-comments-body__item product-comments-body__text">
                                        Отличный смартфон. Особенно понравилась камера - снимки как у профессиональных фотографов. Отличный звук, изображение, скорость и дизайн. Отдельное спасибо магазину Алло и его продавцам.
                                    </div>
                                    <div class="product-comments-body__item product-reviews-option">
                                        <div class="product-reviews-option-group inline-groups__middle">
                                            <div class="product-reviews-option-group__name">Экран</div>
                                            <div class="product-reviews-option-group__raiting">
                                                <div class="product-reviews-option__empty">
                                                <?php for( $i = 0; $i <= 4; $i++ ) : ?>
                                                    <span></span>
                                                <?php endfor; ?>
                                                </div>
                                                <div class="product-reviews-option__full" style="width:100%">
                                                <?php for( $i = 0; $i <= 4; $i++ ) : ?>
                                                    <span></span>
                                                <?php endfor; ?>                
                                                </div>
                                            </div>
                                            <div class="product-reviews-option-group__count">5,0</div>
                                        </div>
                                        <div class="product-reviews-option-group inline-groups__middle">
                                            <div class="product-reviews-option-group__name">Скорость работы</div>
                                            <div class="product-reviews-option-group__raiting">
                                                <div class="product-reviews-option__empty">
                                                <?php for( $i = 0; $i <= 4; $i++ ) : ?>
                                                    <span></span>
                                                <?php endfor; ?>
                                                </div>
                                                <div class="product-reviews-option__full" style="width:100%">
                                                <?php for( $i = 0; $i <= 4; $i++ ) : ?>
                                                    <span></span>
                                                <?php endfor; ?>                
                                                </div>
                                            </div>
                                            <div class="product-reviews-option-group__count">5,0</div>
                                        </div>
                                        <div class="product-reviews-option-group inline-groups__middle">
                                            <div class="product-reviews-option-group__name">Камера</div>
                                            <div class="product-reviews-option-group__raiting">
                                                <div class="product-reviews-option__empty">
                                                <?php for( $i = 0; $i <= 4; $i++ ) : ?>
                                                    <span></span>
                                                <?php endfor; ?>
                                                </div>
                                                <div class="product-reviews-option__full" style="width:80%">
                                                <?php for( $i = 0; $i <= 4; $i++ ) : ?>
                                                    <span></span>
                                                <?php endfor; ?>                
                                                </div>
                                            </div>
                                            <div class="product-reviews-option-group__count">4,0</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-comments-element">
                                <div class="inline-groups__middle product-comments-head">                                
                                    <div class="product-comments__name">Андрей</div>
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
                                        <div class="reviews-stars-outer" style="width:80%">
                                            <div class="reviews-stars__full">
                                                <?php for( $i = 0; $i < 5; $i++ ) : ?>
                                                <svg fill="#ffd541" viewBox="0 0 16 16" width="16px" height="16px">
                                                    <use xlink:href="#star-full"></use>
                                                </svg>
                                                <?php endfor; ?>                                                
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="product-comments__date">02 ноября 2018</div>                                
                                </div>
                                <div class="product-comments-body">
                                    <div class="product-comments-body__item product-comments-body__text">
                                        Отличный смартфон. Особенно понравилась камера - снимки как у профессиональных фотографов. Отличный звук, изображение, скорость и дизайн. Отдельное спасибо магазину Алло и его продавцам.
                                    </div>
                                </div>
                            </div>
                            <div class="product-comments-element">
                                <div class="inline-groups__middle product-comments-head">                                
                                    <div class="product-comments__name">Андрей</div>
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
                                        <div class="reviews-stars-outer" style="width:80%">
                                            <div class="reviews-stars__full">
                                                <?php for( $i = 0; $i < 5; $i++ ) : ?>
                                                <svg fill="#ffd541" viewBox="0 0 16 16" width="16px" height="16px">
                                                    <use xlink:href="#star-full"></use>
                                                </svg>
                                                <?php endfor; ?>                                                
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="product-comments__date">02 ноября 2018</div>                                
                                </div>
                                <div class="product-comments-body">
                                    <div class="product-comments-body__item product-comments-body__text">
                                        Отличный смартфон. Особенно понравилась камера - снимки как у профессиональных фотографов. Отличный звук, изображение, скорость и дизайн. Отдельное спасибо магазину Алло и его продавцам.
                                    </div>
                                </div>
                            </div>

                  
                            <div class="product-comments-form">
                                <div class="product-comments-form__title">Оставить отзыв</div>
                                <div class="product-comments-form-block">
                                    <form class="form js-form-product-comment" action="" novalidate>  
                                        <div class="product-comments-form-group">
                                            <div class="product-comments-form__subtitle">Оцените товар</div>
                                            <div class="product-comments-form__options">                                         
                                                <div class="product-reviews-option-group inline-groups__middle js-review-option">
                                                    <div class="product-reviews-option-group__name">Экран</div>
                                                    <div class="product-reviews-option-group__raiting">
                                                        <div class="product-reviews-option__empty">
                                                        <?php for( $i = 0; $i <= 4; $i++ ) : ?>
                                                            <span data-index="<?php echo $i + 1; ?>"></span>
                                                        <?php endfor; ?>
                                                        </div>                     
                                                    </div>
                                                    <div class="product-reviews-option-group__count">5,0</div>
                                                    <input type="text" hidden name="Экран">
                                                </div>
                                                <div class="product-reviews-option-group inline-groups__middle js-review-option">
                                                    <div class="product-reviews-option-group__name">Скорость работы</div>
                                                    <div class="product-reviews-option-group__raiting">
                                                        <div class="product-reviews-option__empty">
                                                        <?php for( $i = 0; $i <= 4; $i++ ) : ?>
                                                            <span data-index="<?php echo $i + 1; ?>"></span>
                                                        <?php endfor; ?>
                                                        </div>                    
                                                    </div>
                                                    <div class="product-reviews-option-group__count">5,0</div>
                                                    <input type="text" hidden name="Скорость работы">
                                                </div>
                                                <div class="product-reviews-option-group inline-groups__middle js-review-option">
                                                    <div class="product-reviews-option-group__name">Камера</div>
                                                    <div class="product-reviews-option-group__raiting">
                                                        <div class="product-reviews-option__empty">
                                                        <?php for( $i = 0; $i <= 4; $i++ ) : ?>
                                                            <span data-index="<?php echo $i + 1; ?>"></span>
                                                        <?php endfor; ?>
                                                        </div>                                      
                                                    </div>
                                                    <div class="product-reviews-option-group__count">5,0</div>
                                                    <input type="text" hidden name="Камера" required>
                                                </div>                                                                              
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
                                                <input for="name" class="form-control" type="text" required>                                                
                                            </div>                            
                                            <div class="form-group">
                                                <label for="comment">Ваш комментарий</label>
                                                <textarea name="comment" class="form-control" required></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Отправить</button> 
                                            <div class="result-message js-result-message"></div>
                                        </div>
                                    </form> 
                                </div>                                
                            </div>                               
                            
                        </div>
                            
                        
                    </div>
                    </div>
                </div>
            </div>

            <div class="product-related">

                <h4 class="h4">С этим товаром покупают</h4>
            
                <div class="row no-gutters js-product-carousel products">
                    <?php
                        require('parts/product-home.php');
                    ?>
                </div>  
            
            </div>


        </div>

        


    </div>

</section>



<?php   

    require('parts/footer.php');

?>