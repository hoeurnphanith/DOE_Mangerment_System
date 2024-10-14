<?php
require_once 'dompdf/autoload.inc.php';


use Dompdf\Dompdf;



$document = new Dompdf();


$output = "
<html>
<head>
<link rel='stylesheet' type='text/css' href='css/bootstrap.css'/>
</head>
<body>
<table class='table table-bordered'>
<thead>
<tr>
<th>ល.រ</th>
<th>អត្ដលេខ</th>
<th>ឈ្មោះសិស្ស</th>
</tr>
</thead>
";

require_once 'action/connection.php';

$query = $conn->query("SELECT * FROM `tbl_classroom_student` ORDER BY `ID` ASC") or die($conn->error());

while($fetch = $query->fetch_array()){
	
$output .= '
	<tbody style="background-color:#fff;">	
		<tr>
			<td>'.$fetch['ID'].'</td>
			<td>'.$fetch['Classroom_ID'].'</td>
			<td>'.$fetch['Student_ID'].'</td>
		</tr>
	</tbody>
';

}



$output .= '</table></body></html>';

$document->loadHtml($output);

$document->setPaper('A4', 'landscape');

$document->render();

$document->stream("Sourcecodester", array("Attachment"=>0));

?>
