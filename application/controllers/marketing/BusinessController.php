<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BusinessController extends CI_Controller {
   
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


    public function business(){
        $data = array();
        $data['all_company']=$this->db->select('company')->order_by('company', 'asc')->group_by('company')->get('businesses')->result();
        $data['all_bt']=$this->db->select('bustype')->order_by('bustype', 'asc')->group_by('bustype')->get('businesses')->result();
        $data['all_city']=$this->db->select('city')->order_by('city', 'asc')->group_by('city')->get('businesses')->result();
        $data['all_state']=$this->db->select('state')->order_by('state', 'asc')->group_by('state')->get('businesses')->result();
        $data['all_zip']=$this->db->select('zip')->order_by('zip', 'asc')->group_by('zip')->get('businesses')->result();
        $data['all_business']=$this->db->order_by('company')->get('businesses')->result();
        $data['all_business_count']=count($data['all_business']);
        $data['content']=$this->load->view('front-end/marketing/business',$data,true);
        $this->load->view('front-end/master',$data);
    }

    public function add_business(){
        $data=array();
        $data['content']=$this->load->view('front-end/marketing/add_business',$data,true);
        $this->load->view('front-end/master',$data);
    }
    
    public function save_business(){
         $response = array(
            'success'=> true,
            'error'=> false,
            'msg'=>''
        );

        $this->form_validation->set_rules('company', 'company', 'required');
        $this->form_validation->set_rules('bustype', 'business type', 'required');

        if ($this->form_validation->run() === true) {
            $data=array();
            $data['company']=$this->input->post('company',true);
            $data['bustype']=$this->input->post('bustype',true);
            $data['addr1']=$this->input->post('addr1',true);
            $data['addr2']=$this->input->post('addr2',true);
            $data['city']=$this->input->post('city',true);
            $data['state']=$this->input->post('state',true);
            $data['zip']=$this->input->post('zip',true);
            $data['contact']=$this->input->post('contact',true);
            $data['phone']=$this->input->post('phone',true);
            $data['email']=$this->input->post('email',true);
            $data['altcontact']=$this->input->post('altcontact',true);
            $data['altphone']=$this->input->post('altphone',true);
            $data['notes']=$this->input->post('altemail',true);
           
            $data['highlight']=$this->input->post('highlight',true);

            $this->db->insert('businesses', $data);
        }
        else{
            $response['error']=true;
            $response['error_list']=$this->form_validation->error_array();
        }
        echo json_encode($response);
    }

    public function edit_business($id){
        $data=array();
        $data['business']=$this->db->where('id', $id)->get('businesses')->row();
        $data['content']=$this->load->view('front-end/marketing/edit_business',$data,true);
        $this->load->view('front-end/master',$data);
    }

    public function update_business($id){

        $response = array(
            'success'=> true,
            'error'=> false,
            'msg'=>''
        );

        $this->form_validation->set_rules('company', 'company', 'required');
        $this->form_validation->set_rules('bustype', 'business type', 'required');

        if ($this->form_validation->run() === true) {
            $data=array();
            $data['company']=$this->input->post('company',true);
            $data['bustype']=$this->input->post('bustype',true);
            $data['addr1']=$this->input->post('addr1',true);
            $data['addr2']=$this->input->post('addr2',true);
            $data['city']=$this->input->post('city',true);
            $data['state']=$this->input->post('state',true);
            $data['zip']=$this->input->post('zip',true);
            $data['contact']=$this->input->post('contact',true);
            $data['phone']=$this->input->post('phone',true);
            $data['email']=$this->input->post('email',true);
            $data['altcontact']=$this->input->post('altcontact',true);
            $data['altphone']=$this->input->post('altphone',true);
            $data['notes']=$this->input->post('notes',true);
            $data['highlight']=$this->input->post('highlight',true);
            
            $this->db->where('id', $id)->update('businesses', $data);
        }
        else{
            $response['error']=true;
            $response['error_list']=$this->form_validation->error_array();
        }
        echo json_encode($response);
    }

    public function delete_business($id){
        $this->db->where('id', $id)->delete('businesses');
        redirect('marketing/business');
    }

    public function filter_business(){

       $select_company=$this->input->post('select_company', true);
       $select_bt=$this->input->post('select_bt', true);
       $select_city=$this->input->post('select_city', true);
       $select_state=$this->input->post('select_state', true);
       $select_zip=$this->input->post('select_zip', true);
       $search_text=$this->input->post('search_text', true);


       $query = "SELECT *  FROM `businesses` WHERE 1 "; 
       $and_query = [];

       
       if( isset($select_company) && $select_company != '' ) {
            $and_query[]="`company` like '%$select_company%'";
       }


       
       if( isset($select_bt) && $select_bt != '' ) {
            $and_query[]="`bustype` like '%$select_bt%'";
       }

       
       if( isset($select_city) && $select_city != '' ) {
            $and_query[]="`city` like '%$select_city%'";
       }


       if( isset($select_state) && $select_state != '' ) {
            $and_query[]="`state` like '%$select_state%'";
       }


       if( isset($select_zip) && $select_zip != '' ) {
            $and_query[]="`zip` like '%$select_zip%'";
       }


       if( isset($search_text) && $search_text != '' ) {
            $and_query[]="( `company` like '%$search_text%' OR `bustype` like '%$search_text%'  OR `addr1` like '%$search_text%'  OR `city` like '%$search_text%'  OR `state` like '%$search_text%' OR `zip` like '%$search_text%')";
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
                        $html .= '<p>'.($key+1).'. '.$result->company;
                        $html .= '</p>';
                    $html .= '</td>';

                    $html .= '<td>';
                        $html .= '<p>'.$result->bustype;
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
                        $html .= '<p>'.$result->altcontact;
                        $html .= '</p>';
                    $html .= '</td>';
                    
                    $html .= '<td>';
                        $html .= '<p>'.$result->altphone;
                        $html .= '</p>';
                    $html .= '</td>';
                    
                    $html .= '<td>';
                        $html .= '<p>'.$result->altemail;
                        $html .= '</p>';
                    $html .= '</td>';
                    
                    $html .= '<td>';
                        $html .= '<p>'.substr($result->notes , 0 , 100);
                        $html .= '</p>';
                    $html .= '</td>';

                    $html .= '<td>';
                        $html .= '<span class="pull-right edit_menu">';
                        $html .= '<a href="'.base_url()."edit_business/".$result->id.'">';
                        $html .= '<i class="far fa-edit"></i></a>';
                        $html .= '<a href="'.base_url()."delete_business/".$result->id.'">';
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


    public function sort_business($value){
         
        if($value=='company'){
            $result=$this->db->order_by('company', 'asc')->get('businesses')->result();
        }
        if($value=='bustype'){
            $result=$this->db->order_by('bustype', 'asc')->get('businesses')->result();
        }

        $html = '';
        if($result){
            foreach ($result as $key => $result) {
                $html .= '<tr>';
                    
                    $html .= '<td>';
                        $html .= '<p>'.$key.'. '.$result->company;
                        $html .= '</p>';
                    $html .= '</td>';

                    $html .= '<td>';
                        $html .= '<p>'.$result->bustype;
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
                        $html .= '<p>'.$result->altcontact;
                        $html .= '</p>';
                    $html .= '</td>';
                    
                    $html .= '<td>';
                        $html .= '<p>'.$result->altphone;
                        $html .= '</p>';
                    $html .= '</td>';
                    
                    $html .= '<td>';
                        $html .= '<p>'.$result->altemail;
                        $html .= '</p>';
                    $html .= '</td>';
                    
                    $html .= '<td>';
                        $html .= '<p>'.substr($result->notes , 0 , 100);
                        $html .= '</p>';
                    $html .= '</td>';

                    $html .= '<td>';
                        $html .= '<span class="pull-right edit_menu">';
                        $html .= '<a href="'.base_url()."edit_business/".$result->id.'">';
                        $html .= '<i class="far fa-edit"></i></a>';
                        $html .= '<a href="'.base_url()."delete_business/".$result->id.'">';
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
}