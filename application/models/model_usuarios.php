<?php

class Model_usuarios extends CI_Model
{
    public function listar() {
        $query = $this->db->get('usuario');
        return $query->result();
   }

   //-------------------------------------
   public function recuperar_login($dados) {
      $this->db->where('login' , $dados['login']);
      $query = $this->db->get('usuario');
      return $query->row();
  }

  //---------------------------------------
  public function recuperar($id) {
      $this->db->where('id_usuario', $id);
      $query = $this->db->get('usuario');
      return $query->row();
  }

  public function inserir($dados) {
      return $this->db->insert('usuario', $dados);
  }

  public function atualizar($dados, $id) {
    $this->db->where('id_usuario', $id);
    return $this->db->update('usuario', $dados);
  }

  public function excluir($id) {
    $this->db->where('id_usuario', $id);
    return $this->db->delete('usuario');
  }
}

