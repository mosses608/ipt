<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Controller::class, 'login'])->name('/welcome');

Route::get('/registerfirm', [Controller::class, 'register_firm']);

Route::get('/admin_dashboard', [Controller::class, 'admin_dashboard'])->middleware('auth');

Route::post('/authenticate', [Controller::class, 'admin_login']);

Route::post('/logout', [Controller::class, 'logout']);

Route::get('/college-management', [Controller::class, 'register_college'])->middleware('auth');

Route::get('/register-college-principal', [Controller::class, 'register_principal'])->middleware('auth');

Route::get('/view-college-programmes', [Controller::class, 'view_programmes'])->middleware('auth');

Route::post('/colleges', [Controller::class, 'store_programmes'])->middleware('auth');

Route::get('/view-single-college/{college}', [Controller::class, 'find'])->middleware('auth');

Route::delete('/delete/{college}', [Controller::class, 'delete'])->middleware('auth');

Route::put('/colleges/{college}', [Controller::class, 'editCollegeForm'])->middleware('auth');

Route::get('/admin-profile', [Controller::class, 'my_profile'])->middleware('auth');

Route::get('/admin-report', [Controller::class, 'report'])->middleware('auth');

Route::put('/users/admin_update/{user}', [Controller::class, 'admin_update'])->middleware('auth');

Route::put('/users/admin_pass_upd/{user}', [Controller::class, 'admin_pass'])->middleware('auth');

Route::post('/principals', [Controller::class, 'store_college_principal'])->middleware('auth');

Route::get('/register-student', [Controller::class, 'go_register'])->middleware('auth');

Route::get('/register-course', [Controller::class, 'go_programme'])->middleware(('auth'));

Route::post('/programmes', [Controller::class, 'programmes'])->middleware('auth');

Route::post('/students', [Controller::class,'store_students'])->middleware('auth');

Route::get('/view-students', [Controller::class, 'view_all_students'])->middleware('auth');

Route::get('/register-staff', [Controller::class, 'register_hod'])->middleware('auth');

Route::post('/hods', [Controller::class, 'store_staffs'])->middleware('auth');

Route::get('/view-department-staff', [Controller::class, 'view_staff'])->middleware('auth');

Route::get('/departent-management', [Controller::class, 'department_mgt'])->middleware('auth');

Route::post('/departments', [Controller::class, 'store_departments'])->middleware('auth');

Route::get('/firm-hr-registration', [Controller::class, 'firm_hr'])->middleware('auth');

Route::get('/firm-trainer-registration', [Controller::class, 'firm_trainer_reg'])->middleware('auth');

Route::get('/firm-departments', [Controller::class, 'firm_departments_reg'])->middleware('auth');

Route::get('/firm-vacancy', [Controller::class, 'firm_vacany'])->middleware('auth');

Route::post('/hrs', [Controller::class, 'store_firm_hrs'])->middleware('auth');

Route::get('/firm-registration', [Controller::class, 'firm_registration'])->middleware('auth');

Route::post('/firms', [Controller::class, 'store_firms'])->middleware('auth');

Route::post('/trainers', [Controller::class, 'store_firm_trainers'])->middleware('auth');

Route::get('/view-firms', [Controller::class, 'view_firms'])->middleware('auth');

Route::post('/firmdepartments', [Controller::class, 'store_firm_departments'])->middleware('auth');

//Route::delete('/delete/{staff}', [Controller::class, 'delete_staff'])->middleware('auth');

//Route::get('/firm-vacancy', [Controller::class, 'firm_vacancy'])->middleware('auth');

Route::post('/messages', [Controller::class, 'store_messages']);

//Route::get('/student/student-dashboard', [Controller::class, 'student_dashboard'])->middleware('auth');

Route::get('/student/student-dashboard', [Controller::class, 'student_dashboard']);

Route::get('/student/apply', [Controller::class, 'apply']);

Route::post('/vacancies', [Controller::class, 'vacancy'])->middleware('auth');

Route::post('/applications', [Controller::class, 'store_applications']);

Route::post('/completeapplications', [Controller::class, 'store_student_applications']);

Route::get('/student/view-application', [Controller::class, 'view_applications']);

Route::get('/student/add-daily-activity', [Controller::class, 'new_activity']);

Route::post('/activities', [Controller::class, 'store_daily_activities']);

Route::get('/student/add-weekly-summary', [Controller::class, 'weekly_summary']);

Route::post('/summaries', [Controller::class, 'store_weekly_summary']);

Route::get('/student/upload-field-report', [Controller::class, 'field_report']);

Route::post('/reports', [Controller::class, 'store_reports']);

Route::get('/student/feedbacks', [Controller::class, 'reports']);

Route::post('/feedbacks', [Controller::class, 'store_feedbacks']);

Route::get('/register-ipt-cordinator', [Controller::class, 'ipt_coordinator'])->middleware('auth');

Route::post('/coordinators', [Controller::class, 'store_ipt_coord'])->middleware('auth');

Route::get('/ipt/coordinator-dashboard', [Controller::class, 'ipt_coordinator_dashboard']);

Route::get('/ipt/student-listing', [Controller::class, 'listings']);

Route::get('ipt/view-actions/{student}', [Controller::class, 'single']);

Route::put('/students/updateassign/{student}', [Controller::class, 'update_supervisor']);

Route::get('/ipt/instructors', [Controller::class, 'instructors']);

Route::get('/ipt/generate-report', [Controller::class, 'generate_report']);

Route::get('/hrs/hr-dashboard', [Controller::class, 'hr_dashboard']);

Route::put('/students/upadateResponse/{student}', [Controller::class, 'update_response']);

Route::get('/hrs/show-single/{student}', [Controller::class, 'single_show']);

Route::get('/staffs/staff-dashboard', [Controller::class, 'staff_dashboard']);

Route::get('/staffs/ipt-allocation', [Controller::class, 'allocations']);

Route::get('/staffs/view-allocations/{student}', [Controller::class, 'view_allocations']);

Route::get('/staffs/feedbacks', [Controller::class, 'feedbacks_data']);

Route::get('/hrs/send-feedbacks', [Controller::class, 'send_students_feedbacks']);

Route::post('/studentfeedbacks', [Controller::class, 'store_students_feedbacks']);

Route::get('/hrs/view-feedbacks', [Controller::class, 'view_students_feedbacks']);

Route::get('/hrs/generate-report', [Controller::class, 'report_hr']);

Route::get('/staffs/assessments_evaluation', [Controller::class, 'assessment_evaluation']);

Route::get('/trainers/trainer-dashboard', [Controller::class, 'trainer_dashboard']);

Route::get('/trainers/attendance', [Controller::class, 'attendance']);

Route::get('/trainers/activities', [Controller::class, 'activities']);

Route::get('/trainers/single-activity/{student}', [Controller::class, 'find_activity']);

Route::get('/trainers/single-attendance/{student}', [Controller::class, 'single_attendance']);

Route::post('/attendances', [Controller::class, 'store_attendance']);

Route::get('/trainers/performance',[Controller::class, 'performance']);

Route::get('/trainers/single-evaluation/{student}', [Controller::class, 'evaluation']);

Route::post('/evaluations', [Controller::class, 'store_evaluations']);

Route::get('/hod/hod-dashboard', [Controller::class, 'hod_dashboard']);

Route::get('/student/task-plan', [Controller::class, 'task_plan']);

Route::get('/trainers/task-plans', [Controller::class, 'task_plans_office']);

Route::post('/taskplans', [Controller::class, 'store_task_plans']);

Route::get('/staffs/student-progress', [Controller::class, 'student_progress']);

Route::get('/staffs/view-progress/{student}', [Controller::class, 'progress']);

Route::get('/staffs/student-feedbacks', [Controller::class, 'view_feedbacks']);

Route::get('/staffs/single-assessment/{student}', [Controller::class, 'single_assessment']);

Route::post('/assessments', [Controller::class, 'store_assessments']);

Route::get('/register-hil', [Controller::class, 'linkage'])->middleware('auth');

Route::post('/linkages', [Controller::class, 'store_hil']);

Route::get('/linkage/hil-dashboard', [Controller::class, 'hil_dashboard']);

Route::get('/ipt/assign-instructor', [Controller::class, 'assign_sup']);

Route::get('/ipt/single-assignment/{hod}', [Controller::class, 'single_assign']);

Route::post('/assignments', [Controller::class, 'store_assignments']);

Route::get('/linkage/assigned-supervisors', [Controller::class, 'view_supervisor']);

Route::get('/linkage/field-vaccancy', [Controller::class, 'field_vaccancy']);

Route::post('/fieldvaccancies', [Controller::class, 'store_vaccancies']);

Route::get('/linkage/view-vaccancy', [Controller::class, 'view_vaccancy']);

Route::get('/linkage/view-feedbacks', [Controller::class, 'viewFeedbacks']);

Route::get('/linkage/generate-report', [Controller::class, 'report_hil']);

Route::get('/ipt/vaccancy', [Controller::class, 'view_field_vaccancies']);

Route::get('/hod/assigned-supervisors', [Controller::class, 'asiign_supervisors']);

Route::get('/hod/view-vaccancy', [Controller::class, 'view_field_ipt_vaccancies']);

Route::get('/hod/view-feedbacks', [Controller::class, 'view_all_feedbacks']);

Route::get('/hod/generate-report', [Controller::class, 'hod_report']);

Route::post('/studentmessages', [Controller::class, 'store_students_charts']);

Route::get('/student/upload-permission-form', [Controller::class, 'permission_form']);

Route::post('/permissions', [Controller::class, 'permissionForm']);

Route::get('/principal/principal-dashboard', [Controller::class, 'principal_dashboard']);

Route::get('/principal/view-students', [Controller::class, 'principal_view_students']);

Route::get('/principal/view-staff', [Controller::class, 'principal_view_staffs']);

Route::get('/principal/view-feedbacks', [Controller::class, 'principal_view_feedbacks']);

Route::get('/principal/report', [Controller::class, 'principal_report']);
