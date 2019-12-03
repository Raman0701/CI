<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PagesController extends CI_Controller {  

//constructor Function
 public function __construct() {
  parent::__construct();        
  $this->load->model('Queries');      
  $this->load->library('session');
}

//login User
public function index() {
  $this->load->library('form_validation'); 
  if (isset($_POST['signin'])) {

    $this->form_validation->set_rules('email', 'E-Mail', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == TRUE){ 

      $data = array(
        'email' => $this->input->post('email'),
        'password' => md5($this->input->post('password'))
      );

      $check = $this->Queries->logIn($data);
      if ($check != '') {
        //create session data
        $session_data = array(
          'id' => $check['id'],
          'email' => $check['email'],
          'logged_in' => TRUE
        ); 
        //set Session data

        $this->session->set_userdata($session_data);
        redirect('home');
      }
      else{
       echo "Invalid E-Mail and Password Combination.";
     }

   }
   else{
    echo "form_validation = false";
  }

}
$this->load->view('login');
}



//Register User
public function signUp(){
  $this->load->library('form_validation'); 


  if (isset($_POST['signup'])) {

    $this->form_validation->set_rules('email', 'E-Mail', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('c_password', 'Confirm Password', 'required|matches[password]');
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('cls', 'Class', 'required');
    $this->form_validation->set_rules('gender', 'Gender', 'required');
    $this->form_validation->set_rules('phone', 'Contact', 'required|regex_match[/^[0-9]{10}$/]');

    if ($this->form_validation->run() == TRUE){ 

      $data = array(
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'password' => md5($this->input->post('password')),
        'class' => $this->input->post('cls'),
        'gender' => $this->input->post('gender'),
        'contact' => $this->input->post('phone')
      );

      $this->Queries->signUp($data);
      $this->session->set_flashdata('success_msg', 'Student Successfully Added..!!!');
      redirect('login');
    }

  }

  $this->load->view('register');
}    


//Home Page
public function home(){
  $id = $this->session->userdata('id');
  $data['homeData'] =$this->Queries->Details($id);
  $this->load->view('home',$data);
}


//logout user
public function logout() {

  //remove session data
  $session_data = array(
    'id'  =>'',
    'email' => '',
    'logged_in' => FALSE
  );

  $this->session->unset_userdata($session_data);
  $this->session->sess_destroy();
  redirect('login');
}

//students details according to class
public function stuDetails(){

  $cls = $this->input->get('class');
  $details['stuData']=$this->Queries->students($cls);

  $this->load->view('stu_details',$details); 
}



//update action for student details
public function updateStudent(){
 $cls =$this->input->get('class');
 $this->load->library('form_validation'); 


 if (isset($_POST['update'])) {

  $this->form_validation->set_rules('email', 'E-Mail', 'required');
  $this->form_validation->set_rules('name', 'Name', 'required');
  $this->form_validation->set_rules('cls', 'Class', 'required');
  $this->form_validation->set_rules('gender', 'Gender', 'required');
  $this->form_validation->set_rules('contact', 'Contact', 'required');

  if ($this->form_validation->run() == TRUE){ 

    $data = array(
      'name' => $this->input->post('name'),
      'email' => $this->input->post('email'),
      'class' => $this->input->post('cls'),
      'gender' => $this->input->post('gender'),
      'contact' => $this->input->post('contact')
    );

    $id = $this->input->get('id');
    $r = $this->Queries->updateStu($data,$id);
     // print_r($r);die;
    $this->session->set_flashdata('update_msg', 'Student Data Successfully Updated..!!!');



    $link = 'stu_details?id='.$id.'&class='.$cls;

  // print_r($link); die;
    redirect($link);

  }

}
$this->load->view('update_stu');
}


//delete action
public function deleteStudent(){
  $cls =$this->input->get('class');
  $id = $this->input->get('id');
  $this->Queries->deleteStu($id);
  $this->session->set_flashdata('delete_msg', 'Student Data Successfully Deleted..!!!');

  $link = 'stu_details?id='.$id.'&class='.$cls;
  redirect($link);
}



}