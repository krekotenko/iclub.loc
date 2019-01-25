<?php
    require('parts/header.php');

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



<section class="page-section personal-data-section">


    <div class="wrapper">

        <div class="breadcrumb-block">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Главная</a></li>
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
                    <div class="personal-box js-form-personal">

                        <h2 class="h2">Личные данные</h2>

                        <form class="form personal-data" novalidate>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Имя и Фамилия</label>
                                        <input for="name" class="form-control" type="text" required>                                                
                                    </div>
                                </div>                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Электронная почта</label>
                                        <input type="email" class="form-control" id="email" aria-describedby="email" required>             
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="tel">Мобильный телефон</label>
                                        <input for="tel" class="form-control js-phone" type="tel" required>                                                
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Область</label>
                                        <select class="select js-select">
                                            <?php foreach($regions as $region) : ?>
                                            <option value="<?php echo $region;?>"><?php echo $region;?></option>
                                            <?php endforeach; ?>    
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Город</label>
                                        <input for="name" class="form-control" type="text">                                                
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Адрес</label>
                                        <input for="name" class="form-control" type="text">                                                
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



<?php
    require('parts/footer.php');
?>