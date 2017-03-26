<?php
include "bd.php";
ini_set('display_errors', 0);
//variable con la url larga
$corta = substr(md5($_POST["url"]), 0, 4); //funcion para acortar la url, los primeros 4 digitos del md5

   if (!empty($_POST["url"]))
   {
       // ver si la url ya sa habia acoratdo
       $buscar='SELECT id_url FROM url WHERE url="' . $_POST["url"] . '"';
       $consulta=mysqli_query($conn, $buscar);
       $yaacortada = mysqli_fetch_array($consulta); 
	if(!empty($yaacortada))
	{
	    echo "<h4> url ya acortada <br> La url es <a  href='http://".$_SERVER[HTTP_HOST].'/'.$corta ."'> ".$_SERVER[HTTP_HOST].'/'.$corta ." </h4>"; 
	}
	else 
	{
        $sql = "INSERT INTO url VALUES ( '','".$_POST['url']."', '".$corta."', '".$_COOKIE['sesion']."')"; //variable para insertar la url en la base de datos
        mysqli_query($conn, $sql); 
        echo "<h4>La url es <a href='http://".$_SERVER[HTTP_HOST].'/'.$corta ."'> ".$_SERVER[HTTP_HOST].'/'.$corta ." </a> </h4> "; //echo para imprimir la url acortada con la direccion completa 
    	}
   }
    	else
    	{
    	    
    	}
/*
Se nesecita cambiar el .htaccess para que cuando entres la url se redireccione a a.php
*/















	    $insert="INSERT INTO url (cookie) VALUES ('".$_COOKIE['sesion']."')"; // insertar cookie
        
        $sql = "INSERT INTO url  ( '','".$_POST['url']."', '".$corta."', '".$_COOKIE['sesion']."')";
        $query=mysqli_query($conn, $sql);


?> 











