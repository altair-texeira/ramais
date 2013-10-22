<?php

class Model_servidores extends CI_Model
{
    public function listar() {
        $query = $this->db->order_by('nome_servidor', 'ASC')->get('servidor');
        return $query->result();
   }

  public function recuperar($id) {
      $this->db->where('id_servidor', $id);
      $query = $this->db->get('servidor');
      return $query->row();
  }
  
  public function inserir($dados) {
      return $this->db->insert('servidor', $dados);
  }

  public function atualizar($dados, $id) {
    $this->db->where('id_servidor', $id);
    return $this->db->update('servidor', $dados);
  }

  public function excluir($id) {
    $this->db->where('id_servidor', $id);
    return $this->db->delete('servidor');
  }
  public function ultimo_id() {
    return $this->db->insert_id();
  }
  
  //temporario
  public function recuperar_id($nome) {
      $this->db->where('nome_servidor', $nome);
      $query = $this->db->get('servidor');
      return $query->row();
  }
}



