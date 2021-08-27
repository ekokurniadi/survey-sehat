<?php

class Publics extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Carousel_model');
        $this->load->library('form_validation');
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
        $cekPeserta = $this->db->get_where('survey_member', array('kode_survey' => $id_survey, 'dapat_poin' => 1))->num_rows();

        $cekKuota = $this->db->get_where('survey', array('kode_survey' => $id_survey))->row();

        if ($cek->num_rows() > 0) {
            $this->db->where('kode_survey', $id_survey);
            $this->db->where('id_user', $id_user);
            $this->db->update('survey_member', array('status' => 1));
            if ($cekPeserta < $cekKuota->kuota) {
                $this->db->where('kode_survey', $id_survey);
                $this->db->where('id_user', $id_user);
                $this->db->update('survey_member', array('dapat_poin' => 1, 'poin' => $cekKuota->poin));
                $this->db->query("UPDATE user set jumlah_poin =jumlah_poin+$cekKuota->poin where id='$id_user'");
                echo json_encode(array(
                    "status" => "sukses",
                    "pesan" => "Terima kasih telah mengikuti survey, poin anda akan ditambahkan",
                    "link" => base_url('publics'),
                ));
            } else {
                echo json_encode(array(
                    "status" => "sukses",
                    "pesan" => "Terima kasih telah mengikuti survey, anda telah melewati maksimal kuota peserta, poin tidak akan ditambahkan.",
                    "link" => base_url('publics'),
                ));
            }
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

    public function input_kuisioner_action()
    {
        $header = [
            "kode_kuisioner" => $_POST['kode_kuisioner'],
            "id_user" => $_POST['session'],
            "id_jawaban" => $_POST['jawaban'],
        ];
        $this->db->insert('kuisioner_member_jawaban', $header);
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
                'link' => base_url('publics/')
            ];
            $this->session->set_flashdata('message', 'Create Record Success');
        }
        echo json_encode($response);
    }

    public function register_action()
    {
        $nama = $this->input->post('namas');
        $email = $this->input->post('emails');
        $no_telp = $this->input->post('no_telp');
        $password = $this->input->post('passwords');
        // $level = $this->input->post('level');

        $cek = $this->db->get_where('user', array('email' => $email));
        if ($cek->num_rows() > 0) {
            $_SESSION['pesan'] = "Email sudah terdaftar, silahkan login";
            $_SESSION['tipe'] = "error";
            redirect(site_url('publics'));
        } else {
            $data = array(
                "nama" => $nama,
                "email" => $email,
                "no_telp" => $no_telp,
                "password" => sha1($password),
                "level" => "user",
                "foto_ktp" => upload_gambar_biasa('foto_ktp', 'image/', 'jpeg|png|jpg|gif|svg|SVG', 10000, 'foto_ktp'),

            );
            $this->db->insert('user', $data);
            $_SESSION['pesan'] = "Registrasi berhasil, silahkan login ke akun anda";
            $_SESSION['tipe'] = "success";
            redirect(site_url('publics'));
        }
    }

    public function updateFotoProfile()
    {
        $filename = $_FILES['foto_profil']['name'];
        $location = "image/" . $filename;
        $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
        $imageFileType = strtolower($imageFileType);
        $valid_extensions = array("jpg", "jpeg", "png");
        $response = array();
        if (in_array(strtolower($imageFileType), $valid_extensions)) {
            /* Upload file */
            if (move_uploaded_file($_FILES['foto_profil']['tmp_name'], $location)) {
                $this->db->where('id', $_SESSION['id']);
                $this->db->update('user', array('foto_profil' => $filename));
                echo json_encode(array(
                    "status"=>200,
                    "data"=>base_url().$location
                ));
            }else{
                echo json_encode(array(
                    "status"=>500,
                    "pesan"=>"Gagal"
                )); 
            }
        }
    }


    public function user_profile()
    {
        $id = $_SESSION['id'];
        $data['data'] = $this->db->get_where('user', array('id' => $id))->row();
        $this->load->view('template/header');
        $this->load->view('template/user_profile', $data);
        $this->load->view('template/footer');
    }

    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('template/carousel');
        $this->load->view('template/kerjakan');
        $this->load->view('template/survey');
        $this->load->view('template/index');
        $this->load->view('template/footer');
    }
    public function perkenalan()
    {
        $this->load->view('template/header');
        $this->load->view('template/perkenalan');
        $this->load->view('template/footer');
    }
    public function pointhadiah()
    {
        $this->load->view('template/header');
        $this->load->view('template/penukaran');
        $this->load->view('template/footer');
    }
    public function laporan_penelitian()
    {
        $this->load->view('template/header');
        $this->load->view('template/laporan_penelitian');
        $this->load->view('template/footer');
    }
    public function faq()
    {
        $this->load->view('template/header');
        $this->load->view('template/carousel');
        $this->load->view('template/faq');
        $this->load->view('template/footer');
    }
    public function contact()
    {
        $this->load->view('template/header');
        $this->load->view('template/contact');
        $this->load->view('template/footer');
    }

    public function saveMessage()
    {
        $header = [
            'kategori' => $_POST['kategori'],
            'pertanyaan' => $_POST['prt'],
            'nama' => $_POST['nama'],
            'email' => $_POST['email'],
            'status' => "Open"
        ];
        $this->db->trans_begin();
        $this->db->insert('faq', $header);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $response = [
                "status" => "ERROR",
                "pesan" => "Terjadi kesalahan"
            ];
        } else {
            $this->db->trans_commit();
            $response = [
                'status' => "sukses",
            ];
            $this->session->set_flashdata('message', 'Create Record Success');
        }
        echo json_encode($response);
    }
    public function saveMessageContact()
    {
        $header = [
            'pertanyaan' => $_POST['tanyaan'],
            'nama' => $_POST['namakamu'],
            'email' => $_POST['ema'],
            'subject' => $_POST['sbj'],
            'status' => "Open"
        ];
        $this->db->trans_begin();
        $this->db->insert('messageContact', $header);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $response = [
                "status" => "ERROR",
                "pesan" => "Terjadi kesalahan"
            ];
        } else {
            $this->db->trans_commit();
            $response = [
                'status' => "sukses",
            ];
            $this->session->set_flashdata('message', 'Create Record Success');
        }
        echo json_encode($response);
    }

    public function kuisioner_vote($id)
    {
        $session = isset($_SESSION['id']) ? $_SESSION['id'] : "";

        if ($session == "") {
            redirect(site_url('publics'));
        } else {
            $data['header'] = $this->db->get_where('kuisioner', array('id' => $id));
            $this->load->view('template/header');
            $this->load->view('template/isi_kuisioner', $data);
            $this->load->view('template/footer');
        }
    }

    public function fetch_data_survey()
    {
        $starts       = $this->input->post("start");
        $length       = $this->input->post("length");
        $LIMIT        = "LIMIT $starts, $length ";
        $draw         = $this->input->post("draw");
        $search       = $this->input->post("search")["value"];
        $orders       = isset($_POST["order"]) ? $_POST["order"] : '';
        $awal         = $this->input->post('awal');
        $akhir         = $this->input->post('akhir');

        $where = "WHERE 1=1";

        if ($awal != "" && $akhir != "") {
            $where .= " AND a.periode_awal AND a.periode_akhir between '$awal' and '$akhir' ";
        }

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
        // log_r($this->db->last_query());
        $fetch2 = $this->db->query("select a.id,a.kode_survey,a.judul,a.periode_akhir,a.periode_akhir,a.poin,a.kuota,a.ketentuan,b.jenis,c.kategori_survey,(SELECT COUNT(id) from survey_member e where e.kode_survey=a.kode_survey) as peserta from survey a join jenis_survey b on a.jenis=b.id join kategori_survey c on a.kategori=c.id ");
        foreach ($fetch->result() as $rows) {
            $id = isset($_SESSION['id']) ? $_SESSION['id'] : "";
            $select = $this->db->query("SELECT * from survey_member where id_user='$id' and kode_survey='$rows->kode_survey'");
            if ($id == "") {
                $button = "<a href='#' class='btn btn-flat btn-primary' data-toggle='modal' data-target='#exampleModal'>Daftar</a>";
            } else {
                if ($select->num_rows() > 0) {
                    $button = "<button class='btn btn-sm btn-danger bg-dark'>Selesai</button>";
                } else {
                    $button = "<a href='" . base_url('publics/survey_register?id=' . $rows->id) . "' class='btn btn-sm btn-primary '>Daftar</a>";
                }
            }
            $sub_array = array();
            $sub_array[] = $index;
            $sub_array[] = "<div class='row'>
            <div class='col-md-12' style='font-weight:bold'>" .
                formatTanggal($rows->periode_awal) . " - " .  formatTanggal($rows->periode_akhir)
                . "</div><div class='col-md-8'>" . $rows->judul . "</div>
                <div class='col-md-4'><button class='btn btn-sm flat btn-danger'>Poin : " . $rows->poin . "</button></div>
                <div class='col-md-12'>&nbsp;</div>
                <div class='col-md-12'>
                   " . $button . "
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

    public function kuisioner_hasil($id)
    {
        $data['header'] = $this->db->get_where('kuisioner', array('id' => $id));
        $this->load->view('template/header');
        $this->load->view('template/grafik_kuisioner', $data);
        $this->load->view('template/footer');
    }

    public function grafikData()
    {
        $id = $this->input->post('id');
        $filter = $this->input->post('filter');
        $where = " where b.id_kuisioner='$id' ";
        if ($filter == "") {
            $where .= "";
        } else {
            $where .= " AND b.id ='$filter' ";
        }
        $data = $this->db->query("select count(a.id_user) as total,b.id,b.jawaban from kuisioner_member_jawaban a join kuisioner_jawaban b on a.id_jawaban=b.id $where GROUP by b.jawaban");
        $count = $this->db->query("select count(a.id_user) as total,b.id,b.jawaban from kuisioner_member_jawaban a join kuisioner_jawaban b on a.id_jawaban=b.id $where");
        $response = array();
        $index = 1;

        foreach ($data->result() as $rows) {

            $sub_array = array();
            $sub_array['urutan'] = $index;
            $sub_array['id'] = $rows->id;
            $sub_array['jawaban'] = $rows->jawaban;
            $sub_array['total'] = $rows->total;
            $sub_array['totalData'] = $count->row()->total;
            $sub_array['percent'] = round(($rows->total / $count->row()->total) * 100);
            $response[] = $sub_array;
            $index++;
        }
        echo json_encode(array(
            "status" => "Sukses",
            "data" => $response
        ));
    }

    public function fetch_data_kuisioner()
    {
        $starts       = $this->input->post("start");
        $length       = $this->input->post("length");
        $LIMIT        = "LIMIT $starts, $length ";
        $draw         = $this->input->post("draw");
        $search       = $this->input->post("search")["value"];
        $orders       = isset($_POST["order"]) ? $_POST["order"] : '';
        $awal         = $this->input->post('awal_k');
        $akhir         = $this->input->post('akhir_k');

        $where = " WHERE 1=1 ";

        if ($awal != "" && $akhir != "") {
            $where .= " AND a.periode_awal AND a.periode_akhir between '$awal' and '$akhir' ";
        }

        // $searchingColumn;
        $result = array();
        if (isset($search)) {
            if ($search != '') {
                $searchingColumn = $search;
                $where .= " AND (a.pertanyaan LIKE '%$search%'
                            
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
        $fetch = $this->db->query("SELECT a.*,b.kategori_survey FROM kuisioner a join kategori_survey b on a.kategori=b.id  $where");
        // log_r($this->db->last_query());
        $fetch2 = $this->db->query("SELECT a.*,b.kategori_survey FROM kuisioner a join kategori_survey b on a.kategori=b.id");
        foreach ($fetch->result() as $rows) {
            $count_penjawab = $this->db->query("SELECT * from kuisioner_member_jawaban where kode_kuisioner='$rows->kode_kuisioner'");
            $id = isset($_SESSION['id']) ? $_SESSION['id'] : "";
            $select = $this->db->query("SELECT * from kuisioner_member_jawaban where id_user='$id' and kode_kuisioner='$rows->kode_kuisioner'");
            if ($id == "") {
                $button = "<a href='#' class='btn btn-flat btn-primary' data-toggle='modal' data-target='#exampleModal'>Vote</a>";
                $button1 = "<a href='#' class='btn btn-flat btn-success' data-toggle='modal' data-target='#exampleModal'>Hasil</a>";
            } else {
                if ($select->num_rows() > 0) {
                    $button = "<a href='#' class='btn btn-sm btn-danger bg-dark'>Selesai</button>";
                    $button1 = "<a href='" . base_url('publics/kuisioner_hasil/' . $rows->id) . "' class='btn btn-sm btn-success '>Hasil</a>";
                } else {
                    $button = "<a href='" . base_url('publics/kuisioner_vote/' . $rows->id) . "' class='btn btn-sm btn-primary '>Vote</a>";
                    $button1 = "<a href='" . base_url('publics/kuisioner_hasil/' . $rows->id) . "' class='btn btn-sm btn-success '>Hasil</a>";
                }
            }

            $sub_array = array();
            $sub_array[] = $index;
            $sub_array[] = "<div class='row'>
            <div class='col-md-12' style='font-weight:bold'>" .
                formatTanggal($rows->periode_awal) . " - " .  formatTanggal($rows->periode_akhir) . "  |  " . $count_penjawab->num_rows() . " Menjawab"
                . "</div>
                <div class='col-md-8'>" . $rows->pertanyaan . "</div>
                <div class='col-md-4'><button class='btn btn-outline-danger btn-sm btn-flat'>" . $rows->kategori_survey . "</button></div>
            <div class='col-md-6'>
                " . $button . "
               " . $button1 . "
            </div>
           <br>
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
    public function fetch_data_penelitian()
    {
        $starts       = $this->input->post("start");
        $length       = $this->input->post("length");
        $LIMIT        = "LIMIT $starts, $length ";
        $draw         = $this->input->post("draw");
        $search       = $this->input->post("search")["value"];
        $orders       = isset($_POST["order"]) ? $_POST["order"] : '';
        $awal         = $this->input->post('awal');
        $akhir         = $this->input->post('akhir');

        $where = " WHERE 1=1 ";

        if ($awal != "" && $akhir != "") {
            $where .= " AND tanggal between '$awal' and '$akhir' ";
        }

        // $searchingColumn;
        $result = array();
        if (isset($search)) {
            if ($search != '') {
                $searchingColumn = $search;
                $where .= " AND (judul LIKE '%$search%')";
            }
        }

        if (isset($orders)) {
            if ($orders != '') {
                $order = $orders;
                $order_column = ['judul'];
                $order_clm  = $order_column[$order[0]['column']];
                $order_by   = $order[0]['dir'];
                $where .= " ORDER BY $order_clm $order_by ";
            } else {
                $where .= " ORDER BY id ASC ";
            }
        } else {
            $where .= " ORDER BY id ASC ";
        }
        if (isset($LIMIT)) {
            if ($LIMIT != '') {
                $where .= ' ' . $LIMIT;
            }
        }
        $index = 1;
        $button = "";
        $fetch = $this->db->query("SELECT * from laporan_penelitian $where");
        // log_r($this->db->last_query());
        $fetch2 = $this->db->query("SELECT * from laporan_penelitian");
        foreach ($fetch->result() as $rows) {
            $sub_array = array();
            $sub_array[] = "<div class='col-md-12 left-lines py-3 mt-2'>
            <div class='row'>
                <div class='col-md-3 news-image'>
                    <img src='" . base_url('image/') . $rows->foto_cover . "' class='img-fluid' alt='gagf'>
                </div>
                <div class='col-md-7 ml-3 text-left'>
                    <h5>" . $rows->judul . "</h5>
                    <p>" . substr($rows->isi, 0, 100) . " ..." . "</p>
                </div>
                <div class='col-md-1 d-flex align-items-end'>
                    <a href='" . base_url('publics/laporan_penelitian_detail/' . $rows->id) . "' type='button' class='btn btn-flat btn-md btn-default btn-readmore'>Detail</a>
                </div>
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

    public function laporan_penelitian_detail($id)
    {
        $data['row'] = $this->db->get_where('laporan_penelitian', array('id' => $id))->row();
        $this->load->view('template/header');
        $this->load->view('template/laporan_penelitian_detail', $data);
        $this->load->view('template/footer');
    }
    public function laporan_berita_detail($id)
    {
        $data['row'] = $this->db->get_where('berita_penelitian', array('id' => $id))->row();
        $this->load->view('template/header');
        $this->load->view('template/laporan_penelitian_detail', $data);
        $this->load->view('template/footer');
    }

    public function laporan_pemberitahuan_detail($id)
    {
        $data['row'] = $this->db->get_where('pengumuman', array('id' => $id))->row();
        $this->load->view('template/header');
        $this->load->view('template/laporan_penelitian_detail', $data);
        $this->load->view('template/footer');
    }

    public function fetch_data_berita()
    {
        $starts       = $this->input->post("start");
        $length       = $this->input->post("length");
        $LIMIT        = "LIMIT $starts, $length ";
        $draw         = $this->input->post("draw");
        $search       = $this->input->post("search")["value"];
        $orders       = isset($_POST["order"]) ? $_POST["order"] : '';
        $awal         = $this->input->post('awal');
        $akhir         = $this->input->post('akhir');

        $where = " WHERE 1=1 ";

        if ($awal != "" && $akhir != "") {
            $where .= " AND tanggal between '$awal' and '$akhir' ";
        }

        // $searchingColumn;
        $result = array();
        if (isset($search)) {
            if ($search != '') {
                $searchingColumn = $search;
                $where .= " AND (judul LIKE '%$search%')";
            }
        }

        if (isset($orders)) {
            if ($orders != '') {
                $order = $orders;
                $order_column = ['judul'];
                $order_clm  = $order_column[$order[0]['column']];
                $order_by   = $order[0]['dir'];
                $where .= " ORDER BY $order_clm $order_by ";
            } else {
                $where .= " ORDER BY id ASC ";
            }
        } else {
            $where .= " ORDER BY id ASC ";
        }
        if (isset($LIMIT)) {
            if ($LIMIT != '') {
                $where .= ' ' . $LIMIT;
            }
        }
        $index = 1;
        $button = "";
        $fetch = $this->db->query("SELECT * from berita_penelitian $where");
        // log_r($this->db->last_query());
        $fetch2 = $this->db->query("SELECT * from berita_penelitian");
        foreach ($fetch->result() as $rows) {
            $sub_array = array();
            $sub_array[] = "<div class='col-md-12 left-lines py-3 mt-2'>
            <div class='row'>
                <div class='col-md-3 news-image'>
                    <img src='" . base_url('image/') . $rows->foto_cover . "' class='img-fluid' alt='gagf'>
                </div>
                <div class='col-md-7 ml-3 text-left'>
                    <h5>" . $rows->judul . "</h5>
                    <p>" . substr($rows->isi, 0, 100) . " ..." . "</p>
                </div>
                <div class='col-md-1 d-flex align-items-end'>
                    <a href='" . base_url('publics/laporan_berita_detail/' . $rows->id) . "' type='button' class='btn btn-flat btn-md btn-default btn-readmore'>Detail</a>
                </div>
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
    public function fetch_data_pengumuman()
    {
        $starts       = $this->input->post("start");
        $length       = $this->input->post("length");
        $LIMIT        = "LIMIT $starts, $length ";
        $draw         = $this->input->post("draw");
        $search       = $this->input->post("search")["value"];
        $orders       = isset($_POST["order"]) ? $_POST["order"] : '';
        $awal         = $this->input->post('awal');
        $akhir         = $this->input->post('akhir');

        $where = " WHERE 1=1 ";

        if ($awal != "" && $akhir != "") {
            $where .= " AND tanggal between '$awal' and '$akhir' ";
        }

        // $searchingColumn;
        $result = array();
        if (isset($search)) {
            if ($search != '') {
                $searchingColumn = $search;
                $where .= " AND (judul LIKE '%$search%')";
            }
        }

        if (isset($orders)) {
            if ($orders != '') {
                $order = $orders;
                $order_column = ['judul'];
                $order_clm  = $order_column[$order[0]['column']];
                $order_by   = $order[0]['dir'];
                $where .= " ORDER BY $order_clm $order_by ";
            } else {
                $where .= " ORDER BY id ASC ";
            }
        } else {
            $where .= " ORDER BY id ASC ";
        }
        if (isset($LIMIT)) {
            if ($LIMIT != '') {
                $where .= ' ' . $LIMIT;
            }
        }
        $index = 1;
        $button = "";
        $fetch = $this->db->query("SELECT * from pengumuman $where");
        // log_r($this->db->last_query());
        $fetch2 = $this->db->query("SELECT * from pengumuman");
        foreach ($fetch->result() as $rows) {
            $sub_array = array();
            $sub_array[] = "<div class='col-md-12 left-lines py-3 mt-2'>
            <div class='row'>
                <div class='col-md-3 news-image'>
                    <img src='" . base_url('image/') . $rows->foto_cover . "' class='img-fluid' alt='gagf'>
                </div>
                <div class='col-md-7 ml-3 text-left'>
                    <h5>" . $rows->judul . "</h5>
                    <p>" . substr($rows->isi, 0, 100) . " ..." . "</p>
                </div>
                <div class='col-md-1 d-flex align-items-end'>
                    <a href='" . base_url('publics/laporan_pemberitahuan_detail/' . $rows->id) . "' type='button' class='btn btn-flat btn-md btn-default btn-readmore'>Detail</a>
                </div>
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
