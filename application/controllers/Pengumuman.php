<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengumuman extends MY_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Pengumuman_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $Pengumuman = $this->Pengumuman_model->get_all();

        $data = array(
            'Pengumuman_data' => $Pengumuman
        );
        $this->load->view('panel/header');
        $this->load->view('pengumuman_list', $data);
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
                $where .= " AND (foto_cover LIKE '%$search%'
	    OR judul LIKE '%$search%'
	    OR tanggal LIKE '%$search%'
	    OR isi LIKE '%$search%'
	 )";
            }
        }

        if (isset($orders)) {
            if ($orders != '') {
                $order = $orders;
                $order_column = ['foto_cover', 'judul', 'tanggal', 'isi',];
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
        $fetch = $this->db->query("SELECT * from pengumuman $where");
        $fetch2 = $this->db->query("SELECT * from pengumuman ");
        foreach ($fetch->result() as $rows) {
            $button1 = "<a href=" . base_url('pengumuman/read/' . $rows->id) . " class='btn btn-icon icon-left btn-light'><i class='fa fa-eye'></i></a>";
            $button2 = "<a href=" . base_url('pengumuman/update/' . $rows->id) . " class='btn btn-icon icon-left btn-warning'><i class='fa fa-pencil-square-o'></i></a>";
            $button3 = "<a href=" . base_url('pengumuman/delete/' . $rows->id) . " class='btn btn-icon icon-left btn-danger' onclick='javasciprt: return confirm(\'Are You Sure ?\')''><i class='fa fa-trash'></i></a>";
            $sub_array = array();
            $sub_array[] = $index;
            $sub_array[] = "<img src='" . base_url() . "image/" . $rows->foto_cover . "' class='img-fluid'>";
            $sub_array[] = $rows->judul;
            $sub_array[] = $rows->tanggal;
            $sub_array[] = $rows->isi;

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
        $row = $this->Pengumuman_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'foto_cover' => $row->foto_cover,
                'judul' => $row->judul,
                'tanggal' => $row->tanggal,
                'isi' => $row->isi,
            );
            $this->load->view('panel/header');
            $this->load->view('pengumuman_read', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengumuman'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pengumuman/create_action'),
            'id' => set_value('id'),
            'foto_cover' => set_value('foto_cover'),
            'judul' => set_value('judul'),
            'tanggal' => set_value('tanggal'),
            'isi' => set_value('isi'),
        );

        $this->load->view('panel/header');
        $this->load->view('pengumuman', $data);
        $this->load->view('panel/footer');
    }

    public function create_action()
    {

        $data = array(
            'foto_cover' => upload_gambar_biasa('foto_cover', 'image/', 'jpeg|png|jpg|gif|svg|SVG', 10000, 'foto_cover'),
            'judul' => $this->input->post('judul', TRUE),
            'tanggal' => $this->input->post('tanggal', TRUE),
            'isi' => $this->input->post('isi', TRUE),
        );

        $this->Pengumuman_model->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(site_url('pengumuman'));
    }

    public function update($id)
    {
        $row = $this->Pengumuman_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pengumuman/update_action'),
                'id' => set_value('id', $row->id),
                'foto_cover' => set_value('foto_cover', $row->foto_cover),
                'judul' => set_value('judul', $row->judul),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'isi' => set_value('isi', $row->isi),
            );
            $this->load->view('panel/header');
            $this->load->view('pengumuman', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengumuman'));
        }
    }

    public function update_action()
    {
        $id = $this->input->post('id', TRUE);
        $row = $this->Pengumuman_model->get_by_id($id);
        $data = array(
            'foto_cover' => $_FILES['foto_cover']['name'] == "" ? $row->foto_cover : upload_gambar_biasa('foto_cover', 'image/', 'jpeg|png|jpg|gif|svg|SVG', 10000, 'foto_cover'),
            'judul' => $this->input->post('judul', TRUE),
            'tanggal' => $this->input->post('tanggal', TRUE),
            'isi' => $this->input->post('isi', TRUE),
        );

        $this->Pengumuman_model->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('pengumuman'));
    }

    public function delete($id)
    {
        $row = $this->Pengumuman_model->get_by_id($id);

        if ($row) {
            $this->Pengumuman_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pengumuman'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengumuman'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('foto_cover', 'foto cover', 'trim|required');
        $this->form_validation->set_rules('judul', 'judul', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
        $this->form_validation->set_rules('isi', 'isi', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Pengumuman.php */
/* Location: ./application/controllers/Pengumuman.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-25 08:21:26 */
/* http://harviacode.com */