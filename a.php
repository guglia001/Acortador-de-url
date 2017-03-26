<?php
include "bd.php";
require "funciones.php";
//require "index.php";
ini_set('display_errors', 0);
  if (!empty($_GET["a"])){
    $url= $_GET["a"];  
       //if para saber si tiene + y mostrar estadistica
   if (substr($url, -1) == '+'){
        return false;
  }
   else
  {
      /* while para hacer el query , redireccionar y insertar en la base da datos los clicks*/
      $query2=mysqli_query($conn, "select * from url where acortada='$url'");  //query para sacar el url acortado de la base de datos
      while($pagina = mysqli_fetch_array($query2))  //while para hacer el query y redireccionar
      {
      $sel=mysqli_query($conn, "select * from clicks where acortada='$url'");
      $click = mysqli_fetch_array($sel);
      $a = $click['clicks'];
      ++$a;
      $sumar = "UPDATE clicks SET clicks='".$a."'where acortada='".$url."' ";  //variable para insertar en la base de datos los clicks que lleva
      mysqli_query($conn,$sumar);
      $res=$pagina['url'];                  //ya que use mysqli fetch array el campo url debe tener la direccion de la pagina
      //header("location: $res");   //no funciona ya que si la pagina no se acorta con http:// lo que haria seria moverse de carpeta
     echo "<html><body> <script>  window.location.replace('".$res."'); </script> </body> </html>";
      } 
      }
  }
?>