<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Vote_model extends CI_Model {
    
    function __construct() {
        
        parent::__construct();
        $this->load->database();
    }
    
    public function answerVotes($answerIds) {
        
        $arrsize = sizeof($answerIds, 0);
        $allvotes = array();
        
        for($i=0; $i<$arrsize; $i++) {
            $this->db->select('voteup, votedown');
            $res = $this->db->get_where('votes', array('answer_id'=>$answerIds[$i]));
            
            $votecount = '';
            if ($res->num_rows() == 1) {
                $votes = $res->row();
                $votecount = array('voteup'=>$votes->voteup, 'votedown'=>$votes->votedown);
            } else {
                $votecount = array('voteup'=> 0, 'votedown'=> 0);
            }
            $votetotal = array('answer_id'=>$answerIds[$i], 'votes'=>$votecount);
            array_push($allvotes, $votetotal);
        }
        //var_dump($allvotes[0]['answer_id']);
        return $allvotes;
    }
    
    public function questionTotal($qid) {
        
        $this->db->select('voteup, votedown');
        $res = $this->db->get_where('votes', array('question_id'=>$qid));
        
        $votecount = '';
        if ($res->num_rows() == 1) {
            $votes = $res->row();
            $votecount = array('voteup'=>$votes->voteup, 'votedown'=>$votes->votedown);
        } else {
            $votecount = array('voteup'=> 0, 'votedown'=> 0);
        }
        
        return $votecount;
    }


    public function updateQuestionVote($action, $qid, $currval) {
     
        $value = $currval + 1;
        //check record existance
        $this->db->select('question_id');
        $res = $this->db->get_where('votes', array('question_id'=>$qid));
        if($res->num_rows() == 1 ) {
            //upadat
            if($action == 'up') {
                $this->db->where('question_id', $qid);
                $this->db->update('votes', array('question_id'=>$qid, 'voteup'=>$value));
            }
            
            if($action == 'down') {
                $this->db->where('question_id', $qid);
                $this->db->update('votes', array('question_id'=>$qid, 'votedown'=>$value));
            }
        } else {
            //insert   
            if($action == 'up') {
                $this->db->insert('votes', array('question_id'=>$qid, 'voteup'=>$value));
            }
            
            if($action == 'down') {
                $this->db->insert('votes', array('question_id'=>$qid, 'votedown'=>$value));
            }        
        }
    }
    
    public function updateAnswerVote($action, $aid, $currval) {
     
        $value = $currval + 1;
        //check record existance
        $this->db->select('answer_id');
        $res = $this->db->get_where('votes', array('answer_id'=>$aid));
        if($res->num_rows() == 1 ) {

            //upadat
            if($action == 'voteup') {
                $this->db->where('answer_id', $aid);
                $this->db->update('votes', array('answer_id'=>$aid, 'voteup'=>$value));
            }
            
            if($action == 'votedown') {
                $this->db->where('answer_id', $aid);
                $this->db->update('votes', array('answer_id'=>$aid, 'votedown'=>$value));
            }
        } else {
            //insert   
            if($action == 'voteup') {
                $this->db->insert('votes', array('answer_id'=>$aid, 'voteup'=>$value));
            }
            
            if($action == 'votedown') {
                $this->db->insert('votes', array('answer_id'=>$aid, 'votedown'=>$value));
            }        
        }
    }
    
    
}
