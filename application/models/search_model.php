<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Search_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function allQuestions() {
        
        $all_questions = array();
        $this->db->select('title');
        $result = $this->db->get('questions');
        foreach ($result->result() as $row) {
            array_push($all_questions, $row->title); 
        }         
        return $all_questions;
    }
    
    public function getAnswers($question) {
        
        $searchresult = array();
        
        $this->db->like('title',$question);
        $this->db->select('question_id, title');
        $result = $this->db->get('questions');
        
        foreach ($result->result() as $res) {
             array_push($searchresult, array('title'=>$res->title, 'questionId'=>$res->question_id)); 
        }
        
        return $searchresult;
    }
}
