<?php
require_once 'controllers/client.controller.php';
require_once 'models/db.php';

print_r(Connection::connect());
$client = new ClientController();
$client->viewCall();
