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
          <input type="text" data-minv="<?php echo $minPrice;?>" value="<?php echo $minPriceCurrent;?>" name="price-min" class="input-min form-control">
          <span>-</span>
          <input type="text" data-maxv="<?php echo $maxPrice;?>" value="<?php echo $maxPriceCurrent;?>" name="price-max" class="input-max form-control">
        </div>
        <div class="rang-filter"></div>
      </div>
    </div>
  </div>
  <?php foreach ($filter_groups as $i => $filter_group) : ?>
  <div class="filter-tab">
    <div class="filter__item">
      <a class="<?php echo $i >= 2 ? 'collapsed' : ''; ?> filter__title" data-toggle="collapse" href="#collapse-<?php echo $i; ?>">
        <span><?php echo $filter_group['name']; ?></span>
        <i class="arrow"></i>
      </a>
      <div id="collapse-<?php echo $i; ?>" class="collapse <?php echo $i <= 1 ? 'show' : ''; ?>">
        <ul class="filter__list">
          <?php foreach ($filter_group['filter'] as $k=> $filter) : ?>
          <li>

            <?php if (in_array($filter['filter_id'], $filter_category)) { ?>
            <input type="checkbox" name="filter[]" id="filter-<?php echo $i . '-' . $k; ?>" value="<?php echo $filter['keyword']; ?>" checked="checked" />
            <?php } else { ?>
            <input type="checkbox" name="filter[]" id="filter-<?php echo $i . '-' . $k; ?>" value="<?php echo $filter['keyword']; ?>" />
            <?php } ?>

            <label for="filter-<?php echo $i . '-' . $k; ?>">
              <span><?php echo $filter['name']; ?></span>
            </label>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</form>
<script type="text/javascript"><!--
  document.addEventListener('DOMContentLoaded', function() {
      $('input[name="filter[]"]').on('change', function() {
          filter = [];
          $('input[name^=\'filter\']:checked').each(function(element) {
              filter.push(this.value);
          });
          location = '<?php echo $action; ?>/' + filter.join('/');

          if(filter.length == 0) {
              location = '<?php echo $action; ?>';
          }
      });
  });

//--></script>
