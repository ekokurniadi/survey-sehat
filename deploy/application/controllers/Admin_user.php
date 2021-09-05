<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_user extends MY_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_user_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $admin_user = $this->Admin_user_model->get_all();

        $data = array(
            'admin_user_data' => $admin_user
        );
        $this->load->view('panel/header');
        $this->load->view('admin_user_list', $data);
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
                $where .= " AND (foto_profil LIKE '%$search%'
                            OR nama LIKE '%$search%'
                            OR email LIKE '%$search%'
                            OR password LIKE '%$search%'
                            OR level LIKE '%$search%'
                            OR alamat LIKE '%$search%'
                            )";
            }
        }

        if (isset($orders)) {
            if ($orders != '') {
                $order = $orders;
                $order_column = ['foto_profil', 'nama', 'email', 'password', 'level', 'alamat',];
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
        $fetch = $this->db->query("SELECT * from admin_user $where");
        $fetch2 = $this->db->query("SELECT * from admin_user ");
        foreach ($fetch->result() as $rows) {
            $button1 = "<a href=" . base_url('admin_user/read/' . $rows->id) . " class='btn btn-icon icon-left btn-light'><i class='fa fa-eye'></i></a>";
            $button2 = "<a href=" . base_url('admin_user/update/' . $rows->id) . " class='btn btn-icon icon-left btn-warning'><i class='fa fa-pencil-square-o'></i></a>";
            $button3 = "<a href=" . base_url('admin_user/delete/' . $rows->id) . " class='btn btn-icon icon-left btn-danger' onclick='javasciprt: return confirm(\'Are You Sure ?\')''><i class='fa fa-trash'></i></a>";
            $sub_array = array();
            $sub_array[] = $index;
            $sub_array[] = "<img src=" . base_url() . 'image/' . $rows->foto_profil . " class='img-fluid'>";
            $sub_array[] = $rows->nama;
            $sub_array[] = $rows->email;
            $sub_array[] = $rows->password;
            $sub_array[] = $rows->level;
            $sub_array[] = $rows->alamat;

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
        $row = $this->Admin_user_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'foto_profil' => $row->foto_profil,
                'nama' => $row->nama,
                'email' => $row->email,
                'password' => $row->password,
                'level' => $row->level,
                'alamat' => $row->alamat,
            );
            $this->load->view('panel/header');
            $this->load->view('admin_user_read', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin_user'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin_user/create_action'),
            'id' => set_value('id'),
            'foto_profil' => set_value('foto_profil'),
            'nama' => set_value('nama'),
            'email' => set_value('email'),
            'password' => set_value('password'),
            'level' => set_value('level'),
            'alamat' => set_value('alamat'),
        );

        $this->load->view('panel/header');
        $this->load->view('admin_user_form', $data);
        $this->load->view('panel/footer');
    }

    public function create_action()
    {

        $data = array(
            'foto_profil' =>  upload_gambar_biasa('foto_profil', 'image/', 'jpeg|png|jpg|gif|svg|SVG', 10000, 'foto_profil'),
            'nama' => $this->input->post('nama', TRUE),
            'email' => $this->input->post('email', TRUE),
            'password' => $this->input->post('password', TRUE),
            'level' => $this->input->post('level', TRUE),
            'alamat' => $this->input->post('alamat', TRUE),
        );

        $this->Admin_user_model->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(site_url('admin_user'));
    }

    public function update($id)
    {
        $row = $this->Admin_user_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin_user/update_action'),
                'id' => set_value('id', $row->id),
                'foto_profil' => set_value('foto_profil', $row->foto_profil),
                'nama' => set_value('nama', $row->nama),
                'email' => set_value('email', $row->email),
                'password' => set_value('password', $row->password),
                'level' => set_value('level', $row->level),
                'alamat' => set_value('alamat', $row->alamat),
            );
            $this->load->view('panel/header');
            $this->load->view('admin_user_form', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin_user'));
        }
    }

    public function update_action()
    {
        $id = $this->input->post('id', TRUE);
        $row = $this->Admin_user_model->get_by_id($id);

        $data = array(
            'foto_profil' => $_FILES['foto_profil']['name'] == "" ? $row->foto_profil : upload_gambar_biasa('foto_profil', 'image/', 'jpeg|png|jpg|gif|svg|SVG', 10000, 'foto_profil'),
            'nama' => $this->input->post('nama', TRUE),
            'email' => $this->input->post('email', TRUE),
            'password' => $this->input->post('password', TRUE),
            'level' => $this->input->post('level', TRUE),
            'alamat' => $this->input->post('alamat', TRUE),
        );

        $this->Admin_user_model->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('admin_user'));
    }

    public function delete($id)
    {
        $row = $this->Admin_user_model->get_by_id($id);

        if ($row) {
            $this->Admin_user_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin_user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin_user'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('foto_profil', 'foto profil', 'trim|required');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('level', 'level', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Admin_user.php */
/* Location: ./application/controllers/Admin_user.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-28 10:41:43 */
/* http://harviacode.com */