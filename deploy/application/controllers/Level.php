<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Level extends MY_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Level_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $level = $this->Level_model->get_all();

        $data = array(
            'level_data' => $level
        );
        $this->load->view('panel/header');
        $this->load->view('level_list', $data);
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
                $where .= " AND (level LIKE '%$search%'
	 )";
            }
        }

        if (isset($orders)) {
            if ($orders != '') {
                $order = $orders;
                $order_column = ['level',];
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
        $fetch = $this->db->query("SELECT * from level $where");
        $fetch2 = $this->db->query("SELECT * from level ");
        foreach ($fetch->result() as $rows) {
            // $button1 = "<a href=" . base_url('level/read/' . $rows->id) . " class='btn btn-icon icon-left btn-light'><i class='fa fa-eye'></i></a>";
            $button2 = "<a href=" . base_url('level/update/' . $rows->id) . " class='btn btn-icon icon-left btn-warning'><i class='fa fa-pencil-square-o'></i></a>";
            $button3 = "<a href=" . base_url('level/delete/' . $rows->id) . " class='btn btn-icon icon-left btn-danger' onclick='javasciprt: return confirm(\'Are You Sure ?\')''><i class='fa fa-trash'></i></a>";
            $button1 = "<a href=" . base_url('level/setting/' . $rows->id) . " class='btn btn-icon icon-left btn-primary'><i class='fa fa-cogs'></i></a>";
            $sub_array = array();
            $sub_array[] = $index;
            $sub_array[] = $rows->level;

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

    public function setting($id)
    {
        $row = $this->Level_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Save All',
                'action' => site_url('level/settings_action'),
                'id' => set_value('id', $row->id),
                'level' => set_value('level', $row->level),
            );
            $this->load->view('panel/header');
            $this->load->view('level_setting_form', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('level'));
        }
    }

    public function settings_action()
    {

        $id         = $this->input->post('level');
        $jum_data   = $this->input->post('jum_data');
        $id_menu    = $this->input->post('menu');
        $cek = $this->db->query("SELECT * FROM access_level WHERE user_level = '$id'");
        if (count($cek) == 0) {
            for ($i = 1; $i <= $jum_data; $i++) {
                if (isset($_POST["status" . $i . ""])) $akses = 1;
                else $akses = 0;
                $id_menu     = $_POST["menu" . $i . ""];
                $data['user_level']  = $id;
                $data['menu'] = $id_menu;
                $data['status'] = $akses;

                // print_r($data);
                $testb = $this->db->insert('access_level', $data);
            }
        } else {
            $del = $this->db->query("DELETE FROM access_level WHERE user_level = '$id'");
            for ($i = 1; $i <= $jum_data; $i++) {
                if (isset($_POST["status" . $i . ""])) $akses = 1;
                else $akses = 0;
                $id_menu     = $_POST["menu" . $i . ""];
                $data['user_level']  = $id;
                $data['menu'] = $id_menu;
                $data['status'] = $akses;

                // print_r($data);
                $testb = $this->db->insert('access_level', $data);
            }
        }
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('level'));
    }

    public function read($id)
    {
        $row = $this->Level_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'level' => $row->level,
            );
            $this->load->view('panel/header');
            $this->load->view('level_read', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('level'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('level/create_action'),
            'id' => set_value('id'),
            'level' => set_value('level'),
        );

        $this->load->view('panel/header');
        $this->load->view('level_form', $data);
        $this->load->view('panel/footer');
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'level' => $this->input->post('level', TRUE),
            );

            $this->Level_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('level'));
        }
    }

    public function update($id)
    {
        $row = $this->Level_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('level/update_action'),
                'id' => set_value('id', $row->id),
                'level' => set_value('level', $row->level),
            );
            $this->load->view('panel/header');
            $this->load->view('level_form', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('level'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'level' => $this->input->post('level', TRUE),
            );

            $this->Level_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('level'));
        }
    }

    public function delete($id)
    {
        $row = $this->Level_model->get_by_id($id);

        if ($row) {
            $this->Level_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('level'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('level'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('level', 'level', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Level.php */
/* Location: ./application/controllers/Level.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-11 12:07:47 */
/* http://harviacode.com */