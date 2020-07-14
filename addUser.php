<?php

require_once __DIR__ . '/functions.php';

$db = new PDO('mysql:host=localhost;dbname=app', 'app', 'app');

// Read username from CLI (if not given as script argument)
echo("Enter your preferred username:");
$username = trim(fgets(STDIN), "\n");

// Read password from CLI
echo("Enter your preferred password:");
$password = trim(fgets(STDIN), "\n");


addUser($db, $username, $password);