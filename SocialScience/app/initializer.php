<?php
//Esta clase carga todas nuestras carpetas 

//Primero llamamos a config
require_once 'config/config.php';

//Llamamos a la Url herperl
require_once 'helpers/url_helper.php';

//Llamamos a libs
spl_autoload_register(function($files){
    require_once 'libs/' . $files . '.php';
})

?>