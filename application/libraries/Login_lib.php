<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Login_lib
{
    private $arov;
    /**
     *  this is common library this autoincluded to all the values
     * 
     * @return
     */
    // $this->arov->load->library(array('Project_lib'));
    public function __construct()
    {
        $this->arov =& get_instance();
        
    }
    
    
    public function addUserProcess($user_data)
    {
        $this->arov->load->library('form_validation');
        
        $this->arov->form_validation->set_rules('fullname', 'Name', 'xss_clean|required');
        $this->arov->form_validation->set_rules('uEmail', 'Username', 'trim|xss_clean|is_unique[user.user_name]|required|valid_email');
        $this->arov->form_validation->set_rules('password', 'Password', 'xss_clean|required');
        $this->arov->form_validation->set_rules('rpassword', 'Confirm Password', 'xss_clean|required|matches[password]');
        $this->arov->form_validation->set_rules('dob', 'DOB', 'xss_clean|required');
        $this->arov->form_validation->set_rules('designation', 'Designation', 'xss_clean|required');
        $this->arov->form_validation->set_rules('gender', 'Gender', 'xss_clean|required');
        $this->arov->form_validation->set_rules('country', 'Country', 'xss_clean|required');
        $this->arov->form_validation->set_rules('fav_color', 'Favorite Color', 'xss_clean|required');
        $this->arov->form_validation->set_rules('fav_actor', 'Favorite actor', 'xss_clean|required');
        
        if ($this->arov->form_validation->run()) {
            
            $data      = $user_data;
            $user   = array();
            $reset = array();
            $today = date("Y-m-d");
            $dateOfBirth = dateFormatter($data['dob'],'d/m/Y','d-m-Y');
                    
            $diff=date_diff(date_create($dateOfBirth), date_create($today));
            $your_age=$diff->format('%y');
            
            // $this->arov->load->library('encrypt');
            
            $user['user_fname']   = $data['fullname'];
            $user['user_name']   = $data['uEmail'];
            $user['user_email']   = $data['uEmail'];
            $user['user_dob']   = $data['dob'];
            $user['user_designation']   = $data['designation'];
            $user['user_gender']   = $data['gender'];
            $user['user_country']   = $data['country'];
            $user['user_fav_color']   = $data['fav_color'];
            $user['user_fav_actor']   = $data['fav_actor'];
            $user['user_age']   = $your_age;
            // $user['user_password'] = $this->arov->encrypt->encode($data['password']);
            $user['user_password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            $key=substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 30); 
            $date = new DateTime(null, new DateTimezone("Asia/Kolkata"));
            $curDate=$date->format('Y-m-d H:i a');
            $reset['resUserEmail']   =$data['uEmail'];
            $reset['resHashKey']   = $key;
            $reset['resGenerated']   = $curDate;
            $upload=1;
            if (isset($_FILES['profile_picture'])&&!empty($_FILES['profile_picture']['name']))
            {
                $extension=pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION);
                $file_name='';
                $new_name = time();  
                $alt_txt= substr(str_shuffle('abcdef0123456789'), 0, 10);               
                $config['file_name'] = $data['fullname'].'_'.$alt_txt.'.'.$extension;   
                $config['upload_path'] = asset_path.'image/';
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size']= '5100';                
                $this->arov->load->library('upload', $config);
                
                if ( ! $this->arov->upload->do_upload('profile_picture'))
                {
                    $error =$this->arov->upload->display_errors();
                    $upload=0;
                    $message = $error;
                    $report  = array(
                        'status' => 2,
                        'message' => $message
                    );
                    echo json_encode($report);



                    exit;
                }
                else
                {
                    $data2 =$this->arov->upload->data();
                    $upload=2;  
                    $file_name=$data2['file_name'];
                }                   
            }
            if($upload) 
            {
                if($upload==2)
                {
                    $user['user_picture']=$file_name;
                    //$article['artSupFile']=$new_data['user_picture'];
                }
                else{
                    $message = 'Please upload Profile picture';
                    $report  = array(
                        'status' => 2,
                        'message' => $message
                    );
                    echo json_encode($report);
                    exit;
                }
            }
            // var_dump($user); die;
            $this->arov->load->model('login_model');
            
            $user_details = $this->arov->login_model->insertSignupDetail($user,$reset);
            
            if (!empty($user_details)) {
                $name=$data['fullname'];
                $userName=$data['uEmail'];
                $to=$userName;

                $message = 'Account Created Successfully';
                $report  = array(
                    'status' => 1,
                    'message' => $message
                );
                echo json_encode($report);
                exit;
            }
            else {
                    
                    $message = 'Something wrong please try again';
                    $report  = array(
                        'status' => 2,
                        'message' => $message
                    );
                    echo json_encode($report);

                    exit;
                }
            
        } else {
            $message = $this->arov->form_validation->error_array();
            $report  = array(
                'status' => 0,
                'message' => $message
            );
            echo json_encode($report);
            exit;
        }
    }

}