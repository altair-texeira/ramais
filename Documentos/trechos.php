
	<td><a href=\"" . base_url() .
					"servidores/alterar/{$servidor->id_servidor}\"
		class=\"alterar\">A</a>&nbsp;&nbsp;
		<a href=\"javascript:excluir({$servidor->id_servidor})\"
		class=\"excluir\">E</a>&nbsp;&nbsp;
	</td>
  </tr>
  
  <?php
                        echo form_button(array("name" => "novo", "class" => "btn btn-primary pull-right",
                            "onclick" => "document.location = '" . base_url() .
                            "servidores/incluir'"), " novo");
                        ?>
                        
                        
                        <!--menu esquerda-------------------->
        <div id="content" class="container-fluid">
            <div id="row-fluid" class="row-fluid">
                <div class="span3">
                    <div class="well sidebar-nav">
                        <ul class="nav nav-list">
                            <li class="nav-header">Meu menu</li>                                
                            <li><a data-toggle="modal" href="#slid">Imagens</a></li>
                            <li><a data-toggle="modal" href="#login">Logar</a></li>
                            <li><a href="<?php echo base_url('servidores/incluir'); ?>">Novo</a></li>
                            <li class="nav-header">Sidebar li class="nav-header"</li>
                            <li><a href="#">I </a></li>
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                        </ul>
                    </div><!--well -->
                </div><!-- "span3" -->
                
                <!--Modal imagens-------------------------->
            <div id="slid" class="modal hide fade" tabindex="-1" role="dialog" 
                 aria-labelledby="loginLabel" aria-hidden="true">
                <div id="slid-header" class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h3 id="slidLabel">slideshow</h3>							
                </div><!-- id="modal-header" -->
                <div id="modal-body" class="modal-body">
                    <div id="myCarousel" class="carousel slide">
                        <!-- Itens de carousel -->
                        <div class="carousel-inner">
                            <div class="active item"><img src="assets/img/img1.jpg" alt="img1,jpg"></div>
                            <div class="item"><img src="assets/img/img2.jpg" alt="img2.jpg"></div>
                            <div class="item"><img src="assets/img/img3.jpg" alt="img3.jpg"></div>
                            <div class="item"><img src="assets/img/img4.jpg" alt="img4.jpg"></div>
                        </div>
                        <!-- Navegador do carousel -->
                        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                        <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                    </div><!-- id="myCarousel" -->						
                </div><!-- id="modal-body" -->
                <div id="modal-footer" class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
                </div><!-- id="modal-footer" -->
            </div><!-- id="slid" -->
        </div><!-- id="content" -->
        
        <div id="navbar" class="navbar navbar-inverse navbar-fixed-top">
            <div id="navbar-inner" class="navbar-inner">
                <div id="container-fluid" class="container-fluid">
                    <a class="brand" href="http://ifc-camboriu.edu.br/">GEATI</a>
                    <div id="nav" class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li><a data-toggle="modal" href="<?php echo base_url('usuarios/login'); ?>""#login">Entrar</a></li>
                        </ul>
                    </div><!--id="nav" -->
                </div><!--id="container-fluid" -->	
            </div><!--id="navbar-inner" -->		
        </div><!--id="navbar" -->
