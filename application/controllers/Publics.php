<?php 
 
 class Publics extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Carousel_model');
        $this->load->library('form_validation');
    }

    public function index(){
        
        $data['slider'] = $this->Carousel_model->get_all();
        $data['getTotalAnggota']= $this->Carousel_model->total_rows();
        $data['alurPoint']=$this->db->query("SELECT * FROM alur_point order by urutan asc")->result();

        $this->load->view('client/header');
        $this->load->view('client/home/carousel',$data);
        $this->load->view('client/home/kerjakan_survey',$data);
        $this->load->view('client/home/banner');
        $this->load->view('client/home/index');
        $this->load->view('client/footer');
    }
    
    public function company_profile(){
        $this->load->view('client/header');
        $this->load->view('client/perkenalan/company-profile');
        $this->load->view('client/footer');
    }
    public function point(){
        $this->load->view('client/header');
        $this->load->view('client/point/point');
        $this->load->view('client/footer');
    }
    public function king_of_survey(){
        $this->load->view('client/header');
        $this->load->view('client/home/carousel');
        $this->load->view('client/kos/king_of_survey');
        $this->load->view('client/footer');
    }
 }

?>