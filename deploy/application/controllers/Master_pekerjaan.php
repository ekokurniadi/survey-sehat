<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_pekerjaan extends MY_Controller {

    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Master_pekerjaan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $master_pekerjaan = $this->Master_pekerjaan_model->get_all();

        $data = array(
            'master_pekerjaan_data' => $master_pekerjaan
        );
        $this->load->view('panel/header');
        $this->load->view('master_pekerjaan_list', $data);
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
            $where .= " AND (pekerjaan LIKE '%$search%'
	 )";
	
          }
      }

    if (isset($orders)) {
        if ($orders != '') {
          $order = $orders;
          $order_column =['pekerjaan',];
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
    $fetch = $this->db->query("SELECT * from master_pekerjaan $where");
    $fetch2 = $this->db->query("SELECT * from master_pekerjaan ");
    foreach($fetch->result() as $rows){
        $button1= "<a href=".base_url('master_pekerjaan/read/'.$rows->id)." class='btn btn-icon icon-left btn-light'><i class='fa fa-eye'></i></a>";
        $button2= "<a href=".base_url('master_pekerjaan/update/'.$rows->id)." class='btn btn-icon icon-left btn-warning'><i class='fa fa-pencil-square-o'></i></a>";
        $button3 = "<a href=".base_url('master_pekerjaan/delete/'.$rows->id)." class='btn btn-icon icon-left btn-danger' onclick='javasciprt: return confirm(\'Are You Sure ?\')''><i class='fa fa-trash'></i></a>";
        $sub_array=array();
        $sub_array[]=$index;$sub_array[]=$rows->pekerjaan;
	 
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
        $row = $this->Master_pekerjaan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'pekerjaan' => $row->pekerjaan,
	    );
            $this->load->view('panel/header');
            $this->load->view('master_pekerjaan_read', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('master_pekerjaan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('master_pekerjaan/create_action'),
	    'id' => set_value('id'),
	    'pekerjaan' => set_value('pekerjaan'),
	);

        $this->load->view('panel/header');
        $this->load->view('master_pekerjaan_form', $data);
        $this->load->view('panel/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
	    );

            $this->Master_pekerjaan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('master_pekerjaan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Master_pekerjaan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('master_pekerjaan/update_action'),
		'id' => set_value('id', $row->id),
		'pekerjaan' => set_value('pekerjaan', $row->pekerjaan),
	    );
            $this->load->view('panel/header');
            $this->load->view('master_pekerjaan_form', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('master_pekerjaan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
	    );

            $this->Master_pekerjaan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('master_pekerjaan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Master_pekerjaan_model->get_by_id($id);

        if ($row) {
            $this->Master_pekerjaan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('master_pekerjaan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('master_pekerjaan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Master_pekerjaan.php */
/* Location: ./application/controllers/Master_pekerjaan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-28 10:15:01 */
/* http://harviacode.com */