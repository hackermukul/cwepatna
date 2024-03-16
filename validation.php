<?php
 @session_start();
if(!isset($_SESSION['userid']))
 echo "<script>location.href='index.php'</script>";
 ?>