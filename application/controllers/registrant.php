<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrant extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('FieldModel','formsObj');
		$this->load->model('TacticModel','tacticObj');

		
		//$this->load->library('form_validation');
		
    }

	public function index()
	{
		$this->load->view('table/data1');
	}

	public function tactic($tacticid=NULL)
	{
		$this->session->set_userdata('user_identity','e_001');
		if(empty($tacticid)){
			$data['error']=array("reason"=>"Invalid Tatic ID","code"=>"0");
			$this->load->view('table/500_error',$data);
		}else{
			if($this->session->has_userdata('user_identity')){

			$where=array("f_name"=>$tacticid);
			$s=$this->tacticObj->getd($where,FORM_DB);
			
			if(empty($s[0]->f_name)){
				$data['error']=array("reason"=>"No Access","code"=>"1");
			$this->load->view('table/500_error',$data); return;
			}

			
				$user_idf=$this->session->userdata('user_identity');
				$title_id=array("user_id"=>$user_idf);
				$data['result']=$this->formsObj->tactic_access($title_id);
				$key="form_name";
				
				if($this->in_result($data, $key, $tacticid)){
					$this->get_form_report($tacticid);
				}else{
					$data['error']=array("reason"=>"No access","code"=>"403");
					$this->load->view('table/500_error',$data);
				}
			}else{
				echo 'no';

			}
		}

	}

	private function get_form_report($tacticid=NULL){
		if(empty($tacticid)){
			$data['error']=array("reason"=>"Invalid Tatic ID","code"=>"Oops");
			$this->load->view('table/500_error',$data);

		}else{
		$ss=$this->get_formid_bytactic($tacticid);
		
		$registrants = $this->jsontoarray($ss);
		//print("<pre>".print_r($registrants,true)."</pre>");
		//$registrants=$this->unique_multidim_array($registrants,$registrants->elements[0]->fieldValues[0]->value);
		$i=0;
		/*get the title */
		foreach($registrants->elements as $reg_gk) {
			
		
			if($i==0){
				$fieldnames=array(); $fieldnameid=array();
				foreach($reg_gk->fieldValues as $heading) {
					//echo $heading->id;
					 array_push($fieldnames,$this->get_title($heading->id));
					 if(!empty($this->get_title($heading->id))){
						array_push($fieldnameid,$heading->id);
					 }
					

				  }
				  
				$i++;
			}else{
				continue;
			}
		  } 
		  $data['field_names']=$fieldnames;
		  $data['field_nameid']=$fieldnameid;
		 
		 $data['registrant']=$registrants->elements;
		 //print("<pre>".print_r($data,true)."</pre>");exit;
		 //$this->load->view('form/formdata',$data);
		 $this->load->view('table/data',$data);
			
		}
	}

	private function get_title($field_id){
		$title_id=array("field_id"=>$field_id);
		$data['query']=$this->formsObj->get_field($title_id);
		return ($data['query'][0]->field_name);

	}
	
	private function get_formid_bytactic($tacticid){
		$title_id=array("tactic_id"=>$tacticid);
		$data['query']=$this->formsObj->get_field($title_id);
		return ($data['query'][0]->form_id);

	}



	private function jsontoarray($frm){

		//$params= array("param" => "value");
		//$url="https://secure.p01.eloqua.com/API/REST/1.0/data/form/$frm";
		//$fregistrants =$this->CallAPI('GET',$url,$params);
		
		//print("<pre>".print_r($fregistrants,true)."</pre>");
		//exit;
		$js=$fregistrants;
		$js='{"elements":[{"type":"FormData","id":"134659","fieldValues":[{"type":"FieldValue","id":"44621","value":"naveen.narayanan@verticurl.com"},{"type":"FieldValue","id":"44622","value":"Naveen"},{"type":"FieldValue","id":"44623","value":"Narayanan"},{"type":"FieldValue","id":"44624","value":"Engineering Technology"},{"type":"FieldValue","id":"44625"},{"type":"FieldValue","id":"44626"},{"type":"FieldValue","id":"44627","value":"MKA-001"},{"type":"FieldValue","id":"44628","value":"9042900001"},{"type":"FieldValue","id":"44629","value":"sourceID_sourceID_MKA-001"}],"submittedAt":"1681928072"},{"type":"FormData","id":"134659","fieldValues":[{"type":"FieldValue","id":"44621","value":"naveen.narayanan@verticurl.com"},{"type":"FieldValue","id":"44622","value":"Naveen"},{"type":"FieldValue","id":"44623","value":"Narayanan"},{"type":"FieldValue","id":"44624","value":"Engineering Technology"},{"type":"FieldValue","id":"44625"},{"type":"FieldValue","id":"44626"},{"type":"FieldValue","id":"44627","value":"MKA-001"},{"type":"FieldValue","id":"44628","value":"9042900001"},{"type":"FieldValue","id":"44629","value":"sourceID_sourceID_MKA-001"}],"submittedAt":"1681928072"},{"type":"FormData","id":"134658","fieldValues":[{"type":"FieldValue","id":"44621","value":"binojthoppil.easo@verticurl.com"},{"type":"FieldValue","id":"44622","value":"Binoj"},{"type":"FieldValue","id":"44623","value":"T E"},{"type":"FieldValue","id":"44624","value":"Engineer"},{"type":"FieldValue","id":"44625"},{"type":"FieldValue","id":"44626"},{"type":"FieldValue","id":"44627","value":"MKA-001"},{"type":"FieldValue","id":"44628","value":"9003575000"},{"type":"FieldValue","id":"44629","value":"sourceID_sourceID_MKA-001"}],"submittedAt":"1681928014"},{"type":"FormData","id":"134657","fieldValues":[{"type":"FieldValue","id":"44621","value":"puspanathan.ganesan@verticurl.com"},{"type":"FieldValue","id":"44622","value":"Test "},{"type":"FieldValue","id":"44623","value":"G "},{"type":"FieldValue","id":"44624","value":"Associate Engineer"},{"type":"FieldValue","id":"44625"},{"type":"FieldValue","id":"44626"},{"type":"FieldValue","id":"44627","value":"MKA-001"},{"type":"FieldValue","id":"44628","value":"9876543210"},{"type":"FieldValue","id":"44629","value":"sourceID_sourceID_MKA-001"}],"submittedAt":"1681927797"},{"type":"FormData","id":"134656","fieldValues":[{"type":"FieldValue","id":"44621","value":"padmanabhan.marasamy@verticurl.com"},{"type":"FieldValue","id":"44622","value":"Padmanabhan"},{"type":"FieldValue","id":"44623","value":"Marasamy"},{"type":"FieldValue","id":"44624","value":"Engineer Technology"},{"type":"FieldValue","id":"44625"},{"type":"FieldValue","id":"44626"},{"type":"FieldValue","id":"44627","value":"MKA-001"},{"type":"FieldValue","id":"44628","value":"9698242552"},{"type":"FieldValue","id":"44629","value":"sourceID_sourceID_MKA-001"}],"submittedAt":"1681927788"},{"type":"FormData","id":"134655","fieldValues":[{"type":"FieldValue","id":"44621","value":"logeshwaran.devaraj@verticurl.com"},{"type":"FieldValue","id":"44622","value":"LOGESHWARAN"},{"type":"FieldValue","id":"44623","value":"DEVARAJ"},{"type":"FieldValue","id":"44624","value":"cse"},{"type":"FieldValue","id":"44625"},{"type":"FieldValue","id":"44626"},{"type":"FieldValue","id":"44627","value":"MKA-001"},{"type":"FieldValue","id":"44628","value":"9715508500"},{"type":"FieldValue","id":"44629","value":"sourceID_sourceID_MKA-001"}],"submittedAt":"1681927770"},{"type":"FormData","id":"134654","fieldValues":[{"type":"FieldValue","id":"44621","value":"manikandanraju94@gmail.com"},{"type":"FieldValue","id":"44622","value":"manikandan"},{"type":"FieldValue","id":"44623","value":"raju"},{"type":"FieldValue","id":"44624","value":"engineer"},{"type":"FieldValue","id":"44625"},{"type":"FieldValue","id":"44626"},{"type":"FieldValue","id":"44627","value":"MKA-001"},{"type":"FieldValue","id":"44628","value":"12344567"},{"type":"FieldValue","id":"44629","value":"sourceID_sourceID_MKA-001"}],"submittedAt":"1681927666"},{"type":"FormData","id":"134653","fieldValues":[{"type":"FieldValue","id":"44621","value":"balaji.murugesan@verticurl.com"},{"type":"FieldValue","id":"44622","value":"Balaji"},{"type":"FieldValue","id":"44623","value":"M"},{"type":"FieldValue","id":"44624","value":"Tamil Nadu"},{"type":"FieldValue","id":"44625"},{"type":"FieldValue","id":"44626"},{"type":"FieldValue","id":"44627","value":"MKA-001"},{"type":"FieldValue","id":"44628","value":"07894561230"},{"type":"FieldValue","id":"44629","value":"sourceID_sourceID_MKA-001"}],"submittedAt":"1681926543"}],"page":1,"pageSize":1000,"total":7}';
		return $fregistrants=json_decode($js);	
	}



	// Method: POST, PUT, GET etc
// Data: array("param" => "value") ==> index.php?param=value

private function CallAPI($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, API_USR);

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}


public function duplicate(){

}

function unique_multidim_array($array, $key) : array {
    $uniq_array = array();
    $dup_array = array();
    $key_array = array();

    foreach($array as $val) {
        if (!in_array($val[$key], $key_array)) {
            $key_array[] = $val[$key];
            $uniq_array[] = $val;
/*
            # 1st list to check:
            # echo "ID or sth: " . $val['building_id'] . "; Something else: " . $val['nodes_name'] . (...) "\n";
*/
        } else {
            $dup_array[] = $val;
/*
            # 2nd list to check:
            # echo "ID or sth: " . $val['building_id'] . "; Something else: " . $val['nodes_name'] . (...) "\n";
*/
        }
    }
    return array($uniq_array, $dup_array, /* $key_array */);
}


	function in_result($array, $key, $val) {
		foreach ($array['result'] as $item){
			if (($item->$key == $val)){
				return 1;
				continue;
			}
		
		}
		
	}



}
