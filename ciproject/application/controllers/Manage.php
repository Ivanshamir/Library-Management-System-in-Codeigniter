<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('manage_model');
    $this->load->model('department_model');
    $this->load->model('book_model');
    $data = array();
  }

  public function issuebook(){
    $data['title'] = 'Issue Book';
    $data['header'] = $this->load->view('inc/header', $data, TRUE);
    $data['sidebar'] = $this->load->view('inc/sidebar', '', TRUE);
    $data['getdept'] = $this->department_model->getDepartmentData();
    $data['content'] = $this->load->view('inc/issuebook', $data, TRUE);
    $data['footer'] = $this->load->view('inc/footer', '', TRUE);
    $this->load->view('home', $data);
  }

  public function getBookById($data){
    $getAllBook = $this->manage_model->getBookByDep($data);
    $output = null;
    $output .= '<option value="0">Select One</option>';
    foreach ($getAllBook as $book) {
      $output .= '<option value="'.$book->bookId.'">'.$book->bookname.'</option>';
    }
    echo $output;
  }

  public function addIssueForm(){
    $data['name'] = $this->input->post('name');
    $data['reg'] = $this->input->post('reg');
    $data['dept'] = $this->input->post('dept');
    $data['bookname'] = $this->input->post('bookname');
    $data['return'] = $this->input->post('return');

    $name = $data['name'];
    $reg = $data['reg'];
    $dept = $data['dept'];
    $bookname = $data['bookname'];
    $return = $data['return'];

    if (empty($name) && empty($dept)) {
      $sdata = array();
      $sdata['msg'] = '<span style="color:red">Field must not be empty</span>';
      $this->session->set_flashdata($sdata);
      redirect("manage/issuebook");
    }else{
      $this->manage_model->addBookIssueData($data);
      $sdata = array();
      $sdata['msg'] = '<span style="color:green">Book Issue Data Add Successfully</span>';
      $this->session->set_flashdata($sdata);
      redirect("manage/issuebook");
    }
  }

  public function issuelist(){
    $data['title'] = 'Issue Book List';
    $data['header'] = $this->load->view('inc/header', $data, TRUE);
    $data['sidebar'] = $this->load->view('inc/sidebar', '', TRUE);
    $data['getissuedata'] = $this->manage_model->getIssueData();
    $data['content'] = $this->load->view('inc/issuebooklist', $data, TRUE);
    $data['footer'] = $this->load->view('inc/footer', '', TRUE);
    $this->load->view('home', $data);
  }

  public function delissue($Id){
    $this->manage_model->deleteIssueDataById($Id);
    $sdata = array();
    $sdata['msg'] = '<span style="color:green">Issue Data Deleted Successfully</span>';
    $this->session->set_flashdata($sdata);
    redirect("manage/issuelist");
  }

  public function studetails($reg){
    $data['title'] = 'Student Details';
    $data['header'] = $this->load->view('inc/header', $data, TRUE);
    $data['sidebar'] = $this->load->view('inc/sidebar', '', TRUE);
    $data['studentdata'] = $this->manage_model->getStudentDetailsById($reg);
    $data['content'] = $this->load->view('inc/studentdeails', $data, TRUE);
    $data['footer'] = $this->load->view('inc/footer', '', TRUE);
    $this->load->view('home', $data);
  }

  public function bookdetails($bookid){
    $data['title'] = 'Book Details';
    $data['header'] = $this->load->view('inc/header', $data, TRUE);
    $data['sidebar'] = $this->load->view('inc/sidebar', '', TRUE);
    $data['bookdtls'] = $this->manage_model->getBookDetailsById($bookid);
    $data['content'] = $this->load->view('inc/bookdeails', $data, TRUE);
    $data['footer'] = $this->load->view('inc/footer', '', TRUE);
    $this->load->view('home', $data);
  }
}
