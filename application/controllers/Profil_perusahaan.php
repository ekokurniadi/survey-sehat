<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profil_perusahaan extends MY_Controller
{

    // protected $access = array('Admin', 'Pimpinan','Finance');

    function __construct()
    {
        parent::__construct();
        $this->load->model('Profil_perusahaan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $profil_perusahaan = $this->Profil_perusahaan_model->get_all();

        $data = array(
            'profil_perusahaan_data' => $profil_perusahaan
        );
        $this->load->view('panel/header');
        $this->load->view('profil_perusahaan_list', $data);
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
        // $searchingColumn;
        $result = array();
        if (isset($search)) {
            if ($search != '') {
                $searchingColumn = $search;
                $where .= " AND (nama_perusahaan LIKE '%$search%')";
            }
        }

        if (isset($orders)) {
            if ($orders != '') {
                $order = $orders;
                $order_column = ['nama_perusahaan'];
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
        $fetch = $this->db->query("SELECT * from profil_perusahaan $where");
        $fetch2 = $this->db->query("SELECT * from profil_perusahaan ");
        foreach ($fetch->result() as $rows) {
            $button1 = "<a href=" . base_url('profil_perusahaan/read/' . $rows->id) . " class='btn btn-icon icon-left btn-light'><i class='fa fa-eye'></i></a>";
            $button2 = "<a href=" . base_url('profil_perusahaan/update/' . $rows->id) . " class='btn btn-icon icon-left btn-warning'><i class='fa fa-pencil-square-o'></i></a>";
            // $button3 = "<a href=".base_url('profil_perusahaan/delete/'.$rows->id)." class='btn btn-icon icon-left btn-danger' onclick='javasciprt: return confirm("Are You Sure ?")''><i class='fa fa-trash'></i></a>";
            $sub_array = array();
            $sub_array[] = $index;
            $sub_array[] = $rows->nama_perusahaan;
            // $sub_array[] = $rows->sistem_operasi;
            $sub_array[] = "<img src='" . base_url() . 'image/' . $rows->gambar_sistem_operasi . "' alt='gambar' class='img-fluid'>";
            // $sub_array[] = $rows->pengenalan_perusahaan;
            $sub_array[] = $rows->visi_perusahaan;
            // $sub_array[] = $rows->isi_visi_perusahaan;
            $sub_array[] = $rows->misi_perusahaan;
            // $sub_array[] = $rows->isi_misi_perusahaan;
            $sub_array[] = $button1 . " " . $button2;
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
        $row = $this->Profil_perusahaan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'nama_perusahaan' => $row->nama_perusahaan,
                'sistem_operasi' => $row->sistem_operasi,
                'gambar_sistem_operasi' => $row->gambar_sistem_operasi,
                'pengenalan_perusahaan' => $row->pengenalan_perusahaan,
                'visi_perusahaan' => $row->visi_perusahaan,
                'isi_visi_perusahaan' => $row->isi_visi_perusahaan,
                'misi_perusahaan' => $row->misi_perusahaan,
                'isi_misi_perusahaan' => $row->isi_misi_perusahaan,
            );
            $this->load->view('panel/header');
            $this->load->view('profil_perusahaan_read', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profil_perusahaan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('profil_perusahaan/create_action'),
            'id' => set_value('id'),
            'nama_perusahaan' => set_value('nama_perusahaan'),
            'sistem_operasi' => set_value('sistem_operasi'),
            'gambar_sistem_operasi' => set_value('gambar_sistem_operasi'),
            'pengenalan_perusahaan' => set_value('pengenalan_perusahaan'),
            'visi_perusahaan' => set_value('visi_perusahaan'),
            'isi_visi_perusahaan' => set_value('isi_visi_perusahaan'),
            'misi_perusahaan' => set_value('misi_perusahaan'),
            'isi_misi_perusahaan' => set_value('isi_misi_perusahaan'),
        );

        $this->load->view('panel/header');
        $this->load->view('profil_perusahaan_form', $data);
        $this->load->view('panel/footer');
    }

    public function create_action()
    {
        $data = array(
            'nama_perusahaan' => $this->input->post('nama_perusahaan', TRUE),
            'sistem_operasi' => $this->input->post('sistem_operasi', TRUE),
            'gambar_sistem_operasi' => upload_gambar_biasa('gambar_sistem_operasi', 'image/', 'jpeg|png|jpg|gif|svg|SVG', 10000, 'gambar_sistem_operasi'),
            'pengenalan_perusahaan' => $this->input->post('pengenalan_perusahaan', TRUE),
            'visi_perusahaan' => $this->input->post('visi_perusahaan', TRUE),
            'isi_visi_perusahaan' => $this->input->post('isi_visi_perusahaan', TRUE),
            'misi_perusahaan' => $this->input->post('misi_perusahaan', TRUE),
            'isi_misi_perusahaan' => $this->input->post('isi_misi_perusahaan', TRUE),
        );


        $this->Profil_perusahaan_model->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(site_url('profil_perusahaan'));
    }

    public function update($id)
    {
        $row = $this->Profil_perusahaan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('profil_perusahaan/update_action'),
                'id' => set_value('id', $row->id),
                'nama_perusahaan' => set_value('nama_perusahaan', $row->nama_perusahaan),
                'sistem_operasi' => set_value('sistem_operasi', $row->sistem_operasi),
                'gambar_sistem_operasi' => set_value('gambar_sistem_operasi', $row->gambar_sistem_operasi),
                'pengenalan_perusahaan' => set_value('pengenalan_perusahaan', $row->pengenalan_perusahaan),
                'visi_perusahaan' => set_value('visi_perusahaan', $row->visi_perusahaan),
                'isi_visi_perusahaan' => set_value('isi_visi_perusahaan', $row->isi_visi_perusahaan),
                'misi_perusahaan' => set_value('misi_perusahaan', $row->misi_perusahaan),
                'isi_misi_perusahaan' => set_value('isi_misi_perusahaan', $row->isi_misi_perusahaan),
            );
            $this->load->view('panel/header');
            $this->load->view('profil_perusahaan_form', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profil_perusahaan'));
        }
    }

    public function update_action()
    {
        $id = $this->input->post('id', TRUE);
        $row = $this->Profil_perusahaan_model->get_by_id($id);

        $data = array(
            'nama_perusahaan' => $this->input->post('nama_perusahaan', TRUE),
            'sistem_operasi' => $this->input->post('sistem_operasi', TRUE),

            'gambar_sistem_operasi' => $_FILES['gambar_sistem_operasi']['name'] == "" ? $row->gambar_sistem_operasi : upload_gambar_biasa('gambar_sistem_operasi', 'image/', 'jpeg|png|jpg|gif|svg|SVG', 10000, 'gambar_sistem_operasi'),
            'pengenalan_perusahaan' => $this->input->post('pengenalan_perusahaan', TRUE),
            'visi_perusahaan' => $this->input->post('visi_perusahaan', TRUE),
            'isi_visi_perusahaan' => $this->input->post('isi_visi_perusahaan', TRUE),
            'misi_perusahaan' => $this->input->post('misi_perusahaan', TRUE),
            'isi_misi_perusahaan' => $this->input->post('isi_misi_perusahaan', TRUE),
        );

        $this->Profil_perusahaan_model->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('profil_perusahaan'));
    }

    public function delete($id)
    {
        $row = $this->Profil_perusahaan_model->get_by_id($id);

        if ($row) {
            $this->Profil_perusahaan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('profil_perusahaan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profil_perusahaan'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_perusahaan', 'nama perusahaan', 'trim|required');
        $this->form_validation->set_rules('sistem_operasi', 'sistem operasi', 'trim|required');
        $this->form_validation->set_rules('gambar_sistem_operasi', 'gambar sistem operasi', 'trim|required');
        $this->form_validation->set_rules('pengenalan_perusahaan', 'pengenalan perusahaan', 'trim|required');
        $this->form_validation->set_rules('visi_perusahaan', 'visi perusahaan', 'trim|required');
        $this->form_validation->set_rules('isi_visi_perusahaan', 'isi visi perusahaan', 'trim|required');
        $this->form_validation->set_rules('misi_perusahaan', 'misi perusahaan', 'trim|required');
        $this->form_validation->set_rules('isi_misi_perusahaan', 'isi misi perusahaan', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Profil_perusahaan.php */
/* Location: ./application/controllers/Profil_perusahaan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-05 21:15:12 */
/* http://harviacode.com */