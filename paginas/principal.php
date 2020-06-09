<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header("Location:../index.php");
    }
    require_once "../paginas/cabecera.php";
?>
<section>
    <div class="row">
        <div class="col-md-6">
            <div class="video">
                <video  width=97% alt="video_presentacion" controls autoplay>
                <source src="../imagenes/videoprincipal.mp4" type="video/mp4">
            </video>
            </div>
        </div>
        <div class="col-md-5">
            <div class="biografia">
                <p class="text_biografia">Mi nombre es Francisco Arjona y soy un fotógrafo de Almería
                formado en el campo audiovisual durante 4 años.
                Para mí fotografía y recuerdos van de la mano, por eso me gusta
                captar los momentos más importantes de los que acuden a mí
                y ofrecer el mejor servicio para vosotros.
                Mi fotografia esta influenciada por el arte en general,
                ya que soy un gran apasionado de la creación,
                en el trabajo que desempeño se muestra esa faceta
                junto a la perfección por los pequeños y grandes detalles.</p>
            </div>
        </div>
    </div>
</div>
</section>

<?php
    require_once "../paginas/footer.php";
?>