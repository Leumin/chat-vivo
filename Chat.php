<?php
/**
 * Created by PhpStorm.
 * User: leumin
 * Date: 07-01-19
 * Time: 08:18 PM
 */

use Ratchet\MessageComponentInterface;

require_once 'vendor/autoload.php';


class Chat implements MessageComponentInterface
{
    public $conexiones = [];

    function onOpen(\Ratchet\ConnectionInterface $conn)
    {
        echo "Hay una nueva conexion";
        foreach ($this->conexiones as $conexion){
            $conexion->send("Se ha conectado un nuevo usuario");
        }
        $this->conexiones = $conn;
    }


    function onClose(\Ratchet\ConnectionInterface $conn)
    {
        // TODO: Implement onClose() method.
    }


    function onError(\Ratchet\ConnectionInterface $conn, \Exception $e)
    {
        // TODO: Implement onError() method.
    }


    function onMessage(\Ratchet\ConnectionInterface $from, $msg)
    {
        foreach ($this->conexiones as $conexion){
            if ($conexion!== $from){
                $conexion -> send($msg);
            }
        }
    }
}
//10.17.0.43 4000

//ws.onmessage = function(event){
//    console.log(event)
//}
//ƒ (event){
//console.log(event.data)
//}
//ws.send("LISTO CHICOS ")