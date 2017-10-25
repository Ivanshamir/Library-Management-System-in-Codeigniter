<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('author_model');
    $data = array();
  }

  public function addauthor(){
    $data['title'] = 'Add New Author';
    $data['header'] = $this->load->view('inc/header', $data, TRUE);
    $data['sidebar'] = $this->load->view('inc/sidebar', '', TRUE);
    $data['content'] = $this->load->view('inc/authoradd', $data, TRUE);
    $data['footer'] = $this->load->view('inc/footer', '', TRUE);
    $this->load->view('home', $data);
  }

  public function addAuthorForm(){
    $data['author'] = $this->input->post('author');
    $author = $data['author'];
    if (empty($author)) {
      $sdata = array();
      $sdata['msg'] = '<span style="color:red">Field must not be empty</span>';
      $this->session->set_flashdata($sdata);
      redirect("author/addauthor");
    }else{
      $this->author_model->addAuthorData($data);
      $sdata = array();
      $sdata['msg'] = '<span style="color:green">Author Add Successfully</span>';
      $this->session->set_flashdata($sdata);
      redirect("author/addauthor");
    }
  }

  public function authorlist(){
    $data['title'] = 'Author List';
    $data['header'] = $this->load->view('inc/header', $data, TRUE);
    $data['sidebar'] = $this->load->view('inc/sidebar', '', TRUE);
    $data['getauthor'] = $this->author_model->getAuthorData();
    $data['content'] = $this->load->view('inc/listauthor', $data, TRUE);
    $data['footer'] = $this->load->view('inc/footer', '', TRUE);
    $this->load->view('home', $data);
  }

  public function editauthor($id){
    $data['title'] = 'Update Author Data';
    $data['header'] = $this->load->view('inc/header', $data, TRUE);
    $data['sidebar'] = $this->load->view('inc/sidebar', '', TRUE);
    $data['authorbyid'] = $this->author_model->getAuthorById($id);
    $data['content'] = $this->load->view('inc/authoredit', $data, TRUE);
    $data['footer'] = $this->load->view('inc/footer', '', TRUE);
    $this->load->view('home', $data);
  }

  public function updateathrById(){
    $data['author'] = $this->input->post('author');
    $data['aId'] = $this->input->post('aId');

    $author = $data['author'];
    $aId = $data['aId'];
    if (empty($author)) {
      $sdata = array();
      $sdata['msg'] = '<span style="color:red">Field must not be empty</span>';
      $this->session->set_flashdata($sdata);
      redirect("author/editauthor/".$aId);
    }else{
      $this->author_model->updateAthrById($data);
      $sdata = array();
      $sdata['msg'] = '<span style="color:green">Aothor Data Update Successfully</span>';
      $this->session->set_flashdata($sdata);
      redirect("author/editauthor/".$aId);
    }
  }

  public function delauthor($id){
    $this->author_model->deleteAthrById($id);
    $sdata = array();
    $sdata['msg'] = '<span style="color:green">Author Deleted Successfully</span>';
    $this->session->set_flashdata($sdata);
    redirect("author/authorlist");
  }
}
