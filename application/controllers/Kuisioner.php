<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kuisioner extends MY_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Kuisioner_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $kuisioner = $this->Kuisioner_model->get_all();

        $data = array(
            'kuisioner_data' => $kuisioner
        );
        $this->load->view('panel/header');
        $this->load->view('kuisioner_list', $data);
        $this->load->view('panel/footer');
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

    public function fetch_data()
    {
        $starts       = $this->input->post("start");
        $length       = $this->input->post("length");
        $LIMIT        = "LIMIT $starts, $length ";
        $draw         = $this->input->post("draw");
        $search       = $this->input->post("search")["value"];
        $orders       = isset($_POST["order"]) ? $_POST["order"] : '';

        $where = "WHERE 1=1";
        $result = array();
        if (isset($search)) {
            if ($search != '') {
                $where .= " AND (a.kode_kuisioner LIKE '%$search%'
                OR b.kategori_survey LIKE '%$search%'
                OR a.pertanyaan LIKE '%$search%'
                OR a.periode_awal LIKE '%$search%'
                OR a.periode_akhir LIKE '%$search%'
                )";
            }
        }

        if (isset($orders)) {
            if ($orders != '') {
                $order = $orders;
                $order_column = ['a.kode_kuisioner', 'b.kategori_survey', 'a.pertanyaan', 'a.periode_awal', 'a.periode_akhir',];
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
        $fetch = $this->db->query("SELECT a.id,a.kode_kuisioner,a.pertanyaan,a.periode_awal,a.periode_akhir,b.kategori_survey
         from kuisioner a join kategori_survey b on a.kategori=b.id $where");
        $fetch2 = $this->db->query("SELECT * from kuisioner ");
        foreach ($fetch->result() as $rows) {
            $button1 = "<a href=" . base_url('kuisioner/read/' . $rows->id) . " class='btn btn-icon icon-left btn-light'><i class='fa fa-eye'></i></a>";
            $button2 = "<a href=" . base_url('kuisioner/update/' . $rows->id) . " class='btn btn-icon icon-left btn-warning'><i class='fa fa-pencil-square-o'></i></a>";
            $button3 = "<a href=" . base_url('kuisioner/delete/' . $rows->id) . " class='btn btn-icon icon-left btn-danger' onclick='javasciprt: return confirm(\"Are You Sure ?\")''><i class='fa fa-trash'></i></a>";
            $sub_array = array();
            $sub_array[] = $index;
            $sub_array[] = $rows->kode_kuisioner;
            $sub_array[] = $rows->kategori_survey;
            $sub_array[] = $rows->pertanyaan;
            $sub_array[] = formatTanggal($rows->periode_awal);
            $sub_array[] = formatTanggal($rows->periode_akhir);
            $sub_array[] = $button1 . " " . $button2 . " " . $button3;
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



    public function upload_kuisioner_action()
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
                    $cek = $this->db->get_where('kuisioner', array('pertanyaan' => $rows['B'], 'periode_awal' => $rows['C'], 'periode_akhir' => $rows['D']));
                    $kode = $this->acak(10);
                    $data = array(
                        "kode_kuisioner" => $kode,
                        "pertanyaan" => $rows['B'],
                        "kategori" => 1,
                        "periode_awal" => $rows['C'],
                        "periode_akhir" => $rows['D'],
                    );


                    if ($cek->num_rows() <= 0) {
                        $this->db->insert('kuisioner', $data);
                    }

                    $cekJudul = $this->db->query("SELECT kode_kuisioner,pertanyaan,periode_awal,periode_akhir from kuisioner where pertanyaan='{$rows['B']}' and periode_awal='{$rows['C']}' and periode_akhir='{$rows['D']}'");
                    if ($cekJudul->row()->pertanyaan == $rows['B']) {
                        $key = $cekJudul->row()->kode_kuisioner;
                        $detail = array(
                            "id_kuisioner" => $key,
                            "jawaban" => $rows['E'],
                        );
                        $insert = $this->db->insert('kuisioner_jawaban', $detail);
                    }
                }
                if ($insert) {
                    echo json_encode(array("status" => "sukses", "link" => base_url('kuisioner')));
                    $_SESSION['pesan'] = "Data Berhasil di Upload.";
                    $_SESSION['tipe'] = "success";
                } else {
                    echo json_encode(array("status" => "error", "link" => base_url('kuisioner')));
                    $_SESSION['pesan'] = "Data Gagal di Upload.";
                    $_SESSION['tipe'] = "error";
                }
            }
        }
    }


    public function read($id)
    {
        $row = $this->Kuisioner_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => '',
                'action' => site_url('kuisioner/update_action'),
                'id' => set_value('id', $row->id),
                'mode' => 'read',
                'kode_kuisioner' => set_value('kode_kuisioner', $row->kode_kuisioner),
                'kategori' => set_value('kategori', $row->kategori),
                'pertanyaan' => set_value('pertanyaan', $row->pertanyaan),
                'periode_awal' => set_value('periode_awal', $row->periode_awal),
                'periode_akhir' => set_value('periode_akhir', $row->periode_akhir),
            );
            $this->load->view('panel/header');
            $this->load->view('kuisioner_form', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kuisioner'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kuisioner/create_action'),
            'id' => set_value('id'),
            'mode' => 'create',
            'kode_kuisioner' => set_value('kode_kuisioner', $this->acak(11)),
            'kategori' => set_value('kategori'),
            'pertanyaan' => set_value('pertanyaan'),
            'periode_awal' => set_value('periode_awal'),
            'periode_akhir' => set_value('periode_akhir'),
        );

        $this->load->view('panel/header');
        $this->load->view('kuisioner_form', $data);
        $this->load->view('panel/footer');
    }

    public function create_action()
    {
        $header = [
            'kode_kuisioner' => $this->input->post('kode_kuisioner'),
            'kategori' => $this->input->post('kategori'),
            'pertanyaan' => $this->input->post('pertanyaan'),
            'periode_awal' => $this->input->post('periode_awal'),
            'periode_akhir' => $this->input->post('periode_akhir'),
        ];
        $details = $this->input->post('detail');
        foreach ($details as $rows) {
            $insert[] = [
                "id_kuisioner" => $this->input->post('kode_kuisioner'),
                "jawaban" => $rows['jawaban'],
            ];
        }
        $this->db->trans_begin();
        $this->db->insert('kuisioner', $header);
        $this->db->insert_batch('kuisioner_jawaban', $insert);
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
                'link' => base_url('kuisioner')
            ];
            $this->session->set_flashdata('message', 'Create Record Success');
        }
        echo json_encode($response);
    }

    public function update($id)
    {
        $row = $this->Kuisioner_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kuisioner/update_action'),
                'id' => set_value('id', $row->id),
                'mode' => 'edit',
                'kode_kuisioner' => set_value('kode_kuisioner', $row->kode_kuisioner),
                'kategori' => set_value('kategori', $row->kategori),
                'pertanyaan' => set_value('pertanyaan', $row->pertanyaan),
                'periode_awal' => set_value('periode_awal', $row->periode_awal),
                'periode_akhir' => set_value('periode_akhir', $row->periode_akhir),
            );
            $this->load->view('panel/header');
            $this->load->view('kuisioner_form', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kuisioner'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'kode_kuisioner' => $this->input->post('kode_kuisioner', TRUE),
                'kategori' => $this->input->post('kategori', TRUE),
                'pertanyaan' => $this->input->post('pertanyaan', TRUE),
                'periode_awal' => $this->input->post('periode_awal', TRUE),
                'periode_akhir' => $this->input->post('periode_akhir', TRUE),
            );

            $this->Kuisioner_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kuisioner'));
        }
    }

    public function delete($id)
    {
        $row = $this->Kuisioner_model->get_by_id($id);

        if ($row) {
            $this->Kuisioner_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kuisioner'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kuisioner'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kode_kuisioner', 'kode kuisioner', 'trim|required');
        $this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
        $this->form_validation->set_rules('pertanyaan', 'pertanyaan', 'trim|required');
        $this->form_validation->set_rules('periode_awal', 'periode awal', 'trim|required');
        $this->form_validation->set_rules('periode_akhir', 'periode akhir', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Kuisioner.php */
/* Location: ./application/controllers/Kuisioner.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-10 21:28:01 */
/* http://harviacode.com */