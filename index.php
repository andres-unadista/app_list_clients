<?php
session_start();
require_once 'controllers/client.controller.php';
require_once 'models/client.model.php';

$client = new ClientController();
$client->viewCall();
