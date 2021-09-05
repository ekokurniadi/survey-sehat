<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Carousel extends MY_Controller
{

    // protected $access = array('Admin', 'Pimpinan','Finance');

    function __construct()
    {
        parent::__construct();
        $this->load->model('Carousel_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $carousel = $this->Carousel_model->get_all();

        $data = array(
            'carousel_data' => $carousel
        );
        $this->load->view('panel/header');
        $this->load->view('carousel_list', $data);
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
                $where .= " AND (foto LIKE '%$search%'
                            OR status LIKE '%$search%'
                            )";
            }
        }

        if (isset($orders)) {
            if ($orders != '') {
                $order = $orders;
                $order_column = ['foto', 'status', 'urutan'];
                $order_clm  = $order_column[$order[0]['column']];
                $order_by   = $order[0]['dir'];
                $where .= " ORDER BY $order_clm $order_by ";
            } else {
                $where .= " ORDER BY urutan ASC ";
            }
        } else {
            $where .= " ORDER BY urutan ASC ";
        }
        if (isset($LIMIT)) {
            if ($LIMIT != '') {
                $where .= ' ' . $LIMIT;
            }
        }
        $index = 1;
        $button = "";
        $fetch = $this->db->query("SELECT * from carousel $where");
        $fetch2 = $this->db->query("SELECT * from carousel ");
        foreach ($fetch->result() as $rows) {
            $button1 = "<a href=" . base_url('carousel/read/' . $rows->id) . " class='btn btn-icon icon-left btn-light'><i class='fa fa-eye'></i></a>";
            $button2 = "<a href=" . base_url('carousel/update/' . $rows->id) . " class='btn btn-icon icon-left btn-warning'><i class='fa fa-pencil-square-o'></i></a>";
            $button3 = "<a href=" . base_url('carousel/delete/' . $rows->id) . " class='btn btn-icon icon-left btn-danger' onclick='javasciprt: return confirm(\"Are You Sure ?\")''><i class='fa fa-trash'></i></a>";
            $span    = $rows->status == "Aktif" ? "<button class='btn btn-icon btn-success'><span class='fa fa-check-circle'></span></button>" : "<button class='btn btn-icon btn-danger'><span class='fa fa-exclamation-triangle'></span></button>";
            $sub_array = array();
            $sub_array[] = $index;
            $sub_array[] = "<img src='" . base_url() . "image/" . $rows->foto . "' class='img-fluid'>";
            $sub_array[] = $span;
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
        $row = $this->Carousel_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'foto' => $row->foto,
                'status' => $row->status,
                'urutan' => $row->urutan,
            );
            $this->load->view('panel/header');
            $this->load->view('carousel_read', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('carousel'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('carousel/create_action'),
            'id' => set_value('id'),
            'foto' => set_value('foto'),
            'status' => set_value('status'),
            'urutan' => set_value('urutan'),
        );

        $this->load->view('panel/header');
        $this->load->view('carousel_form', $data);
        $this->load->view('panel/footer');
    }

    public function create_action()
    {

        $data = array(
            'foto' => upload_gambar_biasa('foto', 'image/', 'jpeg|png|jpg|gif|svg|SVG', 10000, 'foto'),
            'status' => $this->input->post('status', TRUE),
            'urutan' => $this->input->post('urutan', TRUE),
        );

        $this->Carousel_model->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(site_url('carousel'));
    }

    public function update($id)
    {
        $row = $this->Carousel_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('carousel/update_action'),
                'id' => set_value('id', $row->id),
                'foto' => set_value('foto', $row->foto),
                'status' => set_value('status', $row->status),
                'urutan' => set_value('urutan', $row->urutan),
            );
            $this->load->view('panel/header');
            $this->load->view('carousel_form', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('carousel'));
        }
    }

    public function update_action()
    {



    $id = $this->input->post('id', TRUE);
    $row = $this->Carousel_model->get_by_id($id);

        $data = array(
            'foto' => $_FILES['foto']['name'] == "" ? $row->foto : upload_gambar_biasa('foto', 'image/', 'jpeg|png|jpg|gif|svg|SVG', 10000, 'foto'),
            'status' => $this->input->post('status', TRUE),
            'urutan' => $this->input->post('urutan', TRUE),
        );

        $this->Carousel_model->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('carousel'));
    }

    public function delete($id)
    {
        $row = $this->Carousel_model->get_by_id($id);

        if ($row) {
            $this->Carousel_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('carousel'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('carousel'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('foto', 'foto', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        $this->form_validation->set_rules('urutan', 'urutan', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Carousel.php */
/* Location: ./application/controllers/Carousel.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-04 06:31:47 */
/* http://harviacode.com */