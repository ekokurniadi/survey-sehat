<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends MY_Controller {

    protected $access = array('Admin', 'Pimpinan','Finance');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $user = $this->User_model->get_all();

        $data = array(
            'user_data' => $user
        );
        $this->load->view('header');
        $this->load->view('user_list', $data);
        $this->load->view('footer');
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
            $where .= " AND (reg_name LIKE '%$search%'
                            OR reg_code LIKE '%$search%'
                            OR area_name LIKE '%$search%'
                            OR area_code LIKE '%$search%'
                            )";
          }
      }

    if (isset($orders)) {
        if ($orders != '') {
          $order = $orders;
          $order_column = ['reg_name','reg_code','area_code','area_name','ULP','ULP_Kode'];
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
    $fetch = $this->db->query("SELECT * from user $where");
    $fetch2 = $this->db->query("SELECT * from user ");
    foreach($fetch->result() as $rows){
        $button1= "<a href=".base_url('user/read/'.$rows->id)." class='btn btn-icon icon-left btn-light'><i class='fa fa-eye'></i></a>";
        $button2= "<a href=".base_url('user/update/'.$rows->id)." class='btn btn-icon icon-left btn-warning'><i class='fa fa-pencil-square-o'></i></a>";
        $button3 = "<a href=".base_url('user/delete/'.$rows->id)." class='btn btn-icon icon-left btn-danger' onclick='javasciprt: return confirm(\"Are You Sure ?\")''><i class='fa fa-trash'></i></a>";
        $sub_array=array();
        $sub_array[]=$index;
        $sub_array[]=$rows->reg_name;
        $sub_array[]=$rows->reg_code;
        $sub_array[]=$rows->area_name;
        $sub_array[]=$rows->area_code;
        $sub_array[]=$rows->ULP;
        $sub_array[]=$rows->ULP_Kode;
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
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'foto_profil' => $row->foto_profil,
		'nama' => $row->nama,
		'email' => $row->email,
		'password' => $row->password,
		'no_telp' => $row->no_telp,
		'jenis_kelamin' => $row->jenis_kelamin,
		'tanggal_lahir' => $row->tanggal_lahir,
		'no_ktp' => $row->no_ktp,
		'status_pernikahan' => $row->status_pernikahan,
		'pekerjaan' => $row->pekerjaan,
		'tingkat_pendidikan' => $row->tingkat_pendidikan,
		'bidang_industri_pekerjaan' => $row->bidang_industri_pekerjaan,
		'profesi' => $row->profesi,
		'provinsi' => $row->provinsi,
		'kota' => $row->kota,
		'tipe_tempat_tinggal' => $row->tipe_tempat_tinggal,
		'kartu_provider' => $row->kartu_provider,
		'jumlah_anak' => $row->jumlah_anak,
		'jumlah_keluarga' => $row->jumlah_keluarga,
		'jumlah_pendapatan_perbulan' => $row->jumlah_pendapatan_perbulan,
		'jumlah_pendapatan_keluarga_perbulan' => $row->jumlah_pendapatan_keluarga_perbulan,
		'telepon_rumah' => $row->telepon_rumah,
		'rekening_bank' => $row->rekening_bank,
		'mobil_yang_dimiliki' => $row->mobil_yang_dimiliki,
		'motor_yang_dimiliki' => $row->motor_yang_dimiliki,
		'hp_yang_dimiliki' => $row->hp_yang_dimiliki,
		'level' => $row->level,
	    );
            $this->load->view('header');
            $this->load->view('user_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
	    'id' => set_value('id'),
	    'foto_profil' => set_value('foto_profil'),
	    'nama' => set_value('nama'),
	    'email' => set_value('email'),
	    'password' => set_value('password'),
	    'no_telp' => set_value('no_telp'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	    'no_ktp' => set_value('no_ktp'),
	    'status_pernikahan' => set_value('status_pernikahan'),
	    'pekerjaan' => set_value('pekerjaan'),
	    'tingkat_pendidikan' => set_value('tingkat_pendidikan'),
	    'bidang_industri_pekerjaan' => set_value('bidang_industri_pekerjaan'),
	    'profesi' => set_value('profesi'),
	    'provinsi' => set_value('provinsi'),
	    'kota' => set_value('kota'),
	    'tipe_tempat_tinggal' => set_value('tipe_tempat_tinggal'),
	    'kartu_provider' => set_value('kartu_provider'),
	    'jumlah_anak' => set_value('jumlah_anak'),
	    'jumlah_keluarga' => set_value('jumlah_keluarga'),
	    'jumlah_pendapatan_perbulan' => set_value('jumlah_pendapatan_perbulan'),
	    'jumlah_pendapatan_keluarga_perbulan' => set_value('jumlah_pendapatan_keluarga_perbulan'),
	    'telepon_rumah' => set_value('telepon_rumah'),
	    'rekening_bank' => set_value('rekening_bank'),
	    'mobil_yang_dimiliki' => set_value('mobil_yang_dimiliki'),
	    'motor_yang_dimiliki' => set_value('motor_yang_dimiliki'),
	    'hp_yang_dimiliki' => set_value('hp_yang_dimiliki'),
	    'level' => set_value('level'),
	);

        $this->load->view('header');
        $this->load->view('user_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'foto_profil' => $this->input->post('foto_profil',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'email' => $this->input->post('email',TRUE),
		'password' => $this->input->post('password',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'no_ktp' => $this->input->post('no_ktp',TRUE),
		'status_pernikahan' => $this->input->post('status_pernikahan',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
		'tingkat_pendidikan' => $this->input->post('tingkat_pendidikan',TRUE),
		'bidang_industri_pekerjaan' => $this->input->post('bidang_industri_pekerjaan',TRUE),
		'profesi' => $this->input->post('profesi',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'tipe_tempat_tinggal' => $this->input->post('tipe_tempat_tinggal',TRUE),
		'kartu_provider' => $this->input->post('kartu_provider',TRUE),
		'jumlah_anak' => $this->input->post('jumlah_anak',TRUE),
		'jumlah_keluarga' => $this->input->post('jumlah_keluarga',TRUE),
		'jumlah_pendapatan_perbulan' => $this->input->post('jumlah_pendapatan_perbulan',TRUE),
		'jumlah_pendapatan_keluarga_perbulan' => $this->input->post('jumlah_pendapatan_keluarga_perbulan',TRUE),
		'telepon_rumah' => $this->input->post('telepon_rumah',TRUE),
		'rekening_bank' => $this->input->post('rekening_bank',TRUE),
		'mobil_yang_dimiliki' => $this->input->post('mobil_yang_dimiliki',TRUE),
		'motor_yang_dimiliki' => $this->input->post('motor_yang_dimiliki',TRUE),
		'hp_yang_dimiliki' => $this->input->post('hp_yang_dimiliki',TRUE),
		'level' => $this->input->post('level',TRUE),
	    );

            $this->User_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
		'id' => set_value('id', $row->id),
		'foto_profil' => set_value('foto_profil', $row->foto_profil),
		'nama' => set_value('nama', $row->nama),
		'email' => set_value('email', $row->email),
		'password' => set_value('password', $row->password),
		'no_telp' => set_value('no_telp', $row->no_telp),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'no_ktp' => set_value('no_ktp', $row->no_ktp),
		'status_pernikahan' => set_value('status_pernikahan', $row->status_pernikahan),
		'pekerjaan' => set_value('pekerjaan', $row->pekerjaan),
		'tingkat_pendidikan' => set_value('tingkat_pendidikan', $row->tingkat_pendidikan),
		'bidang_industri_pekerjaan' => set_value('bidang_industri_pekerjaan', $row->bidang_industri_pekerjaan),
		'profesi' => set_value('profesi', $row->profesi),
		'provinsi' => set_value('provinsi', $row->provinsi),
		'kota' => set_value('kota', $row->kota),
		'tipe_tempat_tinggal' => set_value('tipe_tempat_tinggal', $row->tipe_tempat_tinggal),
		'kartu_provider' => set_value('kartu_provider', $row->kartu_provider),
		'jumlah_anak' => set_value('jumlah_anak', $row->jumlah_anak),
		'jumlah_keluarga' => set_value('jumlah_keluarga', $row->jumlah_keluarga),
		'jumlah_pendapatan_perbulan' => set_value('jumlah_pendapatan_perbulan', $row->jumlah_pendapatan_perbulan),
		'jumlah_pendapatan_keluarga_perbulan' => set_value('jumlah_pendapatan_keluarga_perbulan', $row->jumlah_pendapatan_keluarga_perbulan),
		'telepon_rumah' => set_value('telepon_rumah', $row->telepon_rumah),
		'rekening_bank' => set_value('rekening_bank', $row->rekening_bank),
		'mobil_yang_dimiliki' => set_value('mobil_yang_dimiliki', $row->mobil_yang_dimiliki),
		'motor_yang_dimiliki' => set_value('motor_yang_dimiliki', $row->motor_yang_dimiliki),
		'hp_yang_dimiliki' => set_value('hp_yang_dimiliki', $row->hp_yang_dimiliki),
		'level' => set_value('level', $row->level),
	    );
            $this->load->view('header');
            $this->load->view('user_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'foto_profil' => $this->input->post('foto_profil',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'email' => $this->input->post('email',TRUE),
		'password' => $this->input->post('password',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'no_ktp' => $this->input->post('no_ktp',TRUE),
		'status_pernikahan' => $this->input->post('status_pernikahan',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
		'tingkat_pendidikan' => $this->input->post('tingkat_pendidikan',TRUE),
		'bidang_industri_pekerjaan' => $this->input->post('bidang_industri_pekerjaan',TRUE),
		'profesi' => $this->input->post('profesi',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'tipe_tempat_tinggal' => $this->input->post('tipe_tempat_tinggal',TRUE),
		'kartu_provider' => $this->input->post('kartu_provider',TRUE),
		'jumlah_anak' => $this->input->post('jumlah_anak',TRUE),
		'jumlah_keluarga' => $this->input->post('jumlah_keluarga',TRUE),
		'jumlah_pendapatan_perbulan' => $this->input->post('jumlah_pendapatan_perbulan',TRUE),
		'jumlah_pendapatan_keluarga_perbulan' => $this->input->post('jumlah_pendapatan_keluarga_perbulan',TRUE),
		'telepon_rumah' => $this->input->post('telepon_rumah',TRUE),
		'rekening_bank' => $this->input->post('rekening_bank',TRUE),
		'mobil_yang_dimiliki' => $this->input->post('mobil_yang_dimiliki',TRUE),
		'motor_yang_dimiliki' => $this->input->post('motor_yang_dimiliki',TRUE),
		'hp_yang_dimiliki' => $this->input->post('hp_yang_dimiliki',TRUE),
		'level' => $this->input->post('level',TRUE),
	    );

            $this->User_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('foto_profil', 'foto profil', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('no_ktp', 'no ktp', 'trim|required');
	$this->form_validation->set_rules('status_pernikahan', 'status pernikahan', 'trim|required');
	$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
	$this->form_validation->set_rules('tingkat_pendidikan', 'tingkat pendidikan', 'trim|required');
	$this->form_validation->set_rules('bidang_industri_pekerjaan', 'bidang industri pekerjaan', 'trim|required');
	$this->form_validation->set_rules('profesi', 'profesi', 'trim|required');
	$this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
	$this->form_validation->set_rules('kota', 'kota', 'trim|required');
	$this->form_validation->set_rules('tipe_tempat_tinggal', 'tipe tempat tinggal', 'trim|required');
	$this->form_validation->set_rules('kartu_provider', 'kartu provider', 'trim|required');
	$this->form_validation->set_rules('jumlah_anak', 'jumlah anak', 'trim|required');
	$this->form_validation->set_rules('jumlah_keluarga', 'jumlah keluarga', 'trim|required');
	$this->form_validation->set_rules('jumlah_pendapatan_perbulan', 'jumlah pendapatan perbulan', 'trim|required|numeric');
	$this->form_validation->set_rules('jumlah_pendapatan_keluarga_perbulan', 'jumlah pendapatan keluarga perbulan', 'trim|required|numeric');
	$this->form_validation->set_rules('telepon_rumah', 'telepon rumah', 'trim|required');
	$this->form_validation->set_rules('rekening_bank', 'rekening bank', 'trim|required');
	$this->form_validation->set_rules('mobil_yang_dimiliki', 'mobil yang dimiliki', 'trim|required');
	$this->form_validation->set_rules('motor_yang_dimiliki', 'motor yang dimiliki', 'trim|required');
	$this->form_validation->set_rules('hp_yang_dimiliki', 'hp yang dimiliki', 'trim|required');
	$this->form_validation->set_rules('level', 'level', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-04 08:09:06 */
/* http://harviacode.com */