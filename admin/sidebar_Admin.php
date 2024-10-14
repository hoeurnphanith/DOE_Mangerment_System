<link href="https://fonts.googleapis.com/css2?family=Koulen&display=swap" rel="stylesheet">
<style>
  p,span{
    font-family: 'Koulen', cursive;
  }
  .sidebar-form{
    overflow: hidden;
    text-overflow: clip;
    border-radius: 3px;
    border: 1px solid #374850;
    margin: 10px 10px;

  }
  .main-sidebar{
    background: linear-gradient(106.63deg,rgba(25,69,255,.89) -.84%,rgba(26,42,115,.92)) repeat scroll 0 0,transparent;
  }
  p{
    font-size: 17px;
  }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4 " style="position: fixed;height: auto; background-color:#004fa5;  ">
  <nav  class="sticky"​​​>
    <a href="#" class="brand-link " style="border-bottom-color: white;">
      <img src="../dist/img/M.png"  class="brand-image img-circle elevation-3" style="opacity: .8">

      <span class="brand-text font-weight-light"​​​><?php echo($_SESSION['DOE_ID'])?></span>
    </a>
  </nav>

  <div class="sidebar">

      <nav class="mt-2" style="color: white;">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

           <li class="nav-item">
             <a href="dashboard_admin.php" class="nav-link"><i class="fas fa-tachometer-alt"></i><p> ទំព័រដើម</p></a>
           </li>
           <li class="nav-item">
             <a href="school_name.php" class="nav-link"><i class="fas fa-university"></i><p> គ្រប់គ្រងសាលារៀន</p></a>
           </li>
           
          <!-- គ្រប់គ្រងការសិក្សា -->

          <li class="nav-item">
             <a href="#" class="nav-link"><i class="fas fa-users"></i><p> គ្រប់គ្រងបុគ្គលិក</p></a>
           </li>

           <li class="nav-item">
             <a href="teacher.php" class="nav-link"><i class="fas fa-graduation-cap"></i><p> គ្រប់គ្រងទិន្ន័យគ្រូ</p></a>
           </li>

          <!-- គ្រប់គ្រងការសិក្សា -->
          
          <!--គ្រប់គ្រងសិស្សទូទៅ-->
          <li class="nav-item">
            <a href="#" class="nav-link"><i class="fas fa-user-graduate"></i><p> គ្រប់គ្រងសិស្សទូទៅ<i class="fas fa-angle-left right"></i></p></a>

            <ul class="nav nav-treeview">
              <!-- <li class="nav-item"><a href="sm_student.php" class="nav-link"><p>Dashboard</p></a></li> -->
              <li class="nav-item"><a href="student_new.php" class="nav-link"><p>ព័ត៍មានសិស្ស</p></a></li>
              <li class="nav-item"><a href="childprofile.php" class="nav-link"><p>ប្រភេទកុមារពិការ</p></a></li>
              <li class="nav-item"><a href="#" class="nav-link"><p>ពិន្ទុតាមមុខវិជ្ជា</p></a></li>
              <li class="nav-item"><a href="#" class="nav-link"><p>ព្រឹត្ដិបត្រពិន្ទុ</p></a>
              </li>
            </ul> 
          </li>
          <!--គ្រប់គ្រងសិស្សទូទៅ-->
          <!-- គ្រប់គ្រងការសិក្សា -->
         <li class="nav-item">
          <a href="#" class="nav-link"><i class="fas fa-graduation-cap"></i><p>​ គ្រប់គ្រងការសិក្សា<i class="fas fa-angle-left right"></i></p></a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="sm_academy.php" class="nav-link"><p>ផ្ទាំងគ្រប់គ្រងព័ត៌មាន</p></a>

              <a href="session.php" class="nav-link"><p>ឆ្នាំសិក្សា</p></a>

              <a href="grade.php" class="nav-link"><p>កម្រិតថ្នាក់</p></a>

              <!-- <a href="classroom.php" class="nav-link"><p>បន្ទប់សិក្សា</p></a> -->

              <a href="subject.php" class="nav-link"><p>មុខវិជ្ជា</p></a>

              <!-- <a href="#" class="nav-link"><p>កាលវិភាគសិក្សា</p></a> -->
            </li>
          </ul> 
        </li>
        <!-- គ្រប់គ្រងការសិក្សា -->

          <!-- អាណាព្យាបាល -->
          <li class="nav-item">
            <a href="#" class="nav-link"><i class="fas fa-users"></i><p> គ្រប់គ្រងអ្នកប្រើប្រាស់<i class="fas fa-angle-left right"></i></p></a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="admin_add.php" class="nav-link"><i class="fas fa-user-cog"></i><p>​ គណនីផ្នែករដ្ឋបាល </p></a></li>
             <li class="nav-item"><a href="create_user.php" class="nav-link"><i class="fas fa-user-cog"></i><p> គណនីសាលារៀន</p></a></li>
            </ul> 
          </li>
          <!--end អាណាព្យាបាល -->

          <!-- ទីតាំង -->
          <li class="nav-item">
            <a href="#" class="nav-link"><i class="fas fa-map-marker-alt"></i><p> ព័ត៍មានទីតាំង<i class="fas fa-angle-left right"></i></p></a>
            <ul class="nav nav-treeview">
              <li class="nav-item" ><a href="province.php" class="nav-link"><p>ខេត្ដ</p></a></li>
              <li class="nav-item">
                <a href="district.php" class="nav-link">

                  <p>ស្រុក</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="commune.php" class="nav-link">

                  <p>ឃុំ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="village.php" class="nav-link">

                  <p>ភូមិ</p>
                </a>
              </li>
            </ul> 
          </li>
          <!--end ទីតាំង -->
          <!-- របាយការណ៍ -->
          <li class="nav-item">
            <a href="#" class="nav-link"><i class="fas fa-clipboard-list"></i><p> របាយការណ៍<i class="fas fa-angle-left right"></i></p></a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">

                  <p>បញ្ជីឈ្មោះសិស្ស</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">

                  <p>សិស្សទូទៅ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">

                  <p>ព័ត៍មានគ្រូ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">

                  <p>សិ្ថតិគ្រូ-សិស្ស</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">

                  <p>វត្ដមានប្រចាំខែ</p>
                </a>
              </li>
            </ul> 
          </li>
          <!-- អ្នកប្រើប្រាស់ -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-cog"></i>
              <p>
                ការកំណត់
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-user-cog"></i>
                  <p>ប្រូហ្វាល់</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="changepwd.php" class="nav-link">
                  <i class="fas fa-key"></i>
                  <p>ប្រូលេខសំងាត់</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="logout.php" class="nav-link">
                  <i class="fas fa-sign-out-alt"></i> 
                  <p>ចាកចេញ</p>
                </a>
              </li>
            </ul> 
          </li>
          <!--end អ្នកប្រើប្រាស់ -->
        </ul>


      </nav>
      <!-- /.sidebar-menu -->
    </div>
  </div>
  <!-- /.sidebar -->
</aside>

