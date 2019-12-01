<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FundController extends CI_Controller {
   
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

    public function fund_raising(){
        $data=array();

        $data['tags']=$this->db->query('select personnel.id,fname,lname from personnel,fundraising_tags,fundraising_log where personnel.id=fundraising_tags.personnel_id  group by personnel.id order by fname asc')->result();
        

        $data['archive_date']=$this->db->query("SELECT DISTINCT SUBSTRING(`date`,1, 7) AS subdate  FROM `fundraising_log`")->result();

        $data['content']=$this->load->view('front-end/marketing/fund',$data,true);
        $this->load->view('front-end/master',$data);
    }

    
    public function get_tags(){

        if(isset($_POST['searchTerm'])){ 
           $search = $_POST['searchTerm'];

           $db_query = "select personnel.id,fname, lname from personnel,fundraising_tags,fundraising_log where personnel.id=fundraising_tags.personnel_id
             and (`fname` like '%".$search."%' or `lname` like '%".$search."%') group by personnel.id order by fname asc";

           $result=$this->db->query($db_query)->result();
        }
        

        $data = array();
        foreach ($result as $result) {    
          $data[] = array("id"=>$result->id, "text"=>$result->fname." ".$result->lname);
        }
        echo json_encode($data);
    }

   
    public function get_fund(){

        $total_fund=$this->db->query('select format(sum(amount),2) as total from fundraising_log where `date` >= date_sub(curdate(), interval 30 day)')->result();

       $result=$this->db->query('select * from fundraising_log where `date` >= date_sub(curdate(), interval 30 day) order by `id` DESC')
       ->result();


       $date2 = date('Y-m-d', strtotime(date('Y-m-d').' -30 days'));

       $leaderbord = $this->db->select('SUM(contribution) as con, fundraising_tags.*, fundraising_log.*, personnel.fname, personnel.lname')
                              ->where(['date>=' => $date2])
                              ->from('fundraising_log')
                              ->join('fundraising_tags', 'fundraising_tags.fundraising_id = fundraising_log.id')
                              ->join('personnel', 'personnel.id = fundraising_tags.personnel_id')
                              ->group_by('personnel_id')
                              ->order_by('con', 'desc')
                              ->get()
                              ->result();


        $html2='';
        if($total_fund){
           $html2 .='<p><i>Last 30 Days:  </i><span style="font-size: 30px">$'.$total_fund['0']->total.'</span></p>'; 
           $html2 .= '</br>';

           $html2 .= '<table>';
           $html2 .= '<tr><th>Leaderbord</th><tr>';
           foreach ($leaderbord as $key => $value) {
               $html2 .= '<tr>';
               $html2 .= '<td>'. $value->fname." ".$value->lname.'</td>';
               $html2 .= '<td>'.$value->con.'</td>';
               $html2 .= '</tr>';
           }
           $html2 .= '</table>';

        }


        $html='';
        if($result){
            foreach ($result as $key => $result) {
              $html .= '<p>'.date('m/d', strtotime($result->date))." - $".$result->amount.'</p>';
              $html .= '<p>'.$result->description.'</p>';
              
              $tags=$this->db->select('personnel.fname, personnel.lname')->from('personnel')->join('fundraising_tags', 'fundraising_tags.personnel_id = personnel.id')->where(['fundraising_tags.fundraising_id'=> $result->id])->get()->result();
              
                $html .= '<p style="border-bottom: 0.5px solid gray; margin-bottom: 15px">Team: ';
                
                foreach ($tags as $key => $value) {
                  $html .= '<span>'.$value->fname." ".$value->lname.', </span>';
                }

                $html .= '</p>';


            }
        }
        echo json_encode(['html' => $html,'html2' =>$html2]);
    }


    public function fund_date_filter(){
        
        $search_date = '%'.date('Y-m', strtotime($_POST['date'])).'%';

        $total_fund=$this->db->query("select format(sum(amount),2) as total from fundraising_log WHERE `date` LIKE '".$search_date."'")->result();


         $result = $this->db->query("SELECT * FROM `fundraising_log` WHERE `date` LIKE '".$search_date."' ORDER BY `id` DESC")->result();

         
         $leaderbord = $this->db->select('SUM(contribution) as con,fundraising_tags.*, fundraising_log.*, personnel.fname, personnel.lname')
                              ->from('fundraising_log')
                              ->join('fundraising_tags', 'fundraising_tags.fundraising_id = fundraising_log.id')
                              ->join('personnel', 'personnel.id = fundraising_tags.personnel_id')
                              ->like('fundraising_log.date', date('Y-m', strtotime($_POST['date'])))
                              ->group_by('personnel_id')
                              ->order_by('con', 'desc')
                              ->get()
                              ->result();
       

        $html2='';
        if($total_fund){
           $html2 .='<p><i>'.date('F Y', strtotime($_POST['date'])).':  </i><span style="font-size: 30px">$'.$total_fund['0']->total.'</span></p>'; 

           $html2 .= '<table>';
           $html2 .= '<tr><th>Leaderbord</th><tr>';
           foreach ($leaderbord as $key => $value) {
               $html2 .= '<tr>';
               $html2 .= '<td>'. $value->fname." ".$value->lname.'</td>';
               $html2 .= '<td>'.$value->con.'</td>';
               $html2 .= '</tr>';
           }
           $html2 .= '</table>';
        }

         $html='';
        if($result){
            foreach ($result as $key => $result) {
              $html .= '<p>'.date('m/d', strtotime($result->date))." - $".$result->amount.'</p>';
              $html .= '<p>'.$result->description.'</p>';
              
              $tags=$this->db->select('personnel.fname, personnel.lname')->from('personnel')->join('fundraising_tags', 'fundraising_tags.personnel_id = personnel.id')->where(['fundraising_tags.fundraising_id'=> $result->id])->get()->result();
             if($tags){
                $html .= '<p style="border-bottom: 0.5px solid gray; margin-bottom: 15px">Team: ';
              
                foreach ($tags as $key => $value) {
                  $html .= '<span>'.$value->fname." ".$value->lname.', </span>';
                }
                $html .= '</p>';
             }
             
              $html .= '<br>';
            }
        }
       echo json_encode(['html' => $html,'html2' =>$html2]);
    }


    public function save_fund(){
        $response = array(
            'success'=> false,
            'error'=> false,
            'msg'=>''
        );

        $this->form_validation->set_rules('date', 'date', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('amount', 'amount', 'required');

        if ($this->form_validation->run() === true) {
            $data=array();
            $data['date']=date('Y-m-d', strtotime($this->input->post('date', true)));
            $data['description']=$this->input->post('description', true);
            $data['amount']=round($this->input->post('amount', true),2);
            $this->db->insert('fundraising_log', $data);

            $fundraising_id=$this->db->insert_id();

            if(!empty($_POST['tags'])){
                $tags= $this->input->post('tags', true);
                $num_of_tag= count($tags);
                foreach ($tags as $key => $value) {
                   $tag=array();
                   $tag['fundraising_id']=$fundraising_id;
                   $tag['personnel_id']=$value;
                   $contribution=($data['amount']/$num_of_tag);
                   $tag['contribution']=round($contribution,2);
                   $this->db->insert('fundraising_tags', $tag);
                }
            }
        }
        else
        {
            $response['error']=true;
            $response['error_list']=$this->form_validation->error_array();
        }
        echo json_encode($response);
    }

}    