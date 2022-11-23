<?php include('../templates/cabecera.php');?>
<?php include('../secciones/profesores.php');?>
        
<div class="row">
        <div class="col-md-5">
             <form action="" method="post">
                 <div class="card">
                        <div class="card-header">
                                Profesores
                        </div>
                        <div class="card-body">
                                <div class="mb-3">
                                      <label for="id" class="form-label">ID</label>
                                      <input type="text"
                                         class="form-control" 
                                         name="id"
                                         value="<?php echo $idp; ?>" 
                                         id="id" 
                                         aria-describedby="helpId" 
                                         placeholder="ID">
                                </div>
                                <div class="mb-3">
                                      <label for="nombre" class="form-label">Nombre</label>
                                      <input type="text"
                                         class="form-control" 
                                         name="nombre" 
                                         value="<?php echo $nombrep;?>" 
                                         id="nombre" 
                                         aria-describedby="helpId" 
                                         placeholder="Escriba su Nombre">
                                </div>
                                <div class="mb-3">
                                      <label for="apellidos" class="form-label">Apellidos</label>
                                      <input type="text"
                                         class="form-control"
                                         name="apellidos" 
                                         value="<?php echo $apellidosp; ?>" 
                                         id="apellidos" 
                                         aria-describedby="helpId" 
                                         placeholder="Escriba sus Apellidos">
                                </div>
                                <div class="mb-3">
                                        <label for="" class="form-label">Cursos del Profesor</label>
                                        <select multiple class="form-control" 
                                                name="cursos[]"  
                                                id="listaCursosp">
                                                <?php foreach($cursosp as $cursop){   ?>
                                                     <option
                                                        <?php  
                                                                if(!empty($arregloCursosp)):
                                                                      if(in_array($cursop['id'],$arregloCursosp)):
                                                                      echo 'selected';
                                                                      endif;
                                                                endif;
                                                        ?>
                                                      value="<?php echo $cursop['id'];?>">
                                                      <?php echo $cursop['id'];?> - <?php echo $cursop['nombre_curso'];?>
                                                      </option>
                                                <?php }?>
                                        </select>
                                </div>
                                <div class="btn-group" role="group" aria-label="Button group name">
                                        
                                        <button type="submit" name="accion" value="agregar" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                        </svg>Agregar</button>
                                        <button type="submit" name="accion" value="editar" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                        </svg>Editar</button>
                                        <button type="submit" name="accion" value="borrar" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>Borrar</button>
                                </div>
                        </div>
                 </div>
             </form>
        </div>
        <div class="col-md-7">
                <div class="table-responsive">
                        <table class="table table-primary">
                                <thead>
                                        <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Acciones</th>
                                        </tr>
                                </thead>
                                <tbody>

                                <?php  foreach($profesores as $profesor):?> 
                                     <tr>
                                         <td><?php echo $profesor['id'];  ?></td>

                                         <td>
                                                <?php echo $profesor['nombre'];?> <?php echo $profesor['apellidos'];?>
                                                <br/>
                                                <?php foreach($profesor["cursos"] as $cursop){?>
                                                        
                                                 
                                                 <?php echo $cursop['nombre_curso'];?> 
                                                </a><br/>

                                                <?php } ?>                
               
                                        
                                         </td>
                                                <td>
                                                        <form action="" method="post">
                                                                 <input type="hidden" name="id" id="id" value="<?php echo $profesor['id'];  ?>"/>
                                                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                                                                 <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                                                                 <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                                                                 </svg>
                                                                 <input  type="submit" value="Seleccionar" name="accion" class="btn btn-info">

                                                        </form>
                                                </td>
                                     </tr>
                                <?php  endforeach;?>
                                        
                                </tbody>
                        </table>
                </div>
                
             
        </div>

</div>





<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>


<script>
  new TomSelect("#listaCursosp");
</script>


<?php include('../templates/pie.php');?>