<?php

/**Checks if Username and Password are in the Database
 *
 * Takes the given Values(Username and Password) from the user and checks if they are in the Username Database.
 * If the Username isn't in the database it returns false and ends the function.
 * If the Username *is* in the database it returns true and then checks if the password is in the database.
 * When both are correct the user successfully logs in.
 *
 */
/*function databaseLogin(PDO $db, $username, $password)
{
    $stmt = $db->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->execute(array($username));
    $user = $stmt->fetch(\PDO::FETCH_ASSOC);
    if ($user === false) {
        return false;
    }
    if ($password === $user['password']) {
        return true;
    } else {
        return false;
    }
}

function editUser(PDO $db, $id, $first_name, $last_name, $email_address, $username)
{
    $stmt = $db->prepare(
        'UPDATE user SET first_name = ?, last_name = ?, email_address = ?, username = ? WHERE id = ?'
    );
    $stmt->execute(array($first_name, $last_name, $email_address, $username, $id));
}

function addUser(PDO $db, $firstName, $lastName, $emailAddress, $username, $password)
{
    $stmt = $db->prepare(
        'INSERT INTO user (first_name, last_name, email_address, username, password) VALUES (?, ?, ?, ?, ?)'
    );
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt->execute(array($firstName, $lastName, $emailAddress, $username, $hashedPassword));
}

function deleteUsers(PDO $db, $id)
{
    $stmt = $db->prepare('DELETE FROM user WHERE id = ?');
    $stmt->execute(array($id));
}*/

function databaseConnect(){
    $ini = parse_ini_file('etc/config.ini');
    $host = $ini['host'];
    $dbname = $ini['database'];
    $user = $ini['user'];
    $password = $ini['password'];
    return new PDO("mysql:host=" .$host. "; dbname=$dbname", $user, $password);
}