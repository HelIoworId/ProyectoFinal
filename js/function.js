$(document).ready(function() {
    let nula = "null";
    //Funcion para loguear
    $(document).on("submit","#formularioLogin", function(event){
        event.preventDefault();
        $.ajax({
            url: "./php/login.php",
            type: "POST",
            datatype: "json",
            data: $(this).serialize(),
            success: function(response){
                if(response == ""){
                    $(".error").html("<span>Datos incorrectos, inténtelo de nuevo</span>");
                    $(".error").css("display","block");
                }else{
                    location.href = "./paginas/principal.php";
                }
            }
        })
    });
    //Funcion registro de cuenta
    $(document).on("submit","#formularioRegister", function(event){
        event.preventDefault();
        let datosRegistro = comprobarRegister($("#usuarioRegistrar").val(), $("#emailRegistrar").val(), $("#passwordRegistrar").val(), $("#passwordRegistrar2").val());
        if(datosRegistro){
            $.ajax({
                url: "../php/registrar.php",
                type: "POST",
                datatype: "json",
                data: $(this).serialize(),
                success: function(response){
                    if(response == "\""+$("#usuarioRegistrar").val()+"\""){
                        $(".error").html("<span>Ya existe ese usuario</span>");
                        $(".correcto").css("display","none");
                        $(".error").css("display","block");
                    }else if(response == "\""+$("#emailRegistrar").val()+"\""){
                        $(".error").html("<span>Ya existe una cuenta con ese email</span>");
                        $(".correcto").css("display","none");
                        $(".error").css("display","block");
                    }else{
                        $(".correcto").html("<span>Registrado con exito!</span>");
                        $(".error").css("display","none");
                        $(".correcto").css("display","block");
                    }
                    $(".campo").val("");
                }
            })
        }
        
    });
    //Funcion para comprobar las validaciones del registro
    function comprobarRegister(usuario, email, pass1, pass2){
        let patronUsuario = /^[a-zA-Z]{4,8}$/;
        let patronEmail = /[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/;
        let patronPass = /^[a-zA-Z0-9]{4,12}$/;
        if(!patronUsuario.test(usuario)){
            $(".errorRegister1").text(" (El usuario solo debe contener letras y entre 4 y 8 caracteres)");
        }else{
            $(".errorRegister1").text("");
        }
        if(!patronEmail.test(email)){
            $(".errorRegister2").text(" (Debe seguir un patron de email)");
        }else{
            $(".errorRegister2").text("");
        }
        if(!patronPass.test(pass1)){
            $(".errorRegister3").text(" (La contraseña solo puede contener letras y numero y entre 4 y 12 caracteres)");
        }else{
            $(".errorRegister3").text("");
        }
        if(pass1 != pass2){
            $(".errorRegister4").text(" (La contraseña no coincide)");
        }else{
            $(".errorRegister4").text("");
        }
        if(patronUsuario.test(usuario) && patronEmail.test(email) && patronPass.test(pass1) && pass1 == pass2){
            return true;
        }else{
            return false;
        }
    }
    //Funcion para cambiar la contraseña
    $(document).on("submit","#formRecuperar", function(event){
        event.preventDefault();
        let datosRegistro = comprobarCambiarPass($("#passwordRegistrar2").val());
        if(datosRegistro){
            $.ajax({
                url: "../php/recuperarPass.php",
                type: "POST",
                datatype: "json",
                data: $(this).serialize(),
                success: function(response){
                    if(response == nula){
                        $(".error").html("<span>Datos incorrectos, inténtelo de nuevo</span>");
                        $(".error").css("display","block");
                        $(".correcto").css("display","none");
                    }else{
                        $(".correcto").html("<span>Contraseña restablecida con exito</span>");
                        $(".correcto").css("display","block");
                        $(".error").css("display","none");
                    }
                }
            })
        }
        $(".campo").val("");
    });
    //Funcion para comprobar la validacion del cambio de contraseña
    function comprobarCambiarPass(pass1){
        let patronPass = /^[a-zA-Z0-9]{4,12}$/;
        if(!patronPass.test(pass1)){
            $(".errorRecuperar").text(" (La contraseña solo puede contener letras y numero y entre 4 y 12 caracteres)");
            return false;
        }else{
            $(".errorRecuperar").text("");
            return true;
        }
    }
    //Funciona para cambiar el email de la cuenta
    $(document).on("submit","#formEmail", function(event){
        event.preventDefault();
        let datosRegistro = comprobarEmail($("#cambiarEmail").val());
        if(datosRegistro){
            $.ajax({
                url: "../php/cambiarEmail.php",
                type: "POST",
                datatype: "json",
                data: $(this).serialize(),
                success: function(response){
                    if(response == nula){
                        $(".error").html("<span>Datos incorrectos, inténtelo de nuevo</span>");
                        $(".error").css("display","block");
                        $(".correcto").css("display","none");
                    }else{
                        $(".correcto").html("<span>Email cambiado con exito</span>");
                        $(".correcto").css("display","block");
                        $(".error").css("display","none");
                    }
                }
            })
        }
        $(".campo").val("");
    });
    //Funcion para comprobar la validacion del cambio de contraseña
    function comprobarEmail(email){
        let patronEmail = /[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/;
        if(!patronEmail.test(email)){
            $(".errorEmail").text(" (Debe seguir un patron de email)");
            return false;
        }else{
            $(".errorEmail").text("");
            return true;
        }
    }
    //Nada mas cargar la pagina se cargará la parte de perfil de cada usuario en las distintas paginas
    let perfilgeneral="";
    perfilgeneral +=
        `<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title" id="exampleModalLabel">Perfil de Usuario</h1>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="perfilAdministrador">
                <div>
                    <form id="formEmail">
                        <h3 class="cabeceraPerfil">Modificar Email</h3>
                        <input type="text" class="campo fotos btn-block" name="emailCambiar" placeholder="Email actual" required>
                        <input type="text" id="cambiarEmail" class="campo fotos btn-block" name="emailCambiar2" placeholder="Nuevo email" required><span class="errorEmail colorError2"></span>
                        <input type="password" class="campo fotos btn-block" name="passwordCambiar" placeholder="Contraseña" required>
                        <input type="submit" value="Actualizar" class="fotos btn btn-secondary btn-block text-center botonSubirFotos">
                    </form>
                </div>
                <div>
                    <form id="formRecuperar">
                        <h3 class="cabeceraPerfil">Cambiar Contraseña</h3>
                        <input type="text" class="campo fotos btn-block" name="emailRecuperar" placeholder="Email" required>
                        <input type="password" class="campo fotos btn-block" name="passwordRecuperar" placeholder="Contraseña actual" required>
                        <input type="password" id="passwordRegistrar2" class="campo fotos btn-block" name="passwordRecuperar2" placeholder="Nueva contraseña" required><span class="errorRecuperar colorError2"></span>
                        <input type="submit" value="Actualizar" class="fotos btn btn-secondary btn-block text-center botonSubirFotos">
                    </form>
                </div>
            </div>    
            <div class="modal-footer">
            <a href="../php/cerrarSesion.php" class="cerrar_sesion">Cerrar sesion</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
        </div>`
        $(".perfilUsuarios").html(perfilgeneral);
    //Este if realiza una comprobacion para ver si el usuario logueado es administrador y otorgarle otros privilegios como poder acceder al apartado admin de la web
    let perfilAdmin="";
    let perfilAdmin2="";
    let botonAdmin="";
    if($("#perfil").val() == "Admin"){
        botonAdmin += 
            `<button id="perfil" type="button" class="btn nombrePerfil" data-toggle="modal" data-target="#exampleModal2" value="Users">
            Users</button>`
        $(".botonConfig").html(botonAdmin); 
        perfilAdmin +=
            `<div class="col-md-12 divFotos">
                <form action="../php/subirFotos.php" method="post" enctype="multipart/form-data">
                    <h3 class="cabeceraPerfil">Subir foto</h3>
                    <input type="text" class="fotos" name="nameFoto" placeholder="Nombre" required>
                    <select class="fotos" name="categoriaFoto">
                        <option value="comunion">Comunion</option>
                        <option value="premama">Premama</option>
                        <option value="moda">Moda</option>
                        <option value="infantil">Infantil</option>
                    </select>
                    <input type="file" class="fotos" name="elegirFoto" accept="image/*" required>
                    <input type="submit" value="Añadir" class="fotos btn btn-secondary btn-block text-center botonSubirFotos">
                </form>
            </div>
            <div class="col-md-12 divFotos">
                <form id="formularioEliminar">
                    <h3 class="cabeceraPerfil">Eliminar foto</h3>
                    <select class="fotos categoriaEliminarFoto" name="categoriaEliminarFoto">
                    </select>
                    <input type="submit" value="Eliminar" class="fotos btn btn-secondary btn-block text-center">
                </form>
            </div>`
        $(".perfilAdministrador").html(perfilAdmin);  
        perfilAdmin2 +=
        `<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title" id="exampleModalLabel2">Configuracion de usuarios y comentarios</h1>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div>
                <div class="col-md-12 divFotos">
                <form id="formularioEliminarUser">
                    <h3 class="cabeceraPerfil">Eliminar Usuario</h3>
                    <select class="fotos categoriaEliminarUsuario" name="categoriaEliminarUsuario">
                    </select>
                    <input type="submit" value="Eliminar" class="fotos btn btn-secondary btn-block text-center botonSubirFotos">
                </form>
                </div>
                <div class="col-md-12 divFotos">
                    <form id="formularioEliminarComent">
                        <h3 class="cabeceraPerfil">Eliminar Comentario</h3>
                        <select class="fotos categoriaEliminarComentario" name="categoriaEliminarComentario">
                        </select>
                        <input type="submit" value="Eliminar" class="fotos btn btn-secondary btn-block text-center">
                    </form>
                </div>
            </div>    
            <div class="modal-footer">
            <a href="../php/cerrarSesion.php" class="cerrar_sesion">Cerrar sesion</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
        </div>`
        $(".perfilConfig").html(perfilAdmin2);  
    }
    //Realizamos configuracion para crear un panel para los comentarios
    let perfilLista="";
    perfilLista +=
        `<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title" id="exampleModalLabel1">Comentarios</h1>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr class="btn-secondary">
                        <th>Usuario</th>
                        <th>Comentario</th>
                    </tr>
                </thead>
                <tbody id="tablaComentarios">
                </tbody>
            </table>
            <form id="formularioComentarios">
                <div>
                    <input type="hidden" class="foto_ocultar" name="nombreFoto">
                </div>
                <div>
                    <textarea rows="4" cols="50" maxlength="1024" name="comentarioFoto" class="text_area new_coment"></textarea>
                </div>
                <div>
                    <input type="submit"value="Enviar comentario" class="btn btn-secondary btn-block text-center new_coment">
                </div>
            </form>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
        </div>`
        $(".perfilComentarios").html(perfilLista);
    //Funciones para mostrar la cantidad de me gustas
    mostrarLikes();
    function mostrarLikes(){
        for (i = 0; i < $(".btCorazon").length; i++) {
            mostrarLikes2();
        }
    }
    function mostrarLikes2(){
        var fotoMegusta = $(".btCorazon")[i].getAttribute('value');
    $.ajax({
        url: "../php/meGusta2.php",
        type: "POST",
        data: {fotoMegusta},
        success: function(response){
            $(`[taskCod="${fotoMegusta}"]`).find(".cantidadMegusta").html(response);
        }
    });
    }
    //Funciones para mostrar la cantidad de comentarios
    mostrarCantidadComentarios();
    function mostrarCantidadComentarios(){
        for (i = 0; i < $(".btCorazon").length; i++) {
            mostrarCantidadComentarios2();
        }
    }
    function mostrarCantidadComentarios2(){
        var comentarioCantidad = $(".btCorazon")[i].getAttribute('value');
    $.ajax({
        url: "../php/cantidadComentarios.php",
        type: "POST",
        data: {comentarioCantidad},
        success: function(response){
            $(`[taskCod="${comentarioCantidad}"]`).find(".cantidadComentario").html(response);
        }
    });
    }
    //Funcion de darle megusta a la foto
    $(document).on('click', '.btCorazon', (e) => { 
        const foto = $(this)[0].activeElement.parentElement;
        var fotoMegusta = foto.getAttribute('taskCod');
        $.ajax({
            url: "../php/meGusta.php",
            type: "POST",
            data: {fotoMegusta},
            success: function(response){
                $(`[taskCod="${fotoMegusta}"]`).find(".cantidadMegusta").html(response);
            }
        });
    });
    //Funcion para subir un comentario a la base de datos
    jQuery(document).on("submit","#formularioComentarios", function(event){
        event.preventDefault();
        jQuery.ajax({
            url: "../php/subirComentarios.php",
            type: "POST",
            datatype: "json",
            data: $(this).serialize(),
            success: function(response){
                $(".text_area").val("");
                mostrarComentario();
            }
        })
    });
    //Funcion para saber la foto que estamos comentando y mostrar un listado con los comentarios que tiene la foto
    $(document).on('click', '.btComentario', (e) => { 
        const valorComent = $(this)[0].activeElement.parentElement;
        var coment = valorComent.getAttribute('taskCod');
        $(".foto_ocultar").val(coment);
        mostrarComentario();
    });
    function mostrarComentario(){
        var coment = $(".foto_ocultar").val();
        $.ajax({
            url: "../php/mostrarComentarios.php",
            type: "POST",
            data: {coment},
            success: function(response){
                let tasks = JSON.parse(response);
                let tabla = "";
                tasks.forEach(task => {
                    $("#task_result").html(task)
                    tabla += 
                    `<tr">
                    <td>${task.name}</td>
                    <td>${task.descrip}</td>
                    </tr>`
                });

                $("#tablaComentarios").html(tabla);
            }
        });
        listaEliminarComentario();
        mostrarCantidadComentarios();
    }
    //Configuracion eliminar fotos
    listaEliminar();
    function listaEliminar(){   
        $.ajax({
            url: "../php/listaEliminar.php",
            type: "GET",
            datatype: "json",
            success: function(response){
                let tasks = JSON.parse(response);
                let tabla = "";
                tasks.forEach(task => {
                    $("#task_result").html(task)
                    tabla += 
                    `<option value="${task.name}">${task.name}</option>`
                });
                $(".categoriaEliminarFoto").html(tabla);
            }
        });
    }
    $(document).on("submit","#formularioEliminar", function(event){
        if(confirm('¿Seguro que quieres eliminar la foto?')) {
            event.preventDefault();
            $.ajax({
                url: "../php/eliminarFotos.php",
                type: "POST",
                datatype: "json",
                data: $(this).serialize(),
                success: function(response){
                    $(".correcto").html("<span>Foto eliminada correctamente</span>");
                    $(".correcto").css("display","block");
                    $(".error").css("display","none");
                    $(".correctoSubida").css("display","none");
                    listaEliminar();
                }
            })
        }
    });
    //Funcion para borrar usuarios
    listaEliminarUSERS();
    function listaEliminarUSERS(){   
        $.ajax({
            url: "../php/listaUsuarios.php",
            type: "GET",
            datatype: "json",
            success: function(response){
                let tasks = JSON.parse(response);
                let tabla = "";
                tasks.forEach(task => {
                    $("#task_result").html(task)
                    tabla += 
                    `<option value="${task.name}">${task.name}</option>`
                });
                $(".categoriaEliminarUsuario").html(tabla);
            }
        });
    }
    $(document).on("submit","#formularioEliminarUser", function(event){
        if(confirm('¿Seguro que quieres eliminar permanentemente al usuario?')) {
            event.preventDefault();
            $.ajax({
                url: "../php/eliminarUsuario.php",
                type: "POST",
                datatype: "json",
                data: $(this).serialize(),
                success: function(response){
                    $(".correcto").html("<span>Usuario eliminado correctamente</span>");
                    $(".correcto").css("display","block");
                    $(".error").css("display","none");
                    $(".correctoSubida").css("display","none");
                    listaEliminarUSERS();
                }
            })
        }
    });
    //Funcion para eliminar comentarios de los usuarios
    listaEliminarComentario();
    function listaEliminarComentario(){   
        $.ajax({
            url: "../php/listaComentarios.php",
            type: "GET",
            datatype: "json",
            success: function(response){
                let tasks = JSON.parse(response);
                let tabla = "";
                tasks.forEach(task => {
                    $("#task_result").html(task)
                    tabla += 
                    `<option value="${task.name}">${task.name}</option>`
                });
                $(".categoriaEliminarComentario").html(tabla);
            }
        });
    }
    $(document).on("submit","#formularioEliminarComent", function(event){
        if(confirm('¿Seguro que quieres eliminar el comentario?')) {
            event.preventDefault();
            $.ajax({
                url: "../php/eliminarComentario.php",
                type: "POST",
                datatype: "json",
                data: $(this).serialize(),
                success: function(response){
                    $(".correcto").html("<span>Comentario eliminado correctamente</span>");
                    $(".correcto").css("display","block");
                    $(".error").css("display","none");
                    $(".correctoSubida").css("display","none");
                    listaEliminarComentario();
                }
            })
        }
    });
    //Configuracion para las fotos cuando se amplian.
    let ampliarFotos="";
    ampliarFotos +=
        `<div class="modal fade" id="exampleModalFotos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content imagenFlotante fotoAmpliada  ">
                
            </div>
        </div>
        </div>`
        $(".fotoGrande").html(ampliarFotos);
    //Funcion para mostrar la imagen ampliada
    $(document).on('click', '.btLupa', (e) => { 
        const valorFotoGrande = $(this)[0].activeElement.value;
        console.log(valorFotoGrande);
        $(".fotoAmpliada").html("<img src='"+valorFotoGrande+"' alt='FotoAmpliada' class='imagenesAmpliadas'>");
    });  
      
});
