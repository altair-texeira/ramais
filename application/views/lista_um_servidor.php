<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>servidor: <?php echo' '. @$servidor->nome_servidor;?></title>
        <meta http-equiv="Content-Type" content="text/html" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-responsive.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/prettify.css'; ?>">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/favicon.ico');?>"/>
        <style type="text/css">
            body {padding-top: 60px; padding-bottom: 40px;}
            .sidebar-nav {padding: 9px 0;}
            .fundo-verde {background:green;}
            .texto-verde{ color: green;}
        </style>
    </head>
    <body>
        <div id="navbar" class="navbar navbar-inverse navbar-fixed-top">
            <div id="navbar-inner" class="navbar-inner">
                <div id="container-fluid" class="container-fluid fundo-verde">
                    <a class="brand" href="http://ifc-camboriu.edu.br/"><img src="<?php echo base_url('assets/img/favicon.ico');?>" alt="favicon.ico"></a>
                    <div id="nav" class="nav-collapse collapse" <?php echo @$hide;?>>
                        <ul class="nav">
                            <li><a href="<?php echo base_url('servidores/lista_servidores'); ?>">Servidor</a></li>
                            <li><a href="<?php echo base_url('servidores/incluir'); ?>">Cadastrar servidor</a></li>
                            <li><a href="<?php echo base_url('usuarios/index'); ?>">Usuários</a></li>
                            <li><a href="<?php echo base_url('usuarios/incluir'); ?>">Cadastrar usuario</a></li>
                        </ul>
                    </div><!--id="nav" -->
                    <ul class="nav pull-right">
                        <li><a href="<?php echo base_url('usuarios/lista_um_usuario/'.$id_usuario);?>"><?php echo @$nome_servidor;?></a></li>
                        <li><a href="<?php echo base_url('identificar/deslog'); ?>">Sair</a></li>
                    </ul>
                </div><!--id="container-fluid" -->
            </div><!--id="navbar-inner" -->
        </div><!--id="navbar" -->

<!--tabela  -------------------------->

        <div class="hero-unit">
            <h2 class='texto-verde text-center'>SERVIDOR</h2>
            <h4 class='texto-verde'>Nome:<?php echo' '. @$servidor->nome_servidor;?></h4>
<!--cabecalho------------------------->
            <table class="table table-striped table-bordered">
                <tr class="texto-verde">
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Função</th>
                    <th>Email IFC</th>
                    <th>Email</th>
                    <th>Público</th>
                </tr>
                <?php
                    echo "
                      <tr>
                        <td>{$servidor->id_servidor}</td>" .
                            ( $permissao != "0" ? "
                        <td>
                            <a href=\"" . base_url() ."servidores/alterar/{$servidor->id_servidor}\">{$servidor->nome_servidor}</a>
                        </td>" : "<td>{$servidor->nome_servidor}</td>") . "
                        <td>{$servidor->funcao}</td>
                        <td>{$servidor->email_instituicao}</td>
                        <td>{$servidor->email_pessoal}</td>
                        <td>{$servidor->email_pes_publico}</td>
                      </tr>
                      ";
                ?>
<!-------cabecalho 2------------------------->
                <tr class='texto-verde'>
                    <th>Mensageiro</th>
                    <th>Tipo</th>
                    <th>Público</th>
                    <th>Mensageiro 2</th>
                    <th>Tipo 2</th>
                    <th>Público 2</th>
                </tr>
                <?php
                    echo "
                      <tr>
                        <td>{$servidor->msg_1}</td>
                        <td>{$servidor->tipo_1}</td>
                        <td>{$servidor->msg_1_publico}</td>
                        <td>{$servidor->msg_2}</td>
                        <td>{$servidor->tipo_2}</td>
                        <td>{$servidor->msg_2_publico}</td>
                      </tr>
                      ";
                ?>
<!-------cabecalho 3------------------------->
                <tr class='texto-verde'>
                    <th>Mensageiro 3</th>
                    <th>Tipo 3</th>
                    <th>Público 3</th>
                </tr>
                <?php
                    echo "
                      <tr>
                        <td>{$servidor->msg_3}</td>
                        <td>{$servidor->tipo_3}</td>
                        <td>{$servidor->msg_3_publico}</td>
                      </tr>
                      ";
                ?>
<!--cabecalho 4---------------------------------------->
                <tr class='texto-verde'>
                    <th>Fone</th>
                    <th>Público</th>
                    <th>Celular</th>
                    <th>Operadora</th>
                    <th>Público</th>
                </tr>
                <?php
                    echo "
                      <tr>
                        <td>{$servidor->fone_res}</td>
                        <td>{$servidor->fone_res_publico}</td>
                        <td>{$servidor->fone_movel}</td>
                        <td>{$servidor->operadora}</td>
                        <td>{$servidor->fone_movel_publico}</td>

                      </tr>
                      ";
                ?>
<!--Cabecalho 5--------------------------------->
                <tr class='texto-verde'>
                    <th>Ramal</th>
                    <th>Local</th>
                    <th>Ramal 2</th>
                    <th>Local 2</th>
                    <th>Ramal 3</th>
                    <th>Local 3</th>
                </tr>
                <?php
                    echo "
                      <tr>
                        <td>{$servidor->ramal_1}</td>
                        <td>{$servidor->local_1}</td>
                        <td>{$servidor->ramal_2}</td>
                        <td>{$servidor->local_2}</td>
                        <td>{$servidor->ramal_3}</td>
                        <td>{$servidor->local_3}</td>
                      </tr>
                      ";
                ?>
            </table>
            <div id="excluir">
                <a class="btn" href='#'>Excluir</a>
            </div>
            <a class="btn btn-large btn-primary pull-right" href="<?php echo base_url("servidores/alterar/{$servidor->id_servidor}"); ?>">Alterar</a>
        </div><!--hero-unit-->
<!--footer---------------------->
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
                       href="<?php echo base_url("servidores/excluir/{$servidor->id_servidor}"); ?>">Excluir</a>
            </div><!-- id="modal-body" -->
        </div><!-- id="confirm" -->
<!--js entradas-------------------->
        <script src="<?php echo base_url('assets/js/jquery-latest.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap-carousel.js'); ?>"></script>
        <script>
            $('#excluir').on('click', 'a', function(e){
                e.preventDefault();
                var link = $(this);
                var id = link.attr('data-id');
                $('#confirm').modal('show');
                $('#alert').html('Confirma a exclusão do servidor?');
            });
        </script>
    </body>
</html>