<?php
  session_start();
  include(__DIR__ . '/../database/connection.php');
  include_once('../templates/header.php');
 ?>
<div id = "newList">

    <label>Category Name: </label>
    <input type='text' id = 'listName' placeholder='Type the name' required />

    <label>Number of Tasks:  </label>
    <input type="number" value = "1" id ="numTasks" min="1">
    <br>

    <div id = "newListTasks">
    </div>

    <button id ="addNewList" onclick="generateTasks()">Generate Tasks</button>

    <button id = 'exitNewList' onclick="window.location.href='../index.php'">Go back</button>


</div>

<?php include_once('../templates/footer.php'); ?>
