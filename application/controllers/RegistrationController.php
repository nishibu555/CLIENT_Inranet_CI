<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegistrationController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('RegistrationModel');
    }
   
    //added by nishi
    public function manually_save_student(){
        $response = array(
            'success'=> true,
            'error'=> false,
            'msg'=>''
        );
        
        $this->form_validation->set_rules('first_name', 'first name', 'required');
        $this->form_validation->set_rules('last_name', 'last name', 'required');

        if ($this->form_validation->run() === true) {
            $data=array();
            $data['fname']=$this->input->post('first_name',true);
            $data['lname']=$this->input->post('last_name',true);
            $data['status']= 'active';
            $data['rank']= 'student';
            $data['doe']=date("m/d/y");
            $this->db->insert('personnel', $data);
        }
        else{
            $response['error']=true;
            $response['error_list']=$this->form_validation->error_array();
        }
        echo json_encode($response);
    }
    
    
    public function save_note(){
        $id=$this->input->post('std_id',true);
        $data['admins_notes']=$this->input->post('admins_notes',true);
        
        $this->db->where('student_id', $id)->update('student_info', $data);
        echo "success";
    }
    
    
    public function student_registration_agreement(){
        $data = array();
        $data['content']=$this->load->view('front-end/register/register_form_agreement','',true);
        $this->load->view('front-end/master_for_registration',$data);
    }
    
    public function save_agreement(){
        $isAgree= $this->input->post('isAgree', true);

        echo json_encode($isAgree);
    }

    public function studentRegistration(){
        $data = array();
        $data['content']=$this->load->view('front-end/register/register_form',$data,true);
        $this->load->view('front-end/master_for_registration',$data);
    }
    public function register_form_1()
    {
        $this->load->view('front-end/register/register_form_1');
    }
    public function register_form_2()
    {
        $this->load->view('front-end/register/register_form_2');
    }
    public function register_form_3()
    {
        $this->load->view('front-end/register/register_form_3');
    }
    public function register_form_4()
    {
        $this->load->view('front-end/register/register_form_4');
    }
    public function register_form_5()
    {
        $this->load->view('front-end/register/register_form_5');
    }
    public function register_form_6()
    {
        $this->load->view('front-end/register/register_form_6');
    }
    public function register_form_7()
    {
        $this->load->view('front-end/register/register_form_7');
    }
    public function register_form_8()
    {
        $this->load->view('front-end/register/register_form_8');
    }
    
   
    public function save_registration_form1(){

        $this->form_validation->set_rules('first_name', 'first name', 'required');
        $this->form_validation->set_rules('last_name', 'last name', 'required');
        $this->form_validation->set_rules('address_line1', 'address line1', 'required');
        $this->form_validation->set_rules('city', 'city', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('zip_code', 'zip', 'required');
        $this->form_validation->set_rules('home_phone', 'home phone', 'required');

        $this->form_validation->set_rules('social_security_number', 'social security number', 'required');
        $this->form_validation->set_rules('date_of_birth', 'date of birth', 'required');
        
        //radio 
        $this->form_validation->set_rules('ethnic_background', 'ethnic background', 'required');

        $this->form_validation->set_rules('emc_name', 'emergency name', 'required');
        $this->form_validation->set_rules('emc_address_line1', 'emergency address line 1', 'required');
        $this->form_validation->set_rules('emc_city', 'emergency city', 'required');
        $this->form_validation->set_rules('emc_state', 'emergency state', 'required');
        $this->form_validation->set_rules('emc_zip_code', 'emergency zip code', 'required');
        $this->form_validation->set_rules('emc_home_phone', 'emergency home phone', 'required');
        $this->form_validation->set_rules('emc_relation_to_student', 'relation to student', 'required');

        $this->form_validation->set_rules('is_expressive', 'above', 'required');
        $this->form_validation->set_rules('explanation_is_expressive', 'above', 'required');
        $this->form_validation->set_rules('is_rational', 'above', 'required');
        $this->form_validation->set_rules('explanation_is_rational', 'above', 'required');

        $response = array(
            'success'=> false,
            'error'=> false,
            'msg'=>''
        );

        if ($this->form_validation->run() === true) {

            $student_info=array();
            $student_info['first_name'] = $this->input->post('first_name',true);
            $student_info['middle_name'] = $this->input->post('middle_name',true);
            $student_info['last_name'] = $this->input->post('last_name',true);
            $student_info['address_line1'] = $this->input->post('address_line1',true);
            $student_info['address_line2'] = $this->input->post('address_line2',true);
            $student_info['city'] = $this->input->post('city',true);
            $student_info['state'] = $this->input->post('state',true);
            $student_info['zip_code'] = $this->input->post('zip_code',true);
            $student_info['home_phone'] = $this->input->post('home_phone',true);
            $student_info['work_phone'] = $this->input->post('work_phone',true);
            $student_info['email'] = $this->input->post('email',true);
            $student_info['registration_date'] = date("Y/m/d");

            $std_id = $this->RegistrationModel->insert_data('student_info', $student_info);
            $this->session->set_userdata('student_id',$std_id);

            $social_security=array();
            $social_security['social_security_number'] = $this->input->post('social_security_number',true);
            $social_security['date_of_birth'] = $this->input->post('date_of_birth',true);
            $social_security['student_id'] = $std_id;
            $social_security['drivers_license_state'] = $this->input->post('drivers_license_state',true);
            $social_security['drivers_license_number'] = $this->input->post('drivers_license_number',true);
            $social_security['drivers_license_status'] = $this->input->post('drivers_license_status',true);
            $social_security['suspended_reason'] = $this->input->post('suspended_reason',true);

           
            $std_id = $this->RegistrationModel->insert_data('std_social_security', $social_security);

            $std_appearance=array();
            $std_appearance['student_id'] = $std_id;
            $std_appearance['height'] = $this->input->post('height',true);
            $std_appearance['weight'] = $this->input->post('weight',true);
            $std_appearance['hair_color'] = $this->input->post('hair_color',true);
            $std_appearance['eye_color'] = $this->input->post('eye_color',true);

            $std_id = $this->RegistrationModel->insert_data('std_appearance', $std_appearance);

            $ethnic_background=array();
            $ethnic_background['student_id'] = $std_id;
            $ethnic_background['ethnic_background'] = $this->input->post('ethnic_background',true);
            $ethnic_background['other_ethnic_background'] = $this->input->post('other_ethnic_background',true);
            $ethnic_background['is_american_citizen'] = $this->input->post('is_american_citizen',true);
            $ethnic_background['american_citizen_type'] = $this->input->post('american_citizen_type',true);
            $ethnic_background['other_citizenship'] = $this->input->post('other_citizenship',true);

            $std_id = $this->RegistrationModel->insert_data('std_ethnic_background', $ethnic_background);

            $emergency_contact=array();
            $emergency_contact['student_id'] = $std_id;
            $emergency_contact['emc_name'] = $this->input->post('emc_name',true);
            $emergency_contact['emc_address_line1'] = $this->input->post('emc_address_line1',true);
            $emergency_contact['emc_address_line2'] = $this->input->post('emc_address_line2',true);
            $emergency_contact['emc_city'] = $this->input->post('emc_city',true);
            $emergency_contact['emc_state'] = $this->input->post('emc_state',true);
            $emergency_contact['emc_zip_code'] = $this->input->post('emc_zip_code',true);
            $emergency_contact['emc_home_phone'] = $this->input->post('emc_home_phone',true);
            $emergency_contact['emc_work_phone'] = $this->input->post('emc_work_phone',true);
            $emergency_contact['emc_relation_to_student'] = $this->input->post('emc_relation_to_student',true);

            $std_id = $this->RegistrationModel->insert_data('std_emergency_contact', $emergency_contact);

            $reference=array();
            $reference['student_id'] = $std_id;
            $reference['reference_name'] = $this->input->post('reference_name',true);
            $reference['reference_address_line1'] = $this->input->post('reference_address_line1',true);
            $reference['reference_address_line2'] = $this->input->post('reference_address_line2',true);
            $reference['reference_city'] = $this->input->post('reference_city',true);
            $reference['reference_state'] = $this->input->post('reference_state',true);
            $reference['reference_zip_code'] = $this->input->post('reference_zip_code',true);
            $reference['reference_home_phone'] = $this->input->post('reference_home_phone',true);
            $reference['reference_work_phone'] = $this->input->post('reference_work_phone',true);
            $reference['reference_relation_to_student'] = $this->input->post('reference_relation_to_student',true);

            $std_id = $this->RegistrationModel->insert_data('std_reference', $reference);

            $personality_info=array();
            $personality_info['student_id'] = $std_id;
            $personality_info['is_expressive'] = $this->input->post('is_expressive',true);
            $personality_info['explanation_is_expressive'] = $this->input->post('explanation_is_expressive',true);
            $personality_info['is_rational'] = $this->input->post('is_rational',true);
            $personality_info['explanation_is_rational'] = $this->input->post('explanation_is_rational',true);
            
            $std_id = $this->RegistrationModel->insert_data('std_personality_info', $personality_info);

        }
        else{
            $response['error']=true;
            $response['error_list']=$this->form_validation->error_array();
        }
        echo json_encode($response);
    }


    public function save_registration_form2(){

         $response = array(
            'data'=>'',
            'success'=> false,
            'error'=> false,
            'custom_validation_error'=>''
          );
        
        $this->form_validation->set_rules('relationship_as_child', 'above', 'required');
        $this->form_validation->set_rules('relationship_at_present', 'above', 'required');
        $this->form_validation->set_rules('fathers_name', 'fathers name', 'required');
        $this->form_validation->set_rules('mothers_name', 'mothers name', 'required');
        $this->form_validation->set_rules('is_father_living', 'above', 'required');
        $this->form_validation->set_rules('is_mother_living', 'above', 'required');
        $this->form_validation->set_rules('parents_marital_status', 'above', 'required');
        $this->form_validation->set_rules('childhood_rating', 'above', 'required');
        $this->form_validation->set_rules('childhood_rating_reason', 'above', 'required');
        $this->form_validation->set_rules('not_feel_closest', 'above', 'required');
        $this->form_validation->set_rules('last_seen_parents', 'above', 'required');
        $this->form_validation->set_rules('last_live_at_home', 'above', 'required');
        $this->form_validation->set_rules('is_adopted', 'above', 'required');
        if( empty($_POST['member_name'][0]) || empty($_POST['member_age'][0]) || empty($_POST['member_relationship'][0]) ){
          $response['custom_validation_error']="this field is required";
        }

       
        if ($this->form_validation->run() === true) {

            $std_id=$this->session->userdata('student_id');

            for($i=0; $i<=3; $i++){
                $name = $_POST['member_name'][$i];
                $relationship = $_POST['member_relationship'][$i];
                $age = $_POST['member_age'][$i];
   
                if( !empty($name) && $relationship && $age ){
                    $family_member=array();
                    $family_member['student_id'] =  $std_id;
                    $family_member['member_name'] = $this->input->post('member_name',true)[$i];
                    $family_member['member_relationship'] = $this->input->post('member_relationship',true)[$i];
                    $family_member['member_age'] = $this->input->post('member_age',true)[$i];
                    $family_member['member_residence'] = $this->input->post('member_residence',true)[$i];
                    
                    $this->RegistrationModel->insert_data('std_family_member', $family_member);
                    
                }
            }
            
            $family_history=array();
            $family_history['student_id'] =  $std_id;
            $family_history['relationship_as_child'] = $this->input->post('relationship_as_child',true);
            $family_history['relationship_at_present'] = $this->input->post('relationship_at_present',true);
            $family_history['fathers_name'] = $this->input->post('fathers_name',true);
            $family_history['mothers_name'] = $this->input->post('mothers_name',true);
            $family_history['is_father_living'] = $this->input->post('is_father_living',true);
            $family_history['fathers_age'] = $this->input->post('fathers_age',true);
            $family_history['is_mother_living'] = $this->input->post('is_mother_living',true);
            $family_history['mothers_age'] = $this->input->post('mothers_age',true);
            $family_history['parents_marital_status'] = $this->input->post('parents_marital_status',true);
            $family_history['if_married_duration'] = $this->input->post('if_married_duration',true);
            $family_history['not_married_duration'] = $this->input->post('not_married_duration',true);
            $family_history['marriage_rating'] = $this->input->post('marriage_rating',true);
            $family_history['childhood_rating'] = $this->input->post('childhood_rating',true);
            $family_history['childhood_rating_reason'] = $this->input->post('childhood_rating_reason',true);
            $family_history['not_feel_closest'] = $this->input->post('not_feel_closest',true);
            $family_history['if_other_closest'] = $this->input->post('if_other_closest',true);
            $family_history['last_seen_parents'] = $this->input->post('last_seen_parents',true);
            $family_history['last_live_at_home'] = $this->input->post('last_live_at_home',true);
            $family_history['is_adopted'] = $this->input->post('is_adopted',true);
            $family_history['is_adopted_reason'] = $this->input->post('is_adopted_reason',true);
            $family_history['fathers_occupation'] = $this->input->post('fathers_occupation',true);
            $family_history['mothers_occupation'] = $this->input->post('mothers_occupation',true);

            $this->RegistrationModel->insert_data('std_family_history', $family_history);
         }
        else{
            $response['error']=true;
            $response['error_list']=$this->form_validation->error_array();
        }
        echo json_encode($response);
    }


    public function save_registration_form3(){


        $this->form_validation->set_rules('current_marital_status', 'above', 'required');
        if (empty($_POST['living_arrangement'])){
            $this->form_validation->set_rules('living_arrangement', 'above', 'required');
        }
        $this->form_validation->set_rules('have_children', 'above', 'required');

        $this->form_validation->set_rules('is_abused', 'above', 'required');
        if (empty($_POST['sexual_lifecycle'])){
            $this->form_validation->set_rules('sexual_lifecycle', 'sexual lifecycle', 'required');
        }
        $this->form_validation->set_rules('is_engaged_homosexual', 'above', 'required');
        $this->form_validation->set_rules('how_recently_involved', 'above', 'required');


        $this->form_validation->set_rules('is_served_us_army', 'above', 'required');

        $response = array(
            'success'=> false,
            'error'=> false,
            'msg'=>''
        );

        if($this->form_validation->run() == true){

            $std_id=$this->session->userdata('student_id');

            $marital_history=array();
            $marital_history['student_id'] = $std_id;
            $marital_history['current_marital_status'] = $this->input->post('current_marital_status',true);
            if( !empty($_POST['living_arrangement']) ){
              $marital_history['living_arrangement'] = serialize($_POST['living_arrangement']);
            }
            if( empty($_POST['living_arrangement'])){
                $array=array(" ");
                $financial_status['living_arrangement']=serialize($array);
            }
            $marital_history['if_other_la'] = $this->input->post('if_other_la',true); //if other specify
            $marital_history['current_spouse_name'] = $this->input->post('current_spouse_name',true);
            $marital_history['current_spouse_address_line1'] = $this->input->post('current_spouse_address_line1',true);
            $marital_history['current_spouse_address_line2'] = $this->input->post('current_spouse_address_line2',true);
            $marital_history['current_spouse_city'] = $this->input->post('current_spouse_city',true);
            $marital_history['current_spouse_state'] = $this->input->post('current_spouse_state',true);
            $marital_history['current_spouse_zip_code'] = $this->input->post('current_spouse_zip_code',true);
            $marital_history['current_spouse_home_phone'] = $this->input->post('current_spouse_home_phone',true);
            $marital_history['current_spouse_work_phone'] = $this->input->post('current_spouse_work_phone',true);
            $marital_history['relation_with_spouse'] = $this->input->post('relation_with_spouse',true);
            $marital_history['problem_with_spouse'] = $this->input->post('problem_with_spouse',true);
            
            $this->RegistrationModel->insert_data('std_marital_history', $marital_history);


            $children_info=array();
            $children_info['student_id'] = $std_id;
            $children_info['have_children'] = $this->input->post('have_children',true);
            $children_info['aspects_with_children'] = $this->input->post('aspects_with_children',true);
            $array=array(" ");
            $children_info['children_id'] = serialize($array);
               
            if(  $children_info['have_children'] == 0){
               $this->RegistrationModel->insert_data('std_children_info', $children_info);
            }
            else{
                $children_id=array();

                for($i=0; $i<=2; $i++){
                    $name = $_POST['children_name'][$i];
                    $age = $_POST['children_age'][$i];
                    $living_place = $_POST['children_living_place'][$i];

                    if( !empty($name) || !empty($age) || !empty($living_place) ){

                        $children['children_name'] = $this->input->post('children_name',true)[$i];
                        $children['children_age'] = $this->input->post('children_age',true)[$i];
                        $children['children_living_place'] = $this->input->post('children_living_place',true)[$i];

                        $this->RegistrationModel->insert_data('std_children', $children);
                        array_push($children_id, $this->db->insert_id() );
                    }
                }
                if( sizeof($children_id) > 0){
                     $children_info['children_id'] = serialize($children_id );
                }
                $this->RegistrationModel->insert_data('std_children_info', $children_info);
            }


            $abuse_history=array();
            $abuse_history['student_id'] = $std_id;
            $abuse_history['is_abused'] = $this->input->post('is_abused',true);
            $abuse_history['is_family_members_abused'] = $this->input->post('is_family_members_abused',true);
            $abuse_history['when_abused'] = $this->input->post('when_abused',true);
            $abuse_history['who_abused'] = $this->input->post('who_abused',true);
            $abuse_history['when_family_member_abused'] = $this->input->post('when_family_member_abused',true);
            $abuse_history['who_abused_family_member'] = $this->input->post('who_abused_family_member',true);
            if( !empty($_POST['sexual_lifecycle'])){
              $abuse_history['sexual_lifecycle'] = serialize($_POST['sexual_lifecycle']);
            }
            $abuse_history['how_recently_involved'] = $this->input->post('how_recently_involved',true);
            $abuse_history['is_engaged_homosexual'] = $this->input->post('is_engaged_homosexual',true);

            $this->RegistrationModel->insert_data('std_abuse_history', $abuse_history);


            $military_history=array();
            $military_history['student_id'] = $std_id;
            $military_history['is_served_us_army'] = $this->input->post('is_served_us_army',true);
            $military_history['branch_of_service'] = $this->input->post('branch_of_service',true);
            $military_history['entry_date'] = $this->input->post('entry_date',true);
            $military_history['discharge_date'] = $this->input->post('discharge_date',true);
            $military_history['rank'] = $this->input->post('rank',true);
            $military_history['discharge_recieved'] = $this->input->post('discharge_recieved',true);
            $military_history['eligible_for_mb'] = $this->input->post('eligible_for_mb',true);

            $this->RegistrationModel->insert_data('std_military_history', $military_history);

        }
        else{
            $response['error']=true;
            $response['error_list']=$this->form_validation->error_array();
        }
        echo json_encode($response);
    }


    public function save_registration_form4(){

            $response = array(
                'success'=> false,
                'error'=> false,
                'msg'=>''
            );

            $this->form_validation->set_rules('teen_challenge_accepted', 'above', 'required');
            $this->form_validation->set_rules('ul_supervision', 'under legal supervision', 'required');
            if (empty($_POST['pending_against']))
            {
                $this->form_validation->set_rules('pending_against', 'pending against', 'required');
            }
            $this->form_validation->set_rules('arrested_value', 'arrested', 'required');
            $this->form_validation->set_rules('in_prison', 'prison', 'required');
            $this->form_validation->set_rules('religion', 'religion', 'required');
            $this->form_validation->set_rules('sports', 'recreation/sports', 'required');
            $this->form_validation->set_rules('peer_group', 'peer group', 'required');
            $this->form_validation->set_rules('community_affiliation', 'community affiliations', 'required');
            $this->form_validation->set_rules('hobbies', 'hobbies', 'required');
            $this->form_validation->set_rules('other', 'Other', 'required');

            if ($this->form_validation->run() === true) {

                $std_id = $this->session->userdata('student_id');

                $std_legal_history = array();
                $std_legal_history['student_id'] = $std_id;
                $std_legal_history['teen_challenge_accepted'] = $this->input->post('teen_challenge_accepted',true);
                $std_legal_history['tc_by_whom'] = $this->input->post('tc_by_whom',true);
                $std_legal_history['tc_if_other_specify'] = $this->input->post('tc_if_other_specify',true);
                $std_legal_history['tc_origin_of_court'] = $this->input->post('tc_origin_of_court',true);
                $std_legal_history['ul_supervision'] = $this->input->post('ul_supervision',true);
                $std_legal_history['method_of_reporting'] = $this->input->post('method_of_reporting',true);
                $std_legal_history['mr_if_other_specify'] = $this->input->post('mr_if_other_specify',true);
                $std_legal_history['often_report'] = $this->input->post('often_report',true);
                $std_legal_history['how_long'] = $this->input->post('how_long',true);
                $std_legal_history['time_left'] = $this->input->post('time_left',true);
                $std_legal_history['parole_officer_name'] = $this->input->post('parole_officer_name',true);
                $std_legal_history['agency'] = $this->input->post('agency',true);
                $std_legal_history['lh_address_1'] = $this->input->post('address_1',true);
                $std_legal_history['lh_address_2'] = $this->input->post('address_2',true);
                $std_legal_history['lh_city'] = $this->input->post('city',true);
                $std_legal_history['lh_state'] = $this->input->post('state',true);
                $std_legal_history['lh_zip_code'] = $this->input->post('zip_code',true);
                $std_legal_history['lh_phone'] = $this->input->post('phone',true);

                if( !empty($_POST['pending_against'])){
                    $std_legal_history['pending_against'] = serialize($_POST['pending_against']);
                }
                if( empty($_POST['pending_against'])){
                    $array=array(" ");
                    $std_legal_history['pending_against'] = serialize($array);
                }
                $std_legal_history['pa_if_other_specify'] = $this->input->post('pa_if_other_specify',true);
                $std_legal_history['pa__above_explain'] = $this->input->post('pa__above_explain',true);

                $this->RegistrationModel->insert_data('std_legal_history',$std_legal_history);

                


                $std_in_prison['arrested_value'] = $this->input->post('arrested_value',true); 

                if( $std_in_prison['arrested_value']==0){
                    $std_crime_history=array();
                    $std_crime_history['student_id'] = $std_id;
                    $std_crime_history['arrested_value'] = $this->input->post('arrested_value', true);
                    $this->RegistrationModel->insert_data('std_crime_history', $std_crime_history);
                }
                else{
                    for($i=0; $i<=4; $i++){
                         $arrest_date = $_POST['arrest_date'][$i];
       
                        if( !empty($arrest_date) ){
                            $std_crime_history=array();
                            $std_crime_history = array();
                            $std_crime_history['student_id'] =  $std_id;
                            $std_crime_history['arrested_value'] = $this->input->post('arrested_value', true);

                            $std_crime_history['arrest_date'] = $this->input->post('arrest_date',true)[$i];
                            $std_crime_history['arrest_charges'] = $this->input->post('arrest_charges',true)[$i];
                            $std_crime_history['conviction'] = $this->input->post('conviction',true)[$i];
                            $std_crime_history['arrest_sentence'] = $this->input->post('arrest_sentence',true)[$i];
                            $std_crime_history['arrest_time_in_jail'] = $this->input->post('arrest_time_in_jail',true)[$i];
                            if (!empty($this->input->post('charge_involved', true)[$i])) {
                                $std_crime_history['charge_involved'] = $this->input->post('charge_involved', true)[$i];
                            }
                            $this->RegistrationModel->insert_data('std_crime_history', $std_crime_history);
                        }
                    }
                }




                $std_in_prison['in_prison'] = $this->input->post('in_prison',true); 

                if( $std_in_prison['in_prison']==0){
                    $std_in_prison = array();
                    $std_in_prison['student_id'] =  $std_id;
                    $std_in_prison['in_prison'] = $this->input->post('in_prison',true);
                    $this->RegistrationModel->insert_data('std_in_prison', $std_in_prison);
                }
                else{
                    for($i=0; $i<=1; $i++){
                         $in_prison_date = $_POST['in_prison_date'][$i];
                         $in_prison_institution = $_POST['in_prison_institution'][$i];
       
                        if( !empty($in_prison_date) || !empty($in_prison_institution) ){

                            $std_in_prison = array();
                            $std_in_prison['student_id'] =  $std_id;
                            $std_in_prison['in_prison'] = $this->input->post('in_prison',true);
                            $std_in_prison['in_prison_date'] = $this->input->post('in_prison_date',true)[$i];
                            $std_in_prison['in_prison_institution'] = $this->input->post('in_prison_institution',true)[$i];

                            $this->RegistrationModel->insert_data('std_in_prison', $std_in_prison);
                            
                        }
                    }
                }


                $std_social_involvement_history = array();
                $std_social_involvement_history['student_id'] = $std_id;
                $std_social_involvement_history['religion'] = $this->input->post('religion',true);
                $std_social_involvement_history['sports'] = $this->input->post('sports',true);
                $std_social_involvement_history['peer_group'] = $this->input->post('peer_group',true);
                $std_social_involvement_history['community_affiliation'] = $this->input->post('community_affiliation',true);
                $std_social_involvement_history['hobbies'] = $this->input->post('hobbies',true);
                $std_social_involvement_history['other'] = $this->input->post('other',true);

                $this->RegistrationModel->insert_data('std_social_involvement_history',$std_social_involvement_history);

                $response['error']=false;
                $response['success']=true;
                $response['msg']="Successfully added";
            }else
            {
                $response['error']=true;
                $response['error_list']=$this->form_validation->error_array();
            }
            echo json_encode($response);
    }


    public function save_registration_form5(){

         $this->form_validation->set_rules('have_applied_food_stamp', '', 'required');

         $this->form_validation->set_rules('movies', 'movies', 'required');
         $this->form_validation->set_rules('losses', 'losses', 'required');
         $this->form_validation->set_rules('sexual_abuse', 'sexual abuse', 'required');
         $this->form_validation->set_rules('physical_abuse', 'above', 'required');
         $this->form_validation->set_rules('home_placement', 'home placement', 'required');
         $this->form_validation->set_rules('cultural_influence', 'cultural influence', 'required');
         $this->form_validation->set_rules('other_event', 'other event', 'required');

         $this->form_validation->set_rules('highest_grade', 'highest grade', 'required');
         $this->form_validation->set_rules('can_read', 'above', 'required');
         $this->form_validation->set_rules('reading_competency', 'reading competency', 'required');
         $this->form_validation->set_rules('can_write', 'above', 'required');
         $this->form_validation->set_rules('writing_competency', 'writing competency', 'required');
         $this->form_validation->set_rules('have_vocational_training', 'above', 'required');
        
        $response = array(
            'success'=> false,
            'error'=> false,
            'msg'=>''
        );

        if ($this->form_validation->run() == true) {

             $std_id=$this->session->userdata('student_id');
             

             $financial_status=array();
             $financial_status['student_id'] = $std_id;
             $financial_status['medical'] = $this->input->post('medical',true);
             $financial_status['dental'] = $this->input->post('dental',true);
             if( !empty($_POST['eligible_for'])){
               $financial_status['eligible_for'] = serialize($_POST['eligible_for']);
             }
             if(empty($_POST['eligible_for'])){
                $array=array();
                $financial_status['eligible_for']=serialize($array);
             }
             $financial_status['if_other_eligible_for'] = $this->input->post('if_other_eligible_for',true);
             $financial_status['have_applied_food_stamp'] = $this->input->post('have_applied_food_stamp',true);
             $financial_status['where_applied'] = $this->input->post('where_applied',true);
             $financial_status['have_debts'] = $this->input->post('have_debts',true);
             $financial_status['debts_reason'] = $this->input->post('debts_reason',true);
             
             $this->RegistrationModel->insert_data('std_financial_status', $financial_status);


             $academic_info=array();
             $academic_info['student_id'] = $std_id;
             $academic_info['highest_grade'] = $this->input->post('highest_grade',true);
             $academic_info['is_currently_in_education'] = $this->input->post('is_currently_in_education',true);
             $academic_info['school_name'] = $this->input->post('school_name',true);
             $academic_info['school_city'] = $this->input->post('school_city',true);
             $academic_info['school_leaving_reason'] = $this->input->post('school_leaving_reason',true);
             $academic_info['have_vocational_training'] = $this->input->post('have_vocational_training',true);
             $academic_info['kind_of_training'] = $this->input->post('kind_of_training',true);
             

             $training_list_id=array();
             if( !empty( $_POST['have_cirtificate_issued'])  && !empty( $_POST['type_of_skill']) && !empty( $_POST['date_of_training']) ){
                for($i=0; $i<=1; $i++){
                    if( !empty( $_POST['have_cirtificate_issued'][$i])  && !empty( $_POST['type_of_skill'][$i]) && !empty( $_POST['date_of_training'][$i])){

                        $tarining_list['type_of_skill'] = $this->input->post('type_of_skill',true)[$i];
                        $tarining_list['date_of_training'] = $this->input->post('date_of_training',true)[$i];
                        $tarining_list['have_cirtificate_issued'] = $this->input->post('have_cirtificate_issued',true)[$i];

                        $this->RegistrationModel->insert_data('std_training_list', $tarining_list);
                        array_push($training_list_id, $this->db->insert_id() );
                    }
                } 
             }
           

             if( sizeof($training_list_id) > 0 ){
                $academic_info['tarinig_list_id'] = serialize($training_list_id );
             }

             $academic_info['can_read'] = $this->input->post('can_read',true);
             $academic_info['reading_competency'] = $this->input->post('reading_competency',true);
             $academic_info['can_write'] = $this->input->post('can_write',true);
             $academic_info['writing_competency'] = $this->input->post('writing_competency',true);
             $academic_info['future_educational_goal'] = $this->input->post('future_educational_goal',true);
             $academic_info['future_vocational_training'] = $this->input->post('future_vocational_training',true);

             $this->RegistrationModel->insert_data('std_academic_info', $academic_info);

                 
             $life_event=array();
             $life_event['student_id'] = $std_id;
             $life_event['movies'] = $this->input->post('movies',true);
             $life_event['losses'] = $this->input->post('losses',true);
             $life_event['sexual_abuse'] = $this->input->post('sexual_abuse',true);
             $life_event['physical_abuse'] = $this->input->post('physical_abuse',true);
             $life_event['home_placement'] = $this->input->post('home_placement',true);
             $life_event['cultural_influence'] = $this->input->post('cultural_influence',true);
             $life_event['other_event'] = $this->input->post('other_event',true);

             $this->RegistrationModel->insert_data('std_life_event', $life_event);

         }
         else{
            $response['error']=true;
            $response['error_list']=$this->form_validation->error_array();
         }
         echo json_encode($response);
    }


    public function save_registration_form6()
    { 

        $this->form_validation->set_rules('profession', 'profession', 'required');
        $this->form_validation->set_rules('jobs_last_two_years', 'above', 'required');
        $this->form_validation->set_rules('present_employement_status', 'above', 'required');
        if( empty($_POST['have_diet_requirement'])){
           $this->form_validation->set_rules('have_diet_requirement', 'above', 'required');
        }
       

        $response = array(
            'success'=> false,
            'error'=> false,
            'msg'=>''
        );

        if ($this->form_validation->run() == true) {
             $std_id=$this->session->userdata('student_id');
             
             $occupational_history=array();
             $occupational_history['student_id'] = $std_id;
             $occupational_history['profession'] = $this->input->post('profession',true);
             $occupational_history['jobs_last_two_years'] = $this->input->post('jobs_last_two_years',true);
             $occupational_history['present_employement_status'] = $this->input->post('present_employement_status',true);
             $most_recent_id = array();
             for($i=0; $i<=1; $i++){
                if( !empty( $_POST['employer'][$i])  &&
                    !empty( $_POST['employed_from'][$i]) && 
                    !empty( $_POST['employed_until'][$i])&& 
                    !empty( $_POST['position'][$i]) && 
                    !empty( $_POST['leaving_reason'][$i]) ){
                    
                    $most_recent_job=array();
                    $most_recent_job['student_id'] = $std_id;
                    $most_recent_job['employer'] = $this->input->post('employer',true)[$i];
                    $most_recent_job['employed_from'] = $this->input->post('employed_from',true)[$i];
                    $most_recent_job['employed_until'] = $this->input->post('employed_until',true)[$i];
                    $most_recent_job['position'] = $this->input->post('position',true)[$i];
                    $most_recent_job['leaving_reasonleaving_reason'] = $this->input->post('leaving_reason',true)[$i];

                    $this->RegistrationModel->insert_data('std_most_recent_job', $most_recent_job);
                    array_push($most_recent_id, $this->db->insert_id() );
                }
             }
             if( sizeof($most_recent_id) > 0 ){
                $occupational_history['most_recent_job_id'] = serialize($most_recent_id );
             }
             $occupational_history['current_avg_monthly_income'] = $this->input->post('current_avg_monthly_income',true);
             $occupational_history['primary_income_source'] = $this->input->post('primary_income_source',true);
             $occupational_history['future_occupational_goal'] = $this->input->post('future_occupational_goal',true);
             $occupational_history['skills'] = $this->input->post('skills',true);
             $occupational_history['have_injury_in_teen_challenge'] = $this->input->post('have_injury_in_teen_challenge',true);
             $occupational_history['injury_reason'] = $this->input->post('injury_reason',true);
        
             $this->RegistrationModel->insert_data('std_occupational_history', $occupational_history);


             $medical_history=array();
             $medical_history['student_id'] = $std_id;
             if( !empty($_POST['drag_abuse']) ){
                $medical_history['drag_abuse'] = serialize($_POST['drag_abuse']);
             }
             if(empty($_POST['drag_abuse'])){
                 $array=array(" ");
                 $medical_history['drag_abuse'] = serialize( $array);
             }

             if( !empty($_POST['alcoholism']) ){
                $medical_history['alcoholism'] = serialize($_POST['alcoholism']);
             }
             if(empty($_POST['alcoholism'])){
                 $array=array(" ");
                 $medical_history['alcoholism'] = serialize( $array);
             }

             if( !empty($_POST['physical_problems']) ){
                $medical_history['physical_problems'] = serialize($_POST['physical_problems']);
             }
             if(empty($_POST['physical_problems'])){
                 $array=array(" ");
                 $medical_history['physical_problems'] = serialize( $array);
             }

             if( !empty($_POST['mental_problems']) ){
                $medical_history['mental_problems'] = serialize($_POST['mental_problems']);
             }
             if(empty($_POST['mental_problems'])){
                 $array=array(" ");
                 $medical_history['mental_problems'] = serialize( $array);
             }

             $medical_history['illness_experienced_as_child'] = $this->input->post('illness_experienced_as_child',true);
             $medical_history['have_diet_requirement'] = $this->input->post('have_diet_requirement',true);
             $medical_history['diet_requirement_reason'] = $this->input->post('diet_requirement_reason',true);
             $medical_history['last_teeth_examined'] = $this->input->post('last_teeth_examined',true);
             $medical_history['have_teeth_problem_currently'] = $this->input->post('have_teeth_problem_currently',true);
             $medical_history['teeth_problem_currently_reason'] = $this->input->post('teeth_problem_currently_reason',true);

             $medical_history_insert_id=$this->RegistrationModel->insert_data('std_medical_history', $medical_history);
             $this->session->set_userdata('medical_history_insert_id',$medical_history_insert_id);

        }
        else{
            $response['error']=true;
            $response['error_list']=$this->form_validation->error_array();
        }    
        echo json_encode($response);  
    }

    
    public function save_registration_form7(){
        
        $this->form_validation->set_rules('use_alcohol', 'above', 'required');
        $this->form_validation->set_rules('use_amphetamines', 'above', 'required');
        $this->form_validation->set_rules('use_barbiturates', 'above', 'required');
        $this->form_validation->set_rules('use_heroin', 'above', 'required');
        $this->form_validation->set_rules('use_hallucinogenics', 'above', 'required');
        $this->form_validation->set_rules('use_opium', 'above', 'required');
        $this->form_validation->set_rules('use_cocaine', 'above', 'required');
        $this->form_validation->set_rules('use_tobacco', 'above', 'required');
        $this->form_validation->set_rules('use_marijuana', 'above', 'required');
        $this->form_validation->set_rules('use_crack', 'above', 'required');
        $this->form_validation->set_rules('use_crank', 'above', 'required');
        $this->form_validation->set_rules('use_other', 'above', 'required');

        $this->form_validation->set_rules('have_born_again', 'above', 'required');
        $this->form_validation->set_rules('circumstances', 'circumstances', 'required');
        $this->form_validation->set_rules('current_spiritual_condition', 'above', 'required');
        $this->form_validation->set_rules('attend_charch', 'above', 'required');
        $this->form_validation->set_rules('is_member_of_charch', 'above', 'required');
        $this->form_validation->set_rules('attend_charch_as_child', 'above', 'required');
        $this->form_validation->set_rules('do_believe_god', 'above', 'required');
        $this->form_validation->set_rules('do_pray', 'above', 'required');
        $this->form_validation->set_rules('read_bibel', 'above', 'required');
        $this->form_validation->set_rules('read_other', 'above', 'required');
        $this->form_validation->set_rules('recent_change_in_rl', 'above', 'required');
        


        $response = array(
            'success'=> false,
            'error'=> false,
            'msg'=>''
        );
        
        if($this->form_validation->run() == true){
            $std_id=$this->session->userdata('student_id');

            $medical_history = array();
            $medical_history['packs_of_cigarette'] = $this->input->post('packs_of_cigarette',true);
            $medical_history['cups_of_coffee'] = $this->input->post('cups_of_coffee',true);
            $medical_history['cups_of_tea'] = $this->input->post('cups_of_tea',true);

            $medical_history_insert_id = $this->session->userdata('medical_history_insert_id');
            $condition = ['medical_history_id' => $medical_history_insert_id];
            $this->RegistrationModel->update_data('std_medical_history', $condition, $medical_history);


            $spiritual_history = array();
            $spiritual_history['student_id'] =$std_id;
            $spiritual_history['have_born_again'] = $this->input->post('have_born_again',true);
            $spiritual_history['born_date'] = $this->input->post('born_date',true);
            $spiritual_history['born_place'] = $this->input->post('born_place',true);
            $spiritual_history['current_spiritual_condition'] = $this->input->post('current_spiritual_condition',true);
            $spiritual_history['circumstances'] = $this->input->post('circumstances',true);
            $spiritual_history['denomination_preference'] = $this->input->post('denomination_preference',true);
            $spiritual_history['attend_charch'] = $this->input->post('attend_charch',true);
            $spiritual_history['is_member_of_charch'] = $this->input->post('is_member_of_charch',true);
            $spiritual_history['charch_name'] = $this->input->post('charch_name',true);
            $spiritual_history['attend_charch_as_child'] = $this->input->post('attend_charch_as_child',true);
            $spiritual_history['which_denomination'] = $this->input->post('which_denomination',true);
            $spiritual_history['age_when_stop'] = $this->input->post('age_when_stop',true);
            $spiritual_history['stop_reason'] = $this->input->post('stop_reason',true);
            $spiritual_history['do_believe_god'] = $this->input->post('do_believe_god',true);
            $spiritual_history['do_pray'] = $this->input->post('do_pray',true);
            $spiritual_history['read_bibel'] = $this->input->post('read_bibel',true);
            $spiritual_history['read_other'] = $this->input->post('read_other',true);
            $spiritual_history['other_book_name'] = $this->input->post('other_book_name',true);
            $spiritual_history['recent_change_in_rl'] = $this->input->post('recent_change_in_rl',true);
            if( !empty($_POST['involved_in_cults'])){
                $spiritual_history['involved_in_cults'] = serialize($_POST['involved_in_cults']);
            }
            if( empty($_POST['involved_in_cults'])){
                $array=array(" ");
                $spiritual_history['involved_in_cults'] = serialize($array);
            }

            $spiritual_history['other_cults'] = $this->input->post('other_cults',true);
            $spiritual_history['explanation'] = $this->input->post('explanation',true);

            $this->RegistrationModel->insert_data('std_spiritual_history', $spiritual_history);


            $drug_history = array();
            $drug_history['student_id'] =$std_id;
            $drug_history['use_alcohol'] = $this->input->post('use_alcohol',true);
            $drug_history['use_amphetamines'] = $this->input->post('use_amphetamines',true);
            $drug_history['use_barbiturates'] = $this->input->post('use_barbiturates',true);
            $drug_history['use_heroin'] = $this->input->post('use_heroin',true);
            $drug_history['use_hallucinogenics'] = $this->input->post('use_hallucinogenics',true);
            $drug_history['use_opium'] = $this->input->post('use_opium',true);
            $drug_history['use_cocaine'] = $this->input->post('use_cocaine',true);
            $drug_history['use_tobacco'] = $this->input->post('use_tobacco',true);
            $drug_history['use_marijuana'] = $this->input->post('use_marijuana',true);
            $drug_history['use_crack'] = $this->input->post('use_crack',true);
            $drug_history['use_crank'] = $this->input->post('use_crank',true);
            $drug_history['use_other'] = $this->input->post('use_other',true);
            $drug_history['use_other_specify'] = $this->input->post('use_other_specify',true);

            $this->RegistrationModel->insert_data('std_drug_history', $drug_history);


            $physician_info = array();
            $physician_info['student_id'] =$std_id;
            $physician_info['physician_name'] = $this->input->post('physician_name',true);
            $physician_info['physician_address1'] = $this->input->post('physician_address1',true);
            $physician_info['physician_address2'] = $this->input->post('physician_address2',true);
            $physician_info['physician_city'] = $this->input->post('physician_city',true);
            $physician_info['physician_state'] = $this->input->post('physician_state',true);
            $physician_info['physician_zip'] = $this->input->post('physician_zip',true);
            $physician_info['physician_phone'] = $this->input->post('physician_phone',true);

            $this->RegistrationModel->insert_data('std_physicial_info', $physician_info);

        }
        else{
            $response['error']=true;
            $response['error_list']=$this->form_validation->error_array();
        }    
        echo json_encode($response); 
    }


    public function save_registration_form8()
    { 
         $this->form_validation->set_rules('main_problem', 'main problem', 'required');
         $this->form_validation->set_rules('what_done_about_main_problem', 'above', 'required');
         $this->form_validation->set_rules('greatest_needs', 'above', 'required');
         $this->form_validation->set_rules('is_in_program_before', 'above', 'required');
         // if ( empty($_POST['problem_type'])) {
         //    $this->form_validation->set_rules('problem_type', 'problem type', 'required'); 
         // }
         $this->form_validation->set_rules('programs_been_in_before', 'above', 'required');

        $response = array(
            'success'=> false,
            'error'=> false,
            'msg'=>''
        );

        if ($this->form_validation->run() == true) {

             $std_id=$this->session->userdata('student_id');
//             $std_id=3;
             
             $problem_definition=array();
             $problem_definition['student_id'] = $std_id;
             $problem_definition['main_problem'] = $this->input->post('main_problem',true);
             $problem_definition['what_done_about_main_problem'] = $this->input->post('what_done_about_main_problem',true);
             $problem_definition['greatest_needs'] = $this->input->post('greatest_needs',true);
             $problem_definition['is_in_program_before'] = $this->input->post('is_in_program_before',true);
             if( !empty($_POST['program_type'])){
               $problem_definition['program_type'] = serialize($_POST['program_type']);
             }
            if( empty($_POST['program_type'])){
                $array=array(" ");
                $problem_definition['program_type'] = serialize($array);
            }
             $problem_definition['programs_been_in_before'] = $this->input->post('programs_been_in_before',true);
             
             $this->RegistrationModel->insert_data('std_problem_definition', $problem_definition);
            
             $isComplete=array();
             $isComplete['isCompleteRegistration']=1;
             $this->db->where('student_id', $std_id)->update('student_info', $isComplete);
             $this->session->unset_userdata('student_id');

        }
        else{
            $response['error']=true;
            $response['error_list']=$this->form_validation->error_array();
        }    
        echo json_encode($response);    
    }
  
}
//END  