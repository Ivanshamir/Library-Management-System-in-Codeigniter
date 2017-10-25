<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('book_model');
    $this->load->model('department_model');
    $this->load->model('author_model');
    $data = array();
  }

  public function addbook(){
    $data['title'] = 'Add New Book';
    $data['header'] = $this->load->view('inc/header', $data, TRUE);
    $data['sidebar'] = $this->load->view('inc/sidebar', '', TRUE);
    $data['getdept'] = $this->department_model->getDepartmentData();
    $data['getauthr'] = $this->author_model->getAuthorData();
    $data['content'] = $this->load->view('inc/bookadd', $data, TRUE);
    $data['footer'] = $this->load->view('inc/footer', '', TRUE);
    $this->load->view('home', $data);
  }

  public function addBookForm(){
    $data['bookname'] = $this->input->post('bookname');
    $data['dept'] = $this->input->post('dept');
    $data['author'] = $this->input->post('author');
    $data['stock'] = $this->input->post('stock');

    $bookname = $data['bookname'];
    $dept = $data['dept'];
    $author = $data['author'];
    $stock = $data['stock'];

    if (empty($bookname) && empty($dept) && empty($roll) && empty($stock)) {
      $sdata = array();
      $sdata['msg'] = '<span style="color:red">Field must not be empty</span>';
      $this->session->set_flashdata($sdata);
      redirect("book/addbook");
    }else{
      $this->book_model->addBookData($data);
      $sdata = array();
      $sdata['msg'] = '<span style="color:green">Book Data Add Successfully</span>';
      $this->session->set_flashdata($sdata);
      redirect("book/addbook");
    }
  }

  public function booklist(){
    $data['title'] = 'Book List';
    $data['header'] = $this->load->view('inc/header', $data, TRUE);
    $data['sidebar'] = $this->load->view('inc/sidebar', '', TRUE);
    $data['getbook'] = $this->book_model->getBookData();
    $data['content'] = $this->load->view('inc/listbook', $data, TRUE);
    $data['footer'] = $this->load->view('inc/footer', '', TRUE);
    $this->load->view('home', $data);
  }

  public function editbook($bookid){
    $data['title'] = 'Update Book Data';
    $data['header'] = $this->load->view('inc/header', $data, TRUE);
    $data['sidebar'] = $this->load->view('inc/sidebar', '', TRUE);
    $data['getdept'] = $this->department_model->getDepartmentData();
    $data['getathr'] = $this->author_model->getAuthorData();
    $data['bookbyid'] = $this->book_model->getBookById($bookid);
    $data['content'] = $this->load->view('inc/bookedit', $data, TRUE);
    $data['footer'] = $this->load->view('inc/footer', '', TRUE);
    $this->load->view('home', $data);
  }

  public function updateBookById(){
    $data['bookId'] = $this->input->post('bookId');
    $data['bookname'] = $this->input->post('bookname');
    $data['dept'] = $this->input->post('dept');
    $data['author'] = $this->input->post('author');
    $data['stock'] = $this->input->post('stock');

    $bookId = $data['bookId'];
    $bookname = $data['bookname'];
    $dept = $data['dept'];
    $author = $data['author'];
    $stock = $data['stock'];

    if (empty($bookname) || empty($dept) || empty($author) || empty($stock)) {
      $sdata = array();
      $sdata['msg'] = '<span style="color:red">Field must not be empty</span>';
      $this->session->set_flashdata($sdata);
      redirect("book/editbook/".$bookId);
    }else{
      $this->book_model->updateBookData($data);
      $sdata = array();
      $sdata['msg'] = '<span style="color:green">Book Data Update Successfully</span>';
      $this->session->set_flashdata($sdata);
      redirect("book/editbook/".$bookId);
    }
  }

  public function delbook($bookid){
    $this->book_model->deleteBookDataById($bookid);
    $sdata = array();
    $sdata['msg'] = '<span style="color:green">Book Data Deleted Successfully</span>';
    $this->session->set_flashdata($sdata);
    redirect("book/booklist");
  }
}
