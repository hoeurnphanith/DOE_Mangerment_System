<div class="modal" id="viewModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">មើលពត៌មានសិស្ស</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="container ">
        <div class="modal-body" >


          <form action="javascript:void(0)" id="userInserUpdateForm" name="userInserUpdateForm" class="form-horizontal" method="POST" >
            <div class="row">
              
              <div class="col-md-3">
                <?php 
                $id = $_SESSION['id'];
                echo $_SESSION['id'];
                unset($_SESSION['id']);
                $sql= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_student where ID_Student='$id'");
                while($row = mysqli_fetch_array($sql)){
                  $photo=$row['photo'];
                  ?>
                  <img src="<?php echo (!empty($photo))? 'images/'.$photo:'images/a.jpg'; ?>" width="150px" height="150px">
                <?php }?>
              </div>
              
              <div class="col-md-9">
               <div class="form-group">
                <div class="col-sm-12">
                  <input type="text" class="form-control form-control-border" id="studentname_khmer"  name="studentname_khmer" placeholder="studentname_khmer" value="" >
                </div>
                <div class="col-sm-12">
                  <input type="text" class="form-control form-control-border" id="Studentsss_ID"  name="Studentsss_ID" placeholder="Studentsss_ID" value="" >
                </div>
                <div class="col-sm-12">
                  <input type="text" class="form-control form-control-border" id="sex"  name="sex" value="" >
                </div>
                <div class="col-sm-12">
                  <input type="text" class="form-control form-control-border" id="D_O_B"  name="dob" placeholder="dob" value="" >
                </div>
                <div class="col-sm-12">
                  <input type="text" class="form-control form-control-border" id="grade"  name="grade_id" placeholder="grade" value="" >
                </div>
              </div>
            </div>
          </div>
        </form>

      </div>
    </div>
    <!-- Modal footer -->
    <div class="modal-footer">
      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
    </div>

  </div>
</div>
</div>