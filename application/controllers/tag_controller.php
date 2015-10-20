<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Tag_controller extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('tag_model');
    }
    
    public function index() {
   
       $this->tagANDId();
    }

    //retunr all tags in database in json format
    public function tagsJSON() {       
        $taglist = $this->tag_model->alltags();
        $jsonencodedlist = json_encode($taglist);
        $this->output->set_content_type('application/json');
        $this->output->set_output($jsonencodedlist);
    }
    
    public function tagANDId(){
        $taglist = $this->tag_model->id_tag();
        $this->load->view('tag_view', array('data'=>$taglist));  
    }
    
    public function insertTag() {
        $tag_post = $this->input->get('tag');
        
        $tagExists = $this->tag_model->tag_exists($tag_post);
        
        if ($tagExists == FALSE) {
            $this->tag_model->post_tag($tag_post);
        }
    }
    
    public function get_questions() {
        
        $tagId = $this->input->get('tagId');
        $qtitle = $this->tag_model->getTagQuestions($tagId);
        $this->load->view('tagquestion_view', array('questions'=>$qtitle));
    }
}
