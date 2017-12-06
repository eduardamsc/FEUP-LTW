<?php
  session_start();
  include(__DIR__ . '/../database/connection.php');

  try{
      //VERIFICAR PATHIMAGEM PARA A TABLE

    $stmt = $dbh->prepare('SELECT name FROM USER');
    $stmt->execute();
    while($row = $stmt->fetch()){
      echo "user: ".$_POST['username'];
      echo "<br>";
      echo "db: ".$row['name'];
      echo "<br>";
      if ($_POST['username'] == $row['name']){
          header('Location: registerPage.php?regFailed');
          die();
        }
    }

    $date = date('Y-m-d', time());
    $pathImage = "0";

    //get max ID
    $stmt = $dbh->prepare('SELECT idUser FROM USER ORDER BY idUser DESC LIMIT 1');
    $stmt->execute();
    $row = $stmt->fetch();

    $idUser = $row['idUser'] + 1;

    $stmt = $dbh->prepare('INSERT INTO USER(idUser ,name, dataNascimento, password, pathImage, sexo, dataRegisto)
    Values(?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute(array($idUser, $_POST['username'], $_POST['birthdate'], $_POST['password'], $pathImage, $_POST['gender'], $date));

  }
    catch (Exception $e) {
      echo 'Caught exception: ',  $e->getMessage(), "\n";
  }

  $_SESSION['currentUser'] = $idUser;

  header('Location: ../');

?>