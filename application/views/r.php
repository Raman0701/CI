<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PagesController extends CI_Controller {  


 public function __construct() {
  parent::__construct();        
  $this->load->model('queries');  
  $this->load->library('session');    
}


public function index() {
$this->load->library('form_validation'); 

 $this->form_validation->set_rules('email', 'E-Mail', 'required');
 $this->form_validation->set_rules('password', 'Password', 'required');

  if ($this->form_validation->run() == FALSE) {
    if(isset($this->session->userdata['logged_in'])){
      $this->load->view('admin_page');
    }else{
      $this->load->view('login');
    }
  } else {
    $data = array(
      'username' => $this->input->post('username'),
      'password' => $this->input->post('password')
    );
    $result = $this->queries->login($data);
    if ($result == TRUE) {

      $email = $this->input->post('email');
      $result = $this->queries->read_user_information($email);
      if ($result != false) {
        $session_data = array(
          'id' => $result[0]->id,
          'email' => $result[0]->user_email,
        );
// Add user data in session
        $this->session->set_userdata('logged_in', $session_data);
        $this->load->view('home');
      }
    } else {
      $data = array(
        'error_message' => 'Invalid Username or Password'
      );
      $this->load->view('login', $data);
    }
  }
}


// public function index() {
//   $this->load->library('form_validation');
//   if (isset($_POST['signin'])) {
//     $this->form_validation->set_rules('email', 'E-Mail', 'required');
//     $this->form_validation->set_rules('password', 'Password', 'required');

//     if ($this->form_validation->run() == TRUE){
//       $this->input->post('email');
//       $this->input->post('password')

//      $this->queries->login();

//      redirect('home');
//    }
//    else{
//     echo "gsiy";
//    }

//  }
//  $this->load->view('login');
// }





public function signUp()
{
  $this->load->library('form_validation'); 


  if (isset($_POST['signup'])) {

    $this->form_validation->set_rules('email', 'E-Mail', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('c_password', 'Confirm Password', 'required|matches[password]');

    if ($this->form_validation->run() == TRUE){ 

      $data = array(
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'password' => md5($this->input->post('password')),
        'class' => $this->input->post('cls'),
        'gender' => $this->input->post('gender'),
        'contact' => $this->input->post('phone')
      );

      $this->queries->signUp($data);
      redirect('login');
    }

  }


//   $result = $this->login_database->registration_insert($data);
// if ($result == TRUE) {
// $data['message_display'] = 'Registration Successfully !';
// $this->load->view('login_form', $data);
// } else {
// $data['message_display'] = 'Username already exist!';
// $this->load->view('registration_form', $data);
// }

  $this->load->view('register');
}



public function logout() {

// Removing session data
  $sess_array = array(
    'username' => ''
  );
  $this->session->unset_userdata('logged_in', $sess_array);
  $data['message_display'] = 'Successfully Logout';
  $this->load->view('login_form', $data);
}


}