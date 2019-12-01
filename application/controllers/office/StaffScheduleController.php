<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StaffScheduleController extends CI_Controller {
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
    }
    //index method 
    public function index(){
        $data=array();
        $data['week_ending']=$this->db->query('select week_ending from schedules where shift_status="published" group by week_ending order by week_ending desc limit 52')->result();
       

        $data['content']=$this->load->view('front-end/office/staff_schedule/staff_schedule',$data,true);
        $this->load->view('front-end/master', $data);
    }



    public function get_schedule($week_ending){

        //employees of selected week end
        $result = $this->db->select('id,employee,priority')
                         ->where(['week_ending'=> $week_ending,  'delete_flag'=>0])
                         ->group_by('employee')
                         ->order_by('priority', 'asc')
                         ->get('schedules')
                         ->result();
        print_r($result);
        //dates for one week
        $date6 = date('n/j', strtotime($week_ending.' -1 days'));
        $date5 = date('n/j', strtotime($week_ending.' -2 days'));
        $date4 = date('n/j', strtotime($week_ending.' -3 days'));
        $date3 = date('n/j', strtotime($week_ending.' -4 days'));
        $date2 = date('n/j', strtotime($week_ending.' -5 days'));
        $date1 = date('n/j', strtotime($week_ending.' -6 days'));
        $date0=  date('n/j', strtotime($week_ending));

        $date=array();
        $date[0]=date('Y-m-d', strtotime($week_ending.' -6 days'));
        $date[1]=date('Y-m-d', strtotime($week_ending.' -5 days'));
        $date[2]=date('Y-m-d', strtotime($week_ending.' -4 days'));
        $date[3]=date('Y-m-d', strtotime($week_ending.' -3 days'));
        $date[4]=date('Y-m-d', strtotime($week_ending.' -2 days'));
        $date[5]=date('Y-m-d', strtotime($week_ending.' -1 days'));
        $date[6]=date('Y-m-d', strtotime($week_ending));
        
        $html='';
        $html .= '<thead><tr>';
            $html .= '<th></th><th>Sunday<br>' .$date1. '</th>'; 
            $html .= '<th>Monday<br>' .$date2. '</th>'; 
            $html .= '<th>Tuesday<br>' .$date3. '</th>'; 
            $html .= '<th>Wednesday<br>' .$date4. '</th>';
            $html .= '<th>Thursday<br>' .$date5. '</th>'; 
            $html .= '<th>Friday<br>' .$date6. '</th>';   
            $html .= '<th>Saturday<br>' .$date0. '</th>';   
        $html .= '</tr></thead>';

        $html .= '<tbody>';
        foreach ($result as $value) {           
            $html .= '<tr>';
            $html .= '<td>'.$value->employee. '</td>';
               foreach ($date as $key => $v) {
                    $from_to = $this->db->select('from, to, other')
                         ->where(['employee'=> $value->employee, 'date'=>$v ,'shift_status'=>'published'])
                         ->limit(1)
                         ->group_by('employee')
                         ->order_by('priority', 'asc')
                         ->get('schedules')
                         ->row();  
                         
                         if($from_to){
                             if($from_to->from){
                                $html .= '<td>'.str_replace('m', '', date('g:ia ',strtotime($from_to->from))).'-'.str_replace('m', '', date('g:ia ',strtotime($from_to->to))).'</td>';
                             }else{
                                $html .= '<td>'.$from_to->other.'</td>';
                             } 
                         }
                         else{
                            $html .= '<td></td>';
                         }
                }
          
            $html .= '</tr>';
        }
        $html .= '</tbody>';


        echo $html;
    }



    public function edit_schedule(){
        //user role checing start
           $userId = $this->ion_auth->get_user_id();
           $user_info = $this->db->query("SELECT * FROm users WHERE `id` LIKE $userId")->row();
           
            if ($user_info->p_editschedules == 0){
                 redirect('dashboard', 'refresh');
            }else{
      
        $nextSat = "This Saturday";
        $date=array();
        $date[0] = date('l m/d/Y', strtotime($nextSat)); //displayed week value
        $date[1] = date('l m/d/Y', strtotime($nextSat.' +1 week'));
        $date[2] = date('l m/d/Y', strtotime($nextSat.' +2 weeks'));
        $date[3] = date('l m/d/Y', strtotime($nextSat.' +3 weeks'));
        $date[4] = date('l m/d/Y', strtotime($nextSat.' +4 weeks'));
        $date[5] = date('l m/d/Y', strtotime($nextSat.' +5 weeks'));
        
        $data=array();
        $data['week_ending']= $date;

        $data['content']=$this->load->view('front-end/office/staff_schedule/edit_schedule',$data,true);
        $this->load->view('front-end/master', $data);
            }
    }



   //cretae or edit page data
    public function get_schedule_to_edit($week_ending){
        
        //if week ending not exists then copy latest records to this week ending
        $week_ending_exist = $this->db->where(['week_ending' => $week_ending])->get('schedules')->result();
        if(!$week_ending_exist){
           //find latest week_ending
           $latest_week_ending = $this->db->select('week_ending')->limit(1)->order_by('week_ending', 'desc')->where(['week_ending <'=> $week_ending,'delete_flag'=>0 ])->get('schedules')->row()->week_ending;
           
           //find all records of latest week ending
           $latest_employees = $this->db->select('employee')->where(['week_ending'=>$latest_week_ending])->order_by('priority', 'asc')->group_by('employee')->get('schedules')->result();
          
          //insert lastest values to new week ending, $key is priority
          //for each employee there will be 7 distinct inserts according to 7 dates of week ending
           foreach ($latest_employees as $key => $value) {
              for($i=6; $i>=0; $i--) {
                  $data=array();
                  $data['week_ending']=$week_ending;
                  $data['shift_status']= 'temp';
                  $data['employee']=$value->employee;
                  $data['priority']=$key+1;
                  $data['date']= date('Y-m-d', strtotime($week_ending. ' -'.$i.'  days'));
                  $this->db->insert('schedules', $data);
              }
              
           }
        }


        $result = $this->db->select('id,employee,priority,date')
                         ->where(['week_ending'=> $week_ending,  'delete_flag'=>0])
                         ->group_by('employee')
                         ->order_by('priority', 'asc')
                         ->get('schedules')
                         ->result(); 
        $lastKey=sizeof($result)-1;                

        //dates for $week ending
        $date6 = date('n/j', strtotime($week_ending.' -1 days'));
        $date5 = date('n/j', strtotime($week_ending.' -2 days'));
        $date4 = date('n/j', strtotime($week_ending.' -3 days'));
        $date3 = date('n/j', strtotime($week_ending.' -4 days'));
        $date2 = date('n/j', strtotime($week_ending.' -5 days'));
        $date1 = date('n/j', strtotime($week_ending.' -6 days'));
        $date0=  date('n/j', strtotime($week_ending));
        

        //dates for $week ending
        $date_w=array();
        $date_w[0] = date('Y-m-d', strtotime($week_ending.' -6 days'));
        $date_w[1] = date('Y-m-d', strtotime($week_ending.' -5 days'));
        $date_w[2] = date('Y-m-d', strtotime($week_ending.' -4 days'));
        $date_w[3] = date('Y-m-d', strtotime($week_ending.' -3 days'));
        $date_w[4] = date('Y-m-d', strtotime($week_ending.' -2 days'));
        $date_w[5] = date('Y-m-d', strtotime($week_ending.' -1 days'));
        $date_w[6] = date('Y-m-d', strtotime($week_ending));

        //from to dates
        $res=$this->db->select('week_ending')
                      ->where(['week_ending !='=> $week_ending, 'shift_status'=>'published', 'delete_flag'=>0])
                      ->limit(1)->group_by('week_ending')
                      ->order_by('week_ending', 'desc')
                      ->get('schedules')
                      ->row();

        $recent_week_ending=$res->week_ending;
        //dates for recent week ending just showing suggestion
        $date=array();
        $date[0]=date('Y-m-d', strtotime($recent_week_ending.' -6 days'));
        $date[1]=date('Y-m-d', strtotime($recent_week_ending.' -5 days'));
        $date[2]=date('Y-m-d', strtotime($recent_week_ending.' -4 days'));
        $date[3]=date('Y-m-d', strtotime($recent_week_ending.' -3 days'));
        $date[4]=date('Y-m-d', strtotime($recent_week_ending.' -2 days'));
        $date[5]=date('Y-m-d', strtotime($recent_week_ending.' -1 days'));
        $date[6]=date('Y-m-d', strtotime($recent_week_ending));      


        $html='';
        $html .= '<thead><tr>';
            $html .= '<th></th><th>Sunday<br>' .$date1. '</th>'; 
            $html .= '<th>Monday<br>' .$date2. '</th>'; 
            $html .= '<th>Tuesday<br>' .$date3. '</th>'; 
            $html .= '<th>Wednesday<br>' .$date4. '</th>';
            $html .= '<th>Thursday<br>' .$date5. '</th>'; 
            $html .= '<th>Friday<br>' .$date6. '</th>';   
            $html .= '<th>Saturday<br>' .$date0. '</th>';   
        $html .= '</tr></thead>';

        $html .= '<tbody>';
        

        //for all employees in  $week_ending
        foreach ($result as $keyOfEmployee => $value) { 
            
            //VIEW MODE ROW ---INITIALLY VISIBLE 
            $res = $this->db->query('select sum(time_to_sec(timediff(`to`,`from`))) as thour from schedules where week_ending= "'.$week_ending.'" and delete_flag = 0 and `to` is not null and `from` is not null and employee= "'.$value->employee.'"')->row();
            $total_hour=$res->thour/3600; 

            $html .= '<tr class="view_mode'.$value->id.'">';

            $html .= '<td class="employee<?= $value->id ?>">'.$value->employee;
            if($total_hour>0){
              $html .= '<br><small>'.$total_hour.' Hour</small>';
            }
            $html .= '</td>';
            
            foreach($date_w as $dw) {
                 $schedule = $this->db->where(['date'=>$dw, 'employee'=> $value->employee, 'delete_flag'=>0, 'shift_status !='=>'backup'])->get('schedules')->row();

                //schedule exist and shitf status is temp/published, filled td  with corresponding color
                 if($schedule && ($schedule->shift_status=='temp' || $schedule->shift_status=='published') &&
                   (    
                        (($schedule->from != NULL) && ($schedule->from != NULL))  
                        || $schedule->other != '' 
                   )
                 ){
                        
                      if($schedule->shift_status == 'temp'  &&  $schedule->change_flag == 1){
                              if($schedule->other != NULL){
                                 $html .= '<td class="schedule" style="background-color:#ff6666">'.$schedule->other.'</td>';
                              }
                              else{
                                $html .= '<td class="schedule" style="background-color:#ff6666">'.str_replace('m','', date('g:ia', strtotime($schedule->from)))." - ".str_replace('m','' , date('g:ia', strtotime($schedule->to))).'</td>';
                              }
                        }

                        else if($schedule->shift_status == 'published'  &&  $schedule->change_flag == 0){
                              if($schedule->other != NULL || $schedule->other != ''){
                                 $html .= '<td class="schedule" style="background-color:#66ff66">'.$schedule->other.'</td>';
                              }
                              else{
                                $html .= '<td class="schedule" style="background-color:#66ff66">'.str_replace('m','', date('g:ia', strtotime($schedule->from)))." - ".str_replace('m','' , date('g:ia', strtotime($schedule->to))).'</td>';
                              }
                        }
                        else if($schedule->shift_status == 'published'  &&  $schedule->change_flag == 1){
                              if($schedule->from){
                                 $html .= '<td class="schedule" style="background-color:#ff6666">'.str_replace('m','', date('g:ia', strtotime($schedule->from)))." - ".str_replace('m', '', date('g:ia', strtotime($schedule->to))).'</td>';
                              }
                              else{
                                $html .= '<td class="schedule" style="background-color:#ff6666">'.$schedule->other.'</td>';
                              }
                        }
                }
                //schedule is null,blank td with corresponding color
                else{
                   $shift_status = $this->db->select('shift_status')->where(['week_ending'=>$week_ending])->limit(1)->get('schedules')->row();

                   $html .= '<td ';
                   if($shift_status->shift_status == 'published') $html .= ' style="background-color: #66ff66';
                   if($shift_status->shift_status == 'temp') $html .= ' style="background-color: lightgray';
                   $html .= '"></td>';
                }
            }
          
            $html .= '<td><i class="far fa-edit edit"  data-eid="'.$value->id.'"  style="cursor:pointer; margin-right:5px">EDIT</i>'; 
            $html .= '<i class="far fa-trash-alt delete" data-did="'.$value->id.'"  style="cursor: pointer"></i>';
            $html .= '</td>';   
            $html .= '</tr>'; 
            //---------------------------VIEW MODE ROW 


            //EDIT MODE ROW ---INITIALLY HIDDEN          
            $html .= '<tr class="edit_mode  edit_mode'.$value->id.'">';
            $html .= '<td>'.$value->employee;

            if($keyOfEmployee != $lastKey) $html .= '<span><i class="fas fa-sort-down fa-2x down" data-employee="'.$value->employee.'"  data-we="'.$week_ending.'" style="cursor: pointer;"></i>';

            if($keyOfEmployee > 0)  $html .= '<i class="fas fa-sort-up fa-2x up" data-employee="'.$value->employee.'"  data-we="'.$week_ending.'" style="cursor: pointer;"></i></span>';
            $html .= '</td>';
               
          
          //most recent week is $date (7 days array)
           foreach ($date as $k => $v) {
              $from_to = $this->db->select('from, to, other')
               ->where(['employee'=> $value->employee, 'date'=>$v ,'shift_status'=>'published'])
               ->limit(1)
               ->group_by('employee')
               ->order_by('priority', 'asc')
               ->get('schedules')
               ->row();  

                     
                if($from_to){
                    if($from_to->from){
                      //most recent weeks schedule of correspondig date
                      $html .= '<td><form class="update_schedule_form'.$value->id."_".$k.'"><div>('.date('g:ia ',strtotime($from_to->from)).'- '.date('g:ia ',strtotime($from_to->to)).')<br>';
                    }
                    else{
                      $html .= '<td><form class="update_schedule_form'.$value->id."_".$k.'"><div>'.$from_to->other.'<br>';
                    }
                }
                else{
                       $html .= '<td><form class="update_schedule_form'.$value->id."_".$k.'"><div>';
                }
                
                // $html .= '<input type="hidden" name="date'.$k.'" value="'.$k.'">';
                
                $schedule = $this->db->where(['date'=>$date_w[$k], 'employee'=> $value->employee, 'delete_flag'=>0])->get('schedules')->row();
                
                //show start time select box
                $start_time = strtotime('04:30:00');
                $end_time = strtotime('22:00:00');

                $html .= '<select name="from'.$k.'" style="padding:0px; font-size:12px">';
                $html .= '<option value="">Start</option>';
                $html .= '<option value=""></option>';
          
                while($end_time>$start_time){
                    $time = $start_time += 30*60;
                    $html .= '<option value="'.date('H:i:s',$time).'" ';
                    
                    if( isset($schedule->from) &&  date('H:i:s',$time) == date('H:i:s', strtotime($schedule->from))){
                       $html .= 'selected';
                    }

                    $html .= '>'.str_replace('m','' , date('g:ia',$time)).'</option>';
                }
                $html .= '</select>';

                $html .= '<br><input type="radio" name="choose'.$k.'" value="1" ';
                if(isset($schedule->from)  && ($schedule->from && $schedule->from != NULL) && ($schedule->to  && $schedule->from != NULL)){
                   $html .= 'checked'; 
                }
                $html .='> to<br>';
                
                //show end time
                $html .= '<select name="to'.$k.'" style="padding:0px; font-size:12px">';
                $html .= '<option value="">End</option>';
                $html .= '<option value=""></option>';
                
                $start_time = strtotime('04:30:00');
                $end_time = strtotime('22:00:00');
                while($end_time>$start_time){
                    $time = $start_time += 30*60;
                   
                    $html .= '<option value="'.date('H:i:s',$time).'" '; 
                    if( isset($schedule->to) && date('H:i:s',$time) == date('H:i:s', strtotime($schedule->to))){
                       $html .= 'selected';
                    }
                    $html .= '>'.str_replace('m','' , date('g:ia',$time)).'</option>';
                }

                $html .= '</select>';

                $html .= '<br><input type="radio" name="choose'.$k.'" value="0" ';
               if(isset($schedule->other)){
                   $html .= 'checked'; 
                }
                $html .= '> OFF';
                $html .= '</div></form></td>';
            }
            

            $html .= '<td>';
            $html .= '<i class="far fa-edit update"  data-uid="'.$value->id.'" data-employee="'.$value->employee.'" data-weekending="'.$week_ending.'" style="cursor:pointer; margin-right:5px">UPDATE</i>'; 
            $html .= '<i class="far fa-trash-alt delete" data-did="'.$value->id.'"  style="cursor: pointer"></i><span>'.$keyOfEmployee.'</span>';
            $html .= '</td>'; 
            $html .= '</tr>';          
        }

        $html .= '</tbody>';


        echo $html;
    }



  public function update_schedule(){
      $employee=$this->input->post('employee', true);
      $week_ending=$this->input->post('week_ending', true);
      
      //schedule[0] contains date1 and its value of from, to, other
      $schedule=array();
      $schedule[0]=$this->unserializeForm($this->input->post('schedule0', true));
      $schedule[1]=$this->unserializeForm($this->input->post('schedule1', true));
      $schedule[2]=$this->unserializeForm($this->input->post('schedule2', true));
      $schedule[3]=$this->unserializeForm($this->input->post('schedule3', true));
      $schedule[4]=$this->unserializeForm($this->input->post('schedule4', true));
      $schedule[5]=$this->unserializeForm($this->input->post('schedule5', true));
      $schedule[6]=$this->unserializeForm($this->input->post('schedule6', true));
      

      //7 days of $week_ending
      $date=array();
      $date[0] = date('Y-m-d', strtotime($week_ending.' -6 days')); //sunday
      $date[1] = date('Y-m-d', strtotime($week_ending.' -5 days'));
      $date[2] = date('Y-m-d', strtotime($week_ending.' -4 days'));
      $date[3] = date('Y-m-d', strtotime($week_ending.' -3 days'));
      $date[4] = date('Y-m-d', strtotime($week_ending.' -2 days'));
      $date[5] = date('Y-m-d', strtotime($week_ending.' -1 days'));
      $date[6] = date('Y-m-d', strtotime($week_ending)); //saturday
      
      //$k is week index
      foreach ($date as $k => $date_value) {

          if( isset($schedule[$k]['choose'.$k.'']) ){
              $choose = $schedule[$k]['choose'.$k.''];

              $data=array();
              $data['change_flag']=1;
              if($choose == 1){
                if( $schedule[$k]['from'.$k.''] != ''  && $schedule[$k]['to'.$k.''] != '' ){
                   $data['from']=$schedule[$k]['from'.$k.''];
                   $data['to']=$schedule[$k]['to'.$k.''];
                }
                $data['other']=NULL;
              }
              if($choose == 0){
                $data['other']='OFF';
                $data['from']=NULL;
                $data['to']=NULL;
              }

              $previous_data = $this->db->select('*')
                     ->where(['week_ending'=>$week_ending,
                       'employee'=>$employee,
                       'date'=>$date_value
                       ])
                    ->get('schedules')
                    ->row();

              //check which td(data) is changed ; not the same of previous
              if( 
                  $previous_data->from != $data['from'] ||
                  $previous_data->to != $data['to'] ||
                  $previous_data->other != $data['other']

              ){  

                  //for published, keep copy of previous data first
                  if( $previous_data->shift_status == 'published' ){
                      //check already have a copy, update
                      $backup = $this->db->where(['week_ending'=>$week_ending,'date'=>$date_value, 'shift_status'=>'backup'])->get('schedules')->row();

                      if($backup){
                          $copy_data=array();
                          $copy_data['week_ending']= $previous_data->week_ending;
                          $copy_data['shift_status']= 'backup';
                          $copy_data['employee']= $previous_data->employee;
                          $copy_data['date']= $date_value;
                          $copy_data['from']= $previous_data->from;
                          $copy_data['to']=$previous_data->to;
                          $copy_data['other']=$previous_data->other;
                          $copy_data['priority']= $previous_data->priority;
                          $copy_data['notes']=$previous_data->notes;
                          $copy_data['delete_flag']= 1;
                          $copy_data['change_flag']= 1;
                         
                          $this->db->where(['week_ending'=>$week_ending, 'employee'=> $employee,'date'=>$date_value, 'shift_status'=>'backup'])->update('schedules', $copy_data);
                      }
                      //no copy exist, insert new
                      else{
                          $copy_data=array();
                          $copy_data['week_ending']= $previous_data->week_ending;
                          $copy_data['shift_status']= 'backup';
                          $copy_data['employee']= $previous_data->employee;
                          $copy_data['date']= $date_value;

                          if($previous_data->from!=NULL) $copy_data['from']= $previous_data->from;
                          if($previous_data->to!=NULL)$copy_data['to']=$previous_data->to;
                          if($previous_data->other!=NULL)$copy_data['other']=$previous_data->other;

                          $copy_data['priority']= $previous_data->priority;
                          $copy_data['notes']=$previous_data->notes;
                          $copy_data['delete_flag']= 1;
                          $copy_data['change_flag']= 0;
                          
                          $this->db->insert('schedules', $copy_data);
                      }
                  } 


                  $this->db->where(['week_ending'=>$week_ending,
                           'employee'=>$employee,
                           'date'=>$date_value,
                           'shift_status !='=>'backup'
                           ])
                        ->update('schedules', $data);         
              }    
          }
      }

      echo "success";
    }


     function unserializeForm($str) {
        $returndata = array();
        $strArray = explode("&", $str);
        $i = 0;
        foreach ($strArray as $item) {
            $array = explode("=", $item);
            $returndata[$array[0]] = $array[1];
        }

        return $returndata;
     }


    public function reset_schedule(){
       $week_ending=$_POST['week_ending'];
       //for temp 
       //delete data, it will automatically get the latest data while selecting option
       $this->db->where(['week_ending'=>$week_ending, 'shift_status'=>'temp'])->delete('schedules');

       //for published 
       //get back the backup copy 
       $backup=$this->db->where(['week_ending'=>$week_ending, 'shift_status'=>'backup'])->get('schedules')->result();
      
       foreach ($backup as $key => $value) {
          $backup_data=array();
          $backup_data['week_ending'] =$value->week_ending;
          $backup_data['shift_status'] = 'published';
          $backup_data['employee'] = $value->employee;
          $backup_data['date'] = $value->date;
          $backup_data['from']=$value->from;
          $backup_data['to']=$value->to;
          $backup_data['other']=$value->other;
          $backup_data['notes']=$value->notes;
          $backup_data['priority'] = $value->priority;
          $backup_data['delete_flag'] =0;
          $backup_data['change_flag'] = 0;
          
          //check if main published copy is exist, update with the backup copy. or insert as new. permanently
          $published_copy=$this->db->where(['date'=>$value->date, 'shift_status'=>'published', 'week_ending'=>$week_ending, 'employee'=>$value->employee])->get('schedules')->row();

          if($published_copy){
             $this->db->where(['id'=> $published_copy->id])->update('schedules', $backup_data);
          }
          else{
            $this->db->insert('schedules', $backup_data);
          }

          //now delete the backup copy 
          $this->db->where(['id'=>$value->id])->delete('schedules');
       }

       //also get back the deleted copy
       $this->db->set('delete_flag', 0)->where(['week_ending'=>$week_ending, 'delete_flag'=>1])->update('schedules');

       echo  "sucess";
    }


    public function publish_schedule(){
       $week_ending=$_POST['week_ending'];
       $data=array();
       $data['shift_status']='published';
       $data['change_flag']=0;
       $this->db->where(['week_ending'=>$week_ending, 'shift_status!='=>'backup'])->update('schedules', $data);
         echo "sucess";

       $this->db->where(['week_ending'=>$week_ending,'shift_status'=>'backup'])->delete('schedules');  
    }


    public function delete_schedule(){
      $id = $_POST['id']; //id is the row id
      //find coresponding week ending and employee name of this id and delete
      $res = $this->db->select('week_ending, employee, shift_status')->where('id', $id)->get('schedules')->row();
      
      $data=array();
      $data['delete_flag']=1;
      $this->db->where(['week_ending'=> $res->week_ending,  'employee'=> $res->employee, 'shift_status!='=>'backup'])->update('schedules', $data);
      echo "success";
    }
    

    public function move_down(){
       $we = $_POST['week_ending'];
       $em = $_POST['employee'];

       
       //find priority
       $res=$this->db->select('priority')->where(['week_ending' => $we, 'employee' => $em, 'delete_flag'=>0, 'shift_status!='=>'backup'])->get('schedules')->row();
       
       $priority=$res->priority;
       $plus=$priority+1;
       

       //swap
       $this->db->query('update schedules set `priority` = '.$priority.' where `week_ending` = "'.$we.'" and `priority` = "'.$plus.'" ');

       $this->db->query('update schedules set `priority` = "'.$plus.'" where `week_ending` = "'.$we.'" and `employee` = "'.$em.'" ');
       
      echo "success";
    }


    public function move_up(){
       $we = $_POST['week_ending'];
       $em = $_POST['employee'];

       
       //find priority
       $res=$this->db->select('priority')->where(['week_ending' => $we, 'employee' => $em, 'delete_flag'=>0, 'shift_status!='=>'backup'])->get('schedules')->row();
       
       $priority=$res->priority;
       $minus=$priority-1;
       

       //swap
       $this->db->query('update schedules set `priority` = '.$priority.' where `week_ending` = "'.$we.'" and `priority` = "'.$minus.'" ');

       $this->db->query('update schedules set `priority` = "'.$minus.'" where `week_ending` = "'.$we.'" and `employee` = "'.$em.'" ');
       
      echo "success";
    }

}    