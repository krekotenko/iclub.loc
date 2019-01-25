<?php
class ControllerCommonCart extends Controller {
	public function index() {
        $this->load->language('checkout/cart');
        $this->load->model('tool/image');
        $this->load->model('catalog/product');
        //get products
        $products = $this->cart->getProducts();

        $data['products'] = [];
        $totalAllPrice = 0;
        foreach ($products as $product) {
            $product_total = 0;

            foreach ($products as $product_2) {

                if ($product_2['product_id'] == $product['product_id']) {
                    $product_total += $product_2['quantity'];
                }
            }

            /*if ($product['minimum'] > $product_total) {
                $data['error_warning'] = sprintf($this->language->get('error_minimum'), $product['name'], $product['minimum']);
            }*/

            if ($product['image']) {
                $image = $this->model_tool_image->resize($product['image'],
                    $this->config->get($this->config->get('config_theme').'_image_cart_width'),
                    $this->config->get($this->config->get('config_theme').'_image_cart_height'));
            } else {
                $image = '';
            }

            $option_data = array();

            /*foreach ($product['option'] as $option) {
                if ($option['type'] != 'file') {
                    $value = $option['value'];
                } else {
                    $upload_info = $this->model_tool_upload->getUploadByCode($option['value']);

                    if ($upload_info) {
                        $value = $upload_info['name'];
                    } else {
                        $value = '';
                    }
                }

                $option_data[] = array(
                    'name'  => $option['name'],
                    'value' => (utf8_strlen($value) > 20 ? utf8_substr($value, 0, 20) . '..' : $value)
                );
            }*/

            // Display prices
            if ($this->customer->isLogged() || ! $this->config->get('config_customer_price')) {
                $price = $this->currency->format($this->tax->calculate(($product['price'] * $this->config->get('config_usd')),
                    $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);

            } else {
                $price = false;
            }
            if ($product['price_discount'] && ($this->customer->isLogged() || ! $this->config->get('config_customer_price'))) {
                $price_discount = $this->currency->format($this->tax->calculate((($product['price'] - (($product['price_discount'] * $product['price']) / 100)) * $this->config->get('config_usd')),
                    $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
            } else {
                $price_discount = false;
            }

            $specialPrice = 0;
            if ((float)$product['special']) {
                $specialDiscount = $product['special'];

                $specialPrice = $this->currency->format($this->tax->calculate((($product['price'] - (($specialDiscount * $product['price']) / 100)) * $this->config->get('config_usd')),
                    $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);

            } else {
                $specialPrice = $price_discount;
            }


            $recurring = '';

            /*if ($product['recurring']) {
                $frequencies = array(
                    'day'        => $this->language->get('text_day'),
                    'week'       => $this->language->get('text_week'),
                    'semi_month' => $this->language->get('text_semi_month'),
                    'month'      => $this->language->get('text_month'),
                    'year'       => $this->language->get('text_year'),
                );

                if ($product['recurring']['trial']) {
                    $recurring = sprintf($this->language->get('text_trial_description'), $this->currency->format($this->tax->calculate($product['recurring']['trial_price'] * $product['quantity'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']), $product['recurring']['trial_cycle'], $frequencies[$product['recurring']['trial_frequency']], $product['recurring']['trial_duration']) . ' ';
                }

                if ($product['recurring']['duration']) {
                    $recurring .= sprintf($this->language->get('text_payment_description'), $this->currency->format($this->tax->calculate($product['recurring']['price'] * $product['quantity'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']), $product['recurring']['cycle'], $frequencies[$product['recurring']['frequency']], $product['recurring']['duration']);
                } else {
                    $recurring .= sprintf($this->language->get('text_payment_cancel'), $this->currency->format($this->tax->calculate($product['recurring']['price'] * $product['quantity'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']), $product['recurring']['cycle'], $frequencies[$product['recurring']['frequency']], $product['recurring']['duration']);
                }
            }

            $this->load->model('catalog/category');
            $categories = $this->model_catalog_product->getCategories($product['product_id']);

            $keyCategories = array_search(1, array_column($categories, 'main_category'));

            if ($categories) {
                $categories_info = $this->model_catalog_category->getCategory($categories[$keyCategories]['category_id']);
                $mainCategory = $categories_info['name'];
            } else {
                $mainCategory = '';
            }*/

            $data['products'][] = array(
                'cart_id' => $product['cart_id'],
                'thumb' => $image,
                'name' => $product['name'],
                'model' => $product['model'],
                'option' => $option_data,
                'recurring' => $recurring,
                'quantity' => $product['quantity'],
                'stock' => $product['stock'] ? true : ! ( ! $this->config->get('config_stock_checkout') || $this->config->get('config_stock_warning')),
                'reward' => ($product['reward'] ? sprintf($this->language->get('text_points'),$product['reward']) : ''),
                'price' => $price,
                'totalPrice' => $this->currency->format($specialPrice ? intval(str_replace(' ', '', $specialPrice)*$product['quantity']) : intval(str_replace(' ', '', $price)*$product['quantity']), $this->session->data['currency']),
                'special' => $specialPrice,
                'image' => $image,
            );
        }

        // Totals
        $this->load->model('extension/extension');

        $totals = array();
        $taxes = $this->cart->getTaxes();
        $total = 0;

        // Because __call can not keep var references so we put them into an array.

        $total_data = array(
            'totals' => &$totals,
            'taxes' => &$taxes,
            'total' => &$total,
        );

        // Display prices
        if ($this->customer->isLogged() || ! $this->config->get('config_customer_price')) {
            $sort_order = array();

            $results = $this->model_extension_extension->getExtensions('total');
            foreach ($results as $key => $value) {
                $sort_order[$key] = $this->config->get($value['code'].'_sort_order');
            }

            array_multisort($sort_order, SORT_ASC, $results);

            foreach ($results as $result) {
                if ($this->config->get($result['code'].'_status')) {
                    $this->load->model('extension/total/'.$result['code']);
                    // We have to put the totals in an array so that they pass by reference.
                    $this->{'model_extension_total_'.$result['code']}->getTotal($total_data);
                }
            }

            $sort_order = array();

            foreach ($totals as $key => $value) {
                $sort_order[$key] = $value['sort_order'];
            }

            array_multisort($sort_order, SORT_ASC, $totals);
        }

        $total = $this->cart->getTotal();

        $data['checkout'] = $this->url->link('checkout/checkout', '', true);
        $data['total'] = $this->currency->format($total['total'], $this->session->data['currency']);
        if ($total['totalWithoutDiscount']) {
            $data['discountPercent'] = ceil((1-$total['total']/$total['totalWithoutDiscount'])*100);
        } else {
            $data['discountPercent'] = 0;
        }

        return $this->load->view('common/cart', $data);
	}

	public function info() {
		$this->response->setOutput($this->index());
	}
}
