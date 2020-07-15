<?php

class User
{

    /** @var string */
    protected $firstName;
    protected $lastName;
    protected $username;
    protected $emailAddress;
    protected $password;

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @param mixed $emailAddress
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public static function findById(PDO $database, $id)
    {
        $user = new static();

        // TODO: Select user with the given id and call the setters
        $stmt = $database->prepare("SELECT * FROM user WHERE id = ?");
        $stmt->execute(array($id));
        $users = $stmt->fetch(\PDO::FETCH_ASSOC);
        $user->setFirstName($users['first_name']);
        $user->setLastName($users['last_name']);
        $user->setUsername($users['username']);
        $user->setEmailAddress($users['email_address']);
        $user->setPassword($users['password']);


        return $user;
    }

    public static function findByUsername(PDO $database, $username)
    {
        $user = new static();

        // TODO: Select user with the given username and call the setters

        return $user;
    }

    public function delete(PDO $db)
    {
        // TODO: Check whether ID isset
        // TODO: Delete the user from the database and check whether the operation succeeded
        // TODO: Unset the ID

        $stmt = $db->prepare('DELETE FROM user WHERE id = ?');
        $stmt->execute(array($id));
    }

    public function save(PDO $database)
    {
        // TODO: If id isset then execute an UPDATE
        // If not, execute an INSERT
    }
}
