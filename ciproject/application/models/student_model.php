<?php

  class Student_model extends CI_Model{

    public function addStudentData($data){
      $this->db->insert('tbl_addstdnt', $data);
    }

    public function getStudentData(){
      $this->db->select('*');
      $this->db->from('tbl_addstdnt');
      $this->db->order_by('sId', 'desc');
      $qresult = $this->db->get();
      $result = $qresult->result();
      return $result;
    }

    public function getStudentById($sId){
      $this->db->select('*');
      $this->db->from('tbl_addstdnt');
      $this->db->where('sId', $sId);
      $qresult = $this->db->get();
      $result = $qresult->row();
      return $result;
    }

    public function updateStudentData($data){
      $this->db->set('name', $data['name']);
      $this->db->set('dept', $data['dept']);
      $this->db->set('roll', $data['roll']);
      $this->db->set('reg', $data['reg']);
      $this->db->set('phone', $data['phone']);
      $this->db->where('sId', $data['sId']);
      $result = $this->db->update('tbl_addstdnt');
      return $result;
    }

    public function deleteStudentDataById($sId){
      $this->db->where('sId', $sId);
      $this->db->delete('tbl_addstdnt');
    }

  }


?>
