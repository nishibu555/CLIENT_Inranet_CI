<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DocController extends CI_Controller {
    public function __construct()
    {
	    parent::__construct();
	    $this->load->library('form_validation');
        $this->load->model('OfficeModel');
        $this->load->library('ion_auth');
        $this->load->helper('language');
        $this->lang->load('auth');

        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
         //user role checing start
           $userId = $this->ion_auth->get_user_id();
           $user_info = $this->db->query("SELECT * FROm users WHERE `id` LIKE $userId")->row();
           
        	if ($user_info->p_documents == 0){
        		 redirect('dashboard', 'refresh');
        	}
    }
    
    //index method 
    public function index(){
        $data=array();

        $data['content']=$this->load->view('front-end/office/doc/document',$data,true);
        $this->load->view('front-end/master', $data);
    }
    

    //create folder
    public function create_doc(){
        $response=0;

        $create= $this->input->post('create', true);
        $name= $this->input->post('name', true);
        $parent_id= $this->input->post('parent_id', true);

        if( (isset($create) && !empty($create)) && (isset($name) && !empty($name)) ){
            if($create == 'folder'){
                $data=array();
                $data['folder_title']=$name;
                $data['create_date']=date('m/d/Y');
                if(isset($parent_id) && $parent_id != null){
                  $data['parent_id']=$parent_id;
                }
                $this->db->insert('document_folder', $data);
                $response=1; //flag for folder
            }
            else{
                $data= $this->curl_get_file_contents($name);
                $title=mt_rand(0, 500);
                $fp = fopen(FCPATH."assets/documents/".$title.".jpg","w+");
                fwrite($fp, $data);
                fclose($fp);

                $data=array();
                $data['file_title']=$title.".jpg";
                $data['create_date']=date('m/d/Y');
                if(isset($parent_id) && $parent_id != null){
                  $data['folder_id']=$parent_id;
                }
                $this->db->insert('document_file', $data);
                $response=1;

            }
        }

       echo $response;
    }


    public function curl_get_file_contents($url){
    
        $c = curl_init();
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_URL, $url);
        curl_setopt($c, CURLOPT_BINARYTRANSFER, 1);
        curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        
        $contents = curl_exec($c);
        curl_close($c);

        if ($contents){
            return $contents;
        }
        else{
            return FALSE;
        } 
    }

    //upload file
    public function upload_doc(){

        $response=0;

        $config['upload_path']          = FCPATH . 'assets\documents';
        $config['allowed_types']        = '*';
        $config['max_size']             = 32000;

        $this->load->library('upload', $config);

        if ( $this->upload->do_upload('userfile')){
            $data = array('upload_data' => $this->upload->data());
            
            $file=array(); 
            $file['file_title']=$data['upload_data']['file_name'];
            $file['create_date']=date('m/d/Y');
            $file['size']=$data['upload_data']['file_size'];

            if(isset($_POST['fid'])  && !empty($_POST['fid'])){

                $file['folder_id']=$this->input->post('fid', true);
            }

            $this->db->insert('document_file', $file);
            $response=1;   
        }
        else{
             $response = array('error' => $this->upload->display_errors());
        }

        echo $response;
    }


    public function get_folder(){

        $result=$this->db->where('parent_id', null)->order_by('id', 'desc')->get('document_folder')->result();
        $folder_count=count($result); 
        $html=''; 
        if($result){
            $html .= '<ul style="list-style-type: none; padding: 5px  10px !important;">';
            foreach ($result  as $result) {
                $files=$this->db->where('folder_id', $result->id)->get('document_file')->result();
                $file_count = count($files);

                $html .= '<li class="folder_list" data-fid="'.$result->id.'" style="cursor: pointer">'.$result->folder_title.'<span style="float:right">'.$file_count.' files<span style="margin-left:30px">'.$result->create_date.'</span></span></li>';
            }
            $html .= '</ul>' ;
            $html .= '<div style="text-align:center ;font-size:12px;"><p>'.$folder_count.' folders</p></div>' ;
        }
        else{
            $html .= '<ul style="list-style-type: none; padding: 5px  10px !important;">';
            $html .= '<li class="folder_list">No folder available</li>';
            $html .= '</ul>' ;
        }

        echo $html;

    }


    public function get_folder_by_title($title){
       $res=$this->db->where('folder_title', $title)->select('id')->get('document_folder')->row();
       echo json_encode($res);
    }


    public function get_file(){

        $result=$this->db->where('folder_id', NULL)->order_by('id', 'desc')->get('document_file')->result();
        $file_count=count($result);
        $html=''; 
        if($result){
            $html .= '<ul style="list-style-type: none; padding: 5px  10px !important;">';
            foreach ($result  as $result) {
                $html .= '<li id="file_list" style="cursor:pointer"> <a target="blank" href="'.base_url().'assets/documents/'.$result->file_title.'">'.$result->file_title.'</a><span style="float:right">'.$result->size.' KB<span style="margin-left:30px">'.$result->create_date.'</span></span></li>';
                
            }
            $html .= '</ul>' ;
            $html .= '<div style="text-align:center ;font-size:12px;"><p>'.$file_count.' files</p></div>' ;
        }
        else{
            $html .= '<ul style="list-style-type: none; padding: 5px  10px !important;">';
            $html .= '<li id="folder_list">No file available</li>';
            $html .= '</ul>' ;
            
        }

        echo $html;
    }

    //get files and folders
    public function get_files_by_fdid($fdid){
      
       $result=$this->db->where('folder_id', $fdid)->get('document_file')->result();
       $folder=$this->db->where('id', $fdid)->get('document_folder')->row();
       $child_folder=$this->db->where('parent_id', $fdid)->get('document_folder')->result();
       $folder_name=$folder->folder_title;

       //paths
        $path=array($folder->folder_title);
        $parentId=$folder->parent_id;
        while($parentId!=NULL){
             $res=$this->db->where('id', $parentId)->get('document_folder')->row();
             if(isset($res)){
                array_unshift($path, $res->folder_title);
                if($res->parent_id != NULL ) $parentId=$res->parent_id;
                else $parentId=NULL;
             }
             else{
                $parentId=NULL;
             }
        }

        $html=''; 
        if($result){
            $html .= '<ul style="list-style-type: none; padding: 5px  10px !important;">';
            foreach ($result  as $result) {
                $html .= '<li id="file_list"> <a target="blank" href="'.base_url().'assets/documents/'.$result->file_title.'">'.$result->file_title.'</a></li>';
                
            }
            $html .= '</ul>' ;
        }
        else{
            $html .= '<ul style="list-style-type: none; padding: 5px  10px !important;">';
            $html .= '<li id="folder_list">No file available</li>';
            $html .= '</ul>' ;
        }

        

        $html1=''; 
        if($child_folder){
            $html1 .= '<ul style="list-style-type: none; padding: 5px  10px !important;">';
            foreach ($child_folder  as $res) {

                $files=$this->db->where('folder_id', $res->id)->get('document_file')->result();
                $file_count = count($files);

                $html1 .= '<li class="folder_list" data-fid="'.$res->id.'" style="cursor: pointer">'.$res->folder_title.'<span style="float:right">'.$file_count.' files<span style="margin-left:30px">'.$res->create_date.'</span></span></li>';
            }
            $html1 .= '</ul>' ;
           // $html1 .= '<div style="text-align:center ;font-size:12px;"><p>'.$folder_count.' folders</p></div>' ;
        }
        else{
            $html1 .= '<ul style="list-style-type: none; padding: 5px  10px !important;">';
            $html1 .= '<li class="folder_list">No folder available</li>';
            $html1 .= '</ul>' ;
        }


       echo json_encode(['html' => $html, 'html1' => $html1,'folder' =>$folder_name, 'fullPath'=> $path]);

    }


    public function search_doc(){
        $input= $this->input->post('search_input', true);

        $res1=$this->db->query("SELECT * FROM `document_folder` WHERE `folder_title` like '%$input%'")->result();

        $res2=$this->db->query("SELECT * FROM `document_file` WHERE `file_title` like '%$input%'")->result();
        

        $html = '';
        if($res1){
            $html .= '<ul style="list-style-type: none; padding: 5px  10px !important;">';
            foreach ($res1  as $res1) {
                $html .= '<li class="f_list" data-fid="'.$res1->id.'" style="cursor:pointer">'.$res1->folder_title.'</li>';
            }
            $html .= '</ul>' ;
        }
        else if($res2){
            $html .= '<ul style="list-style-type: none; padding: 5px  10px !important;">';
            foreach ($res2  as $res2) {
                $html .= '<li data-fid="'.$res2->id.'"><a target="blank" href="'.base_url().'assets/documents/'.$res2->file_title.'">'.$res2->file_title.'</a></li>';
            }
            $html .= '</ul>' ;
        }
        else{
           $html .= '<p>No result found.</p>';
        }

        echo $html;
    }



    public function sort_doc(){
       $value= $_POST['sort_by'];

       if($value=='date'){
         $sort_folder='create_date';
         $sort_file='create_date';
       }
       if($value=='size'){
          $sort_folder='';
          $sort_file='size';
       }
       if($value=='name'){
          $sort_folder='folder_title';
          $sort_file='file_title';
       }
       if($value=='type'){
           $sort_folder='';
           $sort_file='type';
       }
       
       $folder=$this->db->order_by($sort_folder, 'asc')->get('document_folder')->result();
       $file=$this->db->where('folder_id', NULL)->order_by($sort_file, 'asc')->get('document_file')->result();
       
       $folder_count=count($folder); 
       $html1='';
       if($folder){
            $html1 .= '<ul style="list-style-type: none; padding: 5px  10px !important;">';
            foreach ($folder  as $result) {
                $files=$this->db->where('folder_id', $result->id)->get('document_file')->result();
                $file_count = count($files);

                $html1 .= '<li class="folder_list" data-fid="'.$result->id.'" style="cursor: pointer">'.$result->folder_title.'<span style="float:right">'.$file_count.' files<span style="margin-left:30px">'.$result->create_date.'</span></span></li>';
            }
            $html1 .= '</ul>' ;
            $html1 .= '<div style="text-align:center ;font-size:12px;"><p>'.$folder_count.' folders</p></div>' ;
       }
       
        $file_count=count($file); 
        
        $html2='';
        if($file){
            $html2 .= '<ul style="list-style-type: none; padding: 5px  10px !important;">';
            foreach ($file  as $result) {
                $html2 .= '<li id="file_list" style="cursor:pointer"> <a target="blank" href="'.base_url().'assets/documents/'.$result->file_title.'">'.$result->file_title.'</a><span style="float:right">'.$result->size.' KB<span style="margin-left:30px">'.$result->create_date.'</span></span></li>';
                
            }
            $html2 .= '</ul>' ;
            $html2 .= '<div style="text-align:center ;font-size:12px;"><p>'.$file_count.' files</p></div>' ;
        }     


      
       echo json_encode(['html1'=>$html1, 'html2'=>$html2]);
    }

    
}










                // if( file_put_contents($new, $url) == true ) {
                //     $response=1;
                //     // $data=array();
                //     // $data['file_title']= time().".jpg";
                //     // $data['create_date']=date('m/d/Y');
                //     // if(isset($parent_id) && $parent_id != null){
                //     //   $data['folder_id']=$parent_id;
                //     // }
                //     // $this->db->insert('document_file', $data);
                //     // $response=1;
                // }