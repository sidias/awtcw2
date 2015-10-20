<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Home_controller extends CI_Controller {
    
    public function index() {
    
        $this->loadquestions();
    }
    
    public function loadquestions() {
        
        $this->load->model('question_model');
        $allquestions = $this->question_model->loadAllQuestions();

        $this->load->view('home_view',array("questions"=>$allquestions));
    }
 
    
}

