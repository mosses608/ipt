<div class="side-menu-container">
    <br><br><br><br>
    <a href="/staffs/staff-dashboard"><i class="fas fa-home"></i> Dashboard</a>

    <a href="#" onclick="showhiddenregcoll()"><i class="fas fa-graduation-cap"></i> IPT Allocation <i class="fas fa-angle-down"></i>
</a>
    <div class="ajax-lg-bx mt-10 p-10">
        <!--<a href="/college-management"><i class="fas fa-chevron-right"></i>
 View Allocation</a>-->
 <!--<a href="/register-college-principal"><i class="fas fa-chevron-right"></i> College Principal</a>-->
 <a href="/staffs/ipt-allocation"><i class="fas fa-eye"></i> View Allocation</a>
    </div>


    <a href="#" onclick="showhiddenregdep()"><i class="fas fa-graduation-cap"></i> Students Management <i class="fas fa-angle-down"></i>
</a></a>
    <div class="ajax-depart-lx-bx mt-10 p-10">
        <a href="/staffs/student-progress"><i class="fas fa-chevron-right"></i> Students Progress</a>
        <a href="/staffs/student-feedbacks"><i class="fas fa-chevron-right"></i> Students Feedbacks</a>
        <a href="/staffs/assessments_evaluation"><i class="fas fa-chevron-right"></i>Assessment & Evaluation</a>
    </div>


    <a href="#" onclick="showhiddenregcour()"><i class="fas fa-book"></i>
 Report Management <i class="fas fa-angle-down"></i>
</a></a>
    <div class="ajax-course-mgt mt-10 p-10">
        <a href="/staffs/generate-report"><i class="fas fa-chevron-right"></i> Generate Report</a>
    </div>


    <!--
    <a href="#" onclick="showhiddenregstud()"><i class="fas fa-user"></i> Student management <i class="fas fa-angle-down"></i></a>
    <div class="ajax-student-container">
        <a href="/register-student"><i class="fas fa-chevron-right"></i> Register student</a>
        <a href="/view-students"><i class="fas fa-chevron-right"></i> Student List</a>
    </div>
-->

    <a href="#" onclick="showhiddenregstaff()"><i class="fas fa-users"></i>
 Feedbacks Management <i class="fas fa-angle-down"></i>
</a></a>
 <div class="uni-staff-container-holder">
    <a href="/staffs/feedbacks"><i class="fas fa-chevron-right"></i> Firm Feedbacks</a>
    <!--<a href="/register-ipt-supervisor"><i class="fas fa-chevron-right"></i> IPT Supervisor</a>
    <a href="/register-hil"><i class="fas fa-chevron-right"></i> HIL</a>-->
 </div>


 <!--<a href="#" onclick="showhiddenfirm()"><i class="fas fa-briefcase"></i>
 Firm Management <i class="fas fa-angle-down"></i>
</a></a>
 <div class="firm-mgt-container mt-10 p-10">
    <a href="/firm-hr-registration"><i class="fas fa-chevron-right"></i> HR</a>
    <a href="/firm-registration"><i class="fas fa-chevron-right"></i> Firm Registration</a>
    <a href="/view-firms"><i class="fas fa-chevron-right"></i> View Firms</a>
    <a href="/firm-trainer-registration"><i class="fas fa-chevron-right"></i> Firm Trainers</a>
    <a href="/firm-departments"><i class="fas fa-chevron-right"></i> Firm Department</a>
    <a href="/firm-vacancy"><i class="fas fa-chevron-right"></i> Firm Vacancy</a>
 </div>-->
 <!--<a href="#"><i class="fas fa-analytics"></i> Reports</a>-->


 <form action="/logout" method="POST" class="sign-out-formula">
    @csrf
    <button type="submit" style="color: #FFFFFF;"><i class="fa fa-sign-out"></i> Logout</button>

 </form>
</div>

<script>
    const hiddenfirmmgt=document.querySelector('.firm-mgt-container');

    const hiddenunistaff=document.querySelector('.uni-staff-container-holder');

    const hiddenstudentadd=document.querySelector('.ajax-student-container');

    const hiddencourseadd=document.querySelector('.ajax-course-mgt');

    const hiddendepadd=document.querySelector('.ajax-depart-lx-bx');

    const hiddencollegeadd=document.querySelector('.ajax-lg-bx');

    function showhiddenregcoll(){
        hiddencollegeadd.classList.toggle('active');
    }

    function showhiddenregdep(){
        hiddendepadd.classList.toggle('active');
    }

    function showhiddenregcour(){
        hiddencourseadd.classList.toggle('active');
    }

    function showhiddenregstud(){
        hiddenstudentadd.classList.toggle('active');
    }

    function showhiddenregstaff(){
        hiddenunistaff.classList.toggle('active');
    }

    function showhiddenfirm(){
        hiddenfirmmgt.classList.toggle('active');
    }

</script>
