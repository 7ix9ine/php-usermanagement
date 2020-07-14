<?php

require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/users.php';

$db = new PDO('mysql:host=localhost;dbname=app', 'app', 'app');

foreach ($users as $user) {
    deleteUsers($db, $user['username'], $user['password']);
}

foreach ($users as $user) {
    addUser($db, $user['username'], $user['password']);
}