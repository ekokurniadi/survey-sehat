<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Dashboard extends MY_Controller {

    // protected $access=array('Admin');
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
    }
    
	public function index()
	{	
        $data=array(
            'user'=>$this->db->get('user'),  
        );
       
        $this->load->view('panel/header');
        $this->load->view('panel/index',$data);
        $this->load->view('panel/footer');
    }  
    

}
?>