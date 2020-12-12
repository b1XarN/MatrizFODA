<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estilos.css">
    <title>Nueva Empresa</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4 side">
                <p>USUARIO 1</p>
                <a href="" class="links-side">Mi Perfil</a>
                <a href="menu.php" class="links-side">Empresas</a>
                <a href="usuarios.php" class="links-side">Administrar Usuarios</a>
                <a href="index.php" class="links-side">Salir</a>
            </div>
            <div class="col-8 contenido">
                <h2>Nuevo Usuario</h2>
               
                    <form action="registro_usuario.php" method="POST">
                        <div class="row">
                            <div class="col-6 mb-3 ">
                                <label for="">Nombres y Apellidos</label><br>
                                <input type="text" name="nombres" required="required" pattern="[A-Z||a-z|| ]+"><br>

                            </div>
                            <div class="col-6 mb-3 ">
                                <label for="">DNI</label><br>
                                <input type="text" name="dni" required="required" pattern="[0-9]+" maxlength="8" minlength="8"><br>
                            </div>

                            <div class="col-6 mb-3">
                                <label for="">Direccion</label><br>
                                <input type="text" name="direccion" required="required"><br>

                            </div>
                            <div class="col-6 mb-3">
                                <label for="">Telefono</label><br>
                                <input type="text" name="telefono" required="required" pattern="[0-9]+"><br>
                                
                            </div>
                            <div class="col-12 mb-3">
                                <label for="">Correo</label><br>
                                <input type="email" name="email" required="required"><br>
                                
                            </div>

                            <div class="col-6 mb-3">
                                <label for="">Usuario</label><br>
                                <input type="text" name="usuario" required="required"><br>                         
                                
                            </div>

                            <div class="col-6 mb-3">
                                <label for="">Contraseña</label><br>
                                <input type="password" name="password" required="required"><br>
                                
                            </div>
                            <div class="col-6 mb-3">
                                <label for="">Tipo</label>
                                <select name="tipo" id="">
                                    <option value="Administrador">Administrador</option>
                                    <option value="Normal">Normal</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <input type="submit" name="submitGuardar" value="Guardar" class="btn btn-primary">
                                <a href="menu.php" class="btn btn-danger">Cancelar</a>

                            </div>
                        </div>
                    </form>
                
            </div>
        </div>



    </div>





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>