<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/catalog/view/theme/iclub/stylesheet/style.css">
  <title><?php echo $title;  ?></title>
  <base href="<?php echo $base; ?>" />
  <?php if ($description) { ?>
  <meta name="description" content="<?php echo $description; ?>" />
  <?php } ?>
  <?php if ($keywords) { ?>
  <meta name="keywords" content= "<?php echo $keywords; ?>" />
  <?php } ?>
  <meta property="og:title" content="<?php echo $title; ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?php echo $og_url; ?>" />
</head>
<body>

<header class="header">
  <div class="header-top">
    <div class="wrapper">
      <div class="flex-block flex-group items-center content-between">
        <div class="flex-item d-block d-lg-none">
          <button class="burger js-burger">Menu<i></i></button>
        </div>
        <div class="flex-item d-none d-lg-block">
          <nav class="menu header-menu">
            <ul>
              <?php foreach ($informations as $information) { ?>
              <li><a href="<?php echo $information['href']; ?>"><?php echo $information['title']; ?></a></li>
              <?php } ?>
            </ul>
          </nav>
        </div>
        <div class="flex-item">
          <div class="personal-cabinet">
            <a href="<?php echo $account ?>" <?php if(!$logged) {echo 'data-toggle="modal" data-target="#reg-login_modal"';}?>>
                                <span class="personal-cabinet__icon">
                                    <svg width="13px" height="13px" class="colored_white">
                                        <use xlink:href="#user"></use>
                                    </svg>
                                </span>
              <span class="personal-cabinet__text colored_white">Личный кабинет</span>
            </a>
            <?php if ($logged) { ?>
                <a href="<?php echo $logout ?>">
                                    <span class="logout__icon">
                                    </span>
                  <span class="personal-cabinet__text colored_white">Выйти</span>
                </a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="header-middle">
    <div class="wrapper">
      <div class="row justify-content-between align-items-center">
        <div class="col-4 col-sm-3 col-md-2 col-lg">
          <a href="/" class="logo header-logo">
            <svg viewBox="0 0 94 50" width="94px" height="50px" class="colored_white">
              <use xlink:href="#iclub-logo"></use>
            </svg>
          </a>
        </div>
        <div class="col-sm col-md-8 col-4">
          <div class="row align-items-center">
            <div class="col-6 col-sm">
              <div class="search-block">
                <div class="search-icon js-search-icon d-inline-block d-sm-none">
                  <svg width="24px" height="24px" class="colored_white">
                    <use xlink:href="#search"></use>
                  </svg>
                </div>
                <form class="search header-search js-header-search">
                  <input type="serach" class="form-control search-input" placeholder="Поиск по сайту ...">
                  <button type="submit" class="search-button">
                    <div class="search__icon">
                      <svg width="16px" height="16px" class="colored_gray">
                        <use xlink:href="#search"></use>
                      </svg>
                    </div>
                  </button>
                </form>
              </div>
            </div>
            <div class="col-6 col-sm-2 col-md-1 col-lg-6">
              <div class="contact header-contact inline-groups__middle">
                <div class="d-none d-lg-inline-block header-contact__item time-work colored_white">
                  <div class="time-work__icon"></div>
                  <div class="time-work__text">
                    <div class="time-work__text-title">Режим работы:</div>
                    <div class="time-work__text-content">
                      <?php echo $open;?>
                    </div>
                  </div>
                </div>
                <div class="header-contact__item phone-work colored_white">
                  <a href="tel:<?php echo $telephone;?>" class="phone-work__icon d-md-block d-lg-none">
                    <svg viewBox="0 0 100 100" width="24px" height="24px" class="colored_white">
                      <use xlink:href="#phone"></use>
                    </svg>
                  </a>
                  <div class="d-none d-lg-block phone-work__text">
                    <div class="phone-work__text-title">Бесплатно по Украине:</div>
                    <a href="tel:<?php echo $telephone;?>" class="phone-work__text-content"><?php echo $telephone;?></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4 col-sm-2 colpadding0">
          <a href="#" class="header-icon favorite js-favorite__header colored_white" data-toggle="modal" data-target="#discount_modal">
            <div class="position-relative">
                                <span class="favorite__icon">
                                    <svg viewBox="0 0 110 100" width="20px" height="24px" stroke="#ffffff" fill="#269fee">
                                        <use xlink:href="#like"></use>
                                    </svg>
                                </span>
              <span class="counter counter__favorite colored_white">3</span>
            </div>
          </a>
          <a href="#" class="header-icon cart colored_white inline-groups__middle" data-toggle="modal" data-target="#cart_modal">
            <div class=" position-relative">
                                <span class="cart__icon">
                                    <svg width="20px" height="24px" class="colored_white">
                                        <use xlink:href="#cart"></use>
                                    </svg>
                                </span>
              <span class="counter counter__cart colored_white"><?php echo $cartCount ?></span>
            </div>
            <span class="cart__price colored_white"><span class="price"><?php echo $total ?></span> грн.</span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="header-bottom d-none d-lg-block">
    <!-- <div class="header-bottom-wrapper"> -->
    <div class="wrapper">
      <nav class="categories header-categories">
        <ul>
          <?php foreach ($categories as $category) : ?>
          <li>
            <a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a>
            <?php if(count($category['children']) != 0) : ?>
            <div class="header-categories-children">
              <div class="row w-100">
                <?php foreach ($category['children'] as $child) : ?>
                <div class="col-3">
                  <div class="header-categories-children-group inline-groups__top">
                    <div class="header-categories-children__img">
                      <img src="<?php echo $child['image']; ?>" alt="">
                    </div>
                    <div class="header-categories-children__list">
                      <h6><a href="<?php echo $child['href']; ?>"><?php echo $child['name']; ?></a></h6>
                      <?php if($child['children']) :?>
                      <ul>
                        <?php foreach($child['children'] as $childBottom) : ?>
                        <li>
                          <a href="<?php echo $childBottom['href']; ?>"><?php echo $childBottom['name']; ?></a>
                        </li>
                        <?php endforeach; ?>
                      </ul>
                      <?php endif;?>
                    </div>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
            <?php endif; ?>
          </li>
          <?php endforeach; ?>
        </ul>
      </nav>
    </div>
    <!-- </div> -->
  </div>

  <div class="menu menu-mobile d-lg-none js-mobile-menu">

    <h4 class="menu-mobile__title">Категории</h4>
    <ul>
      <?php foreach ($categories as $category) : ?>
      <li>
        <a href="#"><?php echo $category['name']; ?></a>
      </li>
      <?php endforeach; ?>
    </ul>

    <h4 class="menu-mobile__title">Магазин</h4>
    <ul>
      <?php foreach ($informations as $information) { ?>
      <li><a href="<?php echo $information['href']; ?>"><?php echo $information['title']; ?></a></li>
      <?php } ?>
    </ul>

  </div>
</header>

<main>