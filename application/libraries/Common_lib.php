<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Common_lib 
{
   private $arov;
   /**
   *  this is common library this autoincluded to all the values
   * 
   * @return
   */
   
   public function __construct()
   {
	 	$this->arov = & get_instance();
		$this->arov->load->model(array('common_model'));
		date_default_timezone_set('Asia/Singapore');
    //echo "hi";
    //die;
		$this->login_validate();
   }

  
   public function login_not_using_pages()
   {
   	$array=array('login');
   	return $array;
   }
   
  /**
  *  login validate function
  *  this method works every page loads and it wllvalidate the every page realoding
  * 
  * @return
  */
   public function login_validate()
   {
   	  if(!isset($this->arov->session->userdata[user_id]))
   	  {
   	  	$varx=explode('/',uri_string());
   	  	
   	  	if(in_array($varx[0],$this->login_not_using_pages()))
   	  	{
   	  		//redirect('login', 'refresh');
			
		}
		else
		{
		
			$this->arov->session->set_userdata('url_login',uri_string());
			redirect(site_url.'login', 'refresh');
			
		}
   	     	
	  	
	  }
	  else
	  {
	 // 	var_dump($this->arov->router->fetch_class());
	  	
	  	if(uri_string()=='login')
	  	{
	  		$this->update_session();
			redirect(site_url.'', 'refresh');
		}
		else
		{
			$result=$this->check_permission();
			if($result==FALSE)
			{
				redirect(site_url.'', 'refresh');
			}
			else
			{
				$this->update_session();	
        		$this->arov->load->library('login_lib');
        		$user =   $this->arov->session->userdata('user');
        
			}
			
		}
	  	
	  }
   }
   
   /**
   * update session will check that current session and change it into 
   * current time and validtill
   * 
   * @return true or redirect to login page
   */
   public function update_session()
   {
   	
   		$this->arov->session->set_userdata('last_activity',time());
   	$log_details=$this->arov->common_model->fetch_contents('log',array('log_id'=>$this->arov->session->userdata[user_id]));
   $valid_till=$log_details[0]['log_valid_till']+valid_till;
    if($valid_till>=time())
   {
   	$id=$this->arov->session->userdata(user_id);
   	$data=array('log_valid_till'=>$valid_till,'log_time_of_sec'=>date('Y-m-d H:i:s'),'log_last_accessed'=>time());
   	 $this->arov->common_model->update_table('log',$data,$id);
   	
   }
   else
   {
   	  $this->arov->session->unset_userdata(user_id);
   	  $message="Your session expired";
			 $report=array('status'=>0,'form_data'=>array('user_name'=>$this->arov->session->userdata['user']['user_name']),'message'=>$message);
			$this->arov->session->unset_userdata('user');
			$this->arov->session->set_userdata('url_login',uri_string());
			$this->arov->session->set_userdata('form',array('login'=>$report));
			redirect(site_url.'login','refresh');
   }   	
   }
   
   
   public function verify_email($email_id,$mobile_no,$user_id)
   {
	   /**/
    }
  
  	/**
	  * 
	  * 
	  * @return 
	  */
  	public function check_permission()
  	{
  		
		$url=$this->arov->router->fetch_class();
		//var_dump($url);
		$user=$this->arov->session->userdata('user');
		return true;
	}   
}