<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Auth extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('authlib');
        $this->load->helper('url');
    }
    
    public function index() {
        redirect('/auth/login'); // url helper function
    }
 
    public function register() {
        $this->load->view('registration',array('errmsg' => ''));
    }
   
    public function back () {
        redirect('/auth/login');
    }

    public function createAccount() {
        $name = $this->input->post('name');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $conf_password = $this->input->post('confpassword');
        
        if (!($errmsg = $this->authlib->register($name,$username,$password,$conf_password))) {
            redirect('/auth/login');
        }
        else {
            $data['errmsg'] = $errmsg;
            $this->load->view('registration',$data);
        }
    }
    
    public function login() {
        $data['errmsg'] = '';
        $this->load->view('login',$data);
    }
    
    public function authenticate() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->authlib->login($username,$password);
   
        if ($user !== false) {
            //$this->load->view('home_view',array('name' => $user['name']));
            redirect('/home_controller');
        }
        else {
            $data['errmsg'] = 'Unable to login - please try again';
            $this->load->view('login',$data);
        }
    }
         
}

