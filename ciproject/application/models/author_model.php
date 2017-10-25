<?php

  class Author_model extends CI_Model{

    public function addAuthorData($data){
      $this->db->insert('tbl_author', $data);
    }

    public function getAuthorData(){
      $this->db->select('*');
      $this->db->from('tbl_author');
      $this->db->order_by('aId', 'desc');
      $qresult = $this->db->get();
      $result = $qresult->result();
      return $result;
    }

    public function getAuthorById($id){
      $this->db->select('*');
      $this->db->from('tbl_author');
      $this->db->where('aId', $id);
      $qresult = $this->db->get();
      $result = $qresult->row();
      return $result;
    }

    public function updateAthrById($data){
      $this->db->set('author', $data['author']);
      $this->db->where('aId', $data['aId']);
      $result = $this->db->update('tbl_author');
      return $result;
    }

    public function deleteAthrById($id){
      $this->db->where('aId', $id);
      $this->db->delete('tbl_author');
    }

    public function getAuthor($athrid){
      $this->db->select('*');
      $this->db->from('tbl_author');
      $this->db->where('aId', $athrid);
      $qresult = $this->db->get();
      $result = $qresult->row();
      return $result;
    }
  }
