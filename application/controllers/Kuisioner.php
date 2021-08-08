<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kuisioner extends MY_Controller {

    // protected $access = array('Admin', 'Pimpinan','Finance');
    
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
    $fetch = $this->db->query("SELECT * from kuisioner $where");
    $fetch2 = $this->db->query("SELECT * from kuisioner ");
    foreach($fetch->result() as $rows){
        $button1= "<a href=".base_url('kuisioner/read/'.$rows->id)." class='btn btn-icon icon-left btn-light'><i class='fa fa-eye'></i></a>";
        $button2= "<a href=".base_url('kuisioner/update/'.$rows->id)." class='btn btn-icon icon-left btn-warning'><i class='fa fa-pencil-square-o'></i></a>";
        $button3 = "<a href=".base_url('kuisioner/delete/'.$rows->id)." class='btn btn-icon icon-left btn-danger' onclick='javasciprt: return confirm("Are You Sure ?")''><i class='fa fa-trash'></i></a>";
        $sub_array=array();
        $sub_array[]=$index;
        $sub_array[]=$rows->reg_name;
        $sub_array[]=$rows->reg_code;
        $sub_array[]=$rows->area_name;
        $sub_array[]=$rows->area_code;
        $sub_array[]=$rows->ULP;
        $sub_array[]=$rows->ULP_Kode;
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
        $row = $this->Kuisioner_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_kuisioner' => $row->id_kuisioner,
		'user' => $row->user,
		'created_at' => $row->created_at,
		'status' => $row->status,
		'pertanyaan' => $row->pertanyaan,
	    );
            $this->load->view('panel/header');
            $this->load->view('kuisioner_read', $data);
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
	    'id_kuisioner' => set_value('id_kuisioner'),
	    'user' => set_value('user'),
	    'created_at' => set_value('created_at'),
	    'status' => set_value('status'),
	    'pertanyaan' => set_value('pertanyaan'),
	);

        $this->load->view('panel/header');
        $this->load->view('kuisioner_form', $data);
        $this->load->view('panel/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_kuisioner' => $this->input->post('id_kuisioner',TRUE),
		'user' => $this->input->post('user',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'status' => $this->input->post('status',TRUE),
		'pertanyaan' => $this->input->post('pertanyaan',TRUE),
	    );

            $this->Kuisioner_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kuisioner'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kuisioner_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kuisioner/update_action'),
		'id' => set_value('id', $row->id),
		'id_kuisioner' => set_value('id_kuisioner', $row->id_kuisioner),
		'user' => set_value('user', $row->user),
		'created_at' => set_value('created_at', $row->created_at),
		'status' => set_value('status', $row->status),
		'pertanyaan' => set_value('pertanyaan', $row->pertanyaan),
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
		'id_kuisioner' => $this->input->post('id_kuisioner',TRUE),
		'user' => $this->input->post('user',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'status' => $this->input->post('status',TRUE),
		'pertanyaan' => $this->input->post('pertanyaan',TRUE),
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
	$this->form_validation->set_rules('id_kuisioner', 'id kuisioner', 'trim|required');
	$this->form_validation->set_rules('user', 'user', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('pertanyaan', 'pertanyaan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kuisioner.php */
/* Location: ./application/controllers/Kuisioner.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-05 11:46:05 */
/* http://harviacode.com */