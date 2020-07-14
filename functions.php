<?php

/**
 * Get the age from the specified user
 *
 * The next lines explain what the function does in detail.
 *
 * @param array $users
 * @param string $usnername
 *
 *
 *
 * return int|null
 */
function getAge($users, $username)
{
    foreach ($users as $user) {
        if ($user['username'] === $username) {
            return $user['age'];
        }
    }

    return null;
}

function echoSomething($someThing)
{
    echo $someThing . PHP_EOL;
}

function testLogin($users, $username, $password)
{
    foreach ($users as $user) {
        if (
            $user['username'] === $username
            && $user['password'] === $password
        ) {
            return true;
        }
    }
    return false;
}


/**Checks if Username and Password are in the Database
 *
 * Takes the given Values(Username and Password) from the user and checks if they are in the Username Database.
 * If the Username isn't in the database it returns false and ends the function.
 * If the Username *is* in the database it returns true and then checks if the password is in the database.
 * When both are correct the user successfully logs in.
 *
 */
function databaseLogin(PDO $db, $username, $password)
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

function addUser(PDO $db, $firstName, $lastName, $emailAdress, $username, $password)
{
    $stmt = $db->prepare(
        'INSERT INTO user (First_name, Last_name, eMail_adress, username, password) VALUES (?, ?, ?, ?, ?)'
    );
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt->execute(array($firstName, $lastName, $emailAdress, $username, $hashedPassword));

    var_dump($hashedPassword);
}

function deleteUsers(PDO $db, $username)
{
    $stmt = $db->prepare('DELETE FROM user WHERE username = ?');
    $stmt->execute(array($username));
}

function passwordHasher($password)
{
    $hash = password_hash($password, PASSWORD_DEFAULT);
}

function array_to_table($a)
{
    $t = '<table>';
    $t .= '<tr><th>' . implode('</th><th>', array_keys($a[0])) . '</th></tr>';
    foreach ($a as $row) {
        $t .= '<tr><td>' . implode('</td><td>', $row) . '</td></tr>';
    }
    return $t .= '</table>';
}

