<!-- Modals -->



<!-- Cart modal -->
<div class="cart_modal modal fade" id="cart_modal" tabindex="-1" role="dialog" aria-labelledby="cart_modal_title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="cart modal-content">
      <div class="cart modal-header">
        <h2 class="modal-title" id="cart_modal_title">Корзина</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body js_cart_block">
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
                <div class="cart_item_count clearfix">
                  <button class="cart_item_count_nav dec js_cart_item_dec">-</button>
                  <input type="text" class="cart_item_count_nav input js_cart_item_value" value="1">
                  <button class="cart_item_count_nav inc js_cart_item_inc">+</button>
                </div>
                <span class="multiply">x</span>
                <span class="cart_item_old_price js_cart_item_old_price">
                  <span>37 500</span> грн
                </span>
                <span class="cart_item_current_price js_cart_item_current_price">
                  <span>32 499</span> грн
                </span>
              </div>
              <div class="cart_item_total_cost js_cart_item_total_cost">
                <span>32 499</span> грн
              </div>
              <div class="promo_code_block" style="display: none;">
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
                <div class="cart_item_count clearfix">
                  <button class="cart_item_count_nav dec js_cart_item_dec">-</button>
                  <input type="text" class="cart_item_count_nav input js_cart_item_value" value="1">
                  <button class="cart_item_count_nav inc js_cart_item_inc">+</button>
                </div>
                <span class="multiply">x</span>
                <span class="cart_item_old_price js_cart_item_old_price">
                  <span>37 500</span> грн
                </span>
                <span class="cart_item_current_price js_cart_item_current_price">
                  <span>32 499</span> грн
                </span>
              </div>
              <div class="cart_item_total_cost js_cart_item_total_cost">
                <span>32 499</span> грн
              </div>
            </div>
          </div>
        </div>
        <div class="cart_summary_block">
          <span class="cart_summary_text">Сума заказа:</span>
          <span class="cart_summary_cost js_cart_totlal_price"><span>32 499</span> грн</span>
          <br><span class="cart_summary_discount">Скидка 20%</span>
        </div>
      </div>
      <div class="modal-footer cart_buttons flex-block content-between">
        <button type="button" class="btn btn-border-gray" data-dismiss="modal">Продолжить покупки</button>
        <button type="button" class="btn btn-form btn-make-order">оформить заказ</button>
      </div>
    </div>
  </div>
</div>



<!-- Login/registration modal -->
<div class="reg-login_modal modal fade" id="reg-login_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Авторизация</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="registration-tab" data-toggle="tab" href="#registration" role="tab" aria-controls="registration" aria-selected="false">Регистрация</a>
          </li>
        </ul>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
            <form action="#" class="form login_form js_login_form" novalidate>
              <div class="form-group">
                  <label for="email">Электронная почта</label>
                  <input name="email" class="form-control" type="email" required>
              </div>
              <div class="form-group">
                  <label for="pass">Пароль</label>
                  <div class="form_pass_input">
                    <input name="pass" class="form-control" type="password" required>
                    <svg class="js_pass_input_btn" viewBox="0 0 49 30.8">
                        <use xlink:href="#view_pass"></use>
                    </svg>
                  </div>
              </div>
              <div class="result-message js-result-message"></div>
              <input type="submit" class="btn btn-form" value="войти">
              <a href="#" class="forgot_pass_link" data-toggle="modal" data-target="#pass_recovery_modal" onclick="$('#reg-login_modal').modal('hide');">Забыли пароль?</a>
            </form>
          </div>
          <div class="tab-pane fade" id="registration" role="tabpanel" aria-labelledby="registration-tab">
            <form action="#" class="form register_form js_register_form" novalidate>
              <div class="form-group">
                  <label for="name">Имя</label>
                  <input name="name" class="form-control" type="text" required>
              </div>
              <div class="form-group">
                  <label for="email">Электронная почта</label>
                  <input name="email" class="form-control" type="email" required>
              </div>
              <div class="form-group">
                  <label for="pass">Пароль</label>
                  <div class="form_pass_input">
                    <input name="pass" class="form-control" type="password" required>
                    <svg class="js_pass_input_btn" viewBox="0 0 49 30.8">
                        <use xlink:href="#view_pass"></use>
                    </svg>
                  </div>
              </div>
              <div class="result-message js-result-message"></div>
              <input type="submit" class="btn btn-form" value="зарегестрироваться">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Recovery pass -->
<div class="pass_recovery_modal modal fade" id="pass_recovery_modal" tabindex="-1" role="dialog" aria-labelledby="pass_recovery_modal_title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="pass_recovery_modal_title">Восстановление пароля</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" class="form pass_recovery_form js_pass_recovery_form" novalidate>
          <div class="pass_recovery_desc">
            Введите адрес электронной почты, с которого вы совершали регистрацию.
          </div>
          <div class="form-group">
              <label for="email">Электронная почта</label>
              <input name="email" class="form-control" type="email" required>
          </div>
          <div class="result-message js-result-message"></div>
          <input type="submit" class="btn btn-form" value="получить пароль">
        </form>
      </div>
    </div>
  </div>
</div>



<!-- accept recovery pass -->
<div class="accept_recovery_pass_modal modal fade" id="accept_recovery_pass_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <div class="modal-body">
        <div class="accept_recovery_pass_btn" onclick="$('#accept_recovery_pass_modal').modal('hide');">
          <svg version="1.1" id="accept" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 53 41" style="enable-background:new 0 0 53 41;" xml:space="preserve">
            <title>Artboard 99</title>
            <g>
              <path d="M53,8.5L20.5,41L12,32.5l0,0l-12-12L8.5,12l12,12l24-24L53,8.5z"/>
            </g>
          </svg>
        </div>
        <div class="accept_recovery_pass_desc">
          На ваш адрес электронной почты выслано письмо со ссылкой для подтверждения регистрации.
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Discount modal -->
<div class="discount_modal modal fade" id="discount_modal" tabindex="-1" role="dialog" aria-labelledby="discount_modal_title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <img class="modal_image" src="../images/popups/discount.jpg" alt="">
      <div class="modal-header">
        <h2 class="modal-title" id="discount_modal_title">
          Зарегистрируйся и получи скидку <span class="red_text">до 30%</span> на 1-ю покупку
        </h2>
      </div>
      <div class="modal-body">
        <form action="#" class="form discount_register_form js_discount_register_form" novalidate>
          <div class="form-group">
              <label for="name">Имя</label>
              <input name="name" class="form-control" type="text" required>
          </div>
          <div class="form-group">
              <label for="email">Электронная почта</label>
              <input name="email" class="form-control" type="email" required>
          </div>
          <div class="form-group">
              <label for="pass">Пароль</label>
              <div class="form_pass_input">
                <input name="pass" class="form-control" type="password" required>
                <svg class="js_pass_input_btn" viewBox="0 0 49 30.8">
                    <use xlink:href="#view_pass"></use>
                </svg>
              </div>
          </div>
          <div class="result-message js-result-message"></div>
          <input type="submit" class="btn btn-form" value="зарегестрироваться">
        </form>
      </div>
    </div>
  </div>
</div>