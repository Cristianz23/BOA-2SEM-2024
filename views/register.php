<?php 
    include_once "../template/zona_priv.php";
    include_once "../template/header.php";
    include_once "../template/menu_admin.php";
    include_once "../template/footer.php";
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<section class="py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="text-center mb-3">
              <a href="#!">
                <img src="../img/logo2.png" alt="Logo" width="175" height="100">
              </a>
            </div>
            <h2 class="fw-bold text-center text-secondary mb-4">Registrar Usuario</h2>
            <form action="../controllers/usuario.controller.php" method="post">
              <div class="row gy-2 overflow-hidden">
                
              <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="nombre" class="form-control" name="nombre" id="nombre" placeholder="Jane Doe" required>
                    <label for="nombre" class="form-label">Nombre</label>
                  </div>
                </div>
              
              <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                    <label for="email" class="form-label">Correo</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                    <label for="password" class="form-label">Contraseña</label>
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-floating mb-3">
                  <select class="form-select" aria-label="Default select example" name="tipouser" id="tipouser" required>
                    <option selected>Selecciona el tipo de usuario</option>
                    <option value="Estudiante">Estudiante</option>
                    <option value="Docente">Docente</option>
                  </select>
                  </div>
                </div>
               
                <div class="col-12">
                  <div class="d-grid my-3">
                    <button class="btn btn-primary btn-lg" type="submit">Registrar Usuario</button>
                  </div>
                </div>
            
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
