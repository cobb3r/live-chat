<?php

namespace App\Libraries;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use App\Models\user;
use App\Models\connection;

class Chat implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $model = new user();
        $connection = new connection();

        $uri = $conn->httpRequest->getUri()->getQuery();
        $id = explode('=', $uri);
        $user = $model->find($id[1]);
        $conn->user = $user;
        $this->clients->attach($conn);

        $connection->where('userID', $user['id'])->delete();
        $data = [
            'userID' => $user['id'],
            'resourceID' => $conn->resourceId,
            'name' => $user['firstName'], 
        ];
        $connection->insert($data);
        $users = $connection->findAll();
        $users = ['users' => $users];

        foreach($this->clients as $client) {
            $client->send(json_encode($users));
        }

        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $numRecv = count($this->clients) - 1;
        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        foreach ($this->clients as $client) {
            if ($from !== $client) {
                $data = [
                    'message' => $msg,
                ];
                // The sender is not the receiver, send to each client connected
                $client->send(json_encode($data));
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);
        $connection = new connection();
        $connection->where('resourceID', $conn->resourceId)->delete();
        $users = $connection->findAll();
        $users = ['users' => $users];

        foreach($this->clients as $client) {
            $client->send(json_encode($users));
        }

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}
?>