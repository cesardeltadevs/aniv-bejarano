<?php 
namespace clases {
    class Confirmar {
        public function  EnviarConfirmacion(string $nombre, string $msj) : bool {
            $mensajeTexto = "CONFIRMADO: " . strtoupper($nombre) . "\nMensaje: " . $msj;
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
                return true;                
            }
            else {
                return false;                        
            }
        }
    }
}
