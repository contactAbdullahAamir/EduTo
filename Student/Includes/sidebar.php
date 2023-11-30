 <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center bg-gradient-primary justify-content-center" style="background-color:#3F51B5" href="index.php">
        <div class="sidebar-brand-icon" >
          <!-- <img src="../img/logo/logo.png"> -->
        </div>
        
        <div class="sidebar-brand-text mx-3" style="font: size 60px;">EduTo  Home</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Student-Dashboard</span></a>
      </li> 
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Students
      </div>
      </li>
       
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
      Instructor
      </div>
      <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapcon"
        aria-expanded="true" aria-controls="collapseBootstrapcon">
        <i class="fa fa-calendar-alt"></i>
        <span>Instructor</span>
    </a>
    <div id="collapseBootstrapcon" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">View instructor Details</h6>
            <a href="instructor.php?id=<?php echo $courseRow['id']; ?>" class="btn btn-md waves-effect waves-light">View Instructor Details</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap2"
        aria-expanded="true" aria-controls="collapseBootstrap2">
        <i class="fas fa-user-graduate"></i>
        <span>Course Content</span>
    </a>
    <div id="collapseBootstrap2" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Course Content</h6>
            <a href="viewContent.php?id=<?php echo $courseRow['id']; ?>" class="btn btn-md waves-effect waves-light">View Course Content</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap3"
        aria-expanded="true" aria-controls="collapseBootstrap3">
        <i class="fas fa-megaphone"></i>
        <span>Announcements</span>
    </a>
    <div id="collapseBootstrap3" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Announcements</h6>
            <a href="viewAnnouncment.php?id=<?php echo $courseRow['id']; ?>" class="btn btn-md waves-effect waves-light">View Announcements</a>
        </div>
    </div>
</li>


      <hr class="sidebar-divider">
     

     
      
      <hr class="sidebar-divider">
     
    </ul>