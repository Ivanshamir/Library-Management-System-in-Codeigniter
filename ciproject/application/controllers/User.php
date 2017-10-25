<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('user_model');
  }

  public function login(){
    $this->load->view('login');
  }

  public function userLogin(){
    $data = array();
    $data['username'] = $this->input->post('username');
    $data['password'] = $this->input->post('password');

    $chkdata = $this->user_model->checkUserLogin($data);
    if ($chkdata){
      $sdata = array();
      $sdata['id'] = $chkdata->id;
      $sdata['userlogin'] = TRUE;
      $this->session->set_userdata($sdata);
      redirect('library');
    }else {
      $sdata = array();
      $sdata['msg'] = '<span style="color:red">Username And Password did not match !</span>';
      $this->session->set_flashdata($sdata);
      redirect("user/login");
    }
  }

  public function logout(){
    $this->session->unset_userdata($id);
    $this->session->set_userdata('userlogin', FALSE);
    $this->session->sess_destroy();
    redirect('user/login');
  }

}
