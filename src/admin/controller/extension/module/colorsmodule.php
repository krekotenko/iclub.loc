<?php
class ControllerExtensionModulecolorsmodule extends Controller {
    private $error = array();

    public function index() {
        $this->load->language('extension/module/colorsmodule');

        $this->load->model('setting/setting');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting('colorsmodule_status', $this->request->post);
            $this->response->redirect($this->url->link('extension/module/colorsmodule', 'token=' . $this->session->data['token'], 'SSL'));
        }

        $data['heading_title'] = $this->language->get('heading_title');
        $data['text_edit'] = $this->language->get('text_edit');
        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');

        $data['entry_status'] = $this->language->get('entry_status');
        $data['entry_alias'] = $this->language->get('entry_alias');


        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        // далее идет формирование массива breadcrumbs (хлебные крошки)
        $data['breadcrumbs'] = array();
        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
        );
        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_module'),
            'href' => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL')
        );
        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('module/category', 'token=' . $this->session->data['token'], 'SSL')
        );

        $data['action'] = $this->url->link('extension/module/colorsmodule', 'token=' . $this->session->data['token'], 'SSL');
        $data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');

        if (isset($this->request->post['colorsmodule_status'])) {
            $data['colorsmodule_status'] = $this->request->post['colorsmodule_status'];
        } else {
            $data['colorsmodule_status'] = $this->config->get('colorsmodule_status');
        }

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/module/colorsmodule.tpl', $data));
    }

    protected function validate() {
        if (!$this->user->hasPermission('modify', 'extension/module/colorsmodule')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }
        return !$this->error;
    }
}