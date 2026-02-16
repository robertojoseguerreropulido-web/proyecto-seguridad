   <div class="container">
       <form method="post">
           <fieldset>
               <legend>Inicio de Sesion</legend>
               <div class="row">
                   <div class="mb-3">
                       <label for="nombre" class="form-label">Nombre de Usuario</label>
                       <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre Usuario">
                   </div>
               </div>
               <div class="row">
                   <div class="mb-3">
                       <label for="clave" class="form-label">Contraseña de Usuario</label>
                       <input type="password" id="clave" name="clave" class="form-control" placeholder="Contraseña Usuario">
                   </div>
               </div>
               <button type="submit" name="registrar" id="registrar" class="btn btn-primary">Ingresar</button>
           </fieldset>
       </form>
       <?php
        if (isset($_GET['action'])) {
            if (isset($_GET['op'])) {
                if ($_GET['op'] == 'err_usu') {
                    $msg = '¡ERROR: Usuario o contraseña errados!';
                } else {
                    $msg = '¡ERROR: Usuario no Existe!';
                }
        ?>
               <div class="alert alert-danger mt-3" role="alert">
                   <p><?php echo $msg; ?></p>
               </div>
       <?php
            }
        }
        ?>
   </div>
   <?php
    $usuarioControlador = new UsuarioController();
    $usuarioControlador->ingresarUsuarioControlador();
    ?>