
<?php 

  include_once 'include/ViewClass.php';
  include_once 'include/sessionclass.php';
  include_once 'include/InsertClass.php';
  include_once 'include/DeleteClass.php';
  
  $viewcls = new ViewClass();
  $senddata = new InsertClass();
  $deletedata = new DeleteClass(); 
 
$id = $_SESSION['student_id'];
$name = $_SESSION['name'];
 require ('fpdf182/fpdf.php');
 
    $marks = $viewcls->totamarks($_GET['courseid'],$id);

   $mark = $viewcls->studentmarks($_GET['courseid'],$id); 
   $coursename = $viewcls->coursesviewbyid($_GET['courseid']);
 
   foreach ($coursename as $value) {
   	$coursetitle = $value['course_title'];
   }

  
/*class PDF extends FPDF 
{ 

function Footer() 
{ 

$this->SetY(-27); 
$this->SetFont('Arial','I',8); 

$this->Cell(0,10,'This certificate has been ©  © produced by thetutor',0,0,'R'); 
} 
} */

$pdf = new FPDF('L','pt','A4'); 

//Loading data 
$pdf->SetTopMargin(20); $pdf->SetLeftMargin(20); $pdf->SetRightMargin(20); 

$pdf->AddPage(); 
//  Print the edge of
$pdf->Image("fpdf182/cer.jpg", 20, 20, 780); 
// Print the certificate logo  
/*$pdf->Image("fpdf182/tt1.png", 140, 180, 240); */
// Print the title of the certificate  
/*$pdf->SetFont('times','B',80); 
$pdf->Cell(720+10,200,"CERTIFICATE",0,0,'C'); */
 

$pdf->SetFont('Arial','I',34); 
$pdf->SetXY(370,220); 

$pdf->Cell(100,150,$name,"A",0,'C',0); 


$pdf->SetFont('Arial','B',16); 
$pdf->SetXY(200,380); 
 
$pdf->Cell(420,10,$coursetitle,"A",0,'C',0); 

$pdf->SetFont('Arial','B',16); 
$pdf->SetXY(200,450); 
$date = date("Y/m/d"); 
$pdf->Cell(420,10,$date,"A",0,'C',0); 






$pdf->SetFont('Arial','B',16); 
$pdf->SetXY(480,470); 
$signataire = "Shohan & Nayon"; 
$pdf->Cell(150,19,$signataire,"B",0,'C'); 

$pdf->Output();
