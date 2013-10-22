<?php
/**
 * Mostra a view do visitante, que é somente o nome
 * do servidor e os ramais a ele cadastrados.
 * Trabalha com o servidor administrador do sistema.
 * Pode visualizar, criar e editar tudo.
 *
 * @author altair
 */
class Servidores extends CI_Controller {
    public function __construct() {
        parent::__construct();
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

     public function carregar_menu() {
        $dados['modal_hide'] = 'modal hide fade';
        if (!$this->logado()) {
            $dados['id_usuario'] = '#login';
            $dados['hide'] = 'hide';
            $dados['nome_servidor'] = 'Entrar';
            return $dados;
        } else {
            $dados['id_usuario'] = $this->session->userdata('id_usuario');
            $dados['id_servidor'] = $this->session->userdata('id_servidor');
            $dados['permissao'] = $this->session->userdata('permissao');
            $dados['nome_servidor'] = $this->session->userdata('login');
            $dados['hide'] = '';
            return $dados;
        }
    }

    public function index() {
        $dados = $this->carregar_menu();        
        $dados['servidores'] = $this->Model_servidores->listar();
        //ordenar
        
        $this->load->view('index', $dados);
    }

    public function lista_servidores() {
        $dados = $this->carregar_menu();
        $dados['servidores'] = $this->Model_servidores->listar();
        $this->load->view('lista_servidores', $dados);
    }

    public function lista_um_servidor ($id){
        $dados = $this->carregar_menu();
        $dados['servidor'] = $this->Model_servidores->recuperar($id);
        $this->load->view('lista_um_servidor', $dados);
    }
    
     public function incluir() {
        $dados = $this->carregar_menu();
        $dados['titulo'] = 'Cadastro';
        $this->load->view('form_servidores', $dados);
    }

    public function alterar($id) {
        $dados = $this->carregar_menu();
        $dados['titulo'] = 'Alterar';
        $dados['servidor'] = $this->Model_servidores->recuperar($id);
        $this->load->view('form_servidores', $dados);
    }

    public function gravar() {
        $dados = $this->input->post();
    if ( $this->input->post('id_servidor') ) { // alteração
      $consulta = $this->Model_servidores->atualizar($dados,
              $this->input->post('id_servidor'));
    }
    else { // inclusão
      $consulta = $this->Model_servidores->inserir($dados);
    }
	redirect("servidores/lista_servidores");
}

  public function excluir($id) {
    if ( $this->Model_servidores->excluir($id) ) {
      $this->session->set_userdata(array('mensagem' =>
          'Registro excluído com sucesso.'));
    }
    else {
      $this->session->set_userdata(array('mensagem' =>
          'Não foi possível excluir.'));
    }
    redirect("servidores/lista_servidores");
  }
}
