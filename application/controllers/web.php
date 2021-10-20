<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Web extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();  
    }
	public function index()
	{
        $data                          = array();
        $data['all_featured_products'] = $this->web_model->get_all_featured_product();
        $data['all_new_products']      = $this->web_model->get_all_new_product();

		// $this->load->view('welcome_message');
		$this->load->view('/template/header');
		$this->load->view('/template/navbar');
		$this->load->view('web/home',$data);
		$this->load->view('/template/footer');
	}

    public function product()
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url('web/product/all');
        $config['total_rows'] = $this->db->get('tbl_product')->num_rows();
        $config['per_page'] = 6;
        $config['num_links'] = 10;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['prev_link'] = '&lt; Previous';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['last_link'] = false;
        $config['next_link'] = 'Next &gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

        $this->pagination->initialize($config);

        $data                    = array();
        $data['get_all_product'] = $this->web_model->get_all_product_pagi($config['per_page'], $this->uri->segment('3'));
        
		// $this->load->view('welcome_message');
		$this->load->view('/template/header');
		$this->load->view('/template/navbar');
		$this->load->view('web/all',$data);
		$this->load->view('/template/footer');
    }
    
	public function customer_login()
	{
		// $this->load->view('welcome_message');
		// $this->load->view('/template/web-header');
		$this->load->view('/template/header');
		$this->load->view('/template/navbar');
		$this->load->view('web/customer_login');
		$this->load->view('/template/footer');
		// $this->load->view('/template/web-footer');
	}
    
	public function customer_register()
	{
		// $this->load->view('welcome_message');
		// $this->load->view('/template/web-header');
		// $this->load->view('/template/navbar');
		$this->load->view('home');
		// $this->load->view('/template/web-footer');
	}

    public function user_form()
    {
        $data = array();
        $this->load->view('web/template/web-header');
        $this->load->view('web/pages/user_form');
        $this->load->view('web/template/web-footer');
    }

    public function customer_save()
    {
        $data                      = array();
        $data['customer_name']     = $this->input->post('customer_name');
        $data['customer_email']    = $this->input->post('customer_email');
        $data['customer_password'] = md5($this->input->post('customer_password'));
        $data['customer_address']  = $this->input->post('customer_address');
        $data['customer_city']     = $this->input->post('customer_city');
        $data['customer_country']  = $this->input->post('customer_country');
        $data['customer_phone']    = $this->input->post('customer_phone');
        $data['customer_zipcode']  = $this->input->post('customer_zipcode');

        $this->form_validation->set_rules('customer_name', 'Customer Name', 'trim|required');
        $this->form_validation->set_rules('customer_email', 'Customer Email', 'trim|required|valid_email|is_unique[tbl_customer.customer_email]');
        $this->form_validation->set_rules('customer_password', 'Customer Password', 'trim|required');
        $this->form_validation->set_rules('customer_address', 'Customer Address', 'trim|required');
        $this->form_validation->set_rules('customer_city', 'Customer City', 'trim|required');
        $this->form_validation->set_rules('customer_country', 'Customer Country', 'trim|required');
        $this->form_validation->set_rules('customer_phone', 'Customer Phone', 'trim|required');
        $this->form_validation->set_rules('customer_zipcode', 'Customer Zipcode', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->web_model->save_customer_info($data);
            if ($result) {
                $this->session->set_flashdata('customer_name', $data['customer_name']);
                $this->session->set_flashdata('customer_email', $data['customer_email']);
                redirect('register/success');
            } else {
                $this->session->set_flashdata('message', 'Customer Registration Fail');
                redirect('customer/register');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('customer/register');
        }
    }

    public function customer_logincheck()
    {
        $data                      = array();
        $data['customer_email']    = $this->input->post('customer_email');
        $data['customer_password'] = md5($this->input->post('customer_password'));

        $this->form_validation->set_rules('customer_email', 'Customer Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('customer_password', 'Customer Password', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->web_model->get_customer_info($data);
            if ($result) {
                $this->session->set_userdata('customer_id', $result->customer_id);
                $this->session->set_userdata('customer_email', $data['customer_email']);
                redirect('/');
            } else {
                $this->session->set_flashdata('message', 'Customer Login Fail');
                redirect('customer/login');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('customer/login');
        }
    }

    public function contact()
    {
        $data = array();
        $this->load->view('web/template/web-header');
        $this->load->view('web/pages/contact');
        $this->load->view('web/template/web-footer');
    }

    public function cart()
    {
        $data                  = array();
        $data['cart_contents'] = $this->cart->contents();
        $this->load->view('web/template/web-header');
        $this->load->view('web/pages/cart', $data);
        $this->load->view('web/template/web-footer');
    }
}
