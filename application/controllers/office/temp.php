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
        foreach ($result as $value) { 
            
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
                $schedule = $this->db->where(['date'=>$dw, 'employee'=> $value->employee, 'delete_flag'=>0])->get('schedules')->row();

                //schedule exist and shitf status is temp/published, filled td  with corresponding color
                if($schedule && 
                  ( ($schedule->from != '00:00:00' && $schedule->from != '00:00:00')  || $schedule->other != '' )
                ){
                        if($schedule->shift_status == 'temp'  &&  $schedule->change_flag == 1){
                              if($schedule->from){
                                $html .= '<td class="schedule" style="background-color:#ff6666">'.str_replace('m','', date('g:ia', strtotime($schedule->from)))." - ".str_replace('m','' , date('g:ia', strtotime($schedule->to))).'</td>';
                              }
                              else{
                                 $html .= '<td class="schedule" style="background-color:#ff6666">'.$schedule->other.'</td>';
                              }
                        }
                        else if($schedule->shift_status == 'published'  &&  $schedule->change_flag == 0){
                              if($schedule->from){
                                 $html .= '<td class="schedule" style="background-color:#66ff66">'.str_replace('m','', date('g:ia', strtotime($schedule->from)))." - ".str_replace('m', '', date('g:ia', strtotime($schedule->to))).'</td>';
                              }
                              else{
                                $html .= '<td class="schedule" style="background-color:#66ff66">'.$schedule->other.'</td>';
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

                        else{
                           $html .= '<td>--</td>';
                        }
                }
                //schedule is null bt shitf status is temp/published, blank td with corresponding color
                else{

                   //shift status of whole week ending
                   $shift_status = $this->db->select('shift_status')->where('week_ending', $week_ending)->limit(1)->get('schedules')->row();

                   $html .= '<td ';
                   if($shift_status->shift_status == 'published'){
                      $html .= ' style="background-color: #66ff66';
                   }
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
            $html .= '<span><i class="fas fa-sort-down fa-2x down" data-downid="'.$value->id.'"  style="cursor: pointer;"></i>';
            $html .= '<i class="fas fa-sort-up fa-2x up" data-upid="'.$value->id.'"  style="cursor: pointer;"></i></span>';
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
                    
                    if(date('H:i:s',$time) == date('H:i:s', strtotime($schedule->from))){
                       $html .= 'selected';
                    }

                    $html .= '>'.str_replace('m','' , date('g:ia',$time)).'</option>';
                }
                $html .= '</select>';

               

                $html .= '<br><input type="radio" name="choose'.$k.'" value="1" ';
                if(($schedule->from && $schedule->from != '00:00:00') && ($schedule->to  && $schedule->from != '00:00:00')){
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
                    if(date('H:i:s',$time) == date('H:i:s', strtotime($schedule->to))){
                       $html .= 'selected';
                    }
                    $html .= '>'.str_replace('m','' , date('g:ia',$time)).'</option>';
                }

                $html .= '</select>';

                $html .= '<br><input type="radio" name="choose'.$k.'" value="0" ';
               if($schedule->other){
                   $html .= 'checked'; 
                }
                $html .= '> OFF';
                $html .= '</div></form></td>';
            }
            

            $html .= '<td><i class="far fa-edit update"  data-uid="'.$value->id.'" data-employee="'.$value->employee.'" data-weekending="'.$week_ending.'" style="cursor:pointer; margin-right:5px">UPDATE</i>'; 
            $html .= '<i class="far fa-trash-alt delete" data-did="'.$value->id.'"  style="cursor: pointer"></i>';
            $html .= '</td>'; 
            $html .= '</tr>';          
        }

        $html .= '</tbody>';


        echo $html;
    }