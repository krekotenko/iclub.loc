<div class="product-element">
    <div class="product-box">
        <div class="product-colors">
            <div class="product-colors__title product__title">Выберите цвет:</div>
            <div class="product-colors-list">
                <ul>
                    <?php foreach ($colors as $color) : ?>
                    <li>
                        <a
                                href="<?php echo $color['href']; ?>"
                                class="product-colors__item <?php echo $color['active'] ? 'active' : ''; ?>"
                                style="background-color: <?php echo $color['color']; ?>"
                        ></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>