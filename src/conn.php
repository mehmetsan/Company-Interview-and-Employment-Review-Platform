<?php
session_start();
$conn = mysqli_connect('dijkstra.ug.bcc.bilkent.edu.tr', 'ege.marasli', '8nhmQrdt', 'ege_marasli');

if(! $conn)
{
    die('Connection Error!!! ' . mysqli_error());
}
?>
