<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Notifikasi extends MY_Controller {

    protected $access = array('Admin', 'Pimpinan','Finance');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Notifikasi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $notifikasi = $this->Notifikasi_model->get_all();

        $data = array(
            'notifikasi_data' => $notifikasi
        );
        $this->load->view('header');
        $this->load->view('notifikasi_list', $data);
        $this->load->view('footer');
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
    $fetch = $this->db->query("SELECT * from notifikasi $where");
    $fetch2 = $this->db->query("SELECT * from notifikasi ");
    foreach($fetch->result() as $rows){
        $button1= "<a href=".base_url('notifikasi/read/'.$rows->id)." class='btn btn-icon icon-left btn-light'><i class='fa fa-eye'></i></a>";
        $button2= "<a href=".base_url('notifikasi/update/'.$rows->id)." class='btn btn-icon icon-left btn-warning'><i class='fa fa-pencil-square-o'></i></a>";
        $button3 = "<a href=".base_url('notifikasi/delete/'.$rows->id)." class='btn btn-icon icon-left btn-danger' onclick='javasciprt: return confirm("Are You Sure ?")''><i class='fa fa-trash'></i></a>";
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
        $row = $this->Notifikasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'user_id' => $row->user_id,
		'pesan' => $row->pesan,
		'status' => $row->status,
		'created' => $row->created,
		'deleted' => $row->deleted,
	    );
            $this->load->view('header');
            $this->load->view('notifikasi_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('notifikasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('notifikasi/create_action'),
	    'id' => set_value('id'),
	    'user_id' => set_value('user_id'),
	    'pesan' => set_value('pesan'),
	    'status' => set_value('status'),
	    'created' => set_value('created'),
	    'deleted' => set_value('deleted'),
	);

        $this->load->view('header');
        $this->load->view('notifikasi_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'user_id' => $this->input->post('user_id',TRUE),
		'pesan' => $this->input->post('pesan',TRUE),
		'status' => $this->input->post('status',TRUE),
		'created' => $this->input->post('created',TRUE),
		'deleted' => $this->input->post('deleted',TRUE),
	    );

            $this->Notifikasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('notifikasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Notifikasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('notifikasi/update_action'),
		'id' => set_value('id', $row->id),
		'user_id' => set_value('user_id', $row->user_id),
		'pesan' => set_value('pesan', $row->pesan),
		'status' => set_value('status', $row->status),
		'created' => set_value('created', $row->created),
		'deleted' => set_value('deleted', $row->deleted),
	    );
            $this->load->view('header');
            $this->load->view('notifikasi_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('notifikasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'user_id' => $this->input->post('user_id',TRUE),
		'pesan' => $this->input->post('pesan',TRUE),
		'status' => $this->input->post('status',TRUE),
		'created' => $this->input->post('created',TRUE),
		'deleted' => $this->input->post('deleted',TRUE),
	    );

            $this->Notifikasi_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('notifikasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Notifikasi_model->get_by_id($id);

        if ($row) {
            $this->Notifikasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('notifikasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('notifikasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('user_id', 'user id', 'trim|required');
	$this->form_validation->set_rules('pesan', 'pesan', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('created', 'created', 'trim|required');
	$this->form_validation->set_rules('deleted', 'deleted', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Notifikasi.php */
/* Location: ./application/controllers/Notifikasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-04 08:09:22 */
/* http://harviacode.com */