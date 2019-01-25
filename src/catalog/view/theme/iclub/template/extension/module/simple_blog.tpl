<?php if($articles) { ?>
<section class="news-section">
    <div class="wrapper">
        <h2 class="h2"><?php echo $heading_title; ?> <a href="<?php echo $blogsLink;?>" class="h2-link">Все новости</a></h2>
        <div class="row">

            <?php foreach ($articles as $article) { ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <article class="article-card">
                    <a href="<?php echo $article['href']; ?>">
                        <div class="article-card__media article-card__media--16-9" style="background-image: url(<?php echo $article['image']; ?>)"></div>
                        <div class="article-card__descr">
                            <div class="article-card__title"><?php echo $article['article_title']; ?></div>
                            <div class="article-card__date flex-block content-between items-center">
                                <span><?php echo $article['date_added']; ?></span>
                                <i class="arrow arrow-right"></i>
                            </div>
                        </div>
                    </a>
                </article>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>
