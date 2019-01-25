<?php

    require('parts/header.php');

    // local database
    $articles = [
        [
            'img' => '../images/blog/blog-1.jpg',
            'title' => 'Телевизоры Sony Master Series AF9 - новый этап в достижении',
            'desc' => 'Разнообразный и богатый опыт рамки и место обучения кадров требует от нас анализа новых предложений.',
            'date' => '24 октября 2018',
        ],
        [
            'img' => '../images/blog/blog-2.jpg',
            'title' => 'Предзаказы на инновационный смартфон',
            'desc' => 'Разнообразный и богатый опыт рамки и место обучения кадров требует от нас анализа новых предложений.',
            'date' => '24 октября 2018',
        ],
        [
            'img' => '../images/blog/blog-3.jpg',
            'title' => 'Новая линейка экшен-камер GoPro Hero7',
            'desc' => 'Разнообразный и богатый опыт рамки и место обучения кадров требует от нас анализа новых предложений.',
            'date' => '24 октября 2018',
        ],
        [
            'img' => '../images/blog/blog-4.jpg',
            'title' => 'Официальные продажи новых iPhone 2018 начнутся в первой половине октября ',
            'desc' => 'Разнообразный и богатый опыт рамки и место обучения кадров требует от нас анализа новых предложений.',
            'date' => '24 октября 2018',
        ],
        [
            'img' => '../images/blog/blog-5.jpg',
            'title' => 'Телевизоры Sony Master Series AF9 - новый этап в достижении',
            'desc' => 'Разнообразный и богатый опыт рамки и место обучения кадров требует от нас анализа новых предложений.',
            'date' => '24 октября 2018',
        ],
        [
            'img' => '../images/blog/blog-6.jpg',
            'title' => 'Предзаказы на инновационный смартфон',
            'desc' => 'Разнообразный и богатый опыт рамки и место обучения кадров требует от нас анализа новых предложений.',
            'date' => '24 октября 2018',
        ],
        [
            'img' => '../images/blog/blog-7.jpg',
            'title' => 'Новая линейка экшен-камер GoPro Hero7',
            'desc' => 'Разнообразный и богатый опыт рамки и место обучения кадров требует от нас анализа новых предложений.',
            'date' => '24 октября 2018',
        ],
        [
            'img' => '../images/blog/blog-8.jpg',
            'title' => 'Официальные продажи новых iPhone 2018 начнутся в первой половине октября ',
            'desc' => 'Разнообразный и богатый опыт рамки и место обучения кадров требует от нас анализа новых предложений.',
            'date' => '24 октября 2018',
        ],
        [
            'img' => '../images/blog/blog-1.jpg',
            'title' => 'Телевизоры Sony Master Series AF9 - новый этап в достижении',
            'desc' => 'Разнообразный и богатый опыт рамки и место обучения кадров требует от нас анализа новых предложений.',
            'date' => '24 октября 2018',
        ]
    ];

?>

<section class="page-section blog_section">
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
                        Блог
                    </li>
                </ol>
            </nav>
        </div>

        <h1 class="h1">Блог</h1>

        <div class="posts_block">
            <div class="row">
                <?php foreach ($articles as $key => $article) : ?>
                <div class="col-sm-6 col-lg-4">
                    <article class="article-card">
                        <a href="#">
                            <div class="article-card__media article-card__media--16-9" style="background-image: url(<?php echo $article['img']; ?>)"></div>
                            <div class="article-card__descr">
                                <div class="article-card__title"><?php echo $article['title']; ?></div>
                                <div class="article-card__text">
                                    <?php echo $article['desc']; ?>
                                </div>
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

        <nav class="pagination_block" aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
            </ul>
        </nav>

    </div>
</section>

<?php
    require('parts/footer.php');
?>