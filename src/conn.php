<?php
session_start();
$conn = mysqli_connect('dijkstra.ug.bcc.bilkent.edu.tr', 'ege.marasli', '8nhmQrdt', 'ege_marasli');

if(! $conn)
{
    die('Connection Error!!! ' . mysqli_error());
}

function randomID_user()
{
  $conn = mysqli_connect('dijkstra.ug.bcc.bilkent.edu.tr', 'ege.marasli', '8nhmQrdt', 'ege_marasli');

  if(! $conn)
  {
      die('Connection Error!!! ' . mysqli_error());
  }
  $min = 0;
  $max = 999999;

  $temp = rand (  $min ,  $max );

  $query = "SELECT * FROM user WHERE userID = '$temp' ";
  $result = $conn-> query($query);
  while( $result -> num_rows != 0){
    $temp = rand (  $min ,  $max );

    $query = "SELECT * FROM user WHERE userID = '$temp' ";
    $result = $conn-> query($query);

  }
  return $temp;
}
function isMailExist($email)
{
  $conn = mysqli_connect('dijkstra.ug.bcc.bilkent.edu.tr', 'ege.marasli', '8nhmQrdt', 'ege_marasli');

  if(! $conn)
  {
      die('Connection Error!!! ' . mysqli_error());
  }


  $query = "SELECT * FROM user WHERE mail = '$email' ";
  $result = $conn-> query($query);
  if($result -> num_rows != 0){
    return True;
  }
  return False;
}
?>
