<div class="products__other">
    <ul>
        <?php foreach ($colors as $key => $color) : ?>
        <li>
            <a href="<?php echo $color['href']; ?>" class="<?php echo $color['active'] ? 'active' : ''; ?>" style="background-color: <?php echo $color['color']; ?>"></a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>