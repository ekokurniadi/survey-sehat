<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_kabupaten_kota extends MY_Controller {

    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Master_kabupaten_kota_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $master_kabupaten_kota = $this->Master_kabupaten_kota_model->get_all();

        $data = array(
            'master_kabupaten_kota_data' => $master_kabupaten_kota
        );
        $this->load->view('panel/header');
        $this->load->view('master_kabupaten_kota_list', $data);
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
            $where .= " AND (id_provinsi LIKE '%$search%'
	 AND (kabupaten_kota LIKE '%$search%'
	 )";
	
          }
      }

    if (isset($orders)) {
        if ($orders != '') {
          $order = $orders;
          $order_column =['id_provinsi','kabupaten_kota',];
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
    $fetch = $this->db->query("SELECT * from master_kabupaten_kota $where");
    $fetch2 = $this->db->query("SELECT * from master_kabupaten_kota ");
    foreach($fetch->result() as $rows){
        $button1= "<a href=".base_url('master_kabupaten_kota/read/'.$rows->id)." class='btn btn-icon icon-left btn-light'><i class='fa fa-eye'></i></a>";
        $button2= "<a href=".base_url('master_kabupaten_kota/update/'.$rows->id)." class='btn btn-icon icon-left btn-warning'><i class='fa fa-pencil-square-o'></i></a>";
        $button3 = "<a href=".base_url('master_kabupaten_kota/delete/'.$rows->id)." class='btn btn-icon icon-left btn-danger' onclick='javasciprt: return confirm(\'Are You Sure ?\')''><i class='fa fa-trash'></i></a>";
        $sub_array=array();
        $sub_array[]=$index;$sub_array[]=$rows->id_provinsi;
	 $sub_array[]=$rows->kabupaten_kota;
	 
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
        $row = $this->Master_kabupaten_kota_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_provinsi' => $row->id_provinsi,
		'kabupaten_kota' => $row->kabupaten_kota,
	    );
            $this->load->view('panel/header');
            $this->load->view('master_kabupaten_kota_read', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('master_kabupaten_kota'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('master_kabupaten_kota/create_action'),
	    'id' => set_value('id'),
	    'id_provinsi' => set_value('id_provinsi'),
	    'kabupaten_kota' => set_value('kabupaten_kota'),
	);

        $this->load->view('panel/header');
        $this->load->view('master_kabupaten_kota_form', $data);
        $this->load->view('panel/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_provinsi' => $this->input->post('id_provinsi',TRUE),
		'kabupaten_kota' => $this->input->post('kabupaten_kota',TRUE),
	    );

            $this->Master_kabupaten_kota_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('master_kabupaten_kota'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Master_kabupaten_kota_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('master_kabupaten_kota/update_action'),
		'id' => set_value('id', $row->id),
		'id_provinsi' => set_value('id_provinsi', $row->id_provinsi),
		'kabupaten_kota' => set_value('kabupaten_kota', $row->kabupaten_kota),
	    );
            $this->load->view('panel/header');
            $this->load->view('master_kabupaten_kota_form', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('master_kabupaten_kota'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_provinsi' => $this->input->post('id_provinsi',TRUE),
		'kabupaten_kota' => $this->input->post('kabupaten_kota',TRUE),
	    );

            $this->Master_kabupaten_kota_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('master_kabupaten_kota'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Master_kabupaten_kota_model->get_by_id($id);

        if ($row) {
            $this->Master_kabupaten_kota_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('master_kabupaten_kota'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('master_kabupaten_kota'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_provinsi', 'id provinsi', 'trim|required');
	$this->form_validation->set_rules('kabupaten_kota', 'kabupaten kota', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Master_kabupaten_kota.php */
/* Location: ./application/controllers/Master_kabupaten_kota.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-28 10:14:56 */
/* http://harviacode.com */