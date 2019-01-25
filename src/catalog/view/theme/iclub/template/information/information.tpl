<?php echo $header; ?>
  <section class="page-section about_section">
    <div class="wrapper">
      <div class="breadcrumb-block">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <?php foreach ($breadcrumbs as $key => $breadcrumb) { ?>
                <?php if ($key == (count($breadcrumbs)-1)) { ?>
                    <li class="breadcrumb-item active"><?php echo $breadcrumb['text']; ?></li>
                <?php } else { ?>
                    <li class="breadcrumb-item"><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
                <?php } ?>
            <?php } ?>
          </ol>
        </nav>
      </div>

      <h1 class="h1"><?php echo $heading_title; ?></h1>

      <img src="<?php echo $image; ?>" alt="" class="editable_page_image">
      <div class="editable_page_content">
        <div class="editable_page_content_wrapper">
          <?php echo $description; ?>
        </div>
      </div>

    </div>
  </section>
<?php echo $footer; ?>