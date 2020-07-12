<?php

class model_bienes {   

    private $db;
    
    public function __construct() {
        try {
            $this->bienes = array();
            $this->db = new PDO('mysql:host=localhost;dbname=intelcost_bienes', "root", "");            
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function guardarBienes($direccion,$ciudad,$telefono,$codigo_postal,$tipo,$precio) {
        try{
           
               $sql = "INSERT INTO bienes(direccion,ciudad,telefono,codigo_postal,tipo,precio,id_usuario)
                    VALUES ('$direccion','$ciudad','$telefono','$codigo_postal','$tipo','$precio','1')";

                    $result = $this->db->prepare($sql);
                    $result->execute();

                    $numRows = $result->rowCount();

                    if ($numRows > 0) {
                        return true;
                    } else {
                        return false;
                    }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function mostrarBienes() {
       $array = [];
       $sql=" SELECT * FROM bienes";
           $result = $this->db->prepare($sql);
           $result->execute();
           $numRows = $result->rowCount();

           $i=0;
            while ($linea= $result->fetch()){

                    $array[$i]['Direccion'] = $linea['direccion'];
                    $array[$i]['Ciudad'] = $linea['ciudad'];
                    $array[$i]['Telefono'] = $linea['telefono'];
                    $array[$i]['Codigo_Postal'] = $linea['codigo_postal'];
                    $array[$i]['Tipo'] = $linea['tipo'];
                    $array[$i]['Precio'] = $linea['precio'];

                $i++;
            }

                if($numRows > 0){                    
                    return $array;
                    
                } 
                else
                {
                    return false;
                }

    }
}