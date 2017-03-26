<?php
echo "<!DOCTYPE html>";
/*
creacion de cookies para sesiones
*/
include "bd.php";
ini_set('display_errors', 0);
if(!isset($_COOKIE["sesion"]))
{
  $a= rand(0, 100);
  $valor = $a;
  //setcookie('sesion', $valor); no sirve porque el cookie se haria en el siguiente request
 echo "<script>document.cookie = '".$valor."'; </script";
}
?>


<head>
  <meta charset="utf-8">
  <title>Url Shortener: paste your long url</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.js"></script>
  </head>
  <body>
    <div class="wrapper-left"></div>
    <div class="wrapper-main">
          <div class="content-main">
            <div class="logo">
              <br> <br> <br>
              <div class="main-logo" id="logo">
                <div class="bubble">
                </div>
                <h1> ACORTADOR DE URL </h1>
              </div>
            </div>

          <div class="form-main">
            <form action="funciones.php" method="post" id="form" onsubmit="return false" >
              <input type="text" id="url" class="input-url ui-autocomplete-input" name="url" placeholder="Pega el link aqui" > 
              <div style="clear:both"></div>
              <div class="example" style="font-size: 77%; margin-top: 2px; ">
                              Ejemplo: <span style="font-weight: 600;">https://en.wikipedia.org/w/index.php?title=Special:CiteThisPage&page=Wikipedia&id=768762994</span>
              </div>
              <div class="buttons-group">
               <a type="submit" class="btn-search"><h1>Acortar</h1>  </a>
                </form>
              </div>
              <br> <br> <br> <br>
            
          </div>
          <script>
            $(".btn-search").bind("click", function(){        
                $.post("funciones.php", $("#form").serialize(), function(data) {
                     $("#form").replaceWith(data);
                      $("#logo").replaceWith("");
                });
            });
</script>
<br> <br> <br>

 <h2> Url acortadas </h2>
 <table>
   <tr>
    <th> url </th>
    <th> clicks </th> 
  </tr>
 <?php
$sql2="SELECT * FROM clicks where cookie='".$_COOKIE['sesion']."'";
include "bd.php";
$results = mysqli_query($conn, $sql2);

    while($row = mysqli_fetch_array($results)) {
        echo "<tr> <td> " . $row["url"]. "<td> " . $row["clicks"] . " </td> </tr> ";
}



 ?>
  </table>
 
          <div class="footer">
            <div class="footer-left col-xs-5">
              Mario Guglia Proyecto
            </div>
            <div class="footer-right col-xs-7">

          </div> 
    </div>

  </body>

</html>
