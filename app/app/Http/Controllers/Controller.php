<?php

namespace App\Http\Controllers;

//use GuzzleHttp\Psr7\Request;

use App\Models\Application;
use App\Models\Principal;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\College;
use App\Models\Department;
use App\Models\User;
use App\Models\Programme;
use App\Models\Student;
use App\Models\Hod;
use App\Models\Hr;
use App\Models\Firm;
use App\Models\Trainer;
use App\Models\Firmdepartment;
use App\Models\Message;
use App\Models\Vacancy;
use App\Models\Completeapplication;
use App\Models\Activity;
use App\Models\Assessment;
use App\Models\Assignment;
use App\Models\Attendance;
use App\Models\Coordinator;
use App\Models\Evaluation;
use App\Models\Feedback;
use App\Models\Fieldvaccancie;
use App\Models\Fieldvaccancy;
use App\Models\Linkage;
use App\Models\Permission;
use App\Models\Report;
use App\Models\Summary;
use App\Models\Studentfeedback;
use App\Models\Studentmessage;
use App\Models\Taskplan;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;



class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function login(){
        return view('welcome');
    }

    public function register_firm(){
        return view('registerfirm',[
            'messages' => Message::all(),
            'studentmessages' => Studentmessage::all(),
        ]);
    }

    public function admin_dashboard(){
       /* return view('admin_dashboard',[
            'colleges' => College::all(),
            'users' => User::all(),
            'principals' => Principal::all(),
            'students' => Student::all(),
            'programmes' => Programme::all(),
            'hods' => Hod::all(),
            'departments' => Department::all(),
            'firms' => Firm::all(),
            'messages' => Message::all(),
            'trainers' => Trainer::all(),
            'completeapplications' => Completeapplication::latest()->paginate(3),
        ]);*/


        $completeApplications = Completeapplication::all();

        // Process the data
        $firmRegistrations = [];
        foreach ($completeApplications as $application) {
            $firmName = $application->firm_name;
            if (!isset($firmRegistrations[$firmName])) {
                $firmRegistrations[$firmName] = 0;
            }
            $firmRegistrations[$firmName]++;
        }

        // Format data for the chart
        $labels = [];
        $data = [];
        foreach ($firmRegistrations as $firmName => $totalStudents) {
            $labels[] = $firmName;
            $data[] = $totalStudents;
        }

        // Pass data to the view and render the chart
        return view('admin_dashboard', compact('labels', 'data'),[
            'colleges' => College::all(),
            'users' => User::all(),
            'principals' => Principal::all(),
            'students' => Student::all(),
            'programmes' => Programme::all(),
            'hods' => Hod::all(),
            'departments' => Department::all(),
            'firms' => Firm::all(),
            'messages' => Message::all(),
            'trainers' => Trainer::all(),
            'completeapplications' => Completeapplication::latest()->paginate(3),
        ]);


    }

    /*
    public function delete_staff(Request $request , Hod $staff){
        $staff->delete();
        return redirect()->back();
    }
*/
    public function student_dashboard(){
        return view('student.student-dashboard',[
            'messages' => Message::all(),
            'firms' => Firm::all(),
            'students' => Student::all(),
            'studentmessages' => Studentmessage::all(),
            'vacancies' => Vacancy::all(),
            'completeapplications' => Completeapplication::latest()->paginate(3),
        ]);
    }

    public function admin_login(Request $request){
        $logincredentials=$request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::guard('web')->attempt($logincredentials)){

            $request->session()->regenerateToken();

            return redirect('/admin_dashboard')->with('message','Admin logged in successfully');

        }else if (Auth::guard('student')->attempt($logincredentials)) {
            //dd('Student logged in successfully');

            //return redirect('/admin_dashboard');
            $request->session()->regenerateToken();

            return redirect('/student/student-dashboard')->with('student_login', 'Student logged in successfully');

        }else if(Auth::guard('coordinator')->attempt($logincredentials)){

            //echo 'Mohammed Abdallah';
            $request->session()->regenerateToken();

            return redirect('/ipt/coordinator-dashboard')->with('ipt_coordinator_login','IPT Coordinator logged in successfully');

        }else if(Auth::guard('hr')->attempt($logincredentials)){

            //echo 'Mohammed Abdallah';
            $request->session()->regenerateToken();

            return redirect('/hrs/hr-dashboard')->with('hr_login','Firm HR logged in successfully');
        }

        else if(Auth::guard('hod')->attempt($logincredentials) && Auth::guard('hod')->user()->role == '0'){

            $request->session()->regenerateToken();

            return redirect('/staffs/staff-dashboard')->with('staff_login','Staff logged in successfully');

        }
        else if(Auth::guard('hod')->attempt($logincredentials) && Auth::guard('hod')->user()->role == '1'){

            $request->session()->regenerateToken();

            return redirect('/hod/hod-dashboard')->with('staff_hod_success','HoD logged in successfully');
        }


        else if(Auth::guard('trainer')->attempt($logincredentials)){

            $request->session()->regenerateToken();

            return redirect('/trainers/trainer-dashboard')->with('trainer_login','Firm trainer looged in successfully');
        }

        else if(Auth::guard('linkage')->attempt($logincredentials)){

            $request->session()->regenerateToken();

            //dd($request);

            return redirect('/linkage/hil-dashboard')->with('hil_login_message','HIL Logged in successfully');
        }
        elseif(Auth::guard('principal')->attempt($logincredentials)){

            $request->session()->regenerateToken();

            return redirect('/principal/principal-dashboard')->with('principal_login','College principal logged in successfully');

        }

        else{

            return redirect()->back()->with('error','Incorrect username or password!!!');

        }
    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();

        return redirect('/')->with('signout','Logged out successfully!');
    }

    public function register_college(){
        return view('college-management',[
            'messages' => Message::all(),
            'completeapplications' => Completeapplication::latest()->paginate(3),
            'students' => Student::all(),
            'studentmessages' => Studentmessage::all(),
        ]);
    }

    public function register_principal(){
        return view('register-college-principal',[
            'messages' => Message::all(),
            'completeapplications' => Completeapplication::latest()->paginate(3),
            'students' => Student::all(),
            'studentmessages' => Studentmessage::all(),
        ]);
    }

    public function view_programmes(){
        return view('view-college-programmes',[
            'messages' => Message::all(),
            'colleges' => College::latest()->filter(request(['search']))->paginate(4),
            'completeapplications' => Completeapplication::latest()->paginate(3),
            'students' => Student::all(),
            'studentmessages' => Studentmessage::all(),
        ]);
    }

    public function store_programmes(Request $request){
        $programmes=$request->validate([
        'college_name' => ['required', Rule::unique('colleges','college_name')],
        'college_location' => 'required',
        'level' => 'required',
        'programme_numbers' => 'required',
        'single_program' => 'nullable',
        'program1' => 'nullable',
        'program2' => 'nullable',
        'program31' => 'nullable',
        'program32' => 'nullable',
        'program33' => 'nullable',
        'program41' => 'nullable',
        'program42' => 'nullable',
        'program43' => 'nullable',
        'program44' => 'nullable',
        'program51' => 'nullable',
        'program52' => 'nullable',
        'program53' => 'nullable',
        'program54' => 'nullable',
        'program55' => 'nullable',
        'program61' => 'nullable',
        'program62' => 'nullable',
        'program63' => 'nullable',
        'program64' => 'nullable',
        'program65' => 'nullable',
        'program66' => 'nullable',
        'program71' => 'nullable',
        'program72' => 'nullable',
        'program73' => 'nullable',
        'program74' => 'nullable',
        'program75' => 'nullable',
        'program76' => 'nullable',
        'program77' => 'nullable',
        ]);

        College::create($programmes);

        return redirect()->back()->with('program_created','College registered successfully');
    }

    public function find($id){
        return view('view-single-college',[
            'college' => College::find($id),
            'messages' => Message::all(),
            'completeapplications' => Completeapplication::latest()->paginate(3),
            'students' => Student::all(),
            'studentmessages' => Studentmessage::all(),
        ]);
    }

    public function delete(Request $request, College $college){
        $college->delete();

        return redirect('/view-college-programmes')->with('deleted','College deleted successfully');
    }

    public function editCollegeForm(Request $request, College $college){
        $updatedCollegeData=$request->validate([
        'college_name' => 'required',
        'college_location' => 'required',
        'level' => 'required',
        'programme_numbers' => 'required',
        'single_program' => 'nullable',
        'program1' => 'nullable',
        'program2' => 'nullable',
        'program31' => 'nullable',
        'program32' => 'nullable',
        'program33' => 'nullable',
        'program41' => 'nullable',
        'program42' => 'nullable',
        'program43' => 'nullable',
        'program44' => 'nullable',
        'program51' => 'nullable',
        'program52' => 'nullable',
        'program53' => 'nullable',
        'program54' => 'nullable',
        'program55' => 'nullable',
        'program61' => 'nullable',
        'program62' => 'nullable',
        'program63' => 'nullable',
        'program64' => 'nullable',
        'program65' => 'nullable',
        'program66' => 'nullable',
        'program71' => 'nullable',
        'program72' => 'nullable',
        'program73' => 'nullable',
        'program74' => 'nullable',
        'program75' => 'nullable',
        'program76' => 'nullable',
        'program77' => 'nullable',
        ]);

        $college->update($updatedCollegeData);

        return redirect()->back()->with('edited','College data updated successfully');
    }

    public function my_profile(){
        return view('admin-profile',[
            'messages' => Message::all(),
            'completeapplications' => Completeapplication::latest()->paginate(3),
            'students' => Student::all(),
            'studentmessages' => Studentmessage::all(),
        ]);
    }

    public function admin_update(Request $request, User $user){
        $admin_update=$request->validate([
            'profile' => 'required',
            'full_name' => 'required',
        ]);

        if($request->hasFile('profile')){
            $admin_update['profile'] = $request->file('profile')->store('profiles' , 'public');
        }

        $user->update($admin_update);

        return redirect()->back()->with('admin_updated','Profile updated successfully');
    }

    public function admin_pass(Request $request, User $user){
        $adminpasschange=$request->validate([
            'password' => 'required',
        ]);

        $user->update($adminpasschange);

        return redirect()->back()->with('pass_changed','Password updated successfully');
    }

    public function store_college_principal(Request $request){
        $college_principal_fields=$request->validate([
            'full_name' => 'required',
            'employee_id' => ['required', Rule::unique('principals','employee_id')],
            'level' => 'required',
            'location' => 'required',
            'username' => ['required', Rule::unique('principals','username')],
            'password' => 'required',
            'profile' => 'required',
            'phone_number' => ['required', Rule::unique('principals','phone_number')],
        ]);

        if($request->hasFile('profile')){
            $college_principal_fields['profile'] = $request->file('profile')->store('principals', 'public');
        }

        Principal::create($college_principal_fields);

        return redirect()->back()->with('principal_created','College principal registered successfully');
    }

    public function go_register(){
        return view('register-student',[
            'colleges' => College::all(),
            'programmes' => Programme::all(),
            'departments' => Department::all(),
            'messages' => Message::all(),
            'completeapplications' => Completeapplication::latest()->paginate(3),
            'students' => Student::all(),
            'studentmessages' => Studentmessage::all(),
        ]);
    }

    public function go_programme(){
        return view('register-course',[
            'colleges' => College::all(),
            'departments' => Department::all(),
            'studentmessages' => Studentmessage::all(),
            'messages' => Message::all(),
            'completeapplications' => Completeapplication::latest()->paginate(3),
            'students' => Student::all(),
        ]);
    }

    public function programmes(Request $request){
        $programmesFields=$request->validate([
            'programme_name' => 'required',
            'department' => 'required',
            'college' => 'required',
        ]);
        Programme::create($programmesFields);

        return redirect()->back()->with('program_registerd','Programme registered successfully');
    }

    public function store_students(Request $request){
        $studentsFields=$request->validate([
            'full_name' => 'required',
            'username' => ['required', Rule::unique('students','username')],
            'programme' => 'required',
            'department' => 'required',
            'college' => 'required',
            'year' => 'required',
            'level' => 'required',
            'profile' => 'required',
            'password' => 'required',
        ]);

        if($request->hasFile('profile')){
            $studentsFields['profile'] = $request->file('profile')->store('students','public');
        }

        Student::create($studentsFields);

        return redirect()->back()->with('student_created','Student registered successfully');
    }

    public function view_all_students(){
        return view('view-students',[
            'studentmessages' => Studentmessage::all(),
            'students' => Student::latest()->filter(request(['search']))->paginate(10),
            'messages' => Message::all(),
            'completeapplications' => Completeapplication::latest()->paginate(3),
        ]);
    }

    public function register_hod(){
        return view('register-staff',[
            'colleges' => College::all(),
            'messages' => Message::all(),
            'studentmessages' => Studentmessage::all(),
            'completeapplications' => Completeapplication::latest()->paginate(3),
            'students' => Student::all(),
        ]);
    }

    public function store_staffs(Request $request){
        $staffsFields=$request->validate([
            'role' => 'required',
            'full_name' => 'required',
            'phone' => ['required', Rule::unique('hods','phone')],
            'employee_id' => 'required',
            'college' => 'required',
            'username' => ['required', Rule::unique('hods','username')],
            'department' => 'required',
            'password' => 'required',
            'profile' => 'required',
        ]);

        if($request->hasFile('profile')){
            $staffsFields['profile'] = $request->file('profile')->store('staffs','public');
        }

        Hod::create($staffsFields);

        return redirect()->back()->with('staff_created','Staff registered successfully');
    }

    public function view_staff(){
        return view('view-department-staff',[
            'hods' => Hod::latest()->filter(request(['search']))->paginate(10),
            'messages' => Message::all(),
            'completeapplications' => Completeapplication::latest()->paginate(3),
            'students' => Student::all(),
            'studentmessages' => Studentmessage::all(),
        ]);
    }

    public function department_mgt(){
        return view('departent-management',[
            'hods' => Hod::all(),
            'messages' => Message::all(),
            'studentmessages' => Studentmessage::all(),
            'completeapplications' => Completeapplication::latest()->paginate(3),
            'students' => Student::all(),
        ]);
    }

    public function store_departments(Request $request){
        $departmentFields=$request->validate([
            'department_name' => 'required',
            'location' => 'required',
            'hod' => 'required',
        ]);

        Department::create($departmentFields);

        return redirect()->back()->with('department_created','Department registered successfully');
    }

    public function firm_hr(){
        return view('firm-hr-registration',[
            'messages' => Message::all(),
            'completeapplications' => Completeapplication::latest()->paginate(3),
            'students' => Student::all(),
            'firms' => Firm::all(),
            'studentmessages' => Studentmessage::all(),
        ]);
    }

    public function firm_trainer_reg(){
        return view('firm-trainer-registration',[
            'messages' => Message::all(),
            'firms' => Firm::all(),
            'studentmessages' => Studentmessage::all(),
            'completeapplications' => Completeapplication::latest()->paginate(3),
            'students' => Student::all(),
        ]);
    }

    public function firm_departments_reg(){
        return view('firm-departments',[
            'firms' => Firm::all(),
            'messages' => Message::all(),
            'studentmessages' => Studentmessage::all(),
            'completeapplications' => Completeapplication::latest()->paginate(3),
            'students' => Student::all(),
        ]);
    }

    public function firm_vacany(){
        return view('firm-vacancy',[
            'firms' => Firm::all(),
            'firmdepartments' => Firmdepartment::all(),
            'messages' => Message::all(),
            'completeapplications' => Completeapplication::latest()->paginate(3),
            'students' => Student::all(),
            'studentmessages' => Studentmessage::all(),
        ]);
    }

    public function store_firm_hrs(Request $request){
        $firm_hr=$request->validate([
            'full_name' => 'required',
            'employee_id' => ['required', Rule::unique('hrs','employee_id')],
            'phone' => ['required', Rule::unique('hrs','phone')],
            'company_name' => 'required',
            'username' => ['required', Rule::unique('hrs','username')],
            'password' => 'required',
        ]);

        Hr::create($firm_hr);

        return redirect()->back()->with('hr_created','Firm HR created successfully');
    }

    public function firm_registration(){
        return view('firm-registration',[
            'messages' => Message::all(),
            'studentmessages' => Studentmessage::all(),
            'completeapplications' => Completeapplication::latest()->paginate(3),
            'students' => Student::all(),
            'firms' => Firm::all(),
        ]);
    }

    public function store_firms(Request $request){
        $firms=$request->validate([
            'firm_name' => 'required',
            'location' => 'required',
            'address' => 'required',
            'firm_type' => 'required',
            'serives' => 'required',
        ]);

        Firm::create($firms);

        return redirect()->back()->with('firm_created','Firm registered successfully');
    }

    public function store_firm_trainers(Request $request){
        $firm_trainers=$request->validate([
            'full_name' => 'required',
            'employee_id' => ['required', Rule::unique('trainers','employee_id')],
            'phone' => ['required', Rule::unique('trainers','phone')],
            'company_name' => 'required',
            'firm_trainer_department' => 'required',
            'username' => ['required', Rule::unique('trainers','username')],
            'password' => 'required',
        ]);

        Trainer::create($firm_trainers);

        //dd($request);

        return redirect()->back()->with('firm_trainer_created','Firm trainer created successfully');
    }

    public function view_firms(){
        return view('view-firms',[
            'studentmessages' => Studentmessage::all(),
            'firms' => Firm::latest()->filter(request(['search']))->paginate(10),
            'messages' => Message::all(),
            'completeapplications' => Completeapplication::latest()->paginate(3),
            'students' => Student::all(),
        ]);
    }


    public function store_firm_departments(Request $request){
        $firm_departments=$request->validate([
            'department_name' => 'required',
            'hod_name' => 'required',
            'firm_name' => 'required',
        ]);

        Firmdepartment::create($firm_departments);

        return redirect()->back()->with('firm_department_created','Firm department registered successfully');
    }

    public function store_messages(Request $request){
        $messages=$request->validate([
            'profile' => 'nullable',
            'sender_name' => 'required',
            'message' => 'required',
        ]);

        Message::create($messages);

        return redirect()->back()->with('message_sent','Message sent successfully');
    }

    public function apply(){
        return view('student.apply',[
            'messages' => Message::all(),
            'studentmessages' => Studentmessage::all(),
            'firms' => Firm::all(),
            'firmdepartments' => Firmdepartment::all(),
            'vacancies' => Vacancy::all(),
            'applications' => Application::all(),
            'completeapplications' => Completeapplication::latest()->paginate(3),
            'students' => Student::all(),
        ]);
    }

    public function report(){
        return view('admin-report',[
            'messages' => Message::all(),
            'studentmessages' => Studentmessage::all(),
            'firms' => Firm::all(),
            'firmdepartments' => Firmdepartment::all(),
            'vacancies' => Vacancy::all(),
            'applications' => Application::all(),
            'completeapplications' => Completeapplication::latest()->paginate(10),
            'students' => Student::all(),
        ]);
    }

    public function vacancy(Request $request){
        $vacancyField=$request->validate([
            'firm_name' => 'required',
            'vacancy_number' => 'required',
            'maleValue' => 'required',
            'femaleValue' => 'required',
            'department' => 'required',
        ]);

        Vacancy::create($vacancyField);

        return redirect()->back()->with('vacancy','Vacancy sent successfully');
    }

    public function store_applications(Request $request){
        $applicationFields=$request->validate([
            'reg_no' => 'required',
            'academic_year' => 'nullable',
            'firm_name' => 'nullable',
            'firm_location' => 'nullable',
            'gender1' => 'nullable',
            'gender2' => 'nullable',
            'action' => 'nullable',
        ]);

        Application::create($applicationFields);

        return redirect()->back();
    }

    public function store_student_applications(Request $request){
        $studentApplications=$request->validate([
            'reg_number' => 'required',
            'gender1' => 'nullable',
            'gender2' => 'nullable',
            'firm_name' => 'required',
            'academic_year' => 'nullable',
            'action' => 'required',
            'studentmessages' => Studentmessage::all(),
        ]);

        Completeapplication::create($studentApplications);

        return redirect()->back()->with('application_complte','Application submitted successfully!');
    }

    public function view_applications(){
        return view('student.view-application',[
            'messages' => Message::all(),
            'completeapplications' => Completeapplication::all(),
            'students' => Student::all(),
            'studentmessages' => Studentmessage::all(),
        ]);
    }

    public function new_activity(){
        return view('student.add-daily-activity',[
            'messages' => Message::all(),
            'completeapplications' => Completeapplication::latest()->paginate(3),
            'activities' => Activity::latest()->paginate(1),
            'students' => Student::all(),
            'studentmessages' => Studentmessage::all(),
        ]);
    }

    public function store_daily_activities(Request $request){
        $activityFields=$request->validate([
            'full_name' => 'required',
            'reg_number' => 'required',
            //'submit_date' => 'required',
            'submit_day' => 'required',
            'nu_activities' => 'required',
            'task01' => 'nullable',
            'task21' => 'nullable',
            'task22' => 'nullable',
            'task31' => 'nullable',
            'task32' => 'nullable',
            'task33' => 'nullable',
            'task41' => 'nullable',
            'task42' => 'nullable',
            'task43' => 'nullable',
            'task44' => 'nullable',
            'attachment' => 'nullable',

        ]);

        if($request->hasFile('attachment')){

            $activityFields['attachment']=$request->file('attachment')->store('attachments','public');

        }

        Activity::create($activityFields);

        //dd($request);

        return redirect()->back()->with('activity_sent','Daily activity uploaded successfully');
    }

    public function weekly_summary(){
        return view('student.add-weekly-summary',[
            'messages' => Message::all(),
            'studentmessages' => Studentmessage::all(),
            'completeapplications' => Completeapplication::all(),
            'students' => Student::all(),
        ]);
    }

    public function permission_form(){
        return view('student.upload-permission-form',[
            'messages' => Message::all(),
            'studentmessages' => Studentmessage::all(),
            'completeapplications' => Completeapplication::all(),
            'students' => Student::all(),
        ]);
    }

    public function store_weekly_summary(Request $request){
        $weeklySummary=$request->validate([
            'reg_number' => 'required',
            'full_name' => 'required',
            'weekly_summary' => 'required',
        ]);

        Summary::create($weeklySummary);

        return redirect()->back()->with('summary','Weekly summary submitted successfully');
    }

    public function field_report(){
        return view('student.upload-field-report',[
            'messages' => Message::all(),
            'studentmessages' => Studentmessage::all(),
            'completeapplications' => Completeapplication::latest()->paginate(3),
            'activities' => Activity::latest()->paginate(1),
            'students' => Student::all(),
        ]);
    }

    public function store_reports(Request $request){
        $report=$request->validate([
            'full_name' => 'required',
            'reg_number' => ['required', Rule::unique('reports','reg_number')],
            'field_report' => 'required',
        ]);

        Report::create($report);

        return redirect()->back()->with('report_submitted','Field Report submitted successfully');
    }

    public function reports(){
        return view('student.feedbacks',[
            'studentmessages' => Studentmessage::all(),
            'messages' => Message::all(),
            'completeapplications' => Completeapplication::latest()->paginate(3),
            'activities' => Activity::latest()->paginate(1),
            'students' => Student::all(),
        ]);
    }

    public function store_feedbacks(Request $request){
        $feedbacks = $request->validate([
            'full_name' => 'required',
            'reg_number' => 'required',
            'feedback' => 'required',
        ]);

        Feedback::create($feedbacks);

        return redirect()->back()->with('feedbacks','Feedbacks sent successfull');
    }

    public function ipt_coordinator(){
        return view('register-ipt-cordinator',[
            'messages' => Message::all(),
            'studentmessages' => Studentmessage::all(),
            'departments' => Department::all(),
            'completeapplications' => Completeapplication::latest()->paginate(3),
            'activities' => Activity::latest()->paginate(1),
            'students' => Student::all(),
        ]);
    }

    public function store_ipt_coord(Request $request){
        $iptstore=$request->validate([
            'employee_id' => ['required', Rule::unique('coordinators','employee_id')],
            'full_name' => 'required',
            'location' => 'required',
            'department' => 'required',
            'contact' => ['required' , Rule::unique('coordinators','contact')],
            'username' => ['required', Rule::unique('coordinators','username')],
            'password' => 'required',
        ]);

        Coordinator::create($iptstore);

        //dd($request);

        return redirect()->back()->with('ipt_coordinator','IPT Coordinator registered successfully');
    }

    public function ipt_coordinator_dashboard(){
        return view('ipt.coordinator-dashboard',[
            'messages' => Message::all(),
            'firms' => Firm::all(),
            'students' => Student::all(),
            'vacancies' => Vacancy::all('id'),
            'studentmessages' => Studentmessage::all(),
            'hods' => Hod::all(),
            'completeapplications' => Completeapplication::latest()->paginate(3),
        ]);
    }

    public function listings(){
        return view('ipt.student-listing',[
            'messages' => Message::all(),
            'firms' => Firm::all(),
            'students' => Student::all(),
            'vacancies' => Vacancy::all('id'),
            'studentmessages' => Studentmessage::all(),
            'hods' => Hod::all(),
            'completeapplications' => Completeapplication::all(),
        ]);
    }

    public function single($id){
        return view('ipt.view-actions',[
            'summaries' => Summary::latest()->paginate(1),
            'messages' => Message::all(),
            'student' => Student::single($id),
            'studentmessages' => Studentmessage::all(),
            'hods' => Hod::all(),
            'students' => Student::all(),
            'activities' => Activity::latest()->paginate(1),
            'completeapplications' => Completeapplication::all(),
            'assignments' => Assignment::all(),
        ]);
    }

    public function update_supervisor(Request $request, Student $student){
        $studentSupervisor=$request->validate([
            'supervisor' => 'required',
        ]);

        $student->update($studentSupervisor);

        return redirect()->back()->with('updatedsupervisor','IPT Supervisor assigned to a student');
    }

    public function instructors(){
        return view('ipt.instructors',[
            'messages' => Message::all(),
            'students' => Student::all(),
            'studentmessages' => Studentmessage::all(),
            'firms' => Firm::all(),
            'hods' => HoD::paginate(10),
            'completeapplications' => Completeapplication::all(),
        ]);
    }

    public function generate_report(){
        return view('ipt.generate-report',[
            'summaries' => Summary::latest()->paginate(1),
            'messages' => Message::all(),
            'hods' => Hod::all(),
            'studentmessages' => Studentmessage::all(),
            'students' => Student::all(),
            'activities' => Activity::latest()->paginate(1),
            'completeapplications' => Completeapplication::all(),
        ]);

        $html = view('ipt.generate-report')->render();

        // Create a new Dompdf instance
        $dompdf = new Dompdf();

        // Load HTML content into Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (generate)
        $dompdf->render();

        // Output PDF content
        return $dompdf->stream('document.pdf');

    }

    public function hr_dashboard(){
        return view('hrs.hr-dashboard',[
            'messages' => Message::all(),
            'students' => Student::paginate(10),
            'applications' => Application::all(),
            'studentmessages' => Studentmessage::all(),
            'completeapplications' => Completeapplication::latest()->filter(request(['search']))->get(),
        ]);
    }

    public function update_response(Request $request , Student $student){
        $studentResponse=$request->validate([
            'response' => 'required',
        ]);

        $student->update($studentResponse);

        return redirect('/hrs/hr-dashboard')->with('approved','Field application accepted');
    }

    public function single_show($id){
        return view('hrs.show-single',[
            'student' => Student::single_show($id),
            'messages' => Message::all(),
            'students' => Student::all(),
            'studentmessages' => Studentmessage::all(),
            'completeapplications' => Completeapplication::all(),
        ]);
    }

    public function send_students_feedbacks(){
        return view('hrs.send-feedbacks',[
            'messages' => Message::all(),
            'studentmessages' => Studentmessage::all(),
            'completeapplications' => Completeapplication::all(),
            'students' => Student::all(),
        ]);
    }

    public function staff_dashboard(){
        return view('staffs.staff-dashboard',[
            'messages' => Message::all(),
            'studentmessages' => Studentmessage::all(),
            'firms' => Firm::all(),
            'students' => Student::all(),
            'hods' => Hod::all(),
            'completeapplications' => Completeapplication::latest()->paginate(3),
        ]);
    }

    public function allocations(){
        return view('staffs.ipt-allocation',[
            'messages' => Message::all(),
            'studentmessages' => Studentmessage::all(),
            'hods' => Hod::all(),
            'completeapplications' => Completeapplication::all(),
            'students' => Student::paginate(10),
            'applications' => Application::all(),
        ]);
    }

    public function view_allocations($id){
        return view('staffs.view-allocations',[
            'summaries' => Summary::latest()->paginate(1),
            'messages' => Message::all(),
            'student' => Student::single($id),
            'hods' => Hod::all(),
            'activities' => Activity::latest()->paginate(1),
            'completeapplications' => Completeapplication::all(),
            'students' => Student::paginate(10),
            'studentmessages' => Studentmessage::all(),
            'applications' => Application::all(),
        ]);
    }

    public function store_students_feedbacks(Request $request){
        $studentFeedbacks=$request->validate([
            'full_name' => 'required',
            'feedback' => 'required',
        ]);

        Studentfeedback::create($studentFeedbacks);

        return redirect()->back()->with('success_sent','Feedback sent successfully!');
    }

    public function view_students_feedbacks(){
        return view('hrs.view-feedbacks',[
            'messages' => Message::all(),
            'feedbacks' => Feedback::paginate(5),
            'completeapplications' => Completeapplication::all(),
            'students' => Student::paginate(10),
            'applications' => Application::all(),
            'studentmessages' => Studentmessage::all(),
        ]);
    }

    public function report_hr(){
        return view('hrs.generate-report',[
            'messages' => Message::all(),
            'completeapplications' => Completeapplication::all(),
            'students' => Student::paginate(10),
            'studentmessages' => Studentmessage::all(),
            'applications' => Application::all(),
        ]);
    }

    public function assessment_evaluation(){
        return view('staffs.assessments_evaluation',[
            'messages' => Message::all(),
            'completeapplications' => Completeapplication::all(),
            'students' => Student::paginate(10),
            'applications' => Application::all(),
            'studentmessages' => Studentmessage::all(),
            'hods' => Hod::all(),
        ]);
    }

    public function trainer_dashboard(){
        return view('trainers.trainer-dashboard',[
            'messages' => Message::all(),
            'studentmessages' => Studentmessage::all(),
            'completeapplications' => Completeapplication::all(),
            'students' => Student::paginate(10),
            'applications' => Application::all(),
        ]);
    }

    public function attendance(){
        return view('trainers.attendance',[
            'messages' => Message::all(),
            'studentmessages' => Studentmessage::all(),
            'students' => Student::all(),
            'completeapplications' => Completeapplication::all(),
            'trainers' => Trainer::all(),
        ]);
    }

    public function activities(){
        return view('trainers.activities',[
            'messages' => Message::all(),
            'studentmessages' => Studentmessage::all(),
            'students' => Student::all(),
            'completeapplications' => Completeapplication::all(),
            'trainers' => Trainer::all(),
        ]);
    }

    public function find_activity($id){
        return view('trainers.single-activity',[
            'student' => Student::find_activity($id),
            'completeapplications' => Completeapplication::all(),
            'trainers' => Trainer::all(),
            'studentmessages' => Studentmessage::all(),
            'messages' => Message::all(),
            'activities' => Activity::latest()->paginate(1),
            'summaries' => Summary::latest()->paginate(1),
            'students' => Student::all(),
        ]);
    }

    public function single_attendance($id){
        return view('trainers.single-attendance',[
            'messages' => Message::all(),
            'studentmessages' => Studentmessage::all(),
            'student' => Student::single_attendance($id),
            'completeapplications' => Completeapplication::all(),
            'trainers' => Trainer::all(),
            'students' => Student::all(),
        ]);
    }

    public function store_attendance(Request $request){
        $attendance=$request->validate([
            'reg_number' => 'required',
            'full_name' => 'required',
            'programme' => 'required',
            'department' => 'required',
            'year' => 'required',
            'level' => 'required',
            'present' => 'nullable',
            'absent' => 'nullable',
        ]);

        Attendance::create($attendance);

        return redirect('/trainers/attendance')->with('attendance','Attendance submitted successfully');
    }

    public function performance(){
        return view('trainers.performance',[
            'students' => Student::all(),
            'completeapplications' => Completeapplication::all(),
            'trainers' => Trainer::all(),
            'messages' => Message::all(),
            'studentmessages' => Studentmessage::all(),
            'activities' => Activity::latest()->paginate(1),
            'summaries' => Summary::latest()->paginate(1),
        ]);
    }

    public function evaluation($id){
        return view('trainers.single-evaluation',[
            'student' => Student::evaluation($id),
            'completeapplications' => Completeapplication::all(),
            'trainers' => Trainer::all(),
            'messages' => Message::all(),
            'studentmessages' => Studentmessage::all(),
            'activities' => Activity::latest()->paginate(1),
            'summaries' => Summary::latest()->paginate(1),
            'evaluations' => Evaluation::all(),
            'students' => Student::all(),
        ]);
    }

    public function store_evaluations(Request $request){
        $evaluationFields=$request->validate([
            'firm_name' => 'required',
            'student_name' => ['required', Rule::unique('evaluations','student_name')],
            'adm_no' => ['required', Rule::unique('evaluations','adm_no')],
            'course' => 'required',
            'department' => 'required',
            'year' => 'required',
            'level' => 'required',
            'total_days' => 'required',
            'from' => 'required',
            'to' => 'required',
            'field_supervisor' => 'required',
            'supervisor_position' => 'required',
            'score1' => 'required',
            'score2' => 'required',
            'score3' => 'required',
            'score4' => 'required',
            'score5' => 'required',
            'score6' => 'required',
            'score7' => 'required',
            'score8' => 'required',
            'score9' => 'required',
            'score10' => 'required',
        ]);

        Evaluation::create($evaluationFields);

        return redirect('/trainers/performance')->with('evaluation_created','Student evaluation submitted successfully');
    }

    public function hod_dashboard(){
        return view('hod.hod-dashboard',[
            'studentfeedbacks' => Studentfeedback::paginate(5),
            'messages' => Message::all(),
            'students' => Student::all(),
            'completeapplications' => Completeapplication::latest()->paginate(3),
            'hods' => Hod::all(),
            'colleges' => College::all(),
            'studentmessages' => Studentmessage::all(),
            'firms' => Firm::all(),
            'departments' => Department::all(),
            'assignments' => Assignment::all(),
            'fieldvaccancies' => Fieldvaccancy::all(),
        ]);
    }

    public function task_plan(){
        return view('student.task-plan',[
            'studentmessages' => Studentmessage::all(),
            'messages' => Message::all(),
            'students' => Student::all(),
            'completeapplications' => Completeapplication::latest()->paginate(3),
            'taskplans' => Taskplan::all(),
            'firms' => Firm::all(),
        ]);
    }

    public function task_plans_office(){
        return view('trainers.task-plans',[
            'messages' => Message::all(),
            'studentmessages' => Studentmessage::all(),
            'students' => Student::all(),
            'completeapplications' => Completeapplication::all(),
            'firms' => Firm::all(),
            'taskplans' => Taskplan::all(),
        ]);
    }

    public function store_task_plans(Request $request){
        $taskPlan=$request->validate([
            'date_day' => 'required',
            'task' => 'required',
            'tools' => 'required',
            'supervisor' => 'required',
            'company' => 'required',
        ]);

        Taskplan::create($taskPlan);

        return redirect()->back()->with('task_plan','Taks plan posted successfully');
    }

    public function feedbacks_data(){
        return view('staffs.feedbacks',[
            'messages' => Message::all(),
            'studentmessages' => Studentmessage::all(),
            'students' => Student::all(),
            'completeapplications' => Completeapplication::all(),
            'firms' => Firm::all(),
            'taskplans' => Taskplan::all(),
            'studentfeedbacks' => Studentfeedback::all(),
        ]);
    }

    public function student_progress(){
        return view('staffs.student-progress',[
            'messages' => Message::all(),
            'students' => Student::all(),
            'completeapplications' => Completeapplication::all(),
            'firms' => Firm::all(),
            'studentmessages' => Studentmessage::all(),
            'taskplans' => Taskplan::all(),
            'studentfeedbacks' => Studentfeedback::all(),
            'hods' => Hod::all(),
        ]);
    }

    public function progress($id)
{
    $evaluations = Evaluation::all();

        // Calculate total score for each student
        $totalScores = $evaluations->groupBy('student_name')->map(function ($group) {
            return $group->sum(function ($evaluation) {
                return $evaluation->score1 + $evaluation->score2 + $evaluation->score3
                     + $evaluation->score4 + $evaluation->score5 + $evaluation->score6
                     + $evaluation->score7 + $evaluation->score8 + $evaluation->score9
                     + $evaluation->score10;
            });
        });

        // Get student names and total scores
        $studentNames = $totalScores->keys()->toArray();
        $scores = $totalScores->values()->toArray();


    return view('staffs.view-progress', [
        'student' => Student::progress($id),
        'evaluations' => $evaluations,
        'messages' => Message::all(),
        'students' => Student::all(),
        'completeapplications' => Completeapplication::all(),
        'firms' => Firm::all(),
        'studentmessages' => Studentmessage::all(),
        'taskplans' => Taskplan::all(),
        'studentfeedbacks' => Studentfeedback::all(),
        'hods' => Hod::all(),
    ], compact('studentNames', 'scores'));
}

public function view_feedbacks(){
    return view('staffs.student-feedbacks',[
        'evaluations' => Evaluation::all(),
        'messages' => Message::all(),
        'studentmessages' => Studentmessage::all(),
        'students' => Student::all(),
        'completeapplications' => Completeapplication::all(),
        'firms' => Firm::all(),
        'taskplans' => Taskplan::all(),
        'studentfeedbacks' => Studentfeedback::all(),
        'hods' => Hod::all(),
        'assessments' => Assessment::all(),
    ]);
}

public function single_assessment($id){
    return view('staffs.single-assessment',[
        'student' => Student::find($id),
        'evaluations' => Evaluation::all(),
        'messages' => Message::all(),
        'students' => Student::all(),
        'studentmessages' => Studentmessage::all(),
        'completeapplications' => Completeapplication::all(),
        'firms' => Firm::all(),
        'taskplans' => Taskplan::all(),
        'studentfeedbacks' => Studentfeedback::all(),
        'hods' => Hod::all(),
        'assessments' => Assessment::all(),
    ]);
}

public function store_assessments(Request $request){
    $assessment=$request->validate([
        'supervisor' => 'required',
        'student_name' => 'required',
        'adm_no' => 'required',
        'course' => 'required',
        'department' => 'required',
        'year' => 'required',
        'level' => 'required',
        'firm_name' => 'required',
        'score1' => 'required',
        'score2' => 'required',
        'score3' => 'required',
        'score4' => 'required',
        'score5' => 'required',
        'score6' => 'required',
        'score7' => 'required',
        'score8' => 'required',
        'score9' => 'required',
        'score10' => 'required',
    ]);

    Assessment::create($assessment);

    //dd($request);

    return redirect()->back()->with('msg_store','Assessment done successfully');
}

public function linkage(){
    return view('register-hil',[
        'messages' => Message::all(),
        'students' => Student::all(),
        'studentmessages' => Studentmessage::all(),
        'completeapplications' => Completeapplication::latest()->paginate(3),
    ]);
}

public function store_hil(Request $request){
    $hilData=$request->validate([
        'employee_id' => ['required', Rule::unique('linkages','employee_id')],
        'full_name' => 'required',
        'location' => 'required',
        'phone_number' => ['required', Rule::unique('linkages','phone_number')],
        'profile' => 'nullable',
        'username' => ['required', Rule::unique('linkages','username')],
        'password' => 'required',
    ]);

    if($request->hasFile('profile')){
        $hilData['profile'] = $request->file('profile')->store('linkage','public');
    }

    Linkage::create($hilData);

    //dd($request);

    return redirect()->back()->with('hil_created','HIL registered successfully');
}

public function hil_dashboard(){
    return view('linkage.hil-dashboard',[
        'messages' => Message::all(),
        'students' => Student::all(),
        'completeapplications' => Completeapplication::latest()->paginate(3),
        'hods' => Hod::all(),
        'colleges' => College::all(),
        'studentmessages' => Studentmessage::all(),
        'firms' => Firm::all(),
        'assignments' => Assignment::all(),
        'departments' => Department::all(),
    ]);
}

public function assign_sup(){
    return view('ipt.assign-instructor',[
        'messages' => Message::all(),
        'students' => Student::all(),
        'completeapplications' => Completeapplication::latest()->paginate(3),
        'hods' => Hod::all(),
        'colleges' => College::all(),
        'assignments' => Assignment::all(),
        'firms' => Firm::all(),
        'studentmessages' => Studentmessage::all(),
        'departments' => Department::all(),
    ]);
}

public function single_assign($id){
    return view('ipt.single-assignment',[
        'hod' => Hod::find($id),
        'messages' => Message::all(),
        'students' => Student::all(),
        'completeapplications' => Completeapplication::latest()->paginate(3),
        'hods' => Hod::all(),
        'colleges' => College::all(),
        'firms' => Firm::all(),
        'studentmessages' => Studentmessage::all(),
        'departments' => Department::all(),
        'assignments' => Assignment::all(),
    ]);
}

public function store_assignments(Request $request){
    $assignData=$request->validate([
        'full_name' => 'required',
        'role' => 'required',
        'phone' => ['required', Rule::unique('assignments','phone')],
        'college' => 'required',
        'status' => 'required',
    ]);

    $Assign=Assignment::create($assignData);

    if($Assign){
        return redirect('/ipt/assign-instructor');
    }else{
        return redirect()->back()->with('failed_submit','User already selected');
    }
}

public function view_supervisor(){
    return view('linkage.assigned-supervisors',[
        'messages' => Message::all(),
        'students' => Student::all(),
        'completeapplications' => Completeapplication::latest()->paginate(3),
        'hods' => Hod::all(),
        'colleges' => College::all(),
        'studentmessages' => Studentmessage::all(),
        'firms' => Firm::all(),
        'departments' => Department::all(),
        'assignments' => Assignment::paginate(20),
    ]);
}

public function field_vaccancy(){
    return view('linkage.field-vaccancy',[
        'messages' => Message::all(),
        'students' => Student::all(),
        'completeapplications' => Completeapplication::latest()->paginate(3),
        'hods' => Hod::all(),
        'colleges' => College::all(),
        'studentmessages' => Studentmessage::all(),
        'firms' => Firm::all(),
        'departments' => Department::all(),
        'assignments' => Assignment::all(),
    ]);
}

public function store_vaccancies(Request $request){
    $fieldVaccancy=$request->validate([
        'college' => ['required', Rule::unique('fieldvaccancies','college')],
        'vaccany_number' => 'required',
    ]);

    Fieldvaccancy::create($fieldVaccancy);

    return redirect()->back()->with('vaccancy_posted','Field vaccancy submitted successfully');
}

public function view_vaccancy(){
    return view('linkage.view-vaccancy',[
        'messages' => Message::all(),
        'students' => Student::all(),
        'completeapplications' => Completeapplication::latest()->paginate(3),
        'hods' => Hod::all(),
        'colleges' => College::all(),
        'studentmessages' => Studentmessage::all(),
        'firms' => Firm::all(),
        'departments' => Department::all(),
        'assignments' => Assignment::all(),
        'fieldvaccancies' => Fieldvaccancy::all(),
    ]);
}

public function viewFeedbacks(){
    return view('linkage.view-feedbacks',[
        'studentfeedbacks' => Studentfeedback::paginate(5),
        'messages' => Message::all(),
        'students' => Student::all(),
        'completeapplications' => Completeapplication::latest()->paginate(3),
        'hods' => Hod::all(),
        'colleges' => College::all(),
        'studentmessages' => Studentmessage::all(),
        'firms' => Firm::all(),
        'departments' => Department::all(),
        'assignments' => Assignment::all(),
        'fieldvaccancies' => Fieldvaccancy::all(),
    ]);
}

public function report_hil(){
    return view('linkage.generate-report',[
        'messages' => Message::all(),
        'students' => Student::all(),
        'completeapplications' => Completeapplication::latest()->paginate(3),
        'hods' => Hod::all(),
        'colleges' => College::all(),
        'firms' => Firm::all(),
        'studentmessages' => Studentmessage::all(),
        'departments' => Department::all(),
        'assignments' => Assignment::all(),
        'fieldvaccancies' => Fieldvaccancy::all(),
    ]);
}

public function view_field_vaccancies(){
    return view('ipt.vaccancy',[
        'messages' => Message::all(),
        'students' => Student::all(),
        'completeapplications' => Completeapplication::latest()->paginate(3),
        'hods' => Hod::all(),
        'colleges' => College::all(),
        'firms' => Firm::all(),
        'studentmessages' => Studentmessage::all(),
        'departments' => Department::all(),
        'assignments' => Assignment::all(),
        'fieldvaccancies' => Fieldvaccancy::paginate(10),
    ]);
}

public function asiign_supervisors(){
    return view('hod.assigned-supervisors',[
        'messages' => Message::all(),
        'students' => Student::all(),
        'completeapplications' => Completeapplication::latest()->paginate(3),
        'hods' => Hod::all(),
        'colleges' => College::all(),
        'studentmessages' => Studentmessage::all(),
        'firms' => Firm::all(),
        'departments' => Department::all(),
        'assignments' => Assignment::all(),
        'fieldvaccancies' => Fieldvaccancy::paginate(10),
    ]);
}

public function view_field_ipt_vaccancies(){
    return view('hod.view-vaccancy',[
        'messages' => Message::all(),
        'students' => Student::all(),
        'completeapplications' => Completeapplication::latest()->paginate(3),
        'hods' => Hod::all(),
        'colleges' => College::all(),
        'firms' => Firm::all(),
        'departments' => Department::all(),
        'studentmessages' => Studentmessage::all(),
        'assignments' => Assignment::all(),
        'fieldvaccancies' => Fieldvaccancy::paginate(10),
    ]);
}

public function view_all_feedbacks(){
    return view('hod.view-feedbacks',[
        'studentfeedbacks' => Studentfeedback::paginate(5),
        'messages' => Message::all(),
        'students' => Student::all(),
        'completeapplications' => Completeapplication::latest()->paginate(3),
        'hods' => Hod::all(),
        'colleges' => College::all(),
        'firms' => Firm::all(),
        'departments' => Department::all(),
        'assignments' => Assignment::all(),
        'fieldvaccancies' => Fieldvaccancy::all(),
        'studentmessages' => Studentmessage::all(),
    ]);
}

public function hod_report(){
    return view('hod.generate-report',[
        'studentfeedbacks' => Studentfeedback::paginate(5),
        'messages' => Message::all(),
        'students' => Student::all(),
        'completeapplications' => Completeapplication::latest()->paginate(3),
        'hods' => Hod::all(),
        'colleges' => College::all(),
        'firms' => Firm::all(),
        'departments' => Department::all(),
        'assignments' => Assignment::all(),
        'fieldvaccancies' => Fieldvaccancy::all(),
        'studentmessages' => Studentmessage::all(),
    ]);
}

public function store_students_charts(Request $request){
    $studentChrts=$request->validate([
        'profile' => 'required',
        'sender_name' => 'required',
        'message' => 'required',
    ]);

    Studentmessage::create($studentChrts);

    return redirect()->back();
}

public function permissionForm(Request $request){
    $permissionForm=$request->validate([
        'permission' => 'required',
        'full_name' => 'required',
        'reg_number' => 'required',
    ]);

    if($request->hasFile('permission')){
        $permissionForm['permission'] = $request->files('permission')->store('public','permissions');
    }

    Permission::create($permissionForm);

    return redirect()->back();
}

public function principal_dashboard(){

    $completeApplications = Completeapplication::all();

    // Process the data
    $firmRegistrations = [];
    foreach ($completeApplications as $application) {
        $firmName = $application->firm_name;
        if (!isset($firmRegistrations[$firmName])) {
            $firmRegistrations[$firmName] = 0;
        }
        $firmRegistrations[$firmName]++;
    }

    // Format data for the chart
    $labels = [];
    $data = [];
    foreach ($firmRegistrations as $firmName => $totalStudents) {
        $labels[] = $firmName;
        $data[] = $totalStudents;
    }

    return view('principal.principal-dashboard', compact('labels', 'data'),[
        'studentfeedbacks' => Studentfeedback::paginate(5),
        'messages' => Message::all(),
        'students' => Student::all(),
        'completeapplications' => Completeapplication::latest()->paginate(3),
        'hods' => Hod::all(),
        'colleges' => College::all(),
        'firms' => Firm::all(),
        'departments' => Department::all(),
        'assignments' => Assignment::all(),
        'fieldvaccancies' => Fieldvaccancy::all(),
        'studentmessages' => Studentmessage::all(),
    ]);
}

public function principal_view_students(){
    return view('principal.view-students',[
        'studentfeedbacks' => Studentfeedback::paginate(5),
        'messages' => Message::all(),
        'students' => Student::paginate(10),
        'completeapplications' => Completeapplication::latest()->paginate(3),
        'hods' => Hod::all(),
        'colleges' => College::all(),
        'firms' => Firm::all(),
        'departments' => Department::all(),
        'assignments' => Assignment::all(),
        'fieldvaccancies' => Fieldvaccancy::all(),
        'studentmessages' => Studentmessage::all(),
    ]);
}

public function principal_view_staffs(){
    return view('principal.view-staff',[
        'studentfeedbacks' => Studentfeedback::paginate(5),
        'messages' => Message::all(),
        'students' => Student::paginate(10),
        'completeapplications' => Completeapplication::latest()->paginate(3),
        'hods' => Hod::paginate(10),
        'colleges' => College::all(),
        'firms' => Firm::all(),
        'departments' => Department::all(),
        'assignments' => Assignment::all(),
        'fieldvaccancies' => Fieldvaccancy::all(),
        'studentmessages' => Studentmessage::all(),
    ]);
}

public function principal_view_feedbacks(){
    return view('principal.view-feedbacks',[
        'studentfeedbacks' => Studentfeedback::latest()->paginate(5),
        'messages' => Message::all(),
        'students' => Student::paginate(10),
        'completeapplications' => Completeapplication::latest()->paginate(3),
        'hods' => Hod::paginate(10),
        'colleges' => College::all(),
        'firms' => Firm::all(),
        'departments' => Department::all(),
        'assignments' => Assignment::all(),
        'fieldvaccancies' => Fieldvaccancy::all(),
        'studentmessages' => Studentmessage::all(),
    ]);
}

public function principal_report(){
    return view('principal.report',[
        'studentfeedbacks' => Studentfeedback::latest()->paginate(5),
        'messages' => Message::all(),
        'students' => Student::paginate(10),
        'completeapplications' => Completeapplication::latest()->paginate(3),
        'hods' => Hod::paginate(10),
        'colleges' => College::all(),
        'firms' => Firm::all(),
        'departments' => Department::all(),
        'assignments' => Assignment::all(),
        'fieldvaccancies' => Fieldvaccancy::all(),
        'studentmessages' => Studentmessage::all(),
    ]);
}
}
