<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Category_model extends CI_Model {
    
    private $category_list;
    
    function __construct() {
        parent::__construct();
        $this->load->database();        
    } 
    
    function allCategories() {
        
        $all_categories = array();
        $this->db->select('category_name');
        $result = $this->db->get('category');
        foreach ($result->result() as $row) {
            array_push($all_categories, $row->category_name); 
        }   

        return $all_categories;
    }
    
    public function getcategoryQuestions($catId) {
        
        $qtitleANDid = array();
        $this->db->select('question_id, title');
        $question = $this->db->get_where('questions', array('category_id'=> $catId));
        
        foreach ($question->result() as $res) {
                array_push($qtitleANDid, array('title'=>$res->title, 'questionId'=>$res->question_id) );
        }
        
        return $qtitleANDid;        
    }
    
    function id_category() {
        
        $all_category = array();
        $this->db->order_by("category_name", "asc"); 
        $this->db->select('category_id, category_name');
        $result = $this->db->get('category');
        foreach ($result->result() as $row) {
            array_push($all_category, array('categoryid'=>$row->category_id,'categoryname'=>$row->category_name) ); 
        }         
        return $all_category; 
    }
}