<?php
session_start();
$conn = mysqli_connect(
'localhost',
'root',
'',
'libreria'
);
if(isset($conn)){
  // echo 'DB is connected';
}
?>