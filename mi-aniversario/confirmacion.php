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
        $mensajeTexto = "CONFIRMADO: " . strtoupper($datos['nombre']) . "\nMensaje: " . $datos['mensaje'];
        $mensaje = urlencode($mensajeTexto);
        
        $telegramBot = '5878437504:AAGDw4QtOKHDeVXNfu7AXvs5JbnZz2S-FAk';
        $chatId = '-970549664';
        $url = 'https://api.telegram.org/bot' . $telegramBot . '/sendMessage';
        
        $datos = array('chat_id' => $chatId, 'text'=> $mensajeTexto);
        $opciones = array(
            'http' => array(
                'method' => 'POST', 
                'header' => "Content-Type:application/x-www-form-urlencoded\r\n", 
                'content' => http_build_query($datos),
            ),
        );
        $contexto = stream_context_create($opciones);
        $result = file_get_contents($url, false, $contexto);
        
        // var_dump($result);
        // exit;
        
        if ($result['ok']) {
            echo "<script>alert('Gracias. Te espero ese dia.');window.location.href='http://cezaryto.com/apps/mi-aniversario/';</script>";
        }
        else {
            echo "<script>alert('Error al enviar mensaje. Vuelve a intentarlo.');window.history.go(-1);</script>";            
        }
        
    }
}

