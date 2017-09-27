<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Getride extends MY_Controller
{				
public function __construct()
{
		parent::__construct();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
		$this->load->model('getride_model');
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
		if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
}
function index()
{
		$this->data['page_title'] = 'Getride';
		$this->data['getride']=$this->getride_model->getGetride();
		$this->data['main_content']='views/theme/getride/getride';
		$this->render_page('theme/getride/getride', $this->data);
}
function getride()
{
		$this->data['page_title'] = 'Getride';
		$this->data['getride']=$this->getride_model->getGetride();
		$this->render_page('theme/getride/getride', $this->data);
}

public function create_getride()
{
	$this->data['title'] ='create getride';
	$obj=(object)$_POST;
	$objs=get_object_vars($obj);
	$this->form_validation->set_rules('origin', 'Origin', 'required');
	$this->form_validation->set_rules('destination', 'Destination', 'required');
	$this->form_validation->set_rules('capacity', 'Capacity', 'required');
	$this->form_validation->set_rules('vehiclename', 'Vehicle Number', 'required');
	if ($this->form_validation->run() == true)
	{
			$array= array(
			'origin' => $this->input->post('origin'),
			'destination' => $this->input->post('destination'),
			'capacity' => $this->input->post('capacity'),
			'driverid' => $this->session->userdata('user_id'),
			'vehiclename' => $this->input->post('vehiclename'),
			'time' => $this->input->post('time'),
			'createdat' => date('Y-m-d H:i:s'),
			);
		$getride_data =$array;
	}
	if ($this->form_validation->run() == true && $this->getride_model->create_getride($getride_data))
	{
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect("getride/getride",'refresh');
	}
	else
	{
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
		$this->data['csrf'] = $this->_get_csrf_nonce();
		$this->data['obj'] =$objs;
		$this->render_page('theme/getride/create_getride', $this->data);
	}
}
public function _get_csrf_nonce()
{
	$this->load->helper('string');
	$key   = random_string('alnum', 8);
	$value = random_string('alnum', 20);
	$this->session->set_flashdata('csrfkey', $key);
	$this->session->set_flashdata('csrfvalue', $value);
	return array($key => $value);
}
public function _valid_csrf_nonce()
{
	$csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
	if ($csrfkey && $csrfkey == $this->session->flashdata('csrfvalue'))
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}
public function render_page($view, $data=null, $returnhtml=false)
{
	$this->viewdata = (empty($data)) ? $this->data: $data;
	$this->load->view('theme/header');
	$this->load->view('theme/sidebar');
	$this->load->view($view, $this->viewdata, $returnhtml);
	$this->load->view('theme/footer');
}
}
