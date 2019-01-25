<?php
class ControllerAccountReset extends Controller {
    private $error = array();

    public function index() {

        if ($this->customer->isLogged()) {
            $this->response->redirect($this->url->link('common/home', '', true));
        }

        if (isset($this->request->get['code'])) {
            $code = $this->request->get['code'];
        } else {
            $code = '';
        }

        $this->load->model('account/customer');

        $customer_info = $this->model_account_customer->getCustomerByCode($code);

        if ($customer_info) {
            $this->load->language('account/reset');

            $this->document->setTitle($this->language->get('heading_title'));

            if (($this->request->server['REQUEST_METHOD'] == 'POST')/* && $this->validate()*/) {;
                if ($customer_info) {
                    $this->model_account_customer->editPassword($customer_info['email'], $this->request->post['password']);

                    if ($this->config->get('config_customer_activity')) {
                        $this->load->model('account/activity');

                        $activity_data = array(
                            'customer_id' => $customer_info['customer_id'],
                            'name' => $customer_info['firstname'] . ' ' . $customer_info['lastname']
                        );

                        $this->model_account_activity->addActivity('reset', $activity_data);
                        $this->model_account_activity->addActivity('login', $activity_data);


                    }

                    $this->model_account_customer->editPassword($customer_info['email'], $this->request->post['password']);

                    $this->customer->login($customer_info['email'], $this->request->post['password'], true);

                    if ($this->customer->isLogged()) {
                        setcookie('success_reset_password', '1', time() + 86400, '/', $this->request->server['HTTP_HOST']);
                        $this->response->redirect($this->url->link('common/home', '', true));
                    }

                }
            }

            /*if (isset($this->error['password'])) {
                $data['error_password'] = $this->error['password'];
            } else {
                $data['error_password'] = '';
            }

            if (isset($this->error['confirm'])) {
                $data['error_confirm'] = $this->error['confirm'];
            } else {
                $data['error_confirm'] = '';
            }

            $data['action'] = $this->url->link('account/reset', 'code=' . $code, true);

            $data['back'] = $this->url->link('account/login', '', true);

            if (isset($this->request->post['password'])) {
                $data['password'] = $this->request->post['password'];
            } else {
                $data['password'] = '';
            }

            if (isset($this->request->post['confirm'])) {
                $data['confirm'] = $this->request->post['confirm'];
            } else {
                $data['confirm'] = '';
            }*/
            $data['action'] = $this->url->link('account/reset', 'code=' . $code, true);
            $data['footer'] = $this->load->controller('common/footer');
            $data['header'] = $this->load->controller('common/header');

            $this->response->setOutput($this->load->view('account/reset', $data));

        } else {
            $this->load->language('account/reset');

            $this->session->data['error'] = $this->language->get('error_code');

            return new Action('account/login');
        }
    }

    protected function validate() {
        if ((utf8_strlen($this->request->post['password']) < 4) || (utf8_strlen($this->request->post['password']) > 20)) {
            $this->error['password'] = $this->language->get('error_password');
        }

        if ($this->request->post['confirm'] != $this->request->post['password']) {
            $this->error['confirm'] = $this->language->get('error_confirm');
        }

        return !$this->error;
    }
}
