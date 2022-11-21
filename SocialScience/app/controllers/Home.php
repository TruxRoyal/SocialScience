<?php

class Home extends Controller
{
    public function __construct()
    {
       $this->usuario = $this->model('usuario');
       $this->publicaciones = $this->model('publicar');
    }    

    public function index()
    {
        if(isset($_SESSION['logueado'])){
            $datosUsuario = $this->usuario->getUsuario($_SESSION['usuario']);
            $datosPerfil = $this->usuario->getPerfil($_SESSION['logueado']);
            $datosPublicaciones = $this->publicaciones->getPublicaciones();

          
            if($datosPerfil){
                $datosRed = [
                    'usuario' => $datosUsuario,
                    'perfil'  => $datosPerfil,
                    'publicaciones' => $datosPublicaciones
                ];
                $this->view('pages/home', $datosRed);
            }else{
                $this->view('pages/perfil/completarPerfil', $_SESSION['logueado']);
            }

            

            $this->view('/pages/home' , $datosUsuario);
        } else {
            redirection('/home/login');
        }
    }

    public function login(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datosLogin = [
                'usuario' => trim($_POST['usuario']),
                'contrasena' => trim($_POST['contrasena'])
            ];

            $datosUsuario = $this->usuario->getUsuario($datosLogin['usuario']);

            if($this->usuario->verificarContrasena($datosUsuario , $datosLogin['contrasena'])){
                $_SESSION['logueado'] = $datosUsuario->idPrivilegio;
                $_SESSION['usuario'] = $datosUsuario->usuario;
                redirection('/home');
            } else{
                $_SESSION['errorLogin'] = 'El usuario o la contrasena son incorrectos';
                redirection('/home');
            }

        } else {
            if(isset($_SESSION['logueado'])){
                redirection('/home');
            } else{ 
                $this->view('pages/login-register/login');
            }
            
        }
    }

    public function register(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datosRegistro = [
                'idPrivilegio' => '2',
                'correo' => trim($_POST['correo']),
                'usuario' => trim($_POST['usuario']),
                'contrasena' => password_hash(trim($_POST['contrasena']), PASSWORD_DEFAULT)
            ];

            if($this->usuario->verificarUsuario($datosRegistro)){
                if($this->usuario->register($datosRegistro)){
                    /*$_SESSION['usuario'] = $datosRegistro['usuario'];*/
                    $_SESSION['loginComplete'] = 'Tu registro se ha completado satisfactoriamente';
                    redirection('/home');
                } else {
                }
            } else {

                $_SESSION['usuarioError'] = 'El usuario ya esta siendo utilizando, intenta con otro usuario';
                $this->view('pages/login-register/register');
            }
        } else {

            if(isset($_SESSION['logueado'])){
                redirection('/home');
            } else{ 
                $this->view('pages/login-register/register');
            }
        }
    }

    public function insertarRegistroPerfil(){
        $carpeta = 'U:/Xampp/htdocs/SocialScience/public/img/imagenesPerfil/';
        opendir($carpeta);
        $rutaImagen = 'img/imagenesPerfil/' .$_FILES['imagen']['name'];
        $ruta = $carpeta .$_FILES['imagen']['name'];
        copy($_FILES['imagen']['tmp_name'], $ruta);

        $datos = [
            'idusuario' => trim($_POST['id_user']),
            'nombre' => trim($_POST['nombre']),
            'ruta' => $rutaImagen
        ];

        if($this->usuario->insertarPerfil($datos)){
            redirection('/home');
        }else{
            echo 'El perfil no se ha guardado';
        }
    }

    public function cambiarImagen(){
        $carpeta = 'U:/Xampp/htdocs/SocialScience/public/img/imagenesPerfil/';
        opendir($carpeta);
        $rutaImagen = 'img/imagenesPerfil/' . $_FILES['imagen']['name'];
        $ruta = $carpeta . $_FILES['imagen']['name'];
        copy($_FILES['imagen']['name'] , $ruta);

        $datos = [
            'idusuario' -> trim($_POST['id_user']),
            'ruta' -> $rutaImagen
        ];
        if($this-> perfil->editarFoto($datos)){
            redirection('/home');
        }else{
            echo 'El perfil no se ha guardado';
        }


    }

    public function logout()
    {

        session_start();

        $_SESSION = [];

        session_destroy();

        redirection('/home');
    }

}

