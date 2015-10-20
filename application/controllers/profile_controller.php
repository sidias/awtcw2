<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Profile_controller extends CI_Controller {
    
    public function index() {
        
        $this->load->model('profile_model');
        $pd = $this->profile_model->getDetails();
        
        $this->load->view('profile_view', array("profile"=>$pd));
    }
    
}
