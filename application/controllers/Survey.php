<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Survey extends MY_Controller {

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

    public function fetch_data(){
    $starts       = $this->input->post("start");
    $length       = $this->input->post("length");
    $LIMIT        = "LIMIT $starts, $length ";
    $draw         = $this->input->post("draw");
    $search       = $this->input->post("search")["value"];
    $orders       = isset($_POST["order"]) ? $_POST["order"] : ''; 
    
    $where ="WHERE 1=1";
    $searchingColumn;
    $result=array();
    if (isset($search)) {
      if ($search != '') {
         $searchingColumn = $search;
            $where .= " AND (reg_name LIKE '%$search%'
                            OR reg_code LIKE '%$search%'
                            OR area_name LIKE '%$search%'
                            OR area_code LIKE '%$search%'
                            )";
          }
      }

    if (isset($orders)) {
        if ($orders != '') {
          $order = $orders;
          $order_column = ['reg_name','reg_code','area_code','area_name','ULP','ULP_Kode'];
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
    $index=1;
    $button="";
    $fetch = $this->db->query("SELECT * from survey $where");
    $fetch2 = $this->db->query("SELECT * from survey ");
    foreach($fetch->result() as $rows){
        $button1= "<a href=".base_url('survey/read/'.$rows->id)." class='btn btn-icon icon-left btn-light'><i class='fa fa-eye'></i></a>";
        $button2= "<a href=".base_url('survey/update/'.$rows->id)." class='btn btn-icon icon-left btn-warning'><i class='fa fa-pencil-square-o'></i></a>";
        $button3 = "<a href=".base_url('survey/delete/'.$rows->id)." class='btn btn-icon icon-left btn-danger' onclick='javasciprt: return confirm(\"Are You Sure ?\")''><i class='fa fa-trash'></i></a>";
        $sub_array=array();
        $sub_array[]=$index;
        $sub_array[]=$rows->kode_survey;
        $sub_array[]=formatTanggal($rows->periode_awal)." s/d ".formatTanggal($rows->periode_akhir);
        $sub_array[]=$rows->poin;
        $sub_array[]=$rows->judul;
        $sub_array[]=$rows->jenis;
        $sub_array[]=$rows->kategori;
        $sub_array[]=$rows->status;
        $sub_array[]=$rows->peserta;
        $sub_array[]=$button1." ".$button2." ".$button3;
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
      $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
      $string = '';
      for ($i = 0; $i < $panjang; $i++) {
        $pos = rand(0, strlen($karakter)-1);
        $string .= $karakter[$pos];
      }
      return $string;
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('survey/create_action'),
            'mode'=>"create",
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
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_survey' => $this->input->post('kode_survey',TRUE),
		'judul' => $this->input->post('judul',TRUE),
		'jenis' => $this->input->post('jenis',TRUE),
		'kategori' => $this->input->post('kategori',TRUE),
		'periode_awal' => $this->input->post('periode_awal',TRUE),
		'periode_akhir' => $this->input->post('periode_akhir',TRUE),
		'poin' => $this->input->post('poin',TRUE),
		'ketentuan' => $this->input->post('ketentuan',TRUE),
	    );

            $this->Survey_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('survey'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Survey_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('survey/update_action'),
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
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kode_survey' => $this->input->post('kode_survey',TRUE),
		'judul' => $this->input->post('judul',TRUE),
		'jenis' => $this->input->post('jenis',TRUE),
		'kategori' => $this->input->post('kategori',TRUE),
		'periode_awal' => $this->input->post('periode_awal',TRUE),
		'periode_akhir' => $this->input->post('periode_akhir',TRUE),
		'poin' => $this->input->post('poin',TRUE),
		'ketentuan' => $this->input->post('ketentuan',TRUE),
	    );

            $this->Survey_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('survey'));
        }
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