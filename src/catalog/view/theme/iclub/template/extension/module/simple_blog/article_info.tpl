<?php echo $header; ?>

<section class="page-section blog_inner_section">
    <div class="wrapper">

        <div class="breadcrumb-block">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
                    <li class="breadcrumb-item">
                        <a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
                    <?php } ?>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $article_info['article_title']; ?></li>
                </ol>
            </nav>
        </div>

        <h1 class="h1"><?php echo $article_info['article_title']; ?></h1>

        <div class="bi_post_publication_date"><?php echo $article_date_modified; ?></div>

        <?php if($image) { ?>
        <?php if(isset($featured_found)) { ?>
            <img src="<?php echo $image; ?>" alt="<?php echo $article_info['article_title']; ?>"  class="editable_page_image" />
        <?php } else { ?>
            <img src="<?php echo $image; ?>" alt="<?php echo $article_info['article_title']; ?>"  />
        <?php } ?>
        <?php } ?>

        <div class="editable_page_content">
            <div class="editable_page_content_wrapper">
                <?php if($article_additional_description) { ?>
                    <?php foreach($article_additional_description as $description) { ?>
                            <?php echo html_entity_decode($description['additional_description'], ENT_QUOTES, 'UTF-8'); ?>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>

        <?php if($products) { ?>
            <div class="block-products top-products">
                <h2>Рекомендуемые товары</h2>
                <div class="row no-gutters justify-content-center js-product-carousel products">
                    <?php foreach ($products as $key => $product) : ?>
                    <div class="col-sm-auto col-lg-3">
                        <div class="products-wrapper js_products__item">
                            <div class="products__item products__zoom">

                                <?php echo $product['colorsmodule'];?>

                                <div class="products__body">
                                    <a href="<?php echo $product['href']; ?>" class="products__img">
                                        <img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>">
                                    </a>
                                    <a href="#single-prouct" class="products__name"><?php echo $product['name']; ?></a>
                                    <div class="products__prices inline-groups__middle">
                                        <?php if($product['special']) : ?>
                                        <div class="products__prices-old inline-groups__bottom"><span><?php echo $product['price']; ?></span> <span>грн</span></div>
                                        <div class="products__prices-new inline-groups__bottom"><strong><?php echo $product['special']; ?></strong> <span>грн</span></div>
                                        <?php else :?>
                                        <div class="products__prices-new inline-groups__bottom"><strong><?php echo $product['price']; ?></strong> <span>грн</span></div>
                                        <?php endif; ?>
                                    </div>
                                    <?php if($product['totalReviews']) :?>
                                    <a href="<?php echo $product['href']; ?>#review" class="products__reviews">
                                        <div class="products__stars">
                                            <div class="reviews-stars-outer">
                                                <div class="reviews-stars__empty">
                                                    <?php for( $i = 0; $i <= 5; $i++ ) : ?>
                                                    <svg viewBox="0 0 16 16" width="16px" height="16px">
                                                        <use xlink:href="#star-empty"></use>
                                                    </svg>
                                                    <?php endfor; ?>
                                                </div>
                                            </div>
                                            <div class="reviews-stars-outer" style="width:<?php echo ($product['srReviews']*100)/5; ?>%">
                                                <div class="reviews-stars__full">
                                                    <?php for( $i = 0; $i <= 5; $i++ ) : ?>
                                                    <svg fill="#ffd541" viewBox="0 0 16 16" width="16px" height="16px">
                                                        <use xlink:href="#star-full"></use>
                                                    </svg>
                                                    <?php endfor; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="products__comments"><?php echo $product['totalReviews']; ?> отзывов</div>
                                    </a>
                                    <?php else :?>
                                    <a href="<?php echo $product['href']; ?>#review" class="products__reviews"><div class="products__comments">Оставить отзыв</div></a>
                                    <?php endif;?>
                                    <div class="products__buttons">
                                        <a href="<?php echo $product['href']; ?>" class="btn btn-buy inline-group">
                        <span class="btn-buy__icon">
                            <svg viewBox="0 0 100 100" width="18px" height="22px" class="colored_white"><use xlink:href="#buy"></use></svg>
                        </span>
                                            <span class="btn-buy__text">купить</span>
                                        </a>
                                        <a href="#" class="btn btn-like js-btn-like">
                                            <svg viewBox="0 0 110 100" width="25px" fill="#ffffff" stroke="#269fee"><use xlink:href="#like"></use></svg>
                                        </a>
                                    </div>
                                    <div class="products__descr">

                                        <?php foreach ($product['attribute_groups'] as $attribute_group) { ?>
                                        <?php foreach ($attribute_group['attribute'] as $attribute) : ?>
                                        <?php echo trim($attribute_group['name'],':'); ?>/<?php echo $attribute['name']; ?><br/>
                                        <?php endforeach; ?>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php } ?>


        <?php if($showComments) {?>
        <div class="bi_comments">
            <div class="editable_page_content_wrapper">
                <h2 class="bi_comments_h2">
                    Комментарии
                </h2>

                <?php for ($i=0; $i < 5; $i++) { ?>
                <div class="bi_comment_item">
                    <div class="bi_comment_title">
                        Иванов Иван, <span class="bi_comment_date">28 октября, 13:57</span>
                    </div>
                    <p>
                        Телевизор был куплен для воспроизведения мультиков для дочери на английском языке. Очень удобный пульт, отлично, что поддерживает все популярные форматы, с Тв, который в другой комнате были проблемы, не было звука, а этот читает все файлы без проблем.
                    </p>
                </div>
                <?php } ?>

                <nav class="pagination_block" aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                    </ul>
                </nav>

                <h2 class="bi_comments_h2">Оставить комментарий</h2>
                <form action="#" class="form bi_comment_form js_bi_comment_form" novalidate>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Введите имя</label>
                                <input for="name" class="form-control" type="text" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">Введите email</label>
                                <input for="email" class="form-control" type="email" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="comment">Ваш комментарий</label>
                                <textarea name="comment" class="form-control" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="result-message js-result-message"></div>
                    <button type="submit" class="btn btn-primary">отправить</button>
                </form>
            </div>
        </div>
        <?php } ?>

        <?php if($showSeo) { ?>
        <div class="bi_about_iclub">
            <h2>Интернет-магазин IClub</h2>
            <p>
                С другой стороны реализация намеченного плана развития напрямую зависит от системы обучения кадров, соответствующей насущным потребностям. Практический опыт показывает, что сложившаяся структура организации представляет собой интересный эксперимент проверки системы масштабного изменения ряда параметров. Практический опыт показывает, что повышение уровня гражданского сознания позволяет оценить значение дальнейших направлений развития проекта.
            </p>
            <p>
                С другой стороны реализация намеченного плана развития требует определения и уточнения соответствующих условий активизации? Таким образом, курс на социально-ориентированный национальный проект требует от нас системного анализа всесторонне сбалансированных нововведений. Таким образом, рамки и место обучения кадров требует от нас анализа позиций, занимаемых участниками в отношении поставленных задач! Соображения высшего порядка, а также постоянное информационно-техническое обеспечение нашей деятельности представляет собой интересный эксперимент проверки всесторонне сбалансированных нововведений.
            </p>
        </div>
        <?php } ?>

    </div>
</section>

<?php echo $footer; ?>
