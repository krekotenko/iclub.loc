<?php
    require('parts/header.php');


    // local database

    $homeSlider = [
        [
            'title' => 'Новый IPhone Xs',
            'descr' => 'по доступной цене',
            'img' => '../images/home-slider/img-1.jpg',
        ],
        [
            'title' => 'Новый IPhone Xs 2',
            'descr' => 'по доступной цене',
            'img' => '../images/home-slider/img-1.jpg',
        ],
    ];

    $advantages = [
        [
            'title' => 'iClub-обмен',
            'icon' => '
                <svg width="49px" class="colored_main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50.6 48.9"><path d="M48.5 8c.8 0 1.5-.7 1.5-1.5S49.3 5 48.5 5h-9-.1-.1-.1c-.1 0-.3.1-.4.2h-.1l-.3.3c-.1.1-.2.2-.2.4V6c0 .1-.1.3-.1.4v9c0 .8.7 1.5 1.5 1.5s1.5-.7 1.5-1.5V9.9c3.7 4 5.7 9.1 5.7 14.5 0 11.8-9.6 21.5-21.5 21.5-2.1 0-4.1-.3-6-.9-.8-.2-1.6.2-1.9 1-.2.8.2 1.6 1 1.9 2.2.6 4.5 1 6.9 1 13.5 0 24.5-11 24.5-24.5 0-6.2-2.3-12-6.4-16.5l5.1.1zM11 31.9c-.8 0-1.5.7-1.5 1.5v5.7c-3.8-4-5.9-9.2-5.9-14.7C3.6 12.6 13.3 3 25.1 3c2.1 0 4.1.3 6 .9.8.2 1.6-.2 1.9-1 .2-.8-.2-1.6-1-1.9-2.2-.6-4.5-1-6.9-1C11.6 0 .6 10.9.6 24.5c0 6.2 2.3 12 6.4 16.5H2c-.8 0-1.5.7-1.5 1.5S1.2 44 2 44h9c.8 0 1.5-.7 1.5-1.5v-9c0-.9-.7-1.6-1.5-1.6z"/></svg>
            '
        ],
        [
            'title' => 'iService',
            'icon' => '
                <svg width="49px" class="colored_main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 49 49"><path d="M24.5 14.9c-5.3 0-9.6 4.3-9.6 9.6s4.3 9.6 9.6 9.6 9.6-4.3 9.6-9.6-4.3-9.6-9.6-9.6zm0 16.2c-3.6 0-6.6-3-6.6-6.6 0-3.6 3-6.6 6.6-6.6 3.6 0 6.6 3 6.6 6.6 0 3.6-3 6.6-6.6 6.6zm23-12.2H44c-.4-1.5-1-2.9-1.8-4.2l2.4-2.4c.6-.6.6-1.5 0-2.1l-5.8-5.8c-.3-.3-.7-.4-1.1-.4s-.6 0-.9.3l-2.4 2.4c-1.3-.8-2.8-1.3-4.2-1.8V1.5c0-.8-.7-1.5-1.5-1.5h-8.2c-.8 0-1.5.7-1.5 1.5v3.4c-1.5.4-2.9 1-4.2 1.8l-2.4-2.4c-.6-.6-1.6-.6-2.1 0l-5.8 5.8c-.6.6-.6 1.5 0 2.1l2.4 2.4c-.8 1.3-1.3 2.8-1.8 4.2H1.5c-.8 0-1.5.7-1.5 1.5v8.2c0 .8.7 1.5 1.5 1.5h3.4c.4 1.5 1 2.9 1.8 4.2l-2.4 2.4c-.6.6-.6 1.5 0 2.1l5.8 5.8c.6.6 1.5.6 2.1 0l2.4-2.4c1.3.8 2.8 1.3 4.2 1.8v3.4c0 .8.7 1.5 1.5 1.5h8.2c.8 0 1.5-.7 1.5-1.5V44c1.5-.4 2.9-1 4.2-1.8l2.4 2.4c.6.6 1.6.6 2.1 0l5.8-5.8c.6-.6.6-1.5 0-2.1l-2.4-2.4c.8-1.3 1.3-2.8 1.8-4.2h3.4c.8 0 1.5-.7 1.5-1.5v-8.2c.2-.9-.5-1.5-1.3-1.5zM46 27.1h-3.1c-.7 0-1.3.5-1.5 1.2-.4 1.9-1.2 3.8-2.3 5.5-.4.6-.3 1.4.2 1.9l2.2 2.2-3.7 3.7-2.2-2.2c-.5-.5-1.3-.6-1.9-.2-1.7 1.1-3.6 1.9-5.5 2.3-.7.2-1.2.8-1.2 1.5v3h-5.2v-3.1c0-.7-.5-1.3-1.2-1.5-1.9-.4-3.8-1.2-5.5-2.3-.6-.4-1.4-.3-1.9.2L11 41.5l-3.7-3.7 2.2-2.2c.5-.5.6-1.3.2-1.9-1.1-1.7-1.9-3.6-2.3-5.5-.2-.7-.8-1.2-1.5-1.2H3v-5.2h3.1c.7 0 1.3-.5 1.5-1.2.4-1.9 1.2-3.8 2.3-5.5.4-.6.3-1.4-.2-1.9L7.5 11l3.7-3.7 2.2 2.2c.5.5 1.3.6 1.9.2 1.7-1.1 3.6-1.9 5.5-2.3.7-.2 1.2-.8 1.2-1.5V3h5.2v3.1c0 .7.5 1.3 1.2 1.5 1.9.4 3.8 1.2 5.5 2.3.6.4 1.4.3 1.9-.2L38 7.5l3.7 3.7-2.2 2.2c-.5.5-.6 1.3-.2 1.9 1.1 1.7 1.9 3.6 2.3 5.5.2.7.8 1.2 1.5 1.2H46v5.1z"/></svg>            
            '
        ],
        [
            'title' => 'Рассрочка',
            'icon' => '
                <svg width="49px" class="colored_main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 39.5 37.8"><path d="M19.9 2C10 2 2 10 2 19.9c0 9.9 8 17.9 17.9 17.9s17.9-8 17.9-17.9C37.8 10 29.7 2 19.9 2zm0 32.8C11.7 34.8 5 28.1 5 19.9S11.7 5 19.9 5s14.9 6.7 14.9 14.9-6.7 14.9-14.9 14.9zm0-27.4c-.8 0-1.5.7-1.5 1.5v10.4l-4.6 4.6c-.6.6-.6 1.5 0 2.1.3.3.7.4 1.1.4s.8-.1 1.1-.4l5.1-5.1c.1-.1.2-.3.3-.5.1-.2.1-.3.1-.5v-11c-.1-.9-.8-1.5-1.6-1.5zM7.6 2.6c.6-.6.6-1.6 0-2.2S6.1-.2 5.5.4L.4 5.5c-.6.6-.6 1.5 0 2.1.3.3.7.4 1.1.4s.8-.1 1.1-.4l5-5zm31.5 3.2L34 .7c-.6-.6-1.5-.6-2.1 0s-.6 1.5 0 2.1L37 7.9c.3.3.7.4 1.1.4s.8-.1 1.1-.4c.5-.6.5-1.6-.1-2.1z"/></svg>            
            '
        ],
        [
            'title' => 'Забрать в магазине',
            'icon' => '
                <svg height="49px" class="colored_main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 110.062c-52.412 0-95.053 42.641-95.053 95.053s42.641 95.053 95.053 95.053 95.053-42.641 95.053-95.053-42.64-95.053-95.053-95.053zm0 150.084c-30.344 0-55.031-24.687-55.031-55.031s24.687-55.031 55.031-55.031 55.031 24.687 55.031 55.031-24.687 55.031-55.031 55.031z"/><path d="M256 0C142.899 0 50.885 92.015 50.885 205.115v5.67c0 57.2 32.794 123.856 97.474 198.113 46.888 53.832 93.121 91.368 95.065 92.94L256 512l12.576-10.161c1.945-1.572 48.178-39.108 95.065-92.94 64.679-74.258 97.474-140.913 97.474-198.113v-5.67C461.115 92.015 369.101 0 256 0zm165.093 210.786c0 96.665-124.551 213.68-165.093 249.202-40.553-35.533-165.093-152.544-165.093-249.202v-5.67c0-91.032 74.061-165.093 165.093-165.093s165.093 74.061 165.093 165.093v5.67z"/></svg>
            '
        ]        
    ];


    $products = [
        [
            'img' => '../images/product/product-1.png',
            'title' => 'Apple iPhone X 64Gb Space Gray (MQAC2)',
            'price_old' => '37 500',
            'price' => '32 499',
            'raiting' => 80,
            'reviews' => '15 отзывов',
            'descr' => 'Экран (5.84", IPS, 2280x1080)/ Qualcomm Snapdragon 625 (2.0 ГГц)/ двойная основная камера: 12 Мп + 5 Мп, фронтальная камера: 5 Мп/ RAM 3 ГБ/ 32 ГБ встроенной памяти',
            'similar' => [
                '#262727',
                '#ebbf81'
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
            'img' => '../images/product/product-3.png',
            'title' => 'Акустический персональный ассистент Amazon Echo (2GEN)',
            'price_old' => '',
            'price' => '5 300',
            'raiting' => 80,
            'reviews' => '3 отзывов',
            'descr' => 'Экран (5.84", IPS, 2280x1080)/ Qualcomm Snapdragon 625 (2.0 ГГц)/ двойная основная камера: 12 Мп + 5 Мп, фронтальная камера: 5 Мп/ RAM 3 ГБ/ 32 ГБ встроенной памяти',
            'similar' => []
        ],        
        [
            'img' => '../images/product/product-4.png',
            'title' => 'Чехол iPhone 5 / 5s / SE Silicone Case OEM ( Mint )',
            'price_old' => '',
            'price' => '300',
            'raiting' => 0,
            'reviews' => 'Оставить отзыв',
            'descr' => 'Экран (5.84", IPS, 2280x1080)/ Qualcomm Snapdragon 625 (2.0 ГГц)/ двойная основная камера: 12 Мп + 5 Мп, фронтальная камера: 5 Мп/ RAM 3 ГБ/ 32 ГБ встроенной памяти',
            'similar' => [
                '#262727',
                '#ebbf81'
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
            'similar' => []
        ],

    ];
    
    $articles = [
        [
            'img' => '../images/news/new-1.jpg',
            'title' => 'Телевизоры Sony Master Series AF9 - новый этап в достижении',
            'date' => '24 октября 2018',
        ],
        [
            'img' => '../images/news/new-2.jpg',
            'title' => 'Предзаказы на инновационный смартфон',
            'date' => '24 октября 2018',
        ],
        [
            'img' => '../images/news/new-3.jpg',
            'title' => 'Новая линейка экшен-камер GoPro Hero7',
            'date' => '24 октября 2018',
        ],
        [
            'img' => '../images/news/new-4.jpg',
            'title' => 'Официальные продажи новых iPhone 2018 начнутся в первой половине октября ',
            'date' => '24 октября 2018',
        ],

    ];


?>
    

        <section class="home-banner">
            <div classa="home-carousel">
                <div class="js-home-carousel">
                    <?php foreach ($homeSlider as $key => $value) : ?>
                    <div class="home-carousel-item" style="background-image: url(<?php echo $value['img']; ?>)">
                        <div class="wrapper">
                            <div class="home-carousel__content">
                                <h3><?php echo $value['title']; ?></h3>
                                <p><?php echo $value['descr']; ?></p>
                                <a href="#" class="btn">Подробнее</a>
                            </div>
                        </div>                        
                    </div>                    
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

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

        <section class="section-products">      

            <div class="block-products top-products">
                <div class="wrapper">
                    <h2 class="h2">Топ продаж <a href="#" class="h2-link">Все топ продаж</a></h2>            
                    <div class="row no-gutters js-product-carousel products">
                        <?php
                            require('parts/product-home.php');
                        ?>
                    </div>
                                   
                </div>
            </div>

            <div class="block-products present-products">
                <div class="wrapper">
                    <h2 class="h2">Идеи для подарков <a href="#" class="h2-link">Все идеи для подарков</a></h2>
                    <div class="row no-gutters js-product-carousel products">
                        <?php
                            require('parts/product-home.php');
                        ?>
                    </div>                    
                </div>
            </div>

            <div class="block-products present-new">
                <div class="wrapper">
                    <h2 class="h2">Новинки <a href="#" class="h2-link">Все новинки</a></h2>
                    <div class="row no-gutters js-product-carousel products">
                        <?php
                            require('parts/product-home.php');
                        ?>
                    </div>                    
                </div>
            </div>

         </section>


         <section class="show-room-section">
             <div class="wrapper">
                <div class="show-room-block">
                    <div class="show-room-group">                    
                        <div class="show-room__content">
                            <h3 class="show-room__title">Приглашаем&nbsp;посетить наши&nbsp;шоу-румы</h3>
                            <a href="#" class="btn btn-show-room">Перейти</a>
                        </div>
                        <div class="show-room__team">
                            <img src="../images/home/team-crop.png" alt="">
                        </div>

                        <div class="show-room__team-full">
                            <img src="../images/home/team-full.jpg" alt="">
                        </div>
                    </div>                                   
                </div>
             </div>
         </section>

         <section class="brands-section">             
            <div class="wrapper">
                <div class="brands-carousel">
                    <div class="js-brands-carousel">
                        <div class="brands-item">
                            <img width="40px" src="../images/brands-slider/brand-1.png" alt="">
                        </div>
                        <div class="brands-item">
                            <img width="144px" src="../images/brands-slider/samsung.png" alt="">
                        </div>
                        <div class="brands-item">
                            <img width="94px" src="../images/brands-slider/meizu.png" alt="">
                        </div>
                        <div class="brands-item">
                            <img width="33px" src="../images/brands-slider/brand-4.png" alt="">
                        </div>
                        <div class="brands-item">
                            <img width="157px" src="../images/brands-slider/huawei.png" alt="">
                        </div>
                        <div class="brands-item">
                            <img width="117px" src="../images/brands-slider/nokia.png" alt="">
                        </div>
                        <div class="brands-item">                         
                            <img width="144px" src="../images/brands-slider/brand-2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>         
         </section>

         <section class="news-section">
             <div class="wrapper">
                <h2 class="h2">Последние новости <a href="#" class="h2-link">Все новости</a> </h2>
                <div class="row">                
                    <?php foreach ($articles as $key => $article) : ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <article class="article-card">
                            <a href="#">
                                <div class="article-card__media article-card__media--16-9" style="background-image: url(<?php echo $article['img']; ?>)"></div>
                                <div class="article-card__descr">
                                    <div class="article-card__title"><?php echo $article['title']; ?></div>
                                    <div class="article-card__date flex-block content-between items-center">
                                        <span><?php echo $article['date']; ?></span>
                                        <i class="arrow arrow-right"></i>
                                    </div>
                                </div>
                            </a>
                        </article>       
                    </div>
                    <?php endforeach; ?>
                </div>
             </div>
         </section>

         <section class="seo-section">
             <div class="wrapper">
                <h2 class="h2">Интернет-магазин IClub</h2>
                <div class="text-markup">
                    <p>
                        С другой стороны реализация намеченного плана развития напрямую зависит от системы обучения кадров, соответствующей насущным потребностям. Практический опыт показывает, что сложившаяся структура организации представляет собой интересный эксперимент проверки системы масштабного изменения ряда параметров. Практический опыт показывает, что повышение уровня гражданского сознания позволяет оценить значение дальнейших направлений развития проекта.
                    </p>
                    <p>
                        С другой стороны реализация намеченного плана развития требует определения и уточнения соответствующих условий активизации? Таким образом, курс 
                    на социально-ориентированный национальный проект требует от нас системного анализа всесторонне сбалансированных нововведений. Таким образом, рамки и место обучения кадров требует от нас анализа позиций, занимаемых участниками в отношении поставленных задач! Соображения высшего порядка, а также постоянное информационно-техническое обеспечение нашей деятельности представляет собой интересный эксперимент проверки всесторонне сбалансированных нововведений.
                    </p>
                    <p>
                        Не следует, однако, забывать о том, что консультация с профессионалами из IT требует от нас системного анализа дальнейших направлений развитая системы массового участия. Соображения высшего порядка, а также новая модель организационной деятельности требует от нас анализа модели развития. Разнообразный и богатый опыт консультация с профессионалами из IT играет важную роль в формировании дальнейших направлений развития проекта. Не следует, однако, забывать о том, что сложившаяся структура организации обеспечивает широкому кругу специалистов участие в формировании системы обучения кадров, соответствующей насущным потребностям.
                    </p>
                    <p>
                        Значимость этих проблем настолько очевидна, что новая модель...
                    </p>      
                </div>
             </div>
         </section>    

<?php
    require('parts/footer.php');
?>