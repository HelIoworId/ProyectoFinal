<!DOCTYPE html> 
<html> 
  <head> 
    <title>Francisco Fotografia</title> 
    <link href="css/bootstrap.min.css" rel="stylesheet"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/css.css">
    <link rel="icon" type="image/png" href="imagenes/logo/logo.jpg">
</head> 
<body>
    <header>
        <div class="jumbotron jumbotron-fluid cabecera mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <img src="imagenes/logo/logo1.jpg" alt="logo" class="w-100">
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
                <div class="col-md-6 formPrincipal">
                    <h1 class="iniciar_registrar">Iniciar Sesion</h1>
                    <div class="card fondoindex">
                        <div class="card-body">
                            <form id="formularioLogin">
                                <div class="form-group">
                                    <label for="emailInicio" class="iniciar_registrar">Email</label>
                                    <input type="text" name="emailInicio" id="emailInicio" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="passwordInicio" class="iniciar_registrar">Contraseña</label>
                                    <input type="password" name="passwordInicio" id="passwordInicio" class="form-control" required>
                                </div>
                                    <input id="enviar" type="submit" value="Enviar" class="btn btn-secondary btn-block text-center botonsesion">
                            </form>
                            <div class="col-md-12">
                                <input type="submit" value="Cambiar contraseña" class="btn btn-secondary text-center botonextra" onclick = "location='./paginas/index_recuperarPass.php'"/>
                                <input type="submit" value="Crear cuenta nueva" class="btn btn-secondary text-center botonextra" onclick = "location='./paginas/index_registrar.php'"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/function.js"></script>
</body>
</html>