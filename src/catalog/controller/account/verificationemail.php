<?php 
class ControllerAccountVerificationEmail extends Controller { 
	public function index() {
        if ($this->customer->isLogged()) {
            $this->response->redirect($this->url->link('account/logout', '', 'SSL'));
            die();
        }

        if (strlen($this->request->get['h']) != 32) {
            header('Location: ' . HTTP_SERVER);
            die();
        }


        $hash_token = $this->request->get['h'];

        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer WHERE hash_token='" . $hash_token . "' AND approved = 0");
        $customer = $query->row;
        if (!$customer) {
            $this->response->redirect($this->url->link('common/home'));
        } else {
            $this->load->model('account/customer');
            // Clear any previous login attempts for unregistered accounts.
            $this->model_account_customer->deleteLoginAttempts($customer['email']);

            $this->customer->login($this->request->post['email'], $this->request->post['pass']);

            unset($this->session->data['guest']);

            $this->db->query("UPDATE " . DB_PREFIX . "customer SET approved = 1 WHERE customer_id='" . $customer['customer_id'] . "'");

            $this->customer->login($customer['email'], $customer['password'], true);

            if ($this->request->get['account']) {
                setcookie('success_email_account_confirmation', '1', time() + 86400, '/', $this->request->server['HTTP_HOST']);
                $this->response->redirect($this->url->link('account/edit', '', true));
            } else {
                setcookie('success_email_confirmation', '1', time() + 86400, '/', $this->request->server['HTTP_HOST']);
                $this->response->redirect($this->url->link('common/home', '', true));
            }

        }
    }
}
?>
