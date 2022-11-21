<?php

class Perfil extends Controller
{

    public function __construct()
    {
        $this->perfil = $this->model('perfilUsuario');
        $this->usuario = $this->model('usuario');
    }

    public function index($user)
    {
        if(isset($_SESSION['logueado'])){
            $datosPerfil = $this->usuario->getPerfil($_SESSION['logueado']);

            $datos = [

            ];

            $this->view('pages/perfil/perfil');
        }

    }
    public function cambiarImagen()
    {
        
        $carpeta = 'U:/Xampp/htdocs/SocialScience/public/img/imagenesPerfil/';
        opendir($carpeta);
        $rutaImagen = 'img/imagenesPerfil/' .$_FILES['imagen']['name'];
        $ruta = $carpeta .$_FILES['imagen']['name'];
        copy($_FILES['imagen']['tmp_name'], $ruta);

        $datos = [
            'idusuario' -> trim($_POST['id_user']),
            'ruta' -> $rutaImagen
        ];

        $imagenActual = $this->usuario->getPerfil($datos['idusuario']); 

        unlink('U:/Xampp/htdocs/SocialScience/public/' . $imagenActual->fotoPerfil);

        if($this->perfil->editarFoto($datos)){
            redirection('/home');
        }else{
            echo 'El perfil no se ha guardado';
        }
    }
}