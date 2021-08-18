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



        if (isset($_SESSION['id']) == "") {
            $this->load->view('client/header');
            $this->load->view('client/home/carousel', $data);
        } else {
            $this->load->view('client/header_after_login');
            $this->load->view('client/home/carousel-after-login', $data);
        }
        $this->load->view('client/home/kerjakan_survey', $data);
        $this->load->view('client/home/banner');
        $this->load->view('client/home/index');
        $this->load->view('client/footer');
    }


    public function getPoint()
    {

        $notifPendaftaranDriver = $this->db->query("SELECT jumlah_poin from user where id='{$_SESSION['id']}' ");

        if ($notifPendaftaranDriver->num_rows() > 0) {
            echo json_encode(array(
                "total_notif" => $notifPendaftaranDriver->row()->jumlah_poin,

            ));
        } else {
            echo json_encode(array(
                "total_notif" => $notifPendaftaranDriver->row()->jumlah_poin,

            ));
        }
    }

    public function close_survey()
    {
        $id_survey = $_POST['id_survey'];
        $id_user = $_SESSION['id'];
        $cek = $this->db->get_where('survey_member', array('kode_survey' => $id_survey, 'id_user' => $id_user));

        if ($cek->num_rows() > 0) {
            $this->db->where('kode_survey', $id_survey);
            $this->db->where('id_user', $id_user);
            $this->db->update('survey_member', array('status' => 1));
            echo json_encode(array(
                "status" => "sukses",
                "link" => base_url('publics'),
            ));
        } else {
            echo json_encode(array(
                "status" => "gagal",
                "pesan" => "Terjadi kesalahan, mohon coba kembali beberapa saat lagi",
            ));
        }
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

    public function contact_us()
    {
        $data['dataPerusahaan'] = $this->db->get('profil_perusahaan')->row();
        if (isset($_SESSION['id']) == "") {
            $this->load->view('client/header');
        } else {
            $this->load->view('client/header_after_login');
        }
        $this->load->view('client/contact', $data);
        $this->load->view('client/footer');
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

    public function input_survey_action()
    {
        $header = [
            "id_survey" => $_POST['id_survey'],
            "id_soal" => $_POST['id_soal'],
            "id_user" => $_POST['id_user'],
            "jawaban" => $_POST['jawaban'],
        ];
        $cek = $this->db->query("SELECT * FROM survey_jawaban_member where id_survey ='{$_POST['id_survey']}' and id_soal='{$_POST['id_soal']}' and id_user={$_SESSION['id']}");
        if ($cek->num_rows() > 0) {
            echo json_encode(
                array(
                    "status" => "Error",
                    "Pesan" => "Anda sudah menjawab",
                )
            );
        } else {
            $this->db->insert('survey_jawaban_member', $header);
            echo json_encode(
                array(
                    "status" => "Success",
                    "Pesan" => "Anda sudah menjawab",
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

    public function beranda()
    {
        $this->load->view('template/header');
        $this->load->view('template/carousel');
        $this->load->view('template/kerjakan');
        $this->load->view('template/survey');
        $this->load->view('template/index');
        $this->load->view('template/footer');
    }

    public function fetch_data_survey()
    {
        $starts       = $this->input->post("start");
        $length       = $this->input->post("length");
        $LIMIT        = "LIMIT $starts, $length ";
        $draw         = $this->input->post("draw");
        $search       = $this->input->post("search")["value"];
        $orders       = isset($_POST["order"]) ? $_POST["order"] : '';

        $where = "WHERE 1=1";
        // $searchingColumn;
        $result = array();
        if (isset($search)) {
            if ($search != '') {
                $searchingColumn = $search;
                $where .= " AND (a.kode_survey LIKE '%$search%'
                            OR a.judul LIKE '%$search%'
                            OR c.kategori_survey LIKE '%$search%'
                            OR b.jenis LIKE '%$search%'
                            )";
            }
        }

        if (isset($orders)) {
            if ($orders != '') {
                $order = $orders;
                $order_column = ['a.kode_survey'];
                $order_clm  = $order_column[$order[0]['column']];
                $order_by   = $order[0]['dir'];
                $where .= " ORDER BY $order_clm $order_by ";
            } else {
                $where .= " ORDER BY a.id ASC ";
            }
        } else {
            $where .= " ORDER BY a.id ASC ";
        }
        if (isset($LIMIT)) {
            if ($LIMIT != '') {
                $where .= ' ' . $LIMIT;
            }
        }
        $index = 1;
        $button = "";
        $fetch = $this->db->query("select a.id,a.kode_survey,a.judul,a.periode_awal,a.periode_akhir,a.poin,a.kuota,a.ketentuan,b.jenis,c.kategori_survey,(SELECT COUNT(id) from survey_member e where e.kode_survey=a.kode_survey) as peserta from survey a join jenis_survey b on a.jenis=b.id join kategori_survey c on a.kategori=c.id $where");
        $fetch2 = $this->db->query("select a.id,a.kode_survey,a.judul,a.periode_akhir,a.periode_akhir,a.poin,a.kuota,a.ketentuan,b.jenis,c.kategori_survey,(SELECT COUNT(id) from survey_member e where e.kode_survey=a.kode_survey) as peserta from survey a join jenis_survey b on a.jenis=b.id join kategori_survey c on a.kategori=c.id ");
        foreach ($fetch->result() as $rows) {
            $sub_array = array();
            $sub_array[] = $index;
            $sub_array[] = "<div class='row'>
            <div class='col-md-12'>".
               formatTanggal($rows->periode_awal) ." ".  formatTanggal($rows->periode_akhir)
            ."</div><div class='col-md-8'>".$rows->judul."</div><div class='col-md-4'><button class='btn btn-sm btn-danger'>Poin <br>".$rows->poin."</button></div>
            <div class='col-md-12'>
                <button class='btn btn-flat btn-md btn-primary'>Daftar</button>
            </div>
        </div>";
            $result[]      = $sub_array;
            $index++;
        }
        $output = array(
            "draw"            =>     intval($this->input->post("draw")),
            "recordsFiltered" =>     $fetch2->num_rows(),
            "data"            =>     $result,

        );
        echo json_encode($output);
    }
}
