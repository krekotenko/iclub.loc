<?php
    require('parts/header.php');

    // local database

    $filters = [
        [
            'name' => 'Технологии зарядки',
            'items' => [
                [
                    'name' => 'поддержка  Quick Charge',
                    'quantity' => '20',
                    'checked' => true
                ],
                [
                    'name' => 'поддержка  беспроводной зарядки',
                    'quantity' => '18',
                    'checked' => false              
                ]
            ]
        ],
        [
            'name' => 'Дисплей (макс. разрешение)',
            'items' => [
                [
                    'name' => '1366x640',
                    'quantity' => '10',
                    'checked' => true           
                ],
                [
                    'name' => '1334x750',
                    'quantity' => '25',
                    'checked' => false          
                ],
                [
                    'name' => '1920x1080 (FHD)',
                    'quantity' => '7',
                    'checked' => false               
                ],
                [
                    'name' => '2436x1125',
                    'quantity' => '12',
                    'checked' => false               
                ],
                [
                    'name' => '2560x1440 (QHD)',
                    'quantity' => '25',
                    'checked' => false               
                ],
                [
                    'name' => '2688х1242',
                    'quantity' => '7',
                    'checked' => false               
                ],
                [
                    'name' => '1792х828',
                    'quantity' => '12',
                    'checked' => false               
                ],
            ]
        ],
        [
            'name' => 'Встроенная память, ГБ',
            'items' => [
                [
                    'name' => 'поддержка  Quick Charge',
                    'quantity' => '20',
                    'checked' => false               
                ],
                [
                    'name' => 'поддержка  беспроводной зарядки',
                    'quantity' => '18',
                    'checked' => false               
                ]
            ]
        ],
        [
            'name' => 'Модель',
            'items' => [
                [
                    'name' => 'поддержка  Quick Charge',
                    'quantity' => '20',
                    'checked' => false               
                ],
                [
                    'name' => 'поддержка  беспроводной зарядки',
                    'quantity' => '18',
                    'checked' => false               
                ]
            ]
        ],
        [
            'name' => 'Класс',
            'items' => [
                [
                    'name' => 'поддержка  Quick Charge',
                    'quantity' => '20',
                    'checked' => false               
                ],
                [
                    'name' => 'поддержка  беспроводной зарядки',
                    'quantity' => '18',
                    'checked' => false               
                ]
            ]
        ],
        [
            'name' => 'Спутниковая система',
            'items' => [
                [
                    'name' => 'поддержка  Quick Charge',
                    'quantity' => '20',
                    'checked' => false               
                ],
                [
                    'name' => 'поддержка  беспроводной зарядки',
                    'quantity' => '18',
                    'checked' => false               
                ]
            ]
        ],
        [
            'name' => 'Беспроводные технологии',
            'items' => [
                [
                    'name' => 'поддержка  Quick Charge',
                    'quantity' => '20',
                    'checked' => false               
                ],
                [
                    'name' => 'поддержка  беспроводной зарядки',
                    'quantity' => '18',
                    'checked' => false               
                ]
            ]
        ],
        [
            'name' => 'Безопасность',
            'items' => [
                [
                    'name' => 'поддержка  Quick Charge',
                    'quantity' => '20',
                    'checked' => false              
                ],
                [
                    'name' => 'поддержка  беспроводной зарядки',
                    'quantity' => '18',
                    'checked' => false               
                ]
            ]
        ],
        [
            'name' => 'Фронтальная камера',
            'items' => [
                [
                    'name' => 'поддержка  Quick Charge',
                    'quantity' => '20',
                    'checked' => false               
                ],
                [
                    'name' => 'поддержка  беспроводной зарядки',
                    'quantity' => '18',
                    'checked' => false               
                ]
            ]
        ],
        [
            'name' => 'Основная камера',
            'items' => [
                [
                    'name' => 'поддержка  Quick Charge',
                    'quantity' => '20',
                    'checked' => false               
                ],
                [
                    'name' => 'поддержка  беспроводной зарядки',
                    'quantity' => '18',
                    'checked' => false               
                ]
            ]
        ],
        [
            'name' => 'Год выпуска',
            'items' => [
                [
                    'name' => 'поддержка  Quick Charge',
                    'quantity' => '20',
                    'checked' => false               
                ],
                [
                    'name' => 'поддержка  беспроводной зарядки',
                    'quantity' => '18',
                    'checked' => false               
                ]
            ]
        ],
        [
            'name' => 'Толщина корпуса',
            'items' => [
                [
                    'name' => 'поддержка  Quick Charge',
                    'quantity' => '20',
                    'checked' => false               
                ],
                [
                    'name' => 'поддержка  беспроводной зарядки',
                    'quantity' => '18',
                    'checked' => false               
                ]
            ]
        ],
        [
            'name' => 'Материал корпуса',
            'items' => [
                [
                    'name' => 'поддержка  Quick Charge',
                    'quantity' => '20',
                    'checked' => false               
                ],
                [
                    'name' => 'поддержка  беспроводной зарядки',
                    'quantity' => '18',
                    'checked' => false               
                ]
            ]
        ],
        [
            'name' => 'Дисплей (тип матрицы)',
            'items' => [
                [
                    'name' => 'поддержка  Quick Charge',
                    'quantity' => '20',
                    'checked' => false               
                ],
                [
                    'name' => 'поддержка  беспроводной зарядки',
                    'quantity' => '18',
                    'checked' => false               
                ]
            ]
        ],
        [
            'name' => 'Цвет',
            'items' => [
                [
                    'name' => 'поддержка  Quick Charge',
                    'quantity' => '20',
                    'checked' => false
                ],
                [
                    'name' => 'поддержка  беспроводной зарядки',
                    'quantity' => '18',
                    'checked' => false              
                ]
            ]
        ],
    ]

?>

<section class="page-section category-section">
    <div class="wrapper">

        <div class="breadcrumb-block">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Главная</a></li>
                    <li class="breadcrumb-item"><a href="#">Apple</a></li>
                    <li class="breadcrumb-item active" aria-current="page">iPhone</li>
                </ol>
            </nav>
        </div>

        <h1 class="h1">iPhone - cмартфоны Apple</h1>

        <div class="category">

            <div class="row">
                <div class="col col-md-3 col-lg-3">
                    <aside class="accordion filter-block js-filter-block">
                        <span class="close-filter">&times;</span>                  
                        <form action="" class="filter-form">
                            <div class="filter-tab">
                                <div class="filter__item">
                                    <a class="filter__title" data-toggle="collapse" href="#collapse-f">
                                        <span>Цена (грн)</span>
                                        <i class="arrow"></i>
                                    </a>                                
                                    <div id="collapse-f" class="collapse show">
                                        <div class="flex-block content-between items-center filter__price-values">                                         
                                            <input type="text" value="200" name="price-min" class="input-min form-control">                                        
                                            <span>-</span>                                                
                                            <input type="text" value="2000" name="price-max" class="input-max form-control">
                                        </div>                                   
                                        <div class="rang-filter"></div>                                        
                                    </div>
                                </div>
                            </div>
                            <?php foreach ($filters as $i => $filter) : ?>                        
                            <div class="filter-tab">                        
                                <div class="filter__item">                             
                                    <a class="<?php echo $i >= 2 ? 'collapsed' : ''; ?> filter__title" data-toggle="collapse" href="#collapse-<?php echo $i; ?>">
                                        <span><?php echo $filter['name']; ?></span>
                                        <i class="arrow"></i>
                                    </a>                                                        
                                    <div id="collapse-<?php echo $i; ?>" class="collapse <?php echo $i <= 1 ? 'show' : ''; ?>">
                                        <ul class="filter__list"> 
                                            <?php foreach ($filter['items'] as $k => $item) : ?>                                           
                                            <li>
                                                <input type="checkbox" id="filter-<?php echo $i . '-' . $k; ?>" <?php echo $item['checked'] ? 'checked' : ''; ?>>
                                                <label for="filter-<?php echo $i . '-' . $k; ?>">
                                                    <span><?php echo $item['name']; ?></span>
                                                    <span class="filter__quantity">(<?php echo $item['quantity']; ?>)</span>
                                                </label>                                                
                                            </li>
                                            <?php endforeach; ?>                             
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?> 
                        </form>
                    </aside>                
                </div>
                <div class="col-lg-9">
                    <div class="row align-items-center justify-content-between">
                        <div class="col col-sm-auto">
                            <a href="#" class="btn btn-filter js-btn-filter inline-groups__middle">
                                <span class="btn-filter__icon">
                                    <svg viewBox="0 0 20 22" width="29px" height="22px" class="colored_white">
                                        <use xlink:href="#filter"></use>
                                    </svg>
                                </span>
                                <span class="btn-filter__text">Фильтр</span>
                            </a>                            
                        </div>
                        <div class="col col-sm-auto">
                            <div class="price-filter text-right">
                                <div class="inline-groups__middle">
                                    <span class="price-filter__text">Сортировка:</span>                      
                                    <form>
                                        <select class="price-filter__select js-select">                                         
                                            <option value="1">от дешевых к дорогим</option>
                                            <option value="2">от дорогиx к дешевым</option>
                                        </select>
                                    </form>                    
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="products-category">
                        <div class="row no-gutters justify-content-center">
                            <?php
                                require('parts/product-category.php');
                            ?>
                        </div>
                    </div>

                    <div class="text-center">                
                        <div class="btn btn-load-more inline-groups__middle">
                            <span class="load-more__icon">
                                <svg viewBox="0 0 22 24" width="22px" height="24px" class="colored_main ">
                                    <use xlink:href="#refresh"></use>
                                </svg>
                            </span>
                            <span class="load-more__text">Показать еще</span>
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