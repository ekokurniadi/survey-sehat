<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Syarat_penukaran_point extends MY_Controller
{

    // protected $access = array('Admin', 'Pimpinan','Finance');

    function __construct()
    {
        parent::__construct();
        $this->load->model('Syarat_penukaran_point_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $syarat_penukaran_point = $this->Syarat_penukaran_point_model->get_all();

        $data = array(
            'syarat_penukaran_point_data' => $syarat_penukaran_point
        );
        $this->load->view('panel/header');
        $this->load->view('syarat_penukaran_point_list', $data);
        $this->load->view('panel/footer');
    }

    public function fetch_data()
    {
        $starts       = $this->input->post("start");
        $length       = $this->input->post("length");
        $LIMIT        = "LIMIT $starts, $length ";
        $draw         = $this->input->post("draw");
        $search       = $this->input->post("search")["value"];
        $orders       = isset($_POST["order"]) ? $_POST["order"] : '';

        $where = "WHERE 1=1";
        $searchingColumn = "";
        $result = array();
        if (isset($search)) {
            if ($search != '') {
                $searchingColumn = $search;
                $where .= " AND (keterangan LIKE '%$search%'
                            
                            )";
            }
        }

        if (isset($orders)) {
            if ($orders != '') {
                $order = $orders;
                $order_column = ['keterangan', 'urutan'];
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
        $index = 1;
        $button = "";
        $fetch = $this->db->query("SELECT * from syarat_penukaran_point $where");
        $fetch2 = $this->db->query("SELECT * from syarat_penukaran_point ");
        foreach ($fetch->result() as $rows) {
            $button1 = "<a href=" . base_url('syarat_penukaran_point/read/' . $rows->id) . " class='btn btn-icon icon-left btn-light'><i class='fa fa-eye'></i></a>";
            $button2 = "<a href=" . base_url('syarat_penukaran_point/update/' . $rows->id) . " class='btn btn-icon icon-left btn-warning'><i class='fa fa-pencil-square-o'></i></a>";
            $button3 = "<a href=" . base_url('syarat_penukaran_point/delete/' . $rows->id) . " class='btn btn-icon icon-left btn-danger' onclick='javasciprt: return confirm(\"Are You Sure ?\")''><i class='fa fa-trash'></i></a>";
            $sub_array = array();
            $sub_array[] = $index;
            $sub_array[] = $rows->keterangan;
            $sub_array[] = $rows->urutan;
            $sub_array[] = $button1 . " " . $button2 . " " . $button3;
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
        $row = $this->Syarat_penukaran_point_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'keterangan' => $row->keterangan,
                'urutan' => $row->urutan,
            );
            $this->load->view('panel/header');
            $this->load->view('syarat_penukaran_point_read', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('syarat_penukaran_point'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('syarat_penukaran_point/create_action'),
            'id' => set_value('id'),
            'keterangan' => set_value('keterangan'),
            'urutan' => set_value('urutan'),
        );

        $this->load->view('panel/header');
        $this->load->view('syarat_penukaran_point_form', $data);
        $this->load->view('panel/footer');
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'keterangan' => $this->input->post('keterangan', TRUE),
                'urutan' => $this->input->post('urutan', TRUE),
            );

            $this->Syarat_penukaran_point_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('syarat_penukaran_point'));
        }
    }

    public function update($id)
    {
        $row = $this->Syarat_penukaran_point_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('syarat_penukaran_point/update_action'),
                'id' => set_value('id', $row->id),
                'keterangan' => set_value('keterangan', $row->keterangan),
                'urutan' => set_value('urutan', $row->urutan),
            );
            $this->load->view('panel/header');
            $this->load->view('syarat_penukaran_point_form', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('syarat_penukaran_point'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'keterangan' => $this->input->post('keterangan', TRUE),
                'urutan' => $this->input->post('urutan', TRUE),
            );

            $this->Syarat_penukaran_point_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('syarat_penukaran_point'));
        }
    }

    public function delete($id)
    {
        $row = $this->Syarat_penukaran_point_model->get_by_id($id);

        if ($row) {
            $this->Syarat_penukaran_point_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('syarat_penukaran_point'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('syarat_penukaran_point'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
        $this->form_validation->set_rules('urutan', 'urutan', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Syarat_penukaran_point.php */
/* Location: ./application/controllers/Syarat_penukaran_point.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-06 12:48:19 */
/* http://harviacode.com */