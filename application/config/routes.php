<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'RecordController/Dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

#######################################################
################  Work crew ROUTES        ###############
#######################################################
$route['work'] = 'work/WorkController/index';
$route['work/resources'] = 'work/WorkController/resources';
$route['work/assignments'] = 'work/WorkController/assignments';
$route['create_resource'] = 'work/WorkController/create_resource';
$route['update_resource'] = 'work/WorkController/update_resource';
$route['delete_resource'] = 'work/WorkController/delete_resource';
$route['get_past_assignments'] = 'work/WorkController/get_past_assignments';
$route['repeat_last_day'] = 'work/WorkController/repeat_last_day';
$route['ajax/get_new_data'] = 'work/WorkController/get_new_data';
$route['ajax/work/update_column'] = 'work/WorkController/update_column';
$route['ajax/work/update_order'] = 'work/WorkController/update_order';
$route['work/add_new_note'] = 'work/WorkController/add_new_note';
$route['work/get_last_location'] = 'work/WorkController/get_last_location';




#######################################################
################    OFFICE ROUTES        ##############
#######################################################

$route['office'] = 'office/OfficeController/index';
//dir
$route['office/directory'] = 'office/DirectoryController/index';
$route['office/save_directory'] = 'office/DirectoryController/save_directory';
$route['office/directory/get_data'] = 'office/DirectoryController/get_data';
$route['office/get_edit_data'] = 'office/DirectoryController/get_edit_data';
$route['office/update_directory'] = 'office/DirectoryController/update_directory';
$route['office/delete_directory'] = 'office/DirectoryController/delete_directory';
//doc
$route['office/documents'] = 'office/DocController/index';
$route['create_doc'] = 'office/DocController/create_doc';
$route['upload_doc'] = 'office/DocController/upload_doc';
$route['get_folder'] = 'office/DocController/get_folder';
$route['get_file'] = 'office/DocController/get_file';
$route['get_files_by_fdid/(:any)'] = 'office/DocController/get_files_by_fdid/$1';
$route['get_folder_by_title/(:any)'] = 'office/DocController/get_folder_by_title/$1';
$route['search_doc'] = 'office/DocController/search_doc';
$route['sort_doc'] = 'office/DocController/sort_doc';
//inventory
$route['office/inventory'] = 'office/InventoryController/index';
$route['office/inventory/get_data'] = 'office/InventoryController/get_data';
$route['office/inventory/get_inventory_list'] = 'office/InventoryController/get_inventory_list';
$route['add_inventory'] = 'office/InventoryController/add_inventory';
$route['update_inventory'] = 'office/InventoryController/update_inventory';
$route['update_one_inventory'] = 'office/InventoryController/update_one_inventory';
$route['get_inventory'] = 'office/InventoryController/get_inventory';
$route['delete_inventory'] = 'office/InventoryController/delete_inventory';
$route['manage_inventory_list'] = 'office/InventoryController/manage_inventory_list';
$route['add_inventory_list'] = 'office/InventoryController/add_inventory_list';
$route['get_list'] = 'office/InventoryController/get_list';
$route['update_list'] = 'office/InventoryController/update_list';
$route['delete_list'] = 'office/InventoryController/delete_list';
//message center
$route['office/messages'] = 'office/MessageController/index';
$route['office/messages/compose'] = 'office/MessageController/compose';
$route['send_message'] = 'office/MessageController/send_message';
$route['office/messages/outbox'] = 'office/MessageController/outbox';
$route['delete_message'] = 'office/MessageController/delete_message';
$route['delete_one_msg'] = 'office/MessageController/delete_one_msg';
$route['office/messages/trash'] = 'office/MessageController/trash';
$route['empty_trash'] = 'office/MessageController/empty_trash';
$route['restore_trash'] = 'office/MessageController/restore_trash';
$route['get_inbox/(:any)'] = 'office/MessageController/get_inbox/$1';
$route['get_outbox/(:any)'] = 'office/MessageController/get_outbox/$1';
$route['reply/(:any)'] = 'office/MessageController/reply/$1';
//staff schedule
$route['office/schedules'] = 'office/StaffScheduleController/index';
$route['get_schedule/(:any)'] = 'office/StaffScheduleController/get_schedule/$1';
$route['get_schedule_to_edit/(:any)'] = 'office/StaffScheduleController/get_schedule_to_edit/$1';
$route['office/edit_schedule'] = 'office/StaffScheduleController/edit_schedule';
$route['update_schedule'] = 'office/StaffScheduleController/update_schedule';
$route['reset_schedule'] = 'office/StaffScheduleController/reset_schedule';
$route['publish_schedule'] = 'office/StaffScheduleController/publish_schedule';
$route['delete_schedule'] = 'office/StaffScheduleController/delete_schedule';
$route['move_down'] = 'office/StaffScheduleController/move_down';
$route['move_up'] = 'office/StaffScheduleController/move_up';

//_________________END OFFICE_________________________________



#######################################################
################    Marketing ROUTES        ###########
#######################################################

$route['marketing'] = 'marketing/MarketingController/marketing';
//Churches.........
$route['marketing/churches'] = 'marketing/ChurchController/churches';
$route['filter_chruch'] = 'marketing/ChurchController/filter_chruch';
$route['add_church'] = 'marketing/ChurchController/add_church';
$route['save_church'] = 'marketing/ChurchController/save_church';
$route['delete_church/(:any)'] = 'marketing/ChurchController/delete_church/$1';
$route['edit_church/(:any)'] = 'marketing/ChurchController/edit_church/$1';
$route['update_church/(:any)'] = 'marketing/ChurchController/update_church/$1';
$route['sort_church'] = 'marketing/ChurchController/sort_church';
//Business.........
$route['marketing/business'] = 'marketing/BusinessController/business';
$route['filter_business'] = 'marketing/BusinessController/filter_business';
$route['marketing/business/add_business'] = 'marketing/BusinessController/add_business';
$route['save_business'] = 'marketing/BusinessController/save_business';
$route['edit_business/(:any)'] = 'marketing/BusinessController/edit_business/$1';
$route['update_business/(:any)'] = 'marketing/BusinessController/update_business/$1';
$route['delete_business/(:any)'] = 'marketing/BusinessController/delete_business/$1';
$route['sort_business/(:any)'] = 'marketing/BusinessController/sort_business/$1';
//fund raising
$route['marketing/fund_raising'] = 'marketing/FundController/fund_raising';
$route['get_fund'] = 'marketing/FundController/get_fund';
$route['save_fund'] = 'marketing/FundController/save_fund';
$route['fund_date_filter'] = 'marketing/FundController/fund_date_filter';
$route['get_tags'] = 'marketing/FundController/get_tags';







//report_login_issue, 
$route['report_login_issue'] = 'LoginIssueController/report_login_issue';
$route['send_login_issue_mail'] = 'LoginIssueController/send_login_issue_mail';




$route['records'] = 'RecordController/Record';
$route['dashboard'] = 'RecordController/Dashboard';
$route['academic'] = 'RecordController/Academic';
$route['student-test-score'] = 'RecordController/StudentTestScore';
$route['logout'] = 'Auth/logout';
$route['login'] = 'Auth/login';

//students
$route['student_manager'] = 'RecordController/studentManager';
$route['student_detail/(:any)'] = 'RecordController/studentDeatil/$1';
$route['student/details/edit'] = 'RecordController/UpdateInfo';
$route['student/details/image_upload'] = 'RecordController/image_upload';
//Manually add student
$route['student_manager/manual_std/store'] = 'RegistrationController/manually_save_student';
$route['save_note'] = 'RegistrationController/save_note';
//$route['save_student_entry_value'] = 'RecordController/SaveStudentEntry';
$route['save_student_activity_value'] = 'RecordController/SaveStudentActivity';


//students Registration
//first page to accept and go for registration
$route['student_registration_agreement'] = 'RegistrationController/student_registration_agreement';
$route['save_agreement'] = 'RegistrationController/save_agreement';

//start registration
$route['student_registration'] = 'RegistrationController/studentRegistration';
$route['register_form_1'] = 'RegistrationController/register_form_1';
$route['register_form_2'] = 'RegistrationController/register_form_2';
$route['register_form_3'] = 'RegistrationController/register_form_3';
$route['register_form_4'] = 'RegistrationController/register_form_4';
$route['register_form_5'] = 'RegistrationController/register_form_5';
$route['register_form_6'] = 'RegistrationController/register_form_6';
$route['register_form_7'] = 'RegistrationController/register_form_7';
$route['register_form_8'] = 'RegistrationController/register_form_8';

$route['save_registration_form1'] = 'RegistrationController/save_registration_form1';
$route['save_registration_form2'] = 'RegistrationController/save_registration_form2';
$route['save_registration_form3'] = 'RegistrationController/save_registration_form3';
$route['save_registration_form4'] = 'RegistrationController/save_registration_form4';
$route['save_registration_form5'] = 'RegistrationController/save_registration_form5';
$route['save_registration_form6'] = 'RegistrationController/save_registration_form6';
$route['save_registration_form7'] = 'RegistrationController/save_registration_form7';
$route['save_registration_form8'] = 'RegistrationController/save_registration_form8';

//incomming students detail
$route['incoming_student_detail/(:any)'] = 'RecordController/incoming_student_detail/$1';
$route['page_1/(:any)'] = 'RecordController/page_1/$1';
$route['page_2/(:any)'] = 'RecordController/page_2/$1';
$route['page_3/(:any)'] = 'RecordController/page_3/$1';
$route['page_4/(:any)'] = 'RecordController/page_4/$1';
$route['page_5/(:any)'] = 'RecordController/page_5/$1';
$route['page_6/(:any)'] = 'RecordController/page_6/$1';
$route['page_7/(:any)'] = 'RecordController/page_7/$1';
$route['page_8/(:any)'] = 'RecordController/page_8/$1';

//activate student
$route['activate_student/(:any)'] = 'RecordController/activate_student/$1';

//activity routue
$route['activity'] = 'ActivityController/ActivityLog';
//$route['activity/(:any)'] = 'ActivityController/activity/$1';
$route['save_activity_value'] = 'ActivityController/SaveActivityValue';
$route['ajax/activity/get_data'] = 'ActivityController/get_data';
$route['ajax/get_data/date_filter'] = 'ActivityController/date_filter';
///chronologicals routes
$route['chronolical/get_data'] = 'ChronologicalsController/get_data';
$route['chronolical/save'] = 'ChronologicalsController/save';
$route['chronologicals'] = 'ChronologicalsController/Chronologicals';
$route['chronologicals/(:any)'] = 'ChronologicalsController/chronologicals/$1';

$route['save_note-discipline'] = 'RegistrationController/save_note';



//descipline routes new update 10-26-2019
$route['students-discipline'] = 'DisciplineController/StudentDiscipline';
$route['students-discipline/(:any)'] = 'DisciplineController/StudentDiscipline/$1';
$route['students/discipline/store'] = 'DisciplineController/store';
$route['students/discipline/details/(:any)'] = 'DisciplineController/disciplineDetails/$1';
$route['staff_Discipline/admin/editDisciplineData'] = 'DisciplineController/editDisciplineData';
$route['staff_Discipline/admin/store_edit_discipline'] = 'DisciplineController/store_edit_discipline';
$route['staff_Discipline/admin/editNoteData'] = 'DisciplineController/editNoteData';
$route['staff_Discipline/admin/store_edit_note'] = 'DisciplineController/store_edit_note';
$route['staff_Discipline/admin/revert_Discipline'] = 'DisciplineController/revert_Discipline';
$route['staff_Discipline/admin/resolved_Discipline'] = 'DisciplineController/resolved_Discipline';
$route['staff_Discipline/admin/delete_Discipline'] = 'DisciplineController/delete_Discipline';
$route['new_write_up_discipline'] = 'DisciplineController/new_write_up_discipline';
$route['save_new_write_up_discipline'] = 'DisciplineController/save_new_write_up_discipline';

$route['save_test_score_value'] = 'RecordController/SaveStudentTestScore';
$route['students_gsnc_psnc/(:any)'] = 'RecordController/StudentGSNCPSNC/$1';

//delete rouete
$route['delete_student'] = 'RecordController/delete_student';

//developemnt plan route
$route['development_plan'] = 'DevPlanController/development_plan';
$route['ajax/get_dev_plan/date_filter'] = 'DevPlanController/get_dev_plan';



//AA routes
$route['new-contract/(:any)'] = 'ContractController/StudentNewContract/$1';
$route['update_due_date'] = 'ContractController/UpdateContractDueDate';
$route['update_unit_title'] = 'ContractController/UpdateContractUnitTitle';
$route['update_major_theme'] = 'ContractController/UpdateContractMajorTheme';
$route['update_minor_theme'] = 'ContractController/UpdateContractMinorTheme';
$route['update_goals'] = 'ContractController/UpdateContractGoals';
$route['update_lessons'] = 'ContractController/UpdateContractLessons';
$route['update_scripture'] = 'ContractController/UpdateContractScripture';
$route['update_scripture_projects'] = 'ContractController/UpdateContractScriptureProject';
$route['update_character'] = 'ContractController/UpdateContractCharacter';
$route['update_character_project'] = 'ContractController/UpdateContractCharacterProject';
$route['update_personal_reading'] = 'ContractController/UpdateContractPersonalReading';
$route['update_bible_reading'] = 'ContractController/UpdateContractBibleReading';
$route['update_special_projects'] = 'ContractController/UpdateContractSpecialProject';
$route['update_scripture_worksheet'] = 'ContractController/update_scripture_worksheet';
$route['update_scripture_finaltest'] = 'ContractController/update_scripture_finaltest';
$route['update_assign_value/(:any)'] = 'ContractController/update_assign_value/$1';
$route['update_complete_value/(:any)'] = 'ContractController/update_complete_value/$1';
$route['update_reassign_value/(:any)'] = 'ContractController/update_reassign_value/$1';
$route['update_unassign_value/(:any)'] = 'ContractController/update_unassign_value/$1';
$route['delete-contract/(:any)'] = 'ContractController/DeleteContract/$1';
$route['student-contract/(:any)/(:any)'] = 'ContractController/StudentContract/$1/$2';


//education log
$route['education_log'] = 'EducationLogController/index';
$route['save_education_log'] = 'EducationLogController/save_education_log';
$route['ajax/education_log/get_data'] = 'EducationLogController/get_data';
$route['ajax/get_education_logdata/date_filter'] = 'EducationLogController/date_filter';
//student detail page, discharge student
$route['discharge_student/(:any)'] = 'RecordController/discharge_student/$1';
//student-contract next previous
$route['contract_previous/(:any)/(:any)'] = 'ContractController/contract_previous/$1/$2';
$route['contract_next/(:any)/(:any)'] = 'ContractController/contract_next/$1/$2';


//stuff correction
$route['staff_manager'] = 'StuffCorrectionController/staff_manager';
$route['staff_correction'] = 'StuffCorrectionController/index';
$route['staff_detail/(:any)'] = 'StuffCorrectionController/staff_detail/$1';
$route['new_write_up'] = 'StuffCorrectionController/new_write_up';
$route['staff_correction/admin/add_correction'] = 'StuffCorrectionController/add_correction';
$route['staff_correction/admin/edit_note'] = 'StuffCorrectionController/edit_note';
$route['staff_correction/admin/delete_correction'] = 'StuffCorrectionController/delete_correction';
$route['staff_correction/admin/revert_correction'] = 'StuffCorrectionController/revert_correction';
$route['staff_correction/admin/resolved_correction'] = 'StuffCorrectionController/resolved_correction';
$route['staff_correction/admin/editCorrectionData'] = 'StuffCorrectionController/editCorrectionData';
$route['staff_correction/admin/editNoteData'] = 'StuffCorrectionController/editNoteData';
$route['save_new_write_up'] = 'StuffCorrectionController/save_new_write_up';
$route['update_staff_member'] = 'StuffCorrectionController/update_staff_member';
$route['delete_staff_member'] = 'StuffCorrectionController/delete_staff_member';
$route['manually_add_staff'] = 'StuffCorrectionController/manually_add_staff';
$route['get_staff'] = 'StuffCorrectionController/get_staff';
$route['update_satff'] = 'StuffCorrectionController/update_satff';





//bed assignments routes 
$route['bed_assignments'] = 'BedController/index';
$route['ajax/bade_order/store'] = 'BedController/order_update';

///setting routes
$route['settings/change_password'] = 'Auth/change_password';
$route['settings'] = 'SettingsController/index';
$route['settings/users'] = 'Auth/create_user';
$route['register/get_user'] = 'SettingsController/get_user';
$route['settings/create_user'] = 'SettingsController/create_user';
$route['settings/update_role'] = 'SettingsController/update_role';
$route['settings/deleteUser'] = 'SettingsController/deleteUser';
$route['settings/editData'] = 'SettingsController/editData';
