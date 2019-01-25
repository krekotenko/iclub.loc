<!-- Modals -->



<!-- Cart modal -->
<div class="cart_modal modal fade" id="cart_modal" tabindex="-1" role="dialog" aria-labelledby="cart_modal_title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="cart modal-content">
        <?php echo $cart ?>
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
            <form action="<?php echo $login ?>" class="form login_form js_login_form" novalidate>
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
            <form action="/index.php?route=account/register" class="form register_form js_register_form" novalidate>
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
        <form action="index.php?route=account/forgotten" class="form pass_recovery_form js_pass_recovery_form" novalidate>
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

<!-- accept recovery pass -->
<div class="accept_recovery_pass_modal modal fade" id="accept_change_email_modal" tabindex="-1" role="dialog" aria-hidden="true">
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
            На новый адрес электронной почты выслано письмо со ссылкой подтверждения.
        </div>
      </div>
    </div>
  </div>
</div>

<!-- accept recovery pass -->
<div class="accept_recovery_pass_modal modal fade" id="accept_registration_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <div class="modal-body">
        <div class="accept_recovery_pass_btn" onclick="$('#accept_registration_modal').modal('hide');">
          <svg version="1.1" id="accept" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 53 41" style="enable-background:new 0 0 53 41;" xml:space="preserve">
            <title>Artboard 99</title>
            <g>
              <path d="M53,8.5L20.5,41L12,32.5l0,0l-12-12L8.5,12l12,12l24-24L53,8.5z"/>
            </g>
          </svg>
        </div>
        <div class="accept_recovery_pass_desc">
          На ваш адрес электронной почты выслано письмо со ссылкой для подтверждения восстановления пароля.
        </div>
      </div>
    </div>
  </div>
</div>
<!-- email confirmation -->
<div class="accept_recovery_pass_modal modal fade" id="email_confirmation_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <div class="modal-body">
        <div class="accept_recovery_pass_btn" onclick="$('#email_confirmation_modal').modal('hide');">
          <svg version="1.1" id="accept" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 53 41" style="enable-background:new 0 0 53 41;" xml:space="preserve">
            <title>Artboard 99</title>
            <g>
              <path d="M53,8.5L20.5,41L12,32.5l0,0l-12-12L8.5,12l12,12l24-24L53,8.5z"/>
            </g>
          </svg>
        </div>
        <div class="accept_recovery_pass_desc">
            Регистрация прошла успешно!
        </div>
      </div>
    </div>
  </div>
</div>
<div class="accept_recovery_pass_modal modal fade" id="email_confirmation_account_email_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <div class="modal-body">
        <div class="accept_recovery_pass_btn" onclick="$('#email_confirmation_modal').modal('hide');">
          <svg version="1.1" id="accept" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 53 41" style="enable-background:new 0 0 53 41;" xml:space="preserve">
            <title>Artboard 99</title>
            <g>
              <path d="M53,8.5L20.5,41L12,32.5l0,0l-12-12L8.5,12l12,12l24-24L53,8.5z"/>
            </g>
          </svg>
        </div>
        <div class="accept_recovery_pass_desc">
            Данные успешно сохранены!
        </div>
      </div>
    </div>
  </div>
</div>

<div class="accept_recovery_pass_modal modal fade" id="success_reset_password_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <div class="modal-body">
        <div class="accept_recovery_pass_btn" onclick="$('#success_reset_password_modal').modal('hide');">
          <svg version="1.1" id="accept" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 53 41" style="enable-background:new 0 0 53 41;" xml:space="preserve">
            <title>Artboard 99</title>
            <g>
              <path d="M53,8.5L20.5,41L12,32.5l0,0l-12-12L8.5,12l12,12l24-24L53,8.5z"/>
            </g>
          </svg>
        </div>
        <div class="accept_recovery_pass_desc">
            Пароль успешно изменен!
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