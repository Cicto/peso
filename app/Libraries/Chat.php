<?php
namespace App\Libraries;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use App\Models\MasterModel;


class Chat implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $masterModel = new MasterModel();

        parse_str($conn->httpRequest->getUri()->getQuery(), $params);
        
        $user = $masterModel->get('user_info', 'user_id, firstname, middlename, lastname', ['deleted_at' => NULL, 'user_id' => $params['access_token']]);
        
        $conn->userData = [
            'user_id' => $user['result'][0]->user_id,
            'fullname' => $user['result'][0]->firstname.' '.$user['result'][0]->lastname,
            'chat_room' => $params['chat_room']
        ];
        
        $this->clients->attach($conn);

        $masterModel->delete('chat_connections', ['c_user_id' => $params['access_token']]);

        $conData = [
            'c_user_id' => $user['result'][0]->user_id,
            'c_resource_id' => $conn->resourceId,
            // 'chat_room' => $params['chat_room'],
            'dept_id' => $params['dept_id'],
            'c_name' => $user['result'][0]->firstname.' '.$user['result'][0]->lastname,
        ];

        $masterModel->insert('chat_connections', $conData);


        $users = $masterModel->get('chat_connections', '*', []);
        $users = ['users' => $users];

        foreach ($this->clients as $client) {
            $client->send(json_encode($users));
        }
    }

    public function onMessage(ConnectionInterface $from, $msg) {

        $masterModel = new MasterModel();

        $numRecv = count($this->clients) - 1;
        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        $messageArr = explode(',', $msg);

        $users = $masterModel->get('chat_rooms', '*', []);

        foreach ($this->clients as $client) {
            if ($from !== $client) {
                
                // if($messageArr[1] == $from->userData['chat_room'])
                // {   
                    // if($from->userData['chat_room'])
                    
                    $data = [
                        'message' => $messageArr[0],
                        // 'active_clients' => $this->client,
                        'chat_room' => $messageArr[1],
                        'author' => $from->userData['fullname'],
                        'time' => date('H:i')
                    ];

                    $masterModel->insert('conversations', [
                        'room_id' => $messageArr[1],
                        'user_id' => $from->userData['user_id'],
                        'message' => $messageArr[0]
                    ]);

                    // die();
                    // var_dump();

                    // The sender is not the receiver, send to each client connected
                    $client->send(json_encode($data));  
                // }
                
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        $masterModel = new MasterModel();
        
        $masterModel->delete('chat_connections', ['c_resource_id' => $conn->resourceId]);
        $users = $masterModel->get('chat_connections', '*', []);

        $users = ['users' => $users];
        foreach ($this->clients as $client) {
            $client->send(json_encode($users));
        }

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}