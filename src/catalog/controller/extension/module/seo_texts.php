<?php
class ControllerExtensionModuleSeoTexts extends Controller {
	public function index($setting) {
	
	$data['setting'] = $setting;

    $this->load->model('extension/module/seo_texts');

    $seotext_data = $this->model_extension_module_seo_texts->getSeoText($_SERVER['REQUEST_URI']);
    if ($seotext_data) {
        return $this->load->view('extension/module/seo_texts', $seotext_data);
		}

	}
}
