<?php
/**
 * Created by PhpStorm.
 * User: Meits
 * Date: 11-Jan-19
 * Time: 13:23
 */
class ModelExtensionModuleColorsmodule extends Model {
    public function getProductColorsModule($product_id) {
        $arr['products'] = [];
        $arr['product_color'] = '';
        $arr['product_order'] = '';

        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_colors_related WHERE product_id = '" . (int)$product_id . "'");

        foreach ($query->rows as $result) {
            $arr['products'][] = $result['related_id'];
        }

        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_colors WHERE product_id = '" . (int)$product_id . "'");

        $result = $query->row;
        if($result) {
            $arr['product_color'] = $result['color'];
            $arr['product_order'] = $result['order_color'];
        }

        return $arr;
    }
}