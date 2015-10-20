<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Question_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getQuestion($qId) {
        
        $qdetails = '';
        
        $this->db->select('question_id, title, username, description');
        $que = $this->db->get_where('questions', array('question_id'=>$qId));
        if ($que->num_rows() == 1) {
            $question = $que->row();
            $qdetails = array('question_id'=>$question->question_id ,'username'=>$question->username,'question'=>$question->title,'description'=>$question->description);
        }       
        return $qdetails;
    }


    public function addQuestion($title, $description, $category, $tag) {
        
        $categoryId = '';
        $tagId = '';
        $username = '';
        
        $loginname = '';
        
         //$this->db->trans_start();
       
         //owner of the question
        $session_id = $this->session->userdata('session_id');
        $this->db->select('name');
        $name = $this->db->get_where('logins',array('session_id'=>$session_id));
        
        foreach ($name->result() as $row) {
            $loginname = $row->name;
        }
        
        $this->db->select('username');
        $user = $this->db->get_where('users', array('name'=>$loginname));
        //if ($user->num_rows() == 1) {
        foreach ($user->result() as $row) {
            $rowuser = $row->username;
            $username = $rowuser;
        }
        
        //categoryId
        $this->db->select('category_id');
        $categorydet = $this->db->get_where('category', array('category_name'=> $category));
        
        if ($categorydet->num_rows() == 1) {
            $rowcat = $categorydet->row();
            $categoryId = $rowcat->category_id;
        }
        
        //tagId
        $this->db->select('tag_id');
        $tagdet = $this->db->get_where('tags', array('tag_name'=>$tag));
        if($tagdet->num_rows() == 1){
            $rowtag = $tagdet->row();
            $tagId = $rowtag->tag_id;
        }
        
        //update question table and tag_question table
        $data = array('description'=> $description,'title'=> $title,'category_id'=> $categoryId,'username'=> $username);
        $this->db->insert('questions',$data);
        
        $insrow = $this->db->insert_id();
        
        $data_tq = array('question_id'=>$insrow, 'tag_id'=>$tagId);
        $this->db->insert('tag_question',$data_tq);
        //$this->db->trans_complete();
        return null;       
    }
    
    public function loadAllQuestions() {
        
        $totalquestions = array();
        
        $this->db->select('question_id, title');
        $result = $this->db->get('questions');
        
        foreach ($result->result() as $res) {
            
            //$question = array('question_id'=> $row->question_id, 'title'=> $row->title, 'description'=>$row->description);  
            array_push($totalquestions, array('title'=>$res->title, 'questionId'=>$res->question_id)); 
        }
        
        return $totalquestions;
        
        
        
//        $qtitleANDid = array();
//        $this->db->select('question_id, title');
//        $question = $this->db->get_where('questions', array('category_id'=> $catId));
//        
//        foreach ($question->result() as $res) {
//                array_push($qtitleANDid, array('title'=>$res->title, 'questionId'=>$res->question_id) );
//        }
//        
//        return $qtitleANDid;   
//        
    }
}
