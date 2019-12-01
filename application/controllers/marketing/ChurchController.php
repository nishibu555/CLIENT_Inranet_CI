<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChurchController extends CI_Controller {
   
    public function __construct()
    {
	    parent::__construct();
	    $this->load->library('form_validation');
        $this->load->library('ion_auth');
        $this->load->helper('language');
        $this->lang->load('auth');

        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
             //user role checing start
           $userId = $this->ion_auth->get_user_id();
           $user_info = $this->db->query("SELECT * FROm users WHERE `id` LIKE $userId")->row();
           
            if ($user_info->p_marketing == 0)
            {
                redirect('dashboard', 'refresh');
            }
         //user role checing end
    }


    public function churches(){
        $data = array();
        $data['all_city']=$this->db->select('city')->order_by('city', 'asc')->group_by('city')->get('churches')->result();
        $data['all_state']=$this->db->select('state')->order_by('state', 'asc')->group_by('state')->get('churches')->result();
        $data['all_zip']=$this->db->select('zip')->order_by('zip', 'asc')->group_by('zip')->get('churches')->result();
        $data['all_churches']=$this->db->order_by('church')->get('churches')->result();
        $data['all_churches_count']=count($data['all_churches']);
        $data['content']=$this->load->view('front-end/marketing/churches',$data,true);
        $this->load->view('front-end/master',$data);
    }


    public function add_church(){
        $data=array();
        $data['content']=$this->load->view('front-end/marketing/add_church',$data,true);
        $this->load->view('front-end/master',$data);
    }

    public function save_church(){
        $response = array(
            'success'=> true,
            'error'=> false,
            'msg'=>''
        );

        $this->form_validation->set_rules('church', 'church', 'required');

        if ($this->form_validation->run() === true) {
            $data=array();
            $data['church']=$this->input->post('church',true);
            $data['addr2']=$this->input->post('addr2',true);
            $data['addr1']=$this->input->post('addr1',true);
            $data['city']=$this->input->post('city',true);
            $data['state']=$this->input->post('state',true);
            $data['zip']=$this->input->post('zip',true);
            $data['contact']=$this->input->post('contact',true);
            $data['phone']=$this->input->post('phone',true);
            $data['email']=$this->input->post('email',true);
            $data['notes']=$this->input->post('notes',true);
            $data['history']=$this->input->post('history',true);
            $data['highlight']=$this->input->post('highlight',true);

            $this->db->insert('churches', $data);
        }
        else{
            $response['error']=true;
            $response['error_list']=$this->form_validation->error_array();
        }
        echo json_encode($response);
    }

    public function edit_church($id){
        $data=array();
        $data['church']=$this->db->where('id', $id)->get('churches')->row();
        $data['content']=$this->load->view('front-end/marketing/edit_church',$data,true);
        $this->load->view('front-end/master',$data);
    }


    public function update_church($id){
        $response = array(
            'success'=> true,
            'error'=> false,
            'msg'=>''
        );

        $this->form_validation->set_rules('church', 'church', 'required');

        if ($this->form_validation->run() === true) {
            $data=array();
            $data['church']=$this->input->post('church',true);
            $data['addr2']=$this->input->post('addr2',true);
            $data['addr1']=$this->input->post('addr1',true);
            $data['city']=$this->input->post('city',true);
            $data['state']=$this->input->post('state',true);
            $data['zip']=$this->input->post('zip',true);
            $data['contact']=$this->input->post('contact',true);
            $data['phone']=$this->input->post('phone',true);
            $data['email']=$this->input->post('email',true);
            $data['notes']=$this->input->post('notes',true);
            $data['history']=$this->input->post('history',true);
            $data['highlight']=$this->input->post('highlight',true);

            $this->db->where('id', $id)->update('churches', $data);
        }
        else{
            $response['error']=true;
            $response['error_list']=$this->form_validation->error_array();
        }
        echo json_encode($response);
    }


    public function delete_church($id){
        $this->db->where('id', $id)->delete('churches');
        redirect('marketing/churches');
    }


    public function filter_chruch(){

       $select_city=$this->input->post('select_city', true);
       $select_state=$this->input->post('select_state', true);
       $select_zip=$this->input->post('select_zip', true);
       $search_text=$this->input->post('search_text', true);

    
       $query = "SELECT *  FROM `churches` WHERE 1 "; 
       $and_query = [];


       if( isset($select_city) && $select_city != '' ) {
            $and_query[]="`city` like '%$select_city%'" ;

       }

       if( isset($select_state) && $select_state != '' ) {
            $and_query[]="`state` like '%$select_state%'";
       }

       if( isset($select_zip) && $select_zip != '' ) {
            $and_query[]="`zip` like '%$select_zip%'";
       }

       if( isset($search_text) && $search_text != '' ) {
            $and_query[]="( `church` like '%$search_text%'  OR `city` like '%$search_text%'  OR `state` like '%$search_text%' OR `zip` like '%$search_text%')";
       }
       
       if(count($and_query)>0){

         $and=implode(' AND ', $and_query);
         $main_query=$query.' AND '.$and;
       }
       else{
          $main_query=$query;
       }

       $result = $this->db->query($main_query)->result();
       

        $html = '';
        if($result){
            foreach ($result as $key => $result) {
                $html .= '<tr style="background-color: #'.$result->highlight.'">';
                    
                    $html .= '<td>';
                        $html .= '<p>'.($key+1).'. '.$result->church;
                        $html .= '</p>';
                    $html .= '</td>';

                    $html .= '<td>';
                        $html .= '<p>'.$result->addr1;
                        $html .= '</p>';
                    $html .= '</td>';

                    $html .= '<td>';
                        $html .= '<p>'.$result->contact;
                        $html .= '</p>';
                    $html .= '</td>';

                    $html .= '<td>';
                        $html .= '<p>'.$result->phone;
                        $html .= '</p>';
                    $html .= '</td>';
                    
                    $html .= '<td>';
                        $html .= '<p>'.$result->email;
                        $html .= '</p>';
                    $html .= '</td>';
                    
                    $html .= '<td>';
                        $html .= '<p>'.$result->history;
                        $html .= '</p>';
                    $html .= '</td>';
                    
                    $html .= '<td>';
                        $html .= '<p>'.substr($result->notes , 0 , 100);
                        $html .= '</p>';
                    $html .= '</td>';
                    


                    $html .= '<td>';
                        $html .= '<span class="pull-right edit_menu">';
                        $html .= '<a href="'.base_url()."edit_church/".$result->id.'">';
                        $html .= '<i class="far fa-edit"></i></a>';
                        $html .= '<a href="'.base_url()."delete_church/".$result->id.'">';
                        $html .= '<i class="far fa-trash-alt"></i></a></span>';
                    $html .= '</td>';
                
                $html .= '</tr>';
            }
        }
        else{
                $html .= '<tr>';
                    
                    $html .= '<td>';
                        $html .= '<p>'.'no matched result found';
                        $html .= '</p>';
                    $html .= '</td>';
                
                $html .= '</tr>';
        }

        echo json_encode($html);

    }


    public function sort_church(){
        
        $result=$this->db->order_by('church', 'desc')->get('churches')->result();
       
       
        if($result){ 
            $html = '';
            foreach ($result as $key => $result) {
                $html .= '<tr>';
                    
                    $html .= '<td>';
                        $html .= '<p>'.$key.'. '.$result->church;
                        $html .= '</p>';
                    $html .= '</td>';

                    $html .= '<td>';
                        $html .= '<p>'.$result->addr1;
                        $html .= '</p>';
                    $html .= '</td>';

                    $html .= '<td>';
                        $html .= '<p>'.$result->contact;
                        $html .= '</p>';
                    $html .= '</td>';

                    $html .= '<td>';
                        $html .= '<p>'.$result->phone;
                        $html .= '</p>';
                    $html .= '</td>';
                    
                    $html .= '<td>';
                        $html .= '<p>'.$result->email;
                        $html .= '</p>';
                    $html .= '</td>';
                    
                    $html .= '<td>';
                        $html .= '<p>'.$result->history;
                        $html .= '</p>';
                    $html .= '</td>';
                    
                    $html .= '<td>';
                        $html .= '<p>'.substr($result->notes , 0 , 100);
                        $html .= '</p>';
                    $html .= '</td>';
                    


                    $html .= '<td>';
                        $html .= '<span class="pull-right edit_menu">';
                        $html .= '<a href="'.base_url()."edit_church/".$result->id.'">';
                        $html .= '<i class="far fa-edit"></i></a>';
                        $html .= '<a href="'.base_url()."delete_church/".$result->id.'">';
                        $html .= '<i class="far fa-trash-alt"></i></a></span>';
                    $html .= '</td>';
                
                $html .= '</tr>';
            }
        }
        else{
                $html .= '<tr>';
                    
                    $html .= '<td>';
                        $html .= '<p>'.'no matched result found';
                        $html .= '</p>';
                    $html .= '</td>';
                
                $html .= '</tr>';
        }
       
        echo json_encode($html);
    }
  
//end
}    