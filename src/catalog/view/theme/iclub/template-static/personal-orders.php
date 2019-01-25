<?php
    require('parts/header.php');

    // local

    $orders = [        
        [
            'title' => 'Заказ №2340560 от 6 ноября 2018',
            'status' => 'Выполнен',
            'total-price' => '25 560',
            'orders_list' => [
                [
                    'img' => '../images/personal/img-1.jpg',
                    'name' => 'Смартфон Apple iPhone X 64GB Space Gray',
                    'quantity' => '2',
                    'price-old' => '25 560',
                    'price' => '18 900',
                    'delivery' => 'в отделение Новой Почты',
                    'payment' => 'наложенным платежом'
                ],
            ]
        ],
        [
            'title' => 'Заказ №2340560 от 6 ноября 2018',
            'status' => 'Выполнен',
            'total-price' => '25 560',
            'orders_list' => [
                [
                    'img' => '../images/personal/img-1.jpg',
                    'name' => 'Смартфон Apple iPhone X 64GB Space Gray',
                    'quantity' => '2',
                    'price-old' => '25 560',
                    'price' => '18 900',
                    'delivery' => 'в отделение Новой Почты',
                    'payment' => 'наложенным платежом'
                ],
                [
                    'img' => '../images/personal/img-1.jpg',
                    'name' => 'Смартфон Apple iPhone X 64GB Space Gray',
                    'quantity' => '2',
                    'price-old' => '25 560',
                    'price' => '18 900',
                    'delivery' => 'в отделение Новой Почты',
                    'payment' => 'наложенным платежом'
                ],
                [
                    'img' => '../images/personal/img-1.jpg',
                    'name' => 'Смартфон Apple iPhone X 64GB Space Gray',
                    'quantity' => '2',
                    'price-old' => '25 560',
                    'price' => '18 900',
                    'delivery' => 'в отделение Новой Почты',
                    'payment' => 'наложенным платежом'
                ],
            ]
        ],
        [
            'title' => 'Заказ №2340560 от 6 ноября 2018',
            'status' => 'Выполнен',
            'total-price' => '25 560',
            'orders_list' => [
                [
                    'img' => '../images/personal/img-1.jpg',
                    'name' => 'Смартфон Apple iPhone X 64GB Space Gray',
                    'quantity' => '2',
                    'price-old' => '25 560',
                    'price' => '18 900',
                    'delivery' => 'в отделение Новой Почты',
                    'payment' => 'наложенным платежом'
                ],
                [
                    'img' => '../images/personal/img-1.jpg',
                    'name' => 'Смартфон Apple iPhone X 64GB Space Gray',
                    'quantity' => '2',
                    'price-old' => '25 560',
                    'price' => '18 900',
                    'delivery' => 'в отделение Новой Почты',
                    'payment' => 'наложенным платежом'
                ]                           
            ]
        ],
        [
            'title' => 'Заказ №2340560 от 6 ноября 2018',
            'status' => 'Выполнен',
            'total-price' => '25 560',
            'orders_list' => [
                [
                    'img' => '../images/personal/img-1.jpg',
                    'name' => 'Смартфон Apple iPhone X 64GB Space Gray',
                    'quantity' => '2',
                    'price-old' => '25 560',
                    'price' => '18 900',
                    'delivery' => 'в отделение Новой Почты',
                    'payment' => 'наложенным платежом'
                ],
            ]
        ],        
        
    ];

?>


<section class="page-section personal-data-section">


    <div class="wrapper">

        <div class="breadcrumb-block">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Мои заказы</li>
                </ol>
            </nav>
        </div>

        <h1 class="h1">Личный кабинет</h1>

        <div class="personal">
            <div class="row">
                <div class="col-md-3">
                    <nav class="personal-nav">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="#">Персональные данные</a>                          
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center"> 
                                <a href="#"><span>Список желаний</span></a>
                            </li>
                            <li class="list-group-item active d-flex justify-content-between align-items-center"> 
                                <a href="#"><span>Мои заказы</span></a><i class="arrow"></i> 
                            </li>
                        </ul>
                    </nav>                    
                </div>
                <div class="col-md-9">
                    <div class="personal-box js-form-personal">

                        <h2 class="h2">Мои заказы</h2>

                        <div class="accordion">

                            <?php foreach ($orders as $i => $order) : ?>
                            <div class="orders__item">
                            
                                <a class="orders__title collapsed" data-toggle="collapse" href="#collapse-<?php echo $i; ?>">
                                    <div class="orders__head-top">
                                        <?php echo $order['title']; ?>
                                    </div>
                                    <div class="orders__head-bottom inline-groups__bottom">
                                        <span class="orders__status"> Статус заказа: <i><?php echo $order['status']; ?></i></span> </span>
                                        <span class="orders__price"> Стоимость: <strong> <?php echo $order['total-price']; ?> </strong> <span style="">грн.</span></span>
                                    </div>
                                    <i class="arrow"></i>
                                </a>
                                
                                <div id="collapse-<?php echo $i; ?>" class="collapse">
                                    <ul class="orders__list">
                                        <?php foreach ($order['orders_list'] as $i => $orders_list) : ?>  
                                        <li class="flex-block">
                                            <div class="order__img">
                                                <img src="<?php echo $orders_list['img']; ?>" alt="">
                                            </div>
                                            <div class="order__body">
                                                <div class="order__name"><?php echo $orders_list['name']; ?></div>
                                                <ul class="inline-groups__bottom order__info-list">
                                                    <li>
                                                        <h6>Кол-во:</h6>
                                                        <div><?php echo $orders_list['quantity']; ?></div>
                                                    </li>
                                                    <li>
                                                        <h6>Цена:</h6>
                                                        <div class="inline-groups__middle">
                                                            <span class="order__old-price"><?php echo $orders_list['price-old']; ?> грн</span>
                                                            <span class="order__price"><?php echo $orders_list['price']; ?> грн</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <h6>Доставка:</h6>
                                                        <div><?php echo $orders_list['delivery']; ?></div>
                                                    </li>
                                                    <li>
                                                        <h6>Оплата:</h6>
                                                        <div><?php echo $orders_list['payment']; ?></div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <?php endforeach; ?> 
                                    </ul>
                                </div>

                            </div>
                            <?php endforeach; ?> 


                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php
    require('parts/footer.php');
?>