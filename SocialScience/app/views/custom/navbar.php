
<header>
<nav class="navbar navbar-inverse navbar-expand-xl navbar-dark">
    <div class="navbar-header">
        <a class="navbar-brand" href="<?= URL_PROJECT ?>"><i class="fa fa-cube"></i>Social<b>Science</b></a>
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="navbar-toggler-icon"></span>
                <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
            </button>
    </div>

    <div id="navbarCollapse" class="collapse navbar-collapse">
        <form class="navbar-form form-inline">
			<div class="input-group search-box">								
				<input type="text" id="search" class="form-control" placeholder="¿Que estas buscando?">
				<span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
	        </div>
	    </form>
        <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#"><i class="fas fa-home"></i><span>Inicio</span></a></li>
            <li><a href="#"><i class="fa fa-users"></i><span>Amigos</span></a></li>
            <li><a href="#"><i class="fa fa-envelope"></i><span>Mensajes</span></a></li>
            <li><a href="#"><i class="fa fa-bell"></i><span>Notificaciones</span></a></li>
            <li class="dropdown">
                <a href="#" id="actionPerfil" data-toggle="dropdown" class="dropdown-toggle user-action"><img src="<?php echo URL_PROJECT . '/' .$datos['perfil']-> fotoPerfil ?>" class="avatar" alt="perfil"><?php echo $datos['perfil']->nombreCompleto ?><b class="caret"></b></a></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo URL_PROJECT ?>/perfil/<?php echo $datos['usuario']->usuario ?>"> <i class="fa fa-user-o" ></i>Perfil</a></li>
                    <li><a href="#"> <i class="fa fa-sliders" ></i>Configuración</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo URL_PROJECT?>/home/logout"><i class="material-icons">&#xE8AC;</i> Logout</a></li>
                </ul>
            </li>
        </ul>   
    </div>
</nav>

<header>