<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FieldModel extends CI_Model {

    
    public function tactic_access($ids_f){
        
        $this->db->where($ids_f); // Produces: WHERE name = 'Joe'
        $q = $this->db->get('tactic_access');
        //echo $q->result();
       // print_r($this->db->last_query()); 
        return $q->num_rows() > 0 ? $q->result() : array();            
    }


    public function get_field($ids_f){
        
        $this->db->where($ids_f); // Produces: WHERE name = 'Joe'
        $q = $this->db->get('field_name');
        //echo $q->result();
        return $q->num_rows() > 0 ? $q->result() : array();            
    }


    public function delete_existing($data){
        
        $this->db->where('form_id', $data['form_id']);
        $this->db->delete('field_name');
       //print_r($this->db->last_query());  die;

    }

    public function add_field($data){
       // print_r($data);
       $this->db->insert('field_name', $data);
       // print_r($this->db->last_query());  
        //$this->db->error();


    } 

}
