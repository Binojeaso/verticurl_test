<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TacticModel extends CI_Model {

    
    public function tactic_access($ids_f){
        
        $this->db->where($ids_f); // Produces: WHERE name = 'Joe'
        $q = $this->db->get(TACTIC_DB);
        return $q->num_rows() > 0 ? $q->result() : array();            
    }


    public function getd($params,$db){
        
        $this->db->where($params); // Produces: WHERE name = 'Joe'
        $q = $this->db->get($db);
        //echo $q->result();
        return $q->num_rows() > 0 ? $q->result() : array();            
    }



}
