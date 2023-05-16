
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Eloqua Form Data</title>
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/adminlte.min.css'); ?>">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left:0px;">
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">


            
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<textarea name="Elqcde" id="Elqcde" cols="100" rows="15">
</textarea>
<button id="button1" name="button1">Get Field Names</button>


<div class="column" style="display:none;">


    <h2 class="title">Insert Eloqua Field</h2>
    <form action="http://localhost:8888/verticurl/form" method="POST">
        <div class="column1">
        </div>
        

        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link">Save Contact</button>
            </div>
        </div>
    </form>
</div>

<div class="clode" style="display:none;"></div>

</div>
            </div>
        </div>
</section>

  <!-- /.content-wrapper -->
  </div>
  <!-- /.wrapper -->

</div>

<script>
$(document).ready(function() {
   $("#button1").click(function() {
   $elqcode=$("#Elqcde").val();

   $(".clode").append($elqcode);


   var ek = $('.elq-item-input').map((_,$elqcode) => $elqcode.id).get();
   var ekfname=$(".elq-form").attr('id').replace('form','') ;




   var ek = $('.elq-item-input,.elq-item-select').map((_,el) => el.id).get();
  // var ek = $('.elq-item-input').map((_,el) => el.id).get();
//console.log( jsonString = JSON.stringify(ek));
console.log( ek);
//ek_arr=ek.forEach(ek)
jsonObj = [];
var text="<label>Tactic ID: </label><input id='tacticID' name='tacticID' class='input' \
        type='text' placeholder='' value=''><br><label>Form ID: </label>\
        <input id='form_id' name='form_id' class='input'\
        type='text' placeholder='' value="+ekfname+"><br>";
        $(".column1").append(text);
for (i = 0; i < ek.length; ++i) {
    // do something with `substr[i]`
	var labelv = $("label[for=" + ek[i] + "]");
	 $('#EloquaVal').append(labelv.html()+ " ->" + ek[i]+"<br> ");
	 item = {}
        item["label"]=label = labelv.html().substring(0, labelv.html().indexOf("\n"));
        item["value"] = ek[i].replace('fe','');
		jsonObj.push(item);
        var text="<input id='field_name"+i+"' name='field_name"+i+"' class='input' \
        type='text' placeholder='' value='"+label+"'> \
        <input id='field_id"+i+"' name='field_id"+i+"' class='input' \
        type='text' placeholder='' value='"+item["value"]+"'> </div></div><br>";
     
        $(".column1").append(text);

}
console.log( jsonObj);
$(".column").show();
   
$(".clode").empty();
   });
});
</script>