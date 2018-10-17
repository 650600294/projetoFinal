    <?php

include('db.php');
include('function.php');							

if(isset($_POST["aluno_id"]))
{
 $image = get_image_name($_POST["aluno_id"]);
 if($image != '')
 {
  unlink("upload/" . $image);
 }
 $statement = $connection->prepare(
  "DELETE FROM alunos WHERE id = :id"
 );
 $result = $statement->execute(
  array(
   ':id' => $_POST["aluno_id"]
  )
 );
 
 if(!empty($result))
 {
  echo 'Dados Deletados';
 }
}



?>
   