<?php 
$datos = $_POST;
// var_dump($datos, strlen($datos['nombre']));
// exit;

if (empty($datos)) {
    echo "<script>alert('Todos los datos son requeridos');window.location.history.go(-1);</script>";
}
else {
    if (strlen($datos['nombre']) < 1 || strlen($datos['nombre']) > 100) {
        echo "<script>alert('Nombre No Valido');window.history.go(-1);</script>";
    }
    else if (strlen($datos['mensaje']) > 250) {
        echo "<script>alert('Mensaje No Valido');window.history.go(-1);</script>";
    }
    else {
       require_once "clases/Confirmar.php";
       $confirmarObj = new \clases\Confirmar;
       if ($confirmarObj->EnviarConfirmacion($datos['nombre'], $datos['mensaje'])) {
        echo "<script>alert('Gracias. Te espero ese dia.');window.location.href='http://cezaryto.com/apps/mi-aniversario/';</script>";
       }
       else {
        echo "<script>alert('Error al enviar mensaje. Vuelve a intentarlo.');window.history.go(-1);</script>";    
       }        
    }
}

