<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Category_controller extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        $this->load->model('category_model');
    }
    
    public function index() {
        $this->categoryANDId();
    }
            
    function getAllCategory() {
        
        $this->load->model('category_model');
        $categorylist = $this->category_model->allCategories();
        //return $categorylist;
        $jsonencodedlist = json_encode($categorylist);
        $this->output->set_content_type('application/json');
        $this->output->set_output($jsonencodedlist);
    }
    
    function categoryANDId() {
     
        $catlist = $this->category_model->id_category();
        $this->load->view('category_view', array('data'=>$catlist));
    }
    
    public function get_questions() {
        
        $catId = $this->input->get('catId');
        $qtitle = $this->category_model->getcategoryQuestions($catId);
        $this->load->view('categoryquestion_view', array('questions'=>$qtitle));
    }
}
