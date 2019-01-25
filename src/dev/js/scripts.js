import autosize from '../libs/autosize.min'
import Validate from './validate'
import noUiSlider from  '../libs/nouislider.min'

document.addEventListener('DOMContentLoaded', function(){

  autosize(document.querySelectorAll('textarea'));


  // window events
  $(window).on('click', function(event) {

    let { target } = event
    
    // search 
    if( !$(target).closest('.search-block').length ) {
      $('.js-header-search').removeClass('is-open')
    }
    // end

  })
  // end



  // init
  if($('.js-select').length) {
    $('.js-select').niceSelect()    
  }

  if($('.js-phone').length) {
    $(".js-phone").mask("+38-999-99-99-999");   
  }

  // phone mask
    $(".js_phone_mask").mask("+38-999-99-99-999");
  // end



  // menu
  const showMenu = () => {
    $("html, body").css({'overflow':'hidden','height':'100%'})
    $("html").css({'overflow-y':'scroll'})
    $('.js-mobile-menu').addClass('is-open')
  }
  const hideMenu = () => {
    $("html, body").css({'overflow':'visible','height':'auto'})
    $('.js-mobile-menu').removeClass('is-open')
  }

  $('.js-burger').on('click', function() {
    $(this).toggleClass('is-open')        
    $(this).hasClass('is-open') ? showMenu() : hideMenu()
  })
  // end


  // search
  $('.js-search-icon').on('click', function() {
    $('.js-header-search').toggleClass('is-open')
  }) 
  // end


  // home banner
  if($('.js-home-carousel').length) {

    $('.js-home-carousel').slick({
      dots: true,
      infinite: true,
      speed: 1000,
      slidesToShow: 1,
      slidesToScroll: 1,   
      arrows: false,
      adaptiveHeight: true
    });

  }
  // end
  
  // home brancds carousel  
  if($('.js-brands-carousel').length) {  

    $('.js-brands-carousel').slick({
      dots: false,
      infinite: true,
      speed: 1000,
      slidesToShow: 6,
      slidesToScroll: 1,   
      arrows: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true          
          }
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]

    });

  } 
  // end 

  // home product carousel

  class ProductCarousel {
    constructor(elem) {
      this.elem = elem   
    }

    init() {
      if(this.elem.length) {
        this.elem.slick({
          infinite: false,
          speed: 1000,
          slidesToShow: 1,
          slidesToScroll: 1,
          adaptiveHeight: true
        });
      } 
    }

    destroy() {
      if(this.elem.length) {
        this.elem.slick('unslick')
      } 
    }
  }

  const productCarousel = new ProductCarousel($('.js-product-carousel'))

  $(window).on('resize', function() {
    if($(window).width() <= 576) productCarousel.init()
    else productCarousel.destroy()
  })  
  
  if($(window).width() <= 576 ) productCarousel.init()
 

  
  // end

  // add to favorite

  const btnLike = $('.js-btn-like')

  btnLike.on('click', function() {
    $(this).toggleClass('added')

    return false
  })


  const btnLiked = $('.js-favorite__header')

  btnLiked.on('click', function() {
    $(this).toggleClass('favorite_liked')

    return false
  })

  



  //category accordion filter
  if($(window).width() <= 992 && $('.js-filter-block').length) {
    
    $('.collapse').collapse('hide')

    $('.js-btn-filter').on('click', function() {
      $('.js-filter-block').addClass('is-open')
    })    

    $('.js-filter-block').on('click', function(event) {      
      
      let { target } = event
      
      if(!$(target).closest('.filter-form').length) {
        $(this).removeClass('is-open')
      }
        
    })
    
  }
  // end

  // category price filter
  const rangFilter = document.querySelector('.rang-filter')
  if ( rangFilter ) {
    const inputMin = document.querySelector('.input-min')
    const inputMax = document.querySelector('.input-max')


    const inputMaxValueCurrent = Number(inputMax.dataset.maxv)
    const inputMinValueCurrent = Number(inputMin.dataset.minv)== inputMaxValue ? 0 : Number(inputMin.defaultValue)

    const inputMaxValue = Number(inputMax.defaultValue)
    const inputMinValue = Number(inputMin.defaultValue);


    noUiSlider.create(rangFilter, {
        start: [inputMinValue, inputMaxValue],
        connect: true,
        range: {
            'min': inputMinValueCurrent,
            'max': inputMaxValueCurrent
        }
    })

    rangFilter.noUiSlider.on('update', function (values, handle) {

      let value = values[handle]
    
      handle ? inputMax.value = value : inputMin.value = value

    });

    rangFilter.noUiSlider.on('change', function (values, handle) {
      let minPrice = values[0];
      let maxPrice = values[1];
      setCookie('min_price', minPrice);
      setCookie('max_price', maxPrice);

      location.reload();
    });

    inputMin.addEventListener('change', function () {
      rangFilter.noUiSlider.set([null, this.value])
    })
    
    inputMax.addEventListener('change', function () {
      rangFilter.noUiSlider.set([null, this.value])
    })
  }
  // end
          
    
  // presonal data form
  const formPersonal = document.querySelector('.js-form-personal');

  if(formPersonal) {
    formPersonal.addEventListener('submit', function(event) {
      event.preventDefault()

        const submitForm = new Validate({
            form: this,
            messageResult: '.js-result-message',
            messageErrorForm: 'Заполните поля',
            messageErrorEmail: 'Некорректный email'
        });

        if(submitForm.isValid()){
            $.ajax({
                url: $(this).attr('action'),
                type: 'post',
                data : $(this).serialize(),
                dataType: 'json'
            })
                .done(function (html) {
                    //if send is Ok
                    if (html.status == 'change_mail') {
                        $('#accept_change_email_modal').modal('show');
                    } else if(html.status == 'success') {
                        $('.js-select').niceSelect('update');
                        $('.js-result-message')
                            .removeClass('text-danger')
                            .addClass('text-success')
                            .text('Данные успешно изменены!')
                    } else {
                        $('.js-result-message')
                            .removeClass('text-success')
                            .addClass('text-danger')
                            .text(html.warning)
                    }
                });
        }
        
    })
  }
  // end

  // presonal favorite    

    const priceToNumber = str => Number(str.replace(/\s/g, '')),
          priceToString = num => num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1 ')

    let favoriteItems = $('.js-product-favorite-delete'),
        totalPriceNode = $('.js-total-price'),
        totalPrice = priceToNumber(totalPriceNode.text())    

    if(favoriteItems.length) {

      favoriteItems.on('click', function() {

        let priceItem = priceToNumber($(this).parent().data('price'))

        totalPrice = totalPrice - priceItem
        totalPriceNode.text(priceToString(totalPrice))

        $(this).parent().parent().remove()
        
      })

    }
  

  // end


  // comment form validation (blog inner page)
  var commentForm = document.querySelector('.js_bi_comment_form');

  if ( commentForm ) {
    commentForm.addEventListener('submit', function(event) {
      event.preventDefault();

      const submitForm1 = new Validate({
          form: this,
          messageResult: '.js-result-message', 
          messageForm: 'Комментарий будет добавлен после модерации',
          messageErrorForm: 'Заполните поля',
          messageErrorEmail: 'Некорректный email'
      });

      if(submitForm1.isValid()){
          submitForm1.clearFields();
      }

    });
  }
  // end comment form validation (blog inner page)



  // corousel with team (contact page)
  if($('.js_persons_carousel').length) {

    $('.js_persons_carousel').slick({
      dots: false,
      infinite: true,
      speed: 1000,
      slidesToShow: 4,
      slidesToScroll: 4,
      arrows: true,
      responsive: [
        {
          breakpoint: 920,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3
          }
        },
        {
          breakpoint: 697,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 476,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
  }
  // end corousel with team (contact page)



// show/hide pass in input
  var inputPassButtons = document.querySelectorAll('.js_pass_input_btn');

  if (inputPassButtons) {
    inputPassButtons.forEach(function(inputPassButton) {
      inputPassButton.addEventListener('click', function(){
        var passInput = this.previousElementSibling;

        if (passInput.getAttribute('type') == 'password') {
          passInput.setAttribute('type', 'text');
        } else {
          passInput.setAttribute('type', 'password');
        }
      });
    });
  }
// end show/hide pass in input



// login popap form validation
  var loginForm = document.querySelector('.js_login_form');

  if ( loginForm ) {
    loginForm.addEventListener('submit', function(event) {
      event.preventDefault();

      const submitForm = new Validate({
          form: this,
          messageResult: '.js-result-message', 
          messageForm: '',
          messageErrorForm: 'Заполните поля',
          messageErrorEmail: 'Некорректный email'
      });

      if(submitForm.isValid()){
          $.ajax({
              url: $(loginForm).attr('action'),
              type: 'post',
              data : $(this).serialize(),
              dataType: 'json'
          })
              .done(function (html) {
                  //if send is Ok
                  if(html.status == 'success') {
                      submitForm.clearFields();
                      window.location.reload();
                  } else {
                      $('.js-result-message')
                          .addClass('text-danger')
                          .text(html.warning)
                  }
              });

      }

    });
  }
// end login popap form validation



// registration popap form validation
  var registrationForm = document.querySelector('.js_register_form');

  if ( registrationForm ) {
    registrationForm.addEventListener('submit', function(event) {
      event.preventDefault();
      const submitForm = new Validate({
          form: this,
          messageResult: '.js-result-message', 
          messageForm: '',
          messageErrorForm: 'Заполните поля',
          messageErrorEmail: 'Некорректный email'
      });

      if(submitForm.isValid()){
          const form = this;
          //send ajax
          $.ajax({
              url: $(this).attr('action'),
              type: 'post',
              data : $(this).serialize(),
              dataType: 'json'
          })
              .done(function (html) {
                  //if send is Ok
                  if(html.status == 'success') {
                      submitForm.clearFields();
                      $('#reg-login_modal').modal('hide');
                      $('#accept_registration_modal').modal('show');
                  } else {
                      $('.js-result-message')
                          .removeClass('text-success')
                          .addClass('text-danger')
                          .text(html.warning)
                  }
              });
      }

    });
  }
// end registration popap form validation



// pass recovery popap form validation
  var passRecoveryForm = document.querySelector('.js_pass_recovery_form');

  if ( passRecoveryForm ) {
    passRecoveryForm.addEventListener('submit', function(event) {
      event.preventDefault();

      const submitForm = new Validate({
          form: this,
          messageResult: '.js-result-message', 
          messageForm: '',
          messageErrorForm: 'Заполните поля',
          messageErrorEmail: 'Некорректный email'
      });

      if(submitForm.isValid()){
          $.ajax({
              url: $(this).attr('action'),
              type: 'post',
              data : $(this).serialize(),
              dataType: 'json'
          })
              .done(function (html) {
                  //if send is Ok
                  if(html.status == 'success') {
                      submitForm.clearFields();
                      $('#pass_recovery_modal').modal('hide');
                      $('#accept_recovery_pass_modal').modal('show');
                  } else {
                      $('.js-result-message')
                          .removeClass('text-success')
                          .addClass('text-danger')
                          .text(html.warning)
                  }
              });
      }

    });
  }
// end pass recovery popap form validation



// pass recovery page form validation
  var passRecoveryForm2 = document.querySelector('.js_pass_recovery_form2');

  if ( passRecoveryForm2 ) {
    passRecoveryForm2.addEventListener('submit', function(event) {
      event.preventDefault();

      const submitForm = new Validate({
          form: this,
          messageResult: '.js-result-message', 
          messageErrorPass: 'Введенные пароли не совпадают',
          messageErrorForm: 'Заполните поля',
          messageErrorEmail: 'Некорректный email'
      });

      if(submitForm.isValid()){
          passRecoveryForm2.submit();
          submitForm.clearFields();
      }

    });
  }
// end pass recovery page form validation

if (getCookie('success_email_confirmation') !== '') {
    $('#email_confirmation_modal').modal('show');
    delete_cookie('success_email_confirmation');
}

if (getCookie('success_email_account_confirmation') !== '') {
    $('#email_confirmation_account_email_modal').modal('show');
    delete_cookie('success_email_account_confirmation');
}

if (getCookie('success_reset_password') !== '') {
    $('#success_reset_password_modal').modal('show');
    delete_cookie('success_reset_password');
}


// reg discount popap form validation
  var regDiscountForm = document.querySelector('.js_discount_register_form');

  if ( regDiscountForm ) {
    regDiscountForm.addEventListener('submit', function(event) {
      event.preventDefault();

      const submitForm = new Validate({
          form: this,
          messageResult: '.js-result-message', 
          messageForm: '',
          messageErrorForm: 'Заполните поля',
          messageErrorEmail: 'Некорректный email'
      });

      if(submitForm.isValid()){
          submitForm.clearFields();
      }

    });
  }
// reg discount popap form validation

// checkout page change radio buttons of delivery way
var radiosChoiceDeliveryWay = document.querySelectorAll('.js_radio_delivery_way');

if (radiosChoiceDeliveryWay.length) {
  var deliveryText = document.querySelector('.js_delivery_address').querySelector('label');

  radiosChoiceDeliveryWay.forEach(function(radioItem) {
    radioItem.addEventListener('change', function() {
      if (this.value == 'address') {
        deliveryText.innerHTML = 'Адрес доставки';
      } else {
        deliveryText.innerHTML = 'Номер и адрес отделения Новой Почты';
      }
    });
  });
}
// end checkout page change radio buttons of delivery way



// checkout page form validation
  var checkoutForm = document.querySelector('.js_checkout_form');

  if ( checkoutForm ) {
    checkoutForm.addEventListener('submit', function(event) {
      event.preventDefault();

      const submitForm = new Validate({
          form: this,
          messageResult: '.js-result-message', 
          messageForm: '',
          messageErrorForm: 'Заполните поля',
          messageErrorEmail: 'Некорректный email'
      });

      if(submitForm.isValid()){
          submitForm.clearFields();
      }

    });
  }
// end checkout page form validation




// product timer

  const timer = document.querySelector(".js-product-timer");
  var countDownDate = null;

  if( timer && timer.dataset.date) {
    countDownDate = new Date(timer.dataset.date).getTime()
  }

  if(timer && countDownDate) {
    // Update the count down every 1 second
    const x = setInterval(() => {

      // Get todays date and time
      let now = new Date().getTime()

      // Find the distance between now and the count down date
      let distance = countDownDate - now

      // Time calculations for days, hours, minutes and seconds
      let days = Math.floor(distance / (1000 * 60 * 60 * 24))
      let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))
      let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))
      let seconds = Math.floor((distance % (1000 * 60)) / 1000)

      // Display the result in the element with id="demo"
      timer.innerHTML = `
        <div class="flex-block time-box">
          <div class="day-time">
            <div class="time">${days}</div>
            <div class="day">дни</div>
          </div>
          <span class="deliver">&#58;</span>
          <div class="day-time">
            <div class="time">${hours}</div>
            <div class="day">часы</div>
          </div>
          <span class="deliver">&#58;</span>
          <div class="day-time">
            <div class="time">${minutes}</div>
            <div class="day">мин</div>
          </div>
          <span class="deliver">&#58;</span>
          <div class="day-time">
            <div class="time">${seconds}</div>
            <div class="day">сек</div>
          </div>        
        </div>     
      `
      // If the count down is finished, write some text 
      if (distance < 0) {
        clearInterval(x);
        timer.innerHTML = "EXPIRED"
      }
    }, 1000);

  }

// end

    /////>>>>>Sort
    function setCookie(name, value, options) {
        options = options || {};

        var expires = options.expires;

        if (typeof expires == "number" && expires) {
            var d = new Date();
            d.setTime(d.getTime() + expires * 1000);
            expires = options.expires = d;
        }
        if (expires && expires.toUTCString) {
            options.expires = expires.toUTCString();
        }

        value = encodeURIComponent(value);

        var updatedCookie = name + "=" + value;

        for (var propName in options) {
            updatedCookie += "; " + propName;
            var propValue = options[propName];
            if (propValue !== true) {
                updatedCookie += "=" + propValue;
            }
        }

        document.cookie = updatedCookie;
    }

    $('#filter-sort-select').on('change',function() {
        setCookie('catalog_sort',$(this).val());
        location.reload();
    });
    /////<<<<<

    $('.btn-load-more').on('click',function() {
        var obj = $(this);

        var text = obj.html();
        var page = parseInt(obj.data('page')) + 1;
        var urlPagination = window.location.href.split('?')[0];

        $.ajax({
            url: urlPagination,
            method: 'GET',
            data: 'page='+page,
            cache:false,
            dataType: 'json'
        })
            .done(function(response) {
                $('.no-gutters').append(response.products);
            if(response.last) obj.remove();
            else {
                obj.data('page', page);
            }
        });
    });

// product carousel

    const productFor = $('.js-product-for'),
        productNav = $('.js-product-nav'),
        productsRelated = $('.js-product-related-carousel')

    var kuu;

    if(productFor.length) {

        productFor.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.js-product-nav',
            responsive: [
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        dots: true,
                        fade: false,
                    }
                }
            ]
        })
    }

    if(productNav.length) {
        productNav.slick({
            slidesToShow: 4,
            slidesToScroll: 4,
            asNavFor: '.js-product-for',
            dots: false,
            arrows: true,
            vertical: true,
            centerPadding: 0,
            focusOnSelect: true,
            centerMode: true
        })
    }

    if(productsRelated.length) {
        productsRelated.slick({
            infinite: false,
            speed: 1000,
            slidesToShow: 4,
            slidesToScroll: 4,
            centerPadding: '0px',
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }

            ]
        })
    }

// end


// form product comment

const formProductComment = document.querySelector('.js-form-product-comment'),
      stars = $('.js-result-raiting'),
      optionGroup = $('.js-review-option'),
      options = optionGroup.find('span'),
      values = optionGroup.find('input')     

  if(formProductComment) {

    options.on('click', function() {      

      $(this)
        .addClass('active')
        .prevUntil()
          .addClass('active')
      $(this)
        .nextUntil()
          .removeClass('active')


      let optionValue = $(this).closest('.js-review-option').find('input')


      optionValue.val($(this).data('index'))

      
      let valuesArray = [...values]

      let result = valuesArray.reduce((acc, current) => {
        return acc + +current.value;            
      }, 0)

      let raitning = parseInt(result/valuesArray.length)*20

      stars.css('width', `${raitning}%`)          
      
    })

    options.on('mouseover', function() {
      $(this)
        .addClass('hovered')
        .prevUntil()
          .addClass('hovered')
    })

    options.on('mouseleave', function() {
      $(this)
        .removeClass('hovered')
        .nextUntil()
          .removeClass('hovered')
    })

    options.parent().on('mouseleave', function() {
      $(this).find('span')
        .removeClass('hovered')  
    })


    formProductComment.addEventListener('submit', function(event) {

      event.preventDefault()

        const submitForm = new Validate({
            form: this,
            messageResult: '.js-result-message', 
            messageForm: 'Отзыв будет опубликован после модерации',
            messageErrorForm: 'Оставьте отзыв и оценку',   
        });
        

        if(submitForm.isValid()){

            var formFields = document.querySelectorAll('.js-form-product-comment input, .js-form-product-comment textarea');
            var fData = new FormData();

            formFields.forEach(function(elem) {
                fData.append(elem.name, elem.value);
            });

            //send ajax
            $.ajax({
                url: $(this).attr('action'),
                type: 'post',
                data : fData,
                processData: false,  // tell jQuery not to process the data
                contentType: false,  // tell jQuery not to set contentType
                dataType: 'json'
            })
            .done(function (html) {
                //if send is Ok
                if(html.status == 'success') {
                    submitForm.clearFields()
                    options.removeClass('active')
                    stars.css('width', '0%')
                }
            });

        }
        
    })
  }

  $('#review').load('index.php?route=product/product/review&product_id='+$('#review').data('product-id'));
  $('#load-all-reviews').on('click',function() {
      $('#review-next').load('index.php?route=product/product/review&product_id='+$('#review').data('product-id') + '&next=1');
      $(this).hide();
      return false;
  });

    const descrBody = $('.js-product-descr__body'),
        openButton = $('.js-descr-read-more')


  openButton.on('click', () => {
    descrBody.toggleClass('open')
    return false
  })

// end



// cart functional
class CartItem {
  constructor(obj) {
    this.itemID = obj.itemID;

    if (obj.oldPrice) {
      this.oldPrice = priceToNumber(obj.oldPrice.innerText);
    }

    if (obj.currentPrice) {
      this.currentPrice = priceToNumber(obj.currentPrice.innerText);
    }

    this.totalPrice = priceToNumber(obj.totalPrice.innerText);

    this.quantity      = Number(obj.quantity.innerText);

    if (obj.promoDiscount) {
      this.promoDiscount   = priceToNumber(obj.promoDiscount.innerText);
      this.promoPrice      = Math.round(this.currentPrice - (this.currentPrice * this.promoDiscount / 100));
      this.totalPromoPrice = this.promoPrice;
    }
  }
}

/*class Cart {
  constructor(obj) {
    this.items         = obj.items;
    //this.deliveryPrice = priceToNumber(document.querySelector(obj.deliveryPrice).innerText);
    this.total         = priceToNumber(document.querySelector(obj.total).innerText);
  }

  countTotal() {
    var total = 0;
    for (var key in this.items) {
      if ('promoDiscount' in this.items[key]) {
        total += this.items[key].totalPromoPrice;
      } else {
        total += this.items[key].totalPrice;
      }
    }
    this.total = total + this.deliveryPrice;
    var totalPriceBlocks = document.querySelectorAll('.js_cart_totlal_price span');
    for (var i = 0; i < totalPriceBlocks.length; i++) {
      totalPriceBlocks[i].innerText = priceToString(this.total);
    }
  }


  setPromoPrice(id) {
    if ('promoDiscount' in this.items[id]) {
      var items = document.querySelectorAll('.js_cart_item[data-id="' + id + '"]');
      for (var i = 0; i < items.length; i++) {
        var promoDiscountBock = items[i].querySelector('.js_promo_price span');
        if (promoDiscountBock)
          promoDiscountBock.innerText = priceToString(this.items[id].totalPromoPrice);
      }
    }
  }

  updateData(id) {
    var product = this.items[id];
    product.totalPrice = product.quantity * product.currentPrice;

    var items = document.querySelectorAll('.js_cart_item[data-id="' + id + '"]');
    for (var i = 0; i < items.length; i++) {
      items[i].querySelector('.js_cart_item_total_cost span').innerText = priceToString(product.totalPrice);
      items[i].querySelector('.js_cart_item_value').value = product.quantity;
    }

    if ('promoDiscount' in product) {
      product.totalPromoPrice = product.quantity * product.promoPrice;

      for (var i = 0; i < items.length; i++) {
        var promoPriceBlock = items[i].querySelector('.js_promo_price span');
        if (promoPriceBlock)
          promoPriceBlock.innerText = priceToString(product.totalPromoPrice);
      }
    }

    this.countTotal();
  }

  removeItem(id) {
    delete this.items[id];
  }
}

const cart = new Cart({
  items        : {},
  deliveryPrice: '.js_delivery_price span',
  total        : '.js_cart_totlal_price span'
});*/

/*
var carItemsDOM = document.querySelectorAll('.js_cart_item');
carItemsDOM.forEach(function(item) {
  var newItem = new CartItem({
        itemID          : item.getAttribute('data-id'),
        oldPrice        : item.querySelector('.js_cart_item_old_price span'),
        currentPrice    : item.querySelector('.js_cart_item_current_price span'),
        promoDiscount   : item.querySelector('.js_promo_discount span'),
        promoTotalPrice : item.querySelector('.js_promo_price span'),
        totalPrice      : item.querySelector('.js_cart_item_total_cost span'),
        quantity        : item.querySelector('.js_cart_item_value')
  });

  var itemId = item.getAttribute('data-id')
  cart.items[itemId] = newItem;
  cart.setPromoPrice(itemId);
});

cart.countTotal();

const getProduct      = target => $(target).closest('.js_cart_item');
const getProductIndex = target => $(target).closest('.js_cart_item').data('id');
*/


    // qty plus/minus
    //делегирвоние
    $('#cart_modal').on('click', '.js_cart_item_dec', function(e){
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });

    $('#cart_modal').on('click', '.js_cart_item_inc', function(e){
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });


    var inputsOfProductCount = document.querySelectorAll('.js_cart_item_value');

  if (inputsOfProductCount) {
    inputsOfProductCount.forEach(function (inputItem){
      inputItem.addEventListener('keydown', function(event) {
        var key = event.keyCode;

        if (key == 38)
          this.value = Number(this.value) + 1;

        if (key == 40 && Number(this.value) > 1)
          this.value = Number(this.value) - 1;

        if ((key < 48 || key > 57) && key != 8 && key != 9 && key != 116 && key != 27) {
          event.returnValue= false;
        }

      });

      inputItem.addEventListener('keyup', function() {
        var quantity = Number(this.value);
        if (quantity > 0) {
          let id = getProductIndex(this);
          cart.items[id]['quantity'] = quantity;
          cart.updateData(id);
        }
      });

      inputItem.addEventListener('blur', function() {
        var value = Number(this.value);
        if (value < 1){
          let id = getProductIndex(this);
          cart.items[id]['quantity'] = 1;
          cart.updateData(id);
        }
      });
    });
  }

  /*var removeCartItemButtons = document.querySelectorAll('.js_remove_item');*/

  /*if (removeCartItemButtons) {
    removeCartItemButtons.forEach(function(removeButton) {
      removeButton.addEventListener('click', function() {
        cart.remove($(this).attr('data-cart-id'))
      });
    });
  }*/
// end cart functional

    function getCookie(cname) {
        let name = cname + "="; //Create the cookie name variable with cookie name concatenate with = sign
        let cArr = window.document.cookie.split(';'); //Create cookie array by split the cookie by ';'

        //Loop through the cookies and return the cooki value if it find the cookie name
        for(let i=0; i<cArr.length; i++) {
            let c = cArr[i].trim();
            //If the name is the cookie string at position 0, we found the cookie and return the cookie value
            if (c.indexOf(name) == 0)
                return c.substring(name.length, c.length);
        }

        //If we get to this point, that means the cookie wasn't find in the look, we return an empty string.
        return "";
    }

    function delete_cookie( name ) {
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT; domain="+document.domain;
    }

    $('#cart_modal').on('click', '.js_remove_item', function(e){
        cart.remove($(this).attr('data-cart-id'))
    });
    // Cart add remove functions
    $('#cart_modal').on('change', 'input', function(e){
        var $input = $(this);
        var count = parseInt($input.val());
        var cartId = $input.attr('data-cart-id');
        var data = {};
        data[cartId] = count;
        var params = {};
        params['quantity'] = data;
        $.ajax({
            url: 'index.php?route=checkout/cart/edit',
            type: 'post',
            data:  $.param(params),
            dataType: 'json',
            success: function(json) {
                if (json['success']) {
                    $('.cart.modal-content').html(json['contentCart']);
                    $('.counter.counter__cart.colored_white').text(json['cartCount']);
                    $('.price').text(json['total']);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
        return false;
    });

    var cart = {
        'add': function(product_id, quantity) {
            $.ajax({
                url: 'index.php?route=checkout/cart/add',
                type: 'post',
                data: 'product_id=' + product_id + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
                dataType: 'json',
                complete: function(json) {
                    $('.cart-modal').arcticmodal();
                },
                success: function(json) {
                    $('.alert, .text-danger').remove();

                    if (json['redirect']) {
                        location = json['redirect'];
                    }
                    if (json['success']) {
                        $('.cart.modal-content').html(json['contentCart']);
                        $('.counter.counter__cart.colored_white').text(json['cartCount']);
                        $('.price').text(json['total']);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        },
        'update': function(key, quantity) {
            $.ajax({
                url: 'index.php?route=checkout/cart/edit',
                type: 'post',
                data: 'key=' + key + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
                dataType: 'json',
                beforeSend: function() {
                    $('#cart > button').button('loading');
                },
                complete: function() {
                    $('#cart > button').button('reset');
                },
                success: function(json) {

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        },
        'remove': function(key) {
            $.ajax({
                url: 'index.php?route=checkout/cart/remove',
                type: 'post',
                data: 'key=' + key,
                dataType: 'json',
                success: function(json) {
                    $('.cart.modal-content').html(json['contentCart']);
                    $('.counter.counter__cart.colored_white').text(json['cartCount']);
                    $('.price').text(json['total']);

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }
    }

})