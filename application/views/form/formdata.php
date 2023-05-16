<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Form Register report</title>

	<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<div id="container">
	<h1>Form Register report</h1>

	<div id="body">
	
	<table>
 
  <?php
   // print("<pre>".print_r($field_nameid,true)."</pre>");
   $i=0;

   //count($registrant->fieldValues);
   echo "<tr>";
   foreach($field_names as $okj){
   //print_r($okj);
  
    
    if(empty($okj)){
      echo  "<th style='display:none;'>np</th>";;
    }else{
      echo  "<th>".$okj."</th>";
    }
    
    
   }

   foreach($registrant as $key1=>$value1) {
 
    echo "<tr>";
   

  foreach($value1->fieldValues as $key2=>$field2) {
  if(empty($field_names[$key2])){
    echo "<td style='display:none;'>".$field2->value."</td>";
  }else{
    echo "<td>".$field2->value."</td>";
  }
   // if($i==0){
     // echo "<td>".$field2->id."</td>";
      
    //}

   // print("<pre>".print_r($value2,true)."</pre>");
   // echo "<br><br>";
    
  }
  echo "</tr>";
  $i=1;
  }
  ?>
 
</table>



	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>
