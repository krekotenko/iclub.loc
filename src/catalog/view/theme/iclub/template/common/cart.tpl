<div class="cart modal-header">
    <h2 class="modal-title" id="cart_modal_title">Корзина</h2>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body js_cart_block">
    <?php if (!$products) { ?>
        <h2>В корзине пусто</h2>
    <?php } else {?>
    <?php foreach ($products as $key => $product) { ?>
        <div data-id="1" class="cart_item js_cart_item flex-nowrap">
            <div class="cart_item_image" style="background: url(<?php echo $product['thumb'] ?>) center center no-repeat; background-size: cover;">
            </div>
            <div class="cart_item_desc">
                <div class="cart_item_name flex-nowrap content-between items-top">
                    <div class="cart_item_name_text">
                        <?php echo $product['name'] ?>
                    </div>
                    <button class="cart_trash_button js_remove_item" data-cart-id="<?php echo $product['cart_id']; ?>">
                        <svg viewBox="0 0 74.5 90">
                            <use xlink:href="#trash"></use>
                        </svg>
                    </button>
                </div>
                <div class="cart_item_cost flex-nowrap content-between items-center">
                    <div class="cart_item_calc flex-block items-center">
                        <div class="cart_item_count clearfix">
                            <button class="cart_item_count_nav dec js_cart_item_dec">-</button>
                            <input type="text" class="cart_item_count_nav input js_cart_item_value" data-cart-id="<?php echo $product['cart_id']; ?>" value="<?php echo $product['quantity'] ?>">
                            <button class="cart_item_count_nav inc js_cart_item_inc">+</button>
                        </div>
                        <span class="multiply">x</span>
                        <?php if ($product['special']) { ?>
                            <span class="cart_item_old_price js_cart_item_old_price">
                                <span><?php echo $product['price']  ?></span> грн
                            </span>
                            <span class="cart_item_current_price js_cart_item_current_price">
                                <span><?php echo $product['special']  ?></span> грн
                            </span>
                        <?php } else { ?>
                            <span class="cart_item_current_price js_cart_item_current_price">
                                <span><?php echo $product['price']  ?></span> грн
                            </span>
                        <?php } ?>

                    </div>
                    <div class="cart_item_total_cost js_cart_item_total_cost">
                        <span><?php echo $product['totalPrice']  ?></span> грн
                    </div>
                    <div class="promo_code_block" style="display: none;">
                        <div class="promo_title">Цена по промокоду:</div>
                        <span class="promo_discount js_promo_discount">(<span>20</span>%)</span>
                        <span class="promo_price js_promo_price">
                  <span><?php echo $total ?></span> грн
                </span>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
        <div class="cart_summary_block">
            <span class="cart_summary_text">Сума заказа:</span>
            <span class="cart_summary_cost js_cart_totlal_price"><span><?php echo $total ?></span> грн</span>
            <br><span class="cart_summary_discount">Скидка <?php echo $discountPercent ?>%</span>
        </div>
    <?php } ?>
</div>
<div class="modal-footer cart_buttons flex-block content-between">
    <button type="button" class="btn btn-border-gray" data-dismiss="modal">Продолжить покупки</button>
    <a href="<?php echo $checkout ?>" class="btn btn-form btn-make-order">оформить заказ</a>
</div>
