<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>servidores</title>
        <meta http-equiv="Content-Type" content="text/html" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>"/>
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-responsive.min.css'; ?>"/>
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/prettify.css'; ?>"/>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url().'assets/img/favicon.ico'; ?>"/>
        <style type="text/css">
            body {padding-top: 60px; padding-bottom: 40px;}
            .sidebar-nav {padding: 9px 0;}
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
                            <li><a href="<?php echo base_url('servidores/incluir'); ?>">Cadastrar servidor</a></li>
                            <li><a href="<?php echo base_url('usuarios/index'); ?>">Usuários</a></li>
                            <li><a href="<?php echo base_url('usuarios/incluir'); ?>">Cadastrar usuario</a></li>
                        </ul>
                    </div><!--id="nav" -->
                        <ul class="nav pull-right">
                            <li><a data-toggle="modal" href="<?php echo base_url('usuarios/lista_um_usuario/'.$id_usuario);?>"><?php echo @$nome_servidor;?></a></li>
                            <li><a href="<?php echo base_url('identificar/deslog'); ?>">Sair</a></li>
                        </ul>
                </div><!--id="container-fluid" -->
            </div><!--id="navbar-inner" -->
        </div><!--id="navbar" -->
<!--tabela  -------------------------->
            <div class="hero-unit">
                <h2 class='texto-verde text-center'>RAMAIS</h2>
                <h4 class='texto-verde'>SERVIDORES</h4>
                <table class="table table-striped table-bordered">
                    <tr class='texto-verde'>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Ramal</th>
                        <th>Local</th>
                        <th>Ramal 2</th>
                        <th>Local 2</th>
                        <th>Ramal 3</th>
                        <th>Local 3</th>
                    </tr>
                    <?php
                    foreach ($servidores as $servidor) {
                        echo "
                          <tr>
                            <td>{$servidor->id_servidor}</td>" .
                                ( $nome_servidor != "Entrar" ? "
                            <td>
                                <a href=\"" . base_url() ."servidores/lista_um_servidor/{$servidor->id_servidor}\">{$servidor->nome_servidor}</a>
                            </td>" : "<td>{$servidor->nome_servidor}</td>") . "
                            <td>{$servidor->ramal_1}</td>
                            <td>{$servidor->local_1}</td>
                            <td>{$servidor->ramal_2}</td>
                            <td>{$servidor->local_2}</td>
                            <td>{$servidor->ramal_3}</td>
                            <td>{$servidor->local_3}</td>
                           </tr>";
                    }
                    if (!$servidores) {
                        echo "
                          <tr>
                            <td colspan=\"4\" align=\"center\">
                            Não há servidores cadastrados</td>
                          </tr>
                          ";
                    }
                    ?>
                </table>
            </div><!--hero-unit-->
<!--footer---------------------->
        <div class="navbar-fixed-bottom">
            <footer>
                <p class="pull-right texto-verde">IFC-GEATI-Altair</p>
            </footer>
        </div>

<!--modal login------------------>
            <div id="login" class="<?php echo @$modal_hide;?> texto-verde" tabindex="-1" role="dialog"
                                aria-labelledby="loginLabel" aria-hidden="true">

                <div id="login-header" class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h3 id="loginLabel" class="<?php echo @$classe_error; ?>"><?php echo @$msg_error; ?></h3>
                </div><!-- id="modal-header" -->

                <div id="modal-body" class="modal-body">
                    <form method="post" action="<?php echo base_url('identificar/index'); ?>" id="logar" class="form-signin">

                        <h2 class="form-signin-heading">Digite aqui seus dados.</h2>

                        <input type="text" name="login" class="input-block-level"
                               placeholder="Login" value="<?php echo @$login; ?>" required>
                        <input type="password" name="senha" class="input-block-level"
                               placeholder="Senha" value="<?php echo @$senha; ?>" required>

                        <div id="modal-footer" class="modal-footer">
                            <button class="btn btn-primary" type="submit">Entrar</button>
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
                        </div><!-- id="modal-footer" -->
                    </form><!-- id="logar" -->
                </div><!-- id="modal-body" -->
            </div><!-- id="login" -->

<!--js entradas-------------------->
        <script src="<?php echo base_url('assets/js/jquery-latest.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap-carousel.js'); ?>"></script>
        <script>
//            $(".alert").alert();

        </script>
    </body>
</html>