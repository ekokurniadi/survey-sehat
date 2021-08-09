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
        $fetch = $this->db->query("select a.id,a.kode_survey,a.judul,a.periode_awal,a.periode_akhir,a.poin,a.kuota,a.ketentuan,b.jenis,c.kategori_survey,(SELECT COUNT(id) from survey_member e where e.kode_survey=a.id) as peserta from survey a join jenis_survey b on a.jenis=b.id join kategori_survey c on a.kategori=c.id $where");
        $fetch2 = $this->db->query("select a.id,a.kode_survey,a.judul,a.periode_akhir,a.periode_akhir,a.poin,a.kuota,a.ketentuan,b.jenis,c.kategori_survey,(SELECT COUNT(id) from survey_member e where e.kode_survey=a.id) as peserta from survey a join jenis_survey b on a.jenis=b.id join kategori_survey c on a.kategori=c.id ");
        foreach ($fetch->result() as $rows) {
            $button1 = "<a href=" . base_url('survey/read/' . $rows->id) . " class='btn btn-icon icon-left btn-light'><i class='fa fa-eye'></i></a>";
            $button2 = "<a href=" . base_url('survey/update/' . $rows->id) . " class='btn btn-icon icon-left btn-warning'><i class='fa fa-pencil-square-o'></i></a>";
            $button3 = "<a href=" . base_url('survey/delete/' . $rows->id) . " class='btn btn-icon icon-left btn-danger' onclick='javasciprt: return confirm(\"Are You Sure ?\")''><i class='fa fa-trash'></i></a>";
            $sub_array = array();
            $sub_array[] = $index;
            $sub_array[] = $rows->kode_survey;
            $sub_array[] = $rows->judul;
            $sub_array[] = formatTanggal($rows->periode_awal) . " s/d " . formatTanggal($rows->periode_akhir);
            $sub_array[] = $rows->poin;
            $sub_array[] = $rows->judul;
            $sub_array[] = $rows->jenis;
            $sub_array[] = $rows->kategori_survey;
            $sub_array[] = $rows->peserta;
            $sub_array[] = $rows->ketentuan;
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

    public function read($id)
    {
        $row = $this->Survey_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'kode_survey' => $row->kode_survey,
                'judul' => $row->judul,
                'jenis' => $row->jenis,
                'kategori' => $row->kategori,
                'periode_awal' => $row->periode_awal,
                'periode_akhir' => $row->periode_akhir,
                'poin' => $row->poin,
                'ketentuan' => $row->ketentuan,
            );
            $this->load->view('panel/header');
            $this->load->view('survey_read', $data);
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
            $string .= $karakter{$pos};
        }
        return $string;
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('survey/create_action'),
            'mode' => "create",
            'id' => set_value('id'),
            'kode_survey' => set_value('kode_survey',$this->acak(10)),
            'judul' => set_value('judul'),
            'jenis' => set_value('jenis'),
            'kategori' => set_value('kategori'),
            'periode_awal' => set_value('periode_awal'),
            'periode_akhir' => set_value('periode_akhir'),
            'poin' => set_value('poin'),
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
        $detail = $_POST['soal'];
        foreach($detail as $dt){
            $insert[]=[
                'kode_survey'=>$_POST['kode_survey'],
                'pertanyaan'=>$dt['pertanyaan'],
                'jawaban_1'=>$dt['jawaban_1'],
                'jawaban_2'=>$dt['jawaban_2'],
                'jawaban_3'=>$dt['jawaban_3'],
                'jawaban_4'=>$dt['jawaban_4'],
            ];
        }
        $this->db->trans_begin();
        $this->db->insert('survey',$header);
        $this->db->insert_batch('survey_pertanyaan', $insert);
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $response = [
                "status" => "ERROR",
                "pesan"=>"Terjadi kesalahan"
            ];
        }else{
            $this->db->trans_commit();
            $response = [
                'status' => "sukses",
                'link' => base_url('survey')
            ];
            $this->session->set_flashdata('message', 'Create Record Success');
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
                'mode'=>'edit',
                'id' => set_value('id', $row->id),
                'kode_survey' => set_value('kode_survey', $row->kode_survey),
                'judul' => set_value('judul', $row->judul),
                'jenis' => set_value('jenis', $row->jenis),
                'kategori' => set_value('kategori', $row->kategori),
                'periode_awal' => set_value('periode_awal', $row->periode_awal),
                'periode_akhir' => set_value('periode_akhir', $row->periode_akhir),
                'poin' => set_value('poin', $row->poin),
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
        $this->db->where('kode_survey',$_POST['kode_survey']);
        $this->db->delete('survey_pertanyaan');
        $detail = $_POST['soal'];
        foreach($detail as $dt){
            $insert[]=[
                'kode_survey'=>$_POST['kode_survey'],
                'pertanyaan'=>$dt['pertanyaan'],
                'jawaban_1'=>$dt['jawaban_1'],
                'jawaban_2'=>$dt['jawaban_2'],
                'jawaban_3'=>$dt['jawaban_3'],
                'jawaban_4'=>$dt['jawaban_4'],
            ];
        }
        $this->db->trans_begin();
        $this->db->where('id', $id);
        $this->db->update('survey', $header);
        $this->db->insert_batch('survey_pertanyaan', $insert);
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $response = [
                "status" => "ERROR",
                "pesan"=>"Terjadi kesalahan"
            ];
        }else{
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