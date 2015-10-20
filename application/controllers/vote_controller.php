<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Vote_controller extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('vote_model');
    }
    
    //up and down vote of question in array
    public function questionvote_total() { 
        
        $qId = $this->input->get('qid');
        $qvotes = $this->vote_model->questionTotal($qId);
        $jsonencodedlist = json_encode($qvotes);
        $this->output->set_content_type('application/json');
        $this->output->set_output($jsonencodedlist);
    }
    
    public function updateAnswer_vote() {
        
        $qid = $this->input->get('aid');
        $action = $this->input->get('action');
        $currval = $this->input->get('currval');
    
        $this->vote_model->updateAnswerVote($action, $qid, $currval);
         
    }
    
    public function updateQuestion_vote(){
        
        $qid = $this->input->get('qid');
        $action = $this->input->get('action');
        $currval = $this->input->get('currval');
       
        $this->vote_model->updateQuestionVote($action, $qid, $currval);
        
    }
}