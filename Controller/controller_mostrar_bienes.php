<?php
  require_once ('../Models/model_bienes.php');  
     
     
      $bienes = new model_bienes();
      $respuesta = $bienes->mostrarBienes();
      if($respuesta){      
         echo json_encode($respuesta);
      }else{
     
        echo json_encode("SIN DATOS");
      }

?>