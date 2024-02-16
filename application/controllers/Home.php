<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Home Class
 *
 * @package     CodeIgniter Simple Login
 * @subpackage  Controllers
 * @category    Home
 * @author      Muhammad Haibah <inibah97@gmail.com>
 * @link        https://github.com/inibah97
 */
class Home extends CI_Controller
{
	/**
	 * User data
	 * 
	 * @var object
	 */
	private $_user;

	/**
	 * Construct functions
	 * 
	 * @return void
	 */
	public function __construct()
	{
		// Load the parent construct
		parent::__construct();

		// Load the libraries
		$this->load->library(['session']);

		// Load the helpers
		$this->load->helper(['url']);

		// Load the models
		$this->load->model(['Users_model']);

		// Check session
		$this->checkSession();

		// Get user data from resource by session
		$this->_user = $this->Users_model->getUserByField([
			'username' => $this->session->username
		], true);
	}

	/**
	 * Default for this controller.
	 *
	 * @return void
	 */
	public function index()
	{
		$data = [
			'page' => [
				'title' => 'Homepages',
				'pagename' => 'dashboard'
			],
			'user' => (array) $this->_user
		];

		$this->load->view('home', $data);
	}

	/**
	 * Check Session
	 * 
	 * @return void
	 */
	private function checkSession()
	{
		if (!$this->session->has_userdata('username')) {
			redirect('login');
			die;
		}
	}

	  public function changepassword(){
 
        $data = [
			'page' => [
				'title' => 'Change Password',
				'pagename' => 'changepassword',
			],
			'user' => (array) $this->_user
		];
        
        $this->form_validation->set_rules('c_password', 'Current Password', 'required');
        $this->form_validation->set_rules('n_password', 'New Password', 'required|callback_valid_password');
        $this->form_validation->set_rules('r_password', 'Confirmed Password', 'required|matches[n_password]');
        if ($this->form_validation->run() == TRUE):
            $c_password=$this->input->post('c_password');
            $n_password=$this->input->post('n_password');
            $r_password=$this->input->post('r_password');
            
            if(password_verify($c_password, $this->_user->password)):

                if($n_password == $r_password):
                    $this->db->update('users',['password'=>password_hash($r_password, PASSWORD_BCRYPT)],['id'=>$this->_user->id]);
                    if($this->db->affected_rows() == 1):
                        $this->session->set_flashdata('success_message', 'Passowrd Changed Successfully..!');
                        redirect('change-password');
                    else:
                        $this->session->set_flashdata('error_message', 'Something Went Wrong..! Please try again after sometime');
                        // redirect('change-password');
                    endif;
                else:
                    $this->session->set_flashdata('error_message', 'New password and confirmed password not match');
                    // redirect('change-password');
                endif;
            else:
                $this->session->set_flashdata('error_message', 'Please enter correct current passowrd');
                // redirect('change-password');
            endif;
            $this->load->view('home', $data);
        else:
            $this->load->view('home', $data);
        endif;;
        
    }

    	public function valid_password($password = '')
    {
        $password = trim($password);

        $regex_lowercase = '/[a-z]/';
        $regex_uppercase = '/[A-Z]/';
        $regex_number = '/[0-9]/';
        $regex_special = '/[!@#$%^&*()\-_=+{};:,<.>ยง~]/';

        if (empty($password))
        {
            $this->form_validation->set_message('valid_password', 'The {field} field is required.');

            return FALSE;
        }

        if (preg_match_all($regex_lowercase, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least one lowercase letter.');

            return FALSE;
        }

        if (preg_match_all($regex_uppercase, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least one uppercase letter.');

            return FALSE;
        }

        if (preg_match_all($regex_number, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must have at least one number.');

            return FALSE;
        }

        if (preg_match_all($regex_special, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>ยง~'));

            return FALSE;
        }

        if (strlen($password) < 5)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least 5 characters in length.');

            return FALSE;
        }

        if (strlen($password) > 32)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field cannot exceed 32 characters in length.');

            return FALSE;
        }

        return TRUE;
    }
}
