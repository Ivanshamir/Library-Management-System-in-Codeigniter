<?php

  class User_model extends CI_Model{
    public function checkUserLogin($data){
      $this->db->select('*');
      $this->db->from('tbl_user');
      $this->db->where('username', $data['username']);
      $this->db->where('password', md5($data['password']));
      $qresult = $this->db->get();
      $value = $qresult->num_rows();
      if ($value === 1) {
        $result = $qresult->row();
        return $result;
      }
    }
}
