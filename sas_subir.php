<br/><br/>

<?php


require './clases/AutoCarga.php';

$num=Request::post("id_us");
$dia=Request::post("dia");
$mes=Request::post("mes");
$anio=Request::post("anio");

$doc= Request::post("Tipo_Id");
$dni= Request::post("dni");


$resultado=FileUpload::uploadMulti($_FILES['imagen'],'../../carpetasas/',$num);
$cont=0;
$band=false;
foreach($resultado as $value){
    if($value[0]==0){
       
       $cont++;
       $band=true;
    }
    else{
        echo "Archivo no subido<br/>(Error ".$value[0]."->". $value[1].")<br/>";  
    }
}

if($band==true){
    echo "<h3>Se ha/n subido ".$cont." archivo/s correctamente</h3>";
}
    
    
 


$lista=new FiltrarLista();
?>
    <br/><table border="1">
    <th colspan="2">ARCHIVOS DEL IDENTIFICADOR SS -> <?php echo $num ?></th>
    
    
    
            <?php
foreach($lista->getLista('../../carpetasas/') as $key=>$value){
    if($value!="." && $value!=".."){
        ?><tr><td style="text-align: center;" >
                <?php
                echo "<img src='leer.php?imagen=".$value."' width='120' /></td><td style='text-align: center'>".$value."<br/><br/><a href='leer.php?imagen=".$value."' target='_blank' /><img src='estilo/img/lupa.png'/></a>";
                //var_dump($value);
                
    }  
}
?>
        </table>
    



