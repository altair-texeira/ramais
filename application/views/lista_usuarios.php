<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>usuarios</title>
        <meta http-equiv="Content-Type" content="text/html" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-responsive.min.css'); ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/prettify.css'); ?>"/>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/favicon.ico');?>"/>
        <style type="text/css">
            body {padding-top: 60px; padding-bottom: 40px;}
            .sidebar-nav {padding: 10px 0;}
            .fundo-verde {background:green;}
            .texto-verde{ color: green;}
        </style>
    </head>
    <body>
        <div id="navbar" class="navbar navbar-fixed-top">
            <div id="navbar-inner" class="navbar-inner">
                <div id="container-fluid" class="container-fluid fundo-verde">
                    <a class="brand" href="http://ifc-camboriu.edu.br/"><img src="<?php echo base_url('assets/img/favicon.ico');?>" alt="favicon.ico"></a>
                    <div id="nav" class="nav-collapse collapse <?php echo @$hide;?>">
                        <ul class="nav">
                            <li><a href="<?php echo base_url('servidores/lista_servidores'); ?>">Servidores</a></li>
                            <li><a href="<?php echo base_url('servidores/incluir'); ?>">Cadastrar servidor</a></li>
                            <li><a href="<?php echo base_url('usuarios/incluir'); ?>">Cadastrar usuario</a></li>
                        </ul>
                    </div><!--id="nav" -->
                        <ul class="nav pull-right">
                            <li><a href="<?php echo base_url('usuarios/lista_um_usuario/'.$id_usuario);?>"><?php echo @$nome_servidor;?></a></li>
                            <li class="<?php echo @$hide;?>"><a href="<?php echo base_url('identificar/deslog'); ?>">Sair</a></li>
                        </ul>
                </div><!--id="container-fluid" -->
            </div><!--id="navbar-inner" -->
        </div><!--id="navbar" -->
<!--tabela  -------------------------->
            <div class="hero-unit">
                <h2 class='texto-verde text-center'>Ramais</h2>
                <h3 class='texto-verde'>Usuários</h3>
                <table class="table table-striped table-bordered">
                    <tr class='texto-verde'>
                        <th>Cód Usuário</th>
                        <th>Cod Servidor</th>
                        <th>Servidor</th>
                        <th>Login</th>
                        <th>Senha</th>
                        <th>Lembrete</th>
                        <th>Permissao</th>
                    </tr>
                    <?php
                    foreach ($usuarios as $usuario) {
                        echo "
                          <tr>
                            <td>{$usuario->id_usuario}</td>
                            <td>{$usuario->id_servidor}</td>
                            <td>{$usuario->nome_servidor}</td>".
                            ( $login_nav != "Entrar" ? "
				<td><a href=\"" . base_url() ."usuarios/lista_um_usuario/{$usuario->id_usuario}\">
                             {$usuario->login}</a></td>" : "<td>{$usuario->login}</td>") .
                            "<td>{$usuario->senha}</td>
                            <td>{$usuario->lembrete}</td>
                            <td>{$usuario->permissao}</td>
                           </tr>";
                    }
                    if (!$usuarios) {
                        echo "
                          <tr>
                            <td colspan=\"4\" align=\"center\">
                            Não há usuários cadastrados.</td>
                          </tr>
                          ";
                    }
                    ?>
                </table>
            </div><!--hero-unit-->
            <div class="navbar-fixed-bottom">
                <footer>
                    <p class="pull-right texto-verde">IFC-GEATI-Altair</p>
                </footer>
            </div>
<!--js entradas-------------------->
        <script src="<?php echo base_url('assets/js/jquery-latest.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap-carousel.js'); ?>"></script>
        
</html>