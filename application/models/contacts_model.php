<?php

class Contacts_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getContact(){
        
        $contact = "26 02 38";
        return $contact;
    }
    
}