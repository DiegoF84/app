<?php 

include_once '../configuraciones/bd.php';
$conexionBD=BD::crearInstancia();
//print_r($_POST);


$idp=isset($_POST['id'])?$_POST['id']:'';
$nombrep=isset($_POST['nombre'])?$_POST['nombre']:'';
$apellidosp=isset($_POST['apellidos'])?$_POST['apellidos']:'';

$cursosp=isset($_POST['cursos'])?$_POST['cursos']:'';
$accionp=isset($_POST['accion'])?$_POST['accion']:'';

if($accionp!=''){
    switch($accionp){
        
        case 'agregar':
            
            $sql = "INSERT INTO profesores (id, nombre, apellidos) VALUES ( NULL,:nombre,:apellidos )";
            $consulta = $conexionBD -> prepare($sql);
            $consulta -> bindParam(':nombre',$nombrep);
            $consulta -> bindParam(':apellidos',$apellidosp);
            $consulta->execute();

            $idProfesor = $conexionBD -> lastInsertId();

            foreach($cursosp as $cursop){

                $sql="INSERT INTO profesores_cursos(id, idprofesor, idcurso) VALUES(NULL,:idprofesor,:idcurso)";
                $consulta = $conexionBD -> prepare($sql);
                $consulta -> bindParam(':idprofesor',$idProfesor);
                $consulta -> bindParam(':idcurso',$cursop);
                $consulta->execute();
            
            }
        break;
        case 'Seleccionar':
            $sql="SELECT * FROM profesores WHERE id=:id";
            $consulta = $conexionBD -> prepare($sql);
            $consulta -> bindParam(':id',$idp);
            $consulta -> execute();
            $profesor=$consulta->fetch(PDO::FETCH_ASSOC);

            $nombrep= $profesor['nombre'];
            $apellidosp = $profesor['apellidos'];

            $sql="SELECT cursos.id FROM profesores_cursos
            INNER JOIN cursos ON cursos.id=profesores_cursos.idcurso
            WHERE profesores_cursos.idprofesor=:idprofesor";
            $consulta = $conexionBD -> prepare($sql);
            $consulta -> bindParam(':idprofesor',$idp);
            $consulta -> execute();
            $cursosProfesor=$consulta->fetch(PDO::FETCH_ASSOC);

            //print_r($cursosAlumno);

            if(isset($cursop['id'])){
                $arregloCursosp[]=$cursop['id'];
                foreach($cursosProfesor as $cursop){
                    $arregloCursosp[]=$cursop['id'];
                }
            }
            
        break;
        case 'borrar':
            $sql="DELETE FROM profesores WHERE id=:id";
            $consulta = $conexionBD -> prepare($sql);
            $consulta -> bindParam(':id',$idp);
            $consulta -> execute();
            
        break;
        case 'editar':
            $sql="UPDATE profesores SET nombre=:nombre,apellidos=:apellidos WHERE id=:id";
            $consulta = $conexionBD -> prepare($sql);
            $consulta -> bindParam(':id',$idp);
            $consulta -> bindParam(':nombre',$nombrep);
            $consulta -> bindParam(':apellidos',$apellidosp);
            $consulta -> execute();
            
            if(isset($cursosp)){

                $sql="DELETE FROM profesores_cursos WHERE idprofesor=:idprofesor";
                $consulta = $conexionBD -> prepare($sql);
                $consulta -> bindParam(':idprofesor',$idp);
                $consulta -> execute();

                foreach($cursosp as $cursop){

                    $sql="INSERT INTO profesores_cursos(id, idprofesor, idcurso)
                          VALUES (NULL, :idprofesor, :idcurso)";
                          $consulta = $conexionBD -> prepare($sql);
                          $consulta -> bindParam(':idprofesor',$idp);
                          $consulta -> bindParam(':idcurso',$cursop);
                          $consulta -> execute();
                }   
                $arregloCursosp=$cursosp;

            }




        break;
    }
}

$sql="SELECT * FROM profesores";
$listaProfesores=$conexionBD -> query($sql);
$profesores=$listaProfesores -> fetchAll();

foreach($profesores as $clave=>$profesor){

    $sql="SELECT * FROM cursos WHERE id IN(SELECT idcurso FROM profesores_cursos WHERE idprofesor=:idprofesor)";
    $consulta = $conexionBD -> prepare($sql);
    $consulta -> bindParam(':idprofesor',$profesor['id']);
    $consulta->execute();
    $cursosProfesor=$consulta -> fetchAll();
    $profesores[$clave]['cursos']=$cursosProfesor;

}
$sql="SELECT * FROM cursos";
$listaCursosp=$conexionBD -> query($sql);
$cursosp=$listaCursosp -> fetchAll();



?>