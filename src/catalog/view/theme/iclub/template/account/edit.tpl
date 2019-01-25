<?php echo $header; ?>
<section class="page-section personal-data-section">
    <div class="wrapper">
        <div class="breadcrumb-block">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Персональные данные</li>
                </ol>
            </nav>
        </div>

        <h1 class="h1">Личный кабинет</h1>

        <div class="personal">
            <div class="row">
                <div class="col-md-3">
                    <nav class="personal-nav">
                        <ul class="list-group">
                            <li class="list-group-item active d-flex justify-content-between align-items-center">
                                <a href="#">Персональные данные</a><i class="arrow"></i>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="#"><span>Список желаний</span></a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="#"><span>Мои заказы</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-9">
                    <div class="personal-box">

                        <h2 class="h2">Личные данные</h2>
                        <form action="index.php?route=account/edit" class="form personal-data js-form-personal" novalidate>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">Имя и Фамилия</label>
                                        <input name="firstname" value="<?php echo $firstname; ?>" class="form-control" id="firstname" type="text" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Электронная почта</label>
                                        <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" id="email" aria-describedby="email" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="telephone">Мобильный телефон</label>
                                        <input for="telephone" name="telephone" value="<?php echo $telephone; ?>" class="form-control js-phone" id="telephone" type="tel">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Область</label>
                                        <select class="select js-select" name="address[zone_id]">
                                            <?php foreach($zones as $zone) : ?>
                                                <option <?php echo $address['zone_id'] == $zone['zone_id'] ? "selected" : '' ?>  value="<?php echo $zone['zone_id'];?>"><?php echo $zone['name'];?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Город</label>
                                        <input for="name" name="address[city]" value="<?php echo $address['city'] ?>" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Адрес</label>
                                        <input for="name" name="address[address]" value="<?php echo $address['address_1'] ?>" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="result-message js-result-message"></div>

                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $footer; ?>
