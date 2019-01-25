</main>

<footer class="footer">

  <div class="wrapper">

    <div class="row">
      <div class="col-md-4 col-lg-3 col-xl-4">
        <div class="footer-blocks">
          <div class="logo footer-logo">
            <a href="/">
                <svg viewBox="0 0 94 50" width="113px" height="60px" class="colored_white">
              <use xlink:href="#iclub-logo"></use>
            </svg>
            </a>
          </div>
          <div class="copyright">
            &copy; 2018. IClub Интернет-Магазин. <br> Все права защищены.
          </div>
          <div class="developers">
            <span>Разработка сайта:</span> <br>
            <a target="_blanck" href="https://swotdigital.net/" class="dev-logo">
              <svg width="55" height="20">
                <use xlink:href="#logo-swot"></use>
              </svg>
            </a>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-lg-2 col-xl-2">
        <nav class="menu footer-menu footer-blocks">
          <ul>
              <?php foreach ($informations as $information) { ?>
              <li><a href="<?php echo $information['href']; ?>"><?php echo $information['title']; ?></a></li>
              <?php } ?>
          </ul>
        </nav>
      </div>
      <div class="col-md-4 col-lg-3 col-xl-3">
        <address class="footer-contact footer-blocks">
          <ul>
            <li>
              <h6 class="footer-contact__title footer__title">Бесплатный звонок:</h6>
              <a href="tel:<?php echo $telephone;?>" class="footer-contact__item footer-contact__phone"><?php echo $telephone;?></a>
            </li>
            <li>
              <h6 class="footer-contact__title footer__title">Связь с нами:</h6>
              <a href="mailto:iclub@gmail.com" class="footer-contact__item footer-contact__mail"><?php echo $email;?></a>
            </li>
            <li>
              <h6 class="footer-contact__title footer__title">Режим работы:</h6>
              <span class="footer-contact__item footer-contact__timework"><?php echo $open;?></span>
            </li>
          </ul>
        </address>
      </div>
      <div class="col-md-12 col-lg-4 col-xl-3">
        <nav class="footer-social footer-blocks">
          <ul>
            <li>
              <h6 class="footer-social__title footer__title">Мы в Вконтакте:</h6>
              <a target="_blanck" href="https://vk.com/apple_iclub" class="footer-social__item inline-groups">
                                    <span class="footer-social__icon">
                                        <svg viewBox="0 0 16 9" width="16px" height="9px" class="colored_white">
                                            <use xlink:href="#vk"></use>
                                        </svg>
                                    </span>
                <span class="footer-social__name">Оф. группа</span>
              </a>
              <a target="_blanck" href="https://vk.com/iclub_melitopol08_0" class="footer-social__item inline-groups">
                                    <span class="footer-social__icon">
                                        <svg viewBox="0 0 16 9" width="16px" height="9px" class="colored_white">
                                            <use xlink:href="#vk"></use>
                                        </svg>
                                    </span>
                <span class="footer-social__name">Мелитополь</span>
              </a>
              <a target="_blanck" href="https://vk.com/iclub_krivoy_rog" class="footer-social__item inline-groups">
                                    <span class="footer-social__icon">
                                        <svg viewBox="0 0 16 9" width="16px" height="9px" class="colored_white">
                                            <use xlink:href="#vk"></use>
                                        </svg>
                                    </span>
                <span class="footer-social__name">Кривой Рог</span>
              </a>
            </li>

            <li>
              <h6 class="footer-social__title footer__title">Facebook:</h6>
              <a target="_blanck" href="https://www.facebook.com/iclub.apple.melitopol/" class="footer-social__item inline-groups">
                                    <span class="footer-social__icon">
                                        <svg viewBox="0 0 16 16" width="16px" height="16px" class="colored_white">
                                            <use xlink:href="#facebook"></use>
                                        </svg>
                                    </span>
                <span class="footer-social__name">Оф. группа</span>
              </a>
              <a target="_blanck" href="https://www.facebook.com/iclub.apple.melitopol/" class="footer-social__item inline-groups">
                                    <span class="footer-social__icon">
                                        <svg viewBox="0 0 16 16" width="16px" height="16px" class="colored_white">
                                            <use xlink:href="#facebook"></use>
                                        </svg>
                                    </span>
                <span class="footer-social__name">Мелитополь</span>
              </a>
            </li>

          </ul>
          <ul class="footer-social">
            <li>
              <h6 class="footer-social__title footer__title">Instagram:</h6>
              <a target="_blanck" href="https://www.instagram.com/iclub_apple_melitopol/" class="footer-social__item inline-groups">
                                    <span class="footer-social__icon">
                                        <svg viewBox="0 0 16 16" width="16px" height="16px" class="colored_white">
                                            <use xlink:href="#instagram"></use>
                                        </svg>
                                    </span>
                <span class="footer-social__name">Мелитополь</span>
              </a>
              <a target="_blanck" href="https://www.instagram.com/iclub_apple_krivoy_rog/" class="footer-social__item inline-groups">
                                    <span class="footer-social__icon">
                                        <svg viewBox="0 0 16 16" width="16px" height="16px" class="colored_white">
                                            <use xlink:href="#instagram"></use>
                                        </svg>
                                    </span>
                <span class="footer-social__name">Кривой Рог</span>
              </a>
              <a target="_blanck" href="https://www.instagram.com/iclub_apple_berdyansk/" class="footer-social__item inline-groups">
                                    <span class="footer-social__icon">
                                        <svg viewBox="0 0 16 16" width="16px" height="16px" class="colored_white">
                                            <use xlink:href="#instagram"></use>
                                        </svg>
                                    </span>
                <span class="footer-social__name">Бердянск</span>
              </a>
            </li>

            <li>
              <h6 class="footer-social__title footer__title">Youtube:</h6>
              <a target="_blanck" href="https://www.youtube.com/channel/UCe16qnY2dEsiZU64l0a6p4A?view_as=subscriber" class="footer-social__item inline-groups">
                                    <span class="footer-social__icon">
                                        <svg viewBox="0 0 16 11" width="16px" height="11px" class="colored_white">
                                            <use xlink:href="#youtube"></use>
                                        </svg>
                                    </span>
                <span class="footer-social__name">Оф. канал</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>

    </div>

  </div>

</footer>


<?php
  require('parts/svg.php');
  require('parts/modals.php');
?>

<script src="/catalog/view/theme/iclub/javascript/bundle.js"></script>
</body>
</html>