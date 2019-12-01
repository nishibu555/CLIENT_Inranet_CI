<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ActivityController extends CI_Controller {
   
    public function __construct()
    {
	    parent::__construct();
	    $this->load->library('form_validation');
        $this->load->model(['ActivityModel']);
        $this->load->library('ion_auth');
        $this->load->helper('language');
        $this->lang->load('auth');

        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
    }
    
    public function activity()
    {
        $data = array();
        $data['student_id']=$id;
        $data['tags'] = $this->db->query("SELECT * FROM `personnel`")->result();
        $data['all_activity_data'] = $this->db->query("SELECT * FROM `activity_log` ORDER BY `id` DESC")->result();
        $data['content']=$this->load->view('front-end/record/activity-log',$data,true);
        $this->load->view('front-end/master', $data);
    } 
    //get data method
    public function get_data()
    {
 
        $student_activity = $this->db->select('*')
                            ->from('activity_log')
                            ->order_by('id','desc')
                            ->get()->result();
        $html = '';

        foreach($student_activity as $activity){
            $html .= '<div class="activity-content">';
            $html .= '<p><span>'.date('D',strtotime($activity->timestamp));
            $html .= '</span> <span>'.date('m/d/Y',strtotime($activity->timestamp)); 
            
            $html .= '</span> at <span>';
            $html .= date('h:i A',strtotime($activity->timestamp));
            
            $html .='</span> by <span>'.$activity->author.'</span></p>';
            $html .= '<p>'.$activity->data.'</p>';
            $html .= '<p>Tags:';
            
            $tag_id = $this->db->query("SELECT * FROM `activity_tags` WHERE `activity_id`='".$activity->id."'")->result();
                foreach($tag_id as $value){
                   $tag_name = $this->db->query("SELECT * FROM `personnel` WHERE `id`='".$value->student_id."'")->result();
                        foreach($tag_name as $tag){
                            //$html .= '<a href="'.base_url('/personnel-details/'.$tag->id).'">'.$tag->fname.'  '.$tag->lname.' , '.'</a>';
                            $html .= '<span>'.$tag->fname." ".$tag->lname.',</span>';
                     }
                }
            $html .= '</p></div>';
        }
       
        echo json_encode($html);

    }    
    //get filter data method
    public function date_filter()
    {
        $search_date = '%'.date('d-m-Y', strtotime($_POST['src_date'])).'%';
        $student_activity = $this->db->query("SELECT * FROM `activity_log` WHERE `timestamp` LIKE '".$search_date."' ORDER BY `id` DESC")->result();
        $html = '';
//var_dump($this->db->last_query());
        foreach($student_activity as $activity){
            $html .= '<div class="activity-content">';
            $html .= '<p><span>'.date('D',strtotime($activity->timestamp));
            $html .= '</span> <span>'.date('m/d/Y',strtotime($activity->timestamp)); 
            
            $html .= '</span> at <span>';
            $html .= date('h:i A',strtotime($activity->timestamp));
            
            $html .='</span> by <span>'.$activity->author.'</span></p>';
            $html .= '<p>'.$activity->data.'</p>';
            $html .= '<p>Tags:';
            
            $tag_id = $this->db->query("SELECT * FROM `activity_tags` WHERE `activity_id`='".$activity->id."'")->result();
                foreach($tag_id as $value){
                   $tag_name = $this->db->query("SELECT * FROM `personnel` WHERE `id`='".$value->student_id."'")->result();
                        foreach($tag_name as $tag){
                            $html .= '<a href="'.base_url('/personnel-details/'.$tag->id).'">'.$tag->fname.'  '.$tag->lname.' , '.'</a>';

                     }
                }
            $html .= '</p></div>';
        }
       
        echo json_encode($html);

    }
               

    public function ActivityLog()
    {
        
        $data = array();
        $data['tags'] = $this->db->query("SELECT * FROM `personnel` WHERE `status` != 'delete' AND `rank`='student'")->result();
//        $data['all_activity_data'] = $this->ActivityModel->get_result('activity_log');
        $data['content']=$this->load->view('front-end/record/activity-log',$data,true);
        $this->load->view('front-end/master', $data);
    }
    
        public function SaveActivityValue()
    {
        $user = $this->ion_auth->user()->row();
        
        $this->form_validation->set_rules('activity', 'Activity', 'required');
        if (empty($_POST['tags']))
        {
            $this->form_validation->set_rules('tags', 'Tags', 'required');
        }

//        $this->form_validation->set_rules('activity_date', 'Activity Date', 'required');

        $response = array(
            'success'=> false,
            'error'=> false,
            'msg'=>''
        );

        if ($this->form_validation->run() === true) {

            $activity_data=array();
            $activity_data['data']      = $this->input->post('activity',true);
            $activity_data['timestamp'] = date("d-m-Y h:i:sa");
            $activity_data['author'] = $user->username;

            $activity_id = $this->ActivityModel->InsertData('activity_log',$activity_data);
            foreach($_POST['tags'] as $tag){
                $this->db->query("INSERT INTO `activity_tags` (`activity_id`, `student_id`) VALUES ($activity_id, $tag)");
            }
            $response['error']=false;
            $response['success']=true;
            $response['msg']="Activity log Successfully added";
        }else
        {
            $response['error']=true;
            $response['error_list']=$this->form_validation->error_array();
        }
        echo json_encode($response);
    }
    
}