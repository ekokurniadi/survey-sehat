<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Dashboard extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'user' => $this->db->get('user'),
        );

        $this->load->view('panel/header');
        $this->load->view('panel/index', $data);
        $this->load->view('panel/footer');
    }

    public function getNotification()
    {

        $notifPendaftaranDriver = $this->db->query("SELECT a.*,b.nama FROM notifikasi a join user b on a.dari=b.id where a.status=0 order by id desc");

        $result = array();
        $data = array();

        if ($notifPendaftaranDriver->num_rows() > 0) {
            foreach ($notifPendaftaranDriver->result() as $rows) {
                $sub_array = array();
            $sub_array[] = $rows->id;
            $sub_array[] = $rows->nama;
            $sub_array[] = $rows->pesan;
            $sub_array[] = base_url() .$rows->link;
            $sub_array[] = $rows->nama." " . $rows->pesan . " klik untuk melihat detail";
                $data[] = $sub_array;
            }
            echo json_encode(array(
                "total_notif" => $notifPendaftaranDriver->num_rows(),
                "pesan" => "Kamu memiliki " . $notifPendaftaranDriver->num_rows() . " pemberitahuan",
                "data" => $data,
            ));
        } else {
            echo json_encode(array(
                "total_notif" => $notifPendaftaranDriver->num_rows(),
                "pesan" => "Kamu memiliki " . $notifPendaftaranDriver->num_rows() . " pemberitahuan",
                "data" => $data,
            ));
        }
    }
}
