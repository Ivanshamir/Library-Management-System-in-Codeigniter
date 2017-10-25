<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('student_model');
    $this->load->model('department_model');
    $data = array();
    if (!$this->session->userdata('userlogin')) {
      redirect('user/login');
    }
  }

  public function addstudent(){
    $data['title'] = 'Add New Student';
    $data['header'] = $this->load->view('inc/header', $data, TRUE);
    $data['sidebar'] = $this->load->view('inc/sidebar', '', TRUE);
    $data['getdept'] = $this->department_model->getDepartmentData();
    $data['content'] = $this->load->view('inc/studentadd', $data, TRUE);
    $data['footer'] = $this->load->view('inc/footer', '', TRUE);
    $this->load->view('home', $data);
  }

  public function addStudentForm(){
    $data['name'] = $this->input->post('name');
    $data['dept'] = $this->input->post('dept');
    $data['roll'] = $this->input->post('roll');
    $data['reg'] = $this->input->post('reg');
    $data['phone'] = $this->input->post('phone');

    $name = $data['name'];
    $dept = $data['dept'];
    $roll = $data['roll'];
    $reg = $data['reg'];
    $phone = $data['phone'];
    if (empty($name) && empty($dept) && empty($roll) && empty($reg) && empty($phone)) {
      $sdata = array();
      $sdata['msg'] = '<span style="color:red">Field must not be empty</span>';
      $this->session->set_flashdata($sdata);
      redirect("student/addstudent");
    }else{
      $this->student_model->addStudentData($data);
      $sdata = array();
      $sdata['msg'] = '<span style="color:green">Data Add Successfully</span>';
      $this->session->set_flashdata($sdata);
      redirect("student/addstudent");
    }
  }

  public function studentlist(){
    $data['title'] = 'Student List';
    $data['header'] = $this->load->view('inc/header', $data, TRUE);
    $data['sidebar'] = $this->load->view('inc/sidebar', '', TRUE);
    $data['getstudent'] = $this->student_model->getStudentData();
    $data['content'] = $this->load->view('inc/liststudent', $data, TRUE);
    $data['footer'] = $this->load->view('inc/footer', '', TRUE);
    $this->load->view('home', $data);
  }

  public function editstudent($sId){
    $data['title'] = 'Update Student Data';
    $data['header'] = $this->load->view('inc/header', $data, TRUE);
    $data['sidebar'] = $this->load->view('inc/sidebar', '', TRUE);
    $data['getdept'] = $this->department_model->getDepartmentData();
    $data['stuById'] = $this->student_model->getStudentById($sId);
    $data['content'] = $this->load->view('inc/studentedit', $data, TRUE);
    $data['footer'] = $this->load->view('inc/footer', '', TRUE);
    $this->load->view('home', $data);
  }

  public function updateStudentById(){
    $data['sId'] = $this->input->post('sId');
    $data['name'] = $this->input->post('name');
    $data['dept'] = $this->input->post('dept');
    $data['roll'] = $this->input->post('roll');
    $data['reg'] = $this->input->post('reg');
    $data['phone'] = $this->input->post('phone');

    $sId = $data['sId'];
    $name = $data['name'];
    $dept = $data['dept'];
    $roll = $data['roll'];
    $reg = $data['reg'];
    $phone = $data['phone'];
    if (empty($name) && empty($dept) && empty($roll) && empty($reg) && empty($phone)) {
      $sdata = array();
      $sdata['msg'] = '<span style="color:red">Field must not be empty</span>';
      $this->session->set_flashdata($sdata);
      redirect("student/editstudent/".$sId);
    }else{
      $this->student_model->updateStudentData($data);
      $sdata = array();
      $sdata['msg'] = '<span style="color:green">Data Update Successfully</span>';
      $this->session->set_flashdata($sdata);
      redirect("student/editstudent/".$sId);
    }
  }

  public function delstudent($sId){
    $this->student_model->deleteStudentDataById($sId);
    $sdata = array();
    $sdata['msg'] = '<span style="color:green">Data Deleted Successfully</span>';
    $this->session->set_flashdata($sdata);
    redirect("student/studentlist");
  }

}
