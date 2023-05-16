<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormsModel extends CI_Model {

    
    public function form_access($ids_f){
        
        $this->db->where($ids_f); // Produces: WHERE name = 'Joe'
        $q = $this->db->get(FORM_DB);
        return $q->num_rows() > 0 ? $q->result() : array();            
    }


    public function add($params){
        $this->db->insert(FORM_DB, $params);     
         // print_r($this->db->last_query());  
         //$this->db->error();
    }

    public function delete_existing($data){
        
        $this->db->where('f_id', $data['form_id']);
        $this->db->delete(FORM_DB);
        //print_r($this->db->last_query());  die;

    }

  



}
