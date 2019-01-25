<?php
class ControllerExtensionModulecolorsmodule extends Controller {
    public function index($params = []) {

        $this->load->language('extension/module/colorsmodule');
        $data['heading_title'] = $this->language->get('heading_title');


        $this->load->model('catalog/product');
        $this->load->model('extension/module/colorsmodule');

        $product_id = 0;
        if(isset($this->request->get['product_id'])) {
            $product_id = $this->request->get['product_id'];
        }

        $limit = 0;
        if(isset($params['product_id'])) {
            $product_id = $params['product_id'];
            $limit = 8;
        }
        $data['colors']= $this->model_extension_module_colorsmodule->getProductColors($product_id, $limit);
        
        if(!isset($params['isCatalog'])) {
            if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/extension/module/colorsmodule.tpl')) {
                return $this->load->view($this->config->get('config_template') . '/template/extension/module/colorsmodule.tpl', $data);
            } else {
                return $this->load->view('extension/module/colorsmodule.tpl', $data);
            }
        }
        else {
            if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/extension/module/colorsmodule_catalog.tpl')) {
                return $this->load->view($this->config->get('config_template') . '/template/extension/module/colorsmodule_catalog.tpl', $data);
            } else {
                return $this->load->view('extension/module/colorsmodule_catalog.tpl', $data);
            }
        }

    }
}