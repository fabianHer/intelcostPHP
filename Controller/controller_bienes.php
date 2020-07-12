<?php
  require_once ('../Models/model_bienes.php');
  
      $directions = $_POST['json'];
      $direccion = $directions[0]['Direccion'];
      $ciudad = $directions[0]['Ciudad'];   
      $telefono = $directions[0]['Telefono'];
      $codigo_postal = $directions[0]['Codigo_Postal'];   
      $tipo = $directions[0]['Tipo'];  
      $precio  = $directions[0]['Precio'];   
     
     
      $guardarBienes= new model_bienes();
      $guardarBienes->guardarBienes($direccion,$ciudad,$telefono,$codigo_postal,$tipo,$precio);
      if($guardarBienes){        
        echo json_encode("ok");
      }else{
     
        echo json_encode("no");
      }

?>