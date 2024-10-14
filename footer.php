<style>
	@import url('https://fonts.googleapis.com/css2?family=Kantumruy&display=swap');
	@import url('https://fonts.googleapis.com/css2?family=Siemreap&display=swap');

	.table{
		font-size: 20px;
		font-family: 'Kantumruy', sans-serif;
	}
	form{
		font-family: 'Kantumruy', sans-serif;
	}
	h3 h4{
		font-family: 'Koulen', cursive;
	}
	strong{
		font-family: 'Siemreap', cursive;
	}
	b{
		font-family: 'Siemreap', cursive;
	}
	.main-footer{
		/*background: linear-gradient(357deg,rgba(25,69,255,.89) -.84%,rgba(26,42,115,.92)) repeat scroll 0 0,transparent;*/
		background-color: #173bbd;
	}
</style>
<footer class="main-footer sticky-top" style="color: white;">
	<strong class="B">រក្សាសិទ្ធដោយ &copy; 2014-2021 <a href="#" style="color: white">ការិយាល័យអប់រំយុវជន និងកីឡាស្រុកសំឡូត</a>.</strong>
	<!-- All rights reserved. -->
	<div​ class="float-right d-none d-sm-inline-block" >
	<b>ជំនាន់  1.0</b>
</div>
</footer>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="sweetalert/sweetalert2.all.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="dist/js/pages/dashboard2.js"></script> -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="../BootStrap/js/bootstrap.bundle.js"></script>
<script src="../BootStrap/js/bootstrap.bundle.min.js"></script>
<script src="../BootStrap/js/bootstrap.js"></script>
<script src="../BootStrap/js/bootstrap.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print"] 

    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      "responsive": true,
    })
  });
</script>
<script>
  $(function () {
    $("#example3").DataTable({
      "responsive": true, "autoWidth": false,

    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      "responsive": true,
    })
  });
</script>

<script>
  $(function () {
    $("#example").DataTable({
      "responsive": true, "autoWidth": false,

    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      "responsive": true,
    })
  });
</script>





<script>
	$(function(){
		/** add active class and stay opened when selected */
		var url = window.location;

  // for sidebar menu entirely but not cover treeview
  $('ul.sidebar-menu a').filter(function() {
  	return this.href == url;
  }).parent().addClass('active');

  // for treeview
  $('ul.treeview-menu a').filter(function() {
  	return this.href == url;
  }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
  
});
</script>
<!-- <script>
	$(function(){
	//Date picker
	$('#datepicker_add').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd'
	})
	$('#datepicker_edit').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd'
	})

  //Timepicker
  $('.timepicker').timepicker({
  	showInputs: false
  })

  //Date range picker
  $('#reservation').daterangepicker()
  //Date range picker with time picker
  $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
  //Date range as a button
  $('#daterange-btn').daterangepicker(
  {
  	ranges   : {
  		'Today'       : [moment(), moment()],
  		'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
  		'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
  		'Last 30 Days': [moment().subtract(29, 'days'), moment()],
  		'This Month'  : [moment().startOf('month'), moment().endOf('month')],
  		'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
  	},
  	startDate: moment().subtract(29, 'days'),
  	endDate  : moment()
  },
  function (start, end) {
  	$('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
  }
  )
  
});
</script>
 -->