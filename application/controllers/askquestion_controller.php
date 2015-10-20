<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Askquestion_controller extends CI_Controller {
    
    function index() {
        
        $this->load->view('askquestion_view');       
    }
    
    function submitQuestion() {
     
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $category = $this->input->post('category');
        $tag = $this->input->post('tags');
        
        $this->load->model('question_model');
        $this->question_model->addQuestion($title, $description, $category, $tag);      
        $this->load->view('test');
    }   
}

