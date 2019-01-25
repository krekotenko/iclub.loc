<?php

class ControllerStartupSeoUrl extends Controller
{
    public function index()
    {
        // Add rewrite to url class
        if ($this->config->get('config_seo_url')) {
            $this->url->addRewrite($this);
        }
        // Decode URL
        if (isset($this->request->get['_route_'])) {
            if (strripos($this->request->get['_route_'], "blog") !== false) {
                $parts = [$this->request->get['_route_']];
            } else {
                $parts = explode('/', $this->request->get['_route_']);
            }



            // remove any empty arrays from trailing
            if (utf8_strlen(end($parts)) == 0) {
                array_pop($parts);
            }

            foreach ($parts as $part) {
                $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "url_alias WHERE keyword = '" . $this->db->escape($part) . "'");

                if ($query->num_rows) {

                        foreach($query->rows as $row) {
                            $url = explode('=', $row['query']);
                            if($url[0] == 'filter_id') {

                                if (!isset($this->request->get['filter'])) {
                                    $this->request->get['filter'] = $url[1];
                                } else {
                                    if(!in_array($url[1],explode(',',$this->request->get['filter']))) {
                                        $this->request->get['filter'] .= ',' . $url[1];
                                    }
                                }
                            }
                        }

                    $url = explode('=', $query->row['query']);

                    if ($url[0] == 'product_id') {
                        $this->request->get['product_id'] = $url[1];
                    }

                    if ($url[0] == 'category_id') {
                        if (!isset($this->request->get['path'])) {
                            $this->request->get['path'] = $url[1];
                        } else {
                            $this->request->get['path'] .= '_' . $url[1];
                        }
                    }

                    if($url[0] == 'filter_id') {
                        if (!isset($this->request->get['filter'])) {
                            $this->request->get['filter'] = $url[1];
                        } else {
                            if(!in_array($url[1],explode(',',$this->request->get['filter']))) {
                                $this->request->get['filter'] .= ',' . $url[1];
                            }
                        }
                    }

                    if ($url[0] == 'manufacturer_id') {
                        $this->request->get['manufacturer_id'] = $url[1];
                    }

                    if ($url[0] == 'information_id') {
                        $this->request->get['information_id'] = $url[1];
                    }

                    if ($url[0] == 'simple_blog_article_id') {
                        $this->request->get['simple_blog_article_id'] = $url[1];
                    }

                    if ($query->row['query'] && $url[0] != 'information_id' && $url[0] != 'manufacturer_id' && $url[0] != 'category_id' && $url[0] != 'product_id' && $url[0] != 'simple_blog_article_id' && $url[0] != 'simple_blog_author_id' && $url[0] != 'simple_blog_category_id'&& $url[0] != 'filter_id') {
                        $this->request->get['route'] = $query->row['query'];
                    }
                } else {
                    $this->request->get['route'] = 'error/not_found';

                    break;
                }
            }
            //print_r($this->request->get);
            if (!isset($this->request->get['route'])) {
                if (isset($this->request->get['product_id'])) {
                    $this->request->get['route'] = 'product/product';
                } elseif (isset($this->request->get['path'])) {
                    $this->request->get['route'] = 'product/category';
                } elseif (isset($this->request->get['manufacturer_id'])) {
                    $this->request->get['route'] = 'product/manufacturer/info';
                } elseif (isset($this->request->get['information_id'])) {
                    $this->request->get['route'] = 'information/information';
                }elseif (isset($this->request->get['simple_blog_article_id'])) {
                    $this->request->get['route'] = 'simple_blog/article/view';
                }elseif (isset($this->request->get['simple_blog/article'])) {
                    $this->request->get['route'] = 'simple_blog/article';
                }
            }
        }
    }

    public function rewrite($link)
    {
        $url_info = parse_url(str_replace('&amp;', '&', $link));

        $url = '';

        $data = array();

        parse_str($url_info['query'], $data);

        foreach ($data as $key => $value) {
            if (isset($data['route'])) {
                if (($data['route'] == 'product/product' && $key == 'product_id') || (($data['route'] == 'product/manufacturer/info' || $data['route'] == 'product/product') && $key == 'manufacturer_id') || ($data['route'] == 'information/information' && $key == 'information_id')|| ($data['route'] == 'simple_blog/article/view' && $key == 'simple_blog_article_id')) {
                    $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "url_alias WHERE `query` = '" . $this->db->escape($key . '=' . (int)$value) . "'");

                    if ($query->num_rows && $query->row['keyword']) {
                        $url .= '/' . $query->row['keyword'];

                        unset($data[$key]);
                    }
                } elseif ($key == 'path') {
                    $categories = explode('_', $value);

                    foreach ($categories as $category) {
                        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "url_alias WHERE `query` = 'category_id=" . (int)$category . "'");

                        if ($query->num_rows && $query->row['keyword']) {
                            $url .= '/' . $query->row['keyword'];
                        } else {
                            $url = '';

                            break;
                        }
                    }

                    unset($data[$key]);
                }
                elseif($data['route'] == 'simple_blog/article') {
                    $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "url_alias WHERE `query` = 'simple_blog/article'");
                    if ($query->num_rows && $query->row['keyword']) {
                        $url = '/' . $query->row['keyword'];
                    } else {
                        $url = '';
                    }
                }
            }
        }

        if ($url) {
            unset($data['route']);

            $query = '';

            if ($data) {
                foreach ($data as $key => $value) {
                    $query .= '&' . rawurlencode((string)$key) . '=' . rawurlencode((is_array($value) ? http_build_query($value) : (string)$value));
                }

                if ($query) {
                    $query = '?' . str_replace('&', '&amp;', trim($query, '&'));
                }
            }

            return $url_info['scheme'] . '://' . $url_info['host'] . (isset($url_info['port']) ? ':' . $url_info['port'] : '') . str_replace('/index.php',
                    '', $url_info['path']) . $url . $query;
        } else {
            $link = str_replace('index.php?route=common/home', '', $link);
            return $link;
        }
    }
}
