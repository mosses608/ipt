<div class="side-menu-container">
    <br><br><br><br>
    <a href="/admin_dashboard"><i class="fas fa-home"></i> Dashboard</a>

    <a href="#" onclick="showhiddenregcoll()"><i class="fas fa-graduation-cap"></i> College Management <i class="fas fa-angle-down"></i>
</a>
    <div class="ajax-lg-bx mt-10 p-10">
        <a href="/college-management"><i class="fas fa-chevron-right"></i>
 Register college</a>
 <a href="/register-college-principal"><i class="fas fa-chevron-right"></i> College Principal</a>
 <a href="/view-college-programmes"><i class="fas fa-eye"></i> College Programmes</a>
    </div>


    <a href="#" onclick="showhiddenregdep()"><i class="fas fa-graduation-cap"></i> Department Management <i class="fas fa-angle-down"></i>
</a></a>
    <div class="ajax-depart-lx-bx mt-10 p-10">
        <a href="/departent-management"><i class="fas fa-chevron-right"></i> Register department</a>
        <a href="/register-staff"><i class="fas fa-chevron-right"></i> Department Staff</a>
        <a href="/view-department-staff"><i class="fas fa-chevron-right"></i> <i class="fa fa-eye"></i> View Staff</a>
    </div>


    <a href="#" onclick="showhiddenregcour()"><i class="fas fa-book"></i>
 Programme Management <i class="fas fa-angle-down"></i>
</a></a>
    <div class="ajax-course-mgt mt-10 p-10">
        <a href="/register-course"><i class="fas fa-chevron-right"></i> Register programme</a>
    </div>


    <a href="#" onclick="showhiddenregstud()"><i class="fas fa-user"></i> Student management <i class="fas fa-angle-down"></i></a>
    <div class="ajax-student-container">
        <a href="/register-student"><i class="fas fa-chevron-right"></i> Register student</a>
        <a href="/view-students"><i class="fas fa-chevron-right"></i> Student List</a>
    </div>


    <a href="#" onclick="showhiddenregstaff()"><i class="fas fa-users"></i>
 University staffs <i class="fas fa-angle-down"></i>
</a></a>
 <div class="uni-staff-container-holder">
    <a href="/register-ipt-cordinator"><i class="fas fa-chevron-right"></i> IPT Cordinator</a>
    <a href="/register-ipt-supervisor"><i class="fas fa-chevron-right"></i> IPT Supervisor</a>
    <a href="/register-hil"><i class="fas fa-chevron-right"></i> HIL</a>
 </div>


 <a href="#" onclick="showhiddenfirm()"><i class="fas fa-briefcase"></i>
 Firm Management <i class="fas fa-angle-down"></i>
</a></a>
 <div class="firm-mgt-container mt-10 p-10">
    <a href="/firm-hr-registration"><i class="fas fa-chevron-right"></i> HR</a>
    <a href="/firm-registration"><i class="fas fa-chevron-right"></i> Firm Registration</a>
    <a href="/view-firms"><i class="fas fa-chevron-right"></i> View Firms</a>
    <a href="/firm-trainer-registration"><i class="fas fa-chevron-right"></i> Firm Trainers</a>
    <a href="/firm-departments"><i class="fas fa-chevron-right"></i> Firm Department</a>
    <a href="/firm-vacancy"><i class="fas fa-chevron-right"></i> Firm Vacancy</a>
 </div>
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
