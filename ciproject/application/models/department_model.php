<?php

  class Department_model extends CI_Model{

    public function addDepartmerntData($data){
      $this->db->insert('tbl_dept', $data);
    }

    public function getDepartmentData(){
      $this->db->select('*');
      $this->db->from('tbl_dept');
      $this->db->order_by('dId', 'desc');
      $qresult = $this->db->get();
      $result = $qresult->result();
      return $result;
    }

    public function getDepartmentById($id){
      $this->db->select('*');
      $this->db->from('tbl_dept');
      $this->db->where('dId', $id);
      $qresult = $this->db->get();
      $result = $qresult->row();
      return $result;
    }

    public function updateDeptById($data){
      $this->db->set('dept', $data['dept']);
      $this->db->where('dId', $data['dId']);
      $result = $this->db->update('tbl_dept');
      return $result;
    }

    public function deleteDeptById($id){
      $this->db->where('dId', $id);
      $this->db->delete('tbl_dept');
    }

    public function getDepartment($dpid){
      $this->db->select('*');
      $this->db->from('tbl_dept');
      $this->db->where('dId', $dpid);
      $qresult = $this->db->get();
      $result = $qresult->row();
      return $result;
    }
}
