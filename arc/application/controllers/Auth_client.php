<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed 
 * for (all) non logged in users
 */
class Auth_client extends MY_Controller {	

	public function logged_in_check()
	{	
		if ($this->session->userdata("logged_in")) {
            redirect("publics/after_login");
		}
	}

	public function index()
	{	
		$this->logged_in_check();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules("username", "username", "trim|required");
		$this->form_validation->set_rules("password", "password", "trim|required");
		if ($this->form_validation->run() == true) 
		{
			$this->load->model('auth_model_client', 'auth');	
			// check the username & password of user
			$status = $this->auth->validate();
			if ($status == ERR_INVALID_USERNAME) {
				$this->session->set_flashdata('message', '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-animation="true" data-delay="5000" data-autohide="true" style="position: absolute; top:0;center: 0;">
				<div class="toast-header">
					<span class="rounded mr-2 bg-danger" style="width: 15px;height: 15px"></span>
					<strong class="mr-auto">Warning</strong>
					<button type="button" class="close" data-dismiss="toast" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="toast-body">
					User tidak Valid !!!
					<br/>
					Silahkan hubungi Administrator.
				</div>
			</div>');
			}
			elseif ($status == ERR_INVALID_PASSWORD) {
				$this->session->set_flashdata('message', '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-animation="true" data-delay="5000" data-autohide="true" style="position: absolute; top: 0; center: 0;">
				<div class="toast-header">
					<span class="rounded mr-2 bg-danger" style="width: 30px;height: 30px"></span>
					<strong class="mr-auto">Warning</strong>
					<button type="button" class="close" data-dismiss="toast" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="toast-body">
					User tidak Valid !!!
					<br/>
					Silahkan hubungi Administrator.
				</div>
			</div>');
			}else{
				// success
				// store the user data to session
				$this->session->set_userdata($this->auth->get_data());
				$this->session->set_userdata("logged_in", true);
				// redirect to dashboard
				redirect("publics/after_login");
			}
		}
		
		$this->load->view("client/login");
	}

	public function logout()
	{
		$this->session->unset_userdata("logged_in");
		$this->session->sess_destroy();
		redirect("publics");
	}

	public function forget()
	{
		$this->load->view('forget');
	}



}