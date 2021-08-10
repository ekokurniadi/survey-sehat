<?php

class Publics extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Carousel_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['slider'] = $this->Carousel_model->get_all();
        $data['getTotalAnggota'] = $this->Carousel_model->total_rows();
        $data['alurPoint'] = $this->db->query("SELECT * FROM alur_point order by urutan asc")->result();

        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');
        $data['dataSurvey'] = $this->db->query("SELECT * FROM survey WHERE '$date' BETWEEN periode_awal and periode_akhir limit 5");
        if (isset($_SESSION['id']) == "") {
            $this->load->view('client/header');
            $this->load->view('client/home/carousel', $data);
        } else {
            $this->load->view('client/header_after_login');
            $this->load->view('client/home/carousel-after-login', $data);
        }
        $this->load->view('client/home/kerjakan_survey', $data);
        $this->load->view('client/home/banner', $data);
        $this->load->view('client/home/index');
        $this->load->view('client/footer');
    }

    public function close_survey(){
       $id_survey = $_POST['id_survey'];
       $id_user = $_SESSION['id'];
    }

    public function after_login()
    {

        $data['slider'] = $this->Carousel_model->get_all();
        $data['getTotalAnggota'] = $this->Carousel_model->total_rows();
        $data['alurPoint'] = $this->db->query("SELECT * FROM alur_point order by urutan asc")->result();

        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');
        $data['dataSurvey'] = $this->db->query("SELECT * FROM survey WHERE '$date' BETWEEN periode_awal and periode_akhir limit 5");
        $this->load->view('client/header_after_login');
        $this->load->view('client/home/carousel-after-login', $data);
        $this->load->view('client/home/kerjakan_survey', $data);
        $this->load->view('client/home/banner', $data);
        $this->load->view('client/home/index');
        $this->load->view('client/footer');
    }

    public function register()
    {
        $this->load->view('client/register_popup');
    }

    public function survey_register()
    {
        if (isset($_SESSION['id']) == "") {
            redirect('auth_client');
        } else {
            $data['id'] = $this->input->get('id');
            $this->load->view('client/start_survey', $data);
        }
    }

    public function start_survey()
    {
        date_default_timezone_set("Asia/Jakarta");
        if (isset($_SESSION['id']) == "") {
            redirect('auth_client');
        } else {
            $header = [
                "kode_survey" => $_POST['idSurvey'],
                "id_user" => $_POST['sessionId'],
                "created_at" => date('Y-m-d H:i:s'),
                "status" => 0
            ];
            $this->db->trans_begin();
            $this->db->insert('survey_member', $header);
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $response = [
                    'status' => "ERROR",
                    "pesan" => "Terjadi kesalahan",
                ];
            } else {
                $this->db->trans_commit();
                $response = [
                    'status' => "sukses",
                    'link' => base_url('publics/input_survey?q=' . $_POST['idSurvey'])
                ];
                $this->session->set_flashdata('message', 'Create Record Success');
            }
            echo json_encode($response);
        }
    }

    public function input_survey()
    {
        $q = $this->input->get('q');
        $data['kode_survey'] = $q;
        $this->load->view('client/input_survey', $data);
    }

    public function input_survey_action(){
        $header =[
            "id_survey"=>$_POST['id_survey'],
            "id_soal"=>$_POST['id_soal'],
            "id_user"=>$_POST['id_user'],
            "jawaban"=>$_POST['jawaban'],
        ];
        $cek = $this->db->query("SELECT * FROM survey_jawaban_member where id_survey ='{$_POST['id_survey']}' and id_soal='{$_POST['id_soal']}' and id_user={$_POST['id_user']}");
        if($cek->num_rows() > 0){
            echo json_encode(
                array(
                    "status"=>"Error",
                    "Pesan"=>"Anda sudah menjawab",
                    )
            );
        }else{
            $this->db->insert('survey_jawaban_member',$header);
            echo json_encode(
                array(
                    "status"=>"Success",
                    "Pesan"=>"Anda sudah menjawab",
                    )
            );
        }
       
    }

    public function register_action()
    {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $no_telp = $this->input->post('no_telp');
        $password = $this->input->post('password');
        $level = $this->input->post('level');

        $cek = $this->db->get_where('user', array('email' => $email));
        if ($cek->num_rows() > 0) {
            $_SESSION['pesan'] = "Email sudah terdaftar, silahkan login";
            $_SESSION['tipe'] = "danger";
            redirect(site_url('publics/register'));
        } else {
            $data = array(
                "nama" => $nama,
                "email" => $email,
                "no_telp" => $no_telp,
                "password" => sha1($password),
                "level" => $level
            );
            $this->db->insert('user', $data);
            $_SESSION['pesan'] = "Registrasi berhasil, silahkan login ke akun anda";
            $_SESSION['tipe'] = "success";
            redirect(site_url('publics/register'));
        }
    }


    public function company_profile()
    {
        $data['dataPerusahaan'] = $this->db->get('profil_perusahaan')->row();
        if (isset($_SESSION['id']) == "") {
            $this->load->view('client/header');
        } else {
            $this->load->view('client/header_after_login');
        }
        $this->load->view('client/perkenalan/company-profile', $data);
        $this->load->view('client/footer');
    }
    public function point()
    {
        $data['penukaran'] = $this->db->get('info_penukaran_point')->row();
        $data['syarat'] = $this->db->query("SELECT * FROM syarat_penukaran_point order by urutan asc")->result();
        $data['pdh'] = $this->db->query("SELECT * FROM point_dan_hadiah")->result();
        if (isset($_SESSION['id']) == "") {
            $this->load->view('client/header');
        } else {
            $this->load->view('client/header_after_login');
        }
        $this->load->view('client/point/point', $data);
        $this->load->view('client/footer');
    }
    public function king_of_survey()
    {
        if (isset($_SESSION['id']) == "") {
            $this->load->view('client/header');
        } else {
            $this->load->view('client/header_after_login');
        }
        $this->load->view('client/home/carousel');
        $this->load->view('client/kos/king_of_survey');
        $this->load->view('client/footer');
    }
}
