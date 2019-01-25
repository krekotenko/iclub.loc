<?php

    require('parts/header.php');

    // local database

?>

<section class="page-section pass_recovery_section">
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
                        Восстановление доступа
                    </li>
                </ol>
            </nav>
        </div>

        <h1 class="h1">Восстановление доступа</h1>

        <div class="pass_recovery_block">
            <div class="pass_recovery2_desc">
                Введите свой адрес электронной почты и новый пароль для доступа к аккаунту.
            </div>
            <form action="#" class="form pass_recovery_form2 js_pass_recovery_form2" novalidate>
                <div class="form-group">
                    <label for="name">E-mail</label>
                    <input for="name" class="form-control" type="email" required>
                </div>
                <div class="form-group">
                    <label for="passOld">Пароль</label>
                    <div class="form_pass_input">
                        <input for="passOld" class="form-control" type="password" required>
                        <svg class="js_pass_input_btn" viewBox="0 0 49 30.8">
                            <use xlink:href="#view_pass"></use>
                        </svg>
                    </div>
                </div>
                <div class="form-group">
                    <label for="passNew">Подтверждение пароля</label>
                    <div class="form_pass_input">
                        <input for="passNew" class="form-control" type="password" required>
                        <svg class="js_pass_input_btn" viewBox="0 0 49 30.8">
                            <use xlink:href="#view_pass"></use>
                        </svg>
                    </div>
                </div>
                <div class="result-message js-result-message"></div>
                <input type="submit" class="btn btn-form" value="отправить">
            </form>
        </div>

    </div>
</section>

<?php
    require('parts/footer.php');
?>