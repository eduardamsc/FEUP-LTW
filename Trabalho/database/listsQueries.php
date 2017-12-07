<?php

  function getAllElements($dbh) {
    try{
    $stmt = $dbh->prepare('SELECT * FROM ELEMENT WHERE idUser = ?');
    $stmt->execute(array($_SESSION['currentUser']));
    echo '
      <table style="width:100%">
          <tr>
            <th align="left">Task</th>
            <th align="left">Deadline</th>
            <th align="left">Done</th>
            </tr>';
    while($row = $stmt->fetch()){
      echo '
          <tr>
            <td>'. $row['tasks'].'</td>
            <td>'. $row['deadLine'].'</td>';
      if ($row['done'])
        echo ' <td> <input type="checkbox" name="checkbox" disabled="disabled" checked> </td>';
      else
        echo ' <td> <input type="checkbox" name="checkbox" </td>';
      echo' </tr>';
    }
    echo '</table>';
   }
   catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
  }
}

  function getElementsByCategory($dbh, $category) {
    $stmt = $dbh->prepare('SELECT * FROM ELEMENT WHERE idCategory = ?');
    $stmt->execute(array($category));
    return $stmt->fetchAll();
  }

  function updatePost($dbh, $id, $title, $introduction, $fulltext) {
    $stmt = $dbh->prepare('UPDATE post SET title = ?, introduction = ?,  fulltext = ? WHERE id = ?');
    $stmt->execute(array($title, $introduction, $fulltext, $id));
  }


  function getUserName($dbh) {
    try{
      $stmt = $dbh->prepare('SELECT name FROM USER WHERE idUser = ?');
      $stmt->execute(array($_SESSION['currentUser']));

      $row = $stmt->fetch();
      echo 'Name: '. $row['name'];
    }

   catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
  }
}




////////////



  function sortAphabetic($dbh) {
    try{
      $stmt = $dbh->prepare('SELECT * FROM ELEMENT WHERE idUser = ? Order by tasks');
      $stmt->execute(array($_SESSION['currentUser']));
      echo '
            <table style="width:100%">
                <tr>
                  <th align="left">Task</th>
                  <th align="left">Deadline</th>
                  <th align="left">Done</th>
                  </tr>';
          while($row = $stmt->fetch()){
            echo '
                <tr>
                  <td>'. $row['tasks'].'</td>
                  <td>'. $row['deadLine'].'</td>';
            if ($row['done'])
              echo ' <td> <input type="checkbox" name="checkbox" disabled="disabled" checked> </td>';
            else
              echo ' <td> <input type="checkbox" name="checkbox" </td>';
            echo' </tr>';
            }
      echo '</table>';
    }

   catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
  }
}

function sortByCategory($dbh, $categor) {
    try{
      $stmt = $dbh->prepare('SELECT ELEMENT.idElement, ELEMENT.tasks, ELEMENT.deadLine, ELEMENT.done, ELEMENT.idUser, ELEMENT.idCategory FROM ELEMENT,CATEGORY WHERE idUser = ? AND CATEGORY.category = ? AND ELEMENT.idCategory = CATEGORY.idCategory');
      $stmt->execute(array($_SESSION['currentUser'], $categor));
      echo '
            <table style="width:100%">
                <tr>
                  <th align="left">Task</th>
                  <th align="left">Deadline</th>
                  <th align="left">Done</th>
                  </tr>';
          while($row = $stmt->fetch()){
            echo '
                <tr>
                  <td>'. $row['tasks'].'</td>
                  <td>'. $row['deadLine'].'</td>';
            if ($row['done'])
              echo ' <td> <input type="checkbox" name="checkbox" disabled="disabled" checked> </td>';
            else
              echo ' <td> <input type="checkbox" name="checkbox" </td>';
            echo' </tr>';
            }
      echo '</table>';
    }

   catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
  }
}

function sortByDeadline($dbh) {
    try{
      $stmt = $dbh->prepare('SELECT * FROM ELEMENT WHERE idUser = ? Order by deadLine ASC');
      $stmt->execute(array($_SESSION['currentUser']));
      echo '
            <table style="width:100%">
                <tr>
                  <th align="left">Task</th>
                  <th align="left">Deadline</th>
                  <th align="left">Done</th>
                  </tr>';
          while($row = $stmt->fetch()){
            echo '
                <tr>
                  <td>'. $row['tasks'].'</td>
                  <td>'. $row['deadLine'].'</td>';
            if ($row['done'])
              echo ' <td> <input type="checkbox" name="checkbox" disabled="disabled" checked> </td>';
            else
              echo ' <td> <input type="checkbox" name="checkbox" </td>';
            echo' </tr>';
            }
      echo '</table>';
    }

   catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
  }
}
?>
