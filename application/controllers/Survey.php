<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Survey extends MY_Controller
{

    // protected $access = array('Admin', 'Pimpinan','Finance');

    function __construct()
    {
        parent::__construct();
        $this->load->model('Survey_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $survey = $this->Survey_model->get_all();

        $data = array(
            'survey_data' => $survey
        );
        $this->load->view('panel/header');
        $this->load->view('survey_list', $data);
        $this->load->view('panel/footer');
    }

    public function fetch_data()
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
            $button1 = "<a href=" . base_url('survey/read/' . $rows->id) . " class='btn btn-icon icon-left btn-light'><i class='fa fa-eye'></i> View</a>";
            $button2 = "<a href=" . base_url('survey/update/' . $rows->id) . " class='btn btn-icon icon-left btn-warning'><i class='fa fa-pencil-square-o'></i> Edit</a>";
            $button3 = "<a href=" . base_url('survey/delete/' . $rows->id) . " class='btn btn-icon icon-left btn-danger' onclick='javasciprt: return confirm(\"Are You Sure ?\")''><i class='fa fa-trash'></i> Delete</a>";
            if ($rows->jenis != "Survey Public") {
                $button = "<a href=" . base_url('survey/pilih/' . $rows->id) . " class='btn btn-icon icon-left btn-info''><i class='fa fa-user'></i> Add User</a>";
            } else {
                $button = "";
            }
            $sub_array = array();
            $sub_array[] = $index;
            $sub_array[] = $rows->kode_survey;
            $sub_array[] = $rows->judul;
            $sub_array[] = $rows->jenis;
            $sub_array[] = $rows->kategori_survey;
            $sub_array[] = formatTanggal($rows->periode_awal) . " s/d " . formatTanggal($rows->periode_akhir);
            $sub_array[] = $rows->poin;
            $sub_array[] = $rows->peserta;
            // $sub_array[] = $rows->ketentuan;
            $sub_array[] = $button1 . " " . $button2 . " " . $button3 . " " . $button;
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
    public function fetch_data_user()
    {
        $starts       = $this->input->post("start");
        $length       = $this->input->post("length");
        $LIMIT        = "LIMIT $starts, $length ";
        $draw         = $this->input->post("draw");
        $search       = $this->input->post("search")["value"];
        $orders       = isset($_POST["order"]) ? $_POST["order"] : '';
        $kode         = $this->input->post('kode');

        $where = "WHERE 1=1 and a.status=0 ";
        // $searchingColumn;
        $result = array();
        if (isset($search)) {
            if ($search != '') {
                $searchingColumn = $search;
                $where .= " AND (a.nama LIKE '%$search%'
                            OR a.email LIKE '%$search%'
                            OR b.pekerjaan LIKE '%$search%'
                            OR a.jenis_kelamin LIKE '%$search%'
                            )";
            }
        }

        if (isset($orders)) {
            if ($orders != '') {
                $order = $orders;
                $order_column = ['a.nama'];
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
        $fetch = $this->db->query("SELECT a.id,a.nama,a.email,if(a.jenis_kelamin = 0,'Laki-laki','Perempuan') as jenis_kelamin,b.pekerjaan,a.status from user a join master_pekerjaan b on a.pekerjaan=b.id $where");
        $fetch2 = $this->db->query("SELECT a.id,a.nama,a.email,if(a.jenis_kelamin = 0,'Laki-laki','Perempuan') as jenis_kelamin,b.pekerjaan,a.status from user a join master_pekerjaan b on a.pekerjaan=b.id");
        foreach ($fetch->result() as $rows) {


            $sub_array = array();
            $sub_array[] = $index;
            $sub_array[] = $rows->nama;
            $sub_array[] = $rows->email;
            $sub_array[] = $rows->jenis_kelamin;
            $sub_array[] = $rows->pekerjaan;
            $sub_array[] = $this->load->view('action', [
                'id_user' => $rows->id,
                'kode' => $kode
            ], true);
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

    public function getUser()
    {
        $kode_survey = $this->input->post('id');
        $user = $this->db->get_where('survey_pilihan_user', array('kode_survey' => $kode_survey));
        $result = array();
        foreach ($user->result() as $rows) {
            array_push($result, array(
                "id" => $rows->id
            ));
        }
        if ($user->num_rows() > 0) {
            echo json_encode(array(
                "status" => "sukses",
                "data" => $result
            ));
        } else {
            echo json_encode(array(
                "status" => "error",
                "pesan" => "Data tidak ditemukan"
            ));
        }
    }


    public function checkall()
    {
        $this->fetch_data_user();

        $parts_filter = $this->db->get()->result();
        $parts_filter = array_map(function ($rows) {
            return $rows->id;
        }, $parts_filter);
    }

    public function pilih($id)
    {
        $row = $this->Survey_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => '',
                'action' => site_url('survey/update_action'),
                'mode' => 'read',
                'id' => set_value('id', $row->id),
                'kode_survey' => set_value('kode_survey', $row->kode_survey),
                'judul' => set_value('judul', $row->judul),
                'jenis' => set_value('jenis', $row->jenis),
                'kategori' => set_value('kategori', $row->kategori),
                'periode_awal' => set_value('periode_awal', $row->periode_awal),
                'periode_akhir' => set_value('periode_akhir', $row->periode_akhir),
                'poin' => set_value('poin', $row->poin),
                'kuota' => set_value('kuota', $row->kuota),
                'ketentuan' => set_value('ketentuan', $row->ketentuan),
            );
            $this->load->view('panel/header');
            $this->load->view('survey_pilih', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('survey'));
        }
    }

    public function read($id)
    {
        $row = $this->Survey_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => '',
                'action' => site_url('survey/update_action'),
                'mode' => 'read',
                'id' => set_value('id', $row->id),
                'kode_survey' => set_value('kode_survey', $row->kode_survey),
                'judul' => set_value('judul', $row->judul),
                'jenis' => set_value('jenis', $row->jenis),
                'kategori' => set_value('kategori', $row->kategori),
                'periode_awal' => set_value('periode_awal', $row->periode_awal),
                'periode_akhir' => set_value('periode_akhir', $row->periode_akhir),
                'poin' => set_value('poin', $row->poin),
                'kuota' => set_value('kuota', $row->kuota),
                'ketentuan' => set_value('ketentuan', $row->ketentuan),
            );
            $this->load->view('panel/header');
            $this->load->view('survey_form', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('survey'));
        }
    }

    function acak($panjang)
    {
        $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
        $string = '';
        for ($i = 0; $i < $panjang; $i++) {
            $pos = rand(0, strlen($karakter) - 1);
            $string .= $karakter{
                $pos};
        }
        return $string;
    }

    function acak2($panjang)
    {
        $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
        $string = '';
        for ($i = 0; $i < $panjang; $i++) {
            $pos = rand(0, strlen($karakter) - 1);
            $string .= $karakter{
                $pos};
        }
        echo json_encode(array("data" => $string));
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('survey/create_action'),
            'mode' => "create",
            'id' => set_value('id'),
            'kode_survey' => set_value('kode_survey', $this->acak(10)),
            'judul' => set_value('judul'),
            'jenis' => set_value('jenis'),
            'kategori' => set_value('kategori'),
            'periode_awal' => set_value('periode_awal'),
            'periode_akhir' => set_value('periode_akhir'),
            'poin' => set_value('poin'),
            'kuota' => set_value('kuota'),
            'ketentuan' => set_value('ketentuan'),
        );

        $this->load->view('panel/header');
        $this->load->view('survey_form', $data);
        $this->load->view('panel/footer');
    }

    public function create_action()
    {

        $header = [
            'kode_survey' => $_POST['kode_survey'],
            'judul' => $_POST['judul'],
            'jenis' => $_POST['jenis'],
            'kategori' => $_POST['kategori'],
            'periode_awal' => $_POST['periode_awal'],
            'periode_akhir' => $_POST['periode_akhir'],
            'poin' => $_POST['poin'],
            'ketentuan' => $_POST['ketentuan'],
        ];

        $this->db->trans_begin();
        $this->db->insert('survey', $header);
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
                'link' => base_url('survey')
            ];
            $this->session->set_flashdata('message', 'Create Record Success');
        }
        echo json_encode($response);
    }


    public function addDetails()
    {
        $insert = [
            "kode_survey" => $_POST['kode_survey'],
            "pertanyaan" => $_POST['pertanyaan'],
            "jawaban_1" => $_POST['jawaban_1'],
            "jawaban_2" => $_POST['jawaban_2'],
            "jawaban_3" => $_POST['jawaban_3'],
            "jawaban_4" => $_POST['jawaban_4'],
            "jawaban_5" => $_POST['jawaban_5'],
        ];

        $this->db->trans_begin();
        $this->db->insert('survey_pertanyaan', $insert);
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
        }
        echo json_encode($response);
    }

    public function loadData()
    {
        $id = $this->input->post('id');
        echo " <table class='table table-bordered'>
        <thead>
                    <tr>
                     <th>No</th>
                    <th>Pertanyaan</th>
                    <th>Jawaban 1</th>
                    <th>Jawaban 2</th>
                    <th>Jawaban 3</th>
                    <th>Jawaban 4</th>
                    <th>Jawaban 5</th>
                    <th>Aksi</th>
                    </tr>
            </thead>";
        $no = 1;
        $data = $this->db->get_where('survey_pertanyaan', array('kode_survey' => $id))->result();
        foreach ($data as $d) {
            echo "<tr id='dataku$d->id'>
                                <td>$no</td>
                                <td>$d->pertanyaan</td>
                                <td>$d->jawaban_1</td>
                                <td>$d->jawaban_2</td>
                                <td>$d->jawaban_3</td>
                                <td>$d->jawaban_4</td>
                                <td>$d->jawaban_5</td>
                                <td><button type='button' class='btn btn-danger btn-sm' onClick='hapus($d->id)'><span class='fa fa-trash'><span></button></td>
                             </tr>";
            $no++;
        }

        echo "</table>";
    }
    public function loadDataUser()
    {
        $id = $this->input->post('id');
        echo " <table class='table table-bordered'>
        <thead>
                    <tr>
                    <th style='background-color:white;'>No</th>
                    <th style='background-color:white;'>Nama</th>
                    <th style='background-color:white;'>Email</th>
                    <th style='background-color:white;'>Jenis Kelamin</th>
                    <th style='background-color:white;'>Pekerjaan</th>
                    <th style='background-color:white;'>Aksi</th>
                    </tr>
            </thead>";
        $no = 1;
        $data = $this->db->query("SELECT * FROM survey_pilihan_user where kode_survey='$id' and id_user !=0")->result();
        foreach ($data as $d) {
            $user = $this->db->get_where('user', array('id' => $d->id_user))->row();
            $pekerjaan = $this->db->get_where('master_pekerjaan', array('id' => $user->pekerjaan))->row();
            $jk = $user->jenis_kelamin == 0 ? 'Laki-laki' : 'Perempuan';
            echo "<tr id='dataku$d->id'>
                                <td>$no</td>
                                <td>$user->nama</td>
                                <td>$user->email</td>
                                <td>$jk</td>
                                <td>$pekerjaan->pekerjaan</td>
                                <td><button type='button' class='btn btn-danger btn-sm' onClick='hapus($d->id,$d->id_user)'><span class='fa fa-trash'><span></button></td>
                             </tr>";
            $no++;
        }

        echo "</table>";
    }

    public function input_user()
    {
        $header = $_POST['data'];
        $id     = $_POST['id_survey'];
        $kuota  = (int)$_POST['kuota'];
        $data = array();
        $data2 = array();
        $sub_array = array();
        $sub_array2 = array();
        foreach ($header as $key => $values) {
            $data = array(
                "kode_survey" => $id,
                "id_user" => $values
            );
            $data2=array(
                "jenis"=>4,
                "dari"=>$values,
                "pesan"=>"Selamat anda terpilih untuk mengikuti survey dari kami.",
                "status"=>0,
                "created_at"=>date('Y-m-d H:i:s'),
                "deleted"=>0,
                "link"=>"publics/surveypilihan",
                "id_user"=>0
            );
            $sub_array[] = $data;
            $sub_array2[]=$data2;
        }



        // $this->db->where('kode_survey', $id);
        // $this->db->delete('survey_pilihan_user');

        $cek = $this->db->get_where('survey_pilihan_user', array('kode_survey' => $id));
        if ($cek->num_rows() < $kuota) {
            $this->db->where('kode_survey', $id);
            $this->db->delete('survey_pilihan_user');
            $insert = $this->db->insert_batch('survey_pilihan_user', $sub_array);
            $insert2 = $this->db->insert_batch('notifikasi', $sub_array2);
            $this->db->query('DELETE FROM survey_pilihan_user where id_user=0');

            $response = [
                "status" => "Success",
                "Pesan" => $data,
            ];
        } else {
            $response = [
                "status" => "error",
                "Pesan" => "Telah melewati batas",

            ];
        }

        echo json_encode($response);
    }

    public function hapusData()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $delete =  $this->db->delete('survey_pilihan_user');
        if ($delete) {
            $response = [
                "status" => "success",

            ];
        } else {
            $response = [
                "status" => "ERROR",

            ];
        }
        echo json_encode($response);
    }

    public function update($id)
    {
        $row = $this->Survey_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('survey/update_action'),
                'mode' => 'edit',
                'id' => set_value('id', $row->id),
                'kode_survey' => set_value('kode_survey', $row->kode_survey),
                'judul' => set_value('judul', $row->judul),
                'jenis' => set_value('jenis', $row->jenis),
                'kategori' => set_value('kategori', $row->kategori),
                'periode_awal' => set_value('periode_awal', $row->periode_awal),
                'periode_akhir' => set_value('periode_akhir', $row->periode_akhir),
                'poin' => set_value('poin', $row->poin),
                'kuota' => set_value('kuota', $row->kuota),
                'ketentuan' => set_value('ketentuan', $row->ketentuan),
            );
            $this->load->view('panel/header');
            $this->load->view('survey_form', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('survey'));
        }
    }

    public function upload_survey_action()
    {
        date_default_timezone_set('Asia/Jakarta');
        $filename = $_FILES['userfile']['name'];
        $this->load->library('upload');
        $nmfile = "home" . time();
        $config['upload_path']   = './excel/';
        $config['overwrite']     = true;
        $config['allowed_types'] = 'xlsx';
        $config['file_name'] = $_FILES['userfile']['name'];

        $this->upload->initialize($config);

        if ($_FILES['userfile']['name']) {
            if ($this->upload->do_upload('userfile')) {
                $gbr = $this->upload->data();
                include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

                $excelreader = new PHPExcel_Reader_Excel2007();
                $loadexcel = $excelreader->load('excel/' . $filename . '');
                $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
                unset($sheet[1]);


                foreach ($sheet as $rows) {
                    $cek = $this->db->get_where('survey', array('judul' => $rows['B']));
                    $kode = $this->acak(10);
                    $data = array(
                        "kode_survey" => $kode,
                        "judul" => $rows['B'],
                        "jenis" => 2,
                        "kategori" => 1,
                        "periode_awal" => $rows['C'],
                        "periode_akhir" => $rows['D'],
                        "poin" => $rows['E'] == "" ? 0 : $rows['E'],
                        "kuota" => $rows['F'] == "" ? 0 : $rows['F'],
                        "ketentuan" => $rows['G'] == "" ? "" : $rows['G'],
                    );


                    if ($cek->num_rows() <= 0) {
                        $this->db->insert('survey', $data);
                    }

                    $cekJudul = $this->db->query("SELECT kode_survey,judul from survey where judul='{$rows['B']}'");
                    if ($cekJudul->row()->judul == $rows['B']) {
                        $key = $cekJudul->row()->kode_survey;
                        $detail = array(
                            "kode_survey" => $key,
                            "pertanyaan" => $rows['H'],
                            "jawaban_1" => $rows['I'],
                            "jawaban_2" => $rows['J'],
                            "jawaban_3" => $rows['K'],
                            "jawaban_4" => $rows['L'],
                            "jawaban_5" => $rows['M'],
                        );
                        $insert = $this->db->insert('survey_pertanyaan', $detail);
                    }
                }
                if ($insert) {
                    echo json_encode(array("status" => "sukses", "link" => base_url('survey')));
                    $_SESSION['pesan'] = "Data Berhasil di Upload.";
                    $_SESSION['tipe'] = "success";
                } else {
                    echo json_encode(array("status" => "error", "link" => base_url('survey')));
                    $_SESSION['pesan'] = "Data Gagal di Upload.";
                    $_SESSION['tipe'] = "error";
                }
            }
        }
    }

    public function update_action()
    {
        $id = $this->input->post('id');
        $header = [
            'kode_survey' => $_POST['kode_survey'],
            'judul' => $_POST['judul'],
            'jenis' => $_POST['jenis'],
            'kategori' => $_POST['kategori'],
            'periode_awal' => $_POST['periode_awal'],
            'periode_akhir' => $_POST['periode_akhir'],
            'poin' => $_POST['poin'],
            'ketentuan' => $_POST['ketentuan'],
        ];

        $this->db->trans_begin();
        $this->db->where('id', $id);
        $this->db->update('survey', $header);
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
                'link' => base_url('survey')
            ];
            $this->session->set_flashdata('message', 'Create Record Success');
        }
        echo json_encode($response);
    }

    public function delete($id)
    {
        $row = $this->Survey_model->get_by_id($id);

        if ($row) {
            $this->Survey_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('survey'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('survey'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kode_survey', 'kode survey', 'trim|required');
        $this->form_validation->set_rules('judul', 'judul', 'trim|required');
        $this->form_validation->set_rules('jenis', 'jenis', 'trim|required');
        $this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
        $this->form_validation->set_rules('periode_awal', 'periode awal', 'trim|required');
        $this->form_validation->set_rules('periode_akhir', 'periode akhir', 'trim|required');
        $this->form_validation->set_rules('poin', 'poin', 'trim|required');
        $this->form_validation->set_rules('kuota', 'kuota', 'trim|required');
        $this->form_validation->set_rules('ketentuan', 'ketentuan', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Survey.php */
/* Location: ./application/controllers/Survey.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-07 09:08:49 */
/* http://harviacode.com */