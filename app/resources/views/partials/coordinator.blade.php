<div class="side-menu-container">
    <br><br><br><br>
    <a href="/ipt/coordinator-dashboard"><i class="fas fa-home"></i> Dashboard</a>

    <a href="#" onclick="showhiddenregcoll()"><i class="fas fa-graduation-cap"></i> Student Management <i class="fas fa-angle-down"></i>
</a>
    <div class="ajax-lg-bx mt-10 p-10">
        <a href="/ipt/student-listing"><i class="fas fa-check"></i>
 Student List</a>
 <!--<a href="/student/view-application"><i class="fas fa-eye"></i> My Selections</a>-->
    </div>


    <a href="#" onclick="showhiddenregdep()"><i class="fas fa-tasks"></i> Report Management <i class="fas fa-angle-down"></i>
</a></a>
    <div class="ajax-depart-lx-bx mt-10 p-10">
        <a href="/ipt/generate-report"><i class="fas fa-chevron-right"></i> Generate Report</a>
    </div>


    <a href="#" onclick="showhiddenregcour()"><i class="fas fa-calendar-check"></i>
 IPT Instructors <i class="fas fa-angle-down"></i>
</a></a>
    <div class="ajax-course-mgt mt-10 p-10">
        <a href="/ipt/vaccancy"><i class="fas fa-chevron-right"></i> IPT Vaccancies</a>
        <a href="/ipt/instructors"><i class="fas fa-chevron-right"></i> IPT Instructors List</a>
        <a href="/ipt/assign-instructor"><i class="fas fa-chevron-right"></i> Assign IPT Instructors</a>
    </div>


    <!--
    <a href="#" onclick="showhiddenregstud()"><i class="fas fa-file-alt"></i> Field Report <i class="fas fa-angle-down"></i></a>
    <div class="ajax-student-container">
        <a href="/student/upload-field-report"><i class="fas fa-chevron-right"></i> Upload Field Report</a>
    </div>


    <a href="#" onclick="showhiddenregstaff()"><i class="fas fa-calendar"></i>

 Student calendar <i class="fas fa-angle-down"></i>
</a></a>
 <div class="uni-staff-container-holder">
    <a href="/student/task-plan"><i class="fas fa-chevron-right"></i> View Task Plan</a>
 </div>


 <a href="#" onclick="showhiddenfirm()"><i class="fas fa-comment"></i>
 Feedbacks <i class="fas fa-angle-down"></i>
</a></a>
 <div class="firm-mgt-container mt-10 p-10">

    <a href="/student/feedbacks"><i class="fas fa-chevron-right"></i> Send Feedbacks</a>
 </div>
 <a href="#"><i class="ri-arrow-right-line"></i> Permission Form</a>-->
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
