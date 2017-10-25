<?php

  class Book_model extends CI_Model{
      public function addBookData($data){
        $this->db->insert('tbl_book', $data);
      }

      public function getBookData(){
        $this->db->select('*');
        $this->db->from('tbl_book');
        $this->db->order_by('bookId', 'desc');
        $qresult = $this->db->get();
        $result = $qresult->result();
        return $result;
      }

      public function getBookById($bookid){
        $this->db->select('*');
        $this->db->from('tbl_book');
        $this->db->where('bookId', $bookid);
        $qresult = $this->db->get();
        $result = $qresult->row();
        return $result;
      }

      public function updateBookData($data){
        $this->db->set('bookname', $data['bookname']);
        $this->db->set('dept', $data['dept']);
        $this->db->set('author', $data['author']);
        $this->db->set('stock', $data['stock']);
        $this->db->where('bookId', $data['bookId']);
        $result = $this->db->update('tbl_book');
        return $result;
      }

      public function deleteBookDataById($bookid){
        $this->db->where('bookId', $bookid);
        $this->db->delete('tbl_book');
      }
  }
