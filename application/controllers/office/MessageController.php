<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MessageController extends CI_Controller {
    public function __construct()
    {
	    parent::__construct();
	    $this->load->library('form_validation');
        $this->load->model(['OfficeModel','ActivityModel']);
        $this->load->library('ion_auth');
        $this->load->helper('language');
        $this->lang->load('auth');

        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
    }

    public function index(){
        //all message to=current_user, owner = current_user,
        $user_id = $this->ion_auth->user()->row()->id;
        $user = $this->ion_auth->user()->row()->username;
        
        $unread=$this->db->where(['to'=>$user, 'owner'=>$user, 'read_flag !='=>1])->get('messages')->result(); 
        
        $data=array();
        $data['all_inbox']=$this->db->select('messages.id as id,messages.reply_flag as reply_flag, messages.timestamp,messages.message ,messages.from, users.username as from_username ,messages.to, users.first_name as from_fname, users.last_name as from_lname')
                                     ->where(['to'=>$user, 
                                              'messages.owner'=>$user, 
                                              'messages.delete_flag !=' => 1])
                                     ->from('messages')
                                     ->join('users', 'users.username = messages.from')
                                     ->order_by('messages.id', 'desc')
                                     ->get()
                                     ->result();                            

        $data['inbox_count']=count($data['all_inbox']);
        $data['unread_count']=count($unread);                              
        $data['content']=$this->load->view('front-end/office/message/message',$data,true);
        $this->load->view('front-end/master', $data);
    }


    public function compose(){
        $user_id = $this->ion_auth->user()->row()->id;
        $user = $this->ion_auth->user()->row()->username;

        $data=array();  
        $data['recipients']= $this->db->select('id,username, first_name, last_name')
                                       ->where(['username !='=> $user, 'delete_flag !='=>1])
                                       ->order_by('first_name', 'asc')
                                       ->get('users')
                                       ->result();

                                    

        $data['content']=$this->load->view('front-end/office/message/compose',$data,true);
        $this->load->view('front-end/master', $data);
    }


    public function send_message(){

        $user = $this->ion_auth->user()->row()->username;
         
        
        //when owner and to(reciever) same
        $entry1=array();
        $entry1['timestamp']= date('Y-m-d h:i:s');
        $entry1['message']=$this->input->post('message', true);
        $entry1['from']=$user;
     
        //when owner and from same and read flag 1
        $entry2=array();
        $entry2['timestamp']= date('Y-m-d h:i:s');
        $entry2['message']=$this->input->post('message', true);
        $entry2['from']=$user;
        $entry2['owner']=$user;
        $entry2['read_flag']=1;
        
        //if sending message is a reply message
        $reply_id=$this->input->post('reply_id', true);

        if(isset($reply_id) && $reply_id !== null){
            $reply_flag_data['reply_flag']=1;
            $this->db->where('id',  $reply_id)->update('messages', $reply_flag_data);
        }
    
        if( !empty($_POST['select_all']) && $_POST['select_all'] == 1 ){
            $all_recipients= $this->db->select('username')
                                       ->where(['username !='=> $user, 'delete_flag !='=>1])
                                       ->get('users')
                                       ->result();
            
            foreach ($all_recipients as $key => $value) {
               $entry1['to']=$value->username; 
               $entry1['owner']=$value->username;

               $entry2['to']=$value->username; 

               $this->db->insert('messages', $entry2);
               $this->db->insert('messages', $entry1);
            }                           
        }
        else{
            if( !empty($_POST['select_recipients']) ){
                $recipients = $this->input->post('select_recipients', true);
                foreach ($recipients as $key => $value) {
                   $entry1['to']=$value; 
                   $entry1['owner']=$value;

                   $entry2['to']=$value; 

                   $this->db->insert('messages', $entry2);
                   $this->db->insert('messages', $entry1);
                }
            }
        }

        redirect('office/messages/outbox');
    }


    //outbox
    public function outbox(){
        //all message from=current_user, owner= current_user
        $user_id = $this->ion_auth->user()->row()->id;
        $user = $this->ion_auth->user()->row()->username;
        
        $data=array();  
        $data['all_outbox']=$this->db->select('messages.id as id, messages.read_flag as read_flag,messages.timestamp,messages.message ,messages.to, users.username as to_username, users.first_name as to_fname, users.last_name as to_lname')
                                     ->where(['from'=>$user, 
                                              'messages.owner'=>$user, 
                                              'messages.delete_flag !=' =>1
                                              ])
                                     ->from('messages')
                                     ->join('users', 'users.username = messages.to')
                                     ->order_by('messages.id', 'desc')
                                     ->get()
                                     ->result();                             

        $data['content']=$this->load->view('front-end/office/message/outbox',$data,true);
        $this->load->view('front-end/master', $data);
    }


    public function trash(){

        $user = $this->ion_auth->user()->row()->username;
        $date2 = date('Y-m-d', strtotime(date('Y-m-d').' -30 days'));

        $data=array();  

        // $data['trash']=$this->db->query('select messages.*, users.first_name, users.last_name from messages,users where messages.`owner` = "'.$user.'" and messages.`delete_flag` = 1 and messages.`delete_date` >= "'.$date2.'" and messages.`owner` != users.username and (messages.`from`=users.username or messages.`to`=users.username) order by messages.`id` desc')->result();

        $data['trash']=$this->db->where(['owner'=>$user, 'messages.delete_flag'=>1, 'messages.delete_date>='=> $date2])
                      ->select('messages.*, users.first_name, users.last_name, users.username') 
                      ->from('messages')
                      ->join('users', 'users.username = messages.owner')
                      ->get()->result();


        $data['content']=$this->load->view('front-end/office/message/trash',$data,true);
        $this->load->view('front-end/master', $data);
    }


    public function delete_message(){
        $user = $this->ion_auth->user()->row()->username;
        $selected_msg = $this->input->post('selected_msg', true);
        
        foreach ($selected_msg as $key => $value) {
          $data=array();
          $data['delete_flag']=1;
          $data['delete_date']=date('Y-m-d h:i:s');
          $this->db->where(['id'=> $value, 'messages.owner'=>$user])->update('messages', $data);
          echo $this->db->last_query();
        }
        // echo sizeof($selected_msg)." message deleted.";
    }
    

    //delete from single inbox/conversation message
    public function delete_one_msg(){
       $id=$_POST['id']; 
       $data=array();
       $data['delete_flag']=1;
       $this->db->where('id', $id)->update('messages', $data);
    }


    public function empty_trash(){
       $user = $this->ion_auth->user()->row()->username;
       $selected_msg = $this->input->post('selected_msg', true);
        foreach ($selected_msg as $key => $value) {
          $data=array();
          $data['delete_flag']=1;
          $data['delete_date']=date('Y-m-d h:i:s');
          $this->db->where(['id'=> $value, 'owner'=>$user])->delete('messages');
          
        }
        echo sizeof($selected_msg)." message cleared from trash.";
    }


    public function restore_trash(){
       $user = $this->ion_auth->user()->row()->username;
       $selected_msg = $this->input->post('selected_msg', true);
        foreach ($selected_msg as $key => $value) {
          $data=array();
          $data['delete_flag']=0;
          $data['delete_date']=date('Y-m-d h:i:s');
          $this->db->where(['id'=> $value, 'owner'=>$user])->update('messages', $data);
          echo $this->db->last_query();
        }
        echo sizeof($selected_msg)." message restored.";
    }


    public function get_inbox($id){
        $get_message_by_id = $this->db->select('messages.id as msgid, messages.message, messages.timestamp,messages.from , users.username, users.first_name, users.last_name')
                                   ->from('messages')
                                    ->join('users', 'users.username = messages.from')
                                   ->where('messages.id', $id)->get()->row();


        $html='';

        $html .='<div style="margin-top: 20px">';

        $html .= '<p>From : <b>'.$get_message_by_id->first_name.' '.$get_message_by_id->last_name.'</b> <span style="float: right;">'.date('m/d/Y h:i:s a', strtotime($get_message_by_id->timestamp)).'</span></p>';
        $html .=  '<p>'.$get_message_by_id->message.'</p>';
        $html .= '<br';

        $html .= '<div class="row justify-content-center" style="margin-top: 50px">
                    <div class="col-md-4">
                      <button type="button" class="btn btn-primary score-btn go_back">Go Back</button>
                    </div>
                    <div class="col-md-4">
                      <a href="'.base_url('reply/').$id.'"><button type="button" class="btn btn-primary score-btn" >Reply</button></a>
                    </div>
                    <div class="col-md-4">
                      <button type="button" class="btn btn-primary score-btn delete_one_msg" data-msgid="'.$get_message_by_id->msgid.'">Delete</button>
                    </div>
                  </div>';
        echo $html;          
    }


    public function get_outbox($id){
        $get_message_by_id = $this->db->where('messages.id', $id)
                                   ->select('messages.id as msgid, messages.message, messages.timestamp,messages.to , users.username, users.first_name, users.last_name')
                                   ->from('messages')
                                    ->join('users', 'users.username = messages.to')
                                   ->get()->row();

        $html='';

        $html .='<div style="margin-top: 20px">';

        $html .= '<p>To : <b>'.$get_message_by_id->first_name.' '.$get_message_by_id->last_name.'</b> <span style="float: right;">'.date('m/d/Y h:i:s a', strtotime($get_message_by_id->timestamp)).'</span></p>';
        $html .=  '<p>'.$get_message_by_id->message.'</p>';
        $html .= '<br';

        $html .= '<div class="row justify-content-center" style="margin-top: 50px">
                    <div class="col-md-4">
                      <button type="button" class="btn btn-primary score-btn go_back">Go Back</button>
                    </div>
                    <div class="col-md-4">
                      <button type="button" class="btn btn-primary score-btn delete_one_msg" data-msgid="'.$get_message_by_id->msgid.'">Delete</button>
                    </div>
                  </div>';
        echo $html;          
    }

    
    public function reply($msgid){
    
      
        $user = $this->ion_auth->user()->row()->username;

        $data=array();    
        $data['previous_conversation']= $this->db->where(['messages.id'=> $msgid, 'messages.delete_flag'=>0])
                                        ->select('messages.*, users.first_name as writter_fname, users.last_name  as writter_lname')             
                                       
                                       ->from('messages')
                                       ->join('users', 'users.username = messages.from')
                                       ->get() 
                                       ->row();
                                      
        
        $data['recipients']= $this->db->select('id,username, first_name, last_name')
                                       ->where(['username !='=> $user, 'delete_flag !='=>1])
                                       ->order_by('first_name', 'asc')
                                       ->get('users')
                                       ->result();

        $data['content']=$this->load->view('front-end/office/message/reply',$data,true);
        $this->load->view('front-end/master', $data);
    }

}

    