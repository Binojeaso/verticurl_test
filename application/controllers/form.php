<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class form extends CI_Controller {

//public $forms;
	public function __construct()
    {
        parent::__construct();
        $this->load->model('FieldModel','formfieldsObj');
		$this->load->model('FormsModel','formsObj');


		//$this->load->library('form_validation');
		
    }

	public function index()
	{

		
		//print_r($_POST);
		//print("<pre>".print_r($_POST,true)."</pre>");
		if($this->input->post('tacticID')){

		$i=-1;$j=0;
		$field_array1=array();
		$field_array=array();
		
		foreach($_POST as $key => $value) {
			$integer_loop=$key[-1];
			if(is_numeric($integer_loop)){
				$key = preg_replace('/[0-9]+/', '', $key);
			}else{
				continue;
			}
			
			$j++;$tem_arr=[];

			$tem_arr[$key]=$value;
			//echo $integer_loop." ".$i." ".$j;
			//second array
			if($integer_loop==$i){
				
				$field_array=array_merge($field_array,$tem_arr);
				array_push($field_array1,$field_array);
				
				if($j==2){
					
					$j=0;
				}
				//$i++;
			
			}else{
				$tem_arr['tactic_id']=$this->input->post('tacticID');
				$tem_arr['form_id']=$this->input->post('form_id');
				
				$field_array=array_merge($field_array,$tem_arr);
				$i=$integer_loop;
				// print("<pre>".print_r($field_array,true)."</pre>");
				//$this->addField($tem_arr);
			}
			
			
		  }
		  echo "<br><br>";
		  //print("<pre>".print_r($field_array1,true)."</pre>");
		  $formids['form_id']=$this->input->post('form_id');
		  $this->flush_existing($formids);
		  //$this->flush_existing($formids);
		  

		  foreach($field_array1 as $key => $value) {
			
			
			$this->addField($value);

		  }
		 
			$f_name=$field_array1[0]['tactic_id'];
			$f_id=$field_array1[0]['form_id'];
		  $data_form=array('f_name'=>$f_name,'f_id'=>$f_id);

		  $this->formsObj->add($data_form);
		 
		/*if($this->input->post('tactic_id')){
			$data = [
				'tactic_id' =>  $this->input->post('tactic_id'),
				'form_id' => $this->input->post('form_id'),
				'field_id' => $this->input->post('field_id'),
				'field_name' => $this->input->post('field_name')
			];
			$this->addField($data);
		}*/
		

		}
		$this->load->view('add_form_fields');
	}

    public function getfield(){
		//$formsObj= new FormModel;
		$data['query']=$this->formfieldsObj->get_fieldname($paramsid);
		print_r($data);

    }

	public function addField($data1){

		$this->formfieldsObj->add_field($data1);
		
		//print_r($this->db->last_query()); 
    }

	public function flush_existing($data1){

		$this->formfieldsObj->delete_existing($data1);
		$this->formsObj->delete_existing($data1);
		
    }

	function parseFieldname(){
		//$this->load->view('welcome_message');

	}


}
