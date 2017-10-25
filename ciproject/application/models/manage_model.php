<?php

  class Manage_model extends CI_Model{
    public function getBookByDep($data){
      $this->db->select('*');
      $this->db->from('tbl_book');
      $this->db->where('dept', $data);
      $qresult = $this->db->get();
      $result = $qresult->result();
      return $result;
    }

    public function addBookIssueData($data){
      $this->db->insert('tbl_issue', $data);
    }

    public function getIssueData(){
      $this->db->select('*');
      $this->db->from('tbl_issue');
      $this->db->order_by('id', 'desc');
      $qresult = $this->db->get();
      $result = $qresult->result();
      return $result;
    }

    public function deleteIssueDataById($Id){
      $this->db->where('id', $Id);
      $this->db->delete('tbl_issue');
    }

    public function getStudentDetailsById($reg){
      $this->db->select('*');
      $this->db->from('tbl_addstdnt');
      $this->db->where('reg', $reg);
      $qresult = $this->db->get();
      $result = $qresult->row();
      return $result;
    }

    public function getBookDetailsById($bookid){
      $this->db->select('*');
      $this->db->from('tbl_book');
      $this->db->where('bookId', $bookid);
      $qresult = $this->db->get();
      $result = $qresult->row();
      return $result;
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
