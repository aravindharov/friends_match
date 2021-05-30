<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
	 	parent::__construct();
	}
	public function index()
	{
        $data['title']='Home'.title_tag; 
        $data['menu']=1; 
        $session = $this->session->userdata('user');
        $data['user']= $session;
        $data['friends']=$this->common_model->__fetch_contents1('user',array('user_removed'=>0,'user_id<>'=>$session['user_id']));

        $this->load->view('main_menu',$data);
 	}
    public function user_profile($id=0)
    {
        if ($id!=0&&is_numeric($id)) {
            $data['title']='User Profile'.title_tag; 
            $data['menu']=1; 
            $session = $this->session->userdata('user');
            $data['user']= $session;
            $data['user_details']=$this->common_model->__fetch_contents1('user',array('user_removed'=>0,'user_id'=>$id));
            $data['friend']=$this->common_model->__fetch_contents1('friends',array('removed'=>0,'friendId'=>$id,'userId'=>$session['user_id']));

            $this->load->view('user_profile',$data);
        }
    }
    public function add_friend()
    {
        if ($this->input->is_ajax_request()) {
            $id=$this->input->post('id');
            $session = $this->session->userdata('user');
            $data['userId']=$session['user_id'];
            $data['friendId']=$id;
            // var_dump($data); die;
            $insert=$this->common_model->insert_table('friends',$data);
            if ($insert!=false) {
                $message = 'Added Friend Successfully';
                $report  = array(
                    'status' => 1,
                    'message' => $message
                );
                echo json_encode($report);
                exit;
            }
            else{
                $message = 'Something went worng';
                $report  = array(
                    'status' => 0,
                    'message' => $message
                );
                echo json_encode($report);
                exit;
            }
        }
        else{
            show_error("No direct accees allowed");
        }
    }
    public function search_friend()
    {
        $data['title']='Search Friend'.title_tag; 
        $data['menu']=2; 
        $session = $this->session->userdata('user');
        $data['user']= $session;
        $data['friends']=$this->common_model->__fetch_contents1('user',array('user_removed'=>0,'user_id<>'=>$session['user_id']));

        $this->load->view('search_friends',$data);
    }
    public function search_friend_data()
    {
        if ($this->input->is_ajax_request()) {
            $val=$this->input->post('val');
            $data=$this->common_model->search_friend($val);
            if ($data!=false) {
                $message = $data;
                $report  = array(
                    'status' => 1,
                    'message' => $message
                );
                echo json_encode($report);
                exit;
            }
            else{
                $message = 'No data Found';
                $report  = array(
                    'status' => 0,
                    'message' => $message
                );
                echo json_encode($report);
                exit;
            }
        }
        else{
            show_error("No direct accees allowed");
        }
    }
    public function search_friend_filter()
    {
        if ($this->input->is_ajax_request()) {
            $data=$this->input->post();
            $data=$this->common_model->search_friend('',$data);
            if ($data!=false) {
                $message = $data;
                $report  = array(
                    'status' => 1,
                    'message' => $message
                );
                echo json_encode($report);
                exit;
            }
            else{
                $message = 'No data Found';
                $report  = array(
                    'status' => 0,
                    'message' => $message
                );
                echo json_encode($report);
                exit;
            }
        }
        else{
            show_error("No direct accees allowed");
        }
    }
 	
	public function logout()
	{
		$this->session->unset_userdata('user');
		$this->session->unset_userdata(user_id);
		$message="Logout Successfully";
		$report=array('status'=>1,'message'=>$message);
		$this->session->set_userdata('form',array('login'=>$report));
        if (!isset($this->session->userdata['freelancer'])&& empty($this->session->userdata['freelancer'])) {
		redirect(site_url.'login','refresh');
        }
        else {
            redirect(site_url.'login/freelancer','refresh');
        }
	}
    public function matches_friend()
    {
        $data['title']='Match'.title_tag; 
        $data['menu']=3; 
        $session = $this->session->userdata('user');
        $data['user']= $session;
        $data['friends']=$this->common_model->match_data();
        

        $this->load->view('matches_friend',$data);
    }
	
}