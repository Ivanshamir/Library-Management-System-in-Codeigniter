<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('department_model');
    $data = array();
  }

  public function adddepartment(){
    $data['title'] = 'Add Department';
    $data['header'] = $this->load->view('inc/header', $data, TRUE);
    $data['sidebar'] = $this->load->view('inc/sidebar', '', TRUE);
    $data['content'] = $this->load->view('inc/deptadd', '', TRUE);
    $data['footer'] = $this->load->view('inc/footer', '', TRUE);
    $this->load->view('home', $data);
  }

  public function addDeptForm(){
    $data['dept'] = $this->input->post('dept');

    $department = $data['dept'];

    if (empty($department)) {
      $sdata = array();
      $sdata['msg'] = '<span style="color:red">Field must not be empty</span>';
      $this->session->set_flashdata($sdata);
      redirect("department/adddepartment");
    }else{
      $this->department_model->addDepartmerntData($data);
      $sdata = array();
      $sdata['msg'] = '<span style="color:green">Department Add Successfully</span>';
      $this->session->set_flashdata($sdata);
      redirect("department/adddepartment");
    }

  }


  public function departmentlist(){
    $data['title'] = 'Department List';
    $data['header'] = $this->load->view('inc/header', $data, TRUE);
    $data['sidebar'] = $this->load->view('inc/sidebar', '', TRUE);
    $data['getdept'] = $this->department_model->getDepartmentData();
    $data['content'] = $this->load->view('inc/listdept', $data, TRUE);
    $data['footer'] = $this->load->view('inc/footer', '', TRUE);
    $this->load->view('home', $data);
  }

  public function editdepartment($id){
    $data['title'] = 'Update Department';
    $data['header'] = $this->load->view('inc/header', $data, TRUE);
    $data['sidebar'] = $this->load->view('inc/sidebar', '', TRUE);
    $data['depbyid'] = $this->department_model->getDepartmentById($id);
    $data['content'] = $this->load->view('inc/departmentedit', $data, TRUE);
    $data['footer'] = $this->load->view('inc/footer', '', TRUE);
    $this->load->view('home', $data);
  }

  public function updateDeptById(){
    $data['dept'] = $this->input->post('dept');
    $data['dId'] = $this->input->post('dId');

    $department = $data['dept'];
    $dId = $data['dId'];
    if (empty($department)) {
      $sdata = array();
      $sdata['msg'] = '<span style="color:red">Field must not be empty</span>';
      $this->session->set_flashdata($sdata);
      redirect("department/editdepartment/".$dId);
    }else{
      $this->department_model->updateDeptById($data);
      $sdata = array();
      $sdata['msg'] = '<span style="color:green">Department Update Successfully</span>';
      $this->session->set_flashdata($sdata);
      redirect("department/editdepartment/".$dId);
    }
  }

  public function deldepartment($id){
    $this->department_model->deleteDeptById($id);
    $sdata = array();
    $sdata['msg'] = '<span style="color:green">Data Deleted Successfully</span>';
    $this->session->set_flashdata($sdata);
    redirect("department/departmentlist");
  }

}
