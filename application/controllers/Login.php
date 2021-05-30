<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data = array(
			'title' => 'Login' . title_tag,
			'robots' => 'noindex,nofollow'
		);
		$data['form_data'] = array(
			'user_name' => ''
		);
		$data['logged_in'] = 0;
		$data = $this->messages('login', $data);
		$this->load->view('login/login', $data);
	}

	public function process()
	{
		
		if ($this->form_validation->run('login') !== false)
		{
			
			$data['user_name']= $this->input->post('user_name');
			$user_check_array = array('user_name' => $data['user_name']);
			$contents= $this->common_model->__fetch_contents1('user', $user_check_array);
			$data1['log_entertime'] = date('Y-m-d H:i:s');
			$data1['log_enter_ipaddress'] = $this->input->ip_address();
			$data1['log_result']= 0;
			$data1['log_valid_till'] = time() + valid_till;
			$data1['log_user'] = 0;
			$data1['log_browser']  = $_SERVER['HTTP_USER_AGENT'];
			$data1['log_time_of_sec'] = date('Y-m-d H:i:s');
			$data1['log_session_id'] = session_id();
			$data1['log_last_accessed'] = time();
			
			
			if ($contents !== false)
			{
				
				$password=$this->input->post('user_password');
				
        		if (password_verify($password, $contents[0]['user_password']))
				{
					
					$data1['log_result'] = 1;
					$data1['log_user']   = $contents[0]['user_id'];
					
					
						$this->load->model('common_model');
						$last_id  = $this->common_model->insert_table_lastid('log', $data1);
						
						$this->session->set_userdata(user_id, $last_id);
						$this->session->set_userdata('user', $contents[0]);
						
						$message = "Login successful";
							$report                = array(
							'status' => 1,
							'message' => $message,
							'newUrl'=>site_url
						);
						
						if (isset($this->session->userdata['url_login']))
						{
							$url = $this->session->userdata['url_login'];
							unset($this->session->userdata['url_login']);
							$is_logout = strcmp($url, 'home/logout');

							if ($is_logout == 0)
							{
								$report['newUrl']=site_url;
							}
							else
							{
								$report['newUrl']=site_url;
							}
						}
						else
						{
							$report['newUrl']=site_url;
						}
					
					echo json_encode($report);
				}
				else
				{
					$data1['log_password'] = $this->input->post('user_password');
					$last_id               = $this->common_model->insert_table_lastid('failure_log', $data1);
					$message               = "Username or password mismatched";
					$report                = array(
						'status' => 0,
						'message' => $message
					);
					echo json_encode($report);
					die;
				}
				
			}
			else
			{
				$data1['log_password'] = $this->input->post('user_password');
				$last_id               = $this->common_model->insert_table_lastid('failure_log', $data1);
				$message               = "Username or password mismatched";
				$report                = array(
					'status' => 0,
					'form_data' => $this->input->post(),
					'message' => $message
				);
				echo json_encode($report);
				die;
			}
		}
		else
		{
			$data1['log_password'] = $this->input->post('user_password');
			$last_id               = $this->common_model->insert_table_lastid('failure_log', $data1);
			$message               = validation_errors();
			$report                = array(
				'status' => 0,
				'form_data' => $this->input->post(),
				'message' => $message
			);
			echo json_encode($report);
			die;
		}
	}

	protected function messages($form, $data)
	{
		$data['message_div'] = '';
		if (isset($this->session->userdata['form'][$form]['message']))
		{
			$status  = $this->session->userdata['form'][$form]['status'];
			$message = $this->session->userdata['form'][$form]['message'];
			if ($status == 1)
			{
				$data['message_div'] = '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' . $message . '</div>';
			}
			else
			{
				$data['form_data']   = $this->session->userdata['form'][$form]['form_data'];
				$data['message_div'] = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' . $message . '</div>';
			}
		}
		$this->session->unset_userdata('form');
		return $data;
	}
	public function addProcess()
    {
        
        if ($this->input->is_ajax_request()) {
            
            $data = $this->input->post();
            $this->load->library('login_lib');
            $user = $this->login_lib->addUserProcess($data);
            
        } else {
            show_error("No direct access allowed");
            
        }
    }
    
}