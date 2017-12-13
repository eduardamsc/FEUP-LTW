<?php
  session_start();
  include(__DIR__ . '/../database/connection.php');

  try{

  if (isset($_POST['extra'])){

   $stmt = $dbh->prepare('UPDATE USER
                          SET name = ?, dataNascimento = ?, sexo = ?, extra = ?,
                          WHERE idUser = ?');

   $stmt->execute(array($_POST['username'], $_POST['birthdate'],$_POST['gender'],  $_POST['extra'], $_SESSION['currentUser']));
   }
  else{
       $stmt = $dbh->prepare('UPDATE USER
                              SET name = ?, dataNascimento = ?, sexo = ?
                              WHERE idUser = ?');
       $stmt->execute(array($_POST['username'], $_POST['birthdate'],$_POST['gender'], $_SESSION['currentUser']));
   }
  }
  catch (Exception $e) {
   echo 'Caught exception: ',  $e->getMessage(), "\n";
  }

  header('Location: profile.php');

 ?>
