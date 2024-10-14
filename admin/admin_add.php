
<?php
  //Start Session
session_start();
  //Import class.php
require_once('inc/classdoe.php');
  //Instance Object
$obj = new myclass;
  //Import restrict.php
if(!isset($_SESSION['DOE_ID']) || !isset($_SESSION['Password'])){
    //Redirect Page
    header('location:index.php');
  }else{
    $username = $_SESSION['DOE_ID'];
    $pwd = $_SESSION['Password'];
    //Check User Name and Pwd
    $result = $obj->fun_checkadminuserpwd($username,$pwd);
    if(!$result){
      //Redirect Page
      header('location:index.php');
    }
  }
?>

<?php
include 'inc/header.php';
include 'sidebar_admin.php';
?>
<link rel="stylesheet" type="text/css" href="action/includes/style_custrom.css">
</style>
<div class="content-wrapper" style="height: auto;">
 <section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-primary">
        <h4>
          <i class="fas fa-graduation-cap"></i>​គណនីប្រើប្រាស់ ផ្នែករដ្ឋាបាលសរុប
        </h4>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="card" style="margin: 10px; margin-top: 0px; margin-bottom: 10px;">

        <div class="card-header">
          <div class="card-body">
           <!-- button -->
           <div class="nav justify-content-end">
            <button type="button" class="btn btn-add" id="addnew" data-toggle="modal" data-target="#exampleModal" style="background: #28a745">
             <i class="fas fa-plus text-white " id="add" ></i>
             <a class="text-white" style="font-family: 'Kantumruy', sans-serif;"></a>
           </button>
         </div>
         <!-- button -->&nbsp;
         <!-- row -->
         <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
          <div class="row">
            <div class="card-body table-responsive p-0">
             <div class="col-sm-12">
              <table id="example" style="min-width: max-content; font-size: 18px;" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                <thead>
                  <tr>
                    <th>ល.រ</th>
                    <th>អត្តលេខមន្ត្រី</th>
                    <th>គោត្តនាម នាម</th>
                    <th>ឈ្មោះឡាតាំង</th>
                    <th>ភេទ</th>
                    <th>ថ្ងៃខែឆ្នាំកំណើត</th>
                    <th>អាសយដ្ឋាន</th>
                    <th>អ៊ីម៉ែល៍</th>
                    <th>លេខទូរសព្ទ</th>
                    <th>ប្រភេទប្រើប្រាស់</th>
                    <th>ឧបករណ៍</th>
                    
                  </tr>
                </thead>
                <tbody>
                 <?php
                $users = $obj->fun_displaydata("tbl_doe where Role='Admin'");
                 foreach($users as $records){
                  $ID = $records['ID'];
                  $DOE_ID = $records['DOE_ID'];
                  $Full_Name = $records['Full_Name'];
                  $EN_Fullname = $records['EN_Fullname'];
                  $Gender = $records['Gender'];
                  $Dob = $records['Dob'];
                  $Pob_Address = $records['Pob_Address'];
                  $Email= $records['Email'];
                  $Role= $records['Role'];
                  $Tel=$records['Tel'];
                  

                  ?>
                  <tr>
                    <td><?php echo $ID; ?></td>
                    <td><?php echo $DOE_ID; ?></td>
                    <td><?php echo $Full_Name;  ?></td>
                    <td><?php echo $EN_Fullname; ?></td>
                    <td><?php echo $Gender  ;  ?></td>
                    <td><?php echo $Dob; ?></td>
                    <td><?php echo $Pob_Address; ?></td>
                    <td><?php echo $Email;?></td>
                    <td><?php echo $Tel;?></td>
                    <td><?php echo $Role; ?></td>
                    
                    

                    <td>
                      <a href="javascript:void(0)"  class="btn btn-primary edit fas fa-edit text-white" data-id="<?php echo $ID;?>"></a>
                      <a href="javascript:void(0)" class="btn btn-danger delete fas fa-trash-alt text-white" data-id="<?php echo $ID;?>"></a>
                      <a href="javascript:void(0)" class="btn  btn-primary resetrole text-white" data-id="<?php echo $ID;?>">Role</a>
                      <a href="javascript:void(0)" class="btn  btn-warning resetpassword text-white" data-id="<?php echo $ID;?>">Reset</a>
                    </td>


                  </tr>
                  <?php

                }
                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="user-model" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
        
    <div class="modal-content ">
      <div class="modal-header">
        <h4 class="modal-title" id="userModel"></h4>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0)" id="userInserUpdateForm" name="userInserUpdateForm" class="form-horizontal" method="POST">
         <div class="form-group">
          <div class="col-sm-12">
            <input type="text" class="form-control" id="ID" hidden="" name="ID" placeholder="ID" value="" >
          </div>
        </div> 
        <div class="form-group">
          <div class="col-sm-12">
          
            <label for="DOE_ID">អត្តលេខមន្ត្រី <span style="color:red">*</span></label>
            <input type="text" class="form-control form-control-border"id="DOE_ID"  name="DOE_ID" placeholder="អត្តលេខមន្ត្រី" required=""  autofocus>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <label>គោតនាម-នាម <span style="color:red">*</span></label>
            <input  type="text" class="form-control form-control-border" id="Full_Name" required="" name="Full_Name" placeholder="គោត្តនាម-នាម"​ autofocus >
          </div>
        </div>

        <div class="form-group">
         <div class="col-sm-12">
          <label>ឈ្មោះឡាតាំង <span style="color:red">*</span></label>
          <input type="text" class="form-control form-control-border" id="EN_Fullname" required="" name="EN_Fullname" placeholder="ឈ្មោះឡាតាំង" autofocus>
        </div>
      </div>

      <div class="form-group">
       <div class="col-sm-12">
        <label>ភេទ <span style="color:red">*</span></label>
        <select class="form-control form-control-border"id="Gender" required="" name="Gender" placeholder="ភេទ" autofocus>
            <option value="ប្រុស" selected>ប្រុស</option>
            <option value="ស្រី">ស្រី</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-12">
        <label>ថ្ងៃខែឆ្នាំកំណើត <span style="color:red">*</span></label>
        <input type="date" class="form-control form-control-border" id="Dob" required="" name="Dob" autofocus>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-12">
        <label>ទីកន្លែងកំណើត <span style="color:red">*</span></label>
        <input type="text" class="form-control form-control-border" id="Pob_Address" required="" name="Pob_Address" placeholder="ភូមិ ឃុំ ស្រុក ខេត្ត" autofocus>
      </div>
    </div> 
    <div class="form-group">
      <div class="col-sm-12">
       <label>ថ្ងៃខែឆ្នាំចូលបម្រើការងារក្នុងក្រសួងអប់រំ យុវជន និងកីឡា <span style="color:red">*</span></label>
       <input type="date" class="form-control form-control-border" id="Date_of_startwork" required="" name="Date_of_startwork" >
     </div>
     <div class="form-group">
       <div class="col-sm-12">
       <label>ថ្ងៃខែឆ្នាំតាំងស៊ុបក្នុងក្របខណ្ឌ <span style="color:red">*</span></label>
       <input type="date" class="form-control form-control-border" id="Date_of_certi" required="" name="Date_of_certi">
        </div>
     </div>
    
      <div class="form-group">
       <div class="col-sm-12">
        <label>ប្រភេទ ឋានន្តរស័ក្តិ និងថ្នាក់ <span style="color:red">*</span></label>
        <select class="form-control form-control-border"id="type_of_framework" required="" name="type_of_framework" >
            <option value="គ្រូបង្រៀនកម្រិតឧត្តម">គ្រូបង្រៀនកម្រិតឧត្តម</option>
            <option value="គ្រូបង្រៀនកម្រិតមធ្យម">គ្រូបង្រៀនកម្រិតមធ្យម</option>
            <option value="គ្រូបង្រៀនកម្រិតបឋម">គ្រូបង្រៀនកម្រិតបឋម</option>
        </select>
      </div>
    </div>
        
     <div class="form-group">
     <div class="col-sm-12">
        <label>ថ្ងៃខែឆ្នាំឡើងថ្នាក់ចុងក្រោយ <span style="color:red">*</span></label>
       <input type="date" class="form-control form-control-border" id="Lastdate_of_certi" required="" name="Lastdate_of_certi" autofocus>
        </slect>
      </div>
    </div>
    
     <div class="form-group">
       <div class="col-sm-12">
       <label>ប្រភេទកាំប្រាក់ <span style="color:red">*</span></label>
       <input type="text" class="form-control form-control-border" id="Level_of_framework" required="" name="Level_of_framework"  placeholder="កាំប្រាក់ ">
        </div>
     </div>
     <div class="form-group">
       <div class="col-sm-12">
       <label>អង្គភាពបម្រើការងារបច្ចុប្បន្ន <span style="color:red">*</span></label>
       <input type="text" class="form-control form-control-border" id="Unit" required="" name="Unit" placeholder="អង្គភាពបម្រើការងារបច្ចុប្បន្ន">
        </div>
     </div>
    
     <div class="form-group">
       <div class="col-sm-12">
        <label>កម្រិតវប្បធម៌ <span style="color:red">*</span></label>
        <select class="form-control form-control-border"id="Edu_Level" required="" name="Edu_Level" >
            <option value="បណ្ឌិត">បណ្ឌិត</option>
            <option value="អនុបណ្ឌិត">អនុបណ្ឌិត</option>
            <option value="បរិញ្ញាបត្រ">បរិញ្ញាបត្រ</option>
            <option value="មធ្យមសិក្សាទុតិយភូមិ">មធ្យមសិក្សាទុតិយភូមិ</option>
            <option value="មធ្យមសិក្សាបឋមភូមិ">មធ្យមសិក្សាបឋមភូមិ</option>
        </select>
      </div>
    </div>
    
     <div class="form-group">
       <div class="col-sm-12">
        <label>កម្រិតវិជ្ជាជីវៈ <span style="color:red">*</span></label>
        <select class="form-control form-control-border"id="Vocational_Level" required=""
        name="Vocational_Level" >
            <option value="គ្រូបង្រៀនកម្រិតបឋម">គ្រូបង្រៀនកម្រិតបឋម</option>
            <option value="គ្រូបង្រៀនកម្រិតបឋម">គ្រូបង្រៀនកម្រិតឧត្តម</option>
        </select>
      </div>
    </div>
    
     <div class="form-group">
       <div class="col-sm-12">
        <label>តួនាទី/ភារកិច្ច<span style="color:red">*</span></label>
        <select class="form-control form-control-border" id="Position" required="" name="Position" >
            <option value="បុគ្គលិកការិយាល័យ">បុគ្គលិកការិយាល័យ</option>
            <option value="លេខា">លេខា</option>
            <option value="រដ្ឋបាល">រដ្ឋបាល</option>
        </select>
      </div>
    </div>
     <div class="form-group">
       <div class="col-sm-12">
        <label>ស្ថានភាពគ្រួសារ<span style="color:red">*</span></label>
        <select class="form-control form-control-border" id="family_status" required="" name="family_status" >
            <option value="">មានគ្រួសារ</option>
            <option value="នៅលីវ" selected>នៅលីវ</option>
        </select>
      </div>
    <div class="form-group">
      <div class="col-sm-12">
        <label>អាសយដ្ឋានបច្ចុប្បន្ន <span style="color:red">*</span></label>
        <input type="text" class="form-control form-control-border" id="Current_Address" required="" name="Current_Address" placeholder="ភូមិ ឃុំ ស្រុក ខេត្ត" autofocus>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-12">
        <label>អ៊ីម៉ែល <span style="color:red">*</span></label>
        <input type="email" class="form-control form-control-border" id="Email" required="" name="Email" placeholder="example@gmail.com" autofocus>
      </div>
    </div> 
     <div class="form-group">
      <div class="col-sm-12">
        <label>លេខសម្ងាត់(8ខ្ទង់) <span style="color:red">*</span></label>
        <input type="password" class="form-control form-control-border" id="Password" required="" name="Password" placeholder="លេខសម្ងាត់" autofocus>
      </div>
    </div>
     <div class="form-group">
      <div class="col-sm-12">
        <label>លេខទូរសព្ទ <span style="color:red">*</span></label>
        <input type="text" class="form-control form-control-border" id="Tel" required="" name="Tel" placeholder="+855123456789" autofocus>
      </div>
    </div> 
    <div class="form-group">
       <div class="col-sm-12">
        <label>ប្រភេទអ្នកប្រើប្រាស់<span style="color:red">*</span></label>
        <select class="form-control form-control-border" id="Role" required="" name="Role" >
            <option value="Admin">Admin</option>
            <option value="Doe">Doe</option>
        </select>
      </div>
    </div>
    <div class="form-group">
     <div class="col-sm-12">
        <label>កាលបរិច្ឆេទ<span style="color:red">*</span></label>
       <input type="date" class="form-control form-control-border" id="Date_Created" required="" name="Date_Created" autofocus>
        </slect>
      </div>
    </div>   
         
    </div>
     
   <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-primary" id="btn-save" value="addnew">រក្សាទុក
    </button>
  </div>
</form>
</div>
</div>
</div>
<!--End Modal -->
</div>
</div>
<?php include 'inc/footer.php';?>
<?php include '../action/includes/alert_crud.php';?>


<!-- Dropdown_list_location -->

<!-- End Dropdown_list_location -->

  <script>
          $(document).ready(function($){
            $('#addnew').click(function(){
              $('#userInserUpdateForm').trigger("reset");
              $('#userModel').html("ទម្រង់បញ្ចូលព័ត៌មានបុគ្គលិក");
              $('#user-model').modal('show');
            });
            $('body').on('click', '.edit', function () {
              var id = $(this).data('id');
              
        // ajax
        $.ajax({
          type:"POST",
          url: "inc/admin_edit.php",
          data: { id: id },
          dataType: 'json',
          success: function(res){
            $('#userModel').html("កែប្រែព័ត៌មានបុគ្កលិក");
            $('#user-model').modal('show');
            $('#ID').val(res.ID);
            $('#DOE_ID').val(res.DOE_ID);
            $('#Fullname').val(res.Fullname);
            $('#EN_Fullname').val(res.EN_Fullname);
            $('#Gender').val(res.Gender); 
            $('#Email').val(res.Email);
            $('#Tel').val(res.Tel);
          }
        });
      });

      $('#userInserUpdateForm').submit(function() {
        // ajax
        $.ajax({
          type:"POST",
          url: "inc/admin_insert_update.php",
        data: $(this).serialize(), // get all form field value in 
        dataType: 'json',
        success: function(res){
          window.location.reload();
        }
      });
      });

        $('body').on('click', '.delete', function () {
          Swal.fire({
          title: 'តើអ្នកប្រាកដថាចង់លុបទេ?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'ទេ',
          confirmButtonText: 'យល់ព្រម'
        }).then((result) => {
        if (result.isConfirmed) {
          var id = $(this).data('id');

        // ajax
        $.ajax({
          type:"POST",
          url: "inc/admin_delete.php",
          data: { id: id },
          dataType: 'json',
          success: function(res){
            window.location.reload();
          }
        });
      }
    })
    });
    });
  </script>
  </div>


