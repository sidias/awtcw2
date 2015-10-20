<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Authlib {
 
    function __construct() {
        // get a reference to the CI super-object, so we can
        // access models etc. (because we don't extend a core
        // CI class)
        $this->ci = &get_instance();
        $this->ci->load->model('user'); 
    }
 
    public function register($name,$user,$pwd,$conf_pwd) {
    
        if ($name == '' || $user == '' || $pwd == '' || $conf_pwd == '') {
            return 'Missing field';
        }
        
        if (strlen($pwd) < 8) {
            return "password must be 8 character";
        }
        
        if ($pwd != $conf_pwd) {
            return "Passwords do not match";
        }
        return $this->ci->user->register($name,$user,$pwd);
    }
    
    public function login($user,$pwd) {
        
        if ($user == '' || $pwd == '') {
            return false;
        }
        return $this->ci->user->login($user,$pwd);
    }
    
    public function is_loggedin() {
        
        return $this->ci->user->is_loggedin();
    }
 
    
}
