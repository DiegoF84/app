<?php  

require('../librerias/fpdf/fpdf.php');

include_once '../configuraciones/bd.php';
$conexionBD=BD::crearInstancia();

function agregarTexto($pdf,$texto,$x,$y,$align='L',$fuente,$size=10,$r=0,$g=0,$b=0){
    $pdf->SetFont($fuente,"",$size);
    $pdf->SetXY($x,$y);
    $pdf->SetTextColor($r,$g,$b);
    $pdf->Cell(0,10,$texto,0,0,$align);
}
function agregarImagen($pdf,$imagen,$x,$y){
    $pdf->Image($imagen,$x,$y,0);
}


//print_r($_GET);
$idcurso=isset($_POST['idcurso'])?$_POST['idcurso']:'';
$idalumno=isset($_POST['idalumno'])?$_POST['idalumno']:'';

$sql="SELECT alumnos.nombre, alumnos.apellidos, cursos.nombre_curso 
FROM alumnos, cursos WHERE alumnos.id=:idalumno AND cursos.id=:idcurso";
$consulta = $conexionBD -> prepare($sql);
$consulta -> bindParam(':idalumno',$idalumno);
$consulta -> bindParam(':idcurso',$idcurso);
$consulta -> execute();
$alumno=$consulta->fetch(PDO::FETCH_ASSOC);
//print_r($alumno);
//3:25 ver porque no funciona la llamada dinamica
$pdf = new FPDF("L","mm",array(254,194));
$pdf->AddPage();
$pdf->setFont("Arial","B",16);
agregarImagen($pdf,"../src/Slide1.jpg",0,0);
agregarTexto($pdf,"Diego Funes",-160,90,"C","Helvetica",30,0,84,115);
agregarTexto($pdf,"Ingles Basico",-160,125,"C","Helvetica",30,0,84,115);
agregarTexto($pdf,date("d/m/Y"),-145,145,"L","Helvetica",20,0,84,115);
$pdf->Output();
?>