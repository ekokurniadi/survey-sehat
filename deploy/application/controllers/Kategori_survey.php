<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori_survey extends MY_Controller {

    // protected $access = array('Admin', 'Pimpinan','Finance');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_survey_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $kategori_survey = $this->Kategori_survey_model->get_all();

        $data = array(
            'kategori_survey_data' => $kategori_survey
        );
        $this->load->view('panel/header');
        $this->load->view('kategori_survey_list', $data);
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
    // $searchingColumn;
    $result=array();
    if (isset($search)) {
      if ($search != '') {
         $searchingColumn = $search;
            $where .= " AND (kategori_survey LIKE '%$search%')";
          }
      }

    if (isset($orders)) {
        if ($orders != '') {
          $order = $orders;
          $order_column = ['kategori_survey'];
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
    $fetch = $this->db->query("SELECT * from kategori_survey $where");
    $fetch2 = $this->db->query("SELECT * from kategori_survey ");
    foreach($fetch->result() as $rows){
        $button1= "<a href=".base_url('kategori_survey/read/'.$rows->id)." class='btn btn-icon icon-left btn-light'><i class='fa fa-eye'></i></a>";
        $button2= "<a href=".base_url('kategori_survey/update/'.$rows->id)." class='btn btn-icon icon-left btn-warning'><i class='fa fa-pencil-square-o'></i></a>";
        $button3 = "<a href=".base_url('kategori_survey/delete/'.$rows->id)." class='btn btn-icon icon-left btn-danger' onclick='javasciprt: return confirm(\"Are You Sure ?\")''><i class='fa fa-trash'></i></a>";
        $sub_array=array();
        $sub_array[]=$index;
        $sub_array[]=$rows->kategori_survey;
        $sub_array[]=$rows->active;
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
        $row = $this->Kategori_survey_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kategori_survey' => $row->kategori_survey,
		'active' => $row->active,
	    );
            $this->load->view('panel/header');
            $this->load->view('kategori_survey_read', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori_survey'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kategori_survey/create_action'),
	    'id' => set_value('id'),
	    'kategori_survey' => set_value('kategori_survey'),
	    'active' => set_value('active'),
	);

        $this->load->view('panel/header');
        $this->load->view('kategori_survey_form', $data);
        $this->load->view('panel/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kategori_survey' => $this->input->post('kategori_survey',TRUE),
		'active' => $this->input->post('active',TRUE),
	    );

            $this->Kategori_survey_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kategori_survey'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kategori_survey_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kategori_survey/update_action'),
		'id' => set_value('id', $row->id),
		'kategori_survey' => set_value('kategori_survey', $row->kategori_survey),
		'active' => set_value('active', $row->active),
	    );
            $this->load->view('panel/header');
            $this->load->view('kategori_survey_form', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori_survey'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kategori_survey' => $this->input->post('kategori_survey',TRUE),
		'active' => $this->input->post('active',TRUE),
	    );

            $this->Kategori_survey_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kategori_survey'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kategori_survey_model->get_by_id($id);

        if ($row) {
            $this->Kategori_survey_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kategori_survey'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori_survey'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kategori_survey', 'kategori survey', 'trim|required');
	$this->form_validation->set_rules('active', 'active', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kategori_survey.php */
/* Location: ./application/controllers/Kategori_survey.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-05 11:46:21 */
/* http://harviacode.com */