<!DOCTYPE html>
<html>

 <head>
  <meta charset="utf8">
  <title>PHP PDO Ajax CRUD with Data Tables and Bootstrap Modals</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
							   
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"/>

  
  <!-- executar tradução -->
		
  <style>
   body
   {
    margin:0;
    padding:0;
    background-color:#f1f1f1;
   }
   .box
   {
    width:1270px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:25px;
   }
  </style>
 </head>
 
 <body>
  <div class="container box">
   <h1 align="center">Lista Dos Alunos do Comitê da Cidadania</h1>
   <br />
    <div align="right">
     <button type="button" id="add_button" data-toggle="modal" 
     data-target="#userModal" class="btn btn-info btn-lg">Novo</button>
    </div>

   <div class="table-responsive">
    <br />
    <br />
    <table id="user_data" class="table table-bordered table-striped" style="width:100%">
     <thead>
      <tr>
       <th width="10%">Foto</th>
       <th width="30%">Nome</th>
       <th width="30%">SobreNome</th>
       <th width="10%">Editar</th>
       <th width="10%">Excluir</th>
      </tr>
     </thead>
    </table>
    
   </div>
  </div>
  <!-- bt relatorio -->
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>

 </body>
</html>

<div id="userModal" class="modal fade">
 <div class="modal-dialog">
  <form method="post" id="user_form" enctype="multipart/form-data">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Novo Registro</h4>
    </div>
    <div class="modal-body">
     <label>Digite o 1º Nome</label>
     <input type="text" name="nome" id="nome" class="form-control" />
     <br />Digite o SobreNome</label>
     <input type="text" name="lograd" id="lograd" class="form-control" />
     <br />
     <label>Foto</label>
     <input type="file" name="user_image" id="user_image" />
     <span id="user_uploaded_image"></span>
    </div>
    <div class="modal-footer">
     <input type="hidden" name="user_id" id="user_id" />
     <input type="hidden" name="operation" id="operation" />
     <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
     <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
    </div>
   </div>
  </form>
 </div>
</div>



<script type="text/javascript" language="javascript" >
$(document).ready(function(){	
	 $('#add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').text("Novo Registro");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#user_uploaded_image').html('');
	 });
	 
	//Ao acertar esta parte, não aparece paginação 10,25,50, em outros lugares
 var dataTable = $('#user_data').DataTable({
	 	 	dom: 'Blfrtip',
			buttons: [ 
				{
					extend: 'pdfHtml5',
					download: 'open',
					orientation: 'landscape', //landscape: paisagem, portrait:retrato
					filename: 'report',			//nome do pdf, não funciona ainda
					extention: 'pdf',
					//seleciona as colunas no pdf
					exportOptions: {
						columns: [ 1, 2]
						}
				}	/*	botão PDF	*/
			],		 
 "processing":true,
  "serverSide":true,  
  "order":[],
  "language": {
	"url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"	/*tradução portuguese-brazil*/
				},			
  "ajax":{		  
   url:"fetch.php",
   type:"POST"
  },
  "columnDefs":[
   {
    "targets":[0, 3, 4],
    "orderable":false,
   },   
  ]
  
 });

 $(document).on('submit', '#user_form', function(event){
  event.preventDefault();
  var nome = $('#nome').val();
  var lograd = $('#lograd').val();
  var extension = $('#user_image').val().split('.').pop().toLowerCase();

  if(extension != '')
  {
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    alert("Arquivo inválido..");
    $('#user_image').val('');
    return false;
   }
  } 
  if(firstName != '' && lastName != '')
  {
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
     alert(data);
     $('#user_form')[0].reset();
     $('#userModal').modal('hide');
     dataTable.ajax.reload();
    }
   });
  }
  else
  {
   alert("Preencha os 2 Campos..");
  }
 });
 
 $(document).on('click', '.update', function(){
  var user_id = $(this).attr("id");
  $.ajax({
   url:"fetch_single.php",
   method:"POST",
   data:{user_id:user_id},
   dataType:"json",
   success:function(data)
   {
    $('#userModal').modal('show');
    $('#nome').val(data.lograd);
    $('#lograd').val(data.lograd);
    $('.modal-title').text("Editar Registro");
    $('#user_id').val(user_id);
    $('#user_uploaded_image').html(data.user_image);
    $('#action').val("Edit");
    $('#operation').val("Edit");
   }
  })
 });
 
 $(document).on('click', '.delete', function(){
  var user_id = $(this).attr("id");
  if(confirm("Tem Certeza?"))
  {
   $.ajax({
    url:"delete.php",
    method:"POST",
    data:{user_id:user_id},
    success:function(data)
    {
     alert(data);
     dataTable.ajax.reload();
    }
   });
  }
  else
  {
   return false; 
  }
 });
 
 
});
</script>