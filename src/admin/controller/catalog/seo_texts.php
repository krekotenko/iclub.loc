<?php

/**
 * Created by PhpStorm.
 * User: Meits
 * Date: 04-Jan-18
 * Time: 10:37
 */
class ControllerCatalogSeoTexts extends Controller
{
    private $error = array();

    public function index() {

        $this->language->load('catalog/seo_texts');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('catalog/seo_texts');

        $this->getList();
    }

    public function add() {
        $this->language->load('catalog/seo_texts');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('catalog/seo_texts');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
            $this->model_catalog_seo_texts->addSeoText($this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $url = '';

            if (isset($this->request->get['sort'])) {
                $url .= '&sort=' . $this->request->get['sort'];
            }

            if (isset($this->request->get['order'])) {
                $url .= '&order=' . $this->request->get['order'];
            }

            if (isset($this->request->get['page'])) {
                $url .= '&page=' . $this->request->get['page'];
            }

            $this->response->redirect($this->url->link('catalog/seo_texts', 'token=' . $this->session->data['token'] . $url, 'SSL'));
        }

        $this->getForm();
    }

    public function edit() {
        $this->language->load('catalog/seo_texts');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('catalog/seo_texts');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
            $this->model_catalog_seo_texts->editSeoText($this->request->get['text_id'], $this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $url = '';

            if (isset($this->request->get['sort'])) {
                $url .= '&sort=' . $this->request->get['sort'];
            }

            if (isset($this->request->get['order'])) {
                $url .= '&order=' . $this->request->get['order'];
            }

            if (isset($this->request->get['page'])) {
                $url .= '&page=' . $this->request->get['page'];
            }

            $this->response->redirect($this->url->link('catalog/seo_texts', 'token=' . $this->session->data['token'] . $url, 'SSL'));
        }

        $this->getForm();
    }

    public function delete() {

        $this->language->load('catalog/seo_texts');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('catalog/seo_texts');

        if (isset($this->request->post['selected']) && $this->validateDelete()) {
            foreach ($this->request->post['selected'] as $text_id) {
                $this->model_catalog_seo_texts->deleteSeoText($text_id);
            }

            $this->session->data['success'] = $this->language->get('text_success');

            $url = '';

            if (isset($this->request->get['sort'])) {
                $url .= '&sort=' . $this->request->get['sort'];
            }

            if (isset($this->request->get['order'])) {
                $url .= '&order=' . $this->request->get['order'];
            }

            if (isset($this->request->get['page'])) {
                $url .= '&page=' . $this->request->get['page'];
            }

            $this->response->redirect($this->url->link('catalog/seo_texts', 'token=' . $this->session->data['token'] . $url, 'SSL'));
        }

        $this->getList();
    }

    protected function getList() {

        if (isset($this->request->get['sort'])) {
            $sort = $this->request->get['sort'];
        } else {
            $sort = 's.url';
        }

        if (isset($this->request->get['order'])) {
            $order = $this->request->get['order'];
        } else {
            $order = 'ASC';
        }

        if (isset($this->request->get['page'])) {
            $page = $this->request->get['page'];
        } else {
            $page = 1;
        }

        $url = '';

        if (isset($this->request->get['sort'])) {
            $url .= '&sort=' . $this->request->get['sort'];
        }

        if (isset($this->request->get['order'])) {
            $url .= '&order=' . $this->request->get['order'];
        }

        if (isset($this->request->get['page'])) {
            $url .= '&page=' . $this->request->get['page'];
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('catalog/seo_texts', 'token=' . $this->session->data['token'] . $url, 'SSL')
        );

        $data['add'] = $this->url->link('catalog/seo_texts/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
        $data['delete'] = $this->url->link('catalog/seo_texts/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');

        $data['seo_texts'] = array();

        $filter_data = array(
            'sort'  => $sort,
            'order' => $order,
            'start' => ($page - 1) * $this->config->get('config_limit_admin'),
            'limit' => $this->config->get('config_limit_admin')
        );

        $seo_texts_total = $this->model_catalog_seo_texts->getTotalSeoTexts();

        $results = $this->model_catalog_seo_texts->getSeoTexts($filter_data);

        foreach ($results as $result) {
            $data['seo_texts'][] = array(
                'text_id'       => $result['text_id'],
                'text'          => mb_substr(strip_tags(htmlspecialchars_decode($result['text'])), 0, 300) . '...',
                'url'           => $result['url'],
                'edit'          => $this->url->link('catalog/seo_texts/edit', 'token=' . $this->session->data['token'] . '&text_id=' . $result['text_id'] . $url, 'SSL')
            );
        }

        $data['heading_title'] = $this->language->get('heading_title');

        $data['text_list'] = $this->language->get('text_list');
        $data['text_no_results'] = $this->language->get('text_no_results');
        $data['text_confirm'] = $this->language->get('text_confirm');

        $data['column_url'] = $this->language->get('column_url');
        $data['column_text'] = $this->language->get('column_text');
        $data['column_action'] = $this->language->get('column_action');

        $data['button_add'] = $this->language->get('button_add');
        $data['button_edit'] = $this->language->get('button_edit');
        $data['button_delete'] = $this->language->get('button_delete');

        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        if (isset($this->session->data['success'])) {
            $data['success'] = $this->session->data['success'];

            unset($this->session->data['success']);
        } else {
            $data['success'] = '';
        }

        if (isset($this->request->post['selected'])) {
            $data['selected'] = (array)$this->request->post['selected'];
        } else {
            $data['selected'] = array();
        }

        $url = '';

        if ($order == 'ASC') {
            $url .= '&order=DESC';
        } else {
            $url .= '&order=ASC';
        }

        if (isset($this->request->get['page'])) {
            $url .= '&page=' . $this->request->get['page'];
        }


        $data['sort_url'] = $this->url->link('catalog/seo_texts', 'token=' . $this->session->data['token'] . '&sort=i.url' . $url, 'SSL');

        $url = '';

        if (isset($this->request->get['sort'])) {
            $url .= '&sort=' . $this->request->get['sort'];
        }

        if (isset($this->request->get['order'])) {
            $url .= '&order=' . $this->request->get['order'];
        }

        $pagination = new Pagination();
        $pagination->total = $seo_texts_total;
        $pagination->page = $page;
        $pagination->limit = $this->config->get('config_limit_admin');
        $pagination->url = $this->url->link('catalog/seo_texts', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

        $data['pagination'] = $pagination->render();

        $data['results'] = sprintf($this->language->get('text_pagination'), ($seo_texts_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($seo_texts_total - $this->config->get('config_limit_admin'))) ? $seo_texts_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $seo_texts_total, ceil($seo_texts_total / $this->config->get('config_limit_admin')));

        $data['sort'] = $sort;
        $data['order'] = $order;

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('catalog/seo_texts_list.tpl', $data));
    }

    protected function getForm() {

        //CKEditor
        if ($this->config->get('config_editor_default')) {
            $this->document->addScript('view/javascript/ckeditor/ckeditor.js');
            $this->document->addScript('view/javascript/ckeditor/ckeditor_init.js');
        } else {
            $this->document->addScript('view/javascript/summernote/summernote.js');
            $this->document->addScript('view/javascript/summernote/lang/summernote-' . $this->language->get('lang') . '.js');
            $this->document->addScript('view/javascript/summernote/opencart.js');
            $this->document->addStyle('view/javascript/summernote/summernote.css');
        }

        $data['heading_title'] = $this->language->get('heading_title');

        $data['text_form'] = !isset($this->request->get['text_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
        $data['text_default'] = $this->language->get('text_default');
        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');

        $data['entry_text'] = $this->language->get('entry_text');
        $data['entry_title'] = $this->language->get('entry_title');
        $data['entry_url'] = $this->language->get('entry_url');

        $data['entry_status'] = $this->language->get('entry_status');

        $data['help_keyword'] = $this->language->get('help_keyword');
        $data['help_bottom'] = $this->language->get('help_bottom');

        $data['button_save'] = $this->language->get('button_save');
        $data['button_cancel'] = $this->language->get('button_cancel');

        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        if (isset($this->error['text'])) {
            $data['error_text'] = $this->error['text'];
        } else {
            $data['error_text'] = array();
        }

        $url = '';

        if (isset($this->request->get['sort'])) {
            $url .= '&sort=' . $this->request->get['sort'];
        }

        if (isset($this->request->get['order'])) {
            $url .= '&order=' . $this->request->get['order'];
        }

        if (isset($this->request->get['page'])) {
            $url .= '&page=' . $this->request->get['page'];
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('catalog/seo_texts', 'token=' . $this->session->data['token'] . $url, 'SSL')
        );

        if (!isset($this->request->get['text_id'])) {
            $data['action'] = $this->url->link('catalog/seo_texts/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
        } else {
            $data['action'] = $this->url->link('catalog/seo_texts/edit', 'token=' . $this->session->data['token'] . '&text_id=' . $this->request->get['text_id'] . $url, 'SSL');
        }

        $data['cancel'] = $this->url->link('catalog/seo_texts', 'token=' . $this->session->data['token'] . $url, 'SSL');

        if (isset($this->request->get['text_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
            $seo_texts_info = $this->model_catalog_seo_texts->getSeoText($this->request->get['text_id']);
        }

        $data['token'] = $this->session->data['token'];

        $this->load->model('localisation/language');

        $data['languages'] = $this->model_localisation_language->getLanguages();

        if (isset($this->request->post['seotext_description'])) {
            $data['seotext_description'] = $this->request->post['seotext_description'];
        } elseif (isset($this->request->get['text_id'])) {
            $data['seotext_description'] = $this->model_catalog_seo_texts->getSeoTextDescriptions($this->request->get['text_id']);
        } else {
            $data['seotext_description'] = array();
        }

        if (isset($this->request->post['status'])) {
            $data['status'] = $this->request->post['status'];
        } elseif (!empty($seo_texts_info)) {
            $data['status'] = $seo_texts_info['status'];
        } else {
            $data['status'] = true;
        }

        if (isset($this->request->post['url'])) {
            $data['url'] = $this->request->post['url'];
        } elseif (!empty($seo_texts_info)) {
            $data['url'] = $seo_texts_info['url'];
        } else {
            $data['url'] = '';
        }

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('catalog/seo_texts_form.tpl', $data));
    }

    protected function validateForm() {
        if (!$this->user->hasPermission('modify', 'catalog/seo_texts')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        foreach ($this->request->post['seotext_description'] as $language_id => $value) {
            if ((utf8_strlen($value['text']) == 0)) {
                $this->error['text'][$language_id] = $this->language->get('error_text');
            }
        }

        if ($this->error && !isset($this->error['warning'])) {
            $this->error['warning'] = $this->language->get('error_warning');
        }

        return !$this->error;
    }

    protected function validateDelete() {
        if (!$this->user->hasPermission('modify', 'catalog/seo_texts')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }
        foreach ($this->request->post['selected'] as $seo_texts_id) {
            if ($this->config->get('config_account_id') == $seo_texts_id) {
                $this->error['warning'] = $this->language->get('error_account');
            }

            if ($this->config->get('config_checkout_id') == $seo_texts_id) {
                $this->error['warning'] = $this->language->get('error_checkout');
            }

            if ($this->config->get('config_affiliate_id') == $seo_texts_id) {
                $this->error['warning'] = $this->language->get('error_affiliate');
            }

            if ($this->config->get('config_return_id') == $seo_texts_id) {
                $this->error['warning'] = $this->language->get('error_return');
            }

        }

        return !$this->error;
    }
}