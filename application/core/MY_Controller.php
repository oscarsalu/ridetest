<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class MY_Controller extends CI_Controller {

  

    //--------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();



    }

   
   // public function _render_page($view, $data=null, $returnhtml=false)//I think this makes more sense
   //  {

   //      $this->viewdata = (empty($data)) ? $this->data: $data;

   //      $view_html = $this->load->view($view, $this->viewdata, $returnhtml);

   //      if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
   //  }
   
  


    public function _render_page($view, $data=null, $returnhtml=false)//I think this makes more sense
    {

        $this->viewdata = (empty($data)) ? $this->data: $data;

       
        $this->load->view('theme/header');
        $this->load->view('theme/sidebar');
        $this->load->view($view, $this->viewdata, $returnhtml);
        $this->load->view('theme/footer');
    
    }

    //         public function front_page($view, $data=null, $returnhtml=false)//I think this makes more sense
    // {

    //     $this->viewdata = (empty($data)) ? $this->data: $data;

       
    //     $this->load->view('theme/frontend/header');
    //     $this->load->view($view, $this->viewdata, $returnhtml);
    //     $this->load->view('theme/frontend/footer1');
    
    // }


}