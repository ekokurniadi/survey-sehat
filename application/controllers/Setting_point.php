<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setting_point extends MY_Controller {

    // protected $access = array('Admin', 'Pimpinan','Finance');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Setting_point_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $setting_point = $this->Setting_point_model->get_all();

        $data = array(
            'setting_point_data' => $setting_point
        );
        $this->load->view('panel/header');
        $this->load->view('setting_point_list', $data);
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
            $where .= " AND (id_setting LIKE '%$search%'
                            OR jenis LIKE '%$search%'
                            OR jumlah_point LIKE '%$search%'
                            
                            )";
          }
      }

    if (isset($orders)) {
        if ($orders != '') {
          $order = $orders;
          $order_column = ['id_setting','jenis','jumlah_point'];
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
    $fetch = $this->db->query("SELECT * from setting_point $where");
    $fetch2 = $this->db->query("SELECT * from setting_point ");
    foreach($fetch->result() as $rows){
        $button1= "<a href=".base_url('setting_point/read/'.$rows->id)." class='btn btn-icon icon-left btn-light'><i class='fa fa-eye'></i></a>";
        $button2= "<a href=".base_url('setting_point/update/'.$rows->id)." class='btn btn-icon icon-left btn-warning'><i class='fa fa-pencil-square-o'></i></a>";
        $button3 = "<a href=".base_url('setting_point/delete/'.$rows->id)." class='btn btn-icon icon-left btn-danger' onclick='javasciprt: return confirm(\"Are You Sure ?\")''><i class='fa fa-trash'></i></a>";
        $sub_array=array();
        $sub_array[]=$index;
        $sub_array[]=$rows->id_setting;
        $sub_array[]=$rows->jenis;
        $sub_array[]=$rows->jumlah_point;
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
        $row = $this->Setting_point_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_setting' => $row->id_setting,
		'jenis' => $row->jenis,
		'jumlah_point' => $row->jumlah_point,
	    );
            $this->load->view('panel/header');
            $this->load->view('setting_point_read', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting_point'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('setting_point/create_action'),
	    'id' => set_value('id'),
	    'id_setting' => set_value('id_setting'),
	    'jenis' => set_value('jenis'),
	    'jumlah_point' => set_value('jumlah_point'),
	);

        $this->load->view('panel/header');
        $this->load->view('setting_point_form', $data);
        $this->load->view('panel/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_setting' => $this->input->post('id_setting',TRUE),
		'jenis' => $this->input->post('jenis',TRUE),
		'jumlah_point' => $this->input->post('jumlah_point',TRUE),
	    );

            $this->Setting_point_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('setting_point'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Setting_point_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('setting_point/update_action'),
		'id' => set_value('id', $row->id),
		'id_setting' => set_value('id_setting', $row->id_setting),
		'jenis' => set_value('jenis', $row->jenis),
		'jumlah_point' => set_value('jumlah_point', $row->jumlah_point),
	    );
            $this->load->view('panel/header');
            $this->load->view('setting_point_form', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting_point'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_setting' => $this->input->post('id_setting',TRUE),
		'jenis' => $this->input->post('jenis',TRUE),
		'jumlah_point' => $this->input->post('jumlah_point',TRUE),
	    );

            $this->Setting_point_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('setting_point'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Setting_point_model->get_by_id($id);

        if ($row) {
            $this->Setting_point_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('setting_point'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting_point'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_setting', 'id setting', 'trim|required');
	$this->form_validation->set_rules('jenis', 'jenis', 'trim|required');
	$this->form_validation->set_rules('jumlah_point', 'jumlah point', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Setting_point.php */
/* Location: ./application/controllers/Setting_point.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-05 11:46:10 */
/* http://harviacode.com */