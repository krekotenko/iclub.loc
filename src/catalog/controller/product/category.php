<?php
class ControllerProductCategory extends Controller {
	public function index() {
		$this->load->language('product/category');

		$this->load->model('catalog/category');

		$this->load->model('catalog/product');

		$this->load->model('tool/image');

		if (isset($this->request->get['filter'])) {
			$filter = $this->request->get['filter'];
		} else {
			$filter = '';
		}

        if (isset($this->request->get['sort'])) {
            $sort = $this->request->get['sort'];
        } else {
            if(isset($_COOKIE['catalog_sort']) && ($_COOKIE['catalog_sort'] == '2' || $_COOKIE['catalog_sort'] == '3')) {
                $sort = 'price';
            }
            else {
                $sort = 'sort_order';
            }
        }

        $minPriceCurrent = 0;
        if(isset($_COOKIE['min_price'])) {
            $minPriceCurrent = $_COOKIE['min_price'];
        }
        $maxPriceCurrent = 0;
        if(isset($_COOKIE['max_price'])) {
            $maxPriceCurrent = $_COOKIE['max_price'];
        }


        if (isset($this->request->get['order'])) {
            $order = $this->request->get['order'];
        } else {
            if(isset($_COOKIE['catalog_sort']) && $_COOKIE['catalog_sort'] == '3') {
                $order = 'DESC';
            }
            else {
                $order = 'ASC';
            }
        }

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		if (isset($this->request->get['limit'])) {
			$limit = (int)$this->request->get['limit'];
		} else {
			$limit = $this->config->get($this->config->get('config_theme') . '_product_limit');
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => "Главная",
			'href' => $this->url->link('common/home')
		);

		if (isset($this->request->get['path'])) {
			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$path = '';

			$parts = explode('_', (string)$this->request->get['path']);

			$category_id = (int)array_pop($parts);

			foreach ($parts as $key => $path_id) {
				if (!$path) {
					$path = (int)$path_id;
				} else {
					$path .= '_' . (int)$path_id;
				}

				$category_info = $this->model_catalog_category->getCategory($path_id);

				if ($category_info) {
					$data['breadcrumbs'][] = array(
						'text' => $category_info['name'],
						'href' => $this->url->link('product/category', 'path=' . $path . $url)
					);
				}
			}
		} else {
			$category_id = 0;
		}

		$category_info = $this->model_catalog_category->getCategory($category_id);

		if ($category_info) {

			if ($category_info['meta_title']) {
				$this->document->setTitle($category_info['meta_title']);
			} else {
				$this->document->setTitle($category_info['name']);
			}

			$this->document->setDescription($category_info['meta_description']);
			$this->document->setKeywords($category_info['meta_keyword']);

			if ($category_info['meta_h1']) {
				$data['heading_title'] = $category_info['meta_h1'];
			} else {
				$data['heading_title'] = $category_info['name'];
			}

			$data['text_refine'] = $this->language->get('text_refine');
			$data['text_empty'] = $this->language->get('text_empty');
			$data['text_quantity'] = $this->language->get('text_quantity');
			$data['text_manufacturer'] = $this->language->get('text_manufacturer');
			$data['text_model'] = $this->language->get('text_model');
			$data['text_price'] = $this->language->get('text_price');
			$data['text_tax'] = $this->language->get('text_tax');
			$data['text_points'] = $this->language->get('text_points');
			$data['text_compare'] = sprintf($this->language->get('text_compare'), (isset($this->session->data['compare']) ? count($this->session->data['compare']) : 0));
			$data['text_sort'] = $this->language->get('text_sort');
			$data['text_limit'] = $this->language->get('text_limit');

			$data['button_cart'] = $this->language->get('button_cart');
			$data['button_wishlist'] = $this->language->get('button_wishlist');
			$data['button_compare'] = $this->language->get('button_compare');
			$data['button_continue'] = $this->language->get('button_continue');
			$data['button_list'] = $this->language->get('button_list');
			$data['button_grid'] = $this->language->get('button_grid');

			// Set the last category breadcrumb
			/*$data['breadcrumbs'][] = array(
				'text' => $category_info['name'],
				'href' => $this->url->link('product/category', 'path=' . $this->request->get['path'])
			);*/

			if ($category_info['image']) {
				$data['thumb'] = $this->model_tool_image->resize($category_info['image'], 140, 167);
				$this->document->setOgImage($data['thumb']);
			} else {
				$data['thumb'] = '';
			}

			$data['description'] = html_entity_decode($category_info['description'], ENT_QUOTES, 'UTF-8');
			$data['compare'] = $this->url->link('product/compare');

			$url = '';

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$data['categories'] = array();

			//$results = $this->model_catalog_category->getCategories($category_id);

			/*foreach ($results as $result) {
				$filter_data = array(
					'filter_category_id'  => $result['category_id'],
					'filter_sub_category' => true
				);

				$data['categories'][] = array(
					'name' => $result['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : ''),
					'href' => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '_' . $result['category_id'] . $url)
				);
			}*/

			$data['products'] = array();

			$filter_data = array(
				'filter_category_id' => $category_id,
				'filter_filter'      => $filter,
				'sort'               => $sort,
				'order'              => $order,
				'start'              => ($page - 1) * $limit,
				'limit'              => $limit,
				'min_price'              => $minPriceCurrent/$this->config->get('config_usd'),
				'max_price'              => $maxPriceCurrent/$this->config->get('config_usd'),
			);

			$product_total = $this->model_catalog_product->getTotalProducts($filter_data);

			$prices = $this->model_catalog_product->getPrices($filter_data);
            $maxPrice = 0;
            $minPrice = 0;
            $k = 0;
            if($prices) {
                foreach ($prices as $price) {
                    $priceTmp = round($price['pr'],0)*$this->config->get('config_usd');
                    if( $priceTmp > $maxPrice) {
                        $maxPrice = $priceTmp;
                    }
                    if($k == 0 ) {
                        $minPrice = $priceTmp;
                        $k++;
                    }
                    if($priceTmp < $minPrice) {
                        $minPrice = $priceTmp;
                    }
                }
            }

            if(!$minPriceCurrent) {
                $minPriceCurrent = $minPrice;
            }
            if (!$maxPriceCurrent) {
                $maxPriceCurrent = $maxPrice;
            }

            $data['minPriceCurrent'] = $minPriceCurrent;
            $data['maxPriceCurrent'] = $maxPriceCurrent;

			$results = $this->model_catalog_product->getProducts($filter_data);
            $this->load->model('catalog/review');

			foreach ($results as $result) {
				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], 140, 167);
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', $this->config->get($this->config->get('config_theme') . '_image_product_width'), $this->config->get($this->config->get('config_theme') . '_image_product_height'));
				}

                if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
                    $price = $this->currency->format($this->tax->calculate(($result['price'] * $this->config->get('config_usd')), $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);

                } else {
                    $price = false;
                }
                if ($result['price_discount'] && ($this->customer->isLogged() || !$this->config->get('config_customer_price'))) {
                    $price_discount = $this->currency->format($this->tax->calculate((($result['price'] - (($result['price_discount']*$result['price']) / 100)) * $this->config->get('config_usd')), $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                } else {
                    $price_discount = false;
                }

                $specialPrice = 0;
                $textSpecial = "";
                $date_endSpecial = "";
                if ((float)$result['special']) {
                    list($specialDiscount, $textSpecial, $date_endSpecial) = explode('|',$result['special']);

                    $specialPrice = $this->currency->format($this->tax->calculate((($result['price'] - (($specialDiscount*$result['price']) / 100)) * $this->config->get('config_usd')), $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);

                } else {
                    $specialPrice = $price_discount;
                }

				if ($this->config->get('config_tax')) {
					$tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price'], $this->session->data['currency']);
				} else {
					$tax = false;
				}

				if ($this->config->get('config_review_status')) {
					$rating = (int)$result['rating'];
				} else {
					$rating = false;
				}

                $totalReviews = $this->model_catalog_review->getTotalReviewsByProductId($result['product_id']);

                $productCategories = null;
                $resultReviews = null;
                $srReviews = 0;

                if($totalReviews) {
                    $productCategories = $this->model_catalog_product->getCategories($result['product_id']);
                    if($productCategories) {
                        $productCategory = array_filter($productCategories,function ($item) {
                            if($item['main_category']) {
                                return $item;
                            }
                        });
                    }
                    if(isset($productCategory[0])) {
                        $resultReviews = $this->model_catalog_category->getCategoryReviews($productCategory[0]['category_id']);
                    }
                    if($resultReviews) {
                        $tmpValue = 0;
                        $i = 0;
                        foreach ($resultReviews as $review)
                        {
                            $reviewContent = $this->model_catalog_category->getCategoryReviewContent($review['id'], $result['product_id']);
                            $valueSumm = 0;
                            foreach($reviewContent as $item) {
                                $valueSumm += (int)$item['value'];
                            }

                            $value = round(count($reviewContent) > 0 ? $valueSumm/count($reviewContent) : 1, 1);
                            if($value > 0) {
                                $i++;
                            }
                            $tmpValue += $value;
                        }
                    }
                    $srReviews = round(($tmpValue / $i),1);
                }

				$data['products'][] = array(
					'product_id'  => $result['product_id'],
					'thumb'       => $image,
					'name'        => $result['name'],
					'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get($this->config->get('config_theme') . '_product_description_length')) . '..',
                    'price'       => $price,
                    'special'     => $specialPrice,
					'tax'         => $tax,
					'minimum'     => ($result['minimum'] > 0) ? $result['minimum'] : 1,
					'rating'      => $rating,
                    'srReviews'      => $srReviews,
                    'attribute_groups' => $this->model_catalog_product->getProductAttributes($result['product_id'],6),
                    'totalReviews'      => $totalReviews,
					'href'        => $this->url->link('product/product',  'product_id=' . $result['product_id'] . $url)
				);
			}

			$url = '';

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$data['sorts'] = array();

			$data['sorts'][] = array(
				'text'  => 'Новинки',
				'value' => '1',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.sort_order&order=ASC' . $url)
			);


			$data['sorts'][] = array(
				'text'  => $this->language->get('text_price_asc'),
				'value' => '2',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.price&order=ASC' . $url)
			);

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_price_desc'),
				'value' => '3',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.price&order=DESC' . $url)
			);

			$url = '';

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			$data['limits'] = array();

			$limits = array_unique(array($this->config->get($this->config->get('config_theme') . '_product_limit'), 25, 50, 75, 100));

			sort($limits);

			foreach($limits as $value) {
				$data['limits'][] = array(
					'text'  => $value,
					'value' => $value,
					'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . $url . '&limit=' . $value)
				);
			}

			$url = '';

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$pagination = new Pagination();
			$pagination->total = $product_total;
			$pagination->page = $page;
			$pagination->limit = $limit;
			$pagination->url = $this->url->link('product/category', 'path=' . $this->request->get['path'] . $url . '&page={page}');

			$data['pagination'] = $pagination;

			$data['results'] = sprintf($this->language->get('text_pagination'), ($product_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($product_total - $limit)) ? $product_total : ((($page - 1) * $limit) + $limit), $product_total, ceil($product_total / $limit));

			// http://googlewebmastercentral.blogspot.com/2011/09/pagination-with-relnext-and-relprev.html
			if ($page == 1) {
			    $this->document->addLink($this->url->link('product/category', 'path=' . $category_info['category_id'], true), 'canonical');
			} elseif ($page == 2) {
			    $this->document->addLink($this->url->link('product/category', 'path=' . $category_info['category_id'], true), 'prev');
			} else {
			    $this->document->addLink($this->url->link('product/category', 'path=' . $category_info['category_id'] . '&page='. ($page - 1), true), 'prev');
			}

			if ($limit && ceil($product_total / $limit) > $page) {
			    $this->document->addLink($this->url->link('product/category', 'path=' . $category_info['category_id'] . '&page='. ($page + 1), true), 'next');
			}

            if($page > 1) {

                $response = array();

                if($product_total <= $limit*$page) $response['last'] = true;
                else $response['last'] = false;

                $response['products'] = $this->load->view('product/category_page.tpl', $data);

                echo json_encode($response);exit();

            }


            $data['sort'] = isset($_COOKIE['catalog_sort']) ? $_COOKIE['catalog_sort'] : 'sort_order' ;
			$data['order'] = $order;
			$data['limit'] = $limit;

			$data['continue'] = $this->url->link('common/home');

			$data['column_left'] = $this->load->controller('extension/module/filter',['minPrice' => $minPrice,'maxPrice' => $maxPrice,'minPriceCurrent' => $minPriceCurrent,'maxPriceCurrent' => $maxPriceCurrent]);

			//$data['column_right'] = $this->load->controller('common/column_right');
			//$data['content_top'] = $this->load->controller('common/content_top');
			//$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			$this->response->setOutput($this->load->view('product/category', $data));
		} else {
			$url = '';

			if (isset($this->request->get['path'])) {
				$url .= '&path=' . $this->request->get['path'];
			}

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_error'),
				'href' => $this->url->link('product/category', $url)
			);

			$this->document->setTitle($this->language->get('text_error'));

			$data['heading_title'] = $this->language->get('text_error');

			$data['text_error'] = $this->language->get('text_error');

			$data['button_continue'] = $this->language->get('button_continue');

			$data['continue'] = $this->url->link('common/home');

			$this->response->addHeader($this->request->server['SERVER_PROTOCOL'] . ' 404 Not Found');

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			$this->response->setOutput($this->load->view('error/not_found', $data));
		}
	}
}
