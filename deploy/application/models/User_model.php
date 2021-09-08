<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model
{

    public $table = 'user';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('foto_profil', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('no_telp', $q);
	$this->db->or_like('jenis_kelamin', $q);
	$this->db->or_like('tanggal_lahir', $q);
	$this->db->or_like('no_ktp', $q);
	$this->db->or_like('status_pernikahan', $q);
	$this->db->or_like('pekerjaan', $q);
	$this->db->or_like('tingkat_pendidikan', $q);
	$this->db->or_like('bidang_industri_pekerjaan', $q);
	$this->db->or_like('profesi', $q);
	$this->db->or_like('provinsi', $q);
	$this->db->or_like('kota', $q);
	$this->db->or_like('tipe_tempat_tinggal', $q);
	$this->db->or_like('kartu_provider', $q);
	$this->db->or_like('jumlah_anak', $q);
	$this->db->or_like('jumlah_keluarga', $q);
	$this->db->or_like('jumlah_pendapatan_perbulan', $q);
	$this->db->or_like('jumlah_pendapatan_keluarga_perbulan', $q);
	$this->db->or_like('telepon_rumah', $q);
	$this->db->or_like('rekening_bank', $q);
	$this->db->or_like('mobil_yang_dimiliki', $q);
	$this->db->or_like('motor_yang_dimiliki', $q);
	$this->db->or_like('hp_yang_dimiliki', $q);
	$this->db->or_like('level', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('foto_profil', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('no_telp', $q);
	$this->db->or_like('jenis_kelamin', $q);
	$this->db->or_like('tanggal_lahir', $q);
	$this->db->or_like('no_ktp', $q);
	$this->db->or_like('status_pernikahan', $q);
	$this->db->or_like('pekerjaan', $q);
	$this->db->or_like('tingkat_pendidikan', $q);
	$this->db->or_like('bidang_industri_pekerjaan', $q);
	$this->db->or_like('profesi', $q);
	$this->db->or_like('provinsi', $q);
	$this->db->or_like('kota', $q);
	$this->db->or_like('tipe_tempat_tinggal', $q);
	$this->db->or_like('kartu_provider', $q);
	$this->db->or_like('jumlah_anak', $q);
	$this->db->or_like('jumlah_keluarga', $q);
	$this->db->or_like('jumlah_pendapatan_perbulan', $q);
	$this->db->or_like('jumlah_pendapatan_keluarga_perbulan', $q);
	$this->db->or_like('telepon_rumah', $q);
	$this->db->or_like('rekening_bank', $q);
	$this->db->or_like('mobil_yang_dimiliki', $q);
	$this->db->or_like('motor_yang_dimiliki', $q);
	$this->db->or_like('hp_yang_dimiliki', $q);
	$this->db->or_like('level', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-04 08:09:06 */
/* http://harviacode.com */