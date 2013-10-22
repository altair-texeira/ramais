<?php

class Identificar extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Model_usuarios');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
    }

    public function index(){
        if ($entrada = $this->input->post()){
            //Testa login do usuario no banco e retorna demais dados
            $dados['recuperado'] = $this->Model_usuarios->recuperar_login($entrada);

            //verifica se encontrou o login do usuario
            if ($dados['recuperado']!= NULL){
                //funçao para testar a igualdade e retornar erros
                $this->testa_senha($entrada, $dados);
            }
            else{
                $dados['msg_error'] = 'Usuário incorreto.';
                $dados['modal_hide'] = 'modal';
                $dados['hide'] = 'hide';
                $dados['classe_error'] = 'text-error';
                $dados['login'] = $entrada['login'];
                $this->load->view('lista_servidores', $dados);
            }

        } else{//se os dados nao chegaram da view
            $dados['msg_error'] = 'Dados não recebidos.';
            $dados['modal_hide'] = 'modal';
            $dados['hide'] = 'hide';
            $dados['classe_error'] = 'text-error';
            $this->load->view('lista_servidores', $dados);
        }
    }

    private function testa_senha($entrada,$dados){
        $recuperado = $dados['recuperado'];
        if ($recuperado->senha != $entrada['senha']){
            $dados['msg_error'] = 'Senha incorreta.';
            $dados['modal_hide'] = 'modal';
            $dados['hide'] = 'hide';
            $dados['classe_error'] = 'text-error';
            $dados['login'] = $entrada['login'];
            $this->load->view('lista_servidores', $dados);
        }  else {
            $logado = array(
               'id_usuario' => $recuperado->id_usuario,
               'id_servidor' => $recuperado->id_servidor,
               'nome_servidor' => $recuperado->nome_servidor,
               'login' => $recuperado->login,
               'senha' => $recuperado->senha,
               'permissao' => $recuperado->permissao,
               'hide'   => '',
               'modal_hide' => 'modal hide fade',
               'logged_in' => TRUE
           );
           $this->session->set_userdata($logado);
            //redireciona para tela
           if ($recuperado->permissao != 'a'){
               redirect('user_servidores/user_lista_servidores');
//               redirect('usuarios/lista_um_usuario/'.$recuperado->id_usuario);
           }else{
               redirect('usuarios/lista_um_usuario/'.$recuperado->id_usuario);
//               redirect('user_servidores/lista_servidores');
           }

        }
    }

    public function deslog(){
        $this->session->sess_destroy();
        redirect('servidores');
    }
}