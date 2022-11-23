<?php  
session_start();
if($_POST){
  if(($_POST['usuario']=='administrador' && $_POST['password']=='elmasgrandelejos')||($_POST['usuario']=='Fabio84' && $_POST['password']=='1234')){
    $_SESSION['usuario']=$_POST['password'];
    header('Location: secciones/index.php');
  }else{
    $mensaje='Usuario o Password incorrecto';
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
<map name="map1" align-center="map1"> <area
   href="cuadrado.html" alt="Cuadrado" shape=rect coords="0,75,100,175">
<area href="circulo.html" alt="Círculo" shape=circle coords="175,50,50">
<area href="triangulo.html" alt="Triángulo" shape=poly coords="125,250, 225,250, 175,165">
</map>

<img src="https://www.php.net/manual/es/images/c0d23d2d6769e53e24a1b3136c064577-php_logo.png" border="0" width="225" height="251" usemap="#map1">
<img src="https://www.redeszone.net/app/uploads-redeszone.net/2017/02/mysql.png" border="0" width="225" height="251" usemap="#map1">
<img src="https://jarroba.com/wp-content/uploads/2015/03/Xampp-Icono-www.Jarroba.com_.png" border="0" width="225" height="251" usemap="#map1">

<img src="https://www.eniun.com/wp-content/uploads/bootstrap-imagenes.png" border="0" width="225" height="251" usemap="#map1">
<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRudnl8P9Zp7hANVqOyXKyDWm5f10bFaZi4u0GfPLfxqg&s" border="0" width="220" height="220" usemap="#map1">




<div class="container" >

    <div class="row">
        <div class="col-md-4">
        
    </div>
    <div class="col-md-4">
      <br>
      <form action="" method="post">
        <div class="card">
            <div class="card-header">
              
                 Inicio de Sesión
            </div>
            <div class="card-body">
              <?php if(isset($mensaje)){?>
                <div class="alert alert-danger" role="alert">
                  <strong><?php echo $mensaje;?></strong>
                </div>
              <?php }?>
            <div class="mb-3">
              <label for="" class="form-label">Usuario</label>
              <input type="text"
                class="form-control" 
                name="usuario" 
                id="usuario" 
                aria-describedby="helpId" placeholder="usuario">

              <small id="helpId" class="form-text text-muted">Escriba su Usuario</small>
            </div>  
            <div class="mb-3">
              <label for="" class="form-label">Contraseña</label>
              <input type="password"
                class="form-control" name="password" id="contrasenia" aria-describedby="helpId" placeholder="password">
              <small id="helpId" class="form-text text-muted">Escriba su Contraseña</small>
            </div>  
            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
          </div>
        </div>
      </form> 
    </div>

</div>

  <header>
    <!-- place navbar here -->
  </header>
  <main>

  </main>
  <footer>
  
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>


</body>

</html>