<?php
    require('parts/header.php');

?>



<section class="page-section personal-data-section">


    <div class="wrapper">

        <div class="breadcrumb-block">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Список желаний</li>
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
                            <li class="list-group-item active d-flex justify-content-between align-items-center"> 
                                <a href="#"><span>Список желаний</span></a><i class="arrow"></i>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center"> 
                                <a href="#"><span>Мои заказы</span></a>
                            </li>
                        </ul>
                    </nav>                    
                </div>
                <div class="col-md-9">
                    <div class="personal-box">

                        <h2 class="h2">Список желаний</h2>


                        <div class="favorite-block">

                            <div class="row no-gutters products">
                            <?php
                                require('parts/product-favorite.php');
                            ?>
                            </div>

                        </div>

                        <div class="favorite-result">
                            <div class="inline-groups__bottom">
                                <span class="favorite-result__item"> <span class="js-total-orders">3</span> товара на сумму</span>
                                <span class="favorite-result__item"> <strong> <span class="js-total-price">25 360</span> грн.</strong> </span>
                            </div>
                            
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