<?php 
 
 class Publics extends CI_Controller{
    public function index(){
        $this->load->view('client/header');
        $this->load->view('client/carousel');
        $this->load->view('client/kerjakan_survey');
        $this->load->view('client/banner');
        $this->load->view('client/index');
    }
 }

?>