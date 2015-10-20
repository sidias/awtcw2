<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Tag_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function alltags() {
        
        $all_tags = array();
        $this->db->select('tag_name');
        $result = $this->db->get('tags');
        foreach ($result->result() as $row) {
            array_push($all_tags, $row->tag_name); 
        }         
        return $all_tags;
    }
    
    public function getTagQuestions($tagId) {
        
        $questions = array();
        $this->db->select('question_id');
        $taggedQuestions = $this->db->get_where('tag_question', array('tag_id'=> $tagId));
        foreach ($taggedQuestions->result() as $row) {
            array_push($questions, $row->question_id);
        }
        
        //question array contain all question ids of corrosponding tag.
        $qcount = sizeof($questions, 0);
        $qtitleANDid = array();
        
        for($i=0; $i<$qcount; $i++) {

            $this->db->select('title, question_id');
            $question = $this->db->get_where('questions', array('question_id'=> $questions[$i]));
            foreach ($question->result() as $res) {
                array_push($qtitleANDid, array('title'=>$res->title, 'questionId'=>$res->question_id) );
            }
        }
         
        return $qtitleANDid;       
    }
    
    public function id_tag() {
        
        $all_tags = array();
        $this->db->order_by("tag_name", "asc"); 
        $this->db->select('tag_id, tag_name');
        $result = $this->db->get('tags');
        foreach ($result->result() as $row) {
            array_push($all_tags,array('tagid'=>$row->tag_id,'tagname'=>$row->tag_name) ); 
        }         
        return $all_tags; 
    }


    public function tag_exists($tag) {
        
        $res = $this->db->get_where('tags',array('tag_name' => $tag));
  
        if ($res->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function post_tag($tag) {
       
        $data = array('tag_name' => $tag);
        $this->db->insert('tags', $data);
        return null;
    }
}

