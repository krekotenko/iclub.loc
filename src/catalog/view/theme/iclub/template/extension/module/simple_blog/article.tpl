<?php echo $header; ?>
<section class="page-section blog_section">
    <div class="wrapper">

        <div class="breadcrumb-block">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">
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
                <?php if($articles) { ?>
                <?php foreach ($articles as $key => $article) : ?>
                <div class="col-sm-6 col-lg-4">
                    <article class="article-card">
                        <a href="<?php echo $article['href']; ?>">
                            <div class="article-card__media article-card__media--16-9" style="background-image: url(<?php echo $article['image']; ?>)"></div>
                            <div class="article-card__descr">
                                <div class="article-card__title"><?php echo ucwords($article['article_title']); ?></div>
                                <div class="article-card__text">
                                    <?php echo $article['description']; ?>
                                </div>
                                <div class="article-card__date flex-block content-between items-center">
                                    <span><?php echo $article['date_added']; ?></span>
                                    <i class="arrow arrow-right"></i>
                                </div>
                            </div>
                        </a>
                    </article>
                </div>
                <?php endforeach; ?>
                <?php  } ?>
            </div>
        </div>

        <nav class="pagination_block" aria-label="Page navigation">
            <?php echo $pagination;?>
        </nav>

    </div>
</section>
<?php echo $footer; ?>