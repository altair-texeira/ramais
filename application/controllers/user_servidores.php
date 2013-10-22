<?php
/**
 * Trabalha com o servidor cadastrado que acessa o sistema.
 * Pode visualizar tudo que for publico.
 * @author altair
 */
class User_servidores extends CI_Controller{
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
            $dados['hide'] = 'hide';
            return $dados;
        }
    }

     private function restricao_dados($id){
         $servidor = $this->Model_servidores->recuperar($id);
         var_dump($servidor->fone_res_publico);
        if ($this->session->userdata('permissao') != 'a'){
            switch ($this->session->userdata('id_servidor') != $id){
                case $servidor->email_pes_publico == '1' :
                    $servidor->email_pessoal = 'Privado';
                    $servidor->email_pes_publico = 'Privado';
                case $servidor->msg_1_publico == '1':
                    $servidor->msg_1 = 'Privado';
                    $servidor->tipo_1 = 'Privado';
                    $servidor->msg_1_publico = 'Privado';
                case $servidor->msg_2_publico == '1':
                    $servidor->msg_2 = 'Privado';
                    $servidor->tipo_2 = 'Privado';
                    $servidor->msg_2_publico = 'Privado';
                case $servidor->msg_3_publico == '1':
                    $servidor->msg_3 = 'Privado';
                    $servidor->tipo_3 = 'Privado';
                    $servidor->msg_3_publico = 'Privado';
                case $servidor->fone_res_publico == '1':
                    $servidor->fone_res = 'Privado';
                    $servidor->fone_res_publico = 'Privado';
                case $servidor->fone_movel_publico =='1' :
                    $servidor->fone_movel = 'Privado';
                    $servidor->operadora = 'Privado';
                    $servidor->fone_movel_publico = 'Privado';
            };
            return $servidor;
        }  else {
            return $servidor;
        }
    }
    public function user_index() {
        $dados = $this->carregar_menu();
        $dados['servidores'] = $this->Model_servidores->listar();
        $this->load->view('index', $dados);
    }

    public function user_lista_servidores() {
        $dados = $this->carregar_menu();
        $dados['servidores'] = $this->Model_servidores->listar();
        $this->load->view('user/user_lista_servidores', $dados);
    }

    public function user_lista_um_servidor ($id){
        $dados = $this->carregar_menu();
        $dados['servidor'] = $this->restricao_dados($id);
        $this->load->view('user/user_lista_um_servidor', $dados);
    }

}

?>
