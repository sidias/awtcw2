<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Search_controller extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('search_model');
    }

    public function index() {
        $this->load->view('search_view');
    }
    
    public function autoload_searchResult() {  
        $questionlist = $this->search_model->allQuestions();
        $jsonencodedlist = json_encode($questionlist);
        $this->output->set_content_type('application/json');
        $this->output->set_output($jsonencodedlist);
    }
    
    public function searchResult() {
        
        $question = $this->input->post('term');
        $searchresult = $this->search_model->getAnswers($question);   
        
        $this->load->view('searchresult_view', array("questions"=>$searchresult));
    }
    
    public function guestsearch() {
        
        $question = $this->input->post('guestsearch');
        $searchresult = $this->search_model->getAnswers($question);   
        
        $this->load->view('guestsearchresult_view', array("questions"=>$searchresult));
    }


    //get all guest question details
    public function guestSearchView() {
     
        $this->load->view("guestsearch_view");
    }
}
