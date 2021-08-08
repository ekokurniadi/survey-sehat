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

    public function register(){
        $this->load->view('client/register_popup');
    }

    public function register_action(){
         $nama = $this->input->post('nama');
         $email = $this->input->post('email');
         $no_telp = $this->input->post('no_telp');
         $password = $this->input->post('password');
         $level = $this->input->post('level');

         $cek = $this->db->get_where('user',array('email'=>$email));
         if($cek->num_rows() > 0){
             $_SESSION['pesan']="Email sudah terdaftar, silahkan login";
             $_SESSION['tipe']="danger";
             redirect(site_url('publics/register'));
         }else{
            $data=array(
                "nama"=>$nama,
                "email"=>$email,
                "no_telp"=>$no_telp,
                "password"=>sha1($password),
                "level"=>$level
            );
            $this->db->insert('user',$data);
            $_SESSION['pesan']="Registrasi berhasil, silahkan login ke akun anda";
            $_SESSION['tipe']="success";
            redirect(site_url('publics/register'));
         }
        
    }
    
    public function company_profile(){
        $data['dataPerusahaan'] = $this->db->get('profil_perusahaan')->row();
        $this->load->view('client/header');
        $this->load->view('client/perkenalan/company-profile',$data);
        $this->load->view('client/footer');
    }
    public function point(){
        $data['penukaran']= $this->db->get('info_penukaran_point')->row();
        $data['syarat']= $this->db->query("SELECT * FROM syarat_penukaran_point order by urutan asc")->result();
        $data['pdh']= $this->db->query("SELECT * FROM point_dan_hadiah")->result();
        $this->load->view('client/header');
        $this->load->view('client/point/point',$data);
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