<?php
  //Start Session
session_start();
  //Import class.php
require('inc/classdoe.php');
  //Instance Object
$obj = new myclass;
  //Import restrict.php
require('inc/restrict.php');
if($_SESSION['Role']!=="school"){
    //Redirect Page
  header('location:index.php');
}
?>

<?php require('header.php'); ?>
<?php require('sidebar_school.php'); ?>
<link rel="stylesheet" type="text/css" href="action/includes/style_custrom.css">
<div class="content-wrapper" style="height: auto;">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 text-primary">
          <h4>
            <i class="fas fa-graduation-cap"></i> វត្តមាន / អវត្ដមាន(គ្រូ)
          </h4>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div class="container-fluid ">
    <div class="row">
      <div class="col-sm-12">
        <div class="card" style="margin: 10px; margin-top: 0px; margin-bottom: 10px;">
          <div class="card-header">
            <div class="card-body">
              <!-- button -->
              <div class="nav justify-content-end">
                <button type="button" class="btn btn-add" id="addnew" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
                 <i class="fas fa-plus text-white " id="add" ></i>
                 <a class="text-white" style="font-family: 'Kantumruy', sans-serif;"></a>
               </button>
             </div>
             <!-- button -->


             &nbsp;

             <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
              <!-- row -->
              <!--END row -->

              <!-- row -->
              <div class="row">
               <div class="card-body table-responsive p-0">
                 <div class="col-sm-12">
                  <table id="example" class="table table-bordered table-hover dataTable dtr-inline"​ style="font-size: 16px;" role="grid" aria-describedby="example2_info">
                    <thead>
                      <tr>
                        <th>ល.រ</th>
                        <th>គោត្ដនាម - នាម</th>
                        <th>ភេទ</th>
                        <th>ទួនាទី</th>
                        <th>វេនបង្រៀន</th>
                        <th>វត្ដមាន​/អវត្ដមាន</th>
                        <th>ម៉ោងចូល</th>
                        <th>ម៉ោងចេញ</th>
                        <th>ច្បាប់/អត់ច្បាប់</th>
                        <th>កាលបរិច្ឆេទ</th>
                        <th>លុប</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $School_ID = $_SESSION['User_Name'];
                      $class = $obj->fun_displaydata("tbl_attandance WHERE School_ID = '$School_ID'");
                      foreach($class as $records){
                        $Attandance_ID = $records['Attandance_ID'];
                        $School_ID = $records['School_ID'];
                        $Teacher_ID = $records['Teacher_ID'];
                        $Event_Time = $records['Event_Time'];
                        $Attendent = $records['Attendent'];
                        $start_work = $records['start_work'];
                        $End_work = $records['End_work'];
                        $Referent = $records['Referent'];
                        $date = $records['date'];

                        $School_ID = $_SESSION['User_Name'];
                        $sql= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_teacher WHERE Teacher_ID ='$Teacher_ID'");
                        while($row = mysqli_fetch_array($sql)){

                          $Teacher_NameKH = $row['Teacher_NameKH'];
                          $Teacher_Position = $row['Teacher_Position'];
                          $Sex = $row['Sex'];
                          $timestamp1 = strtotime($End_work);
                          $timestamp = strtotime($start_work);

                        }

                        ?>
                        <tr>
                          <td><?php echo $Attandance_ID; ?></td>
                          <td><?php echo $Teacher_NameKH; ?></td>
                          <td><?php echo $Sex; ?></td>
                          <td><?php echo $Teacher_Position; ?></td>
                          <td><?php echo $Event_Time; ?></td>
                          <?php
                          if($Attendent == "វត្ដមាន")
                          {
                            $status = '<label class="badge badge-success">វត្ដមាន</label>';
                          }

                          if($Attendent == "អវត្ដមាន")
                          {
                            $status = '<label class="badge badge-danger">អវត្ដមាន</label>';
                          }
                          ?>
                          <td><?php 
                          echo $status; 
                          ?></td>
                          <td><?php echo date("H:i", $timestamp);?></td>
                          <td><?php echo date("H:i", $timestamp1); ?></td>
                          <td><?php echo  $Referent; ?></td>
                          <td><?php echo  $date; ?></td>

                          <td>
                            <a href="javascript:void(0)" class="btn btn-danger delete fas fa-trash-alt text-white" data-id="<?php echo $Attandance_ID; ?>"> Remove</a>
                          </td>
                        </tr>
                      <?php }?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- row -->
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
<?php require('action/includes/attandance_modal.php'); ?>
<!-- End Modal -->
</div>
<?php require('footer.php'); ?>
<?php require('action/includes/alert_crud.php'); ?>
<script>
  $(document).ready(function($){
    $('#addnew').click(function(){
      $('#userInserUpdateForm').trigger("reset");
      $('#userModel').html("បន្ថែម");
      $('#user-model').modal('show');
    });
    $('body').on('click', '.edit', function () {
      var id = $(this).data('id');
    // ajax
    $.ajax({
      type:"POST",
      url: "action/grade_edit.php",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#userModel').html("កែប្រែ");
        $('#user-model').modal('show');
        $('#Grade_ID').val(res.Grade_ID);
        $('#Grade_Name').val(res.Grade_Name);
        $('#Decription').val(res.Decription);
      }
    });
  });

    $('#userInserUpdateForm').submit(function() {
    // ajax
    $.ajax({
      type:"POST",
      url: "action/attandance_teacher_insert_update.php",
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
      url: "action/attandance_teacher_delete.php",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#Grade_ID').html(res.Grade_ID);
        $('#Grade_Name').html(res.Grade_Name);
        $('#Decription').html(res.Decription);
        window.location.reload();
      }
    });
  }
})
  });

  });
</script>
</div>



