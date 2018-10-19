<?php
//insert.php
include("db.php");
include("function.php");

if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Add")
 {
  $image = '';
  if($_FILES["user_image"]["name"] != '')
  {
   $image = upload_image();
  }
  $statement = $connection->prepare("
   INSERT INTO alunos (nome, lograd, foto) 
   VALUES (:nome, :lograd, :foto)
  ");
  $result = $statement->execute(
   array(
    ':nome' 	=> $_POST["nome"],
    ':lograd'	=> $_POST["lograd"],
    ':foto'		=> $image
   )
  );
  if(!empty($result))
  {
   echo 'Dados Inseridos';
  }
 }
 if($_POST["operation"] == "Editar")
 {
  $image = '';
  if($_FILES["user_image"]["name"] != '')
  {
   $image = upload_image();
  }
  else
  {
   $image = $_POST["hidden_user_image"];
  }
  $statement = $connection->prepare(
   "UPDATE alunos 
   SET nome = :nome, lograd = :lograd, foto = :foto  
   WHERE id = :id
   "
  );
  $result = $statement->execute(
   array(
    ':nome' => $_POST["nome"],
    ':lograd' => $_POST["lograd"],
    ':foto'  => $image,
    ':id'   => $_POST["user_id"]
   )
  );
  if(!empty($result))
  {
   echo 'Data Updated';
  }
 }
}

?>
