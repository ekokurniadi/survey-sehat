<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Messagecontact extends MY_Controller {

    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Messagecontact_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $messagecontact = $this->Messagecontact_model->get_all();

        $data = array(
            'messagecontact_data' => $messagecontact
        );
        $this->load->view('panel/header');
        $this->load->view('messagecontact_list', $data);
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
    $result=array();
    if (isset($search)) {
      if ($search != '') {
            $where .= " AND (pertanyaan LIKE '%$search%'
	 AND (status LIKE '%$search%'
	 AND (nama LIKE '%$search%'
	 AND (email LIKE '%$search%'
	 AND (subject LIKE '%$search%'
	 )";
	
          }
      }

    if (isset($orders)) {
        if ($orders != '') {
          $order = $orders;
          $order_column =['pertanyaan','status','nama','email','subject',];
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
    $fetch = $this->db->query("SELECT * from messagecontact $where");
    $fetch2 = $this->db->query("SELECT * from messagecontact ");
    foreach($fetch->result() as $rows){
        $button1= "<a href=".base_url('messagecontact/read/'.$rows->id)." class='btn btn-icon icon-left btn-light'><i class='fa fa-eye'></i></a>";
        $button2= "<a href=".base_url('messagecontact/update/'.$rows->id)." class='btn btn-icon icon-left btn-warning'><i class='fa fa-pencil-square-o'></i></a>";
        $button3 = "<a href=".base_url('messagecontact/delete/'.$rows->id)." class='btn btn-icon icon-left btn-danger' onclick='javasciprt: return confirm(\'Are You Sure ?\')''><i class='fa fa-trash'></i></a>";
        $sub_array=array();
        $sub_array[]=$index;$sub_array[]=$rows->pertanyaan;
	 $sub_array[]=$rows->status;
	 $sub_array[]=$rows->nama;
	 $sub_array[]=$rows->email;
	 $sub_array[]=$rows->subject;
	 
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
        $row = $this->Messagecontact_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'pertanyaan' => $row->pertanyaan,
		'status' => $row->status,
		'nama' => $row->nama,
		'email' => $row->email,
		'subject' => $row->subject,
	    );
            $this->load->view('panel/header');
            $this->load->view('messagecontact_read', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('messagecontact'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('messagecontact/create_action'),
	    'id' => set_value('id'),
	    'pertanyaan' => set_value('pertanyaan'),
	    'status' => set_value('status'),
	    'nama' => set_value('nama'),
	    'email' => set_value('email'),
	    'subject' => set_value('subject'),
	);

        $this->load->view('panel/header');
        $this->load->view('messagecontact_form', $data);
        $this->load->view('panel/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'pertanyaan' => $this->input->post('pertanyaan',TRUE),
		'status' => $this->input->post('status',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'email' => $this->input->post('email',TRUE),
		'subject' => $this->input->post('subject',TRUE),
	    );

            $this->Messagecontact_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('messagecontact'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Messagecontact_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('messagecontact/update_action'),
		'id' => set_value('id', $row->id),
		'pertanyaan' => set_value('pertanyaan', $row->pertanyaan),
		'status' => set_value('status', $row->status),
		'nama' => set_value('nama', $row->nama),
		'email' => set_value('email', $row->email),
		'subject' => set_value('subject', $row->subject),
	    );
            $this->load->view('panel/header');
            $this->load->view('messagecontact_form', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('messagecontact'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'pertanyaan' => $this->input->post('pertanyaan',TRUE),
		'status' => $this->input->post('status',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'email' => $this->input->post('email',TRUE),
		'subject' => $this->input->post('subject',TRUE),
	    );

            $this->Messagecontact_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('messagecontact'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Messagecontact_model->get_by_id($id);

        if ($row) {
            $this->Messagecontact_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('messagecontact'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('messagecontact'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pertanyaan', 'pertanyaan', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('subject', 'subject', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Messagecontact.php */
/* Location: ./application/controllers/Messagecontact.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-25 08:21:12 */
/* http://harviacode.com */