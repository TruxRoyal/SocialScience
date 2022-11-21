<?php

include_once URL_APP . '/views/custom/header.php';

include_once URL_APP . '/views/custom/navbar.php';

var_dump($datos)

?>


<div class="container">
    <div class="row">
        <!-- Columna perfil-->
        <div class="col-md-3"></div>
            <div class="container-style-main"></div>
                <div class="perfil-usuario-main"></div>
                    <div class="background-usuario-main"></div>
                    <img src="<?php echo URL_PROJECT .'/' . $datos['perfil']->fotoPerfil ?>" alt="">
                    <div class="foto-separation"></div>
                    <a href="<?php echo URL_PROJECT ?>/perfil/<?php echo $datos['usuario']->usuario ?>"><div class="text-center nombre-perfil"><?php echo $datos['perfil']->nombreCompleto ?></div></a>
                    <div class="tabla-estadisticas">
                        <a href="#"> Publicaciones<br> 0</a>
                        <a href="#"> Me gusta<br> 0</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Columna principal-->
        <div class="col-md-6">
            <div class="container-style-main">
                <div class="container-usuario-publicar">
                    <a href="<?php echo URL_PROJECT ?>/perfil/<?php echo $datos['usuario']->usuario ?>"><img src="<?php echo URL_PROJECT . '/' . $datos['perfil']
                    ->fotoPerfil ?>" class="image-border" alt =""></a>
                    <form action="<?php echo URL_PROJECT ?>/publicaciones/publicar/<?php echo $datos['usuario']->idusuario ?>" method ="POST" enctype="multipart/form-data" class="form-publicar ml-2">
                        <textarea name="contenido" id="contenido" class="published mb-0" name="post" placeholder="Que quieres publicar?" required></textarea>
                        <div class="image-upload-file">
                            <div class="upload-photo">
                                <img src="<?php echo URL_PROJECT ?>/img/imagen.png" alt="" class="image-public">
                                <div class="input-file">
                                    <input type="file" name="imagen" id="imagen">
                                </div>
                                <span class="ml-1">Subir foto</span>
                            </div>
                            <button class="btn-publi">Publicar</button>
                        </div>  
                    </form>  
                </div> 
                <!-- Publicaciones-->
                <?php foreach ($datos['publicaciones'] as $datosPublicacion) : ?>
                    <div class="container-usuarios-publicaciones">
                        <div class="usuarios-publicaciones-top">
                            <img src="<?php echo URL_PROJECT . '/' . $datosPublicacion->fotoPerfil ?>"alt="" class="image-border">
                            <div class="informacion-usuario-publico">
                                <h6 class="mb-0"><a href="<?php echo URL_PROJECT ?>/perfil/<?php echo $datosPublicacion->usuario ?>"><?php echo ucwords
                                ($datosPublicacion->usuario) ?></a></h6>
                                <span><?php echo $datosPublicacion->fechaPublicacion ?></span>
                            </div>
                            <div class="acciones-publicacion-usuario">
                                <a href="<?php echo URL_PROJECT ?>/publicaciones/eliminar/<?php echo $datosPublicacion->idpublicacion ?>"><i class="far
                                fa-trash-alt"></i></a>
                            </div>
                        </div>
                        <div class="contenido-publicacion-usuario">
                                <p class="mb-1"><?php echo $datosPublicacion->contenidoPublicacion ?></p>
                                <img src="<?php echo URL_PROJECT . '/' . $datosPublicacion->fotoPublicacion ?>" alt="" class="imagen-publicacion-usuario">
                            </div>
                            <div class="acciones-usuario-publicar mt-2">
                                <a href="<?php echo URL_PROJECT ?>/publicaciones/megusta" class="like-user"><i class="fas fa-heart mr-1"></i>Me gusta</a>
                                <a href="" class="comment-user"><i class="far fa-comment-alt mr-1"></i>Comentar</a>
                            </div>
                    </div>
                <?php endforeach ?>
             </div>
        </div>

        <!-- Columna de eventos -->
        <div class="col-md-3">
            <div class="container-style-main">

             </div>
        </div>
    </div>
</div>    

<?php

include_once URL_APP . '/views/custom/footer.php';

?>