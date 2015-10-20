<?php

class Answer_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
      
        $this->load->database();
    }
    
    //get answer and owner of the answer
    public function getAnswers($qId) {
        
        $answers = array();
        
        $this->db->select('answer_id, description, username');
        $ans = $this->db->get_where('answers', array('question_id'=>$qId));  
        $anscount = $ans->num_rows();
        
        array_push($answers, $anscount);
        foreach ($ans->result() as $row) {
            array_push($answers, array('answer_id'=>$row->answer_id, 'username'=>$row->username,'description'=>$row->description));
        }
        
        return $answers;
    }
    
    public function submitAnswer($qid, $answer, $session_id) {
        
        $loginname = '';
        $username = '';

        //get current user
        $this->db->select('name');
        $res = $this->db->get_where('logins',array('session_id' => $session_id));

        if ($res->num_rows() == 1) {
            $row = $res->row_array();
            $loginname = $row['name'];            
        }
        
        $this->db->select('username');
        $res = $this->db->get_where('users', array('name'=>$loginname));
        if ($res->num_rows() == 1) {
            $row = $res->row();
            $username = $row->username;
            
        }

        $data = array('description'=>$answer, 'question_id'=>$qid, 'username'=>$username);
        $this->db->insert('answers', $data);
    }
}
