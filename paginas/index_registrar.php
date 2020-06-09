<!DOCTYPE html> 
<html> 
  <head> 
    <title>Francisco Fotografia</title> 
    <link href="../css/bootstrap.min.css" rel="stylesheet"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/css.css">
    <link rel="icon" type="image/png" href="../imagenes/logo/logo.jpg">
</head> 
<body>
    <header>
        <div class="jumbotron jumbotron-fluid cabecera mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <img src="../imagenes/logo/logo1.jpg" alt="logo" class="w-100">
                    </div>
                </div>   
            </div> 
        </div>
    </header>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 error">
                </div>
                <div class="col-md-12 correcto">
                </div>
                <div class="col-md-6 formPrincipal">
                    <h1 class="iniciar_registrar">Registrate</h1>
                    <div class="card fondoindex">
                        <div class="card-body">
                            <form id="formularioRegister">
                                <div class="form-group">
                                    <label for="usuarioRegistrar" class="iniciar_registrar">Usuario</label><span class="errorRegister1 colorError"></span>
                                    <input type="text" name="usuarioRegistrar" id="usuarioRegistrar" class="campo form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="emailRegistrar" class="iniciar_registrar">Email</label><span class="errorRegister2 colorError"></span>
                                    <input type="text" name="emailRegistrar" id="emailRegistrar" class="campo form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="passwordRegistrar" class="iniciar_registrar">Contraseña</label><span class="errorRegister3 colorError"></span>
                                    <input type="password" name="passwordRegistrar" id="passwordRegistrar" class="campo form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="passwordRegistrar2" class="iniciar_registrar">Repite Contraseña</label><span class="errorRegister4 colorError"></span>
                                    <input type="password" name="passwordRegistrar2" id="passwordRegistrar2" class="campo form-control" required>
                                </div>
                                <input id="registrarse" type="submit" value="Registrarse" class="btn btn-secondary btn-block text-center">
                            </form>
                            <div>
                                <input type="submit" value="Volver al login" class="btn btn-secondary btn-block text-center botonextra" onclick = "location='../index.php'"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/function.js"></script>
</body>
</html>