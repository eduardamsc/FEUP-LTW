<?php
	echo 'You have just been logged out and are being reddirected';
    unset($_SESSION['currentUser']);
    header('Location: ../index.php');
 ?>
