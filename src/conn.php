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
  $min = 10;
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
function findReviewType($reviewID)
{
  $conn = mysqli_connect('dijkstra.ug.bcc.bilkent.edu.tr', 'ege.marasli', '8nhmQrdt', 'ege_marasli');
  $review_type = "";

  if(! $conn)
  {
      die('Connection Error!!! ' . mysqli_error());
  }

  $query = "SELECT * FROM salary_review WHERE reviewID = '$reviewID' ";
  $result = $conn-> query($query);
  if( $result -> num_rows != 0){
    $review_type = "salary_review";
  }

  $query = "SELECT * FROM interview_review WHERE reviewID = '$reviewID' ";
  $result = $conn-> query($query);
  if( $result -> num_rows != 0){
    $review_type = "interview_review";
  }

  $query = "SELECT * FROM benefits_review WHERE reviewID = '$reviewID' ";
  $result = $conn-> query($query);
  if( $result -> num_rows != 0){
    $review_type = "benefits_review";
  }

  $query = "SELECT * FROM general_review WHERE reviewID = '$reviewID' ";
  $result = $conn-> query($query);
  if( $result -> num_rows != 0){
    $review_type = "general_review";
  }
  //$review_type = "None";

  return $review_type;
}
function findUserType($userID)
{
  $conn = mysqli_connect('dijkstra.ug.bcc.bilkent.edu.tr', 'ege.marasli', '8nhmQrdt', 'ege_marasli');
  $user_type = "";

  if(! $conn)
  {
      die('Connection Error!!! ' . mysqli_error());
  }

  $query = "SELECT * FROM employee WHERE employeeID = '$userID' ";
  $result = $conn-> query($query);
  $query = "SELECT * FROM admin WHERE adminID = '$userID' ";
  $result1 = $conn-> query($query);
  if( $result -> num_rows ==1){
    $user_type = "employee";
  }
  else if( $result -> num_rows ==0 && $result1 -> num_rows ==0){
    $user_type = "company";
  }
  else if( $result -> num_rows ==0 && $result1 -> num_rows ==1){
    $user_type = "admin";
  }
  return $user_type;
}
?>
