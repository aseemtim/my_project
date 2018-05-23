<?php
//SHOW A DATABASE ON A PDF FILE
//CREATED BY: Carlos Vasquez S.
//E-MAIL: cvasquez@cvs.cl
//CVS TECNOLOGIA E INNOVACION
//SANTIAGO, CHILE

require('FPDF/fpdf.php');

//Connect to your database
include("php/connection.php");

//Select the Products you want to show in your PDF file
$sql = "SELECT * FROM contact";
$result = mysqli_query($conn, $sql);
$number_of_products =mysqli_num_rows($result);

//Initialize the 3 columns and the total
$column_name = "";
$column_lname = "";
$column_email = "";
$column_phone = "";

//For each row, add the field to the corresponding column
while($row =mysqli_fetch_assoc($result))
{
    $name = $row["name"];
    $lname =$row["lname"];
    $email = $row["email"];
    $phone =$row["phone"];

    $column_name =$column_name.$name."\n";
    $column_lname =$column_lname.$lname."\n";
    $column_email =$column_email.$email."\n";
    $column_phone =$column_phone.$phone."\n";
}
mysqli_close($conn);

//Create a new PDF file
$pdf=new FPDF();
$pdf->AddPage();

//Fields Name position
$Y_Fields_Name_position = 20;
//Table position, under Fields Name
$Y_Table_Position = 26;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(232,232,232);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',12);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(45);
$pdf->Cell(20,6,'Name',1,0,'L',1);
$pdf->SetX(65);
$pdf->Cell(100,6,'Email',1,0,'L',1);
$pdf->SetX(135);
$pdf->Cell(30,6,'Phone',1,0,'R',1);
$pdf->Ln();

$pdf->SetFont('Arial','',12);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(45);
$pdf->MultiCell(20,6,$column_name,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(100,6,$column_email,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(135);
$pdf->MultiCell(30,6,$column_phone,1,'R');
$pdf->SetX(135);




//Create lines (boxes) for each ROW (Product)
//If you don't use the following code, you don't create the lines separating each row
$i = 0;
$pdf->SetY($Y_Table_Position);
while ($i < $number_of_products)
{
    $pdf->SetX(45);
    $pdf->MultiCell(120,6,'',1);
    $i = $i +1;
}

$pdf->Output();
?>