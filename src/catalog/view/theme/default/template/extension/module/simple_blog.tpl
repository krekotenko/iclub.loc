

<?php if($articles) { ?>
  <div class="row">
  <div class="module" id="blog-module">
    <div class="container">
  <div class="homepage-blog">
        <h3 class="panel-title" style="margin-bottom: 20px;"><?php echo $heading_title; ?></h3>
   <div class="row">

          <?php foreach ($articles as $article) { ?>
          <div class="product-layout col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
            <div class="homepage-blog-post ">
                	<h1 href="<?php echo $article['href']; ?>"><?php echo $article['article_title']; ?></h1>
              <p></p> <p><?php echo $article['description']; ?></p>
                  	<a href="<?php echo $article['href']; ?>">Continue reading</a>
                </div>
          </div>
            <?php } ?>
    </div>
  </div>
</div>
</div>
</div>
  <?php } ?>
