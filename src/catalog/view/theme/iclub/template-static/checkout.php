<?php

    require('parts/header.php');

    // local database
    $regions = [
        'Винницкая область',
        'Волынская область',
        'Днепропетровская область',
        'Донецкая область',
        'Житомирская область',
        'Закарпатская область',
        'Запорожская область',
        'Ивано-Франковская область',
        'Киевская область',
        'Кировоградская область',
        'Луганская область',
        'Львовская область',
        'Николаевская область',
        'Одесская область',
        'Полтавская область',
        'Ровненская область',
        'Сумская область',
        'Тернопольская область',
        'Харьковская область',
        'Херсонская область',
        'Хмельницкая область',
        'Черкасская область',
        'Черниговская область',
        'Черновицкая область',
    ];

?>

<section class="page-section checkout_section">
    <div class="wrapper">

        <div class="breadcrumb-block">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">
                            Главная
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Оформление заказа
                    </li>
                </ol>
            </nav>
        </div>

        <h1 class="h1">Оформление заказа</h1>

        <form action="#" class="form checkout_form js_checkout_form checkout_block flex-nowrap" novalidate>
            <div class="checkout_data checkout_part">
                <div class="checkout_data_content">
                    <div class="checkout_data_paragraph">
                        <div class="paragraph_number">
                            1
                        </div>
                        <div class="paragraph_name">
                            Контактные данные
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Имя и Фамилия</label>
                                <input id="name" class="form-control" type="text" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="city">Город</label>
                                <input id="city" class="form-control" type="text" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="region">Область</label>
                                <select id="region" class="checkout_select js-select" required>
                                    <?php foreach($regions as $region) : ?>
                                    <option value="<?php echo $region;?>"><?php echo $region;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="phone">Мобильный телефон</label>
                                <input id="phone" class="form-control js_phone_mask" type="text" required>
                            </div>
                        </div>
                    </div>
                    <div class="checkout_data_paragraph">
                        <div class="paragraph_number">
                            2
                        </div>
                        <div class="paragraph_name">
                            Выбор способов доставки и оплаты
                        </div>
                    </div>
                    <div class="label">
                        Способ доставки: <span>доставка Новой Почтой</span>
                    </div>
                    <div class="radio_group">
                        <input class="js_radio_delivery_way" type="radio" id="address" value="address" name="nova-pochta" checked>
                        <label for="address">Адресная</label>
                        <input class="js_radio_delivery_way" type="radio" id="department" value="department" name="nova-pochta">
                        <label for="department">В отделение Новой Почты</label>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group mb0 js_delivery_address">
                                <label for="delivery_address">Адрес доставки</label>
                                <input id="delivery_address" class="form-control" type="text" required>
                            </div>
                        </div>
                    </div>
                    <div class="label">
                        Способы оплаты:
                    </div>
                    <div class="radio_group">
                        <input type="radio" id="cash" value="cash" name="payment_method" checked>
                        <label for="cash">Наложенным платежом</label>
                        <input type="radio" id="cashless" value="cashless" name="payment_method">
                        <label for="cashless">
                            Безналичный расчет *<br>
                            <span class="clarification">* Вам на почту будет отправлен счет</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="checkout_order checkout_part js_checkout_block">
                <div class="checkout_order_title">Ваш заказ</div>

                <div data-id="1" class="cart_item js_cart_item flex-nowrap">
                    <div class="cart_item_image" style="background: url(../images/cart/cart_item.png) center center no-repeat; background-size: cover;">
                    </div>
                    <div class="cart_item_desc">
                        <div class="cart_item_name flex-nowrap content-between items-top">
                            <div class="cart_item_name_text">
                            Смартфон Apple iPhone X 64GB Space Gray
                            </div>
                            <button class="cart_trash_button js_remove_item">
                                <svg viewBox="0 0 74.5 90">
                                    <use xlink:href="#trash"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="cart_item_cost flex-nowrap content-between items-center">
                            <div class="cart_item_calc flex-block items-center">
                                <div class="inline-groups__middle">
                                    <div class="cart_item_count clearfix">
                                        <button class="cart_item_count_nav dec js_cart_item_dec">-</button>
                                        <input type="text" class="cart_item_count_nav input js_cart_item_value" value="1">
                                        <button class="cart_item_count_nav inc js_cart_item_inc">+</button>
                                    </div>
                                    <div class="cart_item_total_cost js_cart_item_total_cost">
                                        <span>32 499</span> грн
                                    </div>                                 
                                </div>                                
                                <!-- <span class="multiply">x</span> -->
                                <!-- <span class="cart_item_old_price js_cart_item_old_price">
                                <span>37 500</span> грн
                                </span>
                                <span class="cart_item_current_price js_cart_item_current_price">
                                <span>32 499</span> грн
                                </span> -->
                            </div>                            
                            <div class="promo_code_block">
                                <div class="promo_title">Цена по промокоду:</div>
                                <span class="promo_discount js_promo_discount">(<span>20</span>%)</span>
                                <span class="promo_price js_promo_price">
                                    <span>27 560</span> грн
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div data-id="2" class="cart_item js_cart_item flex-nowrap">
                    <div class="cart_item_image" style="background: url(../images/cart/cart_item.png) center center no-repeat; background-size: cover;">
                    </div>
                    <div class="cart_item_desc">
                        <div class="cart_item_name flex-nowrap content-between items-top">
                            <div class="cart_item_name_text">
                            Смартфон Apple iPhone X 64GB Space Gray
                            </div>
                            <button class="cart_trash_button js_remove_item">
                                <svg viewBox="0 0 74.5 90">
                                    <use xlink:href="#trash"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="cart_item_cost flex-nowrap content-between items-center">
                            <div class="cart_item_calc flex-block items-center">
                                <div class="inline-groups__middle">
                                    <div class="cart_item_count clearfix">
                                        <button class="cart_item_count_nav dec js_cart_item_dec">-</button>
                                        <input type="text" class="cart_item_count_nav input js_cart_item_value" value="1">
                                        <button class="cart_item_count_nav inc js_cart_item_inc">+</button>
                                    </div>
                                    <div class="cart_item_total_cost js_cart_item_total_cost">
                                        <span>32 499</span> грн
                                    </div>
                                </div>
                                <!-- <span class="multiply">x</span> -->
                                <!-- <span class="cart_item_old_price js_cart_item_old_price">
                                <span>37 500</span> грн
                                </span>
                                <span class="cart_item_current_price js_cart_item_current_price">
                                <span>32 499</span> грн
                                </span> -->
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="promo_input_block">
                    <input name="promo_code" class="form-control" type="text" placeholder="Введите промокод">
                </div>
                <div class="checkout_delivery_cost flex-block content-between">
                    <span class="text">Стоимость доставки:</span>
                    <span class="price js_delivery_price"><span>150</span> грн.</span>
                </div>
                <div class="checkout_summary_price flex-block content-between">
                    <span class="text">Итого:</span>
                    <span class="price js_cart_totlal_price"><span>27 710</span> грн.</span>
                </div>
                <div class="result-message js-result-message"></div>
                <input type="submit" class="btn btn-form" value="заказ подтверждаю">
            </div>
        </form>

    </div>
</section>

<?php
    require('parts/footer.php');
?>