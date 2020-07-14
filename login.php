<?php

require_once __DIR__ . '/users.php';
require_once __DIR__ . '/functions.php';

$db = new PDO('mysql:host=localhost;dbname=app', 'app', 'app');

/*// Read username from CLI (if not given as script argument)
echo("Enter you username:");
$username = trim(fgets(STDIN), "\n");

// Read password from CLI
echo("Enter your password:");
$password = trim(fgets(STDIN), "\n");

// Test login
testLogin($users, $username, $password);

// If login successful write "Login succeeded"
if(testLogin($users, $username, $password)){
    echo("Login successful");
// If not ask the user to input username/password again
} else {
    while (true) {
        echo("Login unsuccessful \n");

        // Read username from CLI (if not given as script argument)
        echo("Enter you username:");
        $username = trim(fgets(STDIN), "\n");

        // Read password from CLI
        echo("Enter your password:");
        $password = trim(fgets(STDIN), "\n");

        //execute testLogin again
        if (testLogin($users, $username, $password)){
            echo("Login successful");
            // exit the loop
            break;
        }
    }
}*/

$maxTries = 3;

for ($count = 0; $count < $maxTries; $count++) {
    // Read username from CLI (if not given as script argument)
    echo("Enter your username:");
    $username = trim(fgets(STDIN), "\n");

    // Read password from CLI
    echo("Enter your password:");
    $password = trim(fgets(STDIN), "\n");

    //Check if username is in database. If yes, echo Login successful and break loop if not retry and print tries left
    if (databaseLogin($db, $username, $password)) {
        echo("Login successful!");
        break;
    } else {
        echo("Login unsuccessful! \n");
        echo("Tries left: " . ($maxTries - ($count + 1)) . "\n");
    }
}