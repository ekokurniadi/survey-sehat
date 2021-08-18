<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Point_dan_hadiah extends MY_Controller {

    // protected $access = array('Admin', 'Pimpinan','Finance');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Point_dan_hadiah_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $point_dan_hadiah = $this->Point_dan_hadiah_model->get_all();

        $data = array(
            'point_dan_hadiah_data' => $point_dan_hadiah
        );
        $this->load->view('panel/header');
        $this->load->view('point_dan_hadiah_list', $data);
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
            $where .= " AND (detail LIKE '%$search%'
                            OR langkah LIKE '%$search%'
                            OR poin_dan_hadiah LIKE '%$search%'
                           
                            )";
          }
      }

    if (isset($orders)) {
        if ($orders != '') {
          $order = $orders;
          $order_column = ['detail','langkah','poin_dan_hadiah'];
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
    $fetch = $this->db->query("SELECT * from point_dan_hadiah $where");
    $fetch2 = $this->db->query("SELECT * from point_dan_hadiah ");
    foreach($fetch->result() as $rows){
        $button1= "<a href=".base_url('point_dan_hadiah/read/'.$rows->id)." class='btn btn-icon icon-left btn-light'><i class='fa fa-eye'></i></a>";
        $button2= "<a href=".base_url('point_dan_hadiah/update/'.$rows->id)." class='btn btn-icon icon-left btn-warning'><i class='fa fa-pencil-square-o'></i></a>";
        $button3 = "<a href=".base_url('point_dan_hadiah/delete/'.$rows->id)." class='btn btn-icon icon-left btn-danger' onclick='javasciprt: return confirm(\"Are You Sure ?\")''><i class='fa fa-trash'></i></a>";
        $sub_array=array();
        $sub_array[]=$index;
        $sub_array[]=$rows->detail;
        $sub_array[]=$rows->langkah;
        $sub_array[]=$rows->poin_dan_hadiah;
       
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
        $row = $this->Point_dan_hadiah_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'detail' => $row->detail,
		'langkah' => $row->langkah,
		'poin_dan_hadiah' => $row->poin_dan_hadiah,
	    );
            $this->load->view('panel/header');
            $this->load->view('point_dan_hadiah_read', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('point_dan_hadiah'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('point_dan_hadiah/create_action'),
	    'id' => set_value('id'),
	    'detail' => set_value('detail'),
	    'langkah' => set_value('langkah'),
	    'poin_dan_hadiah' => set_value('poin_dan_hadiah'),
	);

        $this->load->view('panel/header');
        $this->load->view('point_dan_hadiah_form', $data);
        $this->load->view('panel/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'detail' => $this->input->post('detail',TRUE),
		'langkah' => $this->input->post('langkah',TRUE),
		'poin_dan_hadiah' => $this->input->post('poin_dan_hadiah',TRUE),
	    );

            $this->Point_dan_hadiah_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('point_dan_hadiah'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Point_dan_hadiah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('point_dan_hadiah/update_action'),
		'id' => set_value('id', $row->id),
		'detail' => set_value('detail', $row->detail),
		'langkah' => set_value('langkah', $row->langkah),
		'poin_dan_hadiah' => set_value('poin_dan_hadiah', $row->poin_dan_hadiah),
	    );
            $this->load->view('panel/header');
            $this->load->view('point_dan_hadiah_form', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('point_dan_hadiah'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'detail' => $this->input->post('detail',TRUE),
		'langkah' => $this->input->post('langkah',TRUE),
		'poin_dan_hadiah' => $this->input->post('poin_dan_hadiah',TRUE),
	    );

            $this->Point_dan_hadiah_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('point_dan_hadiah'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Point_dan_hadiah_model->get_by_id($id);

        if ($row) {
            $this->Point_dan_hadiah_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('point_dan_hadiah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('point_dan_hadiah'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('detail', 'detail', 'trim|required');
	$this->form_validation->set_rules('langkah', 'langkah', 'trim|required');
	$this->form_validation->set_rules('poin_dan_hadiah', 'poin dan hadiah', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Point_dan_hadiah.php */
/* Location: ./application/controllers/Point_dan_hadiah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-06 15:57:14 */
/* http://harviacode.com */