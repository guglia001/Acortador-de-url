<?php
$conn = mysqli_connect('localhost', 'root', '', 'url');
/*
son 2 tablas una llamada url que contiene 
id_url, url y acortada
otra llamada clicks 
id_url, url ,clicks y ip

use este trigger
CREATE TRIGGER `url_clicks` AFTER INSERT ON `url`
 FOR EACH ROW INSERT INTO clicks (id_url,url) values(NEW.id_url, NEW.url);
/*
?>