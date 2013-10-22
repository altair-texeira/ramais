<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>cadastrar/alterar:<?php echo' '. @$usuario->nome_servidor;?></title>
        <meta http-equiv="Content-Type" content="text/html" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>"/>
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-responsive.min.css'; ?>"/>
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/prettify.css'; ?>"/>
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
<!--.....container............................................-->
        <div id="container" class="container texto-verde">
            <div id="row-fluid" class="row-fluid">
                <div class="span12">
                    <div class="well">
                        <h2 class="texto-verde text-center">USUÁRIO</h2>
                        <h4 class="texto-verde"><?php echo @$titulo;?></h4>
                    </div><!--well-->
        <!--.............form......-->
                        <form name="usuario" method="post" action="<?php echo base_url('usuarios/gravar'); ?>"/>
                        <fieldset>
                            <legend><?php echo @$titulo;?></legend>
                            <div id="row" class="row">
           <!--....servidor......-->
                                <div id="servidor" class="span3">
               <!--..id_usuario..--><input type="hidden" name="id_usuario"
                                            value="<?php echo @$usuario->id_usuario; ?>"/>

                                    <input type="hidden" name="id_servidor" id="id_servidor"
                                            value="<?php echo @$usuario->id_servidor; ?>"/>

               <!--....servidor..--><label><a href="#sel_serv" data-toggle="modal">Selecionar servidor:</a></label>
                                    <input type="text" class="uneditable-input" placeholder="Nome do servidor"
                                           name="nome_servidor" size="20" id="nome_servidor"
                                           value="<?php echo @$usuario->nome_servidor; ?>" required>
                                </div><!--id="servidor"-->
            <!--....login......-->
                                <div id="login" class="span3">
               <!--....login ....--><label>Login:</label>
                                    <input type="text" placeholder="Login do usuario"
                                           name="login" size="20"
                                           value="<?php echo @$usuario->login; ?>" required>
                                </div><!--id="loogin"-->
            <!--....senha......-->
                                <div id="senha" class="span3">
               <!--....senha ....--><label>Senha:</label>
                                    <input type="password" placeholder="Senha do usuario"
                                           name="senha" size="20"
                                           value="<?php echo @$usuario->senha; ?>" required>
                                    <div id="re_senha" class="">
               <!--    confirmar.--><label>Repetir senha:</label>
                                    <input type="password" placeholder="Confirme a senha do usuario"
                                           name="re_senha" size="20"
                                           value="" onblur="validarSenha()">
                                    </div> <!--re_senha-->
                                </div><!--id="senha"-->
            <!--...lembrete/permissao......-->
                                <div id="lembrete" class="span3">
               <!--..lembrete ...--><label>Lembrete:</label>
                                    <input type="text" placeholder="Lembrete para a senha"
                                           name="lembrete" size="20"
                                           value="<?php echo @$usuario->lembrete; ?>">
              <!--..permissao ...--><label class="checkbox inline">
                                          <input type="checkbox" id="inlineCheckbox1" name="permissao" value="<?php echo
                                             ($usuario->permissao != "u" ? "u" : @$usuario->permissao); ?>">Usuario
                                     </label>
                                        <label class="checkbox inline">
                                          <input type="checkbox" id="inlineCheckbox2" name="permissao" value="<?php echo
                                             ($usuario->permissao != "a" ? "a" : @$usuario->permissao); ?>"> Admin
                                     </label>
                                    </label>
                                </div><!--id="senha"-->
                            </div><!--row-->
                            <input class="btn btn-primary pull-right" type="submit" value="Gravar"/>
                        </fieldset>
                     </form>
                </div><!--span12-->
            </div><!-- id="row-fluid" -->
        </div><!-- id="container" -->
        <div class="navbar-fixed-bottom">
            <footer>
                <p class="pull-right texto-verde">IFC-GEATI-Altair</p>
            </footer>
        </div>
<!--....modal selecionar servidor .................-->
        <div id="sel_serv" class="modal hide " tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-body">
                <label>Servidores:</label>
                <input type="text" id="txtBusca" placeholder="Digite aqui um valor para filtrar..."/>
                <ul id="servidor-lista">
                    <?php
                    foreach ($servidores as $servidor) {
                        echo "
                            <li>
                                <a
                                   data-id='{$servidor->id_servidor}'
                                   data-nome='{$servidor->nome_servidor}'
                                   href='#'
                                >
                                {$servidor->nome_servidor}
                                </a>
                            </li>
                        ";
                    }
                    ?>
                </ul>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Fechar</button>
            </div>
        </div><!--sel_serv-->
<!--modal confirm ------------------>
            <div id="confirm" class="modal hide fade" tabindex="-1" role="dialog"
                                aria-labelledby="alert" aria-hidden="true">
                <div id="modal-body" class="modal-body">
                    <h2 id="alert" class="text-error"></h2>
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                </div><!-- id="modal-body" -->
            </div><!-- id="confirm" -->
<!--js entradas-------------------->
        <script src="<?php echo base_url('assets/js/jquery-latest.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery-1.9.1.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap-carousel.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/local.js'); ?>"></script>
    </body>
</html>