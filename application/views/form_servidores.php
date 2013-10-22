<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>cadastrar/alterar:<?php echo' '. @$servidor->nome_servidor;?></title>
        <meta http-equiv="Content-Type" content="text/html" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-responsive.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/prettify.css'; ?>">
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
                        <a class="brand" href="http://ifc-camboriu.edu.br/"><img src="<?php echo base_url().'assets/img/favicon.ico'; ?>" alt="favicon.ico"></a>
                        <div id="nav" class="nav-collapse collapse <?php echo @$hide;?>">
                            <ul class="nav">
                                <li><a href="<?php echo base_url('servidores/lista_servidores'); ?>">Servidores</a></li>
                                <li><a href="<?php echo base_url('servidores/incluir'); ?>">Cadastrar servidor</a></li>
                                <li><a href="<?php echo base_url('usuarios/index'); ?>">Usuários</a></li>
                                <li><a href="<?php echo base_url('usuarios/incluir'); ?>">Cadastrar usuario</a></li>
                            </ul>
                        </div><!--id="nav" -->
             <!--.....................-->
                            <ul class="nav pull-right">
                                <li><a href="<?php echo base_url('usuarios/lista_um_usuario/'.$id_usuario);?>"><?php echo @$nome_servidor;?></a></li>
                                <li><a href="<?php echo base_url('identificar/deslog'); ?>">Sair</a></li>
                            </ul>
                    </div><!--id="container-fluid" -->
                </div><!--id="navbar-inner" -->
            </div><!--id="navbar" -->
<!--.....container............................................-->
            <div id="container" class="container texto-verde">
                <div id="row-fluid" class="row-fluid">
                    <div class="span12">
                        <div class="well">
                            <h2 class="text-center">SERVIDOR</h2>
                            <h4><?php echo @$titulo;?></h4>
                        </div><!--hero-unit-->

            <!--.............form......-->
                            <form method="post" action="<?php echo base_url('servidores/gravar'); ?>"/>
                            <fieldset>
                                <legend><?php echo @$titulo;?></legend>
                                <div id="row" class="row">
            <!--....nome/email......-->
                                    <div id="nome_email" class="span3">
                   <!--....id ......--><input type="hidden" name="id_servidor"
                                                value="<?php echo @$servidor->id_servidor; ?>"/>

                   <!--....nome  ....--><label>Nome:</label>
                                        <input type="text" placeholder="Nome do servidor"
                                               name="nome_servidor" size="50"
                                               value="<?php echo @$servidor->nome_servidor; ?>" required>

                   <!--....funcao  ....--><label>Função:</label>
                                        <input type="text" placeholder="Função do servidor"
                                               name="funcao" size="20"
                                               value="<?php echo @$servidor->funcao; ?>">
           <!--.email..............-->
                                       <div class="control-group">
                 <!--.email instituicao--><label class="control-label" for="inputIcon">Email institucional:</label>
                                          <div class="controls">
                                            <div class="input-prepend">
                                              <span class="add-on"><i class="icon-envelope"></i></span>
                                              <input id="inputIcon" type="text"
                                                     placeholder="nome@ifc-camboriu.edu.br"
                                                     name="email_instituicao" size="50"
                                                     value="<?php echo @$servidor->email_instituicao; ?>">
                                            </div>
                                          </div>
                                        </div>
                 <!--.............-->
                                        <div class="control-group">
                 <!--.email pessoal ...--><label class="control-label" for="inputIcon">Email Pessoal:</label>
                                          <div class="controls">
                                            <div class="input-prepend">
                                              <span class="add-on"><i class="icon-envelope"></i></span>
                                              <input id="inputIcon" type="text"
                                                     placeholder="nome@site.com.br"
                                                     name="email_pessoal" size="50"
                                                     value="<?php echo @$servidor->email_pessoal; ?>">
                                            </div><!--class="input-prepend"-->
                                          </div><!--class="controls"-->
                                        </div><!--class="control-group"-->
                                        <label class="checkbox inline">
                                          <input type="checkbox" id="inlineCheckbox1" name="email_pes_publico" value="<?php echo
                                             ($servidor->email_pes_publico != "0" ? "0" : @$servidor->email_pes_publico); ?>">Publico
                                        </label>
                                        <label class="checkbox inline">
                                          <input type="checkbox" id="inlineCheckbox2" name="email_pes_publico" value="<?php echo
                                             ($servidor->email_pes_publico != "1" ? "1" : @$servidor->email_pes_publico); ?>"> Privado
                                        </label>
                                    </div><!--id="nome_email"-->
            <!--...........msg.........-->
                                    <div id="msg" class="span3">
                                        <div class="control-group">
                  <!--.msg 1...........--><label class="control-label" for="inputIcon">Mensagem instantânea:</label>
                                          <div class="controls">
                                            <div class="input-prepend">
                                              <span class="add-on"><i class="icon-user"></i></span>
                                              <input id="inputIcon" type="text"
                                                     placeholder="Nome de usuário"
                                                     name="msg_1" size="15"
                                                     value="<?php echo @$servidor->msg_1; ?>">
                                            </div><!--class="input-prepend"-->
                                          </div><!--class="controls"-->
                                        </div><!--class="control-group"-->

                  <!--.tipo msg 1....--><label>Tipo de mensageiro:</label>
                                        <input type="text" placeholder="Facebook, Skype, Twitter ... "
                                               name="tipo_1" size="15"
                                               value="<?php echo @$servidor->tipo_1; ?>">

                  <!--.msg 1 publico.--><label class="checkbox inline">
                                          <input type="checkbox" id="inlineCheckbox1" name="msg_1_publico" value="<?php echo
                                             ($servidor->msg_1_publico != "0" ? "0" : @$servidor->msg_1_publico); ?>">Publico
                                        </label>
                                        <label class="checkbox inline">
                                          <input type="checkbox" id="inlineCheckbox2" name="msg_1_publico" value="<?php echo
                                             ($servidor->msg_1_publico != "1" ? "1" : @$servidor->msg_1_publico); ?>"> Privado
                                        </label>
                                         </br>
                                        <a href="#msg_2" data-toggle="modal">Segundo</a>
                                        <a href="#msg_3" data-toggle="modal" class="pull-centered">Terceiro</a>
            <!--...Modal msg_2 .................-->
                                        <div id="msg_2" class="modal hide " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                                          <div class="modal-body">
                                              <div class="control-group">
                                          <label class="control-label" for="inputIcon">Mensagem instantânea:</label>
                                          <div class="controls">
                                            <div class="input-prepend">
                                              <span class="add-on"><i class="icon-user"></i></span>
                                              <input id="inputIcon" type="text"
                                                     placeholder="Nome de usuário"
                                                     name="msg_2" size="15"
                                                     value="<?php echo @$servidor->msg_2; ?>">
                                            </div><!--class="input-prepend"-->
                                          </div><!--class="controls"-->
                                        </div><!--class="control-group"-->
                                        <!--................-->
                                            <label>Tipo de mensageiro:</label>
                                            <input type="text" placeholder="Facebook, Skype, Twitter ... "
                                               name="tipo_2" size="15"
                                               value="<?php echo @$servidor->tipo_2; ?>">
                                            <label class="checkbox inline">
                                              <input type="checkbox" id="inlineCheckbox1" name="msg_2_publico" value="<?php echo
                                                 ($servidor->msg_2_publico != "0" ? "0" : @$servidor->msg_2_publico); ?>">Publico
                                            </label>
                                            <label class="checkbox inline">
                                              <input type="checkbox" id="inlineCheckbox2" name="msg_2_publico" value="<?php echo
                                                 ($servidor->msg_2_publico != "1" ? "1" : @$servidor->msg_2_publico); ?>"> Privado
                                            </label>
                                          </div>
                                          <div class="modal-footer">
                                              <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Fechar</button>
                                              <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Salvar</button>
                                          </div>
                                        </div><!--msg_2-->
            <!--........Modal msg_3 ..........-->
                                        <div id="msg_3" class="modal hide " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                                          <div class="modal-body">
                                              <div class="control-group">
                                                  <label class="control-label" for="inputIcon">Mensagem instantânea 3:</label>
                                                  <div class="controls">
                                                    <div class="input-prepend">
                                                      <span class="add-on"><i class="icon-user"></i></span>
                                                      <input id="inputIcon" type="text"
                                                             placeholder="Nome de usuário"
                                                             name="msg_3" size="15"
                                                             value="<?php echo @$servidor->msg_3; ?>">
                                                    </div><!--class="input-prepend"-->
                                                  </div><!--class="controls"-->
                                                </div><!--class="control-group"-->
                                                <!--................-->
                                            <label>Tipo de mensageiro:</label>
                                            <input type="text" placeholder="Facebook, Skype, Twitter ... "
                                               name="tipo_3" size="15"
                                               value="<?php echo @$servidor->tipo_3; ?>">
                                            <label class="checkbox inline">
                                              <input type="checkbox" id="inlineCheckbox1" name="msg_3_publico" value="<?php echo
                                                 ($servidor->msg_3_publico != "0" ? "0" : @$servidor->msg_3_publico); ?>">Publico
                                            </label>
                                            <label class="checkbox inline">
                                              <input type="checkbox" id="inlineCheckbox2" name="msg_3_publico" value="<?php echo
                                                 ($servidor->msg_3_publico != "1" ? "1" : @$servidor->msg_3_publico); ?>"> Privado
                                            </label>
                                          </div>
                                          <div class="modal-footer">
                                            <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Fechar</button>
                                            <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Salvar</button>
                                          </div>
                                        </div><!--msg_3-->
                                    </div><!--msg-->
              <!--........Fones.........-->
                                    <div id="fone_res" class="span3">
                                        <label>Fone residencial:</label>
                                        <input type="text" placeholder="00-12341234"
                                               name="fone_res" size="12"
                                               value="<?php echo @$servidor->fone_res; ?>">
                                        <label class="checkbox inline">
                                          <input type="checkbox" id="inlineCheckbox1" name="fone_res_publico" value="<?php echo
                                             ($servidor->fone_res_publico != "0" ? "0" : @$servidor->fone_res_publico); ?>">Publico
                                        </label>
                                        <label class="checkbox inline">
                                          <input type="checkbox" id="inlineCheckbox2" name="fone_res_publico" value="<?php echo
                                             ($servidor->fone_res_publico != "1" ? "1" : @$servidor->fone_res_publico); ?>"> Privado
                                        </label>
                                        <!--................-->
                                        <label>Fone móvel:</label>
                                        <input type="text" placeholder="00-12341234"
                                               name="fone_movel" size="12"
                                               value="<?php echo @$servidor->fone_movel; ?>">
                                        <label>Operadora:</label>
                                        <input type="text" placeholder="claro, oi, tim, vivo..."
                                               name="operadora" size="12"
                                               value="<?php echo @$servidor->operadora; ?>">
                                        <label class="checkbox inline">
                                          <input type="checkbox" id="inlineCheckbox1" name="fone_movel_publico" value="<?php echo
                                             ($servidor->fone_movel_publico != "0" ? "0" : @$servidor->fone_movel_publico); ?>">Publico
                                        </label>
                                        <label class="checkbox inline">
                                          <input type="checkbox" id="inlineCheckbox2" name="fone_movel_publico" value="<?php echo
                                             ($servidor->fone_movel_publico != "1" ? "1" : @$servidor->fone_movel_publico); ?>"> Privado
                                        </label>
                                    </div><!--id="fone_res"-->
              <!--....ramal........................-->
                                    <div id="ramal_1" class="span3">
                                        <label>Ramal:</label>
                                        <input type="text" placeholder="xxxx..."
                                               name="ramal_1" size="12"
                                               value="<?php echo @$servidor->ramal_1; ?>">
                                        <label>Local do ramal:</label>
                                        <input type="text" placeholder="Sala tal, matadouro, secretaria..."
                                               name="local_1" size="20"
                                               value="<?php echo @$servidor->local_1; ?>">
                                        <a href="#ramal_2" data-toggle="modal">Segundo</a>
                                        <a href="#ramal_3" data-toggle="modal" class="pull-centered">Terceiro</a>
                                    </div><!--id="ramal_1"-->
             <!--...Modal ramal_2 .................-->
                                        <div id="ramal_2" class="modal hide " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                                          <div class="modal-body">
                                              <label>Ramal 2:</label>
                                        <input type="text" placeholder="xxxx..."
                                               name="ramal_2" size="12"
                                               value="<?php echo @$servidor->ramal_2; ?>">
                                        <label>Local do ramal:</label>
                                        <input type="text" placeholder="Sala tal, matadouro, secretaria..."
                                               name="local_2" size="20"
                                               value="<?php echo @$servidor->local_2; ?>">
                                          </div>
                                          <div class="modal-footer">
                                            <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Salvar</button>
                                          </div>
                                        </div><!--ramal_2-->
             <!--....Modal ramal_3 .................-->
                                        <div id="ramal_3" class="modal hide " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                                          <div class="modal-body">
                                              <label>Ramal 3:</label>
                                        <input type="text" placeholder="xxxx..."
                                               name="ramal_3" size="12"
                                               value="<?php echo @$servidor->ramal_3; ?>">
                                        <label>Local do ramal:</label>
                                        <input type="text" placeholder="Sala tal, matadouro, secretaria..."
                                               name="local_3" size="20"
                                               value="<?php echo @$servidor->local_3; ?>">
                                          </div>
                                          <div class="modal-footer">
                                            <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Salvar</button>
                                          </div>
                                        </div><!--ramal_3-->
              <!--............................-->
                                </div><!--row-->
                                <input class="btn btn-primary pull-right" type="submit" value="Gravar"/>
                            </fieldset>

                            </form>
                    </div><!--span12-->
                </div><!-- id="row-fluid" -->
            </div><!-- id="container" -->
<!--footer---------------------->
        <div class="navbar-fixed-bottom">
            <footer>
                <p class="pull-right texto-verde">IFC-GEATI-Altair</p>
            </footer>
        </div>
            <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-latest.js'); ?>"></script>
            <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
            <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-carousel.js'); ?>"></script>

            <script>
                    //script aqui

            </script>
    </body>
</html>