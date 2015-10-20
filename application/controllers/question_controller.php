<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Question_controller extends CI_Controller {
    
    public function index() {
        
    }
    
    public function get_answers() {
        $qId = $this->input->get('qid'); 
        //load question
        $this->load->model('question_model');
        $questiondetails = $this->question_model->getQuestion($qId);
        
        //load answers
        $this->load->model('answer_model');
        $ansdetails = $this->answer_model->getAnswers($qId);
        //var_dump($ansdetails);
        //load answer votes
        $arrsize = sizeof($ansdetails, 0);
        
        $answerIds = array();
        
        for($i=1; $i<$arrsize; $i++) {
            $ansid = $ansdetails[$i]['answer_id'];
            array_push($answerIds, $ansid);
        }
    
        //load question votes
        $this->load->model('vote_model');
        $answervotes = $this->vote_model->answerVotes($answerIds);
              
        //load view    
        $this->load->view('singlequestion_view', array('question'=>$questiondetails, 'answers'=>$ansdetails, 'answervotes'=>$answervotes));
    }
    
    public function guest_answers() {
        $qId = $this->input->get('qid'); 
        //load question
        $this->load->model('question_model');
        $questiondetails = $this->question_model->getQuestion($qId);
        
        //load answers
        $this->load->model('answer_model');
        $ansdetails = $this->answer_model->getAnswers($qId);
        //var_dump($ansdetails);
        //load answer votes
        $arrsize = sizeof($ansdetails, 0);
        
        $answerIds = array();
        
        for($i=1; $i<$arrsize; $i++) {
            $ansid = $ansdetails[$i]['answer_id'];
            array_push($answerIds, $ansid);
        }
    
        $this->load->model('vote_model');
        $answervotes = $this->vote_model->answerVotes($answerIds);
        
        //load question votes
       
        //load view    
        $this->load->view('guestsinglequestion_view', array('question'=>$questiondetails, 'answers'=>$ansdetails, 'answervotes'=>$answervotes));
    }
}
