<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Profile_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        
        $this->load->database();
    }


    public function getDetails() {
        
        $username = "";
        $loginname = "";
        
        //get name and username
        $session_id = $this->session->userdata('session_id');
        $this->db->select('name');
        $name = $this->db->get_where('logins',array('session_id'=>$session_id));
        
        foreach ($name->result() as $row) {
            $loginname = $row->name;
        }

        $this->db->select('username');
        $user = $this->db->get_where('users', array('name'=>$loginname));
    
        foreach ($user->result() as $row) {
            $rowuser = $row->username;
            $username = $rowuser;
        }
        
        //question posted
        $this->db->select('question_id');
        $resq = $this->db->get_where('questions', array('username'=>$username));  
        $questioncount = $resq->num_rows();
        
        //answers posted
        $this->db->select('answer_id');
        $resa = $this->db->get_where('answers', array('username'=>$username));  
        $answercount = $resa->num_rows();
        
        return array("name"=>$loginname, "username"=>$username, "pquestion"=>$questioncount, "panswers"=>$answercount);
    }
}