
<?php
  //Start Session
session_start();
  //Import class.php
require_once('inc/classdoe.php');
  //Instance Object
$obj = new myclass;
  //Import restrict.php
require_once('inc/restrict.php');
if($_SESSION['Role']!=="school" && $_SESSION['Role']!=="doe"){
    //Redirect Page
  header('location:index.php');
}
?>

<?php
include 'header.php';
include 'sidebar_Admin.php';
?>
<link rel="stylesheet" type="text/css" href="action/includes/style_custrom.css">
</style>
<div class="content-wrapper" style="height: auto;">
 <section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-primary">
        <h4>
          <i class="fas fa-graduation-cap"></i>​ អ្នកប្រើប្រាស់
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
              <table id="example" style="min-width: max-content;" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                <thead>
                  <tr>
                    <th>ល.រ</th>
                    <th>លេខកូដសាលា</th>
                    <th>ឈ្មោះសាលា</th>
                    <th>លេខសំងាត់</th>
                    <th>កាលបរិច្ឆេក</th>
                    <th>អុីម៉ែល</th>
                    <th>លេខទូរសព្ទ</th>
                    <th>ប្រភេទប្រើប្រាស់</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                 <?php
                 $school = $obj->fun_displaydata("tbl_users");
                 foreach($school as $records){
                  $User_ID = $records['User_ID'];
                  $User_Name = $records['User_Name'];
                  $School_Name = $records['School_Name'];
                  $pwd = $records['pwd'];
                  $Created = $records['Created'];
                  $Email = $records['Email'];
                  $phone = $records['phone'];
                  $User_Type = $records['User_Type'];

                  //  $schoolid = $obj->fun_displaydata("tbl_school WHERE School_ID = '$School_Name'");
                  // foreach($schoolid as $records){
                  //   $School_ID = $records['School_Name'];
                  //   $School_NameKH = $records['School_NameKH'];
                  $sql= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_school where School_ID='$School_Name'");
                  while($row = mysqli_fetch_array($sql)){
                    $School_Name=$row['School_NameKH'];
                  }

                  

                  ?>
                  <tr>
                    <td><?php echo $User_ID; ?></td>
                    <td><?php echo $User_Name; ?></td>
                    <td><?php echo  $School_Name;  ?></td>
                    <td><?php echo  $pwd; ?></td>

                    <td><?php echo $Created  ;  ?></td>
                    <td><?php echo $Email; ?></td>
                    <td><?php echo $phone; ?></td>
                    <td><?php echo $User_Type; ?></td>

                    <td>
                      <a href="javascript:void(0)"  class="btn btn-primary edit fas fa-edit text-white" data-id="<?php echo $User_ID;?>"></a>
                      <a href="javascript:void(0)" class="btn btn-danger delete fas fa-trash-alt text-white" data-id="<?php echo $User_ID;?>"></a>
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
<div class="modal fade" id="user-model" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="userModel"></h4>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0)" id="userInserUpdateForm" name="userInserUpdateForm" class="form-horizontal" method="POST">
         <div class="form-group">
          <div class="col-sm-12">
            <input type="text" class="form-control" id="User_ID" hidden="" name="User_ID" placeholder="User_ID" value="" >
          </div>
        </div> 
        <div class="form-group">
          <div class="col-sm-12">
            <?php
            $school1 = $obj->fun_displaydata("tbl_school");
            
            ?>
            <label>ជ្រើសរើសសាលារៀន <span style="color:red">*</span></label>

            <select class="custom-select form-control-border" name="school_id" id="school_id" required="" onchange="singleSelectChangeValue()">
              <?php

              foreach($school1 as $records){
                $School_ID = $records['School_ID'];
                $School_NameKH = $records['School_NameKH'];
                ?>
                <option value='<?php echo $School_ID; ?>'>
                  <?php echo $School_NameKH; ?>
                </option>
                <?php
              }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <label>លេខកូដសាលា <span style="color:red">*</span></label>
            <input  type="text" class="form-control form-control-border" id="User_Name" required="" name="User_Name" placeholder="លេខកូដសាលា"​ disabled="">
          </div>
        </div>

        <div class="form-group">
         <div class="col-sm-12">
          <label>លេខសំងាត់ <span style="color:red">*</span></label>
          <input type="text" class="form-control form-control-border" id="pwd" required="" name="pwd" placeholder="លេខសំងាត់">
        </div>
      </div>

      <div class="form-group">
       <div class="col-sm-12">
        <label>កាលបរិច្ឆេក <span style="color:red">*</span></label>
        <input type="date" class="form-control form-control-border" id="Created" required="" name="Created" placeholder="កាលបរិច្ឆេក">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-12">
        <label>អុីម៉ែល <span style="color:red">*</span></label>
        <input type="Email" class="form-control form-control-border" id="email" required="" name="email" placeholder="អុីម៉ែល">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-12">
        <label>លេខទូរសព្ទ <span style="color:red">*</span></label>
        <input type="text" class="form-control form-control-border" id="phone" required="" name="phone" placeholder="លេខទូរសព្ទ">
      </div>
    </div> 
    <div class="form-group">
      <div class="col-sm-12">
       <label>ប្រភេទអ្នកប្រើប្រាស់ <span style="color:red">*</span></label>
       <input type="text" class="form-control form-control-border" id="User_Type" required="" name="User_Type" placeholder="ប្រភេទអ្នកប្រើប្រាស់">
     </div>
   </div> 
   <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-primary" id="btn-save" value="addnew">Save changes
    </button>
  </div>
</form>
</div>
</div>
</div>
<!--End Modal -->
</div>
<?php include 'footer.php';?>
<?php include 'action/includes/alert_crud.php';?>


<!-- Dropdown_list_location -->

<!-- End Dropdown_list_location -->
<script>
 function singleSelectChangeValue() {
        //Getting Value
        //var selValue = document.getElementById("singleSelectDD").value;
        var selObj = document.getElementById("school_id");
        var selValue = selObj.options[selObj.selectedIndex].value;
        //Setting Value
        document.getElementById("User_Name").value = selValue;
      }
    </script>
    <script>
      $(document).ready(function($){
        $('#addnew').click(function(){
          $('#userInserUpdateForm').trigger("reset");
          $('#userModel').html("Add New User");
          $('#user-model').modal('show');
        });
        $('body').on('click', '.edit', function () {
          var id = $(this).data('id');
    // ajax
    $.ajax({
      type:"POST",
      url: "action/user_edit.php",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#userModel').html("Edit District");
        $('#user-model').modal('show');
        $('#User_ID').val(res.User_ID);
        $('#school_id').val(res.User_Name);
        $('#School_Name').val(res.School_Name);
        $('#pwd').val(res.pwd);
        $('#User_Type').val(res.User_Type);
        $('#Created').val(res.Created); 
        $('#email').val(res.Email);
        $('#phone').val(res.phone);
      }
    });
  });

        $('#userInserUpdateForm').submit(function() {
    // ajax
    $.ajax({
      type:"POST",
      url: "action/user_insert_update.php",
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
      url: "action/user_delete.php",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#id').val(res.School_ID);
        $('#School_NameKH').val(res.School_NameKH);
        $('#School_NameEN').val(res.School_NameEN);
        $('#School_Province').val(res.School_Province);
        $('#School_District').val(res.School_District);
        $('#School_Commune').val(res.School_Commune); 
        $('#School_Village').val(res.School_Village);
        window.location.reload();
      }
    });
  }
})
      });
      });
    </script>
  </div>


