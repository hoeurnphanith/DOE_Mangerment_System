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
            <option value="admin">Admin</option>
            <option value="doe">Doe</option>
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