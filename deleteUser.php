<?php

require_once __DIR__ . '/functions.php';

$db = new PDO('mysql:host=localhost;dbname=app', 'app', 'app');

$query = $db->query("DELETE FROM user WHERE id = ?");
$user = $query->fetch(\PDO::FETCH_ASSOC);

$id = $_GET['id'];

var_dump($id);

//get id and put it in delete user function to delete specific user with that id