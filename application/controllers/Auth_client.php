<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed 
 * for (all) non logged in users
 */
class Auth_client extends MY_Controller
{

	public function logged_in_check()
	{
		if ($this->session->userdata("logged_in")) {
			redirect("publics");
		}
	}

	public function index()
	{
		$this->logged_in_check();

		$this->load->library('form_validation');
		$this->form_validation->set_rules("username", "username", "trim|required");
		$this->form_validation->set_rules("password", "password", "trim|required");
		if ($this->form_validation->run() == true) {
			$this->load->model('auth_model_client', 'auth');
			// check the username & password of user
			$status = $this->auth->validate();
			if ($status == ERR_INVALID_USERNAME) {
				$_SESSION['pesan'] = "User tidak terdaftar";
				$_SESSION['tipe'] = "error";
			} elseif ($status == ERR_INVALID_PASSWORD) {
				$_SESSION['pesan'] = "User tidak terdaftar";
				$_SESSION['tipe'] = "error";
			} else {
				// success
				// store the user data to session
				$this->session->set_userdata($this->auth->get_data());
				$this->session->set_userdata("logged_in", true);
				$_SESSION['pesan'] = "Selamat datang kembali " . $_SESSION['nama'] . ". Selamat datang di Survey Sehat.";
				$_SESSION['tipe'] = "success";
				redirect("publics");
			}
		}
		$_SESSION['pesan'] = "User tidak terdaftar";
		$_SESSION['tipe'] = "error";
		redirect("publics");
	}

	public function logout()
	{
		$this->session->unset_userdata("logged_in");
		$this->session->sess_destroy();
		$_SESSION['pesan'] = "Anda berhasil Logout !";
		$_SESSION['tipe'] = "success";
		redirect("publics");
	}

	public function forget()
	{
		$this->load->view('forget');
	}
}
