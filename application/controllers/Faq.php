<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Faq extends MY_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Faq_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $faq = $this->Faq_model->get_all();

        $data = array(
            'faq_data' => $faq
        );
        $this->load->view('panel/header');
        $this->load->view('faq_list', $data);
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
        $result = array();
        if (isset($search)) {
            if ($search != '') {
                $where .= " AND (kategori LIKE '%$search%'
	 OR pertanyaan LIKE '%$search%'
	 OR jawaban LIKE '%$search%'
	 OR status LIKE '%$search%'
	 OR nama LIKE '%$search%'
	 OR email LIKE '%$search%'
	 )";
            }
        }

        if (isset($orders)) {
            if ($orders != '') {
                $order = $orders;
                $order_column = ['kategori', 'pertanyaan', 'jawaban', 'status', 'nama', 'email',];
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
        $fetch = $this->db->query("SELECT * from faq $where");
        $fetch2 = $this->db->query("SELECT * from faq ");
        foreach ($fetch->result() as $rows) {
            // $button1 = "<a href=" . base_url('faq/read/' . $rows->id) . " class='btn btn-icon icon-left btn-light'><i class='fa fa-eye'></i></a>";
            if($rows->status=="Open"){
                $button2 = "<a href=" . base_url('faq/update/' . $rows->id) . " class='btn btn-icon icon-left btn-warning'><i class='fa fa-pencil-square-o'></i> Jawab</a>";
                $button3 = "<a href=" . base_url('faq/delete/' . $rows->id) . " class='btn btn-icon icon-left btn-danger' onclick='javasciprt: return confirm(\'Are You Sure ?\')''><i class='fa fa-trash'></i> Hapus</a>";
            }else{
                $button2="";
                $button3="";
            }
            $sub_array = array();
            $sub_array[] = $index;
            $sub_array[] = $rows->kategori;
            $sub_array[] = $rows->pertanyaan;
            $sub_array[] = $rows->jawaban;
            $sub_array[] = $rows->status;
            $sub_array[] = $rows->nama;
            $sub_array[] = $rows->email;

            $sub_array[] = $button2 . " " . $button3;
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
        $row = $this->Faq_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'kategori' => $row->kategori,
                'pertanyaan' => $row->pertanyaan,
                'jawaban' => $row->jawaban,
                'status' => $row->status,
                'nama' => $row->nama,
                'email' => $row->email,
            );
            $this->load->view('panel/header');
            $this->load->view('faq_read', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faq'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('faq/create_action'),
            'id' => set_value('id'),
            'kategori' => set_value('kategori'),
            'pertanyaan' => set_value('pertanyaan'),
            'jawaban' => set_value('jawaban'),
            'status' => set_value('status'),
            'nama' => set_value('nama'),
            'email' => set_value('email'),
        );

        $this->load->view('panel/header');
        $this->load->view('faq_form', $data);
        $this->load->view('panel/footer');
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kategori' => $this->input->post('kategori', TRUE),
                'pertanyaan' => $this->input->post('pertanyaan', TRUE),
                'jawaban' => $this->input->post('jawaban', TRUE),
                'status' => $this->input->post('status', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'email' => $this->input->post('email', TRUE),
            );

            $this->Faq_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('faq'));
        }
    }

    public function update($id)
    {
        $row = $this->Faq_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('faq/update_action'),
                'id' => set_value('id', $row->id),
                'kategori' => set_value('kategori', $row->kategori),
                'pertanyaan' => set_value('pertanyaan', $row->pertanyaan),
                'jawaban' => set_value('jawaban', $row->jawaban),
                'status' => set_value('status', $row->status),
                'nama' => set_value('nama', $row->nama),
                'email' => set_value('email', $row->email),
            );
            $this->load->view('panel/header');
            $this->load->view('faq_form', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faq'));
        }
    }

    public function update_action()
    {
        
            $data = array(
                'kategori' => $this->input->post('kategori', TRUE),
                'pertanyaan' => $this->input->post('pertanyaan', TRUE),
                'jawaban' => $this->input->post('jawaban', TRUE),
                'status' => "Close",
                'nama' => $this->input->post('nama', TRUE),
                'email' => $this->input->post('email', TRUE),
            );

            $this->Faq_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('faq'));
        
    }

    public function delete($id)
    {
        $row = $this->Faq_model->get_by_id($id);

        if ($row) {
            $this->Faq_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('faq'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faq'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
        $this->form_validation->set_rules('pertanyaan', 'pertanyaan', 'trim|required');
        $this->form_validation->set_rules('jawaban', 'jawaban', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Faq.php */
/* Location: ./application/controllers/Faq.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-25 08:20:56 */
/* http://harviacode.com */