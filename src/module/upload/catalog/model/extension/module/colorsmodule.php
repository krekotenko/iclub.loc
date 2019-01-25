<?php
/**
 * Created by PhpStorm.
 * User: Meits
 * Date: 11-Jan-19
 * Time: 13:23
 */
class ModelExtensionModuleColorsmodule extends Model {


    public function getProductColors($product_id, $limit = 0) {
        $arr = [];
        $query = $this->db->query("SELECT pc.product_id,pcr.related_id, pc.color, pc.order_color FROM " . DB_PREFIX . "product_colors_related pcr LEFT JOIN ". DB_PREFIX ."product_colors pc ON pcr.related_id = pc.product_id WHERE pcr.product_id = '" . (int)$product_id . "' UNION SELECT pc.product_id, NULL , pc.color, pc.order_color FROM " . DB_PREFIX . "product_colors pc WHERE pc.product_id = '" . (int)$product_id . "'  ORDER BY order_color ASC".($limit ? " LIMIT ".$limit : ""));

        foreach ($query->rows as $item) {
            $tmp['color'] = $item['color'];
            $tmp['active'] = 0;

            $tmp['href'] = $this->url->link('product/product', 'product_id=' . $item['product_id']);
            if($item['related_id']) {
                $tmp['href'] = $this->url->link('product/product', 'product_id=' . $item['related_id']);
            }
            if($item['product_id'] == $product_id) {
                $tmp['active'] = 1;
            }
            array_push($arr, $tmp);
        }

        return $arr;
    }
}