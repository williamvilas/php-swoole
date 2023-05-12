<?php

use Swoole\WebSocket\Server;
use Swoole\Http\Request;
use Swoole\WebSocket\Frame;

$port = 8080;
$server = new Server('0.0.0.0', $port);

$server->on('message', function(Server $server, Frame $message)
{
    $connections = $server->connections;
    echo "received message: {$message->data}\n";

    foreach ($connections as $connection) {
        if ($connection != $message->fd) {

            $data = [
                'type' => 'chat',
                'text' => $message->data
            ];

            $server->push($connection, json_encode($data));
       }
    }
});

$server->on("start", function(Server $server) use ($port)
{
    echo "WebSocket Server is started at http://127.0.0.1:{$port}\n";
});

$server->on('open', function($websocket_server, $request){
    //var_dump($request->fd, $request->server);
    $websocket_server->push($request->fd, "Hello welcome\n");
});

$server->on('close', function(Server $server, int $fd)
{
    echo "connection close: {$fd}\n";
});

$server->start();
