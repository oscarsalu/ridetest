<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Bookrid extends MY_Controller
{				
public function __construct()
{
		parent::__construct();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
		$this->load->model('bookrid_model');
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
		if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
}
function index()
{
		$this->data['page_title'] = 'Bookrid';
		$this->data['bookrid']=$this->bookrid_model->getBookrid();
		$this->data['main_content']='views/theme/bookrid/bookrid';
		$this->render_page('theme/bookrid/bookrid', $this->data);
}
function bookrid()
{
		$this->data['page_title'] = 'Bookrid';
		$this->data['bookrid']=$this->bookrid_model->getBookrid();
		$this->render_page('theme/bookrid/bookrid', $this->data);
}
public function bookride($getrideid)
{
		$varbooked = $this->db->select('*')
                    ->from('bookrid')
                    ->where('getrideid', $getrideid)->where('bookerid', $this->session->userdata('user_id'))
                    ->get()
                    ->result();
        if (count($varbooked) <= 0) {
        $createbookrid= array(
			'getrideid' => $getrideid,
			'bookerid' => $this->session->userdata('user_id'),
			'timebooked' => date('Y-m-d'),
			);

		$varnumb = $this->db->select('capacity, remaining, vehiclename')
                    ->from('getride')
                    ->where('id', $getrideid)
                    ->get()
                    ->row();

        //var_dump($varnumb);            
        $seats = $varnumb->capacity;
        $rem = $varnumb->remaining;
        $vehicle = $varnumb->vehiclename;

        if ($seats > $rem) {
        	$bookrid_data= array(
				'remaining' => $rem + 1,
				);	
        	// $this->db->where('id', $getrideid)->$this->db->update('getride', $bookrid_data);
        	if ($this->bookrid_model->create_bookrid($createbookrid) && $this->bookrid_model->updateremaining($getrideid, $bookrid_data)) {
        		 $from_email = "oscarsalu@gmail.com"; 
		         $to_email = $this->session->userdata('email'); 
		   
		         //Load email library 
		         $this->load->library('email'); 
		   
		         $this->email->from($from_email, 'Admin'); 
		         $this->email->to($to_email);
		         $this->email->subject('Ride Booked'); 
		         $this->email->message('Your Ride Car No '.$vehicle.' is booked.'); 
		   
		         //Send mail 
		         if($this->email->send()) {
		         $this->session->set_flashdata('message', "You have Successfully booked the Ride, Check Your Email for Further Details");
		         //echo "email sent";
				 redirect("bookrid/bookrid", 'refresh');
		        } else {
		         $this->session->set_flashdata('message', "You have Successfully booked the Ride, Our Emailing System Seems To be Down");
		         //echo "email not sent";
				 redirect("bookrid/bookrid", 'refresh'); 
				}
        	}else{

        		$this->session->set_flashdata('message', "Please Try Again, There is something Wrong with your Connection");
        		//echo "something wrong";
				redirect("bookrid/bookrid", 'refresh');
        	}
        	
        }elseif ($seats <= $rem) {
        	$this->session->set_flashdata('message', "Sorry but the ride is Completely full");
        	//echo "ride full";
			redirect("bookrid/bookrid", 'refresh');
        }
       }elseif (count($varbooked) > 0) {
       		$this->session->set_flashdata('message', "You Have Already Booked This Ride... Have a Safe journy");
       		//echo "Booked";
			redirect("bookrid/bookrid", 'refresh');
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
