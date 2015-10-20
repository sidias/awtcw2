<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Answer_controller extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        $this->load->model('answer_model');
    }


    //all answers to given question
    public function getAnswers() {
        
        $qId = $this->input->get('qid');    
        $answers = $this->answer_model->getAnswers($qId);
        $jsonencodedlist = json_encode($answers);
        $this->output->set_content_type('application/json');
        $this->output->set_output($jsonencodedlist);
    }
    
    public function submitAnswer() {
        
        $answer = $this->input->post('description');
        $qid = $this->input->post('qid');
        $session_id = $this->session->userdata('session_id');
        
        $this->answer_model->submitAnswer($qid, $answer, $session_id);
        //$this->load->view('test');
    }
}
