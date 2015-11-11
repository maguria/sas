<?php

  require './clases/AutoCarga.php';
  
  $imagen= Request::get("imagen");
  $extension=pathinfo("../../carpetasas".$imagen)["extension"];
  
  header('Content-type: image/'.$extension);
 
  readfile("../../carpetasas/$imagen");