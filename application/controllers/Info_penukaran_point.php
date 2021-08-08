<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Info_penukaran_point extends MY_Controller {

    // protected $access = array('Admin', 'Pimpinan','Finance');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Info_penukaran_point_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $info_penukaran_point = $this->Info_penukaran_point_model->get_all();

        $data = array(
            'info_penukaran_point_data' => $info_penukaran_point
        );
        $this->load->view('panel/header');
        $this->load->view('info_penukaran_point_list', $data);
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
    $searchingColumn="";
    $result=array();
    if (isset($search)) {
      if ($search != '') {
         $searchingColumn = $search;
            $where .= " AND (daftar_untuk_penukaran_point LIKE '%$search%'
                            OR konfirmasi_penukaran LIKE '%$search%'
                            OR batas_akhir_konfirmasi LIKE '%$search%'
                            OR pengiriman LIKE '%$search%'
                            )";
          }
      }

    if (isset($orders)) {
        if ($orders != '') {
          $order = $orders;
          $order_column = ['daftar_untuk_penukaran_point','konfirmasi_penukaran','batas_akhir_konfirmasi','pengiriman'];
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
    $fetch = $this->db->query("SELECT * from info_penukaran_point $where");
    $fetch2 = $this->db->query("SELECT * from info_penukaran_point ");
    foreach($fetch->result() as $rows){
        $button1= "<a href=".base_url('info_penukaran_point/read/'.$rows->id)." class='btn btn-icon icon-left btn-light'><i class='fa fa-eye'></i></a>";
        $button2= "<a href=".base_url('info_penukaran_point/update/'.$rows->id)." class='btn btn-icon icon-left btn-warning'><i class='fa fa-pencil-square-o'></i></a>";
        $button3 = "<a href=".base_url('info_penukaran_point/delete/'.$rows->id)." class='btn btn-icon icon-left btn-danger' onclick='javasciprt: return confirm(\"Are You Sure ?\")''><i class='fa fa-trash'></i></a>";
        $sub_array=array();
        $sub_array[]=$index;
        $sub_array[]=$rows->daftar_untuk_penukaran_point;
        $sub_array[]=$rows->konfirmasi_penukaran;
        $sub_array[]=$rows->batas_akhir_konfirmasi;
        $sub_array[]=$rows->pengiriman;
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
        $row = $this->Info_penukaran_point_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'daftar_untuk_penukaran_point' => $row->daftar_untuk_penukaran_point,
		'konfirmasi_penukaran' => $row->konfirmasi_penukaran,
		'batas_akhir_konfirmasi' => $row->batas_akhir_konfirmasi,
		'pengiriman' => $row->pengiriman,
	    );
            $this->load->view('panel/header');
            $this->load->view('info_penukaran_point_read', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('info_penukaran_point'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('info_penukaran_point/create_action'),
	    'id' => set_value('id'),
	    'daftar_untuk_penukaran_point' => set_value('daftar_untuk_penukaran_point'),
	    'konfirmasi_penukaran' => set_value('konfirmasi_penukaran'),
	    'batas_akhir_konfirmasi' => set_value('batas_akhir_konfirmasi'),
	    'pengiriman' => set_value('pengiriman'),
	);

        $this->load->view('panel/header');
        $this->load->view('info_penukaran_point_form', $data);
        $this->load->view('panel/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'daftar_untuk_penukaran_point' => $this->input->post('daftar_untuk_penukaran_point',TRUE),
		'konfirmasi_penukaran' => $this->input->post('konfirmasi_penukaran',TRUE),
		'batas_akhir_konfirmasi' => $this->input->post('batas_akhir_konfirmasi',TRUE),
		'pengiriman' => $this->input->post('pengiriman',TRUE),
	    );

            $this->Info_penukaran_point_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('info_penukaran_point'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Info_penukaran_point_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('info_penukaran_point/update_action'),
		'id' => set_value('id', $row->id),
		'daftar_untuk_penukaran_point' => set_value('daftar_untuk_penukaran_point', $row->daftar_untuk_penukaran_point),
		'konfirmasi_penukaran' => set_value('konfirmasi_penukaran', $row->konfirmasi_penukaran),
		'batas_akhir_konfirmasi' => set_value('batas_akhir_konfirmasi', $row->batas_akhir_konfirmasi),
		'pengiriman' => set_value('pengiriman', $row->pengiriman),
	    );
            $this->load->view('panel/header');
            $this->load->view('info_penukaran_point_form', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('info_penukaran_point'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'daftar_untuk_penukaran_point' => $this->input->post('daftar_untuk_penukaran_point',TRUE),
		'konfirmasi_penukaran' => $this->input->post('konfirmasi_penukaran',TRUE),
		'batas_akhir_konfirmasi' => $this->input->post('batas_akhir_konfirmasi',TRUE),
		'pengiriman' => $this->input->post('pengiriman',TRUE),
	    );

            $this->Info_penukaran_point_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('info_penukaran_point'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Info_penukaran_point_model->get_by_id($id);

        if ($row) {
            $this->Info_penukaran_point_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('info_penukaran_point'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('info_penukaran_point'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('daftar_untuk_penukaran_point', 'daftar untuk penukaran point', 'trim|required');
	$this->form_validation->set_rules('konfirmasi_penukaran', 'konfirmasi penukaran', 'trim|required');
	$this->form_validation->set_rules('batas_akhir_konfirmasi', 'batas akhir konfirmasi', 'trim|required');
	$this->form_validation->set_rules('pengiriman', 'pengiriman', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Info_penukaran_point.php */
/* Location: ./application/controllers/Info_penukaran_point.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-06 12:01:17 */
/* http://harviacode.com */