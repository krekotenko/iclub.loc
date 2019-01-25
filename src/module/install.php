<?php
$this->load->model('user/user_group');
$this->model_user_user_group->addPermission($this->user->getGroupId(), 'access', 'extension/extension/module/colorsmodule');
$this->db->query(
    "CREATE TABLE IF NOT EXISTS ". DB_PREFIX . "product_colors_related (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `product_id` int(11) NOT NULL,
                    `related_id` int(11) NOT NULL,
                    PRIMARY KEY (`id`)
                ) ENGINE=InnoDB"
);
$this->db->query(
    "CREATE TABLE IF NOT EXISTS ". DB_PREFIX . "product_colors (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `product_id` int(11) NOT NULL,
                    `color` varchar(255) NOT NULL,
                    `order_color` int(11) NOT NULL,
                    PRIMARY KEY (`id`)
                ) ENGINE=InnoDB"
);