<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengajuan_penukaran_poin extends MY_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Pengajuan_penukaran_poin_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $pengajuan_penukaran_poin = $this->Pengajuan_penukaran_poin_model->get_all();

        $data = array(
            'pengajuan_penukaran_poin_data' => $pengajuan_penukaran_poin
        );
        $this->load->view('panel/header');
        $this->load->view('pengajuan_penukaran_poin_list', $data);
        $this->load->view('panel/footer');
    }

    public function proses($id)
    {
        $this->Pengajuan_penukaran_poin_model->update($id, array('status' => 2));
        $row = $this->Pengajuan_penukaran_poin_model->get_by_id($id);
        $this->db->insert('notifikasi',array('jenis'=>1,'dari'=>$row->id_user,'pesan'=>'Selamat pengajuan anda sedang diproses oleh admin.','status'=>0,'created_at'=>date('Y-m-d H:i:s'),'link'=>'#','id_user'=>0));
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('pengajuan_penukaran_poin'));
    }
    public function reject($id)
    {
        $this->Pengajuan_penukaran_poin_model->update($id, array('status' => 3));
        $row = $this->Pengajuan_penukaran_poin_model->get_by_id($id);
        $this->db->insert('notifikasi',array('jenis'=>1,'dari'=>$row->id_user,'pesan'=>'Mohon maaf pengajuan penukaran poin anda ditolak oleh admin.','status'=>0,'created_at'=>date('Y-m-d H:i:s'),'link'=>'#','id_user'=>0));
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('pengajuan_penukaran_poin'));
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
                $where .= " AND (tanggal_pengajuan LIKE '%$search%'
	 OR id_user LIKE '%$search%'
	 OR poin LIKE '%$search%'
	 OR status LIKE '%$search%'
	 OR approved_date LIKE '%$search%'
	 OR approved_by LIKE '%$search%'
	 OR jenis_penukaran LIKE '%$search%'
	 OR catatan LIKE '%$search%'
	 )";
            }
        }

        if (isset($orders)) {
            if ($orders != '') {
                $order = $orders;
                $order_column = ['tanggal_pengajuan', 'id_user', 'poin', 'status', 'approved_date', 'approved_by', 'jenis_penukaran', 'catatan',];
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
        $fetch = $this->db->query("SELECT * from pengajuan_penukaran_poin $where");
        $fetch2 = $this->db->query("SELECT * from pengajuan_penukaran_poin ");
        foreach ($fetch->result() as $rows) {
            $button1 = "<a href=" . base_url('pengajuan_penukaran_poin/proses/' . $rows->id) . " class='btn btn-icon icon-left btn-primary'> Proses</a>";
            $button2 = "<a href=" . base_url('pengajuan_penukaran_poin/reject/' . $rows->id) . " class='btn btn-icon icon-left btn-danger'>Reject</a>";

            $sub_array = array();
            if ($rows->status == 1) {
                $status = "Pengajuan";
            } elseif ($rows->status == 2) {
                $status = "Proses";
            } else {
                $status = "Rejected";
            }
            $sub_array[] = $index;
            $sub_array[] = formatTanggal($rows->tanggal_pengajuan);
            $sub_array[] = $this->db->get_where('user', array('id' => $rows->id_user))->row()->nama;
            $sub_array[] = $rows->poin;
            $sub_array[] = $status;
            $sub_array[] = $rows->approved_date;
            $sub_array[] = $this->db->get_where('admin_user', array('id' => $rows->approved_by))->row()->nama;
            $sub_array[] = $rows->jenis_penukaran;
            $sub_array[] = $rows->catatan;

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
        $row = $this->Pengajuan_penukaran_poin_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'tanggal_pengajuan' => $row->tanggal_pengajuan,
                'id_user' => $row->id_user,
                'poin' => $row->poin,
                'status' => $row->status,
                'approved_date' => $row->approved_date,
                'approved_by' => $row->approved_by,
                'jenis_penukaran' => $row->jenis_penukaran,
                'catatan' => $row->catatan,
            );
            $this->load->view('panel/header');
            $this->load->view('pengajuan_penukaran_poin_read', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengajuan_penukaran_poin'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pengajuan_penukaran_poin/create_action'),
            'id' => set_value('id'),
            'tanggal_pengajuan' => set_value('tanggal_pengajuan'),
            'id_user' => set_value('id_user'),
            'poin' => set_value('poin'),
            'status' => set_value('status'),
            'approved_date' => set_value('approved_date'),
            'approved_by' => set_value('approved_by'),
            'jenis_penukaran' => set_value('jenis_penukaran'),
            'catatan' => set_value('catatan'),
        );

        $this->load->view('panel/header');
        $this->load->view('pengajuan_penukaran_poin_form', $data);
        $this->load->view('panel/footer');
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'tanggal_pengajuan' => $this->input->post('tanggal_pengajuan', TRUE),
                'id_user' => $this->input->post('id_user', TRUE),
                'poin' => $this->input->post('poin', TRUE),
                'status' => $this->input->post('status', TRUE),
                'approved_date' => $this->input->post('approved_date', TRUE),
                'approved_by' => $this->input->post('approved_by', TRUE),
                'jenis_penukaran' => $this->input->post('jenis_penukaran', TRUE),
                'catatan' => $this->input->post('catatan', TRUE),
            );

            $this->Pengajuan_penukaran_poin_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pengajuan_penukaran_poin'));
        }
    }

    public function update($id)
    {
        $row = $this->Pengajuan_penukaran_poin_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pengajuan_penukaran_poin/update_action'),
                'id' => set_value('id', $row->id),
                'tanggal_pengajuan' => set_value('tanggal_pengajuan', $row->tanggal_pengajuan),
                'id_user' => set_value('id_user', $row->id_user),
                'poin' => set_value('poin', $row->poin),
                'status' => set_value('status', $row->status),
                'approved_date' => set_value('approved_date', $row->approved_date),
                'approved_by' => set_value('approved_by', $row->approved_by),
                'jenis_penukaran' => set_value('jenis_penukaran', $row->jenis_penukaran),
                'catatan' => set_value('catatan', $row->catatan),
            );
            $this->load->view('panel/header');
            $this->load->view('pengajuan_penukaran_poin_form', $data);
            $this->load->view('panel/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengajuan_penukaran_poin'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'tanggal_pengajuan' => $this->input->post('tanggal_pengajuan', TRUE),
                'id_user' => $this->input->post('id_user', TRUE),
                'poin' => $this->input->post('poin', TRUE),
                'status' => $this->input->post('status', TRUE),
                'approved_date' => $this->input->post('approved_date', TRUE),
                'approved_by' => $this->input->post('approved_by', TRUE),
                'jenis_penukaran' => $this->input->post('jenis_penukaran', TRUE),
                'catatan' => $this->input->post('catatan', TRUE),
            );

            $this->Pengajuan_penukaran_poin_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pengajuan_penukaran_poin'));
        }
    }

    public function delete($id)
    {
        $row = $this->Pengajuan_penukaran_poin_model->get_by_id($id);

        if ($row) {
            $this->Pengajuan_penukaran_poin_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pengajuan_penukaran_poin'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengajuan_penukaran_poin'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('tanggal_pengajuan', 'tanggal pengajuan', 'trim|required');
        $this->form_validation->set_rules('id_user', 'id user', 'trim|required');
        $this->form_validation->set_rules('poin', 'poin', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        $this->form_validation->set_rules('approved_date', 'approved date', 'trim|required');
        $this->form_validation->set_rules('approved_by', 'approved by', 'trim|required');
        $this->form_validation->set_rules('jenis_penukaran', 'jenis penukaran', 'trim|required');
        $this->form_validation->set_rules('catatan', 'catatan', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Pengajuan_penukaran_poin.php */
/* Location: ./application/controllers/Pengajuan_penukaran_poin.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-30 07:07:47 */
/* http://harviacode.com */