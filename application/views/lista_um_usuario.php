<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Usuário: <?php echo @$usuario->nome_servidor;?></title>
        <meta http-equiv="Content-Type" content="text/htnome_servidorml" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>"/>
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-responsive.min.css'; ?>"/>
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/prettify.css'; ?>"/>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url().'assets/img/favicon.ico'; ?>"/>
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
                            <li><a href="<?php echo base_url('usuarios/index'); ?>">Usuários</a></li>
                            <li><a href="<?php echo base_url('usuarios/incluir'); ?>">Cadastrar usuário</a></li>
                        </ul>
                    </div><!--id="nav" -->
                        <ul class="nav pull-right">
                            <li><a data-toggle="modal" href="<?php echo base_url('usuarios/lista_um_usuario/'.$id_usuario);?>"><?php echo @$nome_servidor;?></a></li>
                            <li class="<?php echo @$hide;?>"><a href="<?php echo base_url('identificar/deslog'); ?>">Sair</a></li>
                        </ul>
                </div><!--id="container-fluid" -->
            </div><!--id="navbar-inner" -->
        </div><!--id="navbar" -->
<!--tabela  -------------------------->
        <div id="" class="hero-unit">
            <h2 class="texto-verde text-center">USUÁRIO</h2>
            <h4 class='texto-verde'>Nome:<?php echo ' '.@$usuario->nome_servidor;?></h4>
<!--cabecalho------------------------->
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
                        echo "
                          <tr>
                            <td>{$usuario->id_usuario}</td>
                            <td>{$usuario->id_servidor}</td>
                            <td>{$usuario->nome_servidor}</td>".
                            ( $login_nav != "Entrar" ? "
				<td><a href=\"" . base_url() ."usuarios/alterar/{$usuario->id_usuario}\">
                             {$usuario->login}</a></td>" : "<td>{$usuario->login}</td>") .
                            "<td>{$usuario->senha}</td>
                            <td>{$usuario->lembrete}</td>
                            <td>{$usuario->permissao}</td>
                           </tr>";
                    ?>
            </table>
            <div id="excluir">
                <a class="btn" href='#'>Excluir</a>
            </div>
            <a class="btn btn-large btn-primary pull-right"
               href="<?php echo base_url("usuarios/alterar/$usuario->id_usuario"); ?>">Alterar</a>
            </div><!--hero-unit-->
            <div class="navbar-fixed-bottom">
                <footer>
                    <p class="pull-right texto-verde">IFC-GEATI-Altair</p>
                </footer>
            </div>
<!--modal confirm ------------------>
            <div id="confirm" class="modal hide fade" tabindex="-1" role="dialog"
                                aria-labelledby="alert" aria-hidden="true">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                <div id="modal-body" class="modal-body">
                    <h2 id="alert" class="text-error"></h2>
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
                        <a class="btn btn-large btn-primary pull-right"
                           href="<?php echo base_url("usuarios/excluir/{$usuario->id_usuario}"); ?>">Excluir</a>
                </div><!-- id="modal-body" -->
            </div><!-- id="confirm" -->
<!--js entradas-------------------->
        <script src="<?php echo base_url('assets/js/jquery-latest.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap-carousel.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/local.js'); ?>"></script>
    </body>
</html>
</html>