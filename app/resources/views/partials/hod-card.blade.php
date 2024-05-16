<div class="side-menu-container">
    <br class="hide-extend"><br class="hide-extend"><br class="hide-extend"><br>
    <a href="/hod/hod-dashboard"><i class="fas fa-home"></i> <em class="unhidden">Dashboard</em></a>

    <a href="#" onclick="showhiddenregcoll()"><i class="fas fa-comment"></i> <em class="unhidden0">Feedbacks Management</em> <i class="fas fa-angle-down"></i>
</a>
    <div class="ajax-lg-bx mt-10 p-10">
        <a href="/hod/view-feedbacks"><i class="fas fa-chevron-right"></i>
 <em class="unhidden1">View Feedbacks</em></a>
 <!--<a href="/register-college-principal"><i class="fas fa-chevron-right"></i> <em class="unhidden2">College Principal</em></a>
 <a href="/view-college-programmes"><i class="fas fa-eye"></i> <em class="unhidden3">College Programmes</em></a>-->
    </div>


    <a href="#" onclick="showhiddenregdep()"><i class="fas fa-tasks"></i> <em class="unhidden4">Report Management</em> <i class="fas fa-angle-down"></i>
</a></a>
    <div class="ajax-depart-lx-bx mt-10 p-10">
        <a href="/hod/generate-report"><i class="fas fa-chevron-right"></i> <em class="unhidden5">Generate Report</em></a>
    </div>


    <a href="#" onclick="showhiddenregcour()"><i class="fas fa-book"></i>
 <em class="unhidden8">Vaccancy Management</em> <i class="fas fa-angle-down"></i>

</a></a>
    <div class="ajax-course-mgt mt-10 p-10">
        <a href="/hod/view-vaccancy"><i class="fas fa-chevron-right"></i> <em class="unhidden15">View Vaccanies</em></a>
    </div>


    <a href="#" onclick="showhiddenregstud()"><i class="fas fa-user"></i> <em class="unhidden10">IPT Supervisors</em> <i class="fas fa-angle-down"></i></a>
    <div class="ajax-student-container">
        <a href="/hod/assigned-supervisors"><i class="fas fa-chevron-right"></i> <em class="unhidden11">Assigned Supervisors</em></a>
    </div>

<!--
    <a href="#" onclick="showhiddenregstaff()"><i class="fas fa-users"></i>
 <em class="unhidden13">University staffs</em> <i class="fas fa-angle-down"></i>
</a></a>
 <div class="uni-staff-container-holder">
    <a href="/register-ipt-cordinator"><i class="fas fa-chevron-right"></i> <em class="unhidden14">IPT Cordinator</em></a>
    <a href="/register-ipt-supervisor"><i class="fas fa-chevron-right"></i> IPT Supervisor</a>
    <a href="/register-hil"><i class="fas fa-chevron-right"></i> <em class="unhidden15">HIL</em></a>
 </div>


 <a href="#" onclick="showhiddenfirm()"><i class="fas fa-briefcase"></i>
 <em class="unhidden16">Firm Management</em> <i class="fas fa-angle-down"></i>
</a></a>
 <div class="firm-mgt-container mt-10 p-10">
    <a href="/firm-hr-registration"><i class="fas fa-chevron-right"></i> <em class="unhidden17">HR</em></a>
    <a href="/firm-registration"><i class="fas fa-chevron-right"></i> <em class="unhidden18">Firm Registration</em></a>
    <a href="/view-firms"><i class="fas fa-chevron-right"></i> <em class="unhidden19">View Firms</em></a>
    <a href="/firm-trainer-registration"><i class="fas fa-chevron-right"></i> <em class="unhidden20">Firm Trainers</em></a>
    <a href="/firm-departments"><i class="fas fa-chevron-right"></i> <em class="unhidden21">Firm Department</em></a>
    <a href="/firm-vacancy"><i class="fas fa-chevron-right"></i> <em class="unhidden22">Firm Vacancy</em></a>
 </div>
 <a href="#"><i class="fas fa-analytics"></i> Reports</a>-->


 <form action="/logout" method="POST" class="sign-out-formula">
    @csrf
    <button type="submit" style="color: #FFFFFF;"><i class="fa fa-sign-out"></i> <em class="unhidden23">Logout</em></button>

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
