<?php
    require_once("../php/comprobarSesion.php");
    require_once "../paginas/cabecera.php";
?>
<section class="galeria galeria_moda">
    <?php
        echo $fotosModa;
    ?> 
</section>
<div class="perfilUsuarios">
</div>
<div class="perfilComentarios">
</div>
<div class="perfilConfig">
</div>
<div class="fotoGrande">
</div>
<?php
    require_once "../paginas/footer.php";
?>