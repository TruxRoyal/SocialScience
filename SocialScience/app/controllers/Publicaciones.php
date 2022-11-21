<?php

class Publicaciones extends Controller 
{
    public function __construct()
    {
        $this->publicar = $this->model('publicar');
    }

    public function publicar($idUsuario)
    {
        if(isset($_FILES['imagen'])){
            $carpeta = 'U:/Xampp/htdocs/SocialScience/public/img/imagenesPublicaciones';
            opendir($carpeta);
            $rutaImagen = 'img/imagenesPublicaciones/' .$_FILES['imagen']['name'];
            $ruta = $carpeta .$_FILES['imagen']['name'];
            copy($_FILES['imagen']['tmp_name'], $ruta);
        } else {
            $rutaImagen = 'sin imagen';
        }

        $datos = [
            'iduser' => trim($idUsuario),
            'contenido' => trim($_POST['contenido']),
            'foto' => $rutaImagen
        ];

        if($this->publicar->publicar($datos)){
            redirection('/home');
        }else{
            echo 'algo ocurrio';
        }
    }
    public function eliminar($idpublicacion)
    {

        $publicacion = $this->publicar->getPublicaion($idpublicacion);

        if($this->publicar->eliminarPublicacion($publicacion)){
            unlink('U:/Xampp/htdocs/SocialScience/public' . $publicacion->fotoPublicacion);
            redirection('/home');
        }else{

        }
    }
    public function megusta($idpublicacion , $idUsuario)
    {

    }
}