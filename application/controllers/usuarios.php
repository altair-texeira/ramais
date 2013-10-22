<?php
class Usuarios extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Model_usuarios');
        $this->load->model('Model_servidores');
        $this->load->library('session');
        $this->load->helper('url');  
    }
    
     private function logado() {
        if ($this->session->userdata('logged_in')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    private function carregar_menu() {
        $dados['modal_hide'] = 'modal hide fade';
        if (!$this->logado()) {
            $dados['id_usuario'] = '#login';
            $dados['hide'] = 'hide';
            $dados['nome_servidor'] = 'Entrar';
            return $dados;
        } else {
            $dados['id_usuario'] = $this->session->userdata('id_usuario');
            $dados['nome_servidor'] = $this->session->userdata('nome_servidor');
            $dados['permissao'] = $this->session->userdata('permissao');
            $dados['hide'] = '';

            return $dados;
        }
    }

    public function index() {
        $dados = $this->carregar_menu();
        $dados['usuarios'] = $this->Model_usuarios->listar();
        $this->load->view('lista_usuarios', $dados);            
    }
    
     
    public function incluir() {
        $dados = $this->carregar_menu();
        $dados['servidores'] = $this->Model_servidores->listar();
        $dados['titulo'] = 'Cadastro';
        $this->load->view('form_usuarios', $dados);
    }
    
    public function lista_um_usuario ($id_usuario){
        $dados = $this->carregar_menu();
            $dados['usuario'] = $this->Model_usuarios->recuperar($id_usuario);
            $dados['servidores'] = $this->Model_servidores->listar();
            $this->load->view('lista_um_usuario', $dados);      
        
    }
    
    public function alterar($id_usuario) {
        $dados = $this->carregar_menu();
        $dados['servidores'] = $this->Model_servidores->listar();
        $dados['usuario'] = $this->Model_usuarios->recuperar($id_usuario);
        $dados['titulo'] = 'Alterar';
        $this->load->view('form_usuarios', $dados);
    }
    
     public function gravar() {
        $dados['id_usuario'] = $this->input->post('id_usuario');
        $dados['id_servidor'] = $this->input->post('id_servidor');
        $dados['nome_servidor'] = $this->input->post('nome_servidor');
        $dados['login'] = $this->input->post('login');
        $dados['senha'] = $this->input->post('senha');
        $dados['lembrete'] = $this->input->post('lembrete');
        $dados['permissao'] = $this->input->post('permissao');
        if ( $dados['id_usuario'] ) { // alteração
          $consulta = $this->Model_usuarios->atualizar($dados,
                  $dados['id_usuario']);
        }
        else { // inclusão 
            $consulta = $this->Model_usuarios->inserir($dados);      
        }
            redirect("usuarios");
    }
    
     public function excluir($id) {
        if ( $this->Model_usuarios->excluir($id) ) {
          $this->session->set_userdata(array('mensagem' =>
              'Registro excluído com sucesso.'));
        }
        else {
          $this->session->set_userdata(array('mensagem' =>
              'Não foi possível excluir.'));
        }

        redirect("usuarios");
      }
}
?>
